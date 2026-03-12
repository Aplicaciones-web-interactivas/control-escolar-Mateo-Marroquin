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
        $credenciales = $request->validate([
            'clave_institucional' => ['required'],
            'password' => ['required'],
        ]);

        $usuario = Usuario::where('clave_institucional', $request->clave_institucional)->first();

        if ($usuario && Hash::check($request->contraseña, $usuario->contraseña)) {

            //AuthController::login($usuario);

            //$request->session()->regenerate();

            return redirect('/dashboard')->with('success', 'Entraste correctamente.');
        }
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
