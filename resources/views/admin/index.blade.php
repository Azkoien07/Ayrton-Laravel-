@extends('layouts.admin')

@section('admin-content')
<div class="container mx-auto px-4 py-8">
    @include('notify::components.notify')


    <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-4">
        <div>
            <h1 class="text-3xl font-bold text-gray-800">Panel de Administración</h1>
            <p class="text-gray-600 mt-2">Gestiona los usuarios de tu aplicación</p>
        </div>
        <div class="mt-4 md:mt-0 flex items-center space-x-2">
            <span class="text-sm text-gray-500">Total usuarios:</span>
            <span class="px-3 py-1 bg-blue-100 text-blue-800 rounded-full text-sm font-medium">{{ $users->total() }}</span>
        </div>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4 mb-8">
        <div class="bg-white border border-gray-200 rounded-xl shadow p-6">
            <p class="text-sm text-gray-500 mb-1">Usuarios Totales</p>
            <h2 class="text-2xl font-bold text-gray-800">{{ $users->count() }}</h2>
        </div>
        <div class="bg-white border border-gray-200 rounded-xl shadow p-6">
            <p class="text-sm text-gray-500 mb-1">Administradores</p>
            <h2 class="text-2xl font-bold text-gray-800">
                {{ $users->where('role.access_level', 'Admin')->count() }}
            </h2>
        </div>
        <div class="bg-white border border-gray-200 rounded-xl shadow p-6">
            <p class="text-sm text-gray-500 mb-1">Usuarios Regulares</p>
            <h2 class="text-2xl font-bold text-gray-800">
                {{ $users->where('role.access_level', '!=', 'Admin')->count() }}
            </h2>
        </div>
    </div>


    <div class="bg-white rounded-xl shadow-sm overflow-hidden border border-gray-100">
        <div class="px-6 py-4 border-b border-gray-100 flex justify-between items-center">
            <h3 class="text-lg font-semibold text-gray-800">Lista de Usuarios</h3>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-gray-50">
                    <tr class="text-left text-gray-600 text-sm font-medium">
                        <th class="px-6 py-3">ID</th>
                        <th class="px-6 py-3">Nombre</th>
                        <th class="px-6 py-3">Email</th>
                        <th class="px-6 py-3">Rol</th>
                        <th class="px-6 py-3 text-right">Acciones</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @foreach($users as $user)
                    <tr class="hover:bg-gray-50 transition-colors duration-150">
                        <td class="px-6 py-4 font-medium">{{ $user->id }}</td>
                        <td class="px-6 py-4">{{ $user->name }}</td>
                        <td class="px-6 py-4">{{ $user->email }}</td>
                        <td class="px-6 py-4">
                            <span class="px-3 py-1 rounded-full text-xs font-medium {{ $user->role->access_level == 'Admin' ? 'bg-purple-100 text-purple-800' : 'bg-blue-100 text-blue-800' }}">
                                {{ $user->role->access_level == 'Admin' ? 'Administrador' : 'Usuario' }}
                            </span>
                        </td>
                        <td class="px-6 py-4 text-right space-x-2">
                            <a href="{{ route('admin.edit', $user->id) }}" class="text-blue-600 hover:text-blue-800 transition inline-flex items-center" title="Editar">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536M9 13l6-6m2 2L9 17H7v-2l8-8z" />
                                </svg>
                            </a>
                            <form action="{{ route('admin.destroy', $user->id) }}" method="POST" class="inline-block" onsubmit="return confirm('¿Estás seguro que deseas eliminar este usuario?');">
                                @csrf
                                @method('DELETE')
                                <button class="delete-btn text-red-600 hover:text-red-900 ml-2" title="Eliminar">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="px-6 py-4 border-t border-gray-100 flex justify-between items-center">
            <div class="text-sm text-gray-500">
                Mostrando <span class="font-medium">{{ $users->firstItem() }}</span> a <span class="font-medium">{{ $users->lastItem() }}</span> de <span class="font-medium">{{ $users->total() }}</span> resultados
            </div>
            <div class="flex space-x-2">
                {{ $users->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
