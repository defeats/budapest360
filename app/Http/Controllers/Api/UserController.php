<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function register(Request $request){
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:20', 'min:4', 'unique:users,name'],
            'email' => ['required', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'string', 'confirmed',
                            Password::min(8)->letters()->mixedCase()->numbers()],
        ]);

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
        ]);

        $token = $user->createToken('auth-api-token')->plainTextToken;

        return response()->json([
            'user' => $user,
            'token' => $token
        ], 201);
    }

    public function login(Request $request){
        $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'string'],
            'device_id' => ['string']
        ]);

        $credentials = [
            'email' => $request->email,
            'password' => $request->password,

        ];

        if (!Auth::attempt($credentials)) {
            return response()->json(['message' => 'Invalid credentials'], 418);
        }

        $user = auth()->user();

        $existingToken = $user->tokens()->where('name', $request->device_id ." | ". $request->userAgent())->first();

        if ($existingToken) {
            $existingToken->delete();
        }

        $token = $user->createToken($request->device_id ." | ". $request->userAgent(), ['*'], now()->addWeek())->plainTextToken;

        return response()->json([
            'user' => $user,
            'token' => $token
        ], 200);
    }

    public function logout(Request $request){
        $request->user()->currentAccessToken()->delete();

        return response()->json(['msg' => 'Logged out successfully'], 200);
    }

    public function user(Request $request) {
        return response()->json($request->user(), 200);
    }

    public function checkAdminToken(Request $request) {
        if ($request->bearerToken()) {
            return response()->json(['msg' => 'Token is valid'], 200);
        }
        return response()->json(['msg' => 'Unauthorized'], 401);
    }
}
