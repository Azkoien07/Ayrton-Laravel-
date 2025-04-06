<!DOCTYPE html>
<html lang="es" class="h-full">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagar con Stripe</title>
    <script src="https://js.stripe.com/v3/"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-full flex flex-col bg-light-background dark:bg-dark-background transition-colors duration-300">
    <div class="flex-grow container mx-auto px-4 py-8 max-w-3xl">
        
        <div class="mb-4">
            <a href="{{ route('plans') }}" class="inline-flex items-center text-light-primary dark:text-dark-primary hover:text-light-hover dark:hover:text-dark-hover transition-colors duration-300">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z" clip-rule="evenodd" />
                </svg>
                Volver a planes
            </a>
        </div>
 
        <div class="text-center mb-8">
            <h1 class="text-3xl font-bold text-light-text dark:text-dark-text mb-2">Proceso de Pago</h1>
            <p class="text-light-textSecondary dark:text-dark-textSecondary">Complete los detalles de su tarjeta para continuar</p>
        </div>

        <div class="mb-6">
            @if(session('success_message'))
                <div class="p-4 rounded-lg bg-green-50 border border-green-200 text-green-800 dark:bg-green-900 dark:border-green-800 dark:text-green-100">
                    {{ session('success_message') }}
                </div>
            @endif
            @if(session('error_message'))
                <div class="p-4 rounded-lg bg-red-50 border border-red-200 text-red-800 dark:bg-red-900 dark:border-red-800 dark:text-red-100">
                    {{ session('error_message') }}
                </div>
            @endif
        </div>

        <div class="bg-light-card dark:bg-dark-card rounded-xl shadow-md overflow-hidden border border-light-border dark:border-dark-border transition-all duration-300">
            <div class="px-6 py-4 border-b border-light-border dark:border-dark-border">
                <h2 class="text-xl font-semibold text-light-text dark:text-dark-text">Información de Pago</h2>
            </div>
            
            <form action="{{ route('payment.process') }}" method="POST" id="payment-form" class="p-6">
                @csrf
                <input type="hidden" name="plan" value="{{ $plan ?? 'Premium' }}">
                
                <div class="mb-6 p-4 bg-light-secondary dark:bg-dark-secondary rounded-lg">
                    <div class="flex justify-between items-center">
                        <div>
                            <h3 class="font-medium text-light-text dark:text-dark-text">Plan {{ $plan ?? 'Premium' }}</h3>
                            <p class="text-sm text-light-textSecondary dark:text-dark-textSecondary">Suscripción mensual</p>
                        </div>
                        <span class="text-lg font-bold text-light-text dark:text-dark-text">
                            @if(($plan ?? 'Premium') === 'Básico')
                                $0 COP
                            @elseif(($plan ?? 'Premium') === 'Premium')
                                $34.000 COP
                            @else
                                $50.000 COP
                            @endif
                        </span>
                    </div>
                    
                    
                    <div class="mt-3 pt-3 border-t border-light-border dark:border-dark-border">
                        <ul class="text-sm text-light-textSecondary dark:text-dark-textSecondary space-y-1">
                            @if(($plan ?? 'Premium') === 'Básico')
                                <li class="flex items-start">
                                    <svg class="h-4 w-4 text-light-success mr-1 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                    </svg>
                                    <span>5 tareas activas</span>
                                </li>
                                <li class="flex items-start">
                                    <svg class="h-4 w-4 text-light-success mr-1 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                    </svg>
                                    <span>Soporte básico</span>
                                </li>
                            @elseif(($plan ?? 'Premium') === 'Premium')
                                <li class="flex items-start">
                                    <svg class="h-4 w-4 text-light-success mr-1 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                    </svg>
                                    <span>Tareas ilimitadas</span>
                                </li>
                                <li class="flex items-start">
                                    <svg class="h-4 w-4 text-light-success mr-1 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                    </svg>
                                    <span>Soporte prioritario</span>
                                </li>
                                <li class="flex items-start">
                                    <svg class="h-4 w-4 text-light-success mr-1 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                    </svg>
                                    <span>Colaboración en equipo</span>
                                </li>
                            @else
                                <li class="flex items-start">
                                    <svg class="h-4 w-4 text-light-success mr-1 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                    </svg>
                                    <span>Tareas ilimitadas</span>
                                </li>
                                <li class="flex items-start">
                                    <svg class="h-4 w-4 text-light-success mr-1 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                    </svg>
                                    <span>Soporte 24/7</span>
                                </li>
                                <li class="flex items-start">
                                    <svg class="h-4 w-4 text-light-success mr-1 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                    </svg>
                                    <span>Colaboración ilimitada</span>
                                </li>
                                <li class="flex items-start">
                                    <svg class="h-4 w-4 text-light-success mr-1 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                    </svg>
                                    <span>Integraciones avanzadas</span>
                                </li>
                            @endif
                        </ul>
                    </div>
                </div>

                @if(($plan ?? 'Premium') !== 'Básico')
                  
                    <div class="mb-6">
                        <label class="block text-sm font-medium text-light-text dark:text-dark-text mb-2">Detalles de la Tarjeta</label>
                        <div id="card-element" class="p-3 border border-light-border dark:border-dark-border rounded-lg bg-light-background dark:bg-dark-background focus:ring-2 focus:ring-light-primary dark:focus:ring-dark-primary focus:border-transparent"></div>
                        <div id="card-errors" role="alert" class="text-red-500 text-sm mt-2"></div>
                    </div>

                    <div class="flex flex-col sm:flex-row gap-4">
                        <button type="submit" id="submit-button" class="flex-1 py-3 px-4 bg-light-primary hover:bg-light-hover text-white font-medium rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-light-primary transition-colors duration-300 dark:bg-dark-primary dark:hover:bg-dark-hover dark:focus:ring-dark-primary">
                            <span id="button-text">Pagar ahora</span>
                            <span id="button-spinner" class="hidden ml-2">
                                <svg class="animate-spin h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                </svg>
                            </span>
                        </button>
                    </div>
                @endif
            </form>
        </div>

        @if(($plan ?? 'Premium') !== 'Básico')
            <div class="mt-6 text-center text-sm text-light-textSecondary dark:text-dark-textSecondary">
                <p class="flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd" />
                    </svg>
                    Pagos seguros con Stripe
                </p>
            </div>
        @endif
    </div>

    @if(($plan ?? 'Premium') !== 'Básico')
        <script>
     
            var stripe = Stripe("{{ env('STRIPE_KEY') }}");
            var elements = stripe.elements();
            
            var style = {
                base: {
                    color: '#2D3748',
                    fontFamily: '"Inter", sans-serif',
                    fontSmoothing: 'antialiased',
                    fontSize: '16px',
                    '::placeholder': {
                        color: '#A0AEC0'
                    }
                },
                invalid: {
                    color: '#E53E3E',
                    iconColor: '#E53E3E'
                }
            };

            var card = elements.create('card', {
                style: style,
                hidePostalCode: true
            });
            
            card.mount('#card-element');

            
            card.addEventListener('change', function(event) {
                var displayError = document.getElementById('card-errors');
                if (event.error) {
                    displayError.textContent = event.error.message;
                } else {
                    displayError.textContent = '';
                }
            });

            
            var form = document.getElementById('payment-form');
            var submitButton = document.getElementById('submit-button');
            var buttonSpinner = document.getElementById('button-spinner');
            var buttonText = document.getElementById('button-text');

            form.addEventListener('submit', function(event) {
                event.preventDefault();
                
                
                submitButton.disabled = true;
                buttonText.textContent = 'Procesando...';
                buttonSpinner.classList.remove('hidden');
                
                stripe.createToken(card).then(function(result) {
                    if (result.error) {
                        
                        var errorElement = document.getElementById('card-errors');
                        errorElement.textContent = result.error.message;
                        
                        
                        submitButton.disabled = false;
                        buttonText.textContent = 'Pagar ahora';
                        buttonSpinner.classList.add('hidden');
                    } else {
                       
                        var hiddenInput = document.createElement('input');
                        hiddenInput.setAttribute('type', 'hidden');
                        hiddenInput.setAttribute('name', 'stripeToken');
                        hiddenInput.setAttribute('value', result.token.id);
                        form.appendChild(hiddenInput);
                        
                        form.submit();
                    }
                });
            });
        </script>
    @endif
</body>
</html>