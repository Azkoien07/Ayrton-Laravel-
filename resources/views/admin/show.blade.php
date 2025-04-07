@extends('layouts.admin') {{-- Cambia si usas otro layout --}}

@section('content')
    <div class="container">
        <h1>Detalle de PQR #{{ $pqr->id }}</h1>

        <p><strong>Título:</strong> {{ $pqr->title }}</p>
        <p><strong>Tipo:</strong> {{ $pqr->type_pqr }}</p>
        <p><strong>Estado:</strong> {{ $pqr->status }}</p>
        <p><strong>Descripción:</strong> {{ $pqr->description }}</p>
        <p><strong>Argumento:</strong> {{ $pqr->argument }}</p>

        <a href="{{ route('admin.pqrs') }}">← Volver al listado</a>
    </div>
@endsection