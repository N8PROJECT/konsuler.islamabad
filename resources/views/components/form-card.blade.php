@props([
    'title' => '',
    'subtitle' => '',
    'icon' => null
])

<div class="bg-white rounded-2xl shadow-lg p-8 w-full">
    <!-- Icon and Title Section -->
    <div class="text-center mb-8">
        @if($icon)
            <div class="mx-auto w-16 h-16 bg-gray-100 rounded-2xl flex items-center justify-center mb-4">
                <svg class="w-8 h-8 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    @if($icon === 'login')
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                    @elseif($icon === 'register')
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" />
                    @elseif($icon === 'forgot')
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                    @endif
                </svg>
            </div>
        @endif
        
        @if($title)
            <h1 class="text-2xl font-semibold text-gray-900 mb-2">{{ $title }}</h1>
        @endif
        
        @if($subtitle)
            <p class="text-gray-600 text-sm">{{ $subtitle }}</p>
        @endif
    </div>
    
    <!-- Form Content -->
    <div>
        {{ $slot }}
    </div>
</div>