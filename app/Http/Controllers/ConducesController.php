<?php

namespace App\Http\Controllers;

use App\Models\Capitanes;
use App\Models\Conductores;
use App\Models\Destinos;
use App\Models\Embarcaciones;
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
        $conduces = Movimientos::where('tipo_movimiento', 'C')->get();
        return view('movimientos.conduces.index', compact('conduces'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $ultimo_mov = auth()->user()->movimientos()->orderBy('id', 'DESC')->first();
        $provincias = Provincias::all();
        $embarcaciones = Embarcaciones::whereRaw('fecha_validez >= CURDATE()')
            ->get();
        return view('movimientos.conduces.create', compact('ultimo_mov', 'provincias', 'embarcaciones'));
        // return $embarcaciones;
    }

    public function create_with_post()
    {
        $matricula = $_POST['emb'];
        $embarcacion = auth()->user()->embarcaciones()->where('matricula', '=', $matricula)->first();
        $ultimo_mov = auth()->user()->movimientos()->orderBy('id', 'DESC')->first();
        $provincias = Provincias::all();

        return view('movimientos.conduces.create_post', compact('ultimo_mov', 'embarcacion', 'provincias'));
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
        $embarcacion = auth()->user()->embarcaciones()->where('matricula', '=', $request->matricula)->first();
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
            'tipo_movimiento' => 'C',
            'estado' => 'Enviado',
            'estado_alerta' => 'N/A',
            'emb_id' => $embarcacion->id,
            'user_id' => auth()->user()->id,
            'vcode' => strtoupper(substr(md5(Str::uuid()->toString()), 1, 6)),
            'url_id' => Str::uuid()->toString()
        ]);
        $vehiculo = Vehiculos::create([
            'marca' => $request->marca,
            'color' => $request->color,
            'year' => $request->year,
            'placa' => $request->placa,
            'provincia' => $provincia[1],
            'municipio' => $request->municipio,
            'provincia_salida' => $provincia_salida[1],
            'municipio_salida' => $request->municipiosalida,
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
        $conduce->update([
            'estado' => 'Cancelado'
        ]);
        return redirect()->route('movimientos.conduces.index')->with('cancel', 'Solicitud creada con exito.');
    }
}
