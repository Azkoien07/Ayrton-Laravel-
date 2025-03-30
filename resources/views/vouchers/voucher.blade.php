@extends('layouts.app')
@section('content')
<div class="bg-white shadow-lg rounded-lg p-8 w-full max-w-lg">
    <!-- Encabezado -->
    <div class="text-center border-b pb-4">
        <h2 class="text-2xl font-bold text-green-600">Voucher de Compra</h2>
        <p class="text-gray-500">Orden #{{ $voucher->id }}</p>
    </div>

    <!-- Detalles del cliente -->
    <div class="mt-4">
        <p class="text-lg"><strong>Nombre:</strong> {{ $voucher->customer_name }}</p>
        <p class="text-lg"><strong>Correo:</strong> {{ $voucher->customer_email }}</p>
        <p class="text-lg"><strong>Fecha:</strong> {{ $voucher->created_at->format('d/m/Y') }}</p>
    </div>

    <!-- Detalles del plan -->
    <div class="mt-4">
        <table class="w-full border-collapse border border-gray-300">
            <thead>
                <tr class="bg-gray-200 text-gray-700">
                    <th class="border border-gray-300 px-3 py-2">Plan</th>
                    <th class="border border-gray-300 px-3 py-2">Duración</th>
                    <th class="border border-gray-300 px-3 py-2">Precio</th>
                </tr>
            </thead>
            <tbody>
                <tr class="text-center">
                    <td class="border border-gray-300 px-3 py-2">{{ $voucher->plan_name }}</td>
                    <td class="border border-gray-300 px-3 py-2">{{ $voucher->plan_duration }} meses</td>
                    <td class="border border-gray-300 px-3 py-2">${{ number_format($voucher->price, 0, ',', '.') }}</td>
                </tr>
            </tbody>
        </table>
    </div>

    <!-- Total -->
    <div class="mt-4 text-right">
        <p class="text-xl font-semibold">Total: ${{ number_format($voucher->price, 0, ',', '.') }}</p>
    </div>

    <!-- Mensaje de agradecimiento -->
    <div class="text-center text-gray-500 text-sm mt-6">
        <p>Gracias por tu compra. ¡Esperamos verte pronto!</p>
    </div>
</div>
@endsection
