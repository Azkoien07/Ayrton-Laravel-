<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión - Ayrton</title>
    <!-- Tailwind CSS via CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .card-shadow {
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1), 0 1px 3px rgba(0, 0, 0, 0.08);
        }
        
        /* Estilo mejorado para el modal responsivo */
        .modal-content {
            max-height: 90vh;
            overflow-y: auto;
            width: 95%;
            max-width: 32rem;
            margin: 0 auto;
        }
        
        /* Mejorar responsividad en dispositivos pequeños */
        @media (max-width: 640px) {
            .card-shadow {
                box-shadow: 0 2px 4px rgba(0, 0, 0, 0.08);
            }
            
            .modal-content {
                max-height: 95vh;
                padding: 1.25rem;
            }
        }
        
        /* Evitar que el formulario se desborde en pantallas muy pequeñas */
        @media (max-width: 360px) {
            .modal-content {
                padding: 1rem;
            }
            
            input, select, button {
                font-size: 0.875rem;
            }
        }
    </style>
</head>

<body class="bg-gray-50">
    <!-- Contenedor principal - uso de flex más adaptable -->
    <div class="min-h-screen flex items-center justify-center p-4 sm:p-6">
        <div class="bg-white rounded-xl card-shadow p-4 sm:p-6 w-full max-w-md">
            <!-- Logo - Textos más responsivos -->
            <div class="text-center mb-4 sm:mb-6">
                <h1 class="text-xl sm:text-2xl font-bold text-gray-800">Ayrton</h1>
                <p class="text-sm sm:text-base text-gray-600 mt-1">Organiza tus tareas de manera eficiente</p>
            </div>

            <!-- Mensajes de error - ajuste para pantallas pequeñas -->
            @if($errors->any())
                <div class="mb-3 sm:mb-4 p-2 sm:p-3 bg-red-50 text-red-700 rounded-lg border border-red-200 text-xs sm:text-sm">
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

                <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded-lg transition text-sm sm:text-base">
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

    <!-- Modal de registro optimizado -->
    <div id="registerModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center p-2 sm:p-4 hidden z-50">
        <div class="modal-content bg-white rounded-xl card-shadow p-4 sm:p-6">
            <!-- Botón para cerrar - posición mejorada para móviles -->
            <button onclick="closeModal()" class="absolute top-2 right-2 sm:top-3 sm:right-3 text-gray-400 hover:text-gray-600">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 sm:h-6 sm:w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>

            <h2 class="text-lg sm:text-xl font-bold text-gray-800 mb-3 sm:mb-4">Regístrate</h2>

            <form action="{{ route('register') }}" method="POST" class="space-y-2 sm:space-y-3">
                @csrf
                
                <!-- Campos de registro - ajustados para mejor visualización en móvil -->
                <div class="grid grid-cols-1 gap-2 sm:gap-3">
                    <div>
                        <label for="name" class="block text-xs sm:text-sm font-medium text-gray-700 mb-1">Nombre Completo</label>
                        <input type="text" name="name" id="name" value="{{ old('name') }}"
                            class="w-full px-3 py-2 text-sm border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition"
                            required>
                    </div>

                    <div>
                        <label for="username" class="block text-xs sm:text-sm font-medium text-gray-700 mb-1">Nombre de Usuario</label>
                        <input type="text" name="username" id="username" value="{{ old('username') }}"
                            class="w-full px-3 py-2 text-sm border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition"
                            required>
                    </div>

                    <div>
                        <label for="register_email" class="block text-xs sm:text-sm font-medium text-gray-700 mb-1">Correo Electrónico</label>
                        <input type="email" name="email" id="register_email" value="{{ old('email') }}"
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
                            class="w-full px-3 py-2 text-sm border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition bg-white"
                            required>
                            <option value="">Seleccione un rol</option>
                            <option value="1">Administrador</option>
                            <option value="2">Usuario</option>
                        </select>
                    </div>

                    <div>
                        <label for="plan_id" class="block text-xs sm:text-sm font-medium text-gray-700 mb-1">Plan</label>
                        <select name="plan_id" id="plan_id"
                            class="w-full px-3 py-2 text-sm border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition bg-white"
                            required>
                            <option value="">Seleccione un plan</option>
                            <option value="1">Básico</option>
                            <option value="2">Premium</option>
                            <option value="3">Empresarial</option>
                        </select>
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
    </script>
</body>
</html>