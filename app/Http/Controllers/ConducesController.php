<?php

namespace App\Http\Controllers;

use App\Models\Capitanes;
use App\Models\Conductores;
use App\Models\Destinos;
use App\Models\Embarcaciones;
use App\Models\Inteligencias;
use App\Models\Movimientos;
use App\Models\Provincias;
use App\Models\Vehiculos;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ConducesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $conduces = Movimientos::where('tipo_movimiento', 'C')->get();
        $conduces = auth()->user()->movimientos()->where('tipo_movimiento', 'C')->orderBy('id', 'desc')->get();

        return view('movimientos.conduces.index', compact('conduces'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $ultimo_mov = auth()->user()->movimientos()->orderBy('id', 'DESC')->first();
        $provincias = Provincias::all();
        $destinos = Destinos::all();
        $embarcaciones = auth()->user()->embarcaciones->filter(function ($item) {
            $registroActivo = Inteligencias::where('matricula_embarcacion', $item->matricula)
                ->where('estado', '=', 'Activa')
                ->exists();
            return $item->fecha_validez >= now()->toDateString() && $item->impedimento == 0 && $item->manual == 0 && !$registroActivo;
        });
        return view('movimientos.conduces.create', compact('ultimo_mov', 'provincias', 'embarcaciones', 'destinos'));
        // return $embarcaciones;
    }

    public function create_with_post()
    {
        $matricula = $_POST['emb'];
        $embarcacion = auth()->user()->embarcaciones->where('matricula', '=', $matricula)->first();
        $ultimo_mov = auth()->user()->movimientos()->orderBy('id', 'DESC')->first();
        $provincias = Provincias::all();
        $destinos = Destinos::all();

        return view('movimientos.conduces.create_post', compact('ultimo_mov', 'embarcacion', 'provincias', 'destinos'));
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
            'fecha_salida' => 'required'
        ]);
        $embarcacion = auth()->user()->embarcaciones->where('matricula', '=', $request->matricula)->first();
        $provincia = explode("|", $request->provincia);
        $provincia_salida = explode("|", $request->provinciasalida);
        // $municipio = explode("|", $request->municipio);
        // dd($embarcacion);
        $mov = Movimientos::create([
            'matricula' => $request->matricula,
            'numero_casco' => $request->numero_casco,
            'nombre' => $request->nombre,
            'color' => $request->color_emb,
            'fecha' => $request->fecha_salida,
            'fecha_llegada' => $request->fecha_llegada,
            'marca_modelo_motor' => $request->marca_modelo_motor,
            'caballos_fuerza_motor' => $request->caballos_fuerza_motor,
            'no_motor' => $request->no_motor,
            'tipo_movimiento' => 'C',
            'estado' => 'Enviado',
            'estado_alerta' => 'N/A',
            'emb_id' => $embarcacion->id,
            'user_id' => auth()->user()->id,
            'vcode' => strtoupper(substr(md5(Str::uuid()->toString()), 1, 6)),
            'url_id' => Str::uuid()->toString(),
            'idsalida' => $provincia[0],
            'idllegada' => $provincia_salida[0],
            'detalle_salida' => $request->detalle_salida,
            'detalle_destino' => $request->detalle_destino,
        ]);
        $vehiculo = Vehiculos::create([
            'marca' => $request->marca,
            'color' => $request->color,
            'year' => $request->year,
            'placa' => $request->placa,
            'provincia' => $provincia[1],
            'municipio' => $request->municipio,
            'provincia_salida' => $provincia_salida[1],
            'Municipio_salida' => $request->municipiosalida,
            'sector' => $request->sector,
            'calle' => $request->calle,
            'observacion' => $request->observacion,
            'mov_id' => $mov->id,
            'emb_id' => $embarcacion->id,
            'id_provsa' => $provincia_salida[0],
            'id_munsa' => 0,
            'idcomandancia' => $request->idcomandancia,
            'comandancia' => $request->comandancia
        ]);
        Conductores::create([
            'documento' => $request->documento,
            'nombre' => $request->nombre_conductor,
            'telefono' => $request->telefono_conductor . "|" . $request->telefono_conductor_otro,
            'mov_id' => $mov->id,
            'emb_id' => $embarcacion->id,
            'veh_id' => $vehiculo->id
        ]);

        // actualizar embarcacion para que no se pueda volver a despachar
        $embarcacion->update([
            'estado_movimiento' => 1 //Solicitud abierta
        ]);

        return redirect()->route('movimientos.conduces.index')->with('msj', 'Solicitud creada con exito.');
        // return $request->all();
    }

    /**
     * Display the specified resource.
     */
    public function show(Movimientos $conduce)
    {
        return view('movimientos.conduces.ver', compact('conduce'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Movimientos $conduce)
    {
        $embarcacion = Embarcaciones::where('matricula', '=', $conduce->matricula)->first();
        $embarcacion->update([
            'estado_movimiento' => 0 //Solicitud cerrada
        ]);
        $conduce->update([
            'estado' => 'Cancelado'
        ]);
        return redirect()->route('movimientos.conduces.index')->with('cancel', 'Solicitud creada con exito.');
    }
}
