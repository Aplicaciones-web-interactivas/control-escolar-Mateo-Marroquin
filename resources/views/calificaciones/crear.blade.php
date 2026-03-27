@extends('layouts.app')

@section('content')
    <div class="max-w-2xl mx-auto px-4 py-6">
        <div class="mb-4">
            <a href="{{ route('calificaciones.index') }}"
               class="text-blue-600 hover:text-blue-800 text-sm font-semibold flex items-center">
                <i class="fas fa-arrow-left mr-2"></i> Volver a la lista
            </a>
        </div>
        <div class="bg-white rounded-2xl shadow-xl border border-gray-100 overflow-hidden">
            <div class="p-6 bg-blue-600 text-white">
                <h3 class="text-xl font-bold uppercase tracking-wider text-center">Registrar Calificación</h3>
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
            <form action="{{ route('calificaciones.guardar') }}" method="POST" class="p-8 space-y-6">
                @csrf
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2 uppercase">Alumno</label>
                    <select name="user_id"
                            class="w-full p-3.5 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 outline-none">
                        @foreach($usuarios as $u)
                            <option value="{{ $u->id }}">{{ $u->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2 uppercase">Grupo / Materia</label>
                    <select name="grupo_id"
                            class="w-full p-3.5 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 outline-none">
                        @foreach($grupos as $g)
                            <option value="{{ $g->id }}">{{ $g->name }} - {{ $g->horario->materia->nombre }}</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2 uppercase">Calificación (0 -
                        100)</label>
                    <input type="number" step="0.1" name="calificacion"
                           class="w-full p-3.5 border border-gray-200 rounded-xl focus:ring-2 focus:ring-indigo-500 outline-none"
                           placeholder="Ej. 80">
                </div>

                <button type="submit"
                        class="w-full bg-blue-600 hover:bg-blue-700 text-white py-4 rounded-xl font-bold transition shadow-lg uppercase tracking-widest">
                    Guardar Nota
                </button>
            </form>
        </div>
    </div>
@endsection
