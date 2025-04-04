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
        <!-- Botón de volver a planes (añadido arriba del título) -->
        <div class="mb-4">
            <a href="{{ route('plans') }}" class="inline-flex items-center text-light-primary dark:text-dark-primary hover:text-light-hover dark:hover:text-dark-hover transition-colors duration-300">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z" clip-rule="evenodd" />
                </svg>
                Volver a planes
            </a>
        </div>

        <!-- Encabezado -->
        <div class="text-center mb-8">
            <h1 class="text-3xl font-bold text-light-text dark:text-dark-text mb-2">Proceso de Pago</h1>
            <p class="text-light-textSecondary dark:text-dark-textSecondary">Complete los detalles de su tarjeta para continuar</p>
        </div>

        <!-- Mensajes de estado -->
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

        <!-- Formulario de pago -->
        <div class="bg-light-card dark:bg-dark-card rounded-xl shadow-md overflow-hidden border border-light-border dark:border-dark-border transition-all duration-300">
            <div class="px-6 py-4 border-b border-light-border dark:border-dark-border">
                <h2 class="text-xl font-semibold text-light-text dark:text-dark-text">Información de Pago</h2>
            </div>
            
            <form action="{{ route('payment.process') }}" method="POST" id="payment-form" class="p-6">
                @csrf
                <input type="hidden" name="amount" value="50"> <!-- Monto en dólares -->
                
                <!-- Detalles del plan -->
                <div class="mb-6 p-4 bg-light-secondary dark:bg-dark-secondary rounded-lg">
                    <div class="flex justify-between items-center">
                        <div>
                            <h3 class="font-medium text-light-text dark:text-dark-text">Plan Premium</h3>
                            <p class="text-sm text-light-textSecondary dark:text-dark-textSecondary">Suscripción mensual</p>
                        </div>
                        <span class="text-lg font-bold text-light-text dark:text-dark-text">$50.00 USD</span>
                    </div>
                </div>

                <!-- Elemento de tarjeta de Stripe -->
                <div class="mb-6">
                    <label class="block text-sm font-medium text-light-text dark:text-dark-text mb-2">Detalles de la Tarjeta</label>
                    <div id="card-element" class="p-3 border border-light-border dark:border-dark-border rounded-lg bg-light-background dark:bg-dark-background focus:ring-2 focus:ring-light-primary dark:focus:ring-dark-primary focus:border-transparent"></div>
                    <div id="card-errors" role="alert" class="text-red-500 text-sm mt-2"></div>
                </div>

                <!-- Botones de acción -->
                <div class="flex flex-col sm:flex-row gap-4">
                    <a href="{{ route('plans') }}" class="flex-1 py-3 px-4 text-center border border-light-border dark:border-dark-border text-light-text dark:text-dark-text font-medium rounded-lg shadow-sm hover:bg-light-secondary dark:hover:bg-dark-secondary transition-colors duration-300">
                        Volver a planes
                    </a>
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
            </form>
        </div>

        <!-- Información de seguridad -->
        <div class="mt-6 text-center text-sm text-light-textSecondary dark:text-dark-textSecondary">
            <p class="flex items-center justify-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd" />
                </svg>
                Pagos seguros con Stripe
            </p>
        </div>
    </div>

    <script>
        // Configuración de Stripe
        var stripe = Stripe("{{ env('STRIPE_KEY') }}");
        var elements = stripe.elements();
        
        // Estilo personalizado para el elemento de la tarjeta
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

        // Manejo de errores
        card.addEventListener('change', function(event) {
            var displayError = document.getElementById('card-errors');
            if (event.error) {
                displayError.textContent = event.error.message;
            } else {
                displayError.textContent = '';
            }
        });

        // Manejo del envío del formulario
        var form = document.getElementById('payment-form');
        var submitButton = document.getElementById('submit-button');
        var buttonSpinner = document.getElementById('button-spinner');
        var buttonText = document.getElementById('button-text');

        form.addEventListener('submit', function(event) {
            event.preventDefault();
            
            // Deshabilitar el botón y mostrar spinner
            submitButton.disabled = true;
            buttonText.textContent = 'Procesando...';
            buttonSpinner.classList.remove('hidden');
            
            stripe.createToken(card).then(function(result) {
                if (result.error) {
                    // Mostrar error al usuario
                    var errorElement = document.getElementById('card-errors');
                    errorElement.textContent = result.error.message;
                    
                    // Habilitar el botón nuevamente
                    submitButton.disabled = false;
                    buttonText.textContent = 'Pagar ahora';
                    buttonSpinner.classList.add('hidden');
                } else {
                    // Añadir el token al formulario y enviarlo
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
</body>
</html>