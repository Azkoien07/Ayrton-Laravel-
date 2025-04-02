@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-6 dark:bg-dark-background">
    <div class="max-w-3xl mx-auto p-4">
        <div class="mb-8 text-center">
            <h2 class="text-3xl font-bold text-gray-800 mb-2 dark:text-dark-text">Envíe su PQRS</h2>
            <p class="text-gray-600 dark:text-dark-text-secondary">Formulario para Peticiones, Quejas, Reclamos y Sugerencias</p>
        </div>

        <div class="bg-white dark:bg-dark-card rounded-lg shadow-lg border border-gray-100 dark:border-dark-border overflow-hidden">
            <div class="p-6">
                @if($errors->any())
                    <div class="mb-4 p-3 bg-red-50 dark:bg-red-900/20 text-red-700 dark:text-red-300 rounded-lg border border-red-200 dark:border-red-800 text-sm">
                        <div class="flex items-center">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <span>Por favor corrige los siguientes errores:</span>
                        </div>
                        <ul class="mt-1 ml-6 list-disc">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @if(session('success'))
                <div class="mb-4 p-3 bg-green-50 dark:bg-green-900/20 text-green-700 dark:text-green-300 rounded-lg border border-green-200 dark:border-green-800 text-sm">
                    <div class="flex items-center">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <span>{{ session('success') }}</span>
                    </div>
                </div>
                @endif

                <form action="{{ route('pqrs.store') }}" method="POST">
                    @csrf
                    
                    <!-- Tipo de PQRS -->
                    <div class="mb-6">
                        <label class="block text-sm font-medium text-gray-700 dark:text-dark-text mb-2">Tipo de PQRS *</label>
                        <div class="grid grid-cols-2 md:grid-cols-4 gap-3">
                            <label class="flex items-center">
                                <input type="radio" name="type_pqr" value="Queja" class="h-4 w-4 text-primary-600 focus:ring-primary-500 dark:focus:ring-primary-400"
                                    {{ old('type_pqr') == 'Queja' ? 'checked' : '' }}>
                                <span class="ml-2 text-sm text-gray-700 dark:text-dark-text">Queja</span>
                            </label>
                            <label class="flex items-center">
                                <input type="radio" name="type_pqr" value="Sugerencia" class="h-4 w-4 text-primary-600 focus:ring-primary-500 dark:focus:ring-primary-400"
                                    {{ old('type_pqr') == 'Sugerencia' ? 'checked' : '' }}>
                                <span class="ml-2 text-sm text-gray-700 dark:text-dark-text">Sugerencia</span>
                            </label>
                            <label class="flex items-center">
                                <input type="radio" name="type_pqr" value="Sugerencia" class="h-4 w-4 text-primary-600 focus:ring-primary-500 dark:focus:ring-primary-400"
                                    {{ old('type_pqr') == 'Duda' ? 'checked' : '' }}>
                                <span class="ml-2 text-sm text-gray-700 dark:text-dark-text">Duda</span>
                            </label>
                        </div>
                        @error('type_pqr')
                        <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Título (Asunto) -->
                    <div class="mb-6">
                        <label for="title" class="block text-sm font-medium text-gray-700 dark:text-dark-text mb-1">Título *</label>
                        <input type="text" id="title" name="title" value="{{ old('title') }}"
                            class="w-full px-3 py-2 border border-gray-300 dark:border-dark-border rounded-md focus:ring-primary-500 focus:border-primary-500 dark:bg-dark-background dark:text-dark-text"
                            required
                            minlength="10"
                            maxlength="255"
                            placeholder="Ej: Problema con facturación del servicio">
                        @error('title')
                        <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Descripción -->
                    <div class="mb-6">
                        <label for="description" class="block text-sm font-medium text-gray-700 dark:text-dark-text mb-1">Descripción detallada *</label>
                        <textarea id="description" name="description" rows="5"
                            class="w-full px-3 py-2 border border-gray-300 dark:border-dark-border rounded-md focus:ring-primary-500 focus:border-primary-500 dark:bg-dark-background dark:text-dark-text"
                            required
                            minlength="20"
                            maxlength="1000"
                            placeholder="Describa su petición, queja, reclamo o sugerencia con el mayor detalle posible">{{ old('description') }}</textarea>
                        @error('description')
                        <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Argumento -->
                    <div class="mb-6">
                        <label for="argument" class="block text-sm font-medium text-gray-700 dark:text-dark-text mb-1">Argumento *</label>
                        <textarea id="argument" name="argument" rows="3"
                            class="w-full px-3 py-2 border border-gray-300 dark:border-dark-border rounded-md focus:ring-primary-500 focus:border-primary-500 dark:bg-dark-background dark:text-dark-text"
                            placeholder="Argumentos o razones que respaldan su solicitud">{{ old('argument') }}</textarea>
                        @error('argument')
                        <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Botón de envío -->
                    <div class="flex justify-end">
                        <button type="submit"
                            class="bg-deepTeal hover:bg-stormyBlue text-white font-medium py-2 px-6 rounded-lg shadow-md transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500 dark:focus:ring-offset-dark-card">
                            Enviar PQRS
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Información adicional -->
        <div class="mt-6 text-center text-sm text-gray-500 dark:text-dark-text-secondary">
            <p>Nos comprometemos a responder su solicitud en un plazo máximo de 5 días hábiles.</p>
            <p class="mt-1">Para consultas urgentes, por favor contacte a nuestro servicio al cliente.</p>
        </div>
    </div>
</div>
@endsection