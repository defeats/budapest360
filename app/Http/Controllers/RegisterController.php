<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function __invoke(Request $request) {
        
        $userData = $request->validate([
            'name' => ['required', 'string', 'unique:users'],
            'email' => ['required', 'email', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $userData['password'] = bcrypt($userData['password']);

        $user = User::create($userData);

        Auth::login($user);

        return redirect()->route('welcome');
    }
}
