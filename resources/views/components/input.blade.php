@props([
    'type' => 'text',
    'name' => '',
    'label' => '',
    'placeholder' => '',
    'required' => false,
    'value' => '',
    'icon' => null,
    'showPasswordToggle' => false
])

<div class="mb-4">
    <!-- Label -->
    @if($label)
        <label for="{{ $name }}" class="block text-sm font-medium text-gray-700 mb-2">
            {{ $label }}
            @if($required)
                <span class="text-red-500">*</span>
            @endif
        </label>
    @endif
    
    <!-- Input Container -->
    <div class="relative">
        <!-- Icon (Left side) -->
        @if($icon)
            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    @if($icon === 'email')
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207" />
                    @elseif($icon === 'lock')
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                    @elseif($icon === 'user')
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                    @endif
                </svg>
            </div>
        @endif
        
        <!-- Input Field -->
        <input 
            type="{{ $type }}" 
            id="{{ $name }}" 
            name="{{ $name }}"
            value="{{ old($name, $value) }}"
            placeholder="{{ $placeholder }}"
            @if($required) required @endif
            class="w-full {{ $icon ? 'pl-10' : 'pl-3' }} {{ $showPasswordToggle ? 'pr-10' : 'pr-3' }} py-3 border  transition-colors duration-200 text-gray-900 placeholder-gray-500
                   border-gray-300 rounded-lg focus:ring-2 focus:ring-[#CB1428] focus:border-[#CB1428] outline-none"
            {{ $attributes }}
        >
        
        <!-- Password Toggle Button -->
        @if($showPasswordToggle)
            <button 
                type="button" 
                class="absolute inset-y-0 right-0 pr-3 flex items-center"
                onclick="togglePassword('{{ $name }}')"
            >
                <svg id="eye-{{ $name }}" class="h-5 w-5 text-gray-400 hover:text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                </svg>
                <svg id="eye-slash-{{ $name }}" class="h-5 w-5 text-gray-400 hover:text-gray-600 hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.878 9.878L3 3m6.878 6.878L21 21" />
                </svg>
            </button>
        @endif
    </div>
    
    <!-- Error Message -->
    @error($name)
        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
    @enderror
</div>

@if($showPasswordToggle)
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            window.togglePassword = function(fieldName) {
                const input = document.getElementById(fieldName);
                const eyeIcon = document.getElementById('eye-' + fieldName);
                const eyeSlashIcon = document.getElementById('eye-slash-' + fieldName);
                
                if (input.type === 'password') {
                    input.type = 'text';
                    eyeIcon.classList.add('hidden');
                    eyeSlashIcon.classList.remove('hidden');
                } else {
                    input.type = 'password';
                    eyeIcon.classList.remove('hidden');
                    eyeSlashIcon.classList.add('hidden');
                }
            }
        });
    </script>
@endif