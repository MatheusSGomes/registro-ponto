<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller
{
    public function index()
    {
        return Usuario::all();
    }

    public function store(Request $request)
    {
        return Usuario::create([
            "nome" => $request->nome,
            "email" => $request->email,
            "tipousuario_id" => $request->tipousuario_id,
            "password" => Hash::make($request->password),
        ]);
    }

    public function show(Usuario $usuario)
    {
        return $usuario;
    }

    public function update(Request $request, Usuario $usuario)
    {
        return $usuario->updateOrFail($request->all());
    }

    public function destroy(Usuario $usuario)
    {
        return $usuario->delete();
    }
}
