<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthRequest;
use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    /**
    *   Rota para cadastro de usuário
    *   Retorna o usuário criado e um token.
    *   @param \App\Http\Requests\AuthRequest $request
    *   @return \Illuminate\Http\Response
    */

    public function register(AuthRequest $request) {
        $input = $request->all();

        $input['password'] = bcrypt($input['password']);

        $user = User::create($input);

        $token = $user->createToken($request->name);

        return response()->json([
            'message'   => 'Cadastrado com sucesso!',
            'username'  => $user->name,
            'email'     => $user->email,
            'token'     => $token->plainTextToken,
        ]);
    }

    /**
    *   Rota para checagem credencial de usuário
    *   Retorna o usuário criado e um token.
    *   @param \App\Http\Requests\AuthRequest $request
    *   @return \Illuminate\Http\Response
    */
    public function login(LoginRequest $request) {
        if (! Auth::attempt(['email' => $request->email, 'password' => $request->input('password')], true)) {
            return response()->json([
                'message' => 'Credenciais inválidas'
            ], Response::HTTP_UNAUTHORIZED);
        }

        $user = User::where('email', $request->email)->first();

        $token = $user->createToken($user->name);

        return response()->json([
            'message'   => 'Logado com sucesso!',
            'user'      => $user,
            'token'     => $token->plainTextToken,
        ]);
    }

    /**
    *   Rota para logout de usuário
    *   Apaga os tokens da sessão do usuário.
    *   @param \App\Http\Requests\AuthRequest $request
    *   @return \Illuminate\Http\Response
    */
    public function logout(Request $request) {
        $request->user()->tokens()->delete();

        return response()->json([
            'message' => 'Deslogado com sucesso'
        ]);
    }
}
