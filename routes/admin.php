<?php

use App\Http\Controllers\Admin\AdminsController;
use App\Http\Controllers\Admin\AdminSolicitudesController;
use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Http\Controllers\AuthenticatedSessionController;
use Laravel\Jetstream\Http\Controllers\Livewire\UserProfileController;

// Route::get('/login', [AdministratorController::class, 'login'])->name('admin.login');

Route::group(
    ['middleware' => ['auth', 'verified']],
    function () {
        Route::get('/dashboard', [AdminsController::class, 'index'])->name('admin.dashboard');
        Route::get('/estadisticas/exportar', [AdminSolicitudesController::class, 'exportarEstadisticas'])->name('estadisticas.exportar');
        Route::resource('/solicitud', AdminSolicitudesController::class)->names('admin.solicitudes');
        Route::get('/historial/solicitudes', [AdminSolicitudesController::class, 'history'])->name('admin.solicitudes.history');
        Route::get('/user/profile', [UserProfileController::class, 'show'])->name('admin.profile.show');
        Route::get('/alertas/', [AdminSolicitudesController::class, 'alertas'])->name('admin.alertas');
        Route::get('/verificacion', [AdminSolicitudesController::class, 'verificacion'])->name('admin.verificacion');
        Route::post('/verificacion/consulta', [AdminSolicitudesController::class, 'cverificacion'])->name('admin.cverificacion');
        Route::get('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('admin.logout');
    }
);
