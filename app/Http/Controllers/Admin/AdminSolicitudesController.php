<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Movimientos;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\EstadisticasExport;
use App\Models\User;
use App\Notifications\EnviarSolicitud;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class AdminSolicitudesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $solicitudes = Movimientos::WhereIn('estado', ['Enviado', 'En proceso'])->get();
        return view('admin.solicitudes.index', compact('solicitudes'));
    }

    public function alertas()
    {
        $solicitudes = Movimientos::WhereIn('estado', ['Aprobado'])->get();
        return view('admin.solicitudes.index', compact('solicitudes'));
    }

    public function history()
    {
        $solicitudes = Movimientos::WhereIn('estado', ['Aprobado', 'Rechazado'])->get();
        return view('admin.solicitudes.index', compact('solicitudes'));
    }

    public function verificacion()
    {
        return view('admin.solicitudes.verificacion');
    }

    public function cverificacion(Request $request)
    {
        $solicitud = Movimientos::with('capitan')->where('vcode', $request->vcode)->first();
        return view('admin.solicitudes.rverificacion', compact('solicitud'));
    }

    public function exportarEstadisticas()
    {
        return Excel::download(new EstadisticasExport, 'estadisticas-movimientos-' . date('d-m-Y H:i:s') . '.xlsx');
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Movimientos $solicitud)
    {
        $estados = array('En proceso', 'Aprobado', 'Rechazado', 'Cancelado');
        if (!in_array($solicitud->estado, $estados)) {
            $solicitud->update(
                [
                    'estado' => 'En proceso'
                ]
            );
        }
        return view('admin.solicitudes.show', compact('solicitud'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Movimientos $solicitud)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Movimientos $solicitud)
    {
        $usuario =  User::where('id', $solicitud->user_id)->first();
        $solicitud->update([
            'estado' => $request->estado
        ]);

        (new Movimientos)->forceFill([
            'nombre' => $usuario->name,
            'email' => $usuario->email,
            'tipo_solicitud' => $solicitud->tipo_movimiento,
            'numero_solicitud' => $solicitud->id,
            'estado' => $request->estado
        ])->notify(new EnviarSolicitud());

        return redirect()->route('admin.solicitudes.show', $solicitud)->with('msj', 'ok');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Movimientos $solicitud)
    {
        //
    }
}
