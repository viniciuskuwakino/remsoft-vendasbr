<?php

use App\Http\Controllers\ClienteController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Models\Pedido;
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
    
    Route::get('/cliente', [ClienteController::class, 'index'])->name('cliente.index');
    Route::get('/cliente/cadastro', [ClienteController::class, 'create'])->name('cliente.create');
    Route::post('/cliente/cadastro', [ClienteController::class, 'store'])->name('cliente.store');
    Route::get('/cliente/alterar/{id}', [ClienteController::class, 'update'])->name('cliente.update');
    Route::put('/cliente/alterar', [ClienteController::class, 'att'])->name('cliente.att');
    Route::delete('/cliente/delete/{id}', [ClienteController::class, 'destroy'])->name('cliente.destroy');
  
    Route::get('/pedido', [PedidoController::class, 'index'])->name('pedido.index');
    Route::get('/pedido/cadastro', [PedidoController::class, 'create'])->name('pedido.create');
    Route::post('/pedido/cadastro', [PedidoController::class, 'store'])->name('pedido.store');
    Route::get('/pedido/atualizar/{id}', [PedidoController::class, 'update'])->name('pedido.update');
    Route::put('/pedido/atualizar', [PedidoController::class, 'att'])->name('pedido.att');
    Route::delete('/pedido/{id}', [PedidoController::class, 'delete'])->name('pedido.delete');
});

require __DIR__.'/auth.php';
