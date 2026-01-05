<?php

namespace App\Http\Controllers;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function __invoke(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
 
        if (Auth::attempt($credentials, $request->boolean('remember'))) {
            $request->session()->regenerate();
 
            return redirect()->intended('welcome');
        }
 
        return back()->withErrors([
            'email' => 'A megadott hitelesítő adatok nem egyeznek a nyilvántartásunkkal.',
        ])->onlyInput('email');
    }
}
