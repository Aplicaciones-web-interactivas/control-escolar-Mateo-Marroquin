@extends('layouts.app')

@section('content')
    <div class="max-w-2xl mx-auto bg-white p-8 rounded-2xl shadow-lg">
        <h2 class="text-2xl font-bold mb-6">Asignar Nuevo Horario</h2>

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
                <select name="usuario_id" class="w-full mt-1 p-3 border rounded-xl focus:ring-2 focus:ring-blue-500">
                    <option value="">-- Selecciona un profesor --</option>
                    @foreach($profesores as $profe)
                        <option value="{{ $profe->id }}">{{ $profe->nombre }}</option>
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

            <button type="submit" class="w-full bg-blue-900 text-white py-3 rounded-xl font-semibold hover:bg-blue-800 transition">
                Guardar Horario
            </button>
        </form>
    </div>
@endsection
