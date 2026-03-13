@extends('layouts.app')

@section('title', 'Dashboard Principal')

@section('content')
    <div class="max-w-6xl mx-auto">
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-gray-800">Bienvenido al Sistema Académico</h1>
            <p class="text-gray-600">Selecciona un módulo para comenzar a gestionar la información.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

            <a href="{{ route('materias.index') }}" class="group bg-white p-6 rounded-2xl shadow-sm border border-gray-200 hover:shadow-xl hover:border-blue-400 transition-all duration-300 transform hover:-translate-y-2">
                <div class="flex items-center space-x-4">
                    <div class="p-4 bg-blue-100 text-blue-600 rounded-xl group-hover:bg-blue-600 group-hover:text-white transition-colors">
                        <i class="fas fa-book text-2xl"></i>
                    </div>
                    <div>
                        <h3 class="text-xl font-bold text-gray-800">Materias</h3>
                        <p class="text-sm text-gray-500">Listado, edición y registro.</p>
                    </div>
                </div>
                <div class="mt-4 flex items-center text-blue-600 font-semibold text-sm">
                    Gestionar módulo <i class="fas fa-arrow-right ml-2 group-hover:ml-4 transition-all"></i>
                </div>
            </a>

            <div class="relative group bg-gray-50 p-6 rounded-2xl border border-dashed border-gray-300 opacity-75">
                <div class="absolute top-3 right-3 bg-gray-200 text-gray-600 text-[10px] font-bold px-2 py-0.5 rounded-full uppercase">
                    Próximamente
                </div>
                <div class="flex items-center space-x-4">
                    <div class="p-4 bg-gray-200 text-gray-400 rounded-xl">
                        <i class="fas fa-users text-2xl"></i>
                    </div>
                    <div>
                        <h3 class="text-xl font-bold text-gray-400">Horarios</h3>
                        <p class="text-sm text-gray-400">Horarios de materias.</p>
                    </div>
                </div>
            </div>

            <div class="relative group bg-gray-50 p-6 rounded-2xl border border-dashed border-gray-300 opacity-75">
                <div class="absolute top-3 right-3 bg-gray-200 text-gray-600 text-[10px] font-bold px-2 py-0.5 rounded-full uppercase">
                    Próximamente
                </div>
                <div class="flex items-center space-x-4">
                    <div class="p-4 bg-gray-200 text-gray-400 rounded-xl">
                        <i class="fa-solid fa-clock text-2xl"></i>
                    </div>
                    <div>
                        <h3 class="text-xl font-bold text-gray-400">Grupos</h3>
                        <p class="text-sm text-gray-400">Grupos de materias.</p>
                    </div>
                </div>
            </div>

            <div class="relative group bg-gray-50 p-6 rounded-2xl border border-dashed border-gray-300 opacity-75">
                <div class="absolute top-3 right-3 bg-gray-200 text-gray-600 text-[10px] font-bold px-2 py-0.5 rounded-full uppercase">
                    Próximamente
                </div>
                <div class="flex items-center space-x-4">
                    <div class="p-4 bg-gray-200 text-gray-400 rounded-xl">
                        <i class="fa-solid fa-clipboard-list text-2xl"></i>
                    </div>
                    <div>
                        <h3 class="text-xl font-bold text-gray-400">Calificaciones</h3>
                        <p class="text-sm text-gray-400">Calificaciones de materias.</p>
                    </div>
                </div>
            </div>

            <div class="relative group bg-gray-50 p-6 rounded-2xl border border-dashed border-gray-300 opacity-75">
                <div class="absolute top-3 right-3 bg-gray-200 text-gray-600 text-[10px] font-bold px-2 py-0.5 rounded-full uppercase">
                    Próximamente
                </div>
                <div class="flex items-center space-x-4">
                    <div class="p-4 bg-gray-200 text-gray-400 rounded-xl">
                        <i class="fa-solid fa-helmet-safety text-2xl"></i>
                    </div>
                    <div>
                        <h3 class="text-xl font-bold text-gray-400">Extra</h3>
                        <p class="text-sm text-gray-400">Extras.</p>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
