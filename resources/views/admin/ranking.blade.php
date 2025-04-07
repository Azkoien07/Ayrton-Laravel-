@extends('layouts.admin')

@section('admin-content')
<div class="container mx-auto px-6 py-10 bg-light-background dark:bg-dark-background min-h-screen">
    <h1 class="text-4xl font-bold text-center mb-10 text-light-text dark:text-dark-text">🏆 Ranking de Usuarios</h1>

    <div class="overflow-x-auto bg-light-card dark:bg-dark-card shadow-xl rounded-xl">
        <table class="min-w-full text-sm text-left">
            <thead class="bg-light-primary dark:bg-dark-hover text-white">
                <tr>
                    <th class="py-4 px-6">#</th>
                    <th class="py-4 px-6">Nombre</th>
                    <th class="py-4 px-6">Correo</th>
                    <th class="py-4 px-6">Puntos</th>
                </tr>
            </thead>
            <tbody>
                @forelse($users as $index => $user)
                    <tr class="border-b border-light-border dark:border-dark-border hover:bg-light-secondary dark:hover:bg-dark-hover transition duration-150">
                        <td class="py-4 px-6 text-light-text dark:text-dark-text font-semibold">{{ $index + 1 }}</td>
                        <td class="py-4 px-6 text-light-text dark:text-dark-text font-medium">{{ $user->name }}</td>
                        <td class="py-4 px-6 text-light-textSecondary dark:text-dark-textSecondary">{{ $user->email }}</td>
                        <td class="py-4 px-6 text-success font-bold">{{ rand(50, 500) }} pts</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="py-6 px-6 text-center text-warning dark:text-warning">No hay usuarios registrados aún.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
