<?php

use App\Http\Controllers\HomeController;
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
Route::get('/verificacion/{solicitud}/solicitud', [ConsultasController::class, 'verificacionSolicitud'])->name('verificacion.solicitud');

// views sdcm 
Route::group(['middleware' => ['auth', 'verified']], function () {
    Route::get('/acceso-rapido', function () {
        return view('quick-access');
    })->name('acceso.rapido');

    Route::post('/consulta_embarcacion', [ConsultasController::class, 'consultar_embarcacion'])->name('consulta.embarcacion');
    Route::post('get/municipios', [ConsultasController::class, 'get_municipios'])->name('get.municipios');

    Route::post('get/comandancia', [ConsultasController::class, 'get_comandancia'])->name('get.comandancia');

    Route::resource('despachos', DespachosController::class)->names('movimientos.despachos');
    Route::post('despachos/post', [DespachosController::class, 'create_with_post'])->name('despachos.createpost');


    Route::resource('conduces', ConducesController::class)->names('movimientos.conduces');
    Route::post('conduces/post', [ConducesController::class, 'create_with_post'])->name('conduces.createpost');

    Route::resource('embarcaciones', EmbarcacioneController::class)->names('embarcaciones');
    Route::resource('movimientos', MovimientosController::class)->names('movimientos');

    Route::post('movimientos/{movimiento}/pdf', [MovimientosController::class, 'generate_pdf'])->name('movimientos.pdf');
    Route::post('movimientos/{movimiento}/preview', [MovimientosController::class, 'generate_pdf'])->name('movimientos.preview');
});
//end views sdcm


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/redirects', [HomeController::class, 'index'])->name('redireccion')->middleware('auth');
});
