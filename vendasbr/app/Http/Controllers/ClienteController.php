<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Inertia\Inertia;

class ClienteController extends Controller
{
    public function index(Request $request)
    {
        $clientes = Cliente::all();

        return Inertia::render('Cliente/List', [
            'clientes' => $clientes
        ]);

    }

    public function create(Request $request)
    {   
        return Inertia::render('Cliente/Create');
    }
    // registrar no banco
    public function store(Request $request)
    {
        Cliente::create([
            'nome' => $request['name'],
            'email' => $request['email'],
            'cpf' => $request['cpf'],
            'senha' => Hash::make( $request['senha']),
            'endereco' => $request['endereco']
        ]);

        return redirect()->route('cliente.index');
    }

    public function show(Request $request)
    {
        
    }

    public function destroy($id)
    {
        Cliente::destroy($id);
        return redirect()->route("cliente.index");
    }

    public function update(Request $request)
    {
        $cliente = Cliente::find($request['id']);
        return Inertia::render('Cliente/Update', [
            'cliente' => $cliente
        ]);

    }

    public function att(Request $request)
    {
        $cliente = Cliente::find($request['id']);
        $cliente->nome = $request['name'];
        $cliente->email = $request['email'];
        $cliente->cpf = $request['cpf'];
        $cliente->senha = '';
        $cliente->endereco = $request['endereco'];
        $cliente->save();
        return redirect()->route('cliente.index');
    }
}
