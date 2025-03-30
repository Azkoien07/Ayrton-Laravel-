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
        
        /* Estilo para ajustar el modal al contenido */
        .modal-content {
            max-height: calc(100vh - 2rem);
            overflow-y: auto;
        }
        
        @media (max-width: 640px) {
            .modal-content {
                width: 95%;
                margin: 1rem auto;
            }
        }
    </style>
</head>

<body class="bg-gray-50">
    <!-- Contenedor principal -->
    <div class="min-h-screen flex items-center justify-center p-4">
        <div class="bg-white rounded-xl card-shadow p-6 w-full max-w-md">
            <!-- Logo -->
            <div class="text-center mb-6">
                <h1 class="text-2xl font-bold text-gray-800">Ayrton</h1>
                <p class="text-gray-600 mt-1">Organiza tus tareas de manera eficiente</p>
            </div>

            <!-- Mensajes de error -->
            @if($errors->any())
                <div class="mb-4 p-3 bg-red-50 text-red-700 rounded-lg border border-red-200 text-sm">
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
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Correo Electrónico</label>
                    <input type="email" name="email" id="email" value="{{ old('email') }}"
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition"
                        placeholder="tu@email.com" required>
                </div>

                <!-- Campo: Contraseña -->
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Contraseña</label>
                    <input type="password" name="password" id="password"
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition"
                        placeholder="••••••••" required>
                </div>

                <!-- Recordar sesión -->
                <div class="flex items-center">
                    <input type="checkbox" name="remember" id="remember" class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                    <label for="remember" class="ml-2 block text-sm text-gray-700">Recordar sesión</label>
                </div>

                <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded-lg transition">
                    Iniciar Sesión
                </button>

                <div class="text-center text-sm text-gray-600">
                    ¿No tienes una cuenta?
                    <button type="button" onclick="openModal()" class="text-blue-600 hover:text-blue-700 font-medium">
                        Regístrate
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Modal de registro optimizado -->
    <div id="registerModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center p-4 hidden z-50">
        <div class="modal-content bg-white rounded-xl card-shadow p-6 w-full max-w-md">
            <!-- Botón para cerrar -->
            <button onclick="closeModal()" class="absolute top-3 right-3 text-gray-400 hover:text-gray-600">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>

            <h2 class="text-xl font-bold text-gray-800 mb-4">Regístrate</h2>

            <form action="{{ route('register') }}" method="POST" class="space-y-3">
                @csrf
                
                <!-- Primera columna de campos -->
                <div class="grid grid-cols-1 gap-3">
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Nombre Completo</label>
                        <input type="text" name="name" id="name" value="{{ old('name') }}"
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
                        <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Correo Electrónico</label>
                        <input type="email" name="email" id="email" value="{{ old('email') }}"
                            class="w-full px-3 py-2 text-sm border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition"
                            required>
                    </div>

                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Contraseña</label>
                        <input type="password" name="password" id="password"
                            class="w-full px-3 py-2 text-sm border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition"
                            required>
                    </div>

                    <div>
                        <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-1">Confirmar Contraseña</label>
                        <input type="password" name="password_confirmation" id="password_confirmation"
                            class="w-full px-3 py-2 text-sm border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition"
                            required>
                    </div>

                    <div>
                        <label for="role_id" class="block text-sm font-medium text-gray-700 mb-1">Rol</label>
                        <select name="role_id" id="role_id"
                            class="w-full px-3 py-2 text-sm border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition bg-white"
                            required>
                            <option value="">Seleccione un rol</option>
                            <option value="1">Administrador</option>
                            <option value="2">Usuario</option>
                        </select>
                    </div>

                    <div>
                        <label for="plan_id" class="block text-sm font-medium text-gray-700 mb-1">Plan</label>
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

                <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded-lg transition mt-3">
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