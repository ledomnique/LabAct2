<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

        <!-- Styles / Scripts -->
        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite(['resources/css/app.css', 'resources/js/app.js'])
        @endif
    </head>
    <body class="min-h-screen h-screen bg-gradient-to-br from-[#ffffff] via-[#ead7d7] to-[#412234] text-[#1b1b18] flex flex-col items-center py-5 px-6 lg:px-8 font-[Instrument Sans]" style="background-repeat: no-repeat;">

        <!-- Navigation -->
        <header class="w-full max-w-5xl flex justify-between items-center">
            <div class="flex items-center gap-3">
                <svg
                xmlns="http://www.w3.org/2000/svg"
                width="60"
                height="60"
                viewBox="0 0 24 24"
                fill="none"
                stroke="#ff3b30"
                stroke-width="1"
                stroke-linecap="round"
                stroke-linejoin="round"
                >
                <path d="M3 17l8 5l7 -4v-8l-4 -2.5l4 -2.5l4 2.5v4l-11 6.5l-4 -2.5v-7.5l-4 -2.5z" />
                <path d="M11 18v4" />
                <path d="M7 15.5l7 -4" />
                <path d="M14 7.5v4" />
                <path d="M14 11.5l4 2.5" />
                <path d="M11 13v-7.5l-4 -2.5l-4 2.5" />
                <path d="M7 8l4 -2.5" />
                <path d="M18 10l4 -2.5" />
                </svg>
                <h1 class="text-lg font-semibold tracking-tight">Laravel Activity</h1>
            </div>
            @if (Route::has('login'))
                <nav class="flex items-center gap-3">
                    @auth
                        <a href="{{ url('/dashboard') }}"
                           class="px-5 py-2 text-sm font-medium text-white bg-[#1b1b18] rounded-lg shadow hover:bg-[#33312e] transition">
                            Dashboard
                        </a>
                    @else
                        <a href="{{ route('login') }}"
                           class="px-5 py-2 text-sm font-medium border border-[#1b1b18]/30 rounded-lg hover:bg-[#1b1b18]/5 transition">
                            Log in
                        </a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}"
                               class="px-5 py-2 text-sm font-medium text-white bg-[#1b1b18] rounded-lg shadow hover:bg-[#33312e] transition">
                                Register
                            </a>
                        @endif
                    @endauth
                </nav>
            @endif
        </header>

        <!-- Hero Section -->
        <main class="flex flex-col items-center text-center space-y-6 mt-12 max-w-3xl">
            <div class="p-8 bg-white/70 backdrop-blur-sm rounded-2xl shadow-lg border border-[#1b1b18]/10">
                <h2 class="text-3xl lg:text-4xl font-bold tracking-tight mb-4">
                    Welcome to <span class="text-[#1b1b18]">Laravel</span>
                </h2>
                <p class="text-lg text-[#444] leading-relaxed">
                    Lewis Nilo's Lab Activity 2 & 3
                </p>
                <p class="text-[#555] mt-4">
                    This simple Laravel app demonstrates <span class="font-medium">user authentication</span>, 
                    <span class="font-medium">post management</span>, and <span class="font-medium">admin functionalities</span>.
                </p>
                <p class="mt-4 text-[#666]">
                    Please log in or register to explore the features.
                </p>
            </div>
        </main>
    </body>
</html>
