@extends('layouts.app')

@section('title', 'Actualizar Entrega')

@section('content')
    <div class="max-w-2xl mx-auto px-4 py-6">
        <div class="mb-4">
            <a href="{{ route('entregas.index') }}"
               class="text-blue-600 hover:text-blue-800 text-sm font-semibold flex items-center">
                <i class="fas fa-arrow-left mr-2"></i> Cancelar y volver
            </a>
        </div>

        <div class="bg-white rounded-xl shadow-md border border-gray-200 overflow-hidden">
            <div class="p-6 border-b border-gray-100 bg-blue-50">
                <h3 class="text-xl font-bold text-gray-800">Actualizar Archivo</h3>
                <p class="text-sm text-gray-500 font-medium">Tarea: {{ $entrega->tarea->titulo }}</p>
            </div>

            @if ($errors->any())
                <div class="bg-red-50 border border-red-200 text-red-600 p-4 m-6 rounded-xl text-sm">
                    <p class="font-bold">Hubo errores al validar:</p>
                    <ul class="list-disc list-inside">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('entregas.update', $entrega->id) }}" method="POST" enctype="multipart/form-data" class="p-8 space-y-6">
                @csrf
                @method('PUT')

                <div class="bg-gray-50 p-4 rounded-xl border border-gray-100">
                    <label class="block text-xs uppercase font-bold text-gray-400 mb-1">Instrucciones de la Tarea</label>
                    <p class="text-gray-700 text-sm italic">{{ $entrega->tarea->descripcion }}</p>
                </div>

                <div class="flex items-center p-4 border rounded-xl bg-gray-50 border-gray-200">
                    <div class="bg-red-100 p-3 rounded-lg mr-4">
                        <i class="fas fa-file-pdf text-red-600 text-xl"></i>
                    </div>
                    <div class="flex-1 overflow-hidden">
                        <p class="text-xs text-gray-400 font-bold uppercase">Archivo enviado anteriormente:</p>
                        <a href="{{ asset('storage/' . $entrega->archivo) }}" target="_blank" class="text-blue-600 hover:underline text-sm truncate block">
                            {{ basename($entrega->archivo) }}
                        </a>
                    </div>
                </div>

                <div>
                    <label for="archivo" class="block text-sm font-medium text-gray-700 mb-2">Subir Nueva Versión (PDF, máx 5MB)</label>
                    <input type="file"
                           name="archivo"
                           id="archivo"
                           accept="application/pdf"
                           class="w-full p-2.5 border border-dashed border-blue-300 rounded-xl bg-blue-50 text-sm text-blue-700 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-600 file:text-white hover:file:bg-blue-700 transition cursor-pointer">
                    <p class="mt-2 text-xs text-gray-400 italic">Al subir un nuevo archivo, el anterior será reemplazado permanentemente.</p>
                </div>

                <div class="flex items-center justify-end space-x-4 pt-4 border-t border-gray-100">
                    <a href="{{ route('entregas.index') }}" class="text-gray-600 hover:text-gray-800 font-medium text-sm">Cancelar</a>
                    <button type="submit"
                            class="bg-blue-600 hover:bg-blue-700 text-white px-8 py-3 rounded-xl font-bold transition shadow-lg flex items-center">
                        <i class="fas fa-sync-alt mr-2"></i> Actualizar Entrega
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
