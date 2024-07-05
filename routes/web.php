<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\DespachosController;
use App\Http\Controllers\EmbarcacioneController;
use App\Http\Controllers\ConducesController;
use App\Http\Controllers\ConsultasController;
use App\Http\Controllers\EntradasController;
use App\Http\Controllers\LangController;
use App\Http\Controllers\SalidasController;
use App\Http\Controllers\MovimientosController;
use App\Http\Controllers\MovimientosNavierasController;
use App\Http\Controllers\SolicitudesNavierasController;
use App\Http\Controllers\UsuariosNavierasController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::post('lang_change', [LangController::class, 'switchLang'])->name('lang.switch');
Route::post('/consulta_cedula', [ConsultasController::class, 'consultar'])->name('consultar.cedula');
Route::get('/consulta_pasaporte', [ConsultasController::class, 'consult_passport'])->name('consultar.pasaporte');
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

    Route::resource('entradas', EntradasController::class)->names('movimientos.entradas');
    Route::post('entradas/post', [EntradasController::class, 'create_with_post'])->name('entradas.createpost');
    Route::get('entrada/e-ticket/{entrada}/pdf', [EntradasController::class, 'eticket'])->name('pdf.eticket');

    Route::resource('salidas', SalidasController::class)->names('movimientos.salidas');
    Route::post('salidas/post', [SalidasController::class, 'create_with_post'])->name('salidas.createpost');
    Route::get('salida/e-ticket/{salida}/pdf', [SalidasController::class, 'eticket'])->name('salida.pdf.eticket');


    Route::resource('embarcaciones', EmbarcacioneController::class)->names('embarcaciones');
    Route::resource('movimientos', MovimientosController::class)->names('movimientos');

    Route::post('movimientos/{movimiento}/pdf', [MovimientosController::class, 'generate_pdf'])->name('movimientos.pdf');
    Route::post('movimientos/{movimiento}/preview', [MovimientosController::class, 'generate_pdf'])->name('movimientos.preview');

    // modulo para navieras
    Route::resource('navieras/usuarios', UsuariosNavierasController::class)->names('usuarios.navieras');
    Route::get('navieras/solicitudes/entradas', [MovimientosNavierasController::class, 'entradasNavieras'])->name('solicitudes.navieras.entradas');
    Route::get('navieras/solicitudes/salidas', [MovimientosNavierasController::class, 'salidasNavieras'])->name('solicitudes.navieras.salidas');
    Route::get('navieras/solicitudes/entradas/create', [MovimientosNavierasController::class, 'entradasNavierasCreate'])->name('solicitudes.navieras.entradas.create');
    Route::post('navieras/solicitudes/entradas/store', [MovimientosNavierasController::class, 'entradasNavierasStore'])->name('solicitudes.navieras.entradas.store');
    Route::get('navieras/solicitudes/salidas/create', [MovimientosNavierasController::class, 'salidasNavierasCreate'])->name('solicitudes.navieras.salidas.create');
    Route::post('navieras/solicitudes/salidas/store', [MovimientosNavierasController::class, 'salidasNavierasStore'])->name('solicitudes.navieras.salidas.store');
});
//end views sdcm


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/redirects', [HomeController::class, 'index'])->name('redireccion')->middleware('auth');
});
