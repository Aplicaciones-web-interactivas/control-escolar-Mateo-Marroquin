@extends('layouts.app')

@section('title', 'Nuevo Grupo')

@section('content')
    <div class="max-w-2xl mx-auto">
        <div class="mb-4">
            <a href="{{ route('grupos.index') }}" class="text-blue-600 hover:text-blue-800 text-sm font-semibold flex items-center">
                <i class="fas fa-arrow-left mr-2"></i> Volver a la lista
            </a>
        </div>

        <div class="bg-white rounded-2xl shadow-xl border border-gray-100 overflow-hidden">
            <div class="p-6 border-b border-gray-100 bg-gradient-to-r from-blue-600 to-blue-700">
                <h3 class="text-xl font-bold text-white">Registrar Nuevo Grupo</h3>
                <p class="text-blue-100 text-sm opacity-90">Asigna un nombre y vincula un horario existente.</p>
            </div>

            <form action="{{ route('grupos.guardar') }}" method="POST" class="p-8 space-y-6">
                @csrf

                <div>
                    <label for="nombre" class="block text-sm font-bold text-gray-700 mb-2 uppercase tracking-wide">Nombre del Grupo</label>
                    <input type="text" name="nombre" id="nombre" value="{{ old('nombre') }}" placeholder="Ej. 8° A"
                           class="w-full p-3.5 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 outline-none transition @error('nombre') border-red-500 @enderror">
                    @error('nombre') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label for="horario_id" class="block text-sm font-bold text-gray-700 mb-2 uppercase tracking-wide">Asignar Horario</label>
                    <select name="horario_id" id="horario_id" class="w-full p-3.5 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 outline-none transition">
                        <option value="">-- Selecciona un Horario --</option>
                        @foreach($horarios as $h)
                            <option value="{{ $h->id }}" @selected(old('horario_id') == $h->id)>
                                {{ $h->materia->nombre }} ({{ $h->hora_inicio }} - {{ $h->hora_fin }}) - Prof. {{ $h->usuario->nombre }}
                            </option>
                        @endforeach
                    </select>
                    @error('horario_id') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>

                <div class="pt-6">
                    <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white py-4 rounded-xl font-bold transition shadow-lg hover:shadow-blue-200 uppercase tracking-widest">
                        Guardar Grupo
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
