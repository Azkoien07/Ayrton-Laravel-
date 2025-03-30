@extends('layouts.app')

@section('content')
<body class="bg-gray-100 text-gray-900 font-sans">

    <!-- Contenedor Principal -->
    <div class="min-h-screen flex flex-col">
        <div class="flex-1 container mx-auto p-6">
            <h2 class="text-3xl font-bold mb-8">Editar Tarea</h2>
            <!-- Formulario de Edición -->
            <form action="{{ route('tasks.update', $task->id) }}" method="POST" class="bg-white p-6 rounded-lg shadow-md">
                @csrf
                @method('PUT')

                <!-- Campo: Nombre -->
                <div class="mb-4">
                    <label for="name" class="block text-sm font-medium text-gray-700">Nombre</label>
                    <input type="text" name="name" id="name" value="{{ old('name', $task->name) }}" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500" required>
                </div>

                <!-- Campo: Descripción -->
                <div class="mb-4">
                    <label for="description" class="block text-sm font-medium text-gray-700">Descripción</label>
                    <textarea name="description" id="description" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">{{ old('description', $task->description) }}</textarea>
                </div>

                <!-- Campo: Estado -->
                <div class="mb-4">
                    <label for="state" class="block text-sm font-medium text-gray-700">Estado</label>
                    <select name="state" id="state" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500" required>
                        <option value="Pendiente" {{ $task->state == 'Pendiente' ? 'selected' : '' }}>Pendiente</option>
                        <option value="En Progreso" {{ $task->state == 'En Progreso' ? 'selected' : '' }}>En Progreso</option>
                        <option value="Completada" {{ $task->state == 'Completada' ? 'selected' : '' }}>Completada</option>
                        <option value="Cancelada" {{ $task->state == 'Cancelada' ? 'selected' : '' }}>Cancelada</option>
                    </select>
                </div>

                <!-- Campo: Prioridad -->
                <div class="mb-4">
                    <label for="priority" class="block text-sm font-medium text-gray-700">Prioridad</label>
                    <select name="priority" id="priority" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500" required>
                        <option value="Alta" {{ $task->priority == 'Alta' ? 'selected' : '' }}>Alta</option>
                        <option value="Media" {{ $task->priority == 'Media' ? 'selected' : '' }}>Media</option>
                        <option value="Baja" {{ $task->priority == 'Baja' ? 'selected' : '' }}>Baja</option>
                    </select>
                </div>

                <!-- Campo: Tipo -->
                <div class="mb-4">
                    <label for="type" class="block text-sm font-medium text-gray-700">Tipo</label>
                    <select name="type" id="type" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500" required>
                        <option value="Personal" {{ $task->type == 'Personal' ? 'selected' : '' }}>Personal</option>
                        <option value="Laboral" {{ $task->type == 'Laboral' ? 'selected' : '' }}>Laboral</option>
                        <option value="Educativa" {{ $task->type == 'Educativa' ? 'selected' : '' }}>Educativa</option>
                    </select>
                </div>

                <!-- Campo: Recordatorio -->
                <div class="mb-4">
                    <label for="reminder" class="block text-sm font-medium text-gray-700">Recordatorio</label>
                    <input type="text" name="reminder" id="reminder" value="{{ old('reminder', $task->reminder) }}" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500" required>
                </div>

                <!-- Campo: Fecha de Creación -->
                <div class="mb-4">
                    <label for="f_creation" class="block text-sm font-medium text-gray-700">Fecha de Creación</label>
                    <input type="date" name="f_creation" id="f_creation" value="{{ old('f_creation', $task->f_creation) }}" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500" required>
                </div>

                <!-- Campo: Fecha de Expiración -->
                <div class="mb-4">
                    <label for="f_expiration" class="block text-sm font-medium text-gray-700">Fecha de Expiración</label>
                    <input type="date" name="f_expiration" id="f_expiration" value="{{ old('f_expiration', $task->f_expiration) }}" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500" required>
                </div>

                <!-- Botones -->
                <div class="flex justify-end space-x-4">
                    <a href="{{ route('tasks.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded-md hover:bg-gray-600">Cancelar</a>
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">Guardar Cambios</button>
                </div>
            </form>
        </div>
    </div>
@endsection