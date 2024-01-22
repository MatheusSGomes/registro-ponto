<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AutenticacaoController extends Controller
{
    public function login(Request $request)
    {
        $credenciais = $request->validate([
            'usuario' => ['required'],
            'password' => ['required'],
        ]);

        if (!Auth::attempt($credenciais)) {
            return response()->json([
                'message' => 'Email ou senha incorreto',
            ], 401);
        }

        return response()->json([
            'message' => 'Login realizado com sucesso',
            'token' => auth()->user()->createToken("API_TOKEN")->plainTextToken,
            'token_type' => 'Bearer',
            'tipo_usuario' => auth()->user()->tipousuario_id
        ], 200);
    }
}
