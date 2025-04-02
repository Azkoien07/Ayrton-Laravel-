@extends('layouts.admin')

@section('admin-content')
@php

    $stats = $stats ?? [
        'total' => 0,
        'pending' => 0,
        'in_progress' => 0,
        'resolved' => 0,
        'closed' => 0
    ];
@endphp

<div class="container mx-auto px-4 py-8">
    <div class="p-6">
       
        <div class="mb-10">
            <h2 class="text-3xl font-bold text-gray-800 mb-2">Gestión de PQRs</h2>
            <p class="text-gray-600">Administra las peticiones, quejas, reclamos y sugerencias</p>
        </div>

     
        <div class="grid grid-cols-1 md:grid-cols-5 gap-6 mb-8">
            
            <div class="bg-white rounded-lg shadow-md border border-gray-100 p-6">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-500">Total PQRS</p>
                        <p id="total-pqrs" class="text-2xl font-bold text-blue-600 mt-1">
                            {{ $stats['total'] }}
                        </p>
                    </div>
                    <div class="bg-blue-100 p-3 rounded-full">
                        <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                        </svg>
                    </div>
                </div>
            </div>
            

            <div class="bg-white rounded-lg shadow-md border border-gray-100 p-6">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-500">Pendientes</p>
                        <p id="pending-pqrs" class="text-2xl font-bold text-yellow-600 mt-1">
                            {{ $stats['pending'] }}
                        </p>
                    </div>
                    <div class="bg-yellow-100 p-3 rounded-full">
                        <svg class="w-6 h-6 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                </div>
            </div>
            

            <div class="bg-white rounded-lg shadow-md border border-gray-100 p-6">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-500">En Proceso</p>
                        <p id="in-progress-pqrs" class="text-2xl font-bold text-blue-600 mt-1">
                            {{ $stats['in_progress'] }}
                        </p>
                    </div>
                    <div class="bg-blue-100 p-3 rounded-full">
                        <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                        </svg>
                    </div>
                </div>
            </div>
            
     
            <div class="bg-white rounded-lg shadow-md border border-gray-100 p-6">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-500">Resueltas</p>
                        <p id="resolved-pqrs" class="text-2xl font-bold text-green-600 mt-1">
                            {{ $stats['resolved'] }}
                        </p>
                    </div>
                    <div class="bg-green-100 p-3 rounded-full">
                        <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                </div>
            </div>
            

            <div class="bg-white rounded-lg shadow-md border border-gray-100 p-6">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-500">Cerradas</p>
                        <p id="closed-pqrs" class="text-2xl font-bold text-gray-600 mt-1">
                            {{ $stats['closed'] }}
                        </p>
                    </div>
                    <div class="bg-gray-100 p-3 rounded-full">
                        <svg class="w-6 h-6 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                    </div>
                </div>
            </div>
        </div>

      
        <div class="bg-white rounded-lg shadow-lg border border-gray-100 p-6 mb-8">
            <form action="{{ route('admin.pqrs') }}" method="GET">
                <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                    <div class="md:col-span-2">
                        <label for="search" class="block text-sm font-medium text-gray-700 mb-1">Buscar</label>
                        <div class="relative">
                            <input type="text" id="search" name="search" value="{{ request('search') }}" 
                                   class="w-full pl-10 pr-3 py-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500" 
                                   placeholder="Buscar por ID, título o descripción">
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
                    <a href="{{ route('admin.pqrs') }}" class="bg-gray-100 hover:bg-gray-200 text-gray-800 font-medium py-2 px-4 rounded-lg shadow-sm transition-colors duration-200 mr-2">
                        Limpiar filtros
                    </a>
                    <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded-lg shadow-md transition-colors duration-200">
                        Aplicar filtros
                    </button>
                </div>
            </form>
        </div>

   
        @if(session('success'))
        <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6 rounded shadow-md" role="alert">
            <p>{{ session('success') }}</p>
        </div>
        @endif

       
        <div class="bg-white rounded-lg shadow-lg border border-gray-100 overflow-hidden">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tipo</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Título</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Estado</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Fecha</th>
                            <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Acciones</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @forelse ($pqrs as $pqr)
                        <tr class="hover:bg-gray-50 transition-colors duration-150" data-id="{{ $pqr->id }}">
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                #{{ $pqr->id }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                                    @if($pqr->type_pqr == 'Petición') bg-blue-100 text-blue-800
                                    @elseif($pqr->type_pqr == 'Queja') bg-purple-100 text-purple-800
                                    @elseif($pqr->type_pqr == 'Reclamo') bg-red-100 text-red-800
                                    @else bg-green-100 text-green-800 @endif">
                                    {{ $pqr->type_pqr }}
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                {{ Str::limit($pqr->title, 50) }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                <span class="status-badge px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                                    @if($pqr->status == 'Pendiente') bg-yellow-100 text-yellow-800
                                    @elseif($pqr->status == 'En Proceso') bg-blue-100 text-blue-800
                                    @elseif($pqr->status == 'Resuelto') bg-green-100 text-green-800
                                    @else bg-gray-100 text-gray-800 @endif">
                                    {{ $pqr->status }}
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                {{ $pqr->created_at->format('d/m/Y H:i') }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <div class="flex justify-end space-x-2">
                                  
                                    <select class="update-status text-xs border rounded p-1" data-id="{{ $pqr->id }}">
                                        <option value="Pendiente" {{ $pqr->status == 'Pendiente' ? 'selected' : '' }}>Pendiente</option>
                                        <option value="En Proceso" {{ $pqr->status == 'En Proceso' ? 'selected' : '' }}>En Proceso</option>
                                        <option value="Resuelto" {{ $pqr->status == 'Resuelto' ? 'selected' : '' }}>Resuelto</option>
                                        <option value="Cerrado" {{ $pqr->status == 'Cerrado' ? 'selected' : '' }}>Cerrado</option>
                                    </select>
                                    
                                   
                                    <button class="archive-btn text-gray-600 hover:text-gray-900 ml-2" data-id="{{ $pqr->id }}" title="Archivar">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4" />
                                        </svg>
                                    </button>
                                    
                                  
                                    <button class="delete-btn text-red-600 hover:text-red-900 ml-2" data-id="{{ $pqr->id }}" title="Eliminar">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="px-6 py-4 text-center text-sm text-gray-500">
                                No se encontraron PQRs con los filtros seleccionados
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
       
            <div class="bg-white px-4 py-3 border-t border-gray-200 sm:px-6">
                {{ $pqrs->appends(request()->query())->links() }}
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
$(document).ready(function() {
 
    $('.update-status').change(function() {
        const pqrId = $(this).data('id');
        const newStatus = $(this).val();
        
        $.ajax({
            url: "{{ route('admin.pqrs.update-status') }}",
            method: 'POST',
            data: {
                _token: "{{ csrf_token() }}",
                id: pqrId,
                status: newStatus
            },
            success: function(response) {
                if(response.success) {
                    toastr.success(response.message);
                    updateStats(response.stats);
              
                    const badge = $(`tr[data-id="${pqrId}"] .status-badge`);
                    badge.removeClass('bg-yellow-100 bg-blue-100 bg-green-100 bg-gray-100 text-yellow-800 text-blue-800 text-green-800 text-gray-800');
                    badge.addClass(getStatusClasses(newStatus));
                    badge.text(newStatus);
                }
            },
            error: function(xhr) {
                toastr.error('Error al actualizar el estado');
                // Revertir el cambio en el select
                const currentStatus = $(`tr[data-id="${pqrId}"] .status-badge`).text();
                $(this).val(currentStatus);
            }
        });
    });
    
   
    $('.archive-btn').click(function() {
        const pqrId = $(this).data('id');
        
        if(confirm('¿Estás seguro de archivar este PQR?')) {
            $.ajax({
                url: "{{ route('admin.pqrs.archive') }}",
                method: 'POST',
                data: {
                    _token: "{{ csrf_token() }}",
                    id: pqrId
                },
                success: function(response) {
                    if(response.success) {
                        toastr.success(response.message);
                        updateStats(response.stats);
                        // Actualizar la fila
                        $(`tr[data-id="${pqrId}"] .status-badge`)
                            .removeClass('bg-yellow-100 bg-blue-100 bg-green-100 text-yellow-800 text-blue-800 text-green-800')
                            .addClass('bg-gray-100 text-gray-800')
                            .text('Cerrado');
                        // Actualizar el select de estado
                        $(`tr[data-id="${pqrId}"] .update-status`).val('Cerrado');
                    }
                },
                error: function() {
                    toastr.error('Error al archivar el PQR');
                }
            });
        }
    });
    

    $('.delete-btn').click(function(e) {
        e.preventDefault();
        const pqrId = $(this).data('id');
        
        if(confirm('¿Estás seguro de eliminar este PQR permanentemente?')) {
            $.ajax({
                url: "{{ route('admin.pqrs.delete') }}",
                method: 'DELETE',
                data: {
                    _token: "{{ csrf_token() }}",
                    id: pqrId
                },
                success: function(response) {
                    if(response.success) {
                        toastr.success(response.message);
                        updateStats(response.stats);
                        // Eliminar la fila de la tabla
                        $(`tr[data-id="${pqrId}"]`).fadeOut(300, function() {
                            $(this).remove();
                        });
                    }
                },
                error: function(xhr) {
                    toastr.error(xhr.responseJSON.message || 'Error al eliminar el PQR');
                }
            });
        }
    });
    
    function updateStats(stats) {
        $('#total-pqrs').text(stats.total);
        $('#pending-pqrs').text(stats.pending);
        $('#in-progress-pqrs').text(stats.in_progress);
        $('#resolved-pqrs').text(stats.resolved);
        $('#closed-pqrs').text(stats.closed);
    }
    

    function getStatusClasses(status) {
        const classes = {
            'Pendiente': 'bg-yellow-100 text-yellow-800',
            'En Proceso': 'bg-blue-100 text-blue-800',
            'Resuelto': 'bg-green-100 text-green-800',
            'Cerrado': 'bg-gray-100 text-gray-800'
        };
        return classes[status] || '';
    }
});
</script>
@endsection