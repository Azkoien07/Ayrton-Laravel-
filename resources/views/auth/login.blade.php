<!DOCTYPE html> 
<html lang="es">
<head>
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión - Ayrton</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        .card-shadow {
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.15);
            border-radius: 12px;
        }

        .modal-content {
            max-height: 85vh;
            overflow-y: auto;
            width: 90%;
            max-width: 34rem;
            margin: 0 auto;
            padding: 2rem;
            border-radius: 10px;
            background-color: #F2E1C2;
        }

        @media (max-width: 640px) {
            .card-shadow {
                box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
            }

            .modal-content {
                max-height: 90vh;
                padding: 1.5rem;
            }
        }

        @media (max-width: 360px) {
            .modal-content {
                width: 92%;
                margin: 1rem auto;
            }
        }

        .animate-fade-in-down {
            animation: fadeInDown 0.7s ease-out forwards;
        }

        .animate-letter-bounce {
            display: inline-block;
            animation: bounce 1s infinite alternate;
        }

        .title-gradient {
            background: linear-gradient(45deg, #006D77, #C19A6B);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
        }

        .title-underline {
            height: 5px;
            width: 90px;
            background: linear-gradient(90deg, #006D77, #C19A6B);
            margin: 14px auto;
            border-radius: 3px;
        }

        @keyframes fadeInDown {
            from {
                opacity: 0;
                transform: translateY(-30px);
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
                transform: translateY(-6px);
            }
        }
    </style>
</head>

<body class="bg-gradient-to-br from-deepTeal to-stormyBlue text-desertMist">
    @include('notify::components.notify')

    <div class="min-h-screen flex flex-col items-center justify-center p-6">
        <div class="text-center mb-12 animate-fade-in-down">
            <h1 class="text-6xl font-extrabold text-sandDune mb-4">AYRTON</h1>
            <div class="title-underline"></div>
            <p class="text-lg text-sandDune mt-4 font-semibold">
                Organiza tus tareas
            </p>
        </div>

        <div class="bg-midnightBlue rounded-2xl card-shadow p-7 w-full max-w-lg transform transition-all duration-300 hover:scale-[1.02]">
            @if($errors->any())
            <div class="mb-5 p-4 bg-red-100 text-red-800 rounded-lg border border-red-300 text-sm">
                @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
                @endforeach
            </div>
            @endif

            <form action="{{ route('login') }}" method="POST" class="space-y-4">
                @csrf
                <div>
                    <label for="email" class="block text-sm font-medium text-desertMist mb-1">Correo Electrónico</label>
                    <input type="email" name="email" id="email" value="{{ old('email') }}"
                        class="w-full px-4 py-2 text-sm border border-sandDune rounded-lg focus:ring-2 focus:ring-deepTeal focus:border-transparent transition bg-stormyBlue text-desertMist"
                        placeholder="tu@email.com" required>
                </div>

                <div>
                    <label for="password" class="block text-sm font-medium text-desertMist mb-1">Contraseña</label>
                    <input type="password" name="password" id="password"
                        class="w-full px-4 py-2 text-sm border border-sandDune rounded-lg focus:ring-2 focus:ring-deepTeal focus:border-transparent transition bg-stormyBlue text-desertMist"
                        placeholder="••••••••" required>
                </div>

                <div class="flex items-center">
                    <input type="checkbox" name="remember" id="remember" class="h-4 w-4 text-deepTeal focus:ring-deepTeal border-sandDune rounded">
                    <label for="remember" class="ml-2 block text-sm text-desertMist">Recordar sesión</label>
                </div>

                <button type="submit" class="w-full bg-gradient-to-r from-deepTeal to-sandDune hover:from-midnightBlue hover:to-stormyBlue text-white font-medium py-3 px-5 rounded-lg transition-all shadow-lg hover:shadow-xl">
                    Iniciar Sesión
                </button>
            </form>
        </div>
    </div>
</body>
</html>