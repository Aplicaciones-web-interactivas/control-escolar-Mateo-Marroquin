<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function index()
    {

    }

    public function showLoginForm(){
        return view('login');
    }

    public function login(Request $request){
        //dd($request->all());
        $credenciales = $request->validate([
            'clave_institucional' => ['required'],
            'contraseña' => ['required'],
        ]);

        $usuario = Usuario::where('clave_institucional', $request->clave_institucional)->first();

        if ($usuario && Hash::check($request->contraseña, $usuario->contraseña)) {

            //AuthController::login($usuario);

            //$request->session()->regenerate();

            return redirect('/dashboard')->with('success', 'Entraste correctamente.');

        }
        return back()->withErrors(['error' => 'Usuario o contraseña incorrectos']);
    }

    public function showRegisterForm(){
        return view('register');
    }
    public function register(Request $request)
    {
        $request->validate([
            'nombre' => ['required', 'string', 'max:255'],
            'clave_institucional' => ['required', 'string', 'max:100', 'unique:usuarios'],
            'contraseña' => ['required', 'string']
        ]);

        $usuario = Usuario::create([
            'nombre' => $request->nombre,
            'clave_institucional' => $request->clave_institucional,
            'contraseña' => Hash::make($request->contraseña),
        ]);

        //Auth::login($user);

        return redirect('/login')->with('success', 'Cuenta creada con éxito. ¡Bienvenido!');
    }
}
