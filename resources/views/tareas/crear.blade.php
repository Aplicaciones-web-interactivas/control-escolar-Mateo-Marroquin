@extends('layouts.app')

@section('content')
    <div class="max-w-2xl mx-auto px-4 py-6">
        <div class="mb-4">
            <a href="{{ route('tareas.index') }}" class="text-blue-600 hover:text-blue-800 text-sm font-semibold flex items-center">
                <i class="fas fa-arrow-left mr-2"></i> Volver a la lista
            </a>
        </div>

        <div class="bg-white rounded-xl shadow-md border border-gray-200 overflow-hidden">
            <div class="p-6 border-b border-gray-100 bg-gray-50">
                <h3 class="text-xl font-bold text-gray-800">Nueva Tarea</h3>
                <p class="text-sm text-gray-500">Define una actividad para tus alumnos.</p>
            </div>

            <form action="{{ route('tareas.guardar') }}" method="POST" class="p-6 space-y-5">
                @csrf
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Título de la Tarea</label>
                    <input type="text" name="titulo" class="w-full p-3 border rounded-xl focus:ring-2 focus:ring-blue-500 outline-none" placeholder="Ej. Práctica 1: Servidores">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Grupo</label>
                    <select name="grupo_id" class="w-full p-3 border rounded-xl focus:ring-2 focus:ring-blue-500 outline-none">
                        @foreach($grupos as $grupo)
                            <option value="{{ $grupo->id }}">{{ $grupo->horario->materia->nombre }} ({{ $grupo->nombre }})</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Descripción / Instrucciones</label>
                    <textarea name="descripcion" rows="4" class="w-full p-3 border rounded-xl focus:ring-2 focus:ring-blue-500 outline-none" placeholder="Explica qué deben hacer..."></textarea>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Fecha y Hora de Entrega</label>
                    <input type="datetime-local" name="fecha_entrega" class="w-full p-3 border rounded-xl focus:ring-2 focus:ring-blue-500 outline-none">
                </div>

                <div class="pt-4 border-t flex justify-end">
                    <button type="submit" class="bg-blue-900 hover:bg-blue-800 text-white px-8 py-3 rounded-xl font-bold transition shadow-lg">
                        Publicar Tarea
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
