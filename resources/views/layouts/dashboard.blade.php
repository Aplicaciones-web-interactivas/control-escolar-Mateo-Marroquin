<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - @yield('title')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="bg-gray-100 font-sans">
<div class="flex h-screen overflow-hidden">
    <aside class="w-64 bg-blue-900 text-white flex-shrink-0 hidden md:flex flex-col">
        <div class="p-6 text-xl font-bold border-b border-blue-800 text-center">
            UASLP Ingeniería
        </div>
        <nav class="flex-grow p-4 space-y-2">
            <a href="#" class="block py-2.5 px-4 rounded transition duration-200 bg-blue-800 text-white">
                <i class="fas fa-book mr-2"></i> Materias
            </a>
            <a href="#" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-blue-800">
                <i class="fas fa-file-alt mr-2"></i> Reportes
            </a>
            <a href="#" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-blue-800">
                <i class="fas fa-users mr-2"></i> Usuarios
            </a>
        </nav>
        <div class="p-4 border-t border-blue-800">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button class="w-full text-left py-2 px-4 text-sm hover:text-red-400">
                    <i class="fas fa-sign-out-alt mr-2"></i> Cerrar Sesión
                </button>
            </form>
        </div>
    </aside>

    <main class="flex-1 flex flex-col overflow-y-auto">
        <header class="bg-white shadow-sm p-4 flex justify-between items-center">
            <h2 class="text-xl font-semibold text-gray-700">Panel de Control</h2>
            <div class="flex items-center space-x-4">
                <span class="text-gray-600">Bienvenido, <strong>{{ Auth::user()->nombre }}</strong></span>
                <div class="w-10 h-10 bg-blue-500 rounded-full flex items-center justify-center text-white font-bold">
                    {{ substr(Auth::user()->nombre, 0, 1) }}
                </div>
            </div>
        </header>

        <div class="p-6">
            @yield('content')
        </div>
    </main>
</div>
</body>
</html>
