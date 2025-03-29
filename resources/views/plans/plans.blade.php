@extends('layouts.app')
<!DOCTYPE html>
<html lang="es" x-data="{ openModal: false }" xmlns:x-transition>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <title>Planes de Suscripción - Gestión de Tareas</title>
</head>
<body class="bg-gray-100 text-gray-900 font-sans flex min-h-screen">
    <div class="flex-1 flex flex-col">
        <div class="flex-1 container mx-auto p-6">
            <h2 class="text-3xl font-bold text-center mb-8">Planes de Suscripción</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Plan Básico -->
                <div class="bg-white p-6 rounded-lg shadow-md text-center">
                    <h3 class="text-2xl font-semibold mb-4">Básico</h3>
                    <p class="text-gray-600 mb-4">Ideal para usuarios ocasionales.</p>
                    <p class="text-4xl font-bold mb-4">Gratis</p>
                    <button @click="openModal = true" class="bg-blue-500 text-white px-6 py-2 rounded-md hover:bg-blue-600 w-full">Seleccionar</button>
                </div>
                <!-- Plan Premium -->
                <div class="bg-white p-6 rounded-lg shadow-md text-center border-2 border-blue-500 transform scale-105">
                    <h3 class="text-2xl font-semibold mb-4">Premium</h3>
                    <p class="text-gray-600 mb-4">Para usuarios que necesitan más.</p>
                    <p class="text-4xl font-bold mb-4">$9.99/mes</p>
                    <button @click="openModal = true" class="bg-blue-500 text-white px-6 py-2 rounded-md hover:bg-blue-600 w-full">Seleccionar</button>
                </div>
                <!-- Plan Platino -->
                <div class="bg-white p-6 rounded-lg shadow-md text-center">
                    <h3 class="text-2xl font-semibold mb-4">Platino</h3>
                    <p class="text-gray-600 mb-4">Para equipos y profesionales.</p>
                    <p class="text-4xl font-bold mb-4">$19.99/mes</p>
                    <button @click="openModal = true" class="bg-blue-500 text-white px-6 py-2 rounded-md hover:bg-blue-600 w-full">Seleccionar</button>
                </div>
            </div>
        </div>
        
        <!-- Modal -->
        <div x-show="openModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center p-4" x-transition>
            <div class="bg-white rounded-lg shadow-lg w-full max-w-md p-6">
                <h2 class="text-xl font-semibold text-gray-800 mb-4">Confirmación de Suscripción</h2>
                <p class="text-gray-600 mb-4">¿Estás seguro de que deseas suscribirte a este plan?</p>
                <div class="flex justify-end space-x-4">
                    <button @click="openModal = false" class="bg-gray-400 text-white px-4 py-2 rounded-md hover:bg-gray-500">Cancelar</button>
                    <button class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">Confirmar</button>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
