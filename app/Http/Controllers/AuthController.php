<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{
    // Registrar usuario
    public function register(Request $request)
    {
        $user = $request->user();

        // Solo admin puede asignar rol en el registro
        $role = 'user';
        if ($user && $user->role === 'admin' && $request->has('role')) {
            $role = $request->input('role');
            if (!in_array($role, ['admin', 'user'])) {
                return response()->json(['message' => 'Rol inválido'], 422);
            }
        }

        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);
        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'role' => $role,
        ]);
        return response()->json(['message' => 'Usuario registrado correctamente']);
    }

    // Login
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ],
        [
            'email.required' => 'El correo electrónico es obligatorio.',
            'email.unique'   => 'El correo electrónico ya está en uso.',
            'password.min'   => 'La contraseña debe tener mínimo 6 caracteres.'
        ]);
        if (!$token = auth('api')->attempt($credentials)) {
            return response()->json(['message' => 'Credenciales inválidas'], 401);
        }
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => JWTAuth::factory()->getTTL() * 60
        ]);
    }

    // Logout
    public function logout()
    {
        auth('api')->logout();
        return response()->json(['message' => 'Sesión cerrada correctamente']);
    }
}
