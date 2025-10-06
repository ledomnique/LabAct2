<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700" rel="stylesheet" />

        <!-- Styles / Scripts -->
        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite(['resources/css/app.css', 'resources/js/app.js'])
        @endif
        
        <style>
            @keyframes float {
                0%, 100% { transform: translateY(0px); }
                50% { transform: translateY(-20px); }
            }
            
            @keyframes gradient {
                0% { background-position: 0% 50%; }
                50% { background-position: 100% 50%; }
                100% { background-position: 0% 50%; }
            }
            
            @keyframes fadeInUp {
                from {
                    opacity: 0;
                    transform: translateY(30px);
                }
                to {
                    opacity: 1;
                    transform: translateY(0);
                }
            }
            
            .animate-float {
                animation: float 6s ease-in-out infinite;
            }
            
            .animate-gradient {
                background-size: 200% 200%;
                animation: gradient 15s ease infinite;
            }
            
            .fade-in-up {
                animation: fadeInUp 0.8s ease-out forwards;
            }
            
            .glass-effect {
                background: rgba(255, 255, 255, 0.85);
                backdrop-filter: blur(20px);
                border: 1px solid rgba(255, 255, 255, 0.5);
            }
            
            .hero-glow {
                box-shadow: 0 0 60px rgba(255, 59, 48, 0.15);
            }
        </style>
    </head>
    <body class="min-h-screen bg-gradient-to-br from-[#fef5f5] via-[#f5e6e8] to-[#412234] text-[#1b1b18] font-[Instrument Sans] animate-gradient overflow-x-hidden">

        <!-- Decorative Background Elements -->
        <div class="fixed inset-0 overflow-hidden pointer-events-none">
            <div class="absolute top-20 left-10 w-72 h-72 bg-[#ff3b30] rounded-full mix-blend-multiply filter blur-3xl opacity-10 animate-float"></div>
            <div class="absolute top-40 right-20 w-96 h-96 bg-[#ff9500] rounded-full mix-blend-multiply filter blur-3xl opacity-10 animate-float" style="animation-delay: 2s;"></div>
            <div class="absolute -bottom-32 left-1/3 w-96 h-96 bg-[#412234] rounded-full mix-blend-multiply filter blur-3xl opacity-10 animate-float" style="animation-delay: 4s;"></div>
        </div>

        <div class="relative z-10 flex flex-col min-h-screen py-6 px-6 lg:px-8">
            <!-- Navigation -->
            <header class="w-full max-w-7xl mx-auto fade-in-up">
                <nav class="flex justify-between items-center px-6 py-4 glass-effect rounded-2xl shadow-lg">
                    <div class="flex items-center gap-3">
                        <div class="p-2 bg-gradient-to-br from-[#ff3b30] to-[#ff6b59] rounded-xl shadow-md">
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                width="32"
                                height="32"
                                viewBox="0 0 24 24"
                                fill="none"
                                stroke="white"
                                stroke-width="1.5"
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
                        </div>
                        <h1 class="text-xl font-bold tracking-tight bg-gradient-to-r from-[#1b1b18] to-[#ff3b30] bg-clip-text text-transparent">
                            Laravel Activity
                        </h1>
                    </div>
                    
                    <div class="hidden md:flex items-center gap-12">
                        <a href="{{ url('/') }}" class="px-4 py-2 text-md font-semibold rounded-lg hover:bg-red/50 transition-all duration-300">
                            Home
                        </a>    
                        <a href="{{ url('/about') }}" class="px-4 py-2 text-md font-semibold rounded-lg hover:bg-red/50 transition-all duration-300">
                            About
                        </a>
                        <a href="{{ url('/guide') }}" class="px-4 py-2 text-md font-semibold rounded-lg hover:bg-red/50 transition-all duration-300">
                            Guide
                        </a>
                        <a href="{{ url('/developer') }}" class="px-4 py-2 text-md font-semibold rounded-lg hover:bg-white/50 transition-all duration-300">
                            Developer Info
                        </a>
                        <a href="{{ url('/audience') }}" class="px-4 py-2 text-md font-semibold rounded-lg hover:bg-white/50 transition-all duration-300">
                            Audience
                        </a>
                    </div>

                    @if (Route::has('login'))
                        <div class="flex items-center gap-3">
                            @auth
                                <a href="{{ url('/dashboard') }}"
                                   class="px-6 py-2.5 text-sm font-semibold text-white bg-gradient-to-r from-[#1b1b18] to-[#33312e] rounded-xl shadow-lg hover:shadow-xl hover:scale-105 transition-all duration-300">
                                    Dashboard
                                </a>
                            @else
                                <a href="{{ route('login') }}"
                                   class="px-5 py-2.5 text-sm font-medium border-2 border-[#1b1b18]/20 rounded-xl hover:bg-white/50 hover:border-[#1b1b18]/40 transition-all duration-300">
                                    Log in
                                </a>
                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}"
                                       class="px-6 py-2.5 text-sm font-semibold text-white bg-gradient-to-r from-[#ff3b30] to-[#ff6b59] rounded-xl shadow-lg hover:shadow-xl hover:scale-105 transition-all duration-300">
                                        Register
                                    </a>
                                @endif
                            @endauth
                        </div>
                    @endif
                </nav>
            </header>

            <!-- Hero Section -->
            <main class="flex-1 flex flex-col items-center justify-center text-center px-4 mt-7">
                <div class="w-full max-w-5xl space-y-8 fade-in-up" style="animation-delay: 0.2s;">
                    
                    <!-- Main Hero Card -->
                    <div class="glass-effect rounded-3xl p-12 shadow-2xl hero-glow">
                        <div class="inline-block px-4 py-2 bg-gradient-to-r from-[#ff3b30]/10 to-[#ff9500]/10 rounded-full mb-6">
                            <span class="text-sm font-semibold text-[#ff3b30]">Developer Information</span>
                        </div>
                        
                        <h2 class="text-5xl lg:text-6xl font-bold tracking-tight mb-6 leading-tight">
                            Lewis Dominique
                            <span class="bg-gradient-to-r from-[#ff3b30] to-[#ff9500] bg-clip-text text-transparent">
                                Nilo
                            </span>
                        </h2>
                        
                        <p class="text-xl lg:text-2xl font-medium text-[#412234] mb-8">
                            Laravel Lab Activities 2 & 3
                        </p>
                        
                        <p class="text-lg text-[#555] leading-relaxed max-w-2xl mx-auto mb-6">
                            A dedicated and passionate developer with a keen interest in web technologies and frameworks. This project showcases my understanding in Laravel, demonstrating my ability to create role-based access using middleware and proper forms and form handling. I am committed to continuous learning and improvement, always striving to deliver high-quality code and innovative solutions.
                        </p>
                        <a href="{{ url('/about') }}" class="inline-block px-8 py-3 text-lg font-semibold text-white bg-gradient-to-r from-[#ff3b30] to-[#ff6b59] rounded-xl shadow-lg hover:shadow-xl hover:scale-105 transition-all duration-300">
                            Learn More About the Project
                        </a>
                    </div>
                </div>
            </main>
        </div>
    </body>
</html>