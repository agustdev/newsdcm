<?php

use App\Models\Destinos;
use App\Models\Embarcaciones;
use App\Models\Movimientos;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

if (!function_exists('get_all_count_solicitudes')) {
    function get_all_count_solicitudes()
    {
        $total_solicitudes = Movimientos::whereIn('estado', ['Enviado', 'En proceso'])->count();
        return $total_solicitudes;
    }
}

if (!function_exists('get_all_count_alertas')) {
    function get_all_count_alertas()
    {
        $total_solicitudes = Movimientos::whereIn('estado', ['Aprobado'])->where('estado_alerta', null)->count();
        return $total_solicitudes;
    }
}

if (!function_exists('get_msj_alert')) {
    function get_msj_alert()
    {
        $destinos = Destinos::where('despachos', 1)->orWhere('conduces', 1)->get();
        if (!empty($destinos)) {
            $restriccion = DB::table('motivo_restriccions')->where('estado', 'Activa')->first();
        } else {
            $restriccion = [];
        }
        return ['Destinos' => $destinos, 'Restriccion' => $restriccion];
    }
}

if (!function_exists('get_emb_arribo')) {
    function get_emb_arribo($matricula)
    {
        $embarcacion = Embarcaciones::where('user_id', auth()->id())
            ->where('matricula', $matricula)
            ->where('estado_movimiento', 2)
            ->count();
        return $embarcacion;
    }

    // $fechaActual = Carbon::parse('2025-07-15');
    // $fechaLlegada = Carbon::parse('2025-07-20');

    // $diferenciaEnDias = $fechaLlegada->diffInDays($fechaActual);

    // echo "Diferencia en días: " . $diferenciaEnDias . "\n";
}
