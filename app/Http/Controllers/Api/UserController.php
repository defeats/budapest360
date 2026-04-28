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
    public function register(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:20', 'min:4', 'unique:users,name'],
            'email' => ['required', 'email', 'max:255', 'unique:users,email'],
            'password' => [
                'required',
                'string',
                Password::min(8)->letters()->mixedCase()->numbers()
            ]
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

    public function login(Request $request)
    {
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
            return response()->json(['msg' => 'Invalid credentials'], 418);
        }

        $user = auth()->user();

        $existingToken = $user->tokens()->where('name', $request->device_id . " | " . $request->userAgent())->first();

        if ($existingToken) {
            $existingToken->delete();
        }

        $token = $user->createToken($request->device_id . " | " . $request->userAgent(), ['*'], now()->addWeek())->plainTextToken;

        return response()->json([
            'user' => $user,
            'token' => $token
        ], 200);
    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return response()->json(['msg' => 'Logged out successfully'], 200);
    }

    public function user(Request $request)
    {
        return response()->json($request->user(), 200);
    }

    public function index(Request $request)
    {
        if (auth()->user()->role === "admin") {
            $users = User::all();
            if (isset($users) && $users->count() > 0) {
                return response()->json(['users' => $users]);
            }
            return response()->json(['msg' => 'There are no users in the DB'], 404);
        } else {
            return response()->json(['msg' => 'You do not have permission to update this place'], 403);
        }
    }

    public function update(Request $request, User $user) {
        if (auth()->user()->role === "admin") {
            $validated = $request->validate([
                'name' => ['required', 'string', 'max:20', 'min:4', 'unique:users,name,' . $user->id],
                'email' => ['required', 'email', 'max:255', 'unique:users,email,' . $user->id],
                'role' => ['required', 'string']
            ]);

            $user->update([
                'name' => $validated['name'],
                'email' => $validated['email'],
                'role' => $validated['role']
            ]);

            return response()->json(['msg' => 'User was updated successfully'], 201);
        }
        return response()->json(['msg' => 'You do not have permission to update this place'], 403);
    }

    public function destroy(Request $request, User $user)
    {
        if (auth()->user()->role === "admin") {
            $user->delete();
            return response()->json(['msg' => 'User was deleted successfully'], 201);
        } else {
            return response()->json(['msg' => 'You do not have permission to update this place'], 403);
        }
    }

    public function checkTokenExpiryDate(Request $request)
    {
        $user = auth()->user();

        if (!$user->tokens()->exists()) {
            return response()->json([
                'has_tokens' => false,
                'tokens' => []
            ], 200);
        }

        $tokens = $user->tokens()->get()->map(function ($token) {
            return [
                'id' => $token->id,
                'name' => $token->name,
                'last_used_at' => $token->last_used_at,
                'expires_at' => $token->expires_at,
                'is_expired' => $token->expires_at ? $token->expires_at->isPast() : false,
                'days_until_expiry' => $token->expires_at ? now()->diffInDays($token->expires_at, false) : null,
            ];
        });

        return response()->json([
            'has_tokens' => true,
            'user_id' => $user->id,
            'tokens' => $tokens
        ], 200);
    }
}