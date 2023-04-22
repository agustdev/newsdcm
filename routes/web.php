<?php

use App\Http\Controllers\DespachosController;
use App\Http\Controllers\EmbarcacioneController;
use App\Http\Controllers\ConducesController;
use App\Http\Controllers\ConsultasController;
use App\Http\Controllers\MovimientosController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/consulta_cedula', [ConsultasController::class, 'consultar_cedula']);

// views sdcm 
Route::group(['middleware' => ['auth', 'verified']], function () {
    // Route::get(
    //     'propietarios/solicitud/despacho',
    //     'SolicitudesPropietariosController@despachos'
    // )->name('propietarios.despacho');

    Route::resource('despachos', DespachosController::class)->names('movimientos.despachos');
    Route::resource('conduces', ConducesController::class)->names('movimientos.conduces');
    Route::resource('embarcaciones', EmbarcacioneController::class)->names('embarcaciones');
    Route::resource('movimientos', MovimientosController::class)->names('movimientos');
});
//end views sdcm

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/quick-access', function () {
        return view('quick-access');
    })->name('acceso.rapido');
});
