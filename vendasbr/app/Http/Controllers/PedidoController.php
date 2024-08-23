<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use Illuminate\Http\Request;
use Inertia\Inertia;


class PedidoController extends Controller
{
    public function index(Request $request) {
        $pedido = Pedido::query()->orderBy('nome')->get();
        return Inertia::render('Pedido/List', [
            'pedido' => $pedido
        ]);
    }
    
    public function show(Request $request) {

    }

    public function store(Request $request) {
        Pedido::create([
            'nome' => $request['nome'],
            'preco' => $request['preco'],
            'status' => $request['status']
            
        ]);
        return redirect()->route('pedido.index');
    }

    public function att(Request $request) {
        $pedido = Pedido::find($request['id']);

        $pedido->nome = $request['nome'];
        $pedido->preco = $request['preco'];
        $pedido->status = $request['status'];
        $pedido->save();

        return redirect()->route('pedido.index');

    }

    public function create(Request $request) {

        $pedido = Pedido::find($request['id']);
        return Inertia::render('Pedido/Create');
    }

    public function update(Request $request) {
        $pedido = Pedido::find($request['id']);
        return Inertia::render('Pedido/Update', [
            'pedido' => $pedido
        ]);
    }

    public function delete($id) {
        Pedido::destroy($id);
        return redirect()->route('pedido.index');
    }
}

