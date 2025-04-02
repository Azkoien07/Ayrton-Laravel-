@extends('layouts.app')

@section('content')
<body class="bg-gray-100 text-gray-900 dark:bg-dark-background dark:text-dark-text font-sans">

    <!-- Contenedor Principal -->
    <div class="min-h-screen flex flex-col">
        <div class="flex-1 container mx-auto p-6">
            <h2 class="text-3xl font-bold mb-8 dark:text-dark-text">Editar Tarea</h2>
            
            <!-- Mostrar errores de validación -->
            @if ($errors->any())
                <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-6" role="alert">
                    <p class="font-bold">Por favor corrige los siguientes errores:</p>
                    <ul class="list-disc pl-5">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Formulario de Edición -->
            <form action="{{ route('tasks.update', $task->id) }}" method="POST" class="bg-white dark:bg-dark-card p-6 rounded-lg shadow-md">
                @csrf
                @method('PUT')

                <!-- Campo: Nombre -->
                <div class="mb-4">
                    <label for="name" class="block text-sm font-medium text-gray-700 dark:text-dark-text">Nombre</label>
                    <input type="text" 
                        name="name" 
                        id="name" 
                        value="{{ old('name', $task->name) }}" 
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 dark:bg-dark-background dark:border-dark-border dark:text-dark-text"
                        required
                        minlength="3"
                        maxlength="50"
                        pattern="^[A-Za-zÁÉÍÓÚáéíóúÑñ0-9\s\-',.]+$"
                        title="El nombre solo puede contener letras, números, espacios, guiones, comas, puntos y apóstrofes">
                    @error('name')
                        <span class="text-red-600 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Campo: Descripción -->
                <div class="mb-4">
                    <label for="description" class="block text-sm font-medium text-gray-700 dark:text-dark-text">Descripción</label>
                    <textarea name="description" 
                        id="description" 
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 dark:bg-dark-background dark:border-dark-border dark:text-dark-text"
                        required
                        minlength="15"
                        maxlength="350">{{ old('description', $task->description) }}</textarea>
                    @error('description')
                        <span class="text-red-600 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Campo: Estado -->
                <div class="mb-4">
                    <label for="state" class="block text-sm font-medium text-gray-700 dark:text-dark-text">Estado</label>
                    <select name="state" 
                        id="state" 
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 dark:bg-dark-background dark:border-dark-border dark:text-dark-text" 
                        required>
                        <option value="">Seleccione un estado</option>
                        <option value="Pendiente" {{ old('state', $task->state) == 'Pendiente' ? 'selected' : '' }}>Pendiente</option>
                        <option value="En Progreso" {{ old('state', $task->state) == 'En Progreso' ? 'selected' : '' }}>En Progreso</option>
                        <option value="Completada" {{ old('state', $task->state) == 'Completada' ? 'selected' : '' }}>Completada</option>
                        <option value="Cancelada" {{ old('state', $task->state) == 'Cancelada' ? 'selected' : '' }}>Cancelada</option>
                    </select>
                    @error('state')
                        <span class="text-red-600 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Campo: Prioridad -->
                <div class="mb-4">
                    <label for="priority" class="block text-sm font-medium text-gray-700 dark:text-dark-text">Prioridad</label>
                    <select name="priority" 
                        id="priority" 
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 dark:bg-dark-background dark:border-dark-border dark:text-dark-text" 
                        required>
                        <option value="">Seleccione una prioridad</option>
                        <option value="Alta" {{ old('priority', $task->priority) == 'Alta' ? 'selected' : '' }}>Alta</option>
                        <option value="Media" {{ old('priority', $task->priority) == 'Media' ? 'selected' : '' }}>Media</option>
                        <option value="Baja" {{ old('priority', $task->priority) == 'Baja' ? 'selected' : '' }}>Baja</option>
                    </select>
                    @error('priority')
                        <span class="text-red-600 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Campo: Tipo -->
                <div class="mb-4">
                    <label for="type" class="block text-sm font-medium text-gray-700 dark:text-dark-text">Tipo</label>
                    <select name="type" 
                        id="type" 
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 dark:bg-dark-background dark:border-dark-border dark:text-dark-text" 
                        required>
                        <option value="">Seleccione un tipo</option>
                        <option value="Personal" {{ old('type', $task->type) == 'Personal' ? 'selected' : '' }}>Personal</option>
                        <option value="Laboral" {{ old('type', $task->type) == 'Laboral' ? 'selected' : '' }}>Laboral</option>
                        <option value="Educativa" {{ old('type', $task->type) == 'Educativa' ? 'selected' : '' }}>Educativa</option>
                    </select>
                    @error('type')
                        <span class="text-red-600 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Campo: Recordatorio -->
                <div class="mb-4">
                    <label for="reminder" class="block text-sm font-medium text-gray-700 dark:text-dark-text">Recordatorio</label>
                    <input type="datetime-local" 
                        name="reminder" 
                        id="reminder" 
                        value="{{ old('reminder', $task->reminder ? \Carbon\Carbon::parse($task->reminder)->format('Y-m-d\TH:i') : '') }}" 
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 dark:bg-dark-background dark:border-dark-border dark:text-dark-text"
                        min="{{ date('Y-m-d\TH:i') }}" 
                        max="2030-12-31T23:59">
                    @error('reminder')
                        <span class="text-red-600 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Campo: Fecha de Creación -->
                <div class="mb-4">
                    <label for="f_creation" class="block text-sm font-medium text-gray-700 dark:text-dark-text">Fecha de Creación</label>
                    <input type="datetime-local" 
                        name="f_creation" 
                        id="f_creation" 
                        value="{{ old('f_creation', $task->f_creation ? \Carbon\Carbon::parse($task->f_creation)->format('Y-m-d\TH:i') : now()->format('Y-m-d\TH:i')) }}" 
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 dark:bg-dark-background dark:border-dark-border dark:text-dark-text"
                        readonly>
                    @error('f_creation')
                        <span class="text-red-600 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Campo: Fecha de Expiración -->
                <div class="mb-4">
                    <label for="f_expiration" class="block text-sm font-medium text-gray-700 dark:text-dark-text">Fecha de Expiración</label>
                    <input type="datetime-local" 
                        name="f_expiration" 
                        id="f_expiration" 
                        value="{{ old('f_expiration', $task->f_expiration ? \Carbon\Carbon::parse($task->f_expiration)->format('Y-m-d\TH:i') : '') }}" 
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 dark:bg-dark-background dark:border-dark-border dark:text-dark-text"
                        min="{{ date('Y-m-d\TH:i') }}" 
                        max="2030-12-31T23:59"
                        required>
                    @error('f_expiration')
                        <span class="text-red-600 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Botones -->
                <div class="flex justify-end space-x-4">
                    <a href="{{ route('tasks.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded-md hover:bg-gray-600 transition duration-300">Cancelar</a>
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 transition duration-300">Guardar Cambios</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        // Validación adicional para fechas
        document.addEventListener('DOMContentLoaded', function() {
            const fCreation = document.getElementById('f_creation');
            const fExpiration = document.getElementById('f_expiration');
            const reminder = document.getElementById('reminder');
            
            // Validar que la fecha de vencimiento sea posterior a la fecha actual
            fExpiration.addEventListener('change', function() {
                const expirationDate = new Date(this.value);
                const currentDate = new Date();
                
                if (expirationDate < currentDate) {
                    alert('La fecha de vencimiento debe ser futura');
                    this.value = '';
                }
            });
            
            // Validar que el recordatorio sea antes de la fecha de vencimiento
            reminder.addEventListener('change', function() {
                const reminderDate = new Date(this.value);
                const expirationDate = new Date(fExpiration.value);
                
                if (fExpiration.value && reminderDate > expirationDate) {
                    alert('El recordatorio debe ser antes de la fecha de vencimiento');
                    this.value = '';
                }
            });
        });
    </script>
@endsection