@props([
    'type' => 'button',
    'variant' => 'primary', 
    'size' => 'default', 
    'fullWidth' => false,
    'loading' => false,
    'disabled' => false
])

@php
    $baseClasses = 'inline-flex items-center justify-center font-medium rounded-lg transition-all duration-200 focus:outline-none focus:ring-2 focus:ring-offset-2 disabled:opacity-50 disabled:cursor-not-allowed';
    
    $variantClasses = [
        'primary' => 'bg-red-600 hover:bg-red-700 text-white focus:ring-red-500 shadow-sm',
        'secondary' => 'bg-white hover:bg-gray-50 text-gray-700 border border-gray-300 focus:ring-gray-500 shadow-sm',
        'link' => 'text-red-600 hover:text-red-700 focus:ring-red-500 underline-offset-4 hover:underline'
    ];
    
    $sizeClasses = [
        'sm' => 'px-3 py-2 text-sm',
        'default' => 'px-4 py-3 text-sm',
        'lg' => 'px-6 py-4 text-base'
    ];
    
    $widthClass = $fullWidth ? 'w-full' : '';
    
    $classes = collect([
        $baseClasses,
        $variantClasses[$variant] ?? $variantClasses['primary'],
        $sizeClasses[$size] ?? $sizeClasses['default'],
        $widthClass
    ])->filter()->implode(' ');
@endphp

<button 
    type="{{ $type }}"
    class="{{ $classes }}"
    @if($disabled || $loading) disabled @endif
    {{ $attributes }}
>
    @if($loading)
        <!-- Loading Spinner -->
        <svg class="animate-spin -ml-1 mr-2 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
        </svg>
        Loading...
    @else
        {{ $slot }}
    @endif
</button>