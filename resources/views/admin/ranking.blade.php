@extends('layouts.admin')
@section('admin-content')
<div class="container mx-auto p-6">
    <h1 class="text-3xl font-bold text-center mb-6 text-gray-800">🏆 Ranking de Usuarios</h1>
    
    <div class="bg-white shadow-lg rounded-lg overflow-hidden">
        <table class="min-w-full leading-normal">
            <thead>
                <tr class="bg-gradient-to-r from-indigo-500 to-purple-600 text-white text-left">
                    <th class="p-4">#</th>
                    <th class="p-4">Nombre</th>
                    <th class="p-4">Puntos</th>
                    <th class="p-4">Posición</th>
                </tr>
            </thead>
            <tbody>
                @foreach($ranking as $key => $user)
                    <tr class="border-b border-gray-200 hover:bg-gray-100 transition duration-200">
                        <td class="p-4 font-semibold text-gray-700">{{ $key + 1 }}</td>
                        <td class="p-4 font-medium text-gray-800 flex items-center gap-2">
                            <span class="text-lg">👤</span> {{ $user->user->name }}
                        </td>
                        <td class="p-4 font-semibold text-indigo-500">{{ $user->points }} pts</td>
                        <td class="p-4 font-semibold text-gray-600">{{ $user->position }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection