<?php

namespace App\Http\Controllers;

use App\Models\ArmasEmbarcaciones;
use App\Models\Capitanes;
use App\Models\CapitanesInternacionales;
use App\Models\Destinos;
use App\Models\Embarcaciones;
use App\Models\EmbarcacionesInternacionales;
use App\Models\Movimientos;
use App\Models\MovimientosInternacionales;
use App\Models\Nacionalidades;
use App\Models\Pasajeros;
use App\Models\Salidas;
use App\Models\Tripulantes;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;
use Barryvdh\DomPDF\PDF as DomPDFPDF;
use Carbon\Carbon;
use PDF;
use Illuminate\Support\Facades\File;

class SalidasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $salidas = Movimientos::where('tipo_movimiento', 'S')->orderBy('id', 'desc')->get();
        $salidas = auth()->user()->movimientos_internacionales()->where('tipo_movimiento', 'S')->orderBy('id', 'desc')->get();
        return view('movimientos.salidas.index', compact('salidas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $ultimo_mov = auth()->user()->movimientos()->orderBy('id', 'DESC')->first();
        $nacionalidades = Nacionalidades::all();
        $destinos = Destinos::all();
        return view('movimientos.salidas.create', compact('ultimo_mov', 'nacionalidades', 'destinos'));
    }

    public function create_with_post()
    {
        $matricula = $_POST['emb'];
        // validar si la embarcacion es internacinal o nacional
        $valida = auth()->user()->embarcaciones->where('matricula', '=', $matricula)->first();
        if (!empty($valida)) {
            $embarcacion = auth()->user()->embarcaciones->where('matricula', '=', $matricula)->first();
        } else {
            $embarcacion = auth()->user()->embarcaciones_internacionales->where('matricula', '=', $matricula)->first();
        }
        $ultimo_mov = auth()->user()->movimientos()->orderBy('id', 'DESC')->first();
        $nacionalidades = Nacionalidades::all();
        $destinos = Destinos::all();
        return view('movimientos.salidas.create_post', compact('ultimo_mov', 'embarcacion', 'nacionalidades', 'destinos'));
        // return dd($embarcacion);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $request->validate([
        //     'matricula' => 'required',
        //     'numero_casco' => 'required',
        //     'nombre' => 'required',
        //     'color' => 'required',
        //     'fecha_llegada' => 'required'
        // ]);
        $embN = auth()->user()->embarcaciones->where('matricula', '=', $request->matricula)->first();
        $embI = EmbarcacionesInternacionales::where('matricula', '=', $request->matricula)->first();
        if (!empty($embN)) {
            $embarcacion = Embarcaciones::where('matricula', '=', $request->matricula)->first();
            $embarcacion->update([
                'estado_movimiento' => 2
            ]);
        } else if (!empty($embI)) {
            $embarcacion = EmbarcacionesInternacionales::where('matricula', '=', $request->matricula)->first();
            $embarcacion->update([
                'matricula' => $request->matricula,
                'nombre' => $request->nombre,
                'no_chasis' => $request->numero_casco,
                'color' => $request->color,
                'material_casco' => $request->material_casco,
                'fecha_validez' => Carbon::parse($request->fecha_llegada)->addDays(90),
                'capacidad_personas' => $request->cantidad_pasajeros,
                'capacidad_tripulantes' => $request->cantidad_tripulantes,
                'tipo_motor' => $request->tipo_motor,
                'marca_modelo_motor' => $request->marca_modelo_motor,
                'caballos_fuerza_motor' => $request->caballos_fuerza_motor,
                'no_motor' => $request->no_motor,
                'estatus' => 'F',
                'eslora' => $request->eslora,
                'manga' => $request->manga,
                'puntal' => $request->puntal,
                'tipo_embarcacion' => $request->tipo_embarcacion,
                'tipo_uso' => $request->tipo_uso,
                'pais_procedencia' => $request->pais_procedencia,
                'armas' => $request->cantidad_armas,
                'puerto_registro' => $request->puerto_salida,
                'nombre_propietario' => $request->nombre_capitan,
                'no_documento' => $request->documento_cap,
                'user_id' => auth()->user()->id,
                'impedimento' => 0
            ]);
        }

        $mov = MovimientosInternacionales::create([
            'matricula' => $request->matricula,
            'numero_casco' => $request->numero_casco,
            'nombre' => $request->nombre,
            'color' => $request->color,
            'fecha' => $request->fecha_llegada,
            'marca_modelo_motor' => $request->marca_modelo_motor,
            'caballos_fuerza_motor' => $request->caballos_fuerza_motor,
            'no_motor' => $request->no_motor,
            'tipo_movimiento' => 'S',
            'estado' => 'Enviado',
            'estado_alerta' => 'N/A',
            'emb_inter_id' => $embarcacion->id,
            'user_id' => auth()->user()->id,
            'vcode' => strtoupper(substr(md5(Str::uuid()->toString()), 1, 6)),
            'url_id' => Str::uuid()->toString()
        ]);
        // Informacion de las armas
        if ($request->cantidad_armas > 0) {
            ArmasEmbarcaciones::create([
                'cantidad' => $request->cantidad_armas,
                'tipo_armas' => $request->tipo_armas,
                'mov_inter_id' => $mov->id,
            ]);
        }

        CapitanesInternacionales::create([
            'tipo_documento' => $request->tipo_documento,
            'documento' => $request->documento_cap,
            'nombre' => $request->nombre_capitan,
            'nacionalidad' => $request->nacionalidad_cap,
            'telefono' => $request->telefono,
            'motivo_viaje' => $request->motivo_viaje,
            'pais_procedencia' => $request->pais_procedencia,
            'lugar_salida' => $request->puerto_salida,
            'lugar_destino' => $request->puerto_llegada,
            'cantidad_tripulantes' => $request->cantidad_tripulantes,
            'cantidad_pasajeros' => $request->cantidad_pasajeros,
            'tiempo_estadia' => $request->tiempo_estadia,
            'mov_inter_id' => $mov->id,
            'dest_sa_id' => 0,
            'dest_ll_id' => 0
        ]);

        $tripulantes = Tripulantes::where('userid', auth()->user()->id)->get();
        if (!$tripulantes->isEmpty()) {
            $tripulantes->toQuery()->update([
                'mov_id' => $mov->id
            ]);
        }

        $pasajeros = Pasajeros::where('userid', auth()->user()->id)->get();
        if (!$pasajeros->isEmpty()) {
            $pasajeros->toQuery()->update([
                'mov_id' => $mov->id
            ]);
        }

        return redirect()->route('movimientos.salidas.index')->with('msj', 'Solicitud creada con exito.');
    }

    /**
     * Display the specified resource.
     */
    public function show(MovimientosInternacionales $salida)
    {
        return view('movimientos.salidas.ver', compact('salida'));
    }
    public function eticket(MovimientosInternacionales $salida)
    {
        $pdf =  FacadePdf::loadView('pdf.s-ticket', compact('salida'));
        $pdf->setPaper('legal', 'portrait')->setWarnings(false);
        $pdf->set_option('dpi', 300);
        return $pdf->stream(date('d-m-Y') . 'e-ticket' . $salida->vcode . '.pdf');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Movimientos $salidas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Movimientos $salidas)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Movimientos $salida)
    {
        $salida->update([
            'estado' => 'Cancelado'
        ]);
        return redirect()->route('movimientos.salidas.index')->with('cancel', 'Solicitud creada con exito.');
    }
}
