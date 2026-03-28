@extends('layouts.app')

@section('content')
    <div class="max-w-2xl mx-auto px-4 py-6">
        <div class="bg-white rounded-xl shadow-md border border-gray-200 overflow-hidden">
            <div class="p-6 bg-gray-50 border-b">
                <h3 class="text-xl font-bold text-gray-800">Subir Tarea</h3>
            </div>

            <form action="{{ route('entregas.guardar') }}" method="POST" enctype="multipart/form-data" class="p-8 space-y-6">
                @csrf
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Selecciona la Tarea</label>
                    <select name="tarea_id" class="w-full p-3 border rounded-xl focus:ring-2 focus:ring-blue-500 outline-none bg-white">
                        @foreach($tareas as $t)
                            <option value="{{ $t->id }}">{{ $t->titulo }} - {{ $t->grupo->horario->materia->nombre }}</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Archivo PDF (Máx 5MB)</label>
                    <input type="file" name="archivo" accept="application/pdf" class="w-full p-2 border border-dashed border-blue-300 rounded-xl bg-blue-50">
                    @error('archivo') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>

                <button type="submit" class="w-full bg-blue-900 text-white py-3 rounded-xl font-bold hover:bg-blue-800 transition shadow-lg">
                    Enviar Tarea
                </button>
            </form>
        </div>
    </div>
@endsection
