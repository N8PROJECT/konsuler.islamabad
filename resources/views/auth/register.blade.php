@extends('layouts.guest', ['backgroundImage' => 'monument.jpg', 'reverseLayout' => true])

@section('title', 'Register - NOC Application System')

@section('content')
<x-form-card
     title="Create your account" 
    subtitle="Please enter your details to get started"
    icon="register"

>

    <!-- Registration Form -->
    <form method="POST" action="{{ route('register') }}" class="space-y-6"> 
        @csrf

        <!-- Name Field -->
        <x-input 
            name="name"
            type="text"
            label="Name"
            icon="user"
            placeholder="John Anderson"
            :value="old('name')"
            :required="true"
            autofocus />

        <!-- Email Field -->
        <x-input 
            name="email"
            type="email"
            label="Email address"
            icon="email"
            placeholder="name@website.com"
            :value="old('email')"
            :required="true" />

        <!-- Password Field -->
        <x-input 
            name="password"
            type="password"
            label="Password"
            icon="lock"
            placeholder="Enter your password"
            :showPasswordToggle="true"
            :required="true" />

        <!-- Confirm Password Field -->
        <x-input 
            name="password_confirmation"
            type="password"
            label="Confirm Password"
            icon="lock"
            placeholder="Confirm your password"
            :showPasswordToggle="true"
            :required="true" />

        <!-- Register Button -->
        <div class="pt-2">
            <x-button 
                type="submit" 
                variant="primary" 
                :fullWidth="true"
                style="background-color: #CB1428; hover:background-color: #B01220;">
                Sign Up
            </x-button>
        </div>

        <!-- Login Link -->
        <div class="text-center mt-6">
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