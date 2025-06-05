@extends('layouts.guest', ['backgroundImage' => 'monument.jpg', 'reverseLayout' => true])

@section('title', 'Register - NOC Application System')

@section('content')
<x-form-card>
    <!-- User Icon -->
    <div class="flex justify-center mb-6">
        <div class="w-12 h-12 bg-gray-100 rounded-lg flex items-center justify-center border border-gray-300">
            <svg class="w-6 h-6 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path>
            </svg>
        </div>
    </div>

    <!-- Header -->
    <div class="text-center mb-8">
        <h1 class="text-2xl font-bold text-gray-900 mb-2">Create your account</h1>
        <p class="text-gray-600">Please enter your details to get started</p>
    </div>

    <!-- Registration Form -->
    <form method="POST" action="{{ route('register') }}" class="space-y-6">
        @csrf

        <!-- Name Field -->
        <div>
            <label for="name" class="block text-sm font-medium text-gray-700 mb-2">
                Name<span class="text-red-500">*</span>
            </label>
            <x-input 
                id="name"
                name="name"
                type="text"
                icon="user"
                placeholder="John Anderson"
                :value="old('name')"
                required
                autofocus
            />
            @error('name')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <!-- Email Field -->
        <div>
            <label for="email" class="block text-sm font-medium text-gray-700 mb-2">
                Email address<span class="text-red-500">*</span>
            </label>
            <x-input 
                id="email"
                name="email"
                type="email"
                icon="email"
                placeholder="name@website.com"
                :value="old('email')"
                required
            />
            @error('email')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <!-- Password Field -->
        <div>
            <label for="password" class="block text-sm font-medium text-gray-700 mb-2">
                Password<span class="text-red-500">*</span>
            </label>
            <x-input 
                id="password"
                name="password"
                type="password"
                icon="lock"
                placeholder=""
                required
            />
            @error('password')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <!-- Confirm Password Field -->
        <div>
            <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-2">
                Confirm Password<span class="text-red-500">*</span>
            </label>
            <x-input 
                id="password_confirmation"
                name="password_confirmation"
                type="password"
                icon="lock"
                placeholder=""
                required
            />
            @error('password_confirmation')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <!-- Register Button -->
        <x-button 
            type="submit" 
            variant="primary" 
            fullWidth="true"
            style="background-color: #CB1428; hover:background-color: #B01220;"
        >
            Sign Up
        </x-button>

        <!-- Login Link -->
        <div class="text-center">
            <p class="text-gray-600">
                Already have an account? 
                <a href="{{ route('login') }}" class="font-medium text-[#CB1428] hover:text-red-700">
                    Log In
                </a>
            </p>
        </div>
    </form>
</x-form-card>
@endsection