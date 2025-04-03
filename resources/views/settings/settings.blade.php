@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8 bg-light-background dark:bg-dark-background">
    <!-- Contenido principal -->
    <div class="p-6">
        <!-- Título principal elevado y con más jerarquía -->
        <div class="mb-10">
            <h2 class="text-3xl font-bold text-light-text dark:text-dark-text mb-2">Configuración de la cuenta</h2>
        </div>

        <!-- Grid de configuración con sombras mejoradas -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <!-- Sección Perfil -->
            <div class="bg-light-card dark:bg-dark-card rounded-lg shadow-lg border border-light-border dark:border-dark-border overflow-hidden transition-transform hover:scale-[1.02]">
                <div class="p-6">
                    <h3 class="text-lg font-bold text-light-text dark:text-dark-text mb-4 flex items-center">
                        <svg class="w-5 h-5 mr-2 text-light-textSecondary dark:text-dark-textSecondary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                        Perfil
                    </h3>
                    <form class="space-y-4">
                        <div>
                            <label for="" class="block text-sm font-medium text-light-text dark:text-dark-text mb-1">Nombre</label>
                            <input type="text"
                                class="w-full px-3 py-2 border border-light-border dark:border-dark-border rounded-md focus:ring-light-primary dark:focus:ring-dark-hover focus:border-light-primary dark:focus:border-dark-hover bg-light-card dark:bg-dark-card text-light-text dark:text-dark-text"
                                maxlength="20"
                                pattern="^[A-Za-zÁÉÍÓÚáéíóúÑñ\s]+$"
                                title="Solo se permiten letras y espacios."
                                required>
                        </div>
                        <div>
                            <label for="" class="block text-sm font-medium text-light-text dark:text-dark-text mb-1">Correo electrónico</label>
                            <input type="email"
                                class="w-full px-3 py-2 border border-light-border dark:border-dark-border rounded-md focus:ring-light-primary dark:focus:ring-dark-hover focus:border-light-primary dark:focus:border-dark-hover bg-light-card dark:bg-dark-card text-light-text dark:text-dark-text"
                                required
                                maxlength="40"
                                pattern="^[a-zA-Z0-9._%+-]+@(gmail\.com|gmail\.com\.co|outlook\.com|yahoo\.com)$"
                                title="El correo debe ser de Gmail, Outlook o Yahoo">
                        </div>
                        <button class="bg-light-primary hover:bg-light-hover dark:bg-dark-primary dark:hover:bg-dark-hover text-white font-medium py-2 px-4 rounded-lg shadow-md transition-colors duration-200">
                            Guardar cambios
                        </button>
                    </form>
                </div>
            </div>

            <!-- Sección Preferencias -->
            <div class="bg-light-card dark:bg-dark-card rounded-lg shadow-lg border border-light-border dark:border-dark-border overflow-hidden transition-transform hover:scale-[1.02]">
                <div class="p-6">
                    <h3 class="text-lg font-bold text-light-text dark:text-dark-text mb-4 flex items-center">
                        <svg class="w-5 h-5 mr-2 text-light-textSecondary dark:text-dark-textSecondary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        Preferencias
                    </h3>
                    <form class="space-y-4" action="{{ route('language.switch') }}" method="POST">
                        @csrf
                        <div>
                            <label for="theme" class="block text-sm font-medium text-light-text dark:text-dark-text mb-1">Tema</label>
                            <select id="theme" class="w-full px-3 py-2 border border-light-border dark:border-dark-border rounded-md focus:ring-light-primary dark:focus:ring-dark-hover focus:border-light-primary dark:focus:border-dark-hover bg-light-card dark:bg-dark-card text-light-text dark:text-dark-text" name="theme">
                                <option value="light">Claro</option>
                                <option value="dark">Oscuro</option>
                            </select>
                        </div>
                        <div>
                            <label for="language" class="block text-sm font-medium text-light-text dark:text-dark-text mb-1">Idioma</label>
                            <select id="language" class="w-full px-3 py-2 border border-light-border dark:border-dark-border rounded-md focus:ring-light-primary dark:focus:ring-dark-hover focus:border-light-primary dark:focus:border-dark-hover bg-light-card dark:bg-dark-card text-light-text dark:text-dark-text" name="language">
                                <option value="es" {{ app()->getLocale() == 'es' ? 'selected' : '' }}>Español</option>
                                <option value="en" {{ app()->getLocale() == 'en' ? 'selected' : '' }}>English</option>
                            </select>
                        </div>
                        <button type="submit" class="bg-light-primary hover:bg-light-hover dark:bg-dark-primary dark:hover:bg-dark-hover text-white font-medium py-2 px-4 rounded-lg shadow-md transition-colors duration-200">
                            Guardar preferencias
                        </button>
                    </form>
                </div>
            </div>
            <!-- Sección Notificaciones -->
            <div class="bg-light-card dark:bg-dark-card rounded-lg shadow-lg border border-light-border dark:border-dark-border overflow-hidden transition-transform hover:scale-[1.02]">
                <div class="p-6">
                    <h3 class="text-lg font-bold text-light-text dark:text-dark-text mb-4 flex items-center">
                        <svg class="w-5 h-5 mr-2 text-light-textSecondary dark:text-dark-textSecondary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                        </svg>
                        Notificaciones
                    </h3>
                    <form class="space-y-4">
                        <div class="flex items-center">
                            <input type="checkbox" class="h-4 w-4 text-light-primary dark:text-dark-primary focus:ring-light-primary dark:focus:ring-dark-hover border-light-border dark:border-dark-border rounded">
                            <label for="" class="ml-2 block text-sm text-light-text dark:text-dark-text">Notificaciones por correo</label>
                        </div>
                        <div class="flex items-center">
                            <input type="checkbox" class="h-4 w-4 text-light-primary dark:text-dark-primary focus:ring-light-primary dark:focus:ring-dark-hover border-light-border dark:border-dark-border rounded">
                            <label for="" class="ml-2 block text-sm text-light-text dark:text-dark-text">Notificaciones push</label>
                        </div>
                        <button class="bg-light-primary hover:bg-light-hover dark:bg-dark-primary dark:hover:bg-dark-hover text-white font-medium py-2 px-4 rounded-lg shadow-md transition-colors duration-200">
                            Guardar configuración
                        </button>
                    </form>
                </div>
            </div>

            <!-- Sección Seguridad -->
            <div class="bg-light-card dark:bg-dark-card rounded-lg shadow-lg border border-light-border dark:border-dark-border overflow-hidden transition-transform hover:scale-[1.02]">
                <div class="p-6">
                    <h3 class="text-lg font-bold text-light-text dark:text-dark-text mb-4 flex items-center">
                        <svg class="w-5 h-5 mr-2 text-light-textSecondary dark:text-dark-textSecondary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                        </svg>
                        Seguridad
                    </h3>
                    <form class="space-y-4">
                        <div>
                            <label for="" class="block text-sm font-medium text-light-text dark:text-dark-text mb-1">Nueva contraseña</label>
                            <input type="password" autocomplete="new-password" class="w-full px-3 py-2 border border-light-border dark:border-dark-border rounded-md focus:ring-light-primary dark:focus:ring-dark-hover focus:border-light-primary dark:focus:border-dark-hover bg-light-card dark:bg-dark-card text-light-text dark:text-dark-text">
                        </div>
                        <div>
                            <label for="" class="block text-sm font-medium text-light-text dark:text-dark-text mb-1">Confirmar contraseña</label>
                            <input type="password" autocomplete="new-password" class="w-full px-3 py-2 border border-light-border dark:border-dark-border rounded-md focus:ring-light-primary dark:focus:ring-dark-hover focus:border-light-primary dark:focus:border-dark-hover bg-light-card dark:bg-dark-card text-light-text dark:text-dark-text">
                        </div>
                        <button class="bg-light-primary hover:bg-light-hover dark:bg-dark-primary dark:hover:bg-dark-hover text-white font-medium py-2 px-4 rounded-lg shadow-md transition-colors duration-200">
                            Cambiar contraseña
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection