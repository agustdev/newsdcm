<?php

namespace App\Http\Controllers;

use App\Models\Movimientos;
use Illuminate\Http\Request;

class DespachosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $despachos = Movimientos::where('tipo_movimiento', 'D')->get();
        // $user = auth()->user()->movimientos;
        // return response()->json($despachos);
        return view('movimientos.despachos.index', compact('despachos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('movimientos.despachos.create');
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
    public function show(Movimientos $despacho)
    {
        return view('movimientos.despachos.ver', compact('despacho'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Movimientos $despacho)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Movimientos $despacho)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Movimientos $despacho)
    {
        //
    }
}
