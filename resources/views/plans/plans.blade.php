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
                <button
                    onclick="openModal('Básico')"
                    class="w-full flex justify-center py-3 px-4 border border-transparent rounded-md shadow-sm text-base font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
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
                <button
                    onclick="openModal('Premium')"
                    class="w-full flex justify-center py-3 px-4 border border-transparent rounded-md shadow-sm text-base font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
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
                <button
                    onclick="openModal('Platino')"
                    class="w-full flex justify-center py-3 px-4 border border-transparent rounded-md shadow-sm text-base font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                    Seleccionar Plan
                </button>
            </div>
        </div>
    </div>

    <!-- Modal de Suscripción -->
    <div id="subscriptionModal" class="fixed inset-0 z-50 overflow-y-auto hidden">
        <div class="flex items-center justify-center min-h-screen px-4">
            <!-- Fondo oscuro -->
            <div class="fixed inset-0 bg-gray-500 bg-opacity-75" onclick="closeModal()"></div>

            <!-- Contenido del modal -->
            <div class="bg-white rounded-lg overflow-hidden shadow-xl transform transition-all max-w-lg w-full z-10">
                <!-- Encabezado del modal -->
                <div class="flex items-center justify-between px-6 py-4 bg-gray-100 border-b border-gray-200">
                    <h3 class="text-lg font-medium text-gray-900">Confirmar Suscripción</h3>
                    <button onclick="closeModal()" class="text-gray-400 hover:text-gray-500 focus:outline-none">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>

                <!-- Cuerpo del modal -->
                <div class="px-6 py-4">
                    <p class="text-gray-700 text-base mb-4">Estás a punto de suscribirte al plan <span id="selectedPlanName" class="font-bold"></span>.</p>

                    <!-- Información de facturación -->
                    <div class="bg-gray-50 p-4 rounded-lg mb-4">
                        <h4 class="font-medium text-gray-900 mb-2">Resumen de Facturación</h4>
                        <div class="flex justify-between mb-2">
                            <span class="text-gray-600">Plan seleccionado:</span>
                            <span id="modalPlanName" class="font-medium"></span>
                        </div>
                        <div class="flex justify-between mb-2">
                            <span class="text-gray-600">Precio mensual:</span>
                            <span id="modalPlanPrice" class="font-medium"></span>
                        </div>
                        <div class="flex justify-between border-t border-gray-200 pt-2 mt-2">
                            <span class="text-gray-800 font-medium">Total a pagar:</span>
                            <span id="modalTotalPrice" class="font-bold text-blue-600"></span>
                        </div>
                    </div>

                    <!-- Mensaje de confirmación -->
                    <p class="text-gray-700 text-base">¿Deseas continuar con la suscripción?</p>
                </div>

                <!-- Opciones del modal -->
                <div class="px-6 py-4 bg-gray-50 flex justify-end space-x-2 border-t border-gray-200">
                    <button
                        onclick="closeModal()"
                        class="px-4 py-2 bg-gray-300 text-gray-700 rounded-md hover:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-gray-400">
                        Cancelar
                    </button>
                    <button
                        class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                        Confirmar
                    </button>
                </div>
            </div>
        </div>
    </div>

    <script>
        const planPrices = {
            'Básico': '0',
            'Premium': '34.000',
            'Platino': '50.000'
        };

        function openModal(planName) {
            // Actualizar contenido del modal
            document.getElementById('selectedPlanName').textContent = planName;
            document.getElementById('modalPlanName').textContent = planName;
            document.getElementById('modalPlanPrice').textContent = '$' + planPrices[planName] + '/mes';
            document.getElementById('modalTotalPrice').textContent = '$' + planPrices[planName];

            // Mostrar el modal
            document.getElementById('subscriptionModal').classList.remove('hidden');
            document.body.style.overflow = 'hidden';
        }

        function closeModal() {
            document.getElementById('subscriptionModal').classList.add('hidden');
            document.body.style.overflow = 'auto';
        }
    </script>
    @endsection