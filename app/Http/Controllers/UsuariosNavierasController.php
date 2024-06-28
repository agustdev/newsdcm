<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\usuariosNavieras;

class UsuariosNavierasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $usuarios = User::where('unav_pertenece', auth()->user()->id)
            ->where('tipo', 'N')
            ->get();
        return view('navieras.usuarios.index', compact('usuarios'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('navieras.usuarios.create');
    }

    public function entradasNavieras()
    {

        return view('navieras.entradas.index', compact('entrasnavieras'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->request->add([
            'tipo' => 'N',
            'unav_pertenece' => auth()->user()->id,
            'password' => bcrypt('12345678')
        ]);

        User::create([
            'documento' => $request->documento,
            'name' => $request->name,
            'email' => $request->email,
            'tipo' => $request->tipo,
            'unav_pertenece' => $request->unav_pertenece,
            'password' => $request->password
        ]);
        return redirect()->route('usuarios.navieras.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $usuariosNavieras)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $usuariosNavieras)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $usuariosNavieras)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $usuario)
    {
        $usuario->delete();
        return redirect()->route('usuarios.navieras.index')->with('info', 'ok');
    }
}
