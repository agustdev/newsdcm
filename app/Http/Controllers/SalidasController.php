<?php

namespace App\Http\Controllers;

use App\Models\Capitanes;
use App\Models\Destinos;
use App\Models\Embarcaciones;
use App\Models\Movimientos;
use App\Models\Salidas;
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
        $salidas = Movimientos::where('tipo_movimiento', 'S')->orderBy('id', 'desc')->get();
        return view('movimientos.salidas.index', compact('salidas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $ultimo_mov = auth()->user()->movimientos()->orderBy('id', 'DESC')->first();
        return view('movimientos.salidas.create', compact('ultimo_mov'));
    }

    public function create_with_post()
    {
        $matricula = $_POST['emb'];
        $embarcacion = auth()->user()->embarcaciones()->where('matricula', '=', $matricula)->first();
        $ultimo_mov = auth()->user()->movimientos()->orderBy('id', 'DESC')->first();
        return view('movimientos.salidas.create_post', compact('ultimo_mov', 'embarcacion'));
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
        $embarcacion = Embarcaciones::where('id', $request->emb_id)->first();
        $embarcacion->inter_estado = 1;
        $embarcacion->update();

        $mov = Movimientos::create([
            'matricula' => $request->matricula,
            'numero_casco' => $request->numero_casco,
            'nombre' => $request->nombre,
            'color' => $request->color,
            'fecha' => $request->fecha_salida,
            'tipo_movimiento' => 'S',
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
            'lugar_salida' => $request->pais_destino,
            'lugar_destino' => $request->puerto_salida,
            'cantidad_tripulantes' => $request->cantidad_tripulantes,
            'cantidad_pasajeros' => $request->cantidad_pasajeros,
            'mov_id' => $mov->id,
            'dest_sa_id' => 0,
            'dest_ll_id' => 0
        ]);

        return redirect()->route('movimientos.salidas.index')->with('msj', 'Solicitud creada con exito.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Movimientos $salida)
    {
        return view('movimientos.salidas.ver', compact('salida'));
    }
    public function eticket(Movimientos $salida)
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
