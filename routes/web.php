<?php

use App\Http\Controllers\TarjetCreditoController;
use App\Http\Controllers\TipoAdeudoController;
use App\Http\Controllers\IngresosController;
use App\Http\Controllers\DeudasController;
use App\Http\Controllers\QuincenasController;
use App\Http\Controllers\PresupuestosController;
use App\Http\Controllers\SimulacionController;

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

    Route::resource('tarjetas', TarjetCreditoController::class);
    Route::resource('Ingresos', IngresosController::class);
    Route::resource('Adeudos', TipoAdeudoController::class);
    Route::resource('Deudas', DeudasController::class);
    Route::resource('Quincenas', QuincenasController::class);
    Route::resource('Presupuestos', PresupuestosController::class);
    Route::resource('Simulacion', SimulacionController::class);

    Route::get('/tarjeta-credito/pagar/{id}', [TarjetCreditoController::class, 'pagar'])->name('tarjeta-credito.pagar');
});

