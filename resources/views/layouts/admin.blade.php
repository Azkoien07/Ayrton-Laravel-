<!DOCTYPE html>
<html lang="es">

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin')</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon copy.ico') }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body class="flex flex-col md:flex-row min-h-screen bg-light-background text-light-text dark:bg-dark-background dark:text-dark-text transition-all">
    @include('notify::components.notify')
    <!-- Header móvil -->
    <header class="w-full flex items-center justify-between p-4 md:hidden bg-light-primary text-white dark:bg-dark-primary">
        <button id="menu-toggle" class="p-2 focus:outline-none" aria-label="Abrir menú">☰</button>
        <h2 class="text-lg font-bold">Ayrton Admin</h2>
        <button id="theme-toggle" class="p-2 focus:outline-none" aria-label="Cambiar tema">
            🌙
        </button>
    </header>

    <!-- Overlay -->
    <div id="overlay" class="fixed inset-0 bg-black opacity-50 hidden md:hidden transition-opacity duration-300"></div>

    <!-- Sidebar -->
    <aside id="sidebar"
        class="fixed md:relative left-0 top-0 w-64 bg-light-primary text-white min-h-screen transform -translate-x-full md:translate-x-0 transition-all duration-300 ease-in-out shadow-lg dark:bg-dark-card">
        <nav class="p-4">
            <h2 class="text-xl font-bold mb-4">Admin Panel</h2>
            <ul class="space-y-2">
                <li>
                    <a href="{{ route('admin.index') }}"
                        class="flex items-center gap-2 py-2 px-4 rounded-md hover:bg-light-hover transition dark:hover:bg-dark-hover">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 3v18h18M7 10h10M7 14h6M7 6h14" />
                        </svg>
                        Dashboard
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.pqrs') }}"
                        class="flex items-center gap-2 py-2 px-4 rounded-md hover:bg-light-hover transition dark:hover:bg-dark-hover">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M16 12h4m-2-2v4m-6 2H5l-4 4m0 0v-4m0 4h4" />
                        </svg>
                        Control de PQRS
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.ranking') }}"
                        class="flex items-center gap-2 py-2 px-4 rounded-md hover:bg-light-hover transition dark:hover:bg-dark-hover">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 17l4-4m0 0l4 4m-4-4v12" />
                        </svg>
                        Ranking
                    </a>
                </li>
            </ul>

            <!-- Botón de logout -->
            <form action="{{ route('logout') }}" method="POST" class="mt-4">
                @csrf
                <button type="submit" class="w-full bg-light-primary hover:bg-dark-background text-white font-semibold py-2 px-4 rounded-lg shadow-md transition duration-300 ease-in-out flex items-center justify-center">
                    {{ __('sidebar.logout') }}
                </button>
            </form>
        </nav>
    </aside>


    <!-- Contenido principal -->
    <main class="flex-1 p-6">
        @yield('admin-content')
    </main>
    @notifyJs

    <script>
        const sidebar = document.getElementById('sidebar');
        const overlay = document.getElementById('overlay');
        const menuToggle = document.getElementById('menu-toggle');
        const themeToggle = document.getElementById('theme-toggle');
        const body = document.body;

        // Alternar Sidebar en móviles
        menuToggle.addEventListener('click', () => {
            sidebar.classList.toggle('-translate-x-full');
            overlay.classList.toggle('hidden');
        });

        overlay.addEventListener('click', () => {
            sidebar.classList.add('-translate-x-full');
            overlay.classList.add('hidden');
        });

        // Alternar tema claro/oscuro
        themeToggle.addEventListener('click', () => {
            body.classList.toggle('dark');
            localStorage.setItem('theme', body.classList.contains('dark') ? 'dark' : 'light');
        });

        // Cargar preferencia de tema guardada
        if (localStorage.getItem('theme') === 'dark') {
            body.classList.add('dark');
        }
    </script>
</body>

</html>