<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    function register(Request $request) {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8'
        ]);

        $user = User::create([
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);

        return response()->json([
            'message' => 'Register success',
            'data' => $user
        ], 201);
    }
    
    function login(Request $request) {
        if (!Auth::attempt($request->only('email', 'password'))) {
            return response()->json([
                'message' => 'Bad Credentials'
            ], 401);
        }

        $user = User::where('email', $request->email)->first();

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'token' => $token,
            'data' => $user
        ]);
    }

    function logout(Request $request) {
        $request->user()->currentAccessToken()->delete();
        return response()->json(['message' => 'Logged Out']);
    }

    function user(Request $request) {
        return response()->json($request->user());
    }
}
