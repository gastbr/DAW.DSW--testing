<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/* Route::get('/fecha', function () {
    $fecha = explode('/', date('l/d/m/Y'));
    return view('fecha', ['fecha' => $fecha]);
}); */

/* Route::get('/fecha', function () {
    $dia = date('l');
    $numero = date('d');
    $mes = date('m');
    $anio = date('Y');
    $fecha = compact('dia', "numero", "mes", "anio");
    return view('fecha', ['fecha' => $fecha]);
}); */

Route::get('/fecha', function() {
    $dia = date('l');
    $numero = date('d');
    $mes = date('m');
    $anio = date('Y');
    $fecha = compact('dia', "numero", "mes", "anio");
    return view('fecha')->with('fecha', $fecha);
});

Route::view('/inicio', 'home');

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
