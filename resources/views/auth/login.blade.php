@extends('layouts.guest')

@section('title', 'Login - NOC Application System')

@section('content')
<x-form-card 
    title="Login to your account" 
    subtitle="Welcome back, please enter your details"
    icon="login"
>
    <form method="POST" action="{{ route('login') }}" class="space-y-6">
        @csrf
        
        <!-- Email Input -->
        <x-input 
            name="email" 
            type="email" 
            label="Email address" 
            placeholder="name@website.com" 
            icon="email" 
            required 
        />
        
        <!-- Password Input -->
        <x-input 
            name="password" 
            type="password" 
            label="Password" 
            icon="lock" 
            showPasswordToggle="true" 
            required 
        />
        
        <!-- Remember Me & Forgot Password -->
        <div class="flex items-center justify-between">
            <div class="flex items-center">
                <input 
                    id="remember" 
                    name="remember" 
                    type="checkbox" 
                    class="h-4 w-4 text-red-600 focus:ring-red-500 border-gray-300 rounded"
                >
                <label for="remember" class="ml-2 block text-sm text-gray-700">
                    Keep me logged in
                </label>
            </div>
            
            <div class="text-sm">
                <a href="{{ route('forgot-password') }}" class="text-[#CB1428] hover:text-red-700 hover:underline">
                    Forgot password?
                </a>
            </div>
        </div>
        
        <!-- Login Button -->
        <x-button 
            type="submit" 
            variant="primary" 
            fullWidth="true"
            style="background-color: #CB1428; hover:background-color: #B01220;"
        >
            Log In
        </x-button>
        
        <!-- Sign Up Link -->
        <div class="text-center">
            <p class="text-sm text-gray-600">
                Not registered yet? 
                <a href="{{ route('register') }}" class=" text-[#CB1428] hover:text-red-700 hover:underline font-medium">
                    Sign Up
                </a>
            </p>
        </div>
    </form>
</x-form-card>
@endsection