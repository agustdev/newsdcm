<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Embarcaciones;
use App\Models\Movimientos;
use App\Models\User;
use Illuminate\Http\Request;

class AdminsController extends Controller
{
    public function index()
    {
        $total_movimientos = Movimientos::count();
        $total_aprove_movimientos = Movimientos::where('estado', 'Aprobado')->count();
        $total_pendent_movimientos = Movimientos::whereIn('estado', ['Enviado', 'En proceso'])->count();
        $total_denied_movimientos = Movimientos::whereIn('estado', ['Rechazado', 'Cancelado'])->count();
        $total_usuarios = User::where('is_admin', '0')->count();
        $total_usuarios_admins = User::where('is_admin', '1')->count();
        $total_embarcaciones = Embarcaciones::count();
        return view('admin.dashboard', compact('total_movimientos', 'total_aprove_movimientos', 'total_pendent_movimientos', 'total_denied_movimientos', 'total_usuarios', 'total_usuarios_admins', 'total_embarcaciones'));
    }
}
