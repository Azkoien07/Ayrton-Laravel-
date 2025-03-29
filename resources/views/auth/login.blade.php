<!-- resources/views/auth/login.blade.php -->

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión - Ayrton</title>
    <!-- Agrega el CDN de Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Estilos personalizados -->
    <style>
        .card-shadow {
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>

<body class="bg-gray-50">
    <!-- Contenedor principal -->
    <div class="min-h-screen flex items-center justify-center p-4">
        <div class="bg-white rounded-lg card-shadow p-8 w-full max-w-md">
            <!-- Logo o nombre de la aplicación -->
            <div class="text-center mb-8">
                <h1 class="text-3xl font-bold text-gray-800 mb-2">Ayrton</h1>
                <p class="text-gray-600">Organiza tus tareas de manera eficiente</p>
            </div>

            <!-- Formulario de login -->
            <form action="{{ route('login') }}" method="POST" class="space-y-6">
                @csrf <!-- Token de seguridad -->

                <!-- Campo: Correo electrónico -->
                <div>
                    <label for="email" class="block text-gray-700 font-medium mb-2">Correo Electrónico</label>
                    <input type="email" name="email" id="email" class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200" placeholder="email" required pattern="^[a-zA-Z0-9._%+-]+@(gmail\.com|gmail\.com\.co|outlook\.com|yahoo\.com)$" title="ingresa un correo valido">
                </div>

                <!-- Campo: Contraseña -->
                <div>
                    <label for="password" class="block text-gray-700 font-medium mb-2">Contraseña</label>
                    <input type="password" name="password" id="password" class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200" placeholder="••••••••" required minlength="8" max="15"  pattern="^(?=.*[!@#$%^&*(),.?\:{}|<>]).{8,15}$" title="La contraseña debe de contar con al menos un caracter especial"  >
                </div>

                <div>
                    <button type="submit" class="w-full bg-gray-800 hover:bg-gray-900 text-white font-semibold py-2 px-4 rounded-lg transition duration-200">
                        Iniciar Sesión
                    </button>
                </div>

                <div class="text-center">
                    <p class="text-gray-600">¿No tienes una cuenta?
                        <button onclick="openModal()" class="text-blue-500 hover:text-blue-600 font-medium focus:outline-none">
                            Regístrate
                        </button>
                    </p>
                </div>
            </form>
        </div>
    </div>

    <!-- Modal de registro -->
    <div id="registerModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden">
        <div class="bg-white rounded-lg card-shadow p-8 w-full max-w-md relative">
            <!-- Botón para cerrar el modal -->
            <button onclick="closeModal()" class="absolute top-4 right-4 text-gray-500 hover:text-gray-700 focus:outline-none">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>

            <!-- Título del modal -->
            <h2 class="text-2xl font-bold text-gray-800 mb-6">Regístrate</h2>

            <!-- Formulario de registro -->
            <form action="{{ route('register') }}" method="POST" class="space-y-6">
                @csrf
                <div>
                    <label for="name" class="block text-gray-700 font-medium mb-2">Nombre</label>
                    <input type="text" name="name" id="name" class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200" placeholder="Tu nombre" required>
                </div>

                <div>
                    <label for="email" class="block text-gray-700 font-medium mb-2">Correo Electrónico</label>
                    <input type="email" name="email" id="email" class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200" placeholder="tu@email.com" required>
                </div>

                <div>
                    <label for="password" class="block text-gray-700 font-medium mb-2">Contraseña</label>
                    <input type="password" name="password" id="password" class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200" placeholder="••••••••" required>
                </div>

                <div>
                    <label for="password_confirmation" class="block text-gray-700 font-medium mb-2">Confirmar Contraseña</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200" placeholder="••••••••" required>
                </div>
                <div>
                    <label for="username" class="block text-gray-700 font-medium mb-2">Nombre De Usuario</label>
                    <input type="text" name="username" id="username" class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200" placeholder="Tu nombre" required>
                </div>

                <div>
                    <label for="role_id" class="block text-gray-700 font-medium mb-2">Rol</label>
                    <select name="role_id" id="role_id" required
                        class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200 bg-white">
                        <option value="1">Administrador</option>
                        <option value="2">Usuario</option>
                    </select>
                </div>

                <div>
                    <label for="plan_id" class="block text-gray-700 font-medium mb-2">Plan</label>
                    <select name="plan_id" id="plan_id" required
                        class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200 bg-white">
                        <option value="1">Básico</option>
                        <option value="2">Premium</option>
                        <option value="3">Empresarial</option>
                    </select>
                </div>

                <div>
                    <button type="submit" class="w-full bg-gray-800 hover:bg-gray-900 text-white font-semibold py-2 px-4 rounded-lg transition duration-500">
                        Registrarse
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Script para manejar el modal -->
    <script>
        // Función para abrir el modal
        function openModal() {
            document.getElementById('registerModal').classList.remove('hidden');
        }

        // Función para cerrar el modal
        function closeModal() {
            document.getElementById('registerModal').classList.add('hidden');
        }

        // Cerrar el modal al hacer clic fuera del contenido
        document.getElementById('registerModal').addEventListener('click', function(event) {
            if (event.target === this) {
                closeModal();
            }
        });
    </script>
</body>

</html>