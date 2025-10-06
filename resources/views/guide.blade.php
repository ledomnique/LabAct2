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
            
            @keyframes scaleIn {
                from {
                    opacity: 0;
                    transform: scale(0.95);
                }
                to {
                    opacity: 1;
                    transform: scale(1);
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
            
            .scale-in {
                animation: scaleIn 0.8s ease-out forwards;
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
                        <a href="{{ url('/about') }}" class="px-4 py-2 text-md font-semibold bg-white/50 rounded-lg">
                            About
                        </a>
                        <a href="{{ url('/guide') }}" class="px-4 py-2 text-md font-semibold rounded-lg hover:bg-white/50 transition-all duration-300">
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
                <div class="w-full max-w-4xl space-y-6 fade-in-up" style="animation-delay: 0.2s;">
                    
                    <!-- Header Section -->
                    <div class="text-center mb-8">
                        <div class="inline-flex items-center gap-2 px-4 py-2 bg-gradient-to-r from-[#ff3b30]/10 to-[#ff9500]/10 rounded-full mb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#ff3b30" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <circle cx="12" cy="12" r="10"></circle>
                                <line x1="12" y1="16" x2="12" y2="12"></line>
                                <line x1="12" y1="8" x2="12.01" y2="8"></line>
                            </svg>
                            <span class="text-sm font-semibold text-[#ff3b30]">About This Project</span>
                        </div>
                        <h2 class="text-4xl lg:text-5xl font-bold tracking-tight mb-4">
                            Application <span class="bg-gradient-to-r from-[#ff3b30] to-[#ff9500] bg-clip-text text-transparent">Overview</span>
                        </h2>
                        <p class="text-lg text-[#555] max-w-2xl mx-auto">
                            A comprehensive demonstration of Laravel's capabilities
                        </p>
                    </div>

                    <!-- Main Content Card -->
                    <div class="glass-effect rounded-3xl p-10 shadow-2xl hero-glow scale-in" style="animation-delay: 0.3s;">
                        <div class="space-y-8">
                            <!-- Introduction -->
                            <div>
                                <div class="flex items-start gap-4 mb-6">
                                    <div class="w-12 h-12 bg-gradient-to-br from-[#ff3b30] to-[#ff6b59] rounded-2xl flex items-center justify-center flex-shrink-0">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"></path>
                                            <path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"></path>
                                        </svg>
                                    </div>
                                    <div>
                                        <h3 class="text-2xl font-bold mb-3">Project Purpose</h3>
                                        <p class="text-lg text-[#444] leading-relaxed">
                                            This application showcases my understanding of Laravel fundamentals and its powerful form handling features, along with sophisticated middleware implementation for user authentication and admin functionalities.
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <div class="h-px bg-gradient-to-r from-transparent via-[#1b1b18]/10 to-transparent"></div>

                            <!-- Core Functionality -->
                            <div>
                                <div class="flex items-start gap-4 mb-6">
                                    <div class="w-12 h-12 bg-gradient-to-br from-[#ff9500] to-[#ffb84d] rounded-2xl flex items-center justify-center flex-shrink-0">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <polyline points="16 18 22 12 16 6"></polyline>
                                            <polyline points="8 6 2 12 8 18"></polyline>
                                        </svg>
                                    </div>
                                    <div>
                                        <h3 class="text-2xl font-bold mb-3">Technical Features</h3>
                                        <p class="text-lg text-[#444] leading-relaxed mb-4">
                                            The Laravel application demonstrates advanced middleware usage for role-based access control, secure form handling for database submissions, and comprehensive post management capabilities.
                                        </p>
                                        <p class="text-[#555] leading-relaxed">
                                            To effectively showcase these features, I've implemented a dual-role system with distinct permissions and access levels for each user type.
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <div class="h-px bg-gradient-to-r from-transparent via-[#1b1b18]/10 to-transparent"></div>

                            <!-- Role System Overview -->
                            <div>
                                <div class="flex items-start gap-4 mb-6">
                                    <div class="w-12 h-12 bg-gradient-to-br from-[#412234] to-[#6b3a52] rounded-2xl flex items-center justify-center flex-shrink-0">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"></path>
                                            <circle cx="9" cy="7" r="4"></circle>
                                            <path d="M22 21v-2a4 4 0 0 0-3-3.87"></path>
                                            <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                                        </svg>
                                    </div>
                                    <div class="flex-1">
                                        <h3 class="text-2xl font-bold mb-4">Two-Tier Role System</h3>
                                        <p class="text-lg text-[#444] leading-relaxed mb-6">
                                            The system features two distinct user roles: <span class="font-semibold text-[#ff3b30]">Admin</span> and <span class="font-semibold text-[#412234]">User</span>. Both roles can create posts, but administrators have elevated privileges for managing all content and user accounts.
                                        </p>

                                        <!-- Role Comparison -->
                                        <div class="grid md:grid-cols-2 gap-4">
                                            <!-- Admin Summary -->
                                            <div class="bg-gradient-to-br from-[#ff3b30]/10 to-[#ff9500]/10 rounded-xl p-5 border border-[#ff3b30]/20">
                                                <div class="flex items-center gap-3 mb-3">
                                                    <div class="w-8 h-8 bg-gradient-to-br from-[#ff3b30] to-[#ff6b59] rounded-lg flex items-center justify-center">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                            <path d="M12 2L2 7l10 5 10-5-10-5z"></path>
                                                            <path d="M2 17l10 5 10-5"></path>
                                                            <path d="M2 12l10 5 10-5"></path>
                                                        </svg>
                                                    </div>
                                                    <h4 class="font-bold text-[#ff3b30]">Admin</h4>
                                                </div>
                                                <p class="text-sm text-[#555]">Full platform control with comprehensive management capabilities</p>
                                            </div>

                                            <!-- User Summary -->
                                            <div class="bg-gradient-to-br from-[#412234]/10 to-[#6b3a52]/10 rounded-xl p-5 border border-[#412234]/20">
                                                <div class="flex items-center gap-3 mb-3">
                                                    <div class="w-8 h-8 bg-gradient-to-br from-[#412234] to-[#6b3a52] rounded-lg flex items-center justify-center">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                                            <circle cx="12" cy="7" r="4"></circle>
                                                        </svg>
                                                    </div>
                                                    <h4 class="font-bold text-[#412234]">User</h4>
                                                </div>
                                                <p class="text-sm text-[#555]">Personal content creation with individual workspace access</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="h-px bg-gradient-to-r from-transparent via-[#1b1b18]/10 to-transparent"></div>

                            <!-- Security & Access Control -->
                            <div>
                                <div class="flex items-start gap-4">
                                    <div class="w-12 h-12 bg-gradient-to-br from-[#1b1b18] to-[#33312e] rounded-2xl flex items-center justify-center flex-shrink-0">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect>
                                            <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
                                        </svg>
                                    </div>
                                    <div>
                                        <h3 class="text-2xl font-bold mb-3">Access Control & Security</h3>
                                        <p class="text-lg text-[#444] leading-relaxed mb-4">
                                            Regular users maintain complete privacy with access limited to their own posts, ensuring data isolation and personal workspace security.
                                        </p>
                                        <p class="text-[#555] leading-relaxed">
                                            Administrators possess a comprehensive view of all posts and user accounts, enabling effective platform oversight and management. This clear separation of permissions ensures appropriate functionality and security based on assigned user roles.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Stats Cards -->
                    <div class="grid md:grid-cols-3 gap-4 mt-8">
                        <div class="glass-effect rounded-2xl p-6 text-center scale-in" style="animation-delay: 0.4s;">
                            <div class="w-12 h-12 bg-gradient-to-br from-[#ff3b30] to-[#ff6b59] rounded-xl flex items-center justify-center mx-auto mb-3">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M12 2L2 7l10 5 10-5-10-5z"></path>
                                    <path d="M2 17l10 5 10-5"></path>
                                    <path d="M2 12l10 5 10-5"></path>
                                </svg>
                            </div>
                            <h4 class="font-bold text-xl mb-1">Middleware</h4>
                            <p class="text-sm text-[#666]">Role-based access control</p>
                        </div>

                        <div class="glass-effect rounded-2xl p-6 text-center scale-in" style="animation-delay: 0.5s;">
                            <div class="w-12 h-12 bg-gradient-to-br from-[#ff9500] to-[#ffb84d] rounded-xl flex items-center justify-center mx-auto mb-3">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                                    <polyline points="14 2 14 8 20 8"></polyline>
                                </svg>
                            </div>
                            <h4 class="font-bold text-xl mb-1">Forms</h4>
                            <p class="text-sm text-[#666]">Secure data validation</p>
                        </div>

                        <div class="glass-effect rounded-2xl p-6 text-center scale-in" style="animation-delay: 0.6s;">
                            <div class="w-12 h-12 bg-gradient-to-br from-[#412234] to-[#6b3a52] rounded-xl flex items-center justify-center mx-auto mb-3">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path>
                                    <polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline>
                                    <line x1="12" y1="22.08" x2="12" y2="12"></line>
                                </svg>
                            </div>
                            <h4 class="font-bold text-xl mb-1">Database</h4>
                            <p class="text-sm text-[#666]">Eloquent ORM integration</p>
                        </div>
                    </div>

                    
                </div>
            </main>

            <footer class="mt-10"></footer>
        </div>
    </body>
</html>