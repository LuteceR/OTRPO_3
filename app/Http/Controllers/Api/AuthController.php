<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'login' => 'required|string',
            'password' => 'required|string',
        ]);

        $loginInput = $request->login;

        $credentials = (strpos($loginInput, '@') !== false && strpos($loginInput, '.') !== false)
            ? ['email' => $loginInput, 'password' => $request->password]
            : ['name' => $loginInput, 'password' => $request->password];

        if (!Auth::attempt($credentials)) {
            return response()->json(['message' => 'Неверный логин или пароль'], 401);
        }

        $user = Auth::user();

        // создаём токен через Sanctum
        $token = $user->createToken('api-token')->plainTextToken;

        return response()->json([
            'user_id' => $user->id,
            'is_admin' => $user->is_admin,
            'token' => $token,
        ]);
    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return response()->json(['message' => 'Вы вышли']);
    }
}
