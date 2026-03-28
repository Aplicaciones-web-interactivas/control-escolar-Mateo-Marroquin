@extends('layouts.app')

@section('title', 'Registro de Usuario')

@section('content')
    <div class="bg-white p-8 rounded-2xl shadow-xl w-full max-w-lg border border-gray-100">
        <h2 class="text-2xl font-bold text-gray-800 mb-2 text-center">Crear Cuenta</h2>
        <p class="text-gray-500 text-center mb-6">Únete al portal de ingeniería</p>
        @if ($errors->any())
            <div class="bg-red-50 border border-red-200 text-red-600 p-4 mb-6 rounded-xl">
                <p class="font-bold">Hubo errores al validar:</p>
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{route('register')}}" method="POST" class="grid grid-cols-1 md:grid-cols-2 gap-4">
            @csrf
            <div class="md:col-span-2">
                <label class="block text-sm font-medium text-gray-700">Nombre Completo</label>
                <input type="text" name='name'
                       class="w-full mt-1 p-3 border rounded-xl focus:ring-2 focus:ring-blue-500 outline-none">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Matrícula</label>
                <input type="text" name='clave_institucional'
                       class="w-full mt-1 p-3 border rounded-xl focus:ring-2 focus:ring-blue-500 outline-none">
            </div>


            <div class="md:col-span-2">
                <label class="block text-sm font-medium text-gray-700">Contraseña</label>
                <input type="password" name='password'
                       class="w-full mt-1 p-3 border rounded-xl focus:ring-2 focus:ring-blue-500 outline-none">
            </div>

            <div class="md:col-span-2">
                <label for="rol" class="block text-sm font-medium text-gray-700">Rol de Usuario</label>
                <select name="rol" id="rol"
                        class="w-full mt-1 p-3 border rounded-xl focus:ring-2 focus:ring-blue-500 bg-white outline-none transition-all cursor-pointer">
                    <option value="" disabled selected>-- Selecciona un rol --</option>
                    <option value="admin">Administrador</option>
                    <option value="profesor">Profesor</option>
                    <option value="alumno">Alumno</option>
                </select>
            </div>

            <button type="submit"
                    class="md:col-span-2 mt-4 bg-green-600 text-white py-3 rounded-xl font-semibold hover:bg-green-700 transition-colors">
                Finalizar Registro
            </button>
        </form>
    </div>
@endsection
