@extends('layouts.app')
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Planes de Suscripción - Gestión de Tareas</title>
</head>

<body class="bg-gray-100 text-gray-900 font-sans flex min-h-screen">

    <!-- Barra lateral de navegación -->
    <aside class="w-64 bg-white shadow-md p-6 space-y-4">
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

            <a href="{{ route('plans') }}" class="block text-gray-700 bg-blue-50 text-blue-500 px-4 py-2 rounded transition duration-200 ease-in-out flex items-center">
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

            <a href="{{ route('settings') }}" class="block text-gray-700 hover:bg-blue-50 hover:text-blue-500 px-4 py-2 rounded transition duration-200 ease-in-out flex items-center">
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

    <!-- Contenedor Principal -->
    <div class="flex-1 flex flex-col">
        <!-- Contenido de Planes -->
        <div class="flex-1 container mx-auto p-6">
            <!-- Título de la Página -->
            <h2 class="text-3xl font-bold text-center mb-8">Planes de Suscripción</h2>

            <!-- Tarjetas de Planes -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">

                <!-- Plan Básico -->
                <div class="bg-white p-6 rounded-lg shadow-md text-center">
                    <h3 class="text-2xl font-semibold mb-4">Básico</h3>
                    <p class="text-gray-600 mb-4">Ideal para usuarios ocasionales.</p>
                    <p class="text-4xl font-bold mb-4">Gratis</p>
                    <ul class="text-left mb-6">
                        <li class="mb-2 flex items-center">
                            <span class="text-green-500 mr-2">✔</span> 5 tareas activas
                        </li>
                        <li class="mb-2 flex items-center">
                            <span class="text-green-500 mr-2">✔</span> Soporte básico
                        </li>
                        <li class="mb-2 flex items-center">
                            <span class="text-green-500 mr-2">✔</span> Acceso a plantillas básicas
                        </li>
                        <li class="mb-2 flex items-center">
                            <span class="text-red-500 mr-2">✖</span> Colaboración en equipo
                        </li>
                        <li class="mb-2 flex items-center">
                            <span class="text-red-500 mr-2">✖</span> Integraciones avanzadas
                        </li>
                    </ul>
                    <button class="bg-blue-500 text-white px-6 py-2 rounded-md hover:bg-blue-600 w-full">Seleccionar</button>
                </div>

                <!-- Plan Premium -->
                <div class="bg-white p-6 rounded-lg shadow-md text-center border-2 border-blue-500 transform scale-105">
                    <h3 class="text-2xl font-semibold mb-4">Premium</h3>
                    <p class="text-gray-600 mb-4">Para usuarios que necesitan más.</p>
                    <p class="text-4xl font-bold mb-4">$9.99/mes</p>
                    <ul class="text-left mb-6">
                        <li class="mb-2 flex items-center">
                            <span class="text-green-500 mr-2">✔</span> Tareas ilimitadas
                        </li>
                        <li class="mb-2 flex items-center">
                            <span class="text-green-500 mr-2">✔</span> Soporte prioritario
                        </li>
                        <li class="mb-2 flex items-center">
                            <span class="text-green-500 mr-2">✔</span> Acceso a plantillas premium
                        </li>
                        <li class="mb-2 flex items-center">
                            <span class="text-green-500 mr-2">✔</span> Colaboración en equipo
                        </li>
                        <li class="mb-2 flex items-center">
                            <span class="text-red-500 mr-2">✖</span> Integraciones avanzadas
                        </li>
                    </ul>
                    <button class="bg-blue-500 text-white px-6 py-2 rounded-md hover:bg-blue-600 w-full">Seleccionar</button>
                </div>

                <!-- Plan Platino -->
                <div class="bg-white p-6 rounded-lg shadow-md text-center">
                    <h3 class="text-2xl font-semibold mb-4">Platino</h3>
                    <p class="text-gray-600 mb-4">Para equipos y profesionales.</p>
                    <p class="text-4xl font-bold mb-4">$19.99/mes</p>
                    <ul class="text-left mb-6">
                        <li class="mb-2 flex items-center">
                            <span class="text-green-500 mr-2">✔</span> Tareas ilimitadas
                        </li>
                        <li class="mb-2 flex items-center">
                            <span class="text-green-500 mr-2">✔</span> Soporte 24/7
                        </li>
                        <li class="mb-2 flex items-center">
                            <span class="text-green-500 mr-2">✔</span> Acceso a todas las plantillas
                        </li>
                        <li class="mb-2 flex items-center">
                            <span class="text-green-500 mr-2">✔</span> Colaboración en equipo
                        </li>
                        <li class="mb-2 flex items-center">
                            <span class="text-green-500 mr-2">✔</span> Integraciones avanzadas
                        </li>
                    </ul>
                    <button class="bg-blue-500 text-white px-6 py-2 rounded-md hover:bg-blue-600 w-full">Seleccionar</button>
                </div>

            </div>
        </div>

        <!-- Pie de Página -->
        <footer class="bg-white shadow-md p-4">
        </footer>
    </div>

</body>

</html>