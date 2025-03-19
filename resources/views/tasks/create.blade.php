<!-- resources/views/tasks/create.blade.php -->
@extends('layouts.app')

@section('content')
<!-- Agrega el CDN de Tailwind CSS -->
<script src="https://cdn.tailwindcss.com"></script>

<div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold text-gray-800 mb-8">Crear Nueva Tarea</h1>

    <!-- Formulario -->
    <form action="{{ route('tasks.store') }}" method="POST" class="bg-white rounded-lg shadow-md p-6">
        @csrf 

        <!-- Campo: Nombre -->
        <div class="mb-4">
            <label for="name" class="block text-gray-700 font-semibold mb-2">Nombre</label>
            <input type="text" name="name" id="name" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
        </div>

        <!-- Campo: Estado (Select) -->
        <div class="mb-4">
            <label for="state" class="block text-gray-700 font-semibold mb-2">Estado</label>
            <select name="state" id="state" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                <option value="Pendiente">Pendiente</option>
                <option value="En progreso">En progreso</option>
                <option value="Completada">Completada</option>
                <option value="Completada">Cancelada</option>
            </select>
        </div>

        <!-- Campo: Descripción -->
        <div class="mb-4">
            <label for="description" class="block text-gray-700 font-semibold mb-2">Descripción</label>
            <textarea name="description" id="description" rows="4" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"></textarea>
        </div>


        <!-- Campo: Prioridad -->
        <div class="mb-4">
            <label for="priority" class="block text-gray-700 font-semibold mb-2">Prioridad</label>
            <select name="priority" id="priority" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                <option value="Baja">Baja</option>
                <option value="Media">Media</option>
                <option value="Alta">Alta</option>
            </select>
        </div>

        <!-- Campo: Tipo -->
        <div class="mb-4">
            <label for="type" class="block text-gray-700 font-semibold mb-2">Tipo</label>
            <select name="type" id="type" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                <option value="Personal">Personal</option>
                <option value="Laboral">Laboral</option>
                <option value="Educativa">Educativa</option>
            </select>
        </div>

        <!-- Campo: Recordatorio -->
        <div class="mb-4">
            <label for="reminder" class="block text-gray-700 font-semibold mb-2">Recordatorio</label>
            <input type="date" name="reminder" id="reminder" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>

        <!-- Campo: Fecha de Creación -->
        <div class="mb-4">
            <label for="f_creation" class="block text-gray-700 font-semibold mb-2">Fecha de Creación</label>
            <input type="date" name="f_creation" id="f_creation" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>

        <!-- Campo: Fecha de Vencimiento -->
        <div class="mb-4">
            <label for="f_expiration" class="block text-gray-700 font-semibold mb-2">Fecha de Vencimiento</label>
            <input type="date" name="f_expiration" id="f_expiration" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>

        <!-- Botón de enviar -->
        <div class="flex items-center justify-end">
            <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded-lg shadow-md transition duration-300 ease-in-out">
                Crear Tarea
            </button>
        </div>
    </form>
</div>
@endsection