@extends('layouts.guest', ['backgroundImage' => 'Flag.jpg', 'reverseLayout' => true])

@section('title', 'Enter OTP Code - NOC Application System')

@section('content')
<x-form-card>
    <!-- Progress Steps -->
    <div class="flex justify-center mb-8">
        <div class="flex items-center space-x-2">
            <!-- Step 1 - Completed -->
            <div class="w-16 h-1 bg-[#494949] rounded-full"></div>
            <!-- Step 2 - Active -->
            <div class="w-16 h-1 bg-[#CB1428] rounded-full"></div>
            <!-- Step 3 - Inactive -->
            <div class="w-16 h-1 bg-[#494949] rounded-full"></div>
        </div>
    </div>

    <!-- User Icon -->
    <div class="flex justify-center mb-6">
        <div class="w-12 h-12 bg-gray-100 rounded-lg flex items-center justify-center border border-gray-300">
            <svg class="w-6 h-6 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
            </svg>
        </div>
    </div>

    <!-- Header -->
    <div class="text-center mb-8">
        <h1 class="text-2xl font-bold text-gray-900 mb-2">Enter OTP Code</h1>
        <p class="text-gray-600">Please enter verification code sent to<br>email name@website.com</p>
    </div>

    <!-- OTP Form -->
    <form method="POST" action="{{ route('forgot-password.verify') }}" class="space-y-6">
        @csrf

        <!-- OTP Input Boxes -->
        <div class="flex justify-center space-x-3 mb-6">
            <input type="text" 
                   id="otp-1" 
                   name="otp[]" 
                   maxlength="1" 
                   class="w-12 h-12 text-center text-lg font-medium border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#CB1428] focus:border-[#CB1428] outline-none"
                   oninput="moveToNext(this, 'otp-2')"
                   onkeydown="handleBackspace(event, this, null)"
                   required>
            <input type="text" 
                   id="otp-2" 
                   name="otp[]" 
                   maxlength="1" 
                   class="w-12 h-12 text-center text-lg font-medium border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#CB1428] focus:border-[#CB1428] outline-none"
                   oninput="moveToNext(this, 'otp-3')"
                   onkeydown="handleBackspace(event, this, 'otp-1')"
                   required>
            <input type="text" 
                   id="otp-3" 
                   name="otp[]" 
                   maxlength="1" 
                   class="w-12 h-12 text-center text-lg font-medium border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#CB1428] focus:border-[#CB1428] outline-none"
                   oninput="moveToNext(this, 'otp-4')"
                   onkeydown="handleBackspace(event, this, 'otp-2')"
                   required>
            <input type="text" 
                   id="otp-4" 
                   name="otp[]" 
                   maxlength="1" 
                   class="w-12 h-12 text-center text-lg font-medium border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#CB1428] focus:border-[#CB1428] outline-none"
                   oninput="moveToNext(this, null)"
                   onkeydown="handleBackspace(event, this, 'otp-3')"
                   required>
        </div>

        @error('otp')
            <p class="mt-1 text-sm text-red-600 text-center">{{ $message }}</p>
        @enderror

        <!-- Verify & Continue Button -->
          <x-button 
            type="submit" 
            variant="primary" 
            fullWidth="true"
            style="background-color: #CB1428; hover:background-color: #B01220;"
        >
            Verify & Continue
        </x-button>

        <!-- Resend Code Link -->
        <div class="text-center">
            <p class="text-gray-600">
                Didn't receive OTP Code? 
                <button type="button" onclick="resendCode()" class="font-medium text-[#CB1428] hover:text-red-700 bg-transparent border-none cursor-pointer">
                    Resend Code
                </button>
            </p>
        </div>
    </form>
</x-form-card>

<script>
// Auto-focus to next input when digit is entered
function moveToNext(current, nextId) {
    if (current.value.length === 1 && nextId) {
        document.getElementById(nextId).focus();
    }
}

// Handle backspace to move to previous input
function handleBackspace(event, current, previousId) {
    if (event.key === 'Backspace' && current.value === '' && previousId) {
        event.preventDefault();
        document.getElementById(previousId).focus();
    }
}

// Resend code function (placeholder for now)
function resendCode() {
    // TODO: Implement resend OTP logic
    alert('Resend code functionality will be implemented later');
}

// Auto-focus first input on page load
document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('otp-1').focus();
});
</script>
@endsection