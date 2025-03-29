<!DOCTYPE html>
<html lang="es" class="{{ session('theme','light') }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Configuración - Ayrton</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
    /* Estilos para Dark Mode */
    .dark {
        background-color: #121212;
        color: #e2e8f0;
    }
    .dark body {
        background-color: #1e1e1e;
    }
    .dark .bg-white {
        background-color: #2d3748;
        color: #e2e8f0;
    }
    .dark .text-gray-700 {
        color: #cbd5e0;
    }
    .dark .text-gray-900 {
        color: #e2e8f0;
    }
</style>
</head>

<body class="bg-gray-100 text-gray-900 font-sans">
    <div class="min-h-screen flex">
        <!-- Sidebar de navegación vertical -->
        <aside class="fixed left-0 top-0 h-full w-64 bg-white shadow-md p-6 space-y-4 z-50">
            <a href="{{ route('tasks.index') }}" class="text-3xl font-bold text-gray-800 hover:text-blue-500 transition duration-200 ease-in-out block text-center mb-8">
                Ayrton
            </a>

            <nav class="space-y-2">
                <a href="{{ route('tasks.index') }}" class="block text-gray-700 hover:bg-blue-50 hover:text-blue-500 px-4 py-2 rounded transition duration-200 ease-in-out flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4v.01M9 16v.01" />
                    </svg>
                    Tareas
                </a>

                <a href="{{ route('plans') }}" class="block text-gray-700 hover:bg-blue-50 hover:text-blue-500 px-4 py-2 rounded transition duration-200 ease-in-out flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                    </svg>
                    Planes
                </a>

                <a href="{{ route('challenge.index') }}" class="block text-gray-700 hover:bg-blue-50 hover:text-blue-500 px-4 py-2 rounded transition duration-200 ease-in-out flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                    </svg>
                    Desafíos
                </a>

                <a href="{{ route('settings') }}" class="block text-gray-700 bg-blue-50 text-blue-500 px-4 py-2 rounded transition duration-200 ease-in-out flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                    Configuración
                </a>

                <form action="{{ route('logout') }}" method="POST" class="mt-4">
                    @csrf
                    <button type="submit" class="w-full bg-red-500 hover:bg-red-600 text-white font-semibold py-2 px-4 rounded-lg shadow-md transition duration-300 ease-in-out flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                        </svg>
                        Cerrar sesión
                    </button>
                </form>
            </nav>
        </aside>

        <div class="flex-1 ml-64">
            <!-- Barra de Navegación superior -->
            <nav class="bg-white shadow-md p-4">
                <div class="container mx-auto flex justify-between items-center">
                    <h1 class="text-xl font-semibold">Configuración</h1>
                    
                </div>
            </nav>

            <div class="container mx-auto p-6">
                <h2 class="text-2xl font-bold mb-8">Configuración</h2>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <!-- Sección 1: Perfil -->
                    <div class="bg-white p-6 rounded-lg shadow-md">
                        <h3 class="text-xl font-semibold mb-4">Perfil</h3>
                        <form>
                            <div class="mb-4">
                                <label class="block text-sm font-medium text-gray-700">Nombre</label>
                                <input type="text" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500" placeholder="Tu nombre">
                            </div>
                            <div class="mb-4">
                                <label class="block text-sm font-medium text-gray-700">Correo Electrónico</label>
                                <input type="email" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500" placeholder="tucorreo@example.com">
                            </div>
                            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">Guardar Cambios</button>
                        </form>
                    </div>

                    <!-- Sección 2: Preferencias -->
                    <div class="bg-white p-6 rounded-lg shadow-md">
                        <h3 class="text-xl font-semibold mb-4">Preferencias</h3>
                        <form>
                            <div class="mb-4">
                                <label class="block text-sm font-medium text-gray-700">Tema</label>
                                <select class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                                    <option value="light">Claro</option>
                                    <option value="dark">Oscuro</option>
                                </select>
                            </div>
                            <div class="mb-4">
                                <label class="block text-sm font-medium text-gray-700">Idioma</label>
                                <select class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                                    <option value="es">Español</option>
                                    <option value="en">Inglés</option>
                                </select>
                            </div>
                            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">Guardar Preferencias</button>
                        </form>
                    </div>

                    <!-- Sección 3: Notificaciones -->
                    <div class="bg-white p-6 rounded-lg shadow-md">
                        <h3 class="text-xl font-semibold mb-4">Notificaciones</h3>
                        <form>
                            <div class="mb-4">
                                <label class="flex items-center">
                                    <input type="checkbox" class="form-checkbox h-4 w-4 text-blue-500">
                                    <span class="ml-2 text-sm text-gray-700">Recibir notificaciones por correo</span>
                                </label>
                            </div>
                            <div class="mb-4">
                                <label class="flex items-center">
                                    <input type="checkbox" class="form-checkbox h-4 w-4 text-blue-500">
                                    <span class="ml-2 text-sm text-gray-700">Recibir notificaciones push</span>
                                </label>
                            </div>
                            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">Guardar Configuración</button>
                        </form>
                    </div>

                    <!-- Sección 4: Seguridad -->
                    <div class="bg-white p-6 rounded-lg shadow-md">
                        <h3 class="text-xl font-semibold mb-4">Seguridad</h3>
                        <form>
                            <div class="mb-4">
                                <label class="block text-sm font-medium text-gray-700">Cambiar Contraseña</label>
                                <input type="password" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500" placeholder="Nueva contraseña">
                            </div>
                            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">Cambiar Contraseña</button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Pie de página -->
            <footer class="bg-blue-600 text-white p-4 mt-8">
                <div class="container mx-auto text-center">
                   
                </div>
            </footer>
        </div>
    </div>
    <script src="{{ asset('js/theme.js') }}"></script>
</body>

</html>