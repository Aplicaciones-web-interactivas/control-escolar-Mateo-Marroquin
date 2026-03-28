<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function index()
    {

    }

    public function showLoginForm(){
        return view('login');
    }

    public function login(Request $request) {
        $request->validate([
            'clave_institucional' => ['required'],
            'password' => ['required'],
        ]);

        if (Auth::attempt([
            'clave_institucional' => $request->clave_institucional,
            'password' => $request->password
        ])) {
            $request->session()->regenerate();

            return redirect()->intended('/dashboard')->with('success', '¡Bienvenido de nuevo!');
        }

        return back()->withErrors([
            'error' => 'La clave o la contraseña no coinciden con nuestros registros.',
        ]);
    }

    public function showRegisterForm(){
        return view('register');
    }
    public function register(Request $request) {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'clave_institucional' => ['required', 'unique:users'],
            'password' => ['required'],
            'rol' => ['required']
        ]);

        $user = \App\Models\User::create([
            'name' => $request->name,
            'clave_institucional' => $request->clave_institucional,
            'password' => Hash::make($request->password),
            'rol' => $request->rol,
        ]);

        Auth::login($user);

        return redirect('/dashboard');
    }

    public function logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}
