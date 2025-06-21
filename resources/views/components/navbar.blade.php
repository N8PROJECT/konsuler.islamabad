<nav class="bg-white shadow-sm border-b">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-16">
            <!-- Logo - Far Left -->
            <div class="flex-shrink-0">
                <img src="{{ asset('assets/logos/kbri-logo.png') }}" alt="Embassy Logo" class="w-10 h-10 rounded-full">
            </div>
            
            <!-- Desktop Navigation - Center -->
            <div class="hidden md:flex items-center space-x-8">
                <a href="{{ route('home') }}" 
                   class="text-gray-700 hover:text-red-600 px-3 py-2 text-sm font-medium transition-all duration-200 border-b-2 border-transparent hover:border-red-600 {{ request()->routeIs('home') ? 'text-red-600 border-red-600' : '' }}">
                    Home
                </a>
                <a 
                {{-- href="{{ route('application') }}"  --}}
                   class="text-gray-700 hover:text-red-600 px-3 py-2 text-sm font-medium transition-all duration-200 border-b-2 border-transparent hover:border-red-600 {{ request()->routeIs('application') ? 'text-red-600 border-red-600' : '' }}">
                    Application
                </a>
                <a 
                {{-- href="{{ route('noc.student') }}"  --}}
                   class="text-gray-700 hover:text-red-600 px-3 py-2 text-sm font-medium transition-all duration-200 border-b-2 border-transparent hover:border-red-600 {{ request()->routeIs('noc.student') ? 'text-red-600 border-red-600' : '' }}">
                    NOC New Student
                </a>
                <a 
                {{-- href="{{ route('noc.ibbc') }}"  --}}
                   class="text-gray-700 hover:text-red-600 px-3 py-2 text-sm font-medium transition-all duration-200 border-b-2 border-transparent hover:border-red-600 {{ request()->routeIs('noc.ibbc') ? 'text-red-600 border-red-600' : '' }}">
                    NOC IBBC
                </a>
                <a 
                {{-- href="{{ route('noc.hec') }}"  --}}
                   class="text-gray-700 hover:text-red-600 px-3 py-2 text-sm font-medium transition-all duration-200 border-b-2 border-transparent hover:border-red-600 {{ request()->routeIs('noc.hec') ? 'text-red-600 border-red-600' : '' }}">
                    NOC HEC
                </a>
                <a 
                {{-- href="{{ route('noc.visa') }}"  --}}
                   class="text-gray-700 hover:text-red-600 px-3 py-2 text-sm font-medium transition-all duration-200 border-b-2 border-transparent hover:border-red-600 {{ request()->routeIs('noc.visa') ? 'text-red-600 border-red-600' : '' }}">
                    NOC Visa
                </a>
                <a 
                {{-- href="{{ route('noc.trip') }}"  --}}
                   class="text-gray-700 hover:text-red-600 px-3 py-2 text-sm font-medium transition-all duration-200 border-b-2 border-transparent hover:border-red-600 {{ request()->routeIs('noc.trip') ? 'text-red-600 border-red-600' : '' }}">
                    NOC Trip
                </a>
            </div>
            
            <!-- User Menu - Far Right -->
            <div class="flex items-center space-x-4">
                <!-- User Avatar/Name -->
                <div class="flex items-center space-x-2">
                    <span class="text-sm text-gray-700">Rizqy Zufar</span>
                    <div class="w-8 h-8 bg-gray-300 rounded-full flex items-center justify-center">
                        <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                    </div>
                </div>
            </div>
            
            <!-- Mobile Menu Button -->
            <div class="md:hidden">
                <button type="button" class="text-gray-600 hover:text-gray-900 focus:outline-none focus:text-gray-900">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
            </div>
        </div>
    </div>
    
    <!-- Mobile Navigation Menu (hidden by default) -->
    <div class="md:hidden hidden">
        <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3 bg-white border-t">
            <a href="{{ route('home') }}" class="block px-3 py-2 text-base font-medium text-gray-700 hover:text-red-600">Home</a>
            <a 
            {{-- href="{{ route('application') }}"  --}}
            class="block px-3 py-2 text-base font-medium text-gray-700 hover:text-red-600">Application</a>
            <a 
            {{-- href="{{ route('noc.student') }}"  --}}
            class="block px-3 py-2 text-base font-medium text-gray-700 hover:text-red-600">NOC New Student</a>
            <a 
            {{-- href="{{ route('noc.ibbc') }}"  --}}
            class="block px-3 py-2 text-base font-medium text-gray-700 hover:text-red-600">NOC IBBC</a>
            <a 
            {{-- href="{{ route('noc.hec') }}" --}}
             class="block px-3 py-2 text-base font-medium text-gray-700 hover:text-red-600">NOC HEC</a>
            <a 
            {{-- href="{{ route('noc.visa') }}" --}}
             class="block px-3 py-2 text-base font-medium text-gray-700 hover:text-red-600">NOC Visa</a>
            <a 
            {{-- href="{{ route('noc.trip') }}"  --}}
            class="block px-3 py-2 text-base font-medium text-gray-700 hover:text-red-600">NOC Trip</a>
        </div>
    </div>
</nav>