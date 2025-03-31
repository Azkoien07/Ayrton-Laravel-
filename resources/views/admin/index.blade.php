@extends('layouts.admin')

@section('admin-content')
<div class="container mx-auto p-6">
    <h2 class="text-2xl font-bold mb-4">Dashboard de Administrador</h2>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
        <!-- Tarjeta de Usuarios -->
        <div class="bg-white shadow-md rounded-lg p-4 text-center">
            <h3 class="text-lg font-semibold mb-2">Usuarios Registrados</h3>
            <p class="text-gray-700 text-xl">{{ $users->count() }}</p>
        </div>

        <!-- Tarjeta de PQRS (Placeholder para futuras tarjetas) -->

        <!-- Botón de Cierre de Sesión -->
        <div class="bg-white shadow-md rounded-lg p-4 flex items-center justify-center">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded w-full sm:w-auto">Cerrar Sesión</button>
            </form>
        </div>
    </div>

    <!-- Tabla de Usuarios -->
    <div class="mt-6 overflow-x-auto">
        <h3 class="text-xl font-bold mb-3">Lista de Usuarios</h3>
        <table class="w-full border-collapse bg-white shadow-md min-w-max">
            <thead>
                <tr class="bg-gray-200">
                    <th class="p-2 border">ID</th>
                    <th class="p-2 border">Nombre</th>
                    <th class="p-2 border">Email</th>
                    <th class="p-2 border">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $u)
                <tr class="text-center border-b">
                    <td class="p-2 border">{{ $u->id }}</td>
                    <td class="p-2 border">{{ $u->name }}</td>
                    <td class="p-2 border">{{ $u->email }}</td>
                    <td class="p-2 border flex flex-col sm:flex-row justify-center gap-2 p-2">
                        <button class="bg-blue-500 text-white px-3 py-1 rounded">Editar</button>
                        <button class="bg-red-500 text-white px-3 py-1 rounded">Eliminar</button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection