<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Configuración - Ayrton</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 text-gray-900 font-sans">
    <div class="min-h-screen flex flex-col">

        <!-- Barra de Navegación -->
        <nav class="bg-white shadow-md p-4">
            <div class="container mx-auto flex justify-between items-center">
                <h1 class="text-xl font-semibold">Ayrton</h1>
                <div class="flex space-x-4">
                    <a href="{{ route('tasks.index') }}" class="text-gray-700 hover:text-blue-500">Inicio</a>
                </div>
            </div>
        </nav>

        <div class="flex-1 container mx-auto p-6">

            <h2 class="text-2xl font-bold mb-8">Configuración</h2>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">

                <!-- Sección 1: Perfil -->
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <h3 class="text-xl font-semibold mb-4">Perfil</h3>
                    <form>
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700">Nombre</label>
                            <input type="text" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500" placeholder="Tu nombre">
                        </div>
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700">Correo Electrónico</label>
                            <input type="email" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500" placeholder="tucorreo@example.com">
                        </div>
                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">Guardar Cambios</button>
                    </form>
                </div>

                <!-- Sección 2: Preferencias -->
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <h3 class="text-xl font-semibold mb-4">Preferencias</h3>
                    <form>
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700">Tema</label>
                            <select class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                                <option value="light">Claro</option>
                                <option value="dark">Oscuro</option>
                            </select>
                        </div>
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700">Idioma</label>
                            <select class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                                <option value="es">Español</option>
                                <option value="en">Inglés</option>
                            </select>
                        </div>
                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">Guardar Preferencias</button>
                    </form>
                </div>

                <!-- Sección 3: Notificaciones -->
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <h3 class="text-xl font-semibold mb-4">Notificaciones</h3>
                    <form>
                        <div class="mb-4">
                            <label class="flex items-center">
                                <input type="checkbox" class="form-checkbox h-4 w-4 text-blue-500">
                                <span class="ml-2 text-sm text-gray-700">Recibir notificaciones por correo</span>
                            </label>
                        </div>
                        <div class="mb-4">
                            <label class="flex items-center">
                                <input type="checkbox" class="form-checkbox h-4 w-4 text-blue-500">
                                <span class="ml-2 text-sm text-gray-700">Recibir notificaciones push</span>
                            </label>
                        </div>
                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">Guardar Configuración</button>
                    </form>
                </div>

                <!-- Sección 4: Seguridad -->
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <h3 class="text-xl font-semibold mb-4">Seguridad</h3>
                    <form>
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700">Cambiar Contraseña</label>
                            <input type="password" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500" placeholder="Nueva contraseña">
                        </div>
                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">Cambiar Contraseña</button>
                    </form>
                </div>

            </div>
        </div>

        <!-- Pie de página -->
        <footer class="bg-blue-600 text-white p-4 mt-8">
            <div class="container mx-auto text-center">
                <p>&copy; {{ date('Y') }} Ayrton. Todos los derechos reservados.</p>
            </div>
        </footer>

    </div>

</body>

</html>