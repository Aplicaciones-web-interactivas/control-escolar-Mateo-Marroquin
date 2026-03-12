@extends('layouts.app')

@section('title', 'Iniciar Sesión')

@section('content')
    <div class="bg-white p-8 rounded-2xl shadow-xl w-full max-w-md border border-gray-100">
        <h2 class="text-2xl font-bold text-gray-800 mb-6 text-center">Bienvenido de nuevo</h2>

        <form action="#" method="POST" class="space-y-4">
            <div>
                <label class="block text-sm font-medium text-gray-700">Clave Institucional</label>
                <input type="email" name='clave_isntitucional' class="w-full mt-1 p-3 border rounded-xl focus:ring-2 focus:ring-blue-500 outline-none transition-all">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Contraseña</label>
                <input type="password" name='contraseña' class="w-full mt-1 p-3 border rounded-xl focus:ring-2 focus:ring-blue-500 outline-none transition-all">
            </div>

            <button type="submit" class="w-full bg-blue-900 text-white py-3 rounded-xl font-semibold hover:bg-blue-800 transition-colors">
                Entrar al Sistema
            </button>
        </form>

        <p class="mt-6 text-center text-sm text-gray-500">
            ¿No tienes cuenta? <a href="#" class="text-blue-700 font-bold hover:underline">Regístrate aquí</a>
        </p>
    </div>
@endsection
