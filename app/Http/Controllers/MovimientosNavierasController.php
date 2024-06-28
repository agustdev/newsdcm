<?php

namespace App\Http\Controllers;

use App\Models\movimientosNavieras;
use Illuminate\Http\Request;

class MovimientosNavierasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    public function entradasNavieras()
    {
        $entradasnavieras = movimientosNavieras::where('tipo_movimiento', 'NE')->get();
        return view('navieras.entradas.index', compact('entradasnavieras'));
    }

    public function entradasNavierasCreate()
    {
        return view('navieras.entradas.create');
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
    public function show(movimientosNavieras $movimientosNavieras)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(movimientosNavieras $movimientosNavieras)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, movimientosNavieras $movimientosNavieras)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(movimientosNavieras $movimientosNavieras)
    {
        //
    }
}
