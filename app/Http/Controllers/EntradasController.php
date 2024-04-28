<?php

namespace App\Http\Controllers;

use App\Models\Capitanes;
use App\Models\Embarcaciones;
use App\Models\Movimientos;
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
        $entradas = auth()->user()->movimientos()->where('tipo_movimiento', 'E')->orderBy('id', 'desc')->get();
        return view('movimientos.entradas.index', compact('entradas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $ultimo_mov = auth()->user()->movimientos()->orderBy('id', 'DESC')->first();
        return view('movimientos.entradas.create', compact('ultimo_mov'));
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
        $embarcacion = Embarcaciones::create([
            'matricula' => $request->matricula,
            'matricula_anexa' => $request->matricula,
            'nombre' => $request->nombre,
            'no_chasis' => $request->numero_casco,
            'color' => $request->color,
            'fecha_validez' => Carbon::parse($request->fecha_llegada)->addDays(30),
            'capacidad_personas' => $request->cantidad_pasajeros,
            'capacidad_tripulantes' => $request->cantidad_tripulantes,
            'estatus' => 'A',
            'pies_eslora' => 0,
            'plug_eslora' => 0,
            'pies_manga' => 0,
            'pulg_manga' => 0,
            'pies_puntal' => 0,
            'pulg_puntal' => 0,
            'tonelada_bruta' => 0,
            'tonelada_neta' => 0,
            'tipo_embarcacion' => 'TURISMO',
            'tipo_uso' => 'TURISMO',
            'desc_estatus' => 'Activo',
            'estacionamiento' => $request->pais_procedencia,
            'tipo_propietario' => 'P',
            'nombre_propietario' => $request->nombre_capitan,
            'representado_por' => $request->nombre_capitan,
            'no_documento' => $request->documento,
            'dir_propietario' => 'N/A',
            'impedimento' => 0,
            'internacional' => 1,
            'inter_estado' => 0
        ]);
        $mov = Movimientos::create([
            'matricula' => $request->matricula,
            'numero_casco' => $request->numero_casco,
            'nombre' => $request->nombre,
            'color' => $request->color,
            'fecha' => $request->fecha_llegada,
            'tipo_movimiento' => 'E',
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
            'lugar_salida' => $request->pais_procedencia,
            'lugar_destino' => $request->puerto_llegada,
            'cantidad_tripulantes' => $request->cantidad_tripulantes,
            'cantidad_pasajeros' => $request->cantidad_pasajeros,
            'mov_id' => $mov->id,
            'dest_sa_id' => 0,
            'dest_ll_id' => 0
        ]);

        return redirect()->route('movimientos.entradas.index')->with('msj', 'Solicitud creada con exito.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Movimientos $entrada)
    {
        return view('movimientos.entradas.ver', compact('entrada'));
    }

    public function eticket(Movimientos $entrada)
    {
        $pdf =  FacadePdf::loadView('pdf.e-ticket', compact('entrada'));
        $pdf->setPaper('legal', 'portrait')->setWarnings(false);
        $pdf->set_option('dpi', 300);
        return $pdf->stream(date('d-m-Y') . 'e-ticket' . $entrada->vcode . '.pdf');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Movimientos $movimiento)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Movimientos $movimiento)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Movimientos $entrada)
    {
        $entrada->update([
            'estado' => 'Cancelado'
        ]);
        return redirect()->route('movimientos.entradas.index')->with('cancel', 'Solicitud creada con exito.');
    }
}
