<?php

use App\Http\Controllers\TarjetCreditoController;
use App\Http\Controllers\TipoAdeudoController;
use App\Http\Controllers\IngresosController;

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');

    Route::resource('tarjeta-credito', TarjetCreditoController::class);
    Route::resource('Ingresos', IngresosController::class);
    Route::resource('tipo-adeudos', TipoAdeudoController::class);

});

