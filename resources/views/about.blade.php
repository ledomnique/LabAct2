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
            
            @keyframes slideInLeft {
                from {
                    opacity: 0;
                    transform: translateX(-30px);
                }
                to {
                    opacity: 1;
                    transform: translateX(0);
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
            
            .slide-in-left {
                animation: slideInLeft 0.8s ease-out forwards;
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
                    
                    <div class="hidden md:flex items-center gap-2">
                        <a href="{{ url('/') }}" class="px-4 py-2 text-md font-semibold rounded-lg hover:bg-white/50 transition-all duration-300">
                            Home
                        </a>    
                        <a href="{{ url('/about') }}" class="px-4 py-2 text-md font-semibold rounded-lg hover:bg-white/50 transition-all duration-300">
                            About
                        </a>
                        <a href="{{ url('/guide') }}" class="px-4 py-2 text-md font-semibold bg-white/50 rounded-lg">
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

            <!-- Main Content -->
            <main class="flex-1 flex flex-col items-center justify-center px-4 mt-8">
                <div class="w-full max-w-5xl space-y-6 fade-in-up" style="animation-delay: 0.2s;">
                    
                    <!-- Header Section -->
                    <div class="text-center mb-8">
                        <div class="inline-flex items-center gap-2 px-4 py-2 bg-gradient-to-r from-[#ff3b30]/10 to-[#ff9500]/10 rounded-full mb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#ff3b30" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"></path>
                                <path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"></path>
                            </svg>
                            <span class="text-sm font-semibold text-[#ff3b30]">Documentation</span>
                        </div>
                        <h2 class="text-4xl lg:text-5xl font-bold tracking-tight mb-4">
                            Application <span class="bg-gradient-to-r from-[#ff3b30] to-[#ff9500] bg-clip-text text-transparent">Guide</span>
                        </h2>
                        <p class="text-lg text-[#555] max-w-2xl mx-auto">
                            Understanding Laravel's powerful features and authentication system
                        </p>
                    </div>

                    <!-- Main Content Card -->
                    <div class="glass-effect rounded-3xl p-10 shadow-2xl hero-glow">
                        <div class="space-y-6">
                            <!-- Introduction -->
                            <div class="slide-in-left" style="animation-delay: 0.3s;">
                                <h3 class="text-2xl font-bold mb-3 flex items-center gap-2">
                                    <div class="w-8 h-8 bg-gradient-to-br from-[#ff3b30] to-[#ff6b59] rounded-lg flex items-center justify-center">
                                        <span class="text-white text-sm font-bold">1</span>
                                    </div>
                                    Overview
                                </h3>
                                <p class="text-[#444] leading-relaxed pl-10">
                                    This application demonstrates my understanding of Laravel fundamentals and advanced features. It showcases form handling, database interactions, and sophisticated middleware implementation for user authentication and role-based access control.
                                </p>
                            </div>

                            <div class="h-px bg-gradient-to-r from-transparent via-[#1b1b18]/10 to-transparent"></div>

                            <!-- Core Features -->
                            <div class="slide-in-left" style="animation-delay: 0.4s;">
                                <h3 class="text-2xl font-bold mb-3 flex items-center gap-2">
                                    <div class="w-8 h-8 bg-gradient-to-br from-[#ff9500] to-[#ffb84d] rounded-lg flex items-center justify-center">
                                        <span class="text-white text-sm font-bold">2</span>
                                    </div>
                                    Key Features
                                </h3>
                                <p class="text-[#444] leading-relaxed pl-10 mb-4">
                                    The application utilizes middleware for role-based access to specific pages, form validation for secure database submissions, and comprehensive post management capabilities. To demonstrate these features, I've implemented a two-tier role system.
                                </p>
                            </div>

                            <div class="h-px bg-gradient-to-r from-transparent via-[#1b1b18]/10 to-transparent"></div>

                            <!-- Role System -->
                            <div class="slide-in-left" style="animation-delay: 0.5s;">
                                <h3 class="text-2xl font-bold mb-4 flex items-center gap-2">
                                    <div class="w-8 h-8 bg-gradient-to-br from-[#412234] to-[#6b3a52] rounded-lg flex items-center justify-center">
                                        <span class="text-white text-sm font-bold">3</span>
                                    </div>
                                    Role System
                                </h3>
                                
                                <div class="grid md:grid-cols-2 gap-4 pl-10">
                                    <!-- Admin Card -->
                                    <div class="bg-gradient-to-br from-[#ff3b30]/5 to-[#ff9500]/5 rounded-2xl p-6 border-2 border-[#ff3b30]/20">
                                        <div class="flex items-center gap-3 mb-3">
                                            <div class="w-10 h-10 bg-gradient-to-br from-[#ff3b30] to-[#ff6b59] rounded-xl flex items-center justify-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                    <path d="M12 2L2 7l10 5 10-5-10-5z"></path>
                                                    <path d="M2 17l10 5 10-5"></path>
                                                    <path d="M2 12l10 5 10-5"></path>
                                                </svg>
                                            </div>
                                            <h4 class="text-xl font-bold text-[#ff3b30]">Admin Role</h4>
                                        </div>
                                        <ul class="space-y-2 text-sm text-[#555]">
                                            <li class="flex items-start gap-2">
                                                <svg class="w-5 h-5 text-[#ff3b30] flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                                </svg>
                                                <span>Create and manage posts</span>
                                            </li>
                                            <li class="flex items-start gap-2">
                                                <svg class="w-5 h-5 text-[#ff3b30] flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                                </svg>
                                                <span>View all posts from all users</span>
                                            </li>
                                            <li class="flex items-start gap-2">
                                                <svg class="w-5 h-5 text-[#ff3b30] flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                                </svg>
                                                <span>Manage user accounts</span>
                                            </li>
                                            <li class="flex items-start gap-2">
                                                <svg class="w-5 h-5 text-[#ff3b30] flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                                </svg>
                                                <span>Comprehensive administrative controls</span>
                                            </li>
                                        </ul>
                                    </div>

                                    <!-- User Card -->
                                    <div class="bg-gradient-to-br from-[#412234]/5 to-[#6b3a52]/5 rounded-2xl p-6 border-2 border-[#412234]/20">
                                        <div class="flex items-center gap-3 mb-3">
                                            <div class="w-10 h-10 bg-gradient-to-br from-[#412234] to-[#6b3a52] rounded-xl flex items-center justify-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                    <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                                    <circle cx="12" cy="7" r="4"></circle>
                                                </svg>
                                            </div>
                                            <h4 class="text-xl font-bold text-[#412234]">User Role</h4>
                                        </div>
                                        <ul class="space-y-2 text-sm text-[#555]">
                                            <li class="flex items-start gap-2">
                                                <svg class="w-5 h-5 text-[#412234] flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                                </svg>
                                                <span>Create personal posts</span>
                                            </li>
                                            <li class="flex items-start gap-2">
                                                <svg class="w-5 h-5 text-[#412234] flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                                </svg>
                                                <span>View only their own posts</span>
                                            </li>
                                            <li class="flex items-start gap-2">
                                                <svg class="w-5 h-5 text-[#412234] flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                                </svg>
                                                <span>Edit and delete own content</span>
                                            </li>
                                            <li class="flex items-start gap-2">
                                                <svg class="w-5 h-5 text-[#412234] flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                                </svg>
                                                <span>Limited to personal workspace</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="h-px bg-gradient-to-r from-transparent via-[#1b1b18]/10 to-transparent"></div>

                            <!-- Access Control -->
                            <div class="slide-in-left" style="animation-delay: 0.6s;">
                                <h3 class="text-2xl font-bold mb-3 flex items-center gap-2">
                                    <div class="w-8 h-8 bg-gradient-to-br from-[#ff3b30] to-[#412234] rounded-lg flex items-center justify-center">
                                        <span class="text-white text-sm font-bold">4</span>
                                    </div>
                                    Access Control
                                </h3>
                                <p class="text-[#444] leading-relaxed pl-10">
                                    Regular users can only access and manage their own posts, maintaining privacy and data isolation. Administrators have a comprehensive view of all posts and user accounts, enabling effective platform management. This clear distinction in access levels ensures security and appropriate functionality based on user roles.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mt-8"></div>
            </main>
        </div>
    </body>
</html>