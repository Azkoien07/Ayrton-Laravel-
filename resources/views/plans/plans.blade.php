@extends('layouts.app')
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Planes de Suscripción - Gestión de Tareas</title>
</head>

<body class="bg-gray-100 text-gray-900 font-sans">

    <!-- Contenedor Principal -->
    <div class="min-h-screen flex flex-col">

        <!-- Barra de Navegación -->
        <nav class="bg-white shadow-md p-4">
            <div class="container mx-auto flex justify-between items-center">
                <h1 class="text-xl font-semibold">Gestión de Tareas</h1>
                <div class="flex space-x-4">
                    <a href="{{ route('tasks.index') }}" class="text-gray-700 hover:text-blue-500">Inicio</a>
                </div>
            </div>
        </nav>

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
        <footer class="bg-white shadow-md p-4 mt-8">
            <div class="container mx-auto text-center text-sm text-gray-500">
                &copy; 2023 Gestión de Tareas. Todos los derechos reservados.
            </div>
        </footer>

    </div>

</body>

</html>