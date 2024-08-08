<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Authcontroller extends Controller
{
    public function login() 
    {
        return view('login');
    }

    public function dologin(LoginRequest $request) 
    {
        $credentials = $request->validated();
        if(Auth::attempt($credentials)) {
            $request -> session() -> regenerate();
            return redirect()->intended(route('home'));//provisiore
        }

        return to_route('auth.login')->withErrors([
            'email' => 'Email invalide',
            'password' => 'Mot de passe incorect',
        ])->onlyInput('email');
    }

    public function logout() {
        Auth::logout();
        return to_route('login');
    }
}
