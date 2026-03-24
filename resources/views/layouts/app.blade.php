<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>{{ $title ?? config('app.name') }}</title>

         <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />


        @vite(['resources/css/app.css', 'resources/js/app.js'])

        @livewireStyles
        <style>
            [x-cloak] {
                display:none!important;
            }
              /* Animação personalizada para o coração pulsar suavemente */
        @keyframes heartbeat {
            0% { transform: scale(1); }
            14% { transform: scale(1.3); }
            28% { transform: scale(1); }
            42% { transform: scale(1.3); }
            70% { transform: scale(1); }
            100% { transform: scale(1); }
        }
        .animate-heartbeat {
            animation: heartbeat 1.5s infinite ease-in-out;
            display: inline-block; /* Garante que o transform funcione corretamente */
        }
        </style>
    </head>
    <body  class="bg-white">

        <div class="bg-blue-100 text-blue-900 py-2 px-4 text-center text-sm font-medium">
            <span>Promoção de verão</span>
        </div>

        <x-navbar />

           <!-- Conteúdo de exemplo para permitir o scroll -->
        <main class="max-w-7xl mx-auto px-4">
            {{ $slot }}
        </main>

         <!-- 3. Footer Básico -->
    <footer class="bg-white border-t border-gray-100 py-8 mt-auto">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex flex-col items-center justify-center space-y-2">
            <p class="text-gray-500 text-sm flex items-center">
                Feito com 
                <span class="inline-block mx-2 text-red-500 animate-heartbeat">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5 fill-current" viewBox="0 0 24 24">
                        <path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/>
                    </svg>
                </span>
                e dedicação
            </p>
            <p class="text-gray-400 text-xs">
                &copy; {{ now()->year }} JC. Todos os direitos reservados.
            </p>
        </div>
    </footer>
            @livewireScripts
        @fluxScripts
    </body>
</html>
