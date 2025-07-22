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

if (!function_exists('get_emb_request_today')) {
    function get_emb_request_today()
    {
        $embarcacion = Movimientos::join('embarcaciones', 'movimientos.matricula', 'embarcaciones.matricula')
            ->where('user_id', auth()->id())
            ->whereRaw('CAST(fecha_llegada AS DATE) = CAST(NOW() AS DATE)')
            ->where('movimientos.estado', 'Aprobado');
        return $embarcacion;
    }
}

if (!function_exists('get_emb_request_next_days')) {
    function get_emb_request_next_days()
    {
        $embarcacion = Movimientos::join('embarcaciones', 'movimientos.matricula', 'embarcaciones.matricula')
            ->where('user_id', auth()->id())
            ->whereRaw('CAST(fecha_llegada AS DATE) > CAST(NOW() AS DATE)')
            ->where('estado_movimiento', 2);
        return $embarcacion;
    }
}
