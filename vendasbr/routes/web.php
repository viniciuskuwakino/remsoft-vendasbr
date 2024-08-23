<?php

use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ProfileController;
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

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/cliente', [ClienteController::class, 'index'])->name('cliente.index');
    Route::get('/cliente/cadastro', [ClienteController::class, 'create'])->name('cliente.create');
    Route::post('/cliente/cadastro', [ClienteController::class, 'store'])->name('cliente.store');
    Route::get('/cliente/alterar/{id}', [ClienteController::class, 'update'])->name('cliente.update');
    Route::put('/cliente/alterar', [ClienteController::class, 'att'])->name('cliente.att');
    Route::delete('/cliente/delete/{id}', [ClienteController::class, 'destroy'])->name('cliente.destroy');
});

require __DIR__.'/auth.php';
