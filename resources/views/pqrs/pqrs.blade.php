@extends('layouts.app')
@section('content')
<div class="container mx-auto px-4 py-6 dark:bg-dark-background">
    @include('notify::components.notify')
    <div class="max-w-3xl mx-auto p-4">
        <div class="mb-8 text-center">
            <h2 class="text-3xl font-bold text-gray-800 mb-2 dark:text-dark-text">@lang('pqrs.title')</h2>
            <p class="text-gray-600 dark:text-dark-text-secondary">@lang('pqrs.subtitle')</p>
        </div>

        <div class="bg-white dark:bg-dark-card rounded-lg shadow-lg border border-gray-100 dark:border-dark-border overflow-hidden">
            <div class="p-6">
                @if($errors->any())
                <div class="mb-4 p-3 bg-red-50 dark:bg-red-900/20 text-red-700 dark:text-red-300 rounded-lg border border-red-200 dark:border-red-800 text-sm">
                    <div class="flex items-center">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <span>@lang('pqrs.validation.errors_title')</span>
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
                        <span>@lang('pqrs.messages.success')</span>
                    </div>
                </div>
                @endif

                <form action="{{ route('pqrs.store') }}" method="POST">
                    @csrf

                    <!-- PQRS Type -->
                    <div class="mb-6">
                        <label class="block text-sm font-medium text-gray-700 dark:text-dark-text mb-2">@lang('pqrs.form.type_label')</label>
                        <div class="grid grid-cols-2 md:grid-cols-4 gap-3">
                            @foreach(__('pqrs.form.types') as $value => $label)
                            <label class="flex items-center">
                                <input type="radio" name="type_pqr" value="{{ $label }}" class="h-4 w-4 text-primary-600 focus:ring-primary-500 dark:focus:ring-primary-400"
                                    {{ old('type_pqr') == $label ? 'checked' : '' }}>
                                <span class="ml-2 text-sm text-gray-700 dark:text-dark-text">{{ $label }}</span>
                            </label>
                            @endforeach
                        </div>
                        @error('type_pqr')
                        <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Title -->
                    <div class="mb-6">
                        <label for="title" class="block text-sm font-medium text-gray-700 dark:text-dark-text mb-1">@lang('pqrs.form.title_label')</label>
                        <input type="text" id="title" name="title" value="{{ old('title') }}"
                            class="w-full px-3 py-2 border border-gray-300 dark:border-dark-border rounded-md focus:ring-primary-500 focus:border-primary-500 dark:bg-dark-background dark:text-dark-text"
                            required
                            minlength="10"
                            maxlength="255"
                            placeholder="@lang('pqrs.form.title_placeholder')">
                        @error('title')
                        <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Description -->
                    <div class="mb-6">
                        <label for="description" class="block text-sm font-medium text-gray-700 dark:text-dark-text mb-1">@lang('pqrs.form.description_label')</label>
                        <textarea id="description" name="description" rows="5"
                            class="w-full px-3 py-2 border border-gray-300 dark:border-dark-border rounded-md focus:ring-primary-500 focus:border-primary-500 dark:bg-dark-background dark:text-dark-text"
                            required
                            minlength="20"
                            maxlength="1000"
                            placeholder="@lang('pqrs.form.description_placeholder')">{{ old('description') }}</textarea>
                        @error('description')
                        <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Argument -->
                    <div class="mb-6">
                        <label for="argument" class="block text-sm font-medium text-gray-700 dark:text-dark-text mb-1">@lang('pqrs.form.argument_label')</label>
                        <textarea id="argument" name="argument" rows="3"
                            class="w-full px-3 py-2 border border-gray-300 dark:border-dark-border rounded-md focus:ring-primary-500 focus:border-primary-500 dark:bg-dark-background dark:text-dark-text"
                            placeholder="@lang('pqrs.form.argument_placeholder')">{{ old('argument') }}</textarea>
                        @error('argument')
                        <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Submit Button -->
                    <div class="flex justify-end">
                        <button type="submit"
                            class="bg-light-primary hover:bg-dark-background text-white font-medium py-2 px-6 rounded-lg shadow-md transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500 dark:focus:ring-offset-dark-card">
                            @lang('pqrs.form.submit_button')
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Additional Information -->
        <div class="mt-6 text-center text-sm text-gray-500 dark:text-dark-text-secondary">
            <p>@lang('pqrs.messages.response_time')</p>
            <p class="mt-1">@lang('pqrs.messages.urgent_contact')</p>
        </div>
    </div>
</div>
@endsection