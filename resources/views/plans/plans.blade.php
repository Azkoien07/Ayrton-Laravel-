@extends('layouts.app')

@section('content')
<div class="py-12 px-4 sm:px-6 lg:px-8 dark:bg-dark-background bg-light-background">
    <!-- Encabezado mejorado con animación -->
    <div class="text-center mb-12 animate-fade-in">
        <h1 class="text-4xl font-extrabold text-light-text dark:text-dark-text sm:text-5xl">
            <span class="block">Planes de Suscripción</span>
        </h1>
        <p class="mt-4 text-xl text-light-textSecondary dark:text-dark-textSecondary max-w-2xl mx-auto">
            Elige el plan que mejor se adapte a tus necesidades y lleva tu productividad al siguiente nivel
        </p>
    </div>

    <!-- Contenedor de Planes mejorado -->
    <div class="grid gap-8 md:grid-cols-3 max-w-7xl mx-auto">
        <!-- Plan Básico -->
        <div class="flex flex-col rounded-xl shadow-lg overflow-hidden border border-light-border dark:border-dark-border transition-all duration-300 hover:shadow-xl hover:-translate-y-2 bg-light-card dark:bg-dark-card">
            <div class="px-6 py-8">
                <h3 class="text-2xl font-bold text-center text-light-text dark:text-dark-text">Básico</h3>
                <p class="mt-2 text-center text-light-textSecondary dark:text-dark-textSecondary">Ideal para usuarios ocasionales</p>

                <div class="mt-6 flex items-center justify-center">
                    <span class="text-5xl font-extrabold text-light-text dark:text-dark-text">$0</span>
                    <span class="ml-2 text-lg font-medium text-light-textSecondary dark:text-dark-textSecondary">/mes</span>
                </div>

                <ul class="mt-8 space-y-4">
                    <li class="flex items-start">
                        <svg class="h-6 w-6 text-light-success flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        <span class="ml-3 text-base text-light-text dark:text-dark-text">5 tareas activas</span>
                    </li>
                    <li class="flex items-start">
                        <svg class="h-6 w-6 text-light-success flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        <span class="ml-3 text-base text-light-text dark:text-dark-text">Soporte básico</span>
                    </li>
                    <li class="flex items-start">
                        <svg class="h-6 w-6 text-light-success flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        <span class="ml-3 text-base text-light-text dark:text-dark-text">Plantillas básicas</span>
                    </li>
                    <li class="flex items-start text-light-textSecondary dark:text-dark-textSecondary">
                        <svg class="h-6 w-6 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                        <span class="ml-3 text-base">Colaboración en equipo</span>
                    </li>
                    <li class="flex items-start text-light-textSecondary dark:text-dark-textSecondary">
                        <svg class="h-6 w-6 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                        <span class="ml-3 text-base">Integraciones avanzadas</span>
                    </li>
                </ul>
            </div>
            <div class="px-6 py-4 bg-light-secondary dark:bg-dark-secondary border-t border-light-border dark:border-dark-border">
                <button
                    onclick="openModal('Básico')"
                    class="w-full flex justify-center py-3 px-4 border border-transparent rounded-md shadow-sm text-base font-medium text-white bg-light-primary hover:bg-light-hover focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-light-primary transition-colors duration-300 dark:bg-dark-primary dark:hover:bg-dark-hover dark:focus:ring-dark-primary">
                    Seleccionar Plan
                </button>
            </div>
        </div>

        <!-- Plan Premium (Destacado) -->
        <div class="flex flex-col rounded-xl shadow-2xl overflow-hidden transform scale-105 z-10 border-2 border-light-primary dark:border-dark-primary">
            <div class="relative">
                <div class="absolute top-0 right-0 -mt-3 -mr-3 z-10">
                    <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-semibold bg-light-primary text-white shadow-lg animate-pulse dark:bg-dark-primary">
                        Popular
                    </span>
                </div>
                <div class="px-6 py-8 bg-light-card dark:bg-dark-card">
                    <h3 class="text-2xl font-bold text-center text-light-text dark:text-dark-text">Premium</h3>
                    <p class="mt-2 text-center text-light-textSecondary dark:text-dark-textSecondary">Para usuarios que necesitan más</p>

                    <div class="mt-6 flex items-center justify-center">
                        <span class="text-5xl font-extrabold text-light-text dark:text-dark-text">$34.000</span>
                        <span class="ml-2 text-lg font-medium text-light-textSecondary dark:text-dark-textSecondary">/mes</span>
                    </div>

                    <ul class="mt-8 space-y-4">
                        <li class="flex items-start">
                            <svg class="h-6 w-6 text-light-success flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                            <span class="ml-3 text-base text-light-text dark:text-dark-text">Tareas ilimitadas</span>
                        </li>
                        <li class="flex items-start">
                            <svg class="h-6 w-6 text-light-success flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                            <span class="ml-3 text-base text-light-text dark:text-dark-text">Soporte prioritario</span>
                        </li>
                        <li class="flex items-start">
                            <svg class="h-6 w-6 text-light-success flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                            <span class="ml-3 text-base text-light-text dark:text-dark-text">Plantillas premium</span>
                        </li>
                        <li class="flex items-start">
                            <svg class="h-6 w-6 text-light-success flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                            <span class="ml-3 text-base text-light-text dark:text-dark-text">Colaboración en equipo</span>
                        </li>
                        <li class="flex items-start text-light-textSecondary dark:text-dark-textSecondary">
                            <svg class="h-6 w-6 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                            <span class="ml-3 text-base">Integraciones avanzadas</span>
                        </li>
                    </ul>
                </div>
                <div class="px-6 py-4 bg-light-secondary dark:bg-dark-secondary border-t border-light-border dark:border-dark-border">
                    <button
                        onclick="openModal('Básico')"
                        class="w-full flex justify-center py-3 px-4 border border-transparent rounded-md shadow-sm text-base font-medium text-white bg-light-primary hover:bg-light-hover focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-light-primary transition-colors duration-300 dark:bg-dark-primary dark:hover:bg-dark-hover dark:focus:ring-dark-primary">
                        Seleccionar Plan
                    </button>
                </div>
            </div>
        </div>

        <!-- Plan Platino -->
        <div class="flex flex-col rounded-xl shadow-lg overflow-hidden border border-light-border dark:border-dark-border transition-all duration-300 hover:shadow-xl hover:-translate-y-2 bg-light-card dark:bg-dark-card">
            <div class="px-6 py-8">
                <h3 class="text-2xl font-bold text-center text-light-text dark:text-dark-text">Platino</h3>
                <p class="mt-2 text-center text-light-textSecondary dark:text-dark-textSecondary">Para equipos y profesionales</p>

                <div class="mt-6 flex items-center justify-center">
                    <span class="text-5xl font-extrabold text-light-text dark:text-dark-text">$50.000</span>
                    <span class="ml-2 text-lg font-medium text-light-textSecondary dark:text-dark-textSecondary">/mes</span>
                </div>

                <ul class="mt-8 space-y-4">
                    <li class="flex items-start">
                        <svg class="h-6 w-6 text-light-success flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        <span class="ml-3 text-base text-light-text dark:text-dark-text">Tareas ilimitadas</span>
                    </li>
                    <li class="flex items-start">
                        <svg class="h-6 w-6 text-light-success flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        <span class="ml-3 text-base text-light-text dark:text-dark-text">Soporte 24/7</span>
                    </li>
                    <li class="flex items-start">
                        <svg class="h-6 w-6 text-light-success flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        <span class="ml-3 text-base text-light-text dark:text-dark-text">Todas las plantillas</span>
                    </li>
                    <li class="flex items-start">
                        <svg class="h-6 w-6 text-light-success flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        <span class="ml-3 text-base text-light-text dark:text-dark-text">Colaboración en equipo</span>
                    </li>
                    <li class="flex items-start">
                        <svg class="h-6 w-6 text-light-success flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        <span class="ml-3 text-base text-light-text dark:text-dark-text">Integraciones avanzadas</span>
                    </li>
                </ul>
            </div>
            <div class="px-6 py-4 bg-light-secondary dark:bg-dark-secondary border-t border-light-border dark:border-dark-border">
                <button
                    onclick="openModal('Básico')"
                    class="w-full flex justify-center py-3 px-4 border border-transparent rounded-md shadow-sm text-base font-medium text-white bg-light-primary hover:bg-light-hover focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-light-primary transition-colors duration-300 dark:bg-dark-primary dark:hover:bg-dark-hover dark:focus:ring-dark-primary">
                    Seleccionar Plan
                </button>
            </div>
        </div>
    </div>

    <!-- Comparación de Planes -->
    <div class="max-w-7xl mx-auto mt-16 bg-light-card dark:bg-dark-card rounded-xl shadow-lg overflow-hidden border border-light-border dark:border-dark-border">
        <div class="px-6 py-4 bg-light-secondary dark:bg-dark-secondary border-b border-light-border dark:border-dark-border">
            <h3 class="text-xl font-semibold text-light-text dark:text-dark-text">Comparación detallada de planes</h3>
        </div>
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-light-border dark:divide-dark-border">
                <thead class="bg-light-secondary dark:bg-dark-secondary">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-light-textSecondary dark:text-dark-textSecondary uppercase tracking-wider">Característica</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-light-textSecondary dark:text-dark-textSecondary uppercase tracking-wider">Básico</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-light-primary dark:text-dark-primary uppercase tracking-wider">Premium</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-light-textSecondary dark:text-dark-textSecondary uppercase tracking-wider">Platino</th>
                    </tr>
                </thead>
                <tbody class="bg-light-card dark:bg-dark-card divide-y divide-light-border dark:divide-dark-border">
                    <tr class="hover:bg-light-secondary dark:hover:bg-dark-secondary transition-colors">
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-light-text dark:text-dark-text">Tareas activas</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-light-textSecondary dark:text-dark-textSecondary">5</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-light-textSecondary dark:text-dark-textSecondary">Ilimitadas</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-light-textSecondary dark:text-dark-textSecondary">Ilimitadas</td>
                    </tr>
                    <tr class="hover:bg-light-secondary dark:hover:bg-dark-secondary transition-colors">
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-light-text dark:text-dark-text">Soporte</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-light-textSecondary dark:text-dark-textSecondary">Básico</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-light-textSecondary dark:text-dark-textSecondary">Prioritario</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-light-textSecondary dark:text-dark-textSecondary">24/7</td>
                    </tr>
                    <tr class="hover:bg-light-secondary dark:hover:bg-dark-secondary transition-colors">
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-light-text dark:text-dark-text">Colaboración</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-light-textSecondary dark:text-dark-textSecondary">-</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-light-textSecondary dark:text-dark-textSecondary">Hasta 5 miembros</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-light-textSecondary dark:text-dark-textSecondary">Ilimitado</td>
                    </tr>
                    <tr class="hover:bg-light-secondary dark:hover:bg-dark-secondary transition-colors">
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-light-text dark:text-dark-text">Plantillas</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-light-textSecondary dark:text-dark-textSecondary">Básicas</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-light-textSecondary dark:text-dark-textSecondary">Premium</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-light-textSecondary dark:text-dark-textSecondary">Todas</td>
                    </tr>
                    <tr class="hover:bg-light-secondary dark:hover:bg-dark-secondary transition-colors">
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-light-text dark:text-dark-text">Integraciones</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-light-textSecondary dark:text-dark-textSecondary">-</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-light-textSecondary dark:text-dark-textSecondary">Limitadas</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-light-textSecondary dark:text-dark-textSecondary">Todas</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal de Suscripción mejorado -->
    <div id="subscriptionModal" class="fixed inset-0 z-50 overflow-y-auto hidden" aria-labelledby="modal-title" role="dialog" aria-modal="true">
        <div class="flex items-center justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:block sm:p-0">
            <!-- Fondo oscuro -->
            <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true" onclick="closeModal()"></div>

            <!-- Contenido del modal -->
            <div class="inline-block align-bottom bg-light-card dark:bg-dark-card rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                <!-- Encabezado del modal -->
                <div class="flex items-center justify-between px-6 py-4 bg-light-secondary dark:bg-dark-secondary border-b border-light-border dark:border-dark-border">
                    <h3 class="text-lg font-medium text-light-text dark:text-dark-text" id="modal-title">Confirmar Suscripción</h3>
                    <button onclick="closeModal()" class="text-light-textSecondary hover:text-light-text dark:hover:text-dark-text focus:outline-none">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>

                <!-- Cuerpo del modal -->
                <div class="px-6 py-4">
                    <p class="text-light-text dark:text-dark-text text-base mb-4">Estás a punto de suscribirte al plan <span id="selectedPlanName" class="font-bold text-light-primary dark:text-dark-primary"></span>.</p>

                    <!-- Información de facturación -->
                    <div class="bg-light-secondary dark:bg-dark-secondary p-4 rounded-lg mb-4">
                        <h4 class="font-medium text-light-text dark:text-dark-text mb-2">Resumen de Facturación</h4>
                        <div class="flex justify-between mb-2">
                            <span class="text-light-textSecondary dark:text-dark-textSecondary">Plan seleccionado:</span>
                            <span id="modalPlanName" class="font-medium dark:text-dark-text"></span>
                        </div>
                        <div class="flex justify-between mb-2">
                            <span class="text-light-textSecondary dark:text-dark-textSecondary">Precio mensual:</span>
                            <span id="modalPlanPrice" class="font-medium dark:text-dark-text"></span>
                        </div>
                        <div class="flex justify-between border-t border-light-border dark:border-dark-border pt-2 mt-2">
                            <span class="text-light-text dark:text-dark-text font-medium">Total a pagar:</span>
                            <span id="modalTotalPrice" class="font-bold text-light-primary dark:text-dark-primary"></span>
                        </div>
                    </div>

                    <!-- Formulario de pago (simulado) -->
                    <div class="mb-4">
                        <label for="cardNumber" class="block text-sm font-medium text-light-text dark:text-dark-text mb-1">Número de tarjeta</label>
                        <input type="text" id="cardNumber" placeholder="1234 5678 9012 3456" class="w-full px-3 py-2 border border-light-border dark:border-dark-border rounded-md focus:ring-light-primary focus:border-light-primary dark:bg-dark-background dark:text-dark-text">
                    </div>
                    <div class="grid grid-cols-2 gap-4 mb-4">
                        <div>
                            <label for="expiryDate" class="block text-sm font-medium text-light-text dark:text-dark-text mb-1">Fecha de expiración</label>
                            <input type="text" id="expiryDate" placeholder="MM/AA" class="w-full px-3 py-2 border border-light-border dark:border-dark-border rounded-md focus:ring-light-primary focus:border-light-primary dark:bg-dark-background dark:text-dark-text">
                        </div>
                        <div>
                            <label for="cvv" class="block text-sm font-medium text-light-text dark:text-dark-text mb-1">CVV</label>
                            <input type="text" id="cvv" placeholder="123" class="w-full px-3 py-2 border border-light-border dark:border-dark-border rounded-md focus:ring-light-primary focus:border-light-primary dark:bg-dark-background dark:text-dark-text">
                        </div>
                    </div>
                    <div class="mb-4">
                        <label for="cardName" class="block text-sm font-medium text-light-text dark:text-dark-text mb-1">Nombre en la tarjeta</label>
                        <input type="text" id="cardName" placeholder="Nombre Apellido" class="w-full px-3 py-2 border border-light-border dark:border-dark-border rounded-md focus:ring-light-primary focus:border-light-primary dark:bg-dark-background dark:text-dark-text">
                    </div>
                </div>

                <!-- Opciones del modal -->
                <div class="px-6 py-4 bg-light-secondary dark:bg-dark-secondary flex justify-between border-t border-light-border dark:border-dark-border">
                    <button
                        onclick="closeModal()"
                        class="px-4 py-2 bg-light-secondary text-light-text dark:bg-dark-secondary dark:text-dark-text rounded-md hover:bg-light-border dark:hover:bg-dark-border focus:outline-none focus:ring-2 focus:ring-light-border dark:focus:ring-dark-border transition-colors duration-300">
                        Cancelar
                    </button>
                    <button
                        onclick="processPayment()"
                        class="px-4 py-2 bg-light-primary text-white rounded-md hover:bg-light-hover focus:outline-none focus:ring-2 focus:ring-light-primary transition-colors duration-300 dark:bg-dark-primary dark:hover:bg-dark-hover dark:focus:ring-dark-primary">
                        Confirmar y Pagar
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

        const planFeatures = {
            'Básico': ['5 tareas activas', 'Soporte básico', 'Plantillas básicas'],
            'Premium': ['Tareas ilimitadas', 'Soporte prioritario', 'Plantillas premium', 'Colaboración en equipo'],
            'Platino': ['Tareas ilimitadas', 'Soporte 24/7', 'Todas las plantillas', 'Colaboración ilimitada', 'Integraciones avanzadas']
        };

        function openModal(planName) {
            // Actualizar contenido del modal
            document.getElementById('selectedPlanName').textContent = planName;
            document.getElementById('modalPlanName').textContent = planName;
            document.getElementById('modalPlanPrice').textContent = '$' + planPrices[planName] + '/mes';
            document.getElementById('modalTotalPrice').textContent = '$' + planPrices[planName];

            // Mostrar el modal con animación
            const modal = document.getElementById('subscriptionModal');
            modal.classList.remove('hidden');
            modal.classList.add('animate-fade-in');
            document.body.style.overflow = 'hidden';

            // Enfocar el primer campo del formulario
            setTimeout(() => {
                document.getElementById('cardNumber')?.focus();
            }, 100);
        }

        function closeModal() {
            const modal = document.getElementById('subscriptionModal');
            modal.classList.add('hidden');
            modal.classList.remove('animate-fade-in');
            document.body.style.overflow = 'auto';
        }

        function processPayment() {
            const planName = document.getElementById('selectedPlanName').textContent;
            alert(`¡Gracias por suscribirte al plan ${planName}! Redirigiendo a tu panel...`);
            closeModal();


        }

        // Cerrar modal con ESC
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                closeModal();
            }
        });

        // Validación de campos de tarjeta en tiempo real
        document.getElementById('cardNumber')?.addEventListener('input', function(e) {
            this.value = this.value.replace(/[^\d]/g, '').replace(/(\d{4})(?=\d)/g, '$1 ');
        });

        document.getElementById('expiryDate')?.addEventListener('input', function(e) {
            this.value = this.value.replace(/[^\d]/g, '').replace(/(\d{2})(?=\d{2})/, '$1/');
        });

        document.getElementById('cvv')?.addEventListener('input', function(e) {
            this.value = this.value.replace(/[^\d]/g, '').substring(0, 4);
        });
    </script>
    @endsection