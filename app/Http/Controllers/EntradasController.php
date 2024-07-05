<?php

namespace App\Http\Controllers;

use App\Models\CapitanesInternacionales;
use App\Models\Destinos;
use App\Models\EmbarcacionesInternacionales;
use App\Models\MovimientosInternacionales;
use App\Models\Nacionalidades;
use App\Models\Pasajeros;
use App\Models\Tripulantes;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;
use Barryvdh\DomPDF\PDF as DomPDFPDF;
use PDF;
use Illuminate\Support\Facades\File;

class EntradasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $entradas = Movimientos::where('tipo_movimiento', 'E')->orderBy('id', 'desc')->get();
        $entradas = auth()->user()->movimientos_internacionales()->where('tipo_movimiento', 'E')->orderBy('id', 'desc')->get();
        return view('movimientos.entradas.index', compact('entradas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $ultimo_mov = auth()->user()->movimientos_internacionales()->orderBy('id', 'DESC')->first();
        $destinos = Destinos::all();
        $nacionalidades = Nacionalidades::all();
        return view('movimientos.entradas.create', compact('ultimo_mov', 'destinos', 'nacionalidades'));
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
            'fecha_llegada' => 'required'
        ]);

        $embarcacion = EmbarcacionesInternacionales::create([
            'matricula' => $request->matricula,
            'nombre' => $request->nombre,
            'no_chasis' => $request->numero_casco,
            'color' => $request->color,
            'material_casco' => $request->material_casco,
            'fecha_validez' => Carbon::parse($request->fecha_llegada)->addDays(30),
            'capacidad_personas' => $request->cantidad_pasajeros,
            'capacidad_tripulantes' => $request->cantidad_tripulantes,
            'tipo_motor' => $request->tipo_motor,
            'marca_modelo_motor' => $request->marca_modelo_motor,
            'caballos_fuerza_motor' => $request->caballos_fuerza_motor,
            'no_motor' => $request->no_motor,
            'estatus' => 'A',
            'eslora' => $request->eslora,
            'manga' => $request->manga,
            'puntal' => $request->puntal,
            'tipo_embarcacion' => $request->tipo_embarcacion,
            'tipo_uso' => $request->tipo_uso,
            'pais_procedencia' => $request->pais_procedencia,
            'puerto_registro' => $request->puerto_salida,
            'nombre_propietario' => $request->nombre_capitan,
            'no_documento' => $request->documento_cap,
            'impedimento' => 0
        ]);

        $mov = MovimientosInternacionales::create([
            'matricula' => $request->matricula,
            'numero_casco' => $request->numero_casco,
            'nombre' => $request->nombre,
            'color' => $request->color,
            'fecha' => $request->fecha_llegada,
            'marca_modelo_motor' => $request->marca_modelo_motor,
            'caballos_fuerza_motor' => $request->caballos_fuerza_motor,
            'no_motor' => $request->no_motor,
            'tipo_movimiento' => 'E',
            'estado' => 'Enviado',
            'estado_alerta' => 'N/A',
            'emb_inter_id' => $embarcacion->id,
            'user_id' => auth()->user()->id,
            'vcode' => strtoupper(substr(md5(Str::uuid()->toString()), 1, 6)),
            'url_id' => Str::uuid()->toString()
        ]);

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
        $tripulantes->toQuery()->update([
            'mov_id' => $mov->id
        ]);

        $pasajeros = Pasajeros::where('userid', auth()->user()->id)->get();
        $pasajeros->toQuery()->update([
            'mov_id' => $mov->id
        ]);

        return redirect()->route('movimientos.entradas.index')->with('msj', 'Solicitud creada con exito.');
    }

    /**
     * Display the specified resource.
     */
    public function show(MovimientosInternacionales $entrada)
    {
        return view('movimientos.entradas.ver', compact('entrada'));
    }

    public function eticket(MovimientosInternacionales $entrada)
    {
        $pdf =  FacadePdf::loadView('pdf.e-ticket', compact('entrada'));
        $pdf->setPaper('legal', 'portrait')->setWarnings(false);
        $pdf->set_option('dpi', 300);
        return $pdf->stream(date('d-m-Y') . 'e-ticket' . $entrada->vcode . '.pdf');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MovimientosInternacionales $movimiento)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, MovimientosInternacionales $movimiento)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MovimientosInternacionales $entrada)
    {
        $entrada->update([
            'estado' => 'Cancelado'
        ]);
        return redirect()->route('movimientos.entradas.index')->with('cancel', 'Solicitud creada con exito.');
    }
}
