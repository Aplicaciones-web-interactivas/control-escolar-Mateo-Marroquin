@extends('layouts.app')

@section('content')
    <div class="max-w-2xl mx-auto">
        <div class="mb-4">
            <a href="{{ route('horarios.index')}}"
               class="text-blue-600 hover:text-blue-800 text-sm font-semibold flex items-center">
                <i class="fas fa-arrow-left mr-2"></i> Cancelar y volver
            </a>
        </div>

        <div class="bg-white rounded-xl shadow-md border border-gray-200 overflow-hidden">
            <div class="p-6 border-b border-gray-100 bg-blue-50">
                <h3 class="text-xl font-bold text-gray-800">Editar Horario</h3>
                <p class="text-sm text-gray-500">Modifica los detalles de la asignación.</p>
            </div>
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
            <form action="{{ route('horarios.update', $horario->id) }}" method="POST" class="p-6 space-y-6">
                @csrf
                @method('PUT')

                <div>
                    <label class="block text-sm font-medium text-gray-700">Materia</label>
                    <select name="materia_id"
                            class="w-full mt-1 p-3 border rounded-xl focus:ring-2 focus:ring-blue-500 outline-none">
                        @foreach($materias as $materia)
                            <option
                                value="{{ $materia->id }}" @selected(old('materia_id', $horario->materia_id) == $materia->id)>
                                {{ $materia->nombre }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700">Profesor</label>
                    <select name="user_id"
                            class="w-full mt-1 p-3 border rounded-xl focus:ring-2 focus:ring-blue-500 outline-none">
                        @foreach($profesores as $profe)
                            <option value="{{ $profe->id }}" @selected(old('user_id', $horario->user_id) == $profe->id)>
                                {{ $profe->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Hora Inicio</label>
                        <input type="time" name="hora_inicio" value="{{ old('hora_inicio', $horario->hora_inicio) }}"
                               class="w-full mt-1 p-3 border rounded-xl">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Hora Fin</label>
                        <input type="time" name="hora_fin" value="{{ old('hora_fin', $horario->hora_fin) }}"
                               class="w-full mt-1 p-3 border rounded-xl">
                    </div>
                </div>

                <div class="pt-4 border-t flex justify-end">
                    <button type="submit"
                            class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-xl font-bold transition shadow-lg">
                        Actualizar Horario
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
