<?php

namespace App\Http\Controllers;

use App\Models\Capitanes;
use App\Models\Destinos;
use App\Models\Embarcaciones;
use App\Models\Movimientos;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

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
        $destinos = Destinos::all();
        $embarcaciones = auth()->user()->embarcaciones()
            ->whereRaw('fecha_validez >= CURDATE()')
            ->get();
        return view('movimientos.despachos.create', compact('ultimo_mov', 'destinos', 'embarcaciones'));
        // return $embarcaciones;
    }

    public function create_with_post()
    {
        $matricula = $_POST['emb'];
        $embarcacion = auth()->user()->embarcaciones()->where('matricula', '=', $matricula)->first();
        $ultimo_mov = auth()->user()->movimientos()->orderBy('id', 'DESC')->first();
        $destinos = Destinos::all();
        return view('movimientos.despachos.create_post', compact('ultimo_mov', 'embarcacion', 'destinos'));
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
            'fecha' => 'required'
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
            'tipo_movimiento' => 'D',
            'estado' => 'Enviado',
            'estado_alerta' => 'N/A',
            'emb_id' => $embarcacion->id,
            'user_id' => auth()->user()->id,
            'vcode' => strtoupper(substr(md5(Str::uuid()->toString()), 1, 6)),
            'url_id' => Str::uuid()->toString()
        ]);
        Capitanes::create([
            'documento' => $request->documento,
            'nombre' => $request->nombre_capitan,
            'nacionalidad' => $request->nacionalidad,
            'telefono' => $request->telefono,
            'motivo_viaje' => $request->motivo_viaje,
            'lugar_salida' => $salida[1],
            'lugar_destino' => $destino[1],
            'cantidad_tripulantes' => $request->cantidad_tripulantes,
            'cantidad_pasajeros' => $request->cantidad_pasajeros,
            'mov_id' => $mov->id,
            'dest_sa_id' => $salida[0],
            'dest_ll_id' => $destino[0]
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
