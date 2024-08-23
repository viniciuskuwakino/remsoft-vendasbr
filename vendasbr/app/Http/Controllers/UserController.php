<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Inertia\Inertia;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $users = User::all();
        return Inertia::render('Funcionario/List', [
            'users'=> $users
        ]);
    }
    
    public function show(Request $request)
    {
        return Inertia::render('Funcionario/Show');
    }

    public function create(Request $request)
    {
        return Inertia::render('Funcionario/Create');
    }
    
    public function store(Request $request)
    {
        User::create([
            'name' => $request['name'],
            'email' => $request['email'] ,
            'cpf' => $request['cpf'],
            'password' => Hash::make($request['password'])
        ]);

        return redirect()->route('funcionario.index');
    }
    
    public function update(Request $request)
    {
        $user = User::find($request['id']);
        return Inertia::render('Funcionario/Update', [
            'user'=> $user
        ]);
    }

    public function att(Request $request)
    {
        $user = User::find($request['id']);
        $user->name = $request['name'];
        $user->email = $request['email'];
        $user->cpf = $request['cpf'];
        $user->password = $request['password'];
        $user->save();
        return redirect()->route('funcionario.index');
    }

    public function destroy(Request $request)
    {
        User::destroy($request['id']);
        return redirect()->route('funcionario.index');
    }
}
