<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UASLP - @yield('title')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        body { background-color: #f3f4f6; }
    </style>
</head>
<body class="flex flex-col min-h-screen">

<nav class="bg-blue-900 text-white p-4 shadow-lg">
    <div class="container mx-auto flex justify-between items-center">
        <h1 class="text-xl font-bold tracking-tight">Portal de Sistemas</h1>
        <div class="space-x-4">
            <a href="#" class="hover:text-blue-300">Inicio</a>
            <a href="#" class="bg-blue-700 px-4 py-2 rounded-lg hover:bg-blue-600">Acceso</a>
        </div>
    </div>
</nav>

<main class="flex-grow container mx-auto px-4 py-8 flex items-center justify-center">
    @yield('content')
</main>

<footer class="bg-white border-t p-4 text-center text-gray-600 text-sm">
    &copy; 2026 Facultad de Ingeniería, UASLP.
</footer>

</body>
</html>
