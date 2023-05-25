<?php

use App\Models\Movimientos;

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
