@extends('layouts.app')

@section('content')
<div class="py-12 px-4 sm:px-6 lg:px-8">
    <!-- Encabezado -->
    <div class="text-center mb-8 -mt-4">
        <h1 class="text-4xl font-extrabold text-gray-900 sm:text-5xl">Planes de Suscripción</h1>
        <p class="mt-4 text-xl text-gray-600">Elige el plan que mejor se adapte a tus necesidades</p>
    </div>
    <!-- Contenedor de Planes -->
    <div class="grid gap-8 md:grid-cols-3 max-w-7xl mx-auto">
        <!-- Plan Básico -->
        <div class="flex flex-col rounded-xl shadow-lg overflow-hidden border border-gray-200">
            <div class="px-6 py-8 bg-white">
                <h3 class="text-2xl font-bold text-center text-gray-900">Básico</h3>
                <p class="mt-2 text-center text-gray-500">Ideal para usuarios ocasionales</p>

                <div class="mt-6 flex items-center justify-center">
                    <span class="text-5xl font-extrabold text-gray-900">$0</span>
                    <span class="ml-2 text-lg font-medium text-gray-500">/mes</span>
                </div>

                <ul class="mt-8 space-y-4">
                    <li class="flex items-start">
                        <svg class="h-6 w-6 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        <span class="ml-3 text-base text-gray-700">5 tareas activas</span>
                    </li>
                    <li class="flex items-start">
                        <svg class="h-6 w-6 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        <span class="ml-3 text-base text-gray-700">Soporte básico</span>
                    </li>
                    <li class="flex items-start">
                        <svg class="h-6 w-6 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        <span class="ml-3 text-base text-gray-700">Plantillas básicas</span>
                    </li>
                    <li class="flex items-start text-gray-400">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                        <span class="ml-3 text-base">Colaboración en equipo</span>
                    </li>
                    <li class="flex items-start text-gray-400">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                        <span class="ml-3 text-base">Integraciones avanzadas</span>
                    </li>
                </ul>
            </div>
            <div class="px-6 py-4 bg-gray-50 border-t border-gray-200">
                <button class="w-full flex justify-center py-3 px-4 border border-transparent rounded-md shadow-sm text-base font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                    Seleccionar Plan
                </button>
            </div>
        </div>

        <!-- Plan Premium (Destacado) -->
        <div class="flex flex-col rounded-xl shadow-xl overflow-hidden transform scale-105 z-10 border-2 border-blue-500">
            <div class="px-6 py-8 bg-white">
                <div class="absolute -top-2 -right-2 z-10">
                    <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-semibold bg-blue-500 text-white shadow-lg">
                        Popular
                    </span>
                </div>
                <h3 class="text-2xl font-bold text-center text-gray-900">Premium</h3>
                <p class="mt-2 text-center text-gray-500">Para usuarios que necesitan más</p>

                <div class="mt-6 flex items-center justify-center">
                    <span class="text-5xl font-extrabold text-gray-900">$34.000</span>
                    <span class="ml-2 text-lg font-medium text-gray-500">/mes</span>
                </div>

                <ul class="mt-8 space-y-4">
                    <li class="flex items-start">
                        <svg class="h-6 w-6 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        <span class="ml-3 text-base text-gray-700">Tareas ilimitadas</span>
                    </li>
                    <li class="flex items-start">
                        <svg class="h-6 w-6 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        <span class="ml-3 text-base text-gray-700">Soporte prioritario</span>
                    </li>
                    <li class="flex items-start">
                        <svg class="h-6 w-6 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        <span class="ml-3 text-base text-gray-700">Plantillas premium</span>
                    </li>
                    <li class="flex items-start">
                        <svg class="h-6 w-6 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        <span class="ml-3 text-base text-gray-700">Colaboración en equipo</span>
                    </li>
                    <li class="flex items-start text-gray-400">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                        <span class="ml-3 text-base">Integraciones avanzadas</span>
                    </li>
                </ul>
            </div>
            <div class="px-6 py-4 bg-gray-50 border-t border-gray-200">
                <button class="w-full flex justify-center py-3 px-4 border border-transparent rounded-md shadow-sm text-base font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                    Seleccionar Plan
                </button>
            </div>
        </div>

        <!-- Plan Platino -->
        <div class="flex flex-col rounded-xl shadow-lg overflow-hidden border border-gray-200">
            <div class="px-6 py-8 bg-white">
                <h3 class="text-2xl font-bold text-center text-gray-900">Platino</h3>
                <p class="mt-2 text-center text-gray-500">Para equipos y profesionales</p>

                <div class="mt-6 flex items-center justify-center">
                    <span class="text-5xl font-extrabold text-gray-900">$50.000</span>
                    <span class="ml-2 text-lg font-medium text-gray-500">/mes</span>
                </div>

                <ul class="mt-8 space-y-4">
                    <li class="flex items-start">
                        <svg class="h-6 w-6 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        <span class="ml-3 text-base text-gray-700">Tareas ilimitadas</span>
                    </li>
                    <li class="flex items-start">
                        <svg class="h-6 w-6 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        <span class="ml-3 text-base text-gray-700">Soporte 24/7</span>
                    </li>
                    <li class="flex items-start">
                        <svg class="h-6 w-6 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        <span class="ml-3 text-base text-gray-700">Todas las plantillas</span>
                    </li>
                    <li class="flex items-start">
                        <svg class="h-6 w-6 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        <span class="ml-3 text-base text-gray-700">Colaboración en equipo</span>
                    </li>
                    <li class="flex items-start">
                        <svg class="h-6 w-6 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        <span class="ml-3 text-base text-gray-700">Integraciones avanzadas</span>
                    </li>
                </ul>
            </div>
            <div class="px-6 py-4 bg-gray-50 border-t border-gray-200">
                <button class="w-full flex justify-center py-3 px-4 border border-transparent rounded-md shadow-sm text-base font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                    Seleccionar Plan
                </button>
            </div>
        </div>
    </div>
</div>
@endsection