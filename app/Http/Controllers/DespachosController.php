<?php

namespace App\Http\Controllers;

use App\Imports\PasajerosImport;
use App\Imports\TripulantesImport;
use App\Models\Capitanes;
use App\Models\CapitanesRegistrados;
use App\Models\Destinos;
use App\Models\DocumentoCargadoPasajeros;
use App\Models\DocumentoCargadoTripulantes;
use App\Models\Embarcaciones;
use App\Models\Movimientos;
use App\Models\Nacionalidades;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Facades\Excel;

class DespachosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $despachos = Movimientos::where('tipo_movimiento', 'D')->orderBy('id', 'desc')->get();
        $despachos = auth()->user()->movimientos()->where('tipo_movimiento', 'D')->orderBy('id', 'desc')->get();
        // return response()->json($despachos);
        return view('movimientos.despachos.index', compact('despachos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $ultimo_mov = auth()->user()->movimientos()->orderBy('id', 'DESC')->first();
        $destinos = Destinos::where('despachos', 0)->get();
        $embarcaciones = auth()->user()->embarcaciones()
            ->whereRaw('fecha_validez >= CURDATE()')
            ->get();
        $nacionalidades = Nacionalidades::all();
        $capitanesreg = CapitanesRegistrados::join('capitanes_reg_usuarios', 'cap_id', 'capitanes_registrados.id')->where('user_id', auth()->user()->id)->get();
        return view('movimientos.despachos.create', compact('ultimo_mov', 'destinos', 'embarcaciones', 'nacionalidades', 'capitanesreg'));
        // return $embarcaciones;
    }

    public function create_with_post()
    {
        $matricula = $_POST['emb'];
        $embarcacion = auth()->user()->embarcaciones()->where('matricula', '=', $matricula)->first();
        $ultimo_mov = auth()->user()->movimientos()->orderBy('id', 'DESC')->first();
        $destinos = Destinos::where('despachos', 0)->get();
        $nacionalidades = Nacionalidades::all();
        $capitanesreg = CapitanesRegistrados::join('capitanes_reg_usuarios', 'cap_id', 'capitanes_registrados.id')->where('user_id', auth()->user()->id)->get();
        return view('movimientos.despachos.create_post', compact('ultimo_mov', 'embarcacion', 'destinos', 'nacionalidades', 'capitanesreg'));
        // return dd($embarcacion);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'matricula' => 'required',
            'numero_casco' => 'required',
            'nombre' => 'required',
            'color' => 'required',
            'fecha' => 'required',
            'pasajeros' => 'required|mimes:pdf,jpg,png,csv,xlsx',
            'tripulantes' => 'required|mimes:pdf,jpg,png,csv,xlsx',
        ]);
        $embarcacion = auth()->user()->embarcaciones()->where('matricula', '=', $request->matricula)->first();
        $salida = explode("|", $request->lugar_salida);
        $destino = explode("|", $request->lugar_destino);
        // dd($embarcacion);
        $mov = Movimientos::create([
            'matricula' => $request->matricula,
            'numero_casco' => $request->numero_casco,
            'nombre' => $request->nombre,
            'color' => $request->color,
            'fecha' => $request->fecha,
            'marca_modelo_motor' => $request->marca_modelo_motor,
            'caballos_fuerza_motor' => $request->caballos_fuerza_motor,
            'no_motor' => $request->no_motor,
            'tipo_movimiento' => 'D',
            'estado' => 'Enviado',
            'estado_alerta' => 'N/A',
            'emb_id' => $embarcacion->id,
            'user_id' => auth()->user()->id,
            'vcode' => strtoupper(substr(md5(Str::uuid()->toString()), 1, 6)),
            'url_id' => Str::uuid()->toString(),
            'idsalida' => $salida[0],
            'idllegada' => $destino[0],
            'detalle_destino' => $request->detalle_destino,
            'fecha_llegada' => $request->fecha_llegada,
        ]);

        $capitan = CapitanesRegistrados::where('id', $request->capitan)->first();

        Capitanes::create([
            'tipo_documento' => $capitan->tipo_documento,
            'documento' => $capitan->documento,
            'nombre' => $capitan->nombre,
            'nacionalidad' => $capitan->nacionalidad,
            'telefono' => $capitan->telefono,
            'motivo_viaje' => $request->motivo_viaje,
            'lugar_salida' => $salida[1],
            'lugar_destino' => $destino[1],
            'cantidad_tripulantes' => $request->cantidad_tripulantes,
            'cantidad_pasajeros' => $request->cantidad_pasajeros,
            'mov_id' => $mov->id,
            'dest_sa_id' => $salida[0],
            'dest_ll_id' => $destino[0]
        ]);
        // documento lista de pasajeros
        if ($request->hasFile('pasajeros')) {
            $pasajeros = $request->file('pasajeros');
            $nombreArchivoPasajeros = 'pasajeros_' . $mov->id . '_' . time() . '.' . $pasajeros->getClientOriginalExtension();
            $pathp = $pasajeros->storeAs('public/pasajeros', $nombreArchivoPasajeros);
            if ($pasajeros->getClientOriginalExtension() == 'csv' || $pasajeros->getClientOriginalExtension() == 'xlsx') {
                // Importar los pasajeros desde el archivo
                Excel::import(new PasajerosImport($mov->id), $pasajeros);
            }
        }
        // documento lista de tripulantes
        if ($request->hasFile('tripulantes')) {
            $tripulantes = $request->file('tripulantes');
            $nombreArchivoTripulantes = 'tripulantes_' . $mov->id . '_' . time() . '.' . $tripulantes->getClientOriginalExtension();
            $patht = $tripulantes->storeAs('public/tripulantes', $nombreArchivoTripulantes);
            if ($tripulantes->getClientOriginalExtension() == 'csv' || $tripulantes->getClientOriginalExtension() == 'xlsx') {
                // Importar los tripulantes desde el archivo
                Excel::import(new TripulantesImport($mov->id), $tripulantes);
            }
        }

        DocumentoCargadoPasajeros::create([
            'mime_type' => $pasajeros->getClientMimeType(),
            'file_name' => $nombreArchivoPasajeros,
            'file_path' => $pathp,
            'userid' => auth()->user()->id,
            'mov_id' => $mov->id,
        ]);
        DocumentoCargadoTripulantes::create([
            'mime_type' => $pasajeros->getClientMimeType(),
            'file_name' => $nombreArchivoTripulantes,
            'file_path' => $patht,
            'mov_id' => $mov->id,
            'userid' => auth()->user()->id,
        ]);

        return redirect()->route('movimientos.despachos.index')->with('msj', 'Solicitud creada con exito.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Movimientos $despacho)
    {
        return view('movimientos.despachos.ver', compact('despacho'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Movimientos $despacho)
    {
        // return $despacho->vehiculo;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Movimientos $despacho)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Movimientos $despacho)
    {
        $despacho->update([
            'estado' => 'Cancelado'
        ]);
        return redirect()->route('movimientos.despachos.index')->with('cancel', 'Solicitud creada con exito.');
    }
}
