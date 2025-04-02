<?php

use App\Models\Destinos;
use App\Models\Movimientos;
use Illuminate\Support\Facades\DB;

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
