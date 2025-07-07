<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Embassy of Indonesia - Islamabad')</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-50">
    <!-- Navigation -->
    @auth
        @if(Auth::user()->role === 'admin')
            @include('components.navbar.navbar-admin')
        @else
            @include('components.navbar.navbar')
        @endif
    @else
        @include('components.navbar.navbar') {{-- Untuk guest --}}
    @endauth
    
    <!-- Main Content -->
    <main>
        @yield('content')
    </main>
    
    <!-- Footer -->
    <footer class="border-t mt-16" style="background-color: #E6E6E6;">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <div class="flex flex-col lg:flex-row lg:justify-between lg:items-start gap-8">
                <!-- Embassy Info -->
                <div class="lg:w-1/3">
                    <div class="flex items-center space-x-3 mb-2">
                        <img src="{{ asset('assets/logos/kbri-logo.png') }}" alt="Embassy Logo" class="w-12 h-12 rounded-full flex-shrink-0">
                        <h3 class="font-semibold text-gray-900">KBRI Islamabad Embassy of Indonesia</h3>
                    </div>
                    <p class="text-sm text-gray-600">Copyright © 2024 KBRI Islamabad - All rights reserved</p>
                </div>
                
                <!-- Services -->
                <div class="lg:w-1/3">
                    <h4 class="font-semibold mb-4" style="color: #CB1428;">Services</h4>
                    <ul class="space-y-2 text-sm text-gray-600">
                        <li><a href="#" class="hover:text-red-600">NOC New Student</a></li>
                        <li><a href="#" class="hover:text-red-600">NOC HEC</a></li>
                        <li><a href="#" class="hover:text-red-600">NOC IBBC</a></li>
                        <li><a href="#" class="hover:text-red-600">NOC Visa</a></li>
                        <li><a href="#" class="hover:text-red-600">NOC Trip</a></li>
                    </ul>
                </div>
                
                <!-- Contact -->
                <div class="lg:w-1/3">
                    <h4 class="font-semibold text-gray-900 mb-4">Contact Us</h4>
                    <p class="text-sm text-gray-600 mb-4">
                        Enter your email to contact our team<br>
                        and receive embassy announcements.
                    </p>
                    <div class="flex max-w-sm">
                        <input type="email" placeholder="name@website.com" 
                               class="flex-1 px-3 py-2 border border-gray-300 rounded-l-md text-sm focus:outline-none focus:ring-2 focus:ring-red-500">
                        <button class="text-white px-4 py-2 rounded-r-md text-sm hover:opacity-90" style="background-color: #CB1428;">
                            →
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</body>
</html>