@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    @include('notify::components.notify')
    <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8 gap-4">
        <div>
            <h1 class="text-3xl font-bold text-gray-800 dark:text-white">@lang('tasks.page_title')</h1>
            <p class="text-gray-600 dark:text-gray-400 mt-2">@lang('tasks.page_subtitle')</p>
        </div>
        <a href="{{ route('tasks.create') }}" class="flex items-center bg-gradient-to-r flex items-center bg-light-primary hover:bg-dark-background text-white font-semibold py-2 px-4 rounded-lg shadow-lg transition-all duration-300 ease-in-out transform hover:scale-105 font-semibold py-3 px-6 rounded-lg shadow-lg transition-all duration-300 ease-in-out transform hover:scale-105">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd" />
            </svg>
            @lang('tasks.new_task')
        </a>
    </div>
    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg overflow-hidden mb-8 transition-all duration-300">
    <form method="GET" action="{{ route('tasks.index') }}">
        <div class="p-4 sm:p-6">
            <!-- Encabezado -->
            <h2 class="text-lg font-semibold text-gray-800 dark:text-white mb-3 sm:mb-4 flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-indigo-500 flex-shrink-0" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M3 3a1 1 0 011-1h12a1 1 0 011 1v3a1 1 0 01-.293.707L12 11.414V15a1 1 0 01-.293.707l-2 2A1 1 0 018 17v-5.586L3.293 6.707A1 1 0 013 6V3z" clip-rule="evenodd" />
                </svg>
                @lang('tasks.filters_title')
            </h2>

            <!-- Campos de filtro -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 sm:gap-6">
                <!-- Campo: Nombre -->
                <div class="sm:col-span-2 lg:col-span-1">
                    <label for="" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">@lang('tasks.name')</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        <input type="text" name="name" placeholder="@lang('tasks.search_placeholder')" value="{{ request('name') }}"
                            class="pl-10 w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 dark:bg-gray-700 dark:text-white">
                    </div>
                </div>

                <!-- Campo: Estado -->
                <div>
                    <label for="" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">@lang('tasks.status')</label>
                    <select name="state" class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 dark:bg-gray-700 dark:text-white">
                        <option value="">@lang('tasks.all_statuses')</option>
                        <option value="Pendiente" {{ request('state') == 'Pendiente' ? 'selected' : '' }}>@lang('tasks.pending')</option>
                        <option value="En Progreso" {{ request('state') == 'En Progreso' ? 'selected' : '' }}>@lang('tasks.in_progress')</option>
                        <option value="Completada" {{ request('state') == 'Completada' ? 'selected' : '' }}>@lang('tasks.completed')</option>
                        <option value="Cancelada" {{ request('state') == 'Cancelada' ? 'selected' : '' }}>@lang('tasks.canceled')</option>
                    </select>
                </div>

                <!-- Campo: Prioridad -->
                <div>
                    <label for="" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">@lang('tasks.priority')</label>
                    <select name="priority" class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 dark:bg-gray-700 dark:text-white">
                        <option value="">@lang('tasks.all_priorities')</option>
                        <option value="Alta" {{ request('priority') == 'Alta' ? 'selected' : '' }}>@lang('tasks.high')</option>
                        <option value="Media" {{ request('priority') == 'Media' ? 'selected' : '' }}>@lang('tasks.medium')</option>
                        <option value="Baja" {{ request('priority') == 'Baja' ? 'selected' : '' }}>@lang('tasks.low')</option>
                    </select>
                </div>

                <!-- Campo: Asignado a -->
                <div class="sm:col-span-2 lg:col-span-1">
                    <label for="" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">@lang('tasks.assigned_to')</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v1h8v-1zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-1a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v1h-3zM4.75 12.094A5.973 5.973 0 004 15v1H1v-1a3 3 0 013.75-2.906z" />
                            </svg>
                        </div>
                        <input type="text" name="user_name" placeholder="@lang('tasks.user_placeholder')" value="{{ request('user_name') }}"
                            class="pl-10 w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 dark:bg-gray-700 dark:text-white">
                    </div>
                </div>

                <!-- Campo: Fecha creación (desde) -->
                <div>
                    <label for="" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">@lang('tasks.creation_date') (@lang('tasks.from'))</label>
                    <input type="date" name="f_creation_from" value="{{ request('f_creation_from') }}"
                        class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 dark:bg-gray-700 dark:text-white">
                </div>

                <!-- Campo: Fecha creación (hasta) -->
                <div>
                    <label for="" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">@lang('tasks.creation_date') (@lang('tasks.to'))</label>
                    <input type="date" name="f_creation_to" value="{{ request('f_creation_to') }}"
                        class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 dark:bg-gray-700 dark:text-white">
                </div>

                <!-- Botones -->
                <div class="sm:col-span-2 lg:col-span-4 flex flex-col sm:flex-row gap-3 w-full">
                    <button type="submit" class="flex-1 bg-light-primary hover:bg-dark-background text-white font-semibold py-2 px-4 rounded-lg shadow-md transition-all duration-300 ease-in-out flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M3 17a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm3.293-7.707a1 1 0 011.414 0L9 10.586V3a1 1 0 112 0v7.586l1.293-1.293a1 1 0 111.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                        @lang('tasks.apply_filters')
                    </button>
                    <a href="{{ route('tasks.index') }}" class="flex-1 bg-light-primary hover:bg-dark-background text-white font-semibold py-2 px-4 rounded-lg shadow-md transition-all duration-300 ease-in-out flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                        @lang('tasks.clear_filters')
                    </a>
                </div>
            </div>
        </div>
    </form>
