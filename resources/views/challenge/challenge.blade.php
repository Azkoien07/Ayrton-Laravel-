@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <!-- Header consistente con la vista de tareas -->
    <div class="flex justify-between items-center mb-8">
        
        <h1 class="text-3xl font-bold text-gray-800 dark:text-white">Lista de Desafíos</h1>
        <button
            @click="openModal = true"
            class="bg-deepTeal hover:bg-stormyBlue text-white font-semibold py-2 px-6 rounded-lg shadow-md transition duration-300 ease-in-out flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd" />
            </svg>
            Nuevo Desafío
        </button>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <!-- Desafío 1 -->
        <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition duration-300 ease-in-out">
            <div class="p-6 border-b border-gray-200">
                <h2 class="text-xl font-semibold text-gray-800 mb-2">Desafío #1</h2>
                <p class="text-gray-600">Descripción del desafío que puede ser de cualquier longitud sin afectar el layout.</p>
            </div>

            <!-- Pie de tarjeta con estado y acciones -->
            <div class="p-4 bg-gray-50 flex items-center justify-between">
                <div class="flex space-x-2">
                    <span class="bg-blue-100 text-blue-800 text-xs px-2 py-1 rounded-full">En Progreso</span>
                    <span class="bg-green-100 text-green-800 text-xs px-2 py-1 rounded-full">Fácil</span>
                </div>
                <a href="#" class="text-blue-500 hover:text-blue-600 transition duration-200 ease-in-out flex items-center">
                    Ver detalles
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </a>
            </div>
        </div>

        <!-- Desafío 2-->
        <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition duration-300 ease-in-out">
            <div class="p-6 border-b border-gray-200">
                <h2 class="text-xl font-semibold text-gray-800 mb-2">Desafío #2</h2>
                <p class="text-gray-600">Otra descripción que mantendrá la consistencia visual con la vista de tareas dds.</p>
            </div>
            <div class="p-4 bg-gray-50 flex items-center justify-between">
                <div class="flex space-x-2">
                    <span class="bg-yellow-100 text-yellow-800 text-xs px-2 py-1 rounded-full">Pendiente</span>
                    <span class="bg-purple-100 text-purple-800 text-xs px-2 py-1 rounded-full">Medio</span>
                </div>
                <a href="#" class="text-blue-500 hover:text-blue-600 transition duration-200 ease-in-out flex items-center">
                    Ver detalles
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </a>
            </div>
        </div>

        <!-- Desafío 3 -->
        <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition duration-300 ease-in-out">
            <div class="p-6 border-b border-gray-200">
                <h2 class="text-xl font-semibold text-gray-800 mb-2">Desafío #3</h2>
                <p class="text-gray-600">Otra descripción que mantendrá la consistencia visual con la vista de tareas.</p>
            </div>
            <div class="p-4 bg-gray-50 flex items-center justify-between">
                <div class="flex space-x-2">
                    <span class="bg-yellow-100 text-yellow-800 text-xs px-2 py-1 rounded-full">Pendiente</span>
                    <span class="bg-red-100 text-red-800 text-xs px-2 py-1 rounded-full">Difícil</span>
                </div>
                <a href="#" class="text-blue-500 hover:text-blue-600 transition duration-200 ease-in-out flex items-center">
                    Ver detalles
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </a>
            </div>
        </div>
    </div>
</div>
@endsection