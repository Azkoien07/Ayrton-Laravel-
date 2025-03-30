<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Ayrton Admin')</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon copy.ico') }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="flex flex-row min-h-screen bg-white">
    <!-- Sidebar de administrador -->
    <aside class="w-64 bg-gray-800 text-white min-h-screen">
        <!-- Contenido del sidebar de admin -->
        <nav class="p-4">
            <h2 class="text-xl font-bold mb-4">Admin Panel</h2>
            <ul class="space-y-2">
                <li><a href="{{ route('admin.index') }}" class="block py-2 px-4 rounded hover:bg-gray-700">Dashboard</a></li>
                <li><a href="{{ route('admin.pqrs') }}" class="block py-2 px-4 rounded hover:bg-gray-700">Control de PQRS</a></li>
                <li><a href="{{ route('admin.ranking') }}" class="block py-2 px-4 rounded hover:bg-gray-700">Ranking</a></li>
                <form action="{{ route('logout') }}" method="POST" class="mt-4">
                    @csrf
                    <button type="submit" class="w-full bg-red-500 hover:bg-red-600 text-white font-semibold py-2 px-4 rounded-lg shadow-md transition duration-300 ease-in-out flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                        </svg>
                        Cerrar sesión
                    </button>
                </form>
            </ul>
        </nav>
    </aside>

    <!-- Contenido principal -->
    <main class="flex-1 p-4">
        @yield('admin-content')
    </main>
</body>

</html>