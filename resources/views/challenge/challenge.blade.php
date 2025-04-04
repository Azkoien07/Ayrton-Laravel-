@extends('layouts.app')

@section('content')
<div x-data="{ openModal: false }" class="container mx-auto px-4 py-8">

    <!-- Encabezado y botón -->
    <div class="flex justify-between items-center mb-8">
        <h1 class="text-3xl font-bold text-light-text dark:text-dark-text">Lista de Desafíos</h1>
        <button
            @click="openModal = true"
            class="bg-light-primary dark:bg-dark-primary hover:bg-light-hover dark:hover:bg-dark-hover text-white font-semibold py-2 px-6 rounded-lg shadow-md transition duration-300 ease-in-out flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd" />
            </svg>
            Nuevo Desafío
        </button>
    </div>

    <!-- Modal -->
    <!-- Modal -->
    <div
        x-show="openModal"
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 scale-90"
        x-transition:enter-end="opacity-100 scale-100"
        x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100 scale-100"
        x-transition:leave-end="opacity-0 scale-90"
        class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50 px-4"
        style="display: none;">
        <div
            @click.away="openModal = false"
            class="bg-white dark:bg-dark-card w-full max-w-2xl p-10 rounded-3xl shadow-2xl border border-gray-200 dark:border-gray-700 space-y-6 overflow-y-auto max-h-[90vh]">

            <div class="flex items-center space-x-4">
                <div class="bg-light-primary dark:bg-dark-primary p-3 rounded-full text-white shadow">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path d="M12 4v16m8-8H4" />
                    </svg>
                </div>
                <h2 class="text-2xl font-bold text-gray-800 dark:text-white">Registrar desafío</h2>
            </div>

            <!-- Formulario -->
            <form action="{{ route('challenge.store') }}" method="POST" class="grid gap-6">
                @csrf

                <!-- Campo: Título -->
                <div>
                    <label for="name" class="block text-base font-semibold text-gray-700 dark:text-gray-200 mb-1">Título</label>
                    <input type="text" name="name" id="name" required
                        class="w-full px-4 py-3 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-dark-background text-gray-900 dark:text-white focus:ring-2 focus:ring-indigo-300 dark:focus:ring-indigo-600 transition" />
                </div>

                <!-- Campo: Descripción -->
                <div>
                    <label for="description" class="block text-base font-semibold text-gray-700 dark:text-gray-200 mb-1">Descripción</label>
                    <textarea name="description" id="description" rows="4" required
                        class="w-full px-4 py-3 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-dark-background text-gray-900 dark:text-white focus:ring-2 focus:ring-indigo-300 dark:focus:ring-indigo-600 transition"></textarea>
                </div>

                <!-- Campo: Categoría -->
                <div>
                    <label for="category" class="block text-base font-semibold text-gray-700 dark:text-gray-200 mb-1">Categoría</label>
                    <input type="text" name="category" id="category" required
                        class="w-full px-4 py-3 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-dark-background text-gray-900 dark:text-white focus:ring-2 focus:ring-indigo-300 dark:focus:ring-indigo-600 transition" />
                </div>

                <!-- Campo: Estado -->
                <div>
                    <label for="state" class="block text-base font-semibold text-gray-700 dark:text-gray-200 mb-1">Estado</label>
                    <select name="state" id="state" required
                        class="w-full px-4 py-3 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-dark-background text-gray-900 dark:text-white focus:ring-2 focus:ring-indigo-300 dark:focus:ring-indigo-600 transition">
                        <option value="Pendiente">Pendiente</option>
                        <option value="En progreso">En progreso</option>
                        <option value="Completado">Completado</option>
                        <option value="Cancelado">Cancelado</option>
                    </select>
                </div>

                <!-- Campo: Dificultad -->
                <div>
                    <label for="dificulty" class="block text-base font-semibold text-gray-700 dark:text-gray-200 mb-1">Dificultad</label>
                    <select name="dificulty" id="dificulty" required
                        class="w-full px-4 py-3 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-dark-background text-gray-900 dark:text-white focus:ring-2 focus:ring-indigo-300 dark:focus:ring-indigo-600 transition">
                        <option value="Fácil">Fácil</option>
                        <option value="Medio">Medio</option>
                        <option value="Dificil">Difícil</option>
                    </select>
                </div>

                <!-- Campo: Puntos -->
                <div>
                    <label for="points" class="block text-base font-semibold text-gray-700 dark:text-gray-200 mb-1">Puntos</label>
                    <input type="number" name="points" id="points" min="1" required
                        class="w-full px-4 py-3 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-dark-background text-gray-900 dark:text-white focus:ring-2 focus:ring-indigo-300 dark:focus:ring-indigo-600 transition" />
                </div>

                <!-- Botones -->
                <div class="flex justify-end gap-3 pt-2">
                    <button type="button" @click="openModal = false"
                        class="px-5 py-2 rounded-lg bg-gray-200 dark:bg-gray-700 text-gray-800 dark:text-white hover:bg-gray-300 dark:hover:bg-gray-600 transition">
                        Cancelar
                    </button>
                    <button type="submit"
                        class="px-5 py-2 rounded-lg bg-light-primary dark:bg-dark-primary text-white hover:bg-light-hover dark:hover:bg-dark-hover transition">
                        Registrar
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Tarjetas de desafíos -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach ($desafios as $desafio)
        <div class="bg-light-card dark:bg-dark-card rounded-lg shadow-md overflow-hidden hover:shadow-lg transition duration-300 ease-in-out">
            <div class="p-6 border-b border-light-border dark:border-dark-border">
                <h2 class="text-xl font-semibold text-light-text dark:text-dark-text mb-2">{{ $desafio->name }}</h2>
                <p class="text-light-textSecondary dark:text-dark-textSecondary">{{ $desafio->description }}</p>
            </div>
            <div class="p-4 bg-light-background dark:bg-dark-background flex items-center justify-between">
                <div class="flex space-x-2">
                    <span class="@switch($desafio->state)
                            @case('Pendiente') bg-gray-400 dark:bg-gray-500 @break
                            @case('En progreso') bg-yellow-400 dark:bg-yellow-500 @break
                            @case('Completado') bg-green-400 dark:bg-green-500 @break
                            @case('Cancelado') bg-red-400 dark:bg-red-500 @break
                            @default bg-gray-200 dark:bg-gray-600
                        @endswitch text-black dark:text-white text-xs px-2 py-1 rounded-full">
                        {{ $desafio->state }}
                    </span>
                    <span class="@switch($desafio->dificulty)
                            @case('Fácil') bg-green-400 dark:bg-green-500 @break
                            @case('Medio') bg-blue-400 dark:bg-blue-500 @break
                            @case('Difícil') bg-purple-400 dark:bg-purple-500 @break
                            @default bg-gray-200 dark:bg-gray-600
                        @endswitch text-black dark:text-white text-xs px-2 py-1 rounded-full">
                        {{ $desafio->dificulty }}
                    </span>
                </div>
                <a href="#" class="text-light-primary dark:text-dark-primary hover:text-light-hover dark:hover:text-dark-hover transition duration-200 ease-in-out flex items-center">
                    Ver detalles
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </a>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection