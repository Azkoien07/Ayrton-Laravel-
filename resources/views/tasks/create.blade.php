@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold text-gray-800 mb-8 dark:text-white">Crear Nueva Tarea</h1>

   
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


    <form action="{{ route('tasks.store') }}" method="POST" class="bg-white rounded-lg shadow-md p-6 dark:bg-dark-card">
        @csrf
        

        <div class="mb-4">
            <label for="name" class="block text-gray-700 font-semibold mb-2 dark:text-dark-text">Nombre</label>
            <input type="text"
                name="name"
                id="name"
                value="{{ old('name') }}"
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-dark-background dark:border-dark-border dark:text-dark-text"
                required
                minlength="3"
                maxlength="50"
                pattern="^[A-Za-zÁÉÍÓÚáéíóúÑñ0-9\s\-',.]+$"
                title="El nombre solo puede contener letras, números, espacios, guiones, comas, puntos y apóstrofes">
            @error('name')
                <span class="text-red-600 text-sm">{{ $message }}</span>
            @enderror
        </div>

       
        <div class="mb-4">
            <label for="state" class="block text-gray-700 font-semibold mb-2 dark:text-dark-text">Estado</label>
            <select name="state" id="state" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-dark-background dark:border-dark-border dark:text-dark-text" required>
                <option value="">Seleccione un estado</option>
                <option value="Pendiente" {{ old('state') == 'Pendiente' ? 'selected' : '' }}>Pendiente</option>
                <option value="En Progreso" {{ old('state') == 'En Progreso' ? 'selected' : '' }}>En progreso</option>
                <option value="Completada" {{ old('state') == 'Completada' ? 'selected' : '' }}>Completada</option>
                <option value="Cancelada" {{ old('state') == 'Cancelada' ? 'selected' : '' }}>Cancelada</option>
            </select>
            @error('state')
                <span class="text-red-600 text-sm">{{ $message }}</span>
            @enderror
        </div>

       
        <div class="mb-4">
            <label for="description" class="block text-gray-700 font-semibold mb-2 dark:text-dark-text">Descripción</label>
            <textarea name="description" id="description" rows="4" 
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-dark-background dark:border-dark-border dark:text-dark-text"
                required
                minlength="15"
                maxlength="350">{{ old('description') }}</textarea>
            @error('description')
                <span class="text-red-600 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-4">
            <label for="priority" class="block text-gray-700 font-semibold mb-2 dark:text-dark-text">Prioridad</label>
            <select name="priority" id="priority" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-dark-background dark:border-dark-border dark:text-dark-text" required>
                <option value="">Seleccione una prioridad</option>
                <option value="Baja" {{ old('priority') == 'Baja' ? 'selected' : '' }}>Baja</option>
                <option value="Media" {{ old('priority') == 'Media' ? 'selected' : '' }}>Media</option>
                <option value="Alta" {{ old('priority') == 'Alta' ? 'selected' : '' }}>Alta</option>
            </select>
            @error('priority')
                <span class="text-red-600 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-4">
            <label for="type" class="block text-gray-700 font-semibold mb-2 dark:text-dark-text">Tipo</label>
            <select name="type" id="type" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-dark-background dark:border-dark-border dark:text-dark-text" required>
                <option value="">Seleccione un tipo</option>
                <option value="Personal" {{ old('type') == 'Personal' ? 'selected' : '' }}>Personal</option>
                <option value="Laboral" {{ old('type') == 'Laboral' ? 'selected' : '' }}>Laboral</option>
                <option value="Educativa" {{ old('type') == 'Educativa' ? 'selected' : '' }}>Educativa</option>
            </select>
            @error('type')
                <span class="text-red-600 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-4">
            <label for="reminder" class="block text-gray-700 font-semibold mb-2 dark:text-dark-text">Recordatorio</label>
            <input type="datetime-local" 
                name="reminder" 
                id="reminder" 
                value="{{ old('reminder') }}"
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-dark-background dark:border-dark-border dark:text-dark-text" 
                min="{{ date('Y-m-d\TH:i') }}" 
                max="2030-12-31T23:59">
            @error('reminder')
                <span class="text-red-600 text-sm">{{ $message }}</span>
            @enderror
        </div>

  
        <div class="mb-4">
            <label for="f_creation" class="block text-gray-700 font-semibold mb-2 dark:text-dark-text">Fecha de Creación</label>
            <input type="datetime-local" 
                name="f_creation" 
                id="f_creation" 
                value="{{ old('f_creation', now()->format('Y-m-d\TH:i')) }}"
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-dark-background dark:border-dark-border dark:text-dark-text" 
                readonly>
            @error('f_creation')
                <span class="text-red-600 text-sm">{{ $message }}</span>
            @enderror
        </div>

        
        <div class="mb-4">
            <label for="f_expiration" class="block text-gray-700 font-semibold mb-2 dark:text-dark-text">Fecha de Vencimiento</label>
            <input type="datetime-local" 
                name="f_expiration" 
                id="f_expiration" 
                value="{{ old('f_expiration') }}"
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-dark-background dark:border-dark-border dark:text-dark-text" 
                min="{{ date('Y-m-d\TH:i') }}" 
                max="2030-12-31T23:59"
                required>
            @error('f_expiration')
                <span class="text-red-600 text-sm">{{ $message }}</span>
            @enderror
        </div>

       
        <div class="flex items-center justify-end">
            <button type="submit" class="bg-deepTeal hover:bg-stormyBlue text-white font-semibold py-2 px-4 rounded-lg shadow-md transition duration-300 ease-in-out">
                Crear Tarea
            </button>
        </div>
    </form>
</div>

<script>
   
    document.addEventListener('DOMContentLoaded', function() {
        const fCreation = document.getElementById('f_creation');
        const fExpiration = document.getElementById('f_expiration');
        const reminder = document.getElementById('reminder');
        
     
        fExpiration.addEventListener('change', function() {
            const expirationDate = new Date(this.value);
            const currentDate = new Date();
            
            if (expirationDate < currentDate) {
                alert('La fecha de vencimiento debe ser futura');
                this.value = '';
            }
        });
        
 
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