<!-- resources/views/tasks/index.blade.php -->
@extends('layouts.app')

@section('content')
    <!--Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold text-gray-800 mb-8">Lista de Tareas</h1>

        <a href="{{ route('tasks.create') }}" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded-lg shadow-md transition duration-300 ease-in-out mb-8 inline-block">
            + Crear Tarea
        </a>

        <!-- Lista de tareas -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($tasks as $task)
                <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition duration-300 ease-in-out">
                    <!-- Encabezado de la tarjeta -->
                    <div class="p-6 border-b border-gray-200">
                        <h2 class="text-xl font-semibold text-gray-800 mb-2">{{ $task->name }}</h2>
                        <p class="text-gray-600">{{ $task->description ?? 'Sin descripción' }}</p>
                    </div>

                    <!-- Pie de la tarjeta con acciones -->
                    <div class="p-4 bg-gray-50 flex items-center justify-end space-x-4">
                        <!-- Botón de editar -->
                        <a href="{{ route('tasks.edit', $task) }}" class="text-blue-500 hover:text-blue-600 transition duration-200 ease-in-out">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                            </svg>
                        </a>

                        <!-- Formulario para eliminar -->
                        <form action="{{ route('tasks.destroy', $task) }}" method="POST" onsubmit="return confirm('¿Estás seguro de eliminar esta tarea?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500 hover:text-red-600 transition duration-200 ease-in-out">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                                </svg>
                            </button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection