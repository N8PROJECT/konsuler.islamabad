<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'NOC Application System')</title>
    
    <!-- Tailwind CSS -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <!-- Additional styles -->
    <style>
        .bg-dynamic {
            background-image: url('{{ asset('assets/images/' . ($backgroundImage ?? 'mosque.jpg')) }}');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }
        
        .font-system {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, sans-serif;
        }
    </style>
</head>
<body class="font-system bg-gray-50 min-h-screen">
    <div class="min-h-screen flex {{ ($reverseLayout ?? false) ? 'flex-row-reverse' : '' }}">
        <!-- Background Image Side (Hidden on mobile) -->
        <div class="hidden lg:flex lg:w-1/2 bg-dynamic relative">
            <!-- Optional overlay for better text readability if needed -->
            <div class="absolute inset-0 bg-black bg-opacity-20"></div>
        </div>
        
        <!-- Form Area Side -->
        <div class="w-full lg:w-1/2 flex flex-col">
            <!-- Logo Section -->
            <div class="flex justify-end p-6 lg:p-8 {{ ($reverseLayout ?? false) ? 'flex-row-reverse' : '' }}">
                <a href="{{ route('login') }}" class="flex-shrink-0">
                    <img src="{{ asset('assets/logos/kbri-logo.png') }}" 
                         alt="KBRI Logo" 
                         class="h-12 lg:h-16 w-auto">
                </a>
            </div>
            
            <!-- Main Content Area -->
            <div class="flex-1 flex items-center justify-center px-6 lg:px-12">
                <div class="w-full max-w-md">
                    @yield('content')
                </div>
            </div>
            
            <!-- Footer Space (if needed later) -->
            <div class="p-6 lg:p-8">
                <!-- Can add footer content here later if needed -->
            </div>
        </div>
    </div>
    
    <!-- Mobile Background (Shows on small screens) -->
    <div class="lg:hidden fixed inset-0 bg-dynamic opacity-10 pointer-events-none"></div>
</body>
</html>