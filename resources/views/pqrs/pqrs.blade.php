@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-6">
   
    <div class="max-w-3xl mx-auto p-4">
        <div class="mb-8 text-center">
            <h2 class="text-3xl font-bold text-gray-800 mb-2">Envíe su PQRS</h2>
            <p class="text-gray-600">Formulario para Peticiones, Quejas, Reclamos y Sugerencias</p>
        </div>

       
        <div class="bg-white rounded-lg shadow-lg border border-gray-100 overflow-hidden">
            <div class="p-6"> 
              
                @if(session('success'))
                <div class="mb-4 p-3 bg-green-50 text-green-700 rounded-lg border border-green-200 text-sm"> <!-- Reduje mb-6 a mb-4 y tamaño del texto -->
                    <div class="flex items-center">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"> <!-- Icono más pequeño -->
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <span>{{ session('success') }}</span>
                    </div>
                </div>
                @endif

                <form action="{{ route('pqrs.store') }}" method="post">
                    @csrf
                    <!-- Tipo de PQRS -->
                    <div class="mb-6">
                        <label for="" class="block text-sm font-medium text-gray-700 mb-2">Tipo de PQRS *</label>
                        <div class="grid grid-cols-2 md:grid-cols-4 gap-3">
                            <label class="flex items-center">
                                <input type="radio" name="type_pqr" value="peticion" class="h-4 w-4 text-primary-600 focus:ring-primary-500" required>
                                <span class="ml-2 text-sm text-gray-700">Petición</span>
                            </label>
                            <label class="flex items-center">
                                <input type="radio" name="type_pqr" value="queja" class="h-4 w-4 text-primary-600 focus:ring-primary-500">
                                <span class="ml-2 text-sm text-gray-700">Queja</span>
                            </label>
                            <label class="flex items-center">
                                <input type="radio" name="type_pqr" value="reclamo" class="h-4 w-4 text-primary-600 focus:ring-primary-500">
                                <span class="ml-2 text-sm text-gray-700">Reclamo</span>
                            </label>
                            <label class="flex items-center">
                                <input type="radio" name="type_pqr" value="sugerencia" class="h-4 w-4 text-primary-600 focus:ring-primary-500">
                                <span class="ml-2 text-sm text-gray-700">Sugerencia</span>
                            </label>
                        </div>
                        @error('type')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Información del usuario (autocompletado si está logueado) -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Nombre completo *</label>
                            <input type="text" id="name" name="name" value="{{ old('name', auth()->user()->name ?? '') }}"
                                class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-primary-500 focus:border-primary-500" required>
                            @error('name')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Correo electrónico *</label>
                            <input type="email" id="email" name="email" value="{{ old('email', auth()->user()->email ?? '') }}"
                                class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-primary-500 focus:border-primary-500" required>
                            @error('email')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <!-- Asunto -->
                    <div class="mb-6">
                        <label for="subject" class="block text-sm font-medium text-gray-700 mb-1">Asunto *</label>
                        <input type="text" id="subject" name="subject" value="{{ old('subject') }}"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-primary-500 focus:border-primary-500" required>
                        @error('subject')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Descripción -->
                    <div class="mb-6">
                        <label for="description" class="block text-sm font-medium text-gray-700 mb-1">Descripción detallada *</label>
                        <textarea id="description" name="description" rows="5"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-primary-500 focus:border-primary-500" required>{{ old('description') }}</textarea>
                        @error('description')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Adjuntos -->
                    <div class="mb-8">
                        <label for="attachments" class="block text-sm font-medium text-gray-700 mb-1">Adjuntos (opcional)</label>
                        <input type="file" id="attachments" name="attachments[]" multiple
                            class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-primary-50 file:text-primary-700 hover:file:bg-primary-100">
                        <p class="mt-1 text-xs text-gray-500">Formatos aceptados: PDF, JPG, PNG. Máx. 5MB por archivo.</p>
                        @error('attachments.*')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Botón de envío -->
                    <div class="flex justify-end">
                        <button type="submit"
                            class="bg-primary-900 hover:bg-primary-700 text-white font-medium py-2 px-6 rounded-lg shadow-md transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500">
                            Enviar PQRS
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Información adicional -->
        <div class="mt-6 text-center text-sm text-gray-500">
            <p>Nos comprometemos a responder su solicitud en un plazo máximo de 5 días hábiles.</p>
            <p class="mt-1">Para consultas urgentes, por favor contacte a nuestro servicio al cliente.</p>
        </div>
    </div>
</div>

@push('styles')
<style>
    .shadow-lg {
        box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
    }

    input[type="radio"]:checked+span {
        font-weight: 600;
        color: #1a365d;
    }
</style>
@endpush
@endsection