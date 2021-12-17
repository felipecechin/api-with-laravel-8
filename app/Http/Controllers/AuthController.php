<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller {
    public function login(Request $request) {
        $credenciais = $request->all(['email', 'password']);
        //email = ficechin@hotmail.com - senha = 1234
        $token = auth('api')->attempt($credenciais);
        if ($token) {
            return response()->json(['token' => $token]);
        } else {
            return response()->json(['erro' => 'Usuário ou senha inválido.'], 403);
        }
    }

    public function logout() {
        auth('api')->logout();
        return response()->json(['msg' => 'Logout foi feito com sucesso']);
    }

    public function refresh() {
        $token = auth('api')->refresh(); //cliente encaminhe um jwt válido;
        return response()->json(['token' => $token]);
    }

    public function me() {
        return response()->json(auth()->user());
    }
}
