@extends('layouts.app')

@section('content')
    <div class="max-w-2xl mx-auto bg-white p-8 rounded-2xl shadow-lg">
        <div class="mb-4">
            <a href="{{ route('horarios.index') }}"
               class="text-blue-600 hover:text-blue-800 text-sm font-semibold flex items-center">
                <i class="fas fa-arrow-left mr-2"></i> Volver a la lista
            </a>
        </div>
        <h2 class="text-2xl font-bold mb-6">Asignar Nuevo Horario</h2>
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
        <form action="{{ route('horarios.guardar') }}" method="POST" class="space-y-4">
            @csrf

            <div>
                <label class="block text-sm font-medium text-gray-700">Materia</label>
                <select name="materia_id" class="w-full mt-1 p-3 border rounded-xl focus:ring-2 focus:ring-blue-500">
                    <option value="">-- Selecciona una materia --</option>
                    @foreach($materias as $materia)
                        <option value="{{ $materia->id }}">{{ $materia->nombre }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Profesor</label>
                <select name="user_id" class="w-full mt-1 p-3 border rounded-xl focus:ring-2 focus:ring-blue-500">
                    <option value="">-- Selecciona un profesor --</option>
                    @foreach($profesores as $profe)
                        <option value="{{ $profe->id }}">{{ $profe->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700">Hora Inicio</label>
                    <input type="time" name="hora_inicio" class="w-full mt-1 p-3 border rounded-xl">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">Hora Fin</label>
                    <input type="time" name="hora_fin" class="w-full mt-1 p-3 border rounded-xl">
                </div>
            </div>

            <button type="submit"
                    class="w-full bg-blue-900 text-white py-3 rounded-xl font-semibold hover:bg-blue-800 transition">
                Guardar Horario
            </button>
        </form>
    </div>
@endsection
