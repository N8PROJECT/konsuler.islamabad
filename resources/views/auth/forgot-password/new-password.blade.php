@extends('layouts.guest', ['backgroundImage' => 'FpMosque.jpg'])

@section('title', 'New Password - NOC Application System')

@section('content')
<x-form-card>
    <!-- Progress Steps -->
    <div class="flex justify-center mb-8">
        <div class="flex items-center space-x-2">
            <!-- Step 1 - Inactive -->
            <div class="w-16 h-1 bg-[#494949] rounded-full"></div>
            <!-- Step 2 - Inactive -->
            <div class="w-16 h-1 bg-[#494949] rounded-full"></div>
            <!-- Step 3 - Active -->
            <div class="w-16 h-1 bg-[#CB1428] rounded-full"></div>
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
        <h1 class="text-2xl font-bold text-gray-900 mb-2">New Password</h1>
        <p class="text-gray-600">Please enter your new password for<br>your account</p>
    </div>
    
    <!-- New Password Form -->
    <form method="POST" action="{{ route('login') }}" class="space-y-4">
        @csrf

        <!-- Password Field -->
        <x-input 
            type="password"
            name="password"
            label="Password"
            placeholder="Enter your new password"
            icon="lock"
            :showPasswordToggle="true"
            :required="true" />

        <!-- Confirm Password Field -->
        <x-input 
            type="password"
            name="password_confirmation"
            label="Confirm Password"
            placeholder="Confirm your new password"
            icon="lock"
            :showPasswordToggle="true"
            :required="true" />

        <!-- Continue Button -->
        <div class="pt-4">
            <x-button 
                type="submit" 
                variant="primary" 
                :fullWidth="true"
                style="background-color: #CB1428; hover:background-color: #B01220;">
                Continue
            </x-button>
        </div>
    </form>
</x-form-card>
@endsection