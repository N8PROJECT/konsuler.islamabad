@extends('layouts.guest', ['backgroundImage' => 'FpMosque.jpg'])

@section('title', 'Forgot Password - NOC Application System')

@section('content')
<x-form-card>
    <!-- Progress Steps -->
    <div class="flex justify-center mb-8">
        <div class="flex items-center space-x-2">
            <!-- Step 1 - Active -->
            <div class="w-16 h-1 bg-[#CB1428] rounded-full"></div>
            <!-- Step 2 - Inactive -->
            <div class="w-16 h-1 bg-[#494949] rounded-full"></div>
            <!-- Step 3 - Inactive -->
            <div class="w-16 h-1 bg-[#494949] rounded-full"></div>
        </div>
    </div>

    <!-- Lock Icon -->
    <div class="flex justify-center mb-6">
        <div class="w-12 h-12 bg-gray-100 rounded-lg flex items-center justify-center border border-gray-300">
            <svg class="w-6 h-6 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
            </svg>
        </div>
    </div>

    <!-- Header -->
    <div class="text-center mb-8">
        <h1 class="text-2xl font-bold text-gray-900 mb-2">Forgot password</h1>
        <p class="text-gray-600">Enter your email to send OTP Code</p>
    </div>

    <!-- Forgot Password Form -->
    <form method="POST" action="{{ route('forgot-password.send') }}" class="space-y-6">
        @csrf

        <!-- Email Field -->
        <div>
            <label for="email" class="block text-sm font-medium text-gray-700 mb-2">
                Email address<span class="text-red-500">*</span>
            </label>
            <x-input 
                id="email"
                name="email"
                type="email"
                icon="mail"
                placeholder="name@website.com"
                :value="old('email')"
                required
                autofocus
            />
            @error('email')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <!-- Send OTP Button -->
          <x-button 
            type="submit" 
            variant="primary" 
            fullWidth="true"
            style="background-color: #CB1428; hover:background-color: #B01220;"
        >
            Reset Pasword
        </x-button>

        <!-- Back to Login Link -->
        <div class="text-center">
            <p class="text-gray-600">
                Remember your password? 
                <a href="{{ route('login') }}" class="font-medium text-[#CB1428] hover:text-red-700">
                    Back to Login
                </a>
            </p>
        </div>
    </form>
</x-form-card>
@endsection