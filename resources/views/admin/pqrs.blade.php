@extends('layouts.admin')
@php
    use App\Models\Pqr;
@endphp
@section('admin-content')
<div class="container mx-auto px-4 py-8">
    <div class="p-6">
        <div class="mb-10">
            <h2 class="text-3xl font-bold text-gray-800 mb-2">Pqrs - Peticiones, Quejas, Reclamos y Sugerencias</h2>
            <p class="text-gray-600">Gestiona todas las solicitudes de los usuarios en un solo lugar</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
            @foreach ([
                ['label' => 'Total PQRS', 'color' => 'blue', 'key' => 'total', 'icon' => 'M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2'],
                ['label' => 'Pendientes', 'color' => 'yellow', 'key' => 'pending', 'icon' => 'M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z'],
                ['label' => 'En Proceso', 'color' => 'blue', 'key' => 'in_progress', 'icon' => 'M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15'],
                ['label' => 'Resueltas', 'color' => 'green', 'key' => 'resolved', 'icon' => 'M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z']
            ] as $stat)
            <div class="bg-white rounded-lg shadow-md border border-gray-100 p-6">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-500">{{ $stat['label'] }}</p>
                        <p class="text-2xl font-bold text-{{ $stat['color'] }}-600 mt-1">
                            {{ isset($stats) ? $stats[$stat['key']] : Pqr::where('status', ucfirst($stat['key']))->count() }}
                        </p>
                    </div>
                    <div class="bg-{{ $stat['color'] }}-100 p-3 rounded-full">
                        <svg class="w-6 h-6 text-{{ $stat['color'] }}-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $stat['icon'] }}" />
                        </svg>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="bg-white rounded-lg shadow-lg border border-gray-100 p-6 mb-8">
            <form action="{{ route('admin.pqrs') }}" method="GET">
                <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                    <div class="md:col-span-2">
                        <label for="search" class="block text-sm font-medium text-gray-700 mb-1">Buscar PQRS</label>
                        <div class="relative">
                            <input type="text" id="search" name="search" value="{{ request('search') }}" class="w-full pl-10 pr-3 py-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500" placeholder="Buscar por ID o descripción">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                </svg>
                            </div>
                        </div>
                    </div>
                    <div>
                        <label for="type_pqr" class="block text-sm font-medium text-gray-700 mb-1">Tipo</label>
                        <select id="type_pqr" name="type_pqr" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500">
                            <option value="">Todos</option>
                            @foreach (['Petición', 'Queja', 'Reclamo', 'Sugerencia'] as $type)
                                <option value="{{ $type }}" {{ request('type_pqr') == $type ? 'selected' : '' }}>{{ $type }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label for="status" class="block text-sm font-medium text-gray-700 mb-1">Estado</label>
                        <select id="status" name="status" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500">
                            <option value="">Todos</option>
                            @foreach (['Pendiente', 'En Proceso', 'Resuelto', 'Cerrado'] as $status)
                                <option value="{{ $status }}" {{ request('status') == $status ? 'selected' : '' }}>{{ $status }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="mt-4 flex justify-end">
                    <a href="{{ route('admin.pqrs') }}" class="bg-gray-100 hover:bg-gray-200 text-gray-800 font-medium py-2 px-4 rounded-lg shadow-sm transition-colors duration-200 mr-2">Limpiar filtros</a>
                    <button type="submit" class="bg-primary-900 hover:bg-primary-600 text-white font-medium py-2 px-4 rounded-lg shadow-md transition-colors duration-200">Aplicar filtros</button>
                </div>
            </form>
        </div>
        @if(session('success'))
        <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-8 rounded shadow-md" role="alert">
            <p>{{ session('success') }}</p>
        </div>
        @endif
    </div>
</div>
@endsection