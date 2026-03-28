@extends('layouts.app')

@section('title', 'Editar Tarea')

@section('content')
    <div class="max-w-2xl mx-auto px-4 py-6">
        <div class="mb-4">
            <a href="{{ route('tareas.index') }}"
               class="text-blue-600 hover:text-blue-800 text-sm font-semibold flex items-center">
                <i class="fas fa-arrow-left mr-2"></i> Cancelar y volver
            </a>
        </div>

        <div class="bg-white rounded-xl shadow-md border border-gray-200 overflow-hidden">
            <div class="p-6 border-b border-gray-100 bg-blue-50">
                <h3 class="text-xl font-bold text-gray-800">Editar Tarea: {{ $tarea->titulo }}</h3>
                <p class="text-sm text-gray-500">Modifica las instrucciones o la fecha límite de la actividad.</p>
            </div>

            @if ($errors->any())
                <div class="bg-red-50 border border-red-200 text-red-600 p-4 m-6 rounded-xl">
                    <p class="font-bold">Hubo errores al validar:</p>
                    <ul class="list-disc list-inside">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('tareas.update', $tarea->id) }}" method="POST" class="p-6 space-y-6">
                @csrf
                @method('PUT')

                <div>
                    <label for="titulo" class="block text-sm font-medium text-gray-700 mb-1">Título de la Tarea</label>
                    <input type="text"
                           name="titulo"
                           id="titulo"
                           value="{{ old('titulo', $tarea->titulo) }}"
                           class="w-full p-3 border rounded-xl focus:ring-2 focus:ring-blue-500 outline-none transition @error('titulo') border-red-500 @enderror">
                </div>

                <div>
                    <label for="grupo_id" class="block text-sm font-medium text-gray-700 mb-1">Cambiar Grupo</label>
                    <select name="grupo_id" id="grupo_id" class="w-full p-3 border rounded-xl focus:ring-2 focus:ring-blue-500 outline-none bg-white">
                        @foreach($grupos as $grupo)
                            <option value="{{ $grupo->id }}" @selected(old('grupo_id', $tarea->grupo_id) == $grupo->id)>
                                {{ $grupo->horario->materia->nombre }} ({{ $grupo->nombre }})
                            </option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label for="descripcion" class="block text-sm font-medium text-gray-700 mb-1">Descripción / Instrucciones</label>
                    <textarea name="descripcion"
                              id="descripcion"
                              rows="4"
                              class="w-full p-3 border rounded-xl focus:ring-2 focus:ring-blue-500 outline-none transition">{{ old('descripcion', $tarea->descripcion) }}</textarea>
                </div>

                <div>
                    <label for="fecha_entrega" class="block text-sm font-medium text-gray-700 mb-1">Fecha y Hora de Entrega</label>
                    <input type="datetime-local"
                           name="fecha_entrega"
                           id="fecha_entrega"
                           value="{{ old('fecha_entrega', date('Y-m-d\TH:i', strtotime($tarea->fecha_entrega))) }}"
                           class="w-full p-3 border rounded-xl focus:ring-2 focus:ring-blue-500 outline-none transition">
                </div>

                <div class="flex items-center justify-end space-x-4 pt-4 border-t">
                    <a href="{{ route('tareas.index') }}" class="text-gray-600 hover:text-gray-800 font-medium">Cancelar</a>
                    <button type="submit"
                            class="bg-blue-600 hover:bg-blue-700 text-white px-8 py-3 rounded-xl font-bold transition shadow-lg">
                        Actualizar Tarea
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
