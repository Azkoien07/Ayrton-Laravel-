<!-- resources/views/layouts/app.blade.php -->
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Ayrton')</title>
    <!-- Agrega el CDN de Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="flex flex-col min-h-screen bg-gray-50">
    <!-- Navbar -->
    <nav class="bg-white shadow-md">
        <div class="container mx-auto px-4 py-4 flex items-center justify-between">
            <a href="{{ route('tasks.index') }}" class="text-3xl font-bold text-gray-800 hover:text-blue-500 transition duration-200 ease-in-out">
                Ayrton
            </a>

            <!-- Menú de navegación -->
            <div class="flex items-center space-x-4">
                <!-- Enlaces-->
                <a href="{{ route('settings') }}" class="text-gray-700 hover:text-blue-500 transition duration-200 ease-in-out">
                    Configuración
                </a>

                <a href="{{ route('plans') }}" class="text-gray-700 hover:text-blue-500 transition duration-200 ease-in-out">
                    Planes
                </a>

                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="bg-red-500 hover:bg-red-600 text-white font-semibold py-2 px-4 rounded-lg shadow-md transition duration-300 ease-in-out">
                        Cerrar sesión
                    </button>
                </form>
            </div>
        </div>
    </nav>

    <!-- Contenido principal -->
    <main class="flex-grow container mx-auto px-4 py-8">
        @yield('content')
    </main>

    <!-- Pie de página -->
    <footer class="bg-blue-600 text-white p-4 mt-8">
        <div class="container mx-auto text-center">
            <p>&copy; {{ date('Y') }} Ayrton. Todos los derechos reservados.</p>
        </div>
    </footer>
</body>

</html>