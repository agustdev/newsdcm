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

Route::get('/consulta_cedula', [ConsultasController::class, 'consultar']);

// views sdcm 
Route::group(['middleware' => ['auth', 'verified']], function () {
    // Route::get(
    //     'propietarios/solicitud/despacho',
    //     'SolicitudesPropietariosController@despachos'
    // )->name('propietarios.despacho');

    Route::resource('despachos', DespachosController::class)->names('movimientos.despachos');
    Route::post('despachos/post', [DespachosController::class, 'create_with_post'])->name('despachos.createpost');
    Route::post('/consulta_embarcacion', [ConsultasController::class, 'consultar_embarcacion'])->name('consulta.embarcacion');

    Route::resource('conduces', ConducesController::class)->names('movimientos.conduces');
    Route::resource('embarcaciones', EmbarcacioneController::class)->names('embarcaciones');
    Route::resource('movimientos', MovimientosController::class)->names('movimientos');

    Route::get('movimientos/{movimiento}/pdf', [DespachosController::class, 'generate_pdf'])->name('despachos.pdf');
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
