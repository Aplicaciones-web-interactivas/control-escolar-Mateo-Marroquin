@extends('layouts.app')

@section('content')
    <div class="max-w-6xl mx-auto px-4 py-6">
        <div class="mb-6">
            <a href="{{ route('tareas.index') }}" class="text-blue-600 hover:text-blue-800 text-sm font-bold flex items-center">
                <i class="fas fa-arrow-left mr-2"></i> Volver a Tareas
            </a>
        </div>

        <div class="bg-white rounded-xl shadow-md border border-gray-200 overflow-hidden">
            <div class="p-6 border-b border-gray-100 bg-gray-50">
                <h3 class="text-xl font-bold text-gray-800">Seguimiento: {{ $tarea->titulo }}</h3>
                <p class="text-sm text-gray-500">Lista de alumnos y estado de sus archivos PDF.</p>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                    <tr class="bg-gray-100 text-gray-600 uppercase text-xs font-bold border-b">
                        <th class="px-6 py-4">Alumno</th>
                        <th class="px-6 py-4">Estado</th>
                        <th class="px-6 py-4">Archivo</th>
                        <th class="px-6 py-4 text-center">Fecha Entrega</th>
                    </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                    @foreach($alumnos as $alumno)
                        <tr class="hover:bg-gray-50 transition">
                            <td class="px-6 py-4 font-medium text-gray-800">{{ $alumno->name }}</td>
                            <td class="px-6 py-4">
                                @if($alumno->entrega)
                                    <span class="px-3 py-1 bg-green-100 text-green-700 rounded-full text-xs font-bold uppercase">Entregado</span>
                                @else
                                    <span class="px-3 py-1 bg-red-100 text-red-700 rounded-full text-xs font-bold uppercase">Pendiente</span>
                                @endif
                            </td>
                            <td class="px-6 py-4">
                                @if($alumno->entrega)
                                    <a href="{{ asset('storage/' . $alumno->entrega->archivo) }}" target="_blank" class="text-blue-600 hover:text-blue-800 flex items-center font-semibold">
                                        <i class="fas fa-file-pdf mr-2"></i> Abrir PDF
                                    </a>
                                @else
                                    <span class="text-gray-400 text-sm italic">Sin archivo</span>
                                @endif
                            </td>
                            <td class="px-6 py-4 text-center text-sm text-gray-500">
                                {{ $alumno->entrega ? $alumno->entrega->created_at->format('d/m/Y H:i') : '-' }}
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
