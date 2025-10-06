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
            
            @keyframes slideInRight {
                from {
                    opacity: 0;
                    transform: translateX(30px);
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
            
            .slide-in-right {
                animation: slideInRight 0.8s ease-out forwards;
            }
            
            .glass-effect {
                background: rgba(255, 255, 255, 0.85);
                backdrop-filter: blur(20px);
                border: 1px solid rgba(255, 255, 255, 0.5);
            }
            
            .hero-glow {
                box-shadow: 0 0 60px rgba(255, 59, 48, 0.15);
            }

            .feature-card:hover {
                transform: translateY(-5px);
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
                <div class="w-full max-w-6xl space-y-8 fade-in-up" style="animation-delay: 0.2s;">
                    
                    <!-- Header Section -->
                    <div class="text-center mb-8">
                        <div class="inline-flex items-center gap-2 px-4 py-2 bg-gradient-to-r from-[#ff3b30]/10 to-[#ff9500]/10 rounded-full mb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#ff3b30" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                <circle cx="9" cy="7" r="4"></circle>
                                <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                                <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                            </svg>
                            <span class="text-sm font-semibold text-[#ff3b30]">For Users</span>
                        </div>
                        <h2 class="text-4xl lg:text-5xl font-bold tracking-tight mb-4">
                            What You Can <span class="bg-gradient-to-r from-[#ff3b30] to-[#ff9500] bg-clip-text text-transparent">Achieve</span>
                        </h2>
                        <p class="text-lg text-[#555] max-w-2xl mx-auto">
                            Discover the powerful features available to you based on your role
                        </p>
                    </div>

                    <!-- Role Selection Cards -->
                    <div class="grid md:grid-cols-2 gap-6 mb-12">
                        <!-- Regular User Card -->
                        <div class="glass-effect rounded-3xl p-8 shadow-2xl hero-glow slide-in-right" style="animation-delay: 0.3s;">
                            <div class="flex items-center gap-4 mb-6">
                                <div class="w-16 h-16 bg-gradient-to-br from-[#412234] to-[#6b3a52] rounded-2xl flex items-center justify-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                        <circle cx="12" cy="7" r="4"></circle>
                                    </svg>
                                </div>
                                <div>
                                    <h3 class="text-2xl font-bold text-[#412234]">Regular User</h3>
                                    <p class="text-sm text-[#666]">Personal content management</p>
                                </div>
                            </div>

                            <div class="h-px bg-gradient-to-r from-transparent via-[#412234]/20 to-transparent mb-6"></div>

                            <h4 class="font-bold text-lg mb-4">Your Capabilities:</h4>
                            <div class="space-y-3">
                                <div class="flex items-start gap-3 p-3 bg-[#412234]/5 rounded-xl">
                                    <div class="w-6 h-6 bg-[#412234] rounded-lg flex items-center justify-center flex-shrink-0 mt-0.5">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="3" stroke-linecap="round" stroke-linejoin="round">
                                            <polyline points="20 6 9 17 4 12"></polyline>
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="font-semibold text-[#1b1b18]">Create Posts</p>
                                        <p class="text-sm text-[#666]">Write and publish your own content with rich text formatting</p>
                                    </div>
                                </div>

                                <div class="flex items-start gap-3 p-3 bg-[#412234]/5 rounded-xl">
                                    <div class="w-6 h-6 bg-[#412234] rounded-lg flex items-center justify-center flex-shrink-0 mt-0.5">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="3" stroke-linecap="round" stroke-linejoin="round">
                                            <polyline points="20 6 9 17 4 12"></polyline>
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="font-semibold text-[#1b1b18]">Edit Your Content</p>
                                        <p class="text-sm text-[#666]">Modify and update your posts anytime you need</p>
                                    </div>
                                </div>

                                <div class="flex items-start gap-3 p-3 bg-[#412234]/5 rounded-xl">
                                    <div class="w-6 h-6 bg-[#412234] rounded-lg flex items-center justify-center flex-shrink-0 mt-0.5">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="3" stroke-linecap="round" stroke-linejoin="round">
                                            <polyline points="20 6 9 17 4 12"></polyline>
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="font-semibold text-[#1b1b18]">Delete Posts</p>
                                        <p class="text-sm text-[#666]">Remove your content permanently when needed</p>
                                    </div>
                                </div>

                                <div class="flex items-start gap-3 p-3 bg-[#412234]/5 rounded-xl">
                                    <div class="w-6 h-6 bg-[#412234] rounded-lg flex items-center justify-center flex-shrink-0 mt-0.5">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="3" stroke-linecap="round" stroke-linejoin="round">
                                            <polyline points="20 6 9 17 4 12"></polyline>
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="font-semibold text-[#1b1b18]">View Your Dashboard</p>
                                        <p class="text-sm text-[#666]">Access your personal workspace with all your posts</p>
                                    </div>
                                </div>

                                <div class="flex items-start gap-3 p-3 bg-[#412234]/5 rounded-xl">
                                    <div class="w-6 h-6 bg-[#412234] rounded-lg flex items-center justify-center flex-shrink-0 mt-0.5">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="3" stroke-linecap="round" stroke-linejoin="round">
                                            <polyline points="20 6 9 17 4 12"></polyline>
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="font-semibold text-[#1b1b18]">Manage Profile</p>
                                        <p class="text-sm text-[#666]">Update your account information and preferences</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Admin Card -->
                        <div class="glass-effect rounded-3xl p-8 shadow-2xl hero-glow slide-in-right" style="animation-delay: 0.4s;">
                            <div class="flex items-center gap-4 mb-6">
                                <div class="w-16 h-16 bg-gradient-to-br from-[#ff3b30] to-[#ff6b59] rounded-2xl flex items-center justify-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M12 2L2 7l10 5 10-5-10-5z"></path>
                                        <path d="M2 17l10 5 10-5"></path>
                                        <path d="M2 12l10 5 10-5"></path>
                                    </svg>
                                </div>
                                <div>
                                    <h3 class="text-2xl font-bold text-[#ff3b30]">Administrator</h3>
                                    <p class="text-sm text-[#666]">Full platform control</p>
                                </div>
                            </div>

                            <div class="h-px bg-gradient-to-r from-transparent via-[#ff3b30]/20 to-transparent mb-6"></div>

                            <h4 class="font-bold text-lg mb-4">Enhanced Privileges:</h4>
                            <div class="space-y-3">
                                <div class="flex items-start gap-3 p-3 bg-[#ff3b30]/5 rounded-xl">
                                    <div class="w-6 h-6 bg-gradient-to-br from-[#ff3b30] to-[#ff6b59] rounded-lg flex items-center justify-center flex-shrink-0 mt-0.5">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="3" stroke-linecap="round" stroke-linejoin="round">
                                            <polyline points="20 6 9 17 4 12"></polyline>
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="font-semibold text-[#1b1b18]">All User Capabilities</p>
                                        <p class="text-sm text-[#666]">Everything regular users can do, plus admin features</p>
                                    </div>
                                </div>

                                <div class="flex items-start gap-3 p-3 bg-[#ff3b30]/5 rounded-xl">
                                    <div class="w-6 h-6 bg-gradient-to-br from-[#ff3b30] to-[#ff6b59] rounded-lg flex items-center justify-center flex-shrink-0 mt-0.5">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="3" stroke-linecap="round" stroke-linejoin="round">
                                            <polyline points="20 6 9 17 4 12"></polyline>
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="font-semibold text-[#1b1b18]">View All Posts</p>
                                        <p class="text-sm text-[#666]">Access and monitor every post from all users on the platform</p>
                                    </div>
                                </div>

                                <div class="flex items-start gap-3 p-3 bg-[#ff3b30]/5 rounded-xl">
                                    <div class="w-6 h-6 bg-gradient-to-br from-[#ff3b30] to-[#ff6b59] rounded-lg flex items-center justify-center flex-shrink-0 mt-0.5">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="3" stroke-linecap="round" stroke-linejoin="round">
                                            <polyline points="20 6 9 17 4 12"></polyline>
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="font-semibold text-[#1b1b18]">Manage All Content</p>
                                        <p class="text-sm text-[#666]">Edit or delete any post regardless of who created it</p>
                                    </div>
                                </div>

                                <div class="flex items-start gap-3 p-3 bg-[#ff3b30]/5 rounded-xl">
                                    <div class="w-6 h-6 bg-gradient-to-br from-[#ff3b30] to-[#ff6b59] rounded-lg flex items-center justify-center flex-shrink-0 mt-0.5">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="3" stroke-linecap="round" stroke-linejoin="round">
                                            <polyline points="20 6 9 17 4 12"></polyline>
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="font-semibold text-[#1b1b18]">User Management</p>
                                        <p class="text-sm text-[#666]">View, edit, and manage all user accounts and permissions</p>
                                    </div>
                                </div>

                                <div class="flex items-start gap-3 p-3 bg-[#ff3b30]/5 rounded-xl">
                                    <div class="w-6 h-6 bg-gradient-to-br from-[#ff3b30] to-[#ff6b59] rounded-lg flex items-center justify-center flex-shrink-0 mt-0.5">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="3" stroke-linecap="round" stroke-linejoin="round">
                                            <polyline points="20 6 9 17 4 12"></polyline>
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="font-semibold text-[#1b1b18]">Admin Dashboard</p>
                                        <p class="text-sm text-[#666]">Access comprehensive analytics and platform overview</p>
                                    </div>
                                </div>

                                <div class="flex items-start gap-3 p-3 bg-[#ff3b30]/5 rounded-xl">
                                    <div class="w-6 h-6 bg-gradient-to-br from-[#ff3b30] to-[#ff6b59] rounded-lg flex items-center justify-center flex-shrink-0 mt-0.5">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="3" stroke-linecap="round" stroke-linejoin="round">
                                            <polyline points="20 6 9 17 4 12"></polyline>
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="font-semibold text-[#1b1b18]">Platform Settings</p>
                                        <p class="text-sm text-[#666]">Configure system-wide settings and preferences</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Common Features Section -->
                    <div class="glass-effect rounded-3xl p-8 shadow-2xl fade-in-up" style="animation-delay: 0.5s;">
                        <div class="text-center mb-8">
                            <h3 class="text-3xl font-bold mb-3">Features for <span class="bg-gradient-to-r from-[#ff3b30] to-[#412234] bg-clip-text text-transparent">Everyone</span></h3>
                            <p class="text-[#666]">Core functionality available to all authenticated users</p>
                        </div>

                        <div class="grid md:grid-cols-3 gap-6">
                            <div class="feature-card p-6 bg-gradient-to-br from-[#ff3b30]/5 to-[#ff9500]/5 rounded-2xl border border-[#ff3b30]/10 transition-all duration-300">
                                <div class="w-12 h-12 bg-gradient-to-br from-[#ff3b30] to-[#ff6b59] rounded-xl flex items-center justify-center mb-4">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect>
                                        <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
                                    </svg>
                                </div>
                                <h4 class="font-bold text-lg mb-2">Secure Authentication</h4>
                                <p class="text-sm text-[#666]">Protected login system with encrypted passwords and session management</p>
                            </div>

                            <div class="feature-card p-6 bg-gradient-to-br from-[#ff9500]/5 to-[#ffb84d]/5 rounded-2xl border border-[#ff9500]/10 transition-all duration-300">
                                <div class="w-12 h-12 bg-gradient-to-br from-[#ff9500] to-[#ffb84d] rounded-xl flex items-center justify-center mb-4">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <circle cx="12" cy="12" r="10"></circle>
                                        <circle cx="12" cy="12" r="6"></circle>
                                        <circle cx="12" cy="12" r="2"></circle>
                                    </svg>
                                </div>
                                <h4 class="font-bold text-lg mb-2">Intuitive Interface</h4>
                                <p class="text-sm text-[#666]">Clean, modern design that makes navigation and content creation effortless</p>
                            </div>

                            <div class="feature-card p-6 bg-gradient-to-br from-[#412234]/5 to-[#6b3a52]/5 rounded-2xl border border-[#412234]/10 transition-all duration-300">
                                <div class="w-12 h-12 bg-gradient-to-br from-[#412234] to-[#6b3a52] rounded-xl flex items-center justify-center mb-4">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path>
                                    </svg>
                                </div>
                                <h4 class="font-bold text-lg mb-2">Data Privacy</h4>
                                <p class="text-sm text-[#666]">Your content is protected with role-based access control and secure storage</p>
                            </div>
                        </div>
                    </div>

                    <!-- Call to Action -->
                    <div class="text-center fade-in-up" style="animation-delay: 0.6s;">
                        @if (Route::has('login'))
                            @guest
                                <div class="glass-effect rounded-2xl p-8 shadow-xl">
                                    <h3 class="text-2xl font-bold mb-3">Ready to Get Started?</h3>
                                    <p class="text-[#666] mb-6 max-w-xl mx-auto">Join our platform today and start creating content with powerful tools at your fingertips</p>
                                    <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
                                        <a href="{{ route('register') }}"
                                           class="px-8 py-4 text-base font-bold text-white bg-gradient-to-r from-[#ff3b30] to-[#ff6b59] rounded-2xl shadow-xl hover:shadow-2xl hover:scale-105 transition-all duration-300">
                                            Create Your Account
                                        </a>
                                        <a href="{{ route('login') }}"
                                           class="px-8 py-4 text-base font-semibold text-[#1b1b18] glass-effect rounded-2xl shadow-lg hover:shadow-xl hover:scale-105 transition-all duration-300">
                                            Sign In Now
                                        </a>
                                    </div>
                                </div>
                            @endguest
                        @endif
                    </div>

                    <!-- Additional Information -->
                    <div class="grid md:grid-cols-2 gap-6 fade-in-up" style="animation-delay: 0.7s;">
                        <div class="glass-effect rounded-2xl p-6 shadow-lg">
                            <div class="flex items-start gap-4">
                                <div class="w-10 h-10 bg-gradient-to-br from-[#ff3b30] to-[#ff6b59] rounded-xl flex items-center justify-center flex-shrink-0">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                                        <polyline points="22 4 12 14.01 9 11.01"></polyline>
                                    </svg>
                                </div>
                                <div>
                                    <h4 class="font-bold text-lg mb-2">Easy to Use</h4>
                                    <p class="text-sm text-[#666]">No technical expertise required. Our intuitive interface guides you through every step of creating and managing your content.</p>
                                </div>
                            </div>
                        </div>

                        <div class="glass-effect rounded-2xl p-6 shadow-lg">
                            <div class="flex items-start gap-4">
                                <div class="w-10 h-10 bg-gradient-to-br from-[#412234] to-[#6b3a52] rounded-xl flex items-center justify-center flex-shrink-0">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M12 22c5.523 0 10-4.477 10-10S17.523 2 12 2 2 6.477 2 12s4.477 10 10 10z"></path>
                                        <path d="m9 12 2 2 4-4"></path>
                                    </svg>
                                </div>
                                <div>
                                    <h4 class="font-bold text-lg mb-2">Always Improving</h4>
                                    <p class="text-sm text-[#666]">We continuously update the platform with new features and improvements based on user feedback and modern web standards.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </body>
</html>