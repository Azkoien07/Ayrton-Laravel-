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
        <header class="mb-12">
            <h1 class="text-4xl font-bold text-gray-800">Módulo de Desafío</h1>
            <p class="text-gray-600 mt-2">Organiza y gestiona tus desafíos de manera eficiente.</p>
        </header>

        <!-- Botón para agregar nuevo desafío -->
        <div class="mb-8">
            <button
                @click="openModal = true"
                class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded-lg shadow-md transition duration-300">
                + Nuevo Desafío
            </button>
            <button
                onclick="window.location.href = '{{ route('tasks.index') }}'"
                class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded-lg shadow-md transition duration-300 ml-4">
                Inicio
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
                            class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                            placeholder="Título del desafío">
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="description">Descripción</label>
                        <textarea
                            id="description"
                            class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                            rows="4"
                            placeholder="Descripción del desafío"></textarea>
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

</body>

</html>