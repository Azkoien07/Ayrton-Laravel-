@extends('layouts.app')
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Módulo de Desafío</title>
    <!-- Alpine.js para interactividad -->
    <script src="//unpkg.com/alpinejs" defer></script>
</head>

<body class="bg-gray-50 font-sans">

    <div class="min-h-screen p-8" x-data="{ openModal: false }">
        <!-- Header -->
        <header class="mb-12 ml-64 text-left">
            <h1 class="text-4xl font-bold text-gray-800 inline-block">Módulo de Desafío</h1>
            <p class="text-gray-600 mt-2">Organiza y gestiona tus desafíos de manera eficiente.</p>
        </header>
        <!-- Barra lateral de navegación -->
        <aside class="fixed left-0 top-0 h-full w-64 bg-white shadow-md p-6 space-y-4 z-50">
            <div class="flex items-center justify-center mb-8">
                <a href="{{ route('tasks.index') }}" class="text-3xl font-bold text-gray-800 hover:text-blue-500 transition duration-200 ease-in-out">
                    Ayrton
                </a>
            </div>

            <nav class="space-y-2">
                <!-- Tareas -->
                <a href="{{ route('tasks.index') }}" class="block text-gray-700 hover:bg-blue-50 hover:text-blue-500 px-4 py-2 rounded transition duration-200 ease-in-out flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4v.01M9 16v.01" />
                    </svg>
                    Tareas
                </a>

                <!-- Planes -->
                <a href="{{ route('plans') }}" class="block text-gray-700 hover:bg-blue-50 hover:text-blue-500 px-4 py-2 rounded transition duration-200 ease-in-out flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                    </svg>
                    Planes
                </a>

                <!-- Desafíos -->
                <a href="{{ route('challenge.index') }}" class="block text-gray-700 hover:bg-blue-50 hover:text-blue-500 px-4 py-2 rounded transition duration-200 ease-in-out flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                    </svg>
                    Desafíos
                </a>

                <!-- Configuración -->
                <a href="{{ route('settings') }}" class="block text-gray-700 hover:bg-blue-50 hover:text-blue-500 px-4 py-2 rounded transition duration-200 ease-in-out flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                    Configuración
                </a>
            </nav>

            <!-- Botón de Cerrar Sesión -->
            <div class="absolute bottom-0 left-0 right-0 p-4">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="w-full bg-red-500 hover:bg-red-600 text-white font-semibold py-2 px-4 rounded-lg shadow-md transition duration-300 ease-in-out flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                        </svg>
                        Cerrar sesión
                    </button>
                </form>
            </div>
        </aside>
        <div class="py-12 ml-64">

            <!-- Botón para agregar nuevo desafío -->
            <div class="ml-64 p-8">
                <button
                    @click="openModal = true"
                    class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded-lg shadow-md transition duration-300">
                    + Nuevo Desafío
                </button>
            </div>

            <!-- Lista de Desafíos -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Desafío 1 -->
                <div class="bg-white rounded-lg shadow-md hover:shadow-lg transition-shadow duration-300">
                    <div class="p-6">
                        <h3 class="text-xl font-semibold text-gray-800">Desafío #1</h3>
                        <p class="text-gray-600 mt-2">Descripción breve del desafío. Puedes agregar más detalles aquí.</p>
                        <div class="mt-4 flex space-x-2">
                            <span class="bg-blue-100 text-blue-800 text-sm px-2 py-1 rounded">En Progreso</span>
                            <span class="bg-green-100 text-green-800 text-sm px-2 py-1 rounded">Fácil</span>
                        </div>
                        <div class="mt-4 flex justify-end">
                            <button class="text-blue-500 hover:text-blue-700">Ver Detalles</button>
                        </div>
                    </div>
                </div>

                <!-- Desafío 2 -->
                <div class="bg-white rounded-lg shadow-md hover:shadow-lg transition-shadow duration-300">
                    <div class="p-6">
                        <h3 class="text-xl font-semibold text-gray-800">Desafío #2</h3>
                        <p class="text-gray-600 mt-2">Descripción breve del desafío. Puedes agregar más detalles aquí.</p>
                        <div class="mt-4 flex space-x-2">
                            <span class="bg-yellow-100 text-yellow-800 text-sm px-2 py-1 rounded">Pendiente</span>
                            <span class="bg-red-100 text-red-800 text-sm px-2 py-1 rounded">Difícil</span>
                        </div>
                        <div class="mt-4 flex justify-end">
                            <button class="text-blue-500 hover:text-blue-700">Ver Detalles</button>
                        </div>
                    </div>
                </div>

                <!-- Desafío 3 -->
                <div class="bg-white rounded-lg shadow-md hover:shadow-lg transition-shadow duration-300">
                    <div class="p-6">
                        <h3 class="text-xl font-semibold text-gray-800">Desafío #3</h3>
                        <p class="text-gray-600 mt-2">Descripción breve del desafío. Puedes agregar más detalles aquí.</p>
                        <div class="mt-4 flex space-x-2">
                            <span class="bg-green-100 text-green-800 text-sm px-2 py-1 rounded">Completado</span>
                            <span class="bg-purple-100 text-purple-800 text-sm px-2 py-1 rounded">Medio</span>
                        </div>
                        <div class="mt-4 flex justify-end">
                            <button class="text-blue-500 hover:text-blue-700">Ver Detalles</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal para agregar nuevo desafío -->
            <div
                x-show="openModal"
                @click.away="openModal = false"
                class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center p-4"
                style="display: none;">
                <div class="bg-white rounded-lg shadow-lg w-full max-w-md p-6">
                    <h2 class="text-xl font-semibold text-gray-800 mb-4">Nuevo Desafío</h2>
                    <form>
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="title">Título</label>
                            <input
                                type="text"
                                id="title"
                                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                                placeholder="Título del desafío"
                                name="title"
                                required
                                minlength="8"
                                maxlength="50"
                                pattern="^[A-Za-zÁÉÍÓÚáéíóúÑñ0-9\s]+$"
                                title="El título solo puede contener letras, números y espacios">
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="description">Descripción</label>
                            <textarea
                                id="description"
                                class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                                rows="4"
                                placeholder="Descripción del desafío"
                                name="desripcion"
                                required
                                minlength="15"
                                maxlength="350"
                                
                                ></textarea>
                        </div>
                        <div class="flex justify-end">
                            <button
                                type="button"
                                @click="openModal = false"
                                class="bg-gray-500 hover:bg-gray-600 text-white font-semibold py-2 px-4 rounded-lg mr-2">
                                Cancelar
                            </button>
                            <button
                                type="submit"
                                class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded-lg">
                                Guardar
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>