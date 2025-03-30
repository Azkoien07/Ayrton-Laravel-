<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión - Ayrton</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .card-shadow {
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1), 0 1px 3px rgba(0, 0, 0, 0.08);
        }
        .modal-content {
            max-height: 90vh;
            overflow-y: auto;
            width: 95%;
            max-width: 32rem;
            margin: 0 auto;
        }
        @media (max-width: 640px) {
            .card-shadow {
                box-shadow: 0 2px 4px rgba(0, 0, 0, 0.08);
            }
            
            .modal-content {
                max-height: 95vh;
                padding: 1.25rem;
            }
        }
        

        @media (max-width: 360px) {
            .modal-content {
                width: 95%;
                margin: 1rem auto;
            }
        }
        .animate-fade-in-down {
            animation: fadeInDown 0.6s ease-out forwards;
        }
        .animate-letter-bounce {
            display: inline-block;
            animation: bounce 0.8s infinite alternate;
        }
        .title-gradient {
            background: linear-gradient(45deg, #3b82f6, #8b5cf6);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
        }
        .title-underline {
            height: 4px;
            width: 80px;
            background: linear-gradient(90deg, #3b82f6, #8b5cf6);
            margin: 12px auto;
            border-radius: 2px;
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
        .animate-fade-in-down {
            animation: fadeInDown 0.6s ease-out forwards;
        }
        .animate-letter-bounce {
            display: inline-block;
            animation: bounce 0.8s infinite alternate;
        }
    </style>
</head>

<body class="bg-gray-50">
    <!-- Contenedor principal -->
    <div class="min-h-screen flex flex-col items-center justify-center p-4">
        <!-- Título fuera de la card con animación -->
        <div class="text-center mb-10 animate-fade-in-down">
            <h1 class="text-5xl font-extrabold title-gradient mb-3">AYRTON</h1>
            <div class="title-underline"></div>
            <p class="text-xl text-gray-600 mt-4 font-medium">
                <span class="animate-letter-bounce" style="animation-delay: 0.1s">O</span>
                <span class="animate-letter-bounce" style="animation-delay: 0.2s">r</span>
                <span class="animate-letter-bounce" style="animation-delay: 0.3s">g</span>
                <span class="animate-letter-bounce" style="animation-delay: 0.4s">a</span>
                <span class="animate-letter-bounce" style="animation-delay: 0.5s">n</span>
                <span class="animate-letter-bounce" style="animation-delay: 0.6s">i</span>
                <span class="animate-letter-bounce" style="animation-delay: 0.7s">z</span>
                <span class="animate-letter-bounce" style="animation-delay: 0.8s">a</span>
                <span> </span>
                <span class="animate-letter-bounce" style="animation-delay: 0.9s">t</span>
                <span class="animate-letter-bounce" style="animation-delay: 1.0s">u</span>
                <span class="animate-letter-bounce" style="animation-delay: 1.1s">s</span>
                <span> </span>
                <span class="animate-letter-bounce" style="animation-delay: 1.2s">t</span>
                <span class="animate-letter-bounce" style="animation-delay: 1.3s">a</span>
                <span class="animate-letter-bounce" style="animation-delay: 1.4s">r</span>
                <span class="animate-letter-bounce" style="animation-delay: 1.5s">e</span>
                <span class="animate-letter-bounce" style="animation-delay: 1.6s">a</span>
                <span class="animate-letter-bounce" style="animation-delay: 1.7s">s</span>
            </p>
        </div>

        <!-- Card del formulario -->
        <div class="bg-white rounded-xl card-shadow p-6 w-full max-w-md transform transition-all duration-300 hover:scale-[1.01]">
            <!-- Mensajes de error -->
            @if($errors->any())
            <div class="mb-4 p-3 bg-red-50 text-red-700 rounded-lg border border-red-200 text-sm">
                @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
                @endforeach
            </div>
            @endif

            <!-- Formulario de login - mejor espaciado en móvil -->
            <form action="{{ route('login') }}" method="POST" class="space-y-3 sm:space-y-4">
                @csrf

                <!-- Campo: Correo electrónico -->
                <div>
                    <label for="email" class="block text-xs sm:text-sm font-medium text-gray-700 mb-1">Correo Electrónico</label>
                    <input type="email" name="email" id="email" value="{{ old('email') }}"
                        class="w-full px-3 py-2 text-sm border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition"
                        placeholder="tu@email.com" required>
                </div>

                <!-- Campo: Contraseña -->
                <div>
                    <label for="password" class="block text-xs sm:text-sm font-medium text-gray-700 mb-1">Contraseña</label>
                    <input type="password" name="password" id="password"
                        class="w-full px-3 py-2 text-sm border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition"
                        placeholder="••••••••" required>
                </div>

                <!-- Recordar sesión -->
                <div class="flex items-center">
                    <input type="checkbox" name="remember" id="remember" class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                    <label for="remember" class="ml-2 block text-xs sm:text-sm text-gray-700">Recordar sesión</label>
                </div>

                <button type="submit" class="w-full bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-700 hover:to-indigo-700 text-white font-medium py-2 px-4 rounded-lg transition-all shadow hover:shadow-md">
                    Iniciar Sesión
                </button>

                <div class="text-center text-xs sm:text-sm text-gray-600">
                    ¿No tienes una cuenta?
                    <button type="button" onclick="openModal()" class="text-blue-600 hover:text-blue-700 font-medium">
                        Regístrate
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Modal de registro -->
    <div id="registerModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center p-4 hidden z-50">
        <div class="modal-content bg-white rounded-xl card-shadow p-6 w-full max-w-md">
            <!-- Botón para cerrar -->
            <button onclick="closeModal()" class="absolute top-3 right-3 text-gray-400 hover:text-gray-600">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>

            <h2 class="text-lg sm:text-xl font-bold text-gray-800 mb-3 sm:mb-4">Regístrate</h2>

            <form action="{{ route('register') }}" method="POST" class="space-y-2 sm:space-y-3">
                @csrf

                <!-- Primera columna de campos -->
                <div class="grid grid-cols-1 gap-3">
                    <div>
                        <label for="name" class="block text-xs sm:text-sm font-medium text-gray-700 mb-1">Nombre Completo</label>
                        <input type="text" name="name" id="name" value="{{ old('name') }}"
                            class="w-full px-3 py-2 text-sm border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition"
                            required>
                    </div>

                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Correo Electrónico</label>
                        <input type="email" name="email" id="email" value="{{ old('email') }}"
                            class="w-full px-3 py-2 text-sm border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition"
                            required>
                    </div>

                    <div>
                        <label for="username" class="block text-sm font-medium text-gray-700 mb-1">Nombre de Usuario</label>
                        <input type="text" name="username" id="username" value="{{ old('username') }}"
                            class="w-full px-3 py-2 text-sm border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition"
                            required>
                    </div>

                    <div>
                        <label for="register_password" class="block text-xs sm:text-sm font-medium text-gray-700 mb-1">Contraseña</label>
                        <input type="password" name="password" id="register_password"
                            class="w-full px-3 py-2 text-sm border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition"
                            required>
                    </div>

                    <div>
                        <label for="password_confirmation" class="block text-xs sm:text-sm font-medium text-gray-700 mb-1">Confirmar Contraseña</label>
                        <input type="password" name="password_confirmation" id="password_confirmation"
                            class="w-full px-3 py-2 text-sm border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition"
                            required>
                    </div>

                    <div>
                        <label for="role_id" class="block text-xs sm:text-sm font-medium text-gray-700 mb-1">Rol</label>
                        <select name="role_id" id="role_id"
                            class="w-full px-3 py-2 text-sm border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition"
                            required>
                            <option value="2">Usuario</option>
                        </select>
                    </div>

                    <div>
                        <label for="plan_display" class="block text-sm font-medium text-gray-700 mb-1">Plan</label>
                        <select name="plan_display" id="plan_display"
                            class="w-full px-3 py-2 text-sm border border-gray-300 rounded-lg bg-gray-100 cursor-not-allowed text-gray-600"
                            disabled>
                            <option value="1" selected>Básico</option>
                        </select>
                        <input type="hidden" name="plan_id" value="1"> <!-- 1 = ID del plan básico -->
                    </div>
                </div>

                <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded-lg transition mt-3 text-sm sm:text-base">
                    Registrarse
                </button>
            </form>
        </div>
    </div>
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

        // Iniciar animaciones cuando la página carga
        document.addEventListener('DOMContentLoaded', function() {
            // Animación de letras del subtítulo
            const letters = document.querySelectorAll('.animate-letter-bounce');
            letters.forEach((letter, index) => {
                letter.style.animationDelay = `${index * 0.1}s`;
            });
        });
    </script>
</body>
</html>