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
                        <h3 class="font-semibold text-gray-900">Protkons KBRI Islamabad</h3>
                    </div>
                    <p class="text-sm text-gray-600">Copyright © {{ now()->year }} KBRI Islamabad - All rights reserved</p>
                </div>
                
                <!-- Contact -->
                <div class="lg:w-1/3">
                    <h4 class="font-semibold text-gray-900 mb-4">Contact</h4>
                    <ul class="text-sm text-gray-600 space-y-2">
                        <li class="flex items-start">
                            <span class="mr-2">🏛️</span>
                            <span>
                                Diplomatic Enclave I Street 5,<br>
                                Ramna G-5/4, Islamabad 44000,<br>
                                Pakistan (P.O.BOX 1019)
                            </span>
                        </li>
                        <li class="flex items-center">
                            <span class="mr-2">📞</span>
                            <span>(92-51) 283-2017 to 20</span>
                        </li>
                        <li class="flex items-center">
                            <span class="mr-2">✉️</span>
                            <span>konsuler.islamabad@kemlu.go.id</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
</body>
</html>