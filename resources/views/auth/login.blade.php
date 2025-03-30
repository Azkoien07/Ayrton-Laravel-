<!DOCTYPE html>
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
    <div class="min-h-screen flex flex-col items-center justify-center p-4">
    <div class="text-center mb-10 animate-fade-in-down">
            <h1 class="text-5xl font-extrabold title-gradient mb-3">Ayrton</h1>
            <div class="title-underline"></div>
            <p class="text-xl text-gray-600 mt-4 font-medium">
                <span class="inline-block animate-bounce" style="animation-delay: 0.1s">O</span>
                <span class="inline-block animate-bounce" style="animation-delay: 0.2s">r</span>
                <span class="inline-block animate-bounce" style="animation-delay: 0.3s">g</span>
                <span class="inline-block animate-bounce" style="animation-delay: 0.4s">a</span>
                <span class="inline-block animate-bounce" style="animation-delay: 0.5s">n</span>
                <span class="inline-block animate-bounce" style="animation-delay: 0.6s">i</span>
                <span class="inline-block animate-bounce" style="animation-delay: 0.7s">z</span>
                <span class="inline-block animate-bounce" style="animation-delay: 0.8s">a</span>
                <span> </span>
                <span class="inline-block animate-bounce" style="animation-delay: 0.9s">t</span>
                <span class="inline-block animate-bounce" style="animation-delay: 1.0s">u</span>
                <span class="inline-block animate-bounce" style="animation-delay: 1.1s">s</span>
                <span> </span>
                <span class="inline-block animate-bounce" style="animation-delay: 1.2s">t</span>
                <span class="inline-block animate-bounce" style="animation-delay: 1.3s">a</span>
                <span class="inline-block animate-bounce" style="animation-delay: 1.4s">r</span>
                <span class="inline-block animate-bounce" style="animation-delay: 1.5s">e</span>
                <span class="inline-block animate-bounce" style="animation-delay: 1.6s">a</span>
                <span class="inline-block animate-bounce" style="animation-delay: 1.7s">s</span>
            </p>
        </div>

        <!-- Card del formulario -->
        <div class="bg-white rounded-xl card-shadow p-6 w-full max-w-md">
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