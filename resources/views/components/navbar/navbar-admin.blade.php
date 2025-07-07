<nav class="bg-white shadow-sm border-b">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-16">
            <!-- Logo -->
            <div class="flex-shrink-0">
                <img src="{{ asset('assets/logos/kbri-logo.png') }}" alt="Embassy Logo" class="w-10 h-10 rounded-full">
            </div>

            <!-- Link: Application -->
            <div class="flex items-center space-x-8">
                <a href="{{ route('admin.applications.index') }}"
                   class="text-gray-700 hover:text-red-600 px-3 py-2 text-sm font-medium transition-all duration-200 border-b-2 border-transparent hover:border-red-600 {{ request()->routeIs('admin.applications.*') ? 'text-red-600 border-red-600' : '' }}">
                    Applications
                </a>
            </div>

            <!-- Admin Name -->
            <div class="flex items-center space-x-2">
                <span class="text-sm text-gray-700">{{ Auth::user()->name }}</span>
                <div class="w-8 h-8 bg-gray-300 rounded-full flex items-center justify-center">
                    <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                    </svg>
                </div>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="ml-2 text-sm text-red-600 hover:underline">Logout</button>
                </form>
            </div>
        </div>
    </div>
</nav>
