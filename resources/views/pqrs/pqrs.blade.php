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

                <form action="{{ route('pqrs.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    
                    <!-- Tipo de PQRS -->
                    <div class="mb-6">
                        <label class="block text-sm font-medium text-gray-700 dark:text-dark-text mb-2">Tipo de PQRS *</label>
                        <div class="grid grid-cols-2 md:grid-cols-4 gap-3">
                            <label class="flex items-center">
                                <input type="radio" name="type_pqr" value="peticion" class="h-4 w-4 text-primary-600 focus:ring-primary-500 dark:focus:ring-primary-400" 
                                    required {{ old('type_pqr') == 'peticion' ? 'checked' : '' }}>
                                <span class="ml-2 text-sm text-gray-700 dark:text-dark-text">Petición</span>
                            </label>
                            <label class="flex items-center">
                                <input type="radio" name="type_pqr" value="queja" class="h-4 w-4 text-primary-600 focus:ring-primary-500 dark:focus:ring-primary-400"
                                    {{ old('type_pqr') == 'queja' ? 'checked' : '' }}>
                                <span class="ml-2 text-sm text-gray-700 dark:text-dark-text">Queja</span>
                            </label>
                            <label class="flex items-center">
                                <input type="radio" name="type_pqr" value="reclamo" class="h-4 w-4 text-primary-600 focus:ring-primary-500 dark:focus:ring-primary-400"
                                    {{ old('type_pqr') == 'reclamo' ? 'checked' : '' }}>
                                <span class="ml-2 text-sm text-gray-700 dark:text-dark-text">Reclamo</span>
                            </label>
                            <label class="flex items-center">
                                <input type="radio" name="type_pqr" value="sugerencia" class="h-4 w-4 text-primary-600 focus:ring-primary-500 dark:focus:ring-primary-400"
                                    {{ old('type_pqr') == 'sugerencia' ? 'checked' : '' }}>
                                <span class="ml-2 text-sm text-gray-700 dark:text-dark-text">Sugerencia</span>
                            </label>
                        </div>
                        @error('type_pqr')
                        <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Información del usuario -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-700 dark:text-dark-text mb-1">Nombre completo *</label>
                            <input type="text" id="name" name="name" value="{{ old('name', auth()->user()->name ?? '') }}"
                                class="w-full px-3 py-2 border border-gray-300 dark:border-dark-border rounded-md focus:ring-primary-500 focus:border-primary-500 dark:bg-dark-background dark:text-dark-text"
                                required
                                minlength="3"
                                maxlength="100"
                                pattern="^[A-Za-zÁÉÍÓÚáéíóúÑñ\s]+$"
                                title="Solo se permiten letras y espacios">
                            @error('name')
                            <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700 dark:text-dark-text mb-1">Correo electrónico *</label>
                            <input type="email" id="email" name="email" value="{{ old('email', auth()->user()->email ?? '') }}"
                                class="w-full px-3 py-2 border border-gray-300 dark:border-dark-border rounded-md focus:ring-primary-500 focus:border-primary-500 dark:bg-dark-background dark:text-dark-text"
                                required
                                pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$"
                                title="Ingrese un correo electrónico válido">
                            @error('email')
                            <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <!-- Asunto -->
                    <div class="mb-6">
                        <label for="subject" class="block text-sm font-medium text-gray-700 dark:text-dark-text mb-1">Asunto *</label>
                        <input type="text" id="subject" name="subject" value="{{ old('subject') }}"
                            class="w-full px-3 py-2 border border-gray-300 dark:border-dark-border rounded-md focus:ring-primary-500 focus:border-primary-500 dark:bg-dark-background dark:text-dark-text"
                            required
                            minlength="10"
                            maxlength="100">
                        @error('subject')
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
                            maxlength="1000">{{ old('description') }}</textarea>
                        @error('description')
                        <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Adjuntos -->
                    <div class="mb-8">
                        <label for="attachments" class="block text-sm font-medium text-gray-700 dark:text-dark-text mb-1">Adjuntos (opcional)</label>
                        <input type="file" id="attachments" name="attachments[]" multiple
                            class="block w-full text-sm text-gray-500 dark:text-dark-text-secondary file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-primary-50 dark:file:bg-dark-background file:text-primary-700 dark:file:text-dark-text hover:file:bg-primary-100 dark:hover:file:bg-dark-border"
                            accept=".pdf,.jpg,.jpeg,.png"
                            data-max-size="5120">
                        <p class="mt-1 text-xs text-gray-500 dark:text-dark-text-secondary">Formatos aceptados: PDF, JPG, PNG. Máx. 5MB por archivo.</p>
                        @error('attachments.*')
                        <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Botón de envío -->
                    <div class="flex justify-end">
                        <button type="submit"
                            class="bg-light-primary hover:bg-dark-background text-white font-medium py-2 px-6 rounded-lg shadow-md transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500 dark:focus:ring-offset-dark-card">
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

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Validación de tamaño de archivos
        const fileInput = document.getElementById('attachments');
        const maxSize = fileInput.dataset.maxSize * 1024; // Convertir a bytes
        
        fileInput.addEventListener('change', function() {
            const files = this.files;
            for (let i = 0; i < files.length; i++) {
                if (files[i].size > maxSize) {
                    alert(`El archivo ${files[i].name} excede el tamaño máximo de 5MB`);
                    this.value = '';
                    break;
                }
            }
        });

        // Validación de campos antes de enviar
        const form = document.querySelector('form');
        form.addEventListener('submit', function(e) {
            let isValid = true;
            
            // Validar tipo de PQRS seleccionado
            const typeSelected = document.querySelector('input[name="type_pqr"]:checked');
            if (!typeSelected) {
                alert('Por favor seleccione un tipo de PQRS');
                isValid = false;
            }
            
            if (!isValid) {
                e.preventDefault();
            }
        });
    });
</script>
@endpush

@push('styles')
<style>
    .shadow-lg {
        box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
    }

    input[type="radio"]:checked+span {
        font-weight: 600;
        color: #1a365d;
    }

    .dark input[type="radio"]:checked+span {
        color: #63b3ed;
    }
</style>
@endpush
@endsection