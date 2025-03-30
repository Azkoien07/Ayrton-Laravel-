@extends('layouts.admin')
@section('admin-content')
<div class="container">
    <h1 class="text-center my-4">Ranking de Usuarios</h1>
    <div class="card">
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nombre</th>
                        <th>Puntos</th>
                        <th>Posición</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($ranking as $key => $user)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $user->user->name }}</td>
                            <td>{{ $user->points }}</td>
                            <td>{{ $user->position }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection