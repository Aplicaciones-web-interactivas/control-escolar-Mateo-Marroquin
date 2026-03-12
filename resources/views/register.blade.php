@extends('layouts.app')

@section('title', 'Registro de Usuario')

@section('content')
    <div class="bg-white p-8 rounded-2xl shadow-xl w-full max-w-lg border border-gray-100">
        <h2 class="text-2xl font-bold text-gray-800 mb-2 text-center">Crear Cuenta</h2>
        <p class="text-gray-500 text-center mb-6">Únete al portal de ingeniería</p>

        <form action="{{route('register')}}" method="POST" class="grid grid-cols-1 md:grid-cols-2 gap-4">
            @csrf
            <div class="md:col-span-2">
                <label class="block text-sm font-medium text-gray-700">Nombre Completo</label>
                <input type="text" name='nombre' class="w-full mt-1 p-3 border rounded-xl focus:ring-2 focus:ring-blue-500 outline-none">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Matrícula</label>
                <input type="text" name='clave_institucional' class="w-full mt-1 p-3 border rounded-xl focus:ring-2 focus:ring-blue-500 outline-none">
            </div>


            <div class="md:col-span-2">
                <label class="block text-sm font-medium text-gray-700">Contraseña</label>
                <input type="password" name='contraseña' class="w-full mt-1 p-3 border rounded-xl focus:ring-2 focus:ring-blue-500 outline-none">
            </div>

            <button type="submit" class="md:col-span-2 mt-4 bg-green-600 text-white py-3 rounded-xl font-semibold hover:bg-green-700 transition-colors">
                Finalizar Registro
            </button>
        </form>
    </div>
@endsection