</div>
    <div class="mb-6 flex justify-between items-center">
        <div class="text-sm text-gray-600 dark:text-gray-400">
            @lang('tasks.showing_results', [
            'first' => $tasks->firstItem(),
            'last' => $tasks->lastItem(),
            'total' => $tasks->total()
            ])
        </div>
        <div class="flex items-center">
            <span class="text-sm text-gray-600 dark:text-gray-400 mr-2">@lang('tasks.sort_by')</span>
            <select onchange="window.location.href = addUrlParam('sort_by', this.value)" class="text-sm border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500 dark:bg-gray-700 dark:text-white">
                <option value="f_creation" {{ request('sort_by') == 'f_creation' ? 'selected' : '' }}>@lang('tasks.creation_date_sort')</option>
                <option value="name" {{ request('sort_by') == 'name' ? 'selected' : '' }}>@lang('tasks.name_sort')</option>
                <option value="priority" {{ request('sort_by') == 'priority' ? 'selected' : '' }}>@lang('tasks.priority_sort')</option>
            </select>
        </div>
    </div>

    @if($tasks->count() > 0)
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
    @foreach ($tasks as $task)
    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-md overflow-hidden hover:shadow-xl transition-all duration-300 ease-in-out transform hover:-translate-y-1 border border-gray-100 dark:border-gray-700 flex flex-col h-full">
        <!-- Contenido principal -->
        <div class="p-6 border-b border-gray-200 dark:border-gray-700 flex-grow">
            <!-- Encabezado con nombre y prioridad -->
            <div class="flex justify-between items-start gap-4 mb-3">
                <div class="flex-1 min-w-0">
                    <h2 class="text-xl font-bold text-gray-800 dark:text-white mb-1 break-words line-clamp-2">{{ $task->name }}</h2>
                    <p class="text-gray-600 dark:text-gray-400 line-clamp-3">{{ $task->description ?? __('tasks.no_description') }}</p>
                </div>
                <span class="px-3 py-1 text-xs font-bold rounded-full flex-shrink-0 h-fit
                    @if($task->priority == 'Alta') bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-200
                    @elseif($task->priority == 'Media') bg-yellow-100 text-yellow-800 dark:bg-yellow-900 dark:text-yellow-200
                    @else bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200 @endif">
                    @if($task->priority == 'Alta')
                        @lang('tasks.priority_high')
                    @elseif($task->priority == 'Media')
                        @lang('tasks.priority_medium')
                    @else
                        @lang('tasks.priority_low')
                    @endif
                </span>
            </div>

            <!-- Etiquetas de estado -->
            <div class="flex flex-wrap gap-2 mt-4">
                <span class="px-3 py-1.5 text-xs font-semibold rounded-full bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-200 flex items-center whitespace-nowrap">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 mr-1 flex-shrink-0" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd" />
                    </svg>
                    @if($task->state == 'Pendiente')
                        @lang('tasks.status_pending')
                    @elseif($task->state == 'En Progreso')
                        @lang('tasks.status_in_progress')
                    @elseif($task->state == 'Completada')
                        @lang('tasks.status_completed')
                    @else
                        @lang('tasks.status_canceled')
                    @endif
                </span>
                
                @if($task->user)
                <span class="px-3 py-1 text-xs font-semibold rounded-full bg-purple-100 text-purple-800 dark:bg-purple-900 dark:text-purple-200 flex items-center whitespace-nowrap">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 mr-1 flex-shrink-0" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" />
                    </svg>
                    <span class="truncate max-w-[100px]">{{ $task->user->name }}</span>
                </span>
                @endif
            </div>
        </div>

        <!-- Pie de tarjeta con fechas y acciones -->
        <div class="p-4 bg-gray-50 dark:bg-gray-700 flex items-center justify-between">
            <div class="text-sm text-gray-500 dark:text-gray-400 flex items-center min-w-[180px]">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1 flex-shrink-0" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd" />
                </svg>
                <span class="whitespace-nowrap">
                    {{ \Carbon\Carbon::parse($task->f_creation)->format(__('tasks.date_format')) }} -
                    {{ \Carbon\Carbon::parse($task->f_expiration)->format(__('tasks.date_format')) }}
                </span>
            </div>
            <div class="flex items-center space-x-3">
                <a href="{{ route('tasks.edit', $task) }}" class="text-indigo-600 hover:text-indigo-800 dark:text-indigo-400 dark:hover:text-indigo-300 transition duration-200 ease-in-out" title="@lang('tasks.edit')">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                    </svg>
                </a>
                <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" onsubmit="return confirm('¿Estás seguro de eliminar la tarea \'{{ $task->name }}\'?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-red-600 hover:text-red-800 dark:text-red-400 dark:hover:text-red-300 transition duration-200 ease-in-out" title="@lang('tasks.delete')">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                        </svg>
                    </button>
                </form>
            </div>
        </div>
    </div>
    @endforeach
</div>

    <div class="mt-8">
        {{ $tasks->appends(request()->query())->links() }}
    </div>
    @else
    <div class="bg-white dark:bg-gray-800 p-8 rounded-xl shadow-md text-center border border-gray-200 dark:border-gray-700">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 mx-auto text-gray-400 dark:text-gray-500 mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
        </svg>
        <h3 class="text-lg font-medium text-gray-800 dark:text-white mb-2">@lang('tasks.no_tasks_found')</h3>
        <p class="text-gray-600 dark:text-gray-400 mb-4">@lang('tasks.no_tasks_message')</p>
        <a href="{{ route('tasks.index') }}" class="inline-flex items-center px-4 py-2 bg-light-primary hover:bg-dark-background text-white font-medium rounded-lg transition duration-300 ease-in-out">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
            </svg>
            @lang('tasks.clear_filters')
        </a>
    </div>
    @endif
</div>

<script>
    function addUrlParam(key, value) {
        const url = new URL(window.location.href);
        url.searchParams.set(key, value);
        return url.toString();
    }
</script>
@endsection