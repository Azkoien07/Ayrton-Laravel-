<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', __('sidebar.title'))</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon copy.ico') }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="flex min-h-screen bg-light-background text-light-text dark:bg-dark-background dark:text-dark-text">
    @include('notify::components.notify')
    
    <button id="menuToggle" class="md:hidden fixed top-4 left-4 bg-light-primary text-white p-2 rounded z-50">
        &#9776;
    </button>
    
    <button id="themeToggle" class="fixed top-4 right-4 bg-light-primary text-white p-2 rounded z-50">
        🌙
    </button>
    
    <div id="sidebarOverlay" class="fixed inset-0 bg-black opacity-0 pointer-events-none md:hidden transition-opacity duration-300 ease-in-out z-30"></div>

    <aside id="sidebar" class="fixed md:relative transform -translate-x-full md:translate-x-0 w-64 bg-light-card dark:bg-dark-card font-sans shadow-md p-6 space-y-4 z-40 transition-transform duration-300 ease-in-out min-h-screen">
        <a href="{{ route('tasks.index') }}" class="text-3xl font-bold text-light-text dark:text-dark-text hover:text-light-hover transition duration-200 ease-in-out block text-center mb-8">
            {{ __('sidebar.title') }}
        </a>
        
        <nav class="space-y-2">
            <a href="{{ route('tasks.index') }}" class="block text-light-text dark:text-dark-text hover:bg-light-primary hover:text-white px-4 py-2 rounded transition duration-200 ease-in-out flex items-center">
                {{ __('sidebar.tasks') }}
            </a>
            <a href="{{ route('plans') }}" class="block text-light-text dark:text-dark-text hover:bg-light-primary hover:text-white px-4 py-2 rounded transition duration-200 ease-in-out flex items-center">
                {{ __('sidebar.plans') }}
            </a>
            <a href="{{ route('challenge.index') }}" class="block text-light-text dark:text-dark-text hover:bg-light-primary hover:text-white px-4 py-2 rounded transition duration-200 ease-in-out flex items-center">
                {{ __('sidebar.challenges') }}
            </a>
            <a href="{{ route('settings') }}" class="block text-light-text dark:text-dark-text hover:bg-light-primary hover:text-white px-4 py-2 rounded transition duration-200 ease-in-out flex items-center">
                {{ __('sidebar.settings') }}
            </a>
            <a href="{{ route('pqrs.pqrs') }}" class="block text-light-text dark:text-dark-text hover:bg-light-primary hover:text-white px-4 py-2 rounded transition duration-200 ease-in-out flex items-center">
                {{ __('sidebar.pqrs') }}
            </a>
            <form action="{{ route('logout') }}" method="POST" class="mt-4">
                @csrf
                <button type="submit" class="w-full bg-light-primary hover:bg-dark-background text-white font-semibold py-2 px-4 rounded-lg shadow-md transition duration-300 ease-in-out flex items-center justify-center">
                    {{ __('sidebar.logout') }}
                </button>
            </form>
        </nav>
    </aside>
    
    <div class="flex-grow flex flex-col w-full md:ml-56-ml-4">
        <main class="flex-grow px-4 pb-8 pt-16 md:pt-4 w-full max-w-full ml-2">
            @yield('content')
        </main>
    </div>
    @notifyJs
    
    <script>
        document.getElementById('menuToggle').addEventListener('click', function () {
            document.getElementById('sidebar').classList.toggle('-translate-x-full');
            document.getElementById('sidebarOverlay').classList.toggle('opacity-50');
            document.getElementById('sidebarOverlay').classList.toggle('pointer-events-none');
        });

        document.getElementById('sidebarOverlay').addEventListener('click', function () {
            document.getElementById('sidebar').classList.add('-translate-x-full');
            this.classList.add('opacity-0', 'pointer-events-none');
        });

        // Dark Mode Toggle
        const themeToggle = document.getElementById('themeToggle');
        function applyTheme(theme) {
            if (theme === 'dark') {
                document.documentElement.classList.add('dark');
                localStorage.setItem('theme', 'dark');
                themeToggle.textContent = '☀️';
            } else {
                document.documentElement.classList.remove('dark');
                localStorage.setItem('theme', 'light');
                themeToggle.textContent = '🌙';
            }
        }
        
        themeToggle.addEventListener('click', () => {
            const currentTheme = localStorage.getItem('theme') === 'dark' ? 'light' : 'dark';
            applyTheme(currentTheme);
        });
        
        document.addEventListener('DOMContentLoaded', () => {
            applyTheme(localStorage.getItem('theme') || 'light');
        });
    </script>
</body>
</html>
