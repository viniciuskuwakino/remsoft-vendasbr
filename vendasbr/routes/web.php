<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
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

    Route::get('/funcionario',[UserController::class,'index'])->name('funcionario.index');

    Route::get('/funcionario/cadastro',[UserController::class,'create'])->name('funcionario.create');
    Route::post('/funcionario/cadastro',[UserController::class,'store'])->name('funcionario.store');

    Route::get('/funcionario/update/{id}',[UserController::class,'update'])->name('funcionario.update');
    Route::put('/funcionario/update',[UserController::class,'att'])->name('funcionario.att');

    Route::get('/funcionario/show',[UserController::class,'show'])->name('funcionario.show');
    Route::delete('/funcionario/delete/{id}',[UserController::class,'destroy'])->name('funcionario.destroy');
    
});

require __DIR__.'/auth.php';
