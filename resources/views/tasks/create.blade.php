@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold text-gray-800 mb-8 dark:text-white">{{ __('tasks.create_title') }}</h1>

   
    @if ($errors->any())
        <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-6" role="alert">
            <p class="font-bold">{{ __('tasks.error_message') }}</p>
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
            <label for="name" class="block text-gray-700 font-semibold mb-2 dark:text-dark-text">{{ __('tasks.name') }}</label>
            <input type="text"
                name="name"
                id="name"
                value="{{ old('name') }}"
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-dark-background dark:border-dark-border dark:text-dark-text"
                required
                minlength="3"
                maxlength="50"
                pattern="^[A-Za-zÁÉÍÓÚáéíóúÑñ0-9\s\-',.]+$"
                title="{{ __('tasks.name_validation') }}">
            @error('name')
                <span class="text-red-600 text-sm">{{ $message }}</span>
            @enderror
        </div>

       
        <div class="mb-4">
            <label for="state" class="block text-gray-700 font-semibold mb-2 dark:text-dark-text">{{ __('tasks.state') }}</label>
            <select name="state" id="state" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-dark-background dark:border-dark-border dark:text-dark-text" required>
                <option value="">{{ __('tasks.select_state') }}</option>
                <option value="Pendiente" {{ old('state') == 'Pendiente' ? 'selected' : '' }}>{{ __('tasks.pending') }}</option>
                <option value="En Progreso" {{ old('state') == 'En Progreso' ? 'selected' : '' }}>{{ __('tasks.in_progress') }}</option>
                <option value="Completada" {{ old('state') == 'Completada' ? 'selected' : '' }}>{{ __('tasks.completed') }}</option>
                <option value="Cancelada" {{ old('state') == 'Cancelada' ? 'selected' : '' }}>{{ __('tasks.canceled') }}</option>
            </select>
            @error('state')
                <span class="text-red-600 text-sm">{{ $message }}</span>
            @enderror
        </div>

       
        <div class="mb-4">
            <label for="description" class="block text-gray-700 font-semibold mb-2 dark:text-dark-text">{{ __('tasks.description') }}</label>
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
            <label for="priority" class="block text-gray-700 font-semibold mb-2 dark:text-dark-text">{{ __('tasks.priority') }}</label>
            <select name="priority" id="priority" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-dark-background dark:border-dark-border dark:text-dark-text" required>
                <option value="">{{ __('tasks.select_priority') }}</option>
                <option value="Baja" {{ old('priority') == 'Baja' ? 'selected' : '' }}>{{ __('tasks.low') }}</option>
                <option value="Media" {{ old('priority') == 'Media' ? 'selected' : '' }}>{{ __('tasks.medium') }}</option>
                <option value="Alta" {{ old('priority') == 'Alta' ? 'selected' : '' }}>{{ __('tasks.high') }}</option>
            </select>
            @error('priority')
                <span class="text-red-600 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-4">
            <label for="type" class="block text-gray-700 font-semibold mb-2 dark:text-dark-text">{{ __('tasks.type') }}</label>
            <select name="type" id="type" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-dark-background dark:border-dark-border dark:text-dark-text" required>
                <option value="">{{ __('tasks.select_type') }}</option>
                <option value="Personal" {{ old('type') == 'Personal' ? 'selected' : '' }}>{{ __('tasks.personal') }}</option>
                <option value="Laboral" {{ old('type') == 'Laboral' ? 'selected' : '' }}>{{ __('tasks.work') }}</option>
                <option value="Educativa" {{ old('type') == 'Educativa' ? 'selected' : '' }}>{{ __('tasks.educational') }}</option>
            </select>
            @error('type')
                <span class="text-red-600 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-4">
    <label for="reminder" class="block text-gray-700 font-semibold mb-2 dark:text-dark-text">
        {{ __('tasks.reminder') }}
    </label>
    <input type="datetime-local" 
        name="reminder" 
        id="reminder" 
        value="{{ old('reminder') }}"
        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-dark-background dark:border-dark-border dark:text-dark-text"
        max="2030-12-31T23:59">
    @error('reminder')
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
        required>
    @error('reminder')
        <span class="text-red-600 text-sm">{{ $message }}</span>
    @enderror
</div>

        <div class="mb-4">
            <label for="f_creation" class="block text-gray-700 font-semibold mb-2 dark:text-dark-text">{{ __('tasks.creation_date') }}</label>
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
            <label for="f_expiration" class="block text-gray-700 font-semibold mb-2 dark:text-dark-text">{{ __('tasks.expiration_date') }}</label>
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
            <button type="submit" class="bg-light-primary hover:bg-dark-background text-white font-semibold py-2 px-4 rounded-lg shadow-md transition duration-300 ease-in-out">
                {{ __('tasks.create_button') }}
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