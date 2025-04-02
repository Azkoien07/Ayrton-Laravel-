<!DOCTYPE html>
<html lang="es">
<head>
    @notifyCss
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión - Ayrton</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen bg-light-background text-light-text">
    <!-- Contenedor de notificaciones -->
    @include('notify::components.notify')

    <!-- Contenedor principal -->
    <div class="min-h-screen flex flex-col items-center justify-center p-4">
        <!-- Título con animación -->
        <div class="text-center mb-10 animate-fade-in-down">
            <h1 class="text-5xl font-extrabold text-light-primary mb-3">AYRTON</h1>
            <div class="h-1 w-20 bg-light-primary rounded-full mx-auto mb-4"></div>
            <p class="text-xl text-light-textSecondary mt-4 font-medium">
                <span class="inline-block animate-letter-bounce" style="animation-delay: 0.1s">O</span>
                <span class="inline-block animate-letter-bounce" style="animation-delay: 0.2s">r</span>
                <span class="inline-block animate-letter-bounce" style="animation-delay: 0.3s">g</span>
                <span class="inline-block animate-letter-bounce" style="animation-delay: 0.4s">a</span>
                <span class="inline-block animate-letter-bounce" style="animation-delay: 0.5s">n</span>
                <span class="inline-block animate-letter-bounce" style="animation-delay: 0.6s">i</span>
                <span class="inline-block animate-letter-bounce" style="animation-delay: 0.7s">z</span>
                <span class="inline-block animate-letter-bounce" style="animation-delay: 0.8s">a</span>
                <span> </span>
                <span class="inline-block animate-letter-bounce" style="animation-delay: 0.9s">t</span>
                <span class="inline-block animate-letter-bounce" style="animation-delay: 1.0s">u</span>
                <span class="inline-block animate-letter-bounce" style="animation-delay: 1.1s">s</span>
                <span> </span>
                <span class="inline-block animate-letter-bounce" style="animation-delay: 1.2s">t</span>
                <span class="inline-block animate-letter-bounce" style="animation-delay: 1.3s">a</span>
                <span class="inline-block animate-letter-bounce" style="animation-delay: 1.4s">r</span>
                <span class="inline-block animate-letter-bounce" style="animation-delay: 1.5s">e</span>
                <span class="inline-block animate-letter-bounce" style="animation-delay: 1.6s">a</span>
                <span class="inline-block animate-letter-bounce" style="animation-delay: 1.7s">s</span>
            </p>
        </div>

        <!-- Card del formulario -->
        <div class="bg-light-card rounded-xl shadow-lg p-6 w-full max-w-md transition-all duration-300 hover:shadow-xl border border-light-border">
            <!-- Mensajes de error -->
            @if($errors->any())
            <div class="mb-4 p-3 bg-light-error text-light-background rounded-lg border border-light-error text-sm">
                @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
                @endforeach
            </div>
            @endif

            <!-- Formulario de login -->
            <form action="{{ route('login') }}" method="POST" class="space-y-4">
                @csrf

                <!-- Campo: Correo electrónico -->
                <div>
                    <label for="email" class="block text-sm font-medium text-light-text mb-1">Correo Electrónico</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-light-textSecondary" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"/>
                                <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"/>
                            </svg>
                        </div>
                        <input type="email" name="email" id="email" value="{{ old('email') }}"
                            class="pl-10 w-full px-3 py-2 text-sm border border-light-border rounded-lg focus:ring-2 focus:ring-light-primary focus:border-light-primary transition bg-light-background"
                            placeholder="tu@email.com" required>
                    </div>
                </div>

                <!-- Campo: Contraseña -->
                <div>
                    <label for="password" class="block text-sm font-medium text-light-text mb-1">Contraseña</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-light-textSecondary" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd"/>
                            </svg>
                        </div>
                        <input type="password" name="password" id="password"
                            class="pl-10 w-full px-3 py-2 text-sm border border-light-border rounded-lg focus:ring-2 focus:ring-light-primary focus:border-light-primary transition bg-light-background"
                            placeholder="••••••••" required>
                    </div>
                </div>

                <!-- Recordar sesión -->
                <div class="flex items-center">
                    <input type="checkbox" name="remember" id="remember" class="h-4 w-4 text-light-primary focus:ring-light-primary border-light-border rounded bg-light-background">
                    <label for="remember" class="ml-2 block text-sm text-light-text">Recordar sesión</label>
                </div>

                <button type="submit" class="w-full bg-light-primary hover:bg-light-hover text-light-background font-medium py-2.5 px-4 rounded-lg transition-all shadow-md hover:shadow-lg">
                    Iniciar Sesión
                </button>

                <div class="text-center text-sm text-light-textSecondary pt-2">
                    ¿No tienes una cuenta?
                    <button type="button" onclick="openModal()" class="text-light-primary hover:text-light-hover font-medium ml-1">
                        Regístrate
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Modal de registro -->
    <div id="registerModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center p-4 hidden z-50">
        <div class="bg-light-card rounded-xl shadow-2xl p-6 w-full max-w-md max-h-[90vh] overflow-y-auto border border-light-border">
            <!-- Botón para cerrar -->
            <button onclick="closeModal()" class="absolute top-4 right-4 text-light-textSecondary hover:text-light-text transition">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>

            <h2 class="text-xl font-bold text-light-text mb-4">Crear una cuenta</h2>

            <form action="{{ route('register') }}" method="POST" class="space-y-3">
                @csrf
                
                <div>
                    <label for="name" class="block text-sm font-medium text-light-text mb-1">Nombre Completo</label>
                    <input type="text" name="name" id="name" value="{{ old('name') }}"
                        class="w-full px-3 py-2 text-sm border border-light-border rounded-lg focus:ring-2 focus:ring-light-primary focus:border-light-primary transition bg-light-background"
                        required>
                </div>

                <div>
                    <label for="email" class="block text-sm font-medium text-light-text mb-1">Correo Electrónico</label>
                    <input type="email" name="email" id="email" value="{{ old('email') }}"
                        class="w-full px-3 py-2 text-sm border border-light-border rounded-lg focus:ring-2 focus:ring-light-primary focus:border-light-primary transition bg-light-background"
                        required>
                </div>

                <div>
                    <label for="username" class="block text-sm font-medium text-light-text mb-1">Nombre de Usuario</label>
                    <input type="text" name="username" id="username" value="{{ old('username') }}"
                        class="w-full px-3 py-2 text-sm border border-light-border rounded-lg focus:ring-2 focus:ring-light-primary focus:border-light-primary transition bg-light-background"
                        required>
                </div>

                <div>
                    <label for="register_password" class="block text-sm font-medium text-light-text mb-1">Contraseña</label>
                    <input type="password" name="password" id="register_password"
                        class="w-full px-3 py-2 text-sm border border-light-border rounded-lg focus:ring-2 focus:ring-light-primary focus:border-light-primary transition bg-light-background"
                        required>
                </div>

                <div>
                    <label for="password_confirmation" class="block text-sm font-medium text-light-text mb-1">Confirmar Contraseña</label>
                    <input type="password" name="password_confirmation" id="password_confirmation"
                        class="w-full px-3 py-2 text-sm border border-light-border rounded-lg focus:ring-2 focus:ring-light-primary focus:border-light-primary transition bg-light-background"
                        required>
                </div>

                <div>
                    <label for="role_id" class="block text-sm font-medium text-light-text mb-1">Rol</label>
                    <select name="role_id" id="role_id"
                        class="w-full px-3 py-2 text-sm border border-light-border rounded-lg focus:ring-2 focus:ring-light-primary focus:border-light-primary transition bg-light-background"
                        required>
                        <option value="2">Usuario</option>
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-medium text-light-text mb-1">Plan</label>
                    <div class="px-3 py-2 text-sm border border-light-border rounded-lg bg-light-secondary text-light-textSecondary">
                        Básico
                    </div>
                    <input type="hidden" name="plan_id" value="1">
                </div>

                <button type="submit" class="w-full bg-light-primary hover:bg-light-hover text-light-background font-medium py-2.5 px-4 rounded-lg transition mt-2 shadow-md hover:shadow-lg">
                    Registrarse
                </button>
            </form>
        </div>
    </div>

    <!-- Scripts para manejar el modal -->
    <script>
        // Funciones para manejar el modal
        function openModal() {
            document.getElementById('registerModal').classList.remove('hidden');
            document.body.style.overflow = 'hidden';
        }

        function closeModal() {
            document.getElementById('registerModal').classList.add('hidden');
            document.body.style.overflow = 'auto';
        }

        // Cerrar al hacer clic fuera
        document.getElementById('registerModal').addEventListener('click', function(e) {
            if (e.target === this) closeModal();
        });

        // Cerrar con ESC
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') closeModal();
        });
    </script>
    
    <!-- Estilos de animación -->
    <style>
        .animate-fade-in-down {
            animation: fadeInDown 0.6s ease-out forwards;
        }

        .animate-letter-bounce {
            animation: bounce 0.8s infinite alternate;
        }

        @keyframes fadeInDown {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes bounce {
            0%, 100% {
                transform: translateY(0);
            }
            50% {
                transform: translateY(-5px);
            }
        }
    </style>

    @notifyJs
</body>
</html>