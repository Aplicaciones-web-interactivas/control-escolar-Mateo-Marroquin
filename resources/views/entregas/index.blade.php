@extends('layouts.app')

@section('content')
    <div class="max-w-6xl mx-auto px-4 py-6">
        <div class="flex mb-6">
            <a href="{{ route('dashboardAlumno') }}" class="inline-flex items-center text-gray-600 hover:text-blue-600 text-sm font-bold transition-all group">
                <i class="fas fa-arrow-left mr-2 transform group-hover:-translate-x-1 transition-transform"></i>
                Volver al Dashboard
            </a>
        </div>

        <div class="bg-white rounded-xl shadow-md border border-gray-200 overflow-hidden">
            <div class="p-6 border-b border-gray-100 flex justify-between items-center bg-gray-50">
                <div>
                    <h3 class="text-xl font-bold text-gray-800">Mis Entregas</h3>
                    <p class="text-sm text-gray-500">Historial de archivos enviados a tus profesores.</p>
                </div>
                <a href="{{ route('entregas.crear') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2.5 rounded-xl text-sm font-bold transition shadow-lg">
                    <i class="fas fa-upload mr-2"></i> Nueva Entrega
                </a>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                    <tr class="bg-gray-100 text-gray-600 uppercase text-xs font-bold border-b">
                        <th class="px-6 py-4">Tarea</th>
                        <th class="px-6 py-4">Archivo</th>
                        <th class="px-6 py-4">Fecha de Envío</th>
                        <th class="px-6 py-4 text-center">Acciones</th>
                    </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                    @forelse($entregas as $e)
                        <tr class="hover:bg-blue-50 transition">
                            <td class="px-6 py-4 font-bold text-gray-800">{{ $e->tarea->titulo }}</td>
                            <td class="px-6 py-4">
                                <a href="{{ asset('storage/' . $e->archivo) }}" target="_blank" class="text-blue-600 hover:underline flex items-center">
                                    <i class="fas fa-file-pdf mr-2"></i> Ver PDF
                                </a>
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-500">{{ $e->created_at->format('d/m/Y H:i') }}</td>
                            <td class="px-6 py-4 text-center">
                                <div class="flex justify-center space-x-3">
                                    <a href="{{ route('entregas.editar', $e->id) }}" class="text-blue-600 hover:text-blue-800"><i class="fas fa-edit"></i></a>
                                    <form action="{{ route('entregas.eliminar', $e->id) }}" method="POST" class="inline">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="text-red-600" onclick="return confirm('¿Retirar entrega?')"><i class="fas fa-trash"></i></button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="4" class="px-6 py-12 text-center text-gray-400 italic">Aún no has realizado ninguna entrega.</td></tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
