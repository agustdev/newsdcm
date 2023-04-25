<?php

use App\Http\Controllers\Admin\AdministratorController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;

Route::get('/login', [AdministratorController::class, 'login'])->name('admin.login');
Route::get('/dashboard', [HomeController::class, 'index'])->name('admin.home');
