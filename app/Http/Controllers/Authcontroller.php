<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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

        return to_route('login')->withErrors([
            'email' => 'Email invalide',
            'password' => 'Mot de passe incorect',
        ])->onlyInput('email');
    }

    public function logout() {
        Auth::logout();
        return to_route('login');
    }
}
