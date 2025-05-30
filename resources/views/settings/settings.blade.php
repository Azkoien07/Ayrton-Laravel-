@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8 bg-light-background dark:bg-dark-background">
    @include('notify::components.notify')
    <!-- Contenido principal -->
    <div class="p-6">
        <div class="mb-10">
            <h2 class="text-3xl font-bold text-light-text dark:text-dark-text mb-2">@lang('settings.account_settings')</h2>
        </div>
        <!-- Grid de configuración -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <!-- Sección Perfil -->
            <div class="bg-light-card dark:bg-dark-card rounded-lg shadow-lg border border-light-border dark:border-dark-border overflow-hidden transition-transform hover:scale-[1.02]">
                <div class="p-6">
                    <h3 class="text-lg font-bold text-light-text dark:text-dark-text mb-4 flex items-center">
                        <svg class="w-5 h-5 mr-2 text-light-textSecondary dark:text-dark-textSecondary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                        @lang('settings.profile')
                    </h3>
                    <form method="POST" action="{{ route('account.profile.update') }}" class="space-y-4">
                        @csrf

                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300">@lang('settings.name')</label>
                            <input
                                type="text"
                                name="name"
                                id="name"
                                value="{{ old('name', auth()->user()->name) }}"
                                class="mt-1 block w-full px-4 py-2 bg-gray-100 dark:bg-gray-700 text-gray-900 dark:text-white rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                        </div>

                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300">@lang('settings.email')</label>
                            <input
                                type="email"
                                name="email"
                                id="email"
                                value="{{ old('email', auth()->user()->email) }}"
                                class="mt-1 block w-full px-4 py-2 bg-gray-100 dark:bg-gray-700 text-gray-900 dark:text-white rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                        </div>

                        <button class="bg-light-primary hover:bg-light-hover dark:bg-dark-primary dark:hover:bg-dark-hover text-white font-medium py-2 px-4 rounded-lg shadow-md transition-colors duration-200">
                            @lang('settings.save_changes')
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
                        @lang('settings.preferences')
                    </h3>
                    <form class="space-y-4" action="{{ route('language.switch') }}" method="POST">
                        @csrf
                        <div>
                            <label for="language" class="block text-sm font-medium text-light-text dark:text-dark-text mb-1">@lang('settings.language')</label>
                            <select id="language" class="w-full px-3 py-2 border border-light-border dark:border-dark-border rounded-md focus:ring-light-primary dark:focus:ring-dark-hover focus:border-light-primary dark:focus:border-dark-hover bg-light-card dark:bg-dark-card text-light-text dark:text-dark-text" name="language">
                                <option value="es" {{ session('locale') == 'es' ? 'selected' : '' }}>@lang('settings.spanish')</option>
                                <option value="en" {{ session('locale') == 'en' ? 'selected' : '' }}>@lang('settings.english')</option>
                            </select>
                        </div>
                        <button type="submit" class="bg-light-primary hover:bg-light-hover dark:bg-dark-primary dark:hover:bg-dark-hover text-white font-medium py-2 px-4 rounded-lg shadow-md transition-colors duration-200">
                            @lang('settings.save_preferences')
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
                        @lang('settings.notifications')
                    </h3>
                    <form class="space-y-4">
                        <div class="flex items-center">
                            <input type="checkbox" checked class="h-4 w-4 text-light-primary dark:text-dark-primary focus:ring-light-primary dark:focus:ring-dark-hover border-light-border dark:border-dark-border rounded">
                            <label for="" class="ml-2 block text-sm text-light-text dark:text-dark-text">@lang('settings.email_notifications')</label>
                        </div>
                        <div class="flex items-center">
                            <input type="checkbox" checked class="h-4 w-4 text-light-primary dark:text-dark-primary focus:ring-light-primary dark:focus:ring-dark-hover border-light-border dark:border-dark-border rounded">
                            <label for="" class="ml-2 block text-sm text-light-text dark:text-dark-text">@lang('settings.push_notifications')</label>
                        </div>
                        <button class="bg-light-primary hover:bg-light-hover dark:bg-dark-primary dark:hover:bg-dark-hover text-white font-medium py-2 px-4 rounded-lg shadow-md transition-colors duration-200">
                            @lang('settings.save_settings')
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
                        @lang('settings.security')
                    </h3>
                    <form action="{{ route('account.password.update') }}" method="POST" class="space-y-4">
                        @csrf

                        <div>
                            <label for="password" class="block text-sm font-medium text-light-text dark:text-dark-text mb-1">@lang('settings.new_password')</label>
                            <input
                                type="password"
                                name="password"
                                id="password"
                                autocomplete="new-password"
                                required
                                class="w-full px-3 py-2 border border-light-border dark:border-dark-border rounded-md focus:ring-light-primary dark:focus:ring-dark-hover focus:border-light-primary dark:focus:border-dark-hover bg-light-card dark:bg-dark-card text-light-text dark:text-dark-text">
                        </div>

                        <div>
                            <label for="password_confirmation" class="block text-sm font-medium text-light-text dark:text-dark-text mb-1">@lang('settings.confirm_password')</label>
                            <input
                                type="password"
                                name="password_confirmation"
                                id="password_confirmation"
                                autocomplete="new-password"
                                required
                                class="w-full px-3 py-2 border border-light-border dark:border-dark-border rounded-md focus:ring-light-primary dark:focus:ring-dark-hover focus:border-light-primary dark:focus:border-dark-hover bg-light-card dark:bg-dark-card text-light-text dark:text-dark-text">
                        </div>

                        <button class="bg-light-primary hover:bg-light-hover dark:bg-dark-primary dark:hover:bg-dark-hover text-white font-medium py-2 px-4 rounded-lg shadow-md transition-colors duration-200">
                            @lang('settings.change_password')
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection