@extends('layouts.app')

@section('title', 'Editar Grupo')

@section('content')
    <div class="max-w-2xl mx-auto">
        <div class="mb-4 text-sm font-semibold">
            <a href="{{ route('grupos.index') }}" class="text-blue-600 hover:text-blue-800 text-sm font-semibold flex items-center">
                <i class="fas fa-arrow-left mr-2"></i> Cancelar y volver
            </a>
        </div>

        <div class="bg-white rounded-2xl shadow-xl border border-gray-100 overflow-hidden">
            <div class="p-6 border-b border-gray-100 bg-gray-50">
                <h3 class="text-xl font-bold text-gray-800">Modificar Grupo</h3>
                <p class="text-sm text-gray-500">Actualiza el nombre o cambia el horario asignado.</p>
            </div>

            <form action="{{ route('grupos.update', $grupo->id) }}" method="POST" class="p-8 space-y-6">
                @csrf
                @method('PUT')

                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">Nombre del Grupo</label>
                    <input type="text" name="nombre" value="{{ old('nombre', $grupo->nombre) }}"
                           class="w-full p-3.5 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 outline-none transition">
                </div>

                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">Cambiar Horario</label>
                    <select name="horario_id" class="w-full p-3.5 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 outline-none">
                        @foreach($horarios as $h)
                            <option value="{{ $h->id }}" @selected(old('horario_id', $grupo->horario_id) == $h->id)>
                                {{ $h->materia->nombre }} ({{ $h->hora_inicio }}) - {{ $h->usuario->nombre }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="pt-6 flex gap-4">
                    <a href="{{ route('grupos.index') }}" class="w-1/3 text-center bg-gray-100 hover:bg-gray-200 text-gray-600 py-4 rounded-xl font-bold transition">
                        Cancelar
                    </a>
                    <button type="submit" class="w-2/3 bg-green-600 hover:bg-green-700 text-white py-4 rounded-xl font-bold transition shadow-lg hover:shadow-green-200">
                        Actualizar Cambios
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
