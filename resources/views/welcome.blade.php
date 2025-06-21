@extends('layouts.app')

@section('title', 'Home - Embassy of Indonesia')

@section('content')
    <div class="relative min-h-[68vh] flex items-center justify-center">
        <div class="absolute inset-0 bg-cover bg-center bg-no-repeat"
            style="background-image: url('{{ asset('assets/images/mosque.jpg') }}');">
            <div class="absolute inset-0 bg-white/50"></div>
        </div>

        <div class="relative z-10 text-center px-4 sm:px-6 lg:px-8 max-w-4xl mx-auto">
            <h1 class="text-4xl sm:text-5xl md:text-6xl lg:text-xl xl:text-3xl font-bold mb-6 leading-tight"
                style="color: #494949;">
                Embassy of Indonesia – Islamabad
                <p class="text-base sm:text-lg md:text-xl mb-8 font-normal max-w-2xl mx-auto" style="color: #494949;">
                    Apply for visa and NOC quickly and securely
                </p>
            </h1>

            <button
                class="inline-block px-8 py-3 sm:px-10 sm:py-4 text-white font-semibold text-lg rounded-md transition-all duration-300 hover:opacity-90 hover:transform hover:scale-105 shadow-lg"
                style="background-color: #CB1428;">
                Apply Now
            </button>
        </div>
    </div>

    <section class="py-16 px-4 sm:px-6 lg:px-8 bg-white">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-12">
                <h2 class="text-3xl sm:text-4xl font-bold text-gray-800 mb-4">
                    Simplifying Your Travel
                </h2>
            </div>
            
            <div class="grid grid-cols-2 lg:grid-cols-4 gap-8">
                <div class="text-center">
                    <div class="w-24 h-24 mx-auto mb-6 rounded-full flex items-center justify-center" 
                            style="background-color: rgba(203, 20, 40, 0.1);">
                        <svg class="w-10 h-10" style="color: #CB1428;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-800 mb-3">
                        Fast and Simple<br>Application Process
                    </h3>
                    <p class="text-gray-600 text-sm leading-relaxed">
                        Apply for visas, NOCs, and other services online in just a few easy steps - no queues, no hassle.
                    </p>
                </div>
                
                <div class="text-center">
                    <div class="w-24 h-24 mx-auto mb-6 rounded-full flex items-center justify-center" 
                            style="background-color: rgba(203, 20, 40, 0.1);">
                        <svg class="w-10 h-10" style="color: #CB1428;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-800 mb-3">
                        User-Friendly<br>Interface
                    </h3>
                    <p class="text-gray-600 text-sm leading-relaxed">
                        A clean and intuitive design helps users easily find information and complete forms without confusion.
                    </p>
                </div>
                
                <div class="text-center">
                    <div class="w-24 h-24 mx-auto mb-6 rounded-full flex items-center justify-center" 
                            style="background-color: rgba(203, 20, 40, 0.1);">
                        <svg class="w-10 h-10" style="color: #CB1428;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.111 16.404a5.5 5.5 0 017.778 0M12 20h.01m-7.08-7.071c3.904-3.905 10.236-3.905 14.141 0M1.394 9.393c5.857-5.857 15.355-5.857 21.213 0"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-800 mb-3">
                        Available Anytime &<br>Anywhere
                    </h3>
                    <p class="text-gray-600 text-sm leading-relaxed">
                        Access the portal 24/7 from any device, making it easy to manage your consular needs on your schedule.
                    </p>
                </div>
                
                <div class="text-center">
                    <div class="w-24 h-24 mx-auto mb-6 rounded-full flex items-center justify-center" 
                            style="background-color: rgba(203, 20, 40, 0.1);">
                        <svg class="w-10 h-10" style="color: #CB1428;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-800 mb-3">
                        Accurate and Reliable<br>Information
                    </h3>
                    <p class="text-gray-600 text-sm leading-relaxed">
                        Get official guidelines, operating hours, and direct embassy contact details - all in one trusted place.
                    </p>
                </div>
            </div>
        </div>
    </section>

 <!-- NOC Carousel Section -->
    <section class="py-16 px-4 sm:px-6 lg:px-8 bg-gray-50">
        <div class="max-w-7xl mx-auto text-center mb-12">
            <h2 class="text-3xl sm:text-4xl font-bold text-gray-800 mb-4" style="color: #CB1428;">
                Your Visa & NOC, Your Way
            </h2>
            <p class="text-gray-600 text-lg max-w-2xl mx-auto">
                Choose from a variety of official requests including Student NOC, Visa Renewal, IBBC, HEC, and more - all tailored to meet your consular needs.
            </p>
        </div>

        <!-- New wrapper for carousel and arrows to control external positioning -->
        <div class="relative max-w-6xl mx-auto"> 
            <!-- Navigation Arrows (Now outside the overflow-hidden div) -->
            <button id="prevBtn" class="absolute -left-16 top-1/2 -translate-y-1/2 bg-red-700 hover:bg-red-800 text-white p-3 rounded-full shadow-lg z-20 focus:outline-none transition-transform duration-200 transform hover:scale-110 hidden md:block">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
            </button>
            <button id="nextBtn" class="absolute -right-16 top-1/2 -translate-y-1/2 bg-red-700 hover:bg-red-800 text-white p-3 rounded-full shadow-lg z-20 focus:outline-none transition-transform duration-200 transform hover:scale-110 hidden md:block">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
            </button>

            <!-- Carousel Inner Container (This will be controlled by JS) -->
            <div id="noc-carousel" class="flex items-center justify-center space-x-6 py-8 overflow-hidden"> <!-- Added overflow-hidden here -->
                <!-- NOC Card: NOC for Trip -->
                <div class="noc-card flex-shrink-0 w-64 md:w-72 lg:w-80 bg-white rounded-lg shadow-xl overflow-hidden cursor-pointer transition-all duration-500 ease-in-out opacity-70 transform scale-90">
                    <!-- Image container with relative positioning for icon -->
                    <div class="relative">
                        <img src="{{ asset('assets/images/mosque.jpg') }}" alt="NOC for Trip" class="w-full h-40 object-cover">
                        <!-- Icon positioned absolutely -->
                        <div class="absolute bottom-0 left-0 bg-white p-2 rounded-tr-lg">
                            <svg class="w-5 h-5 text-red-700" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M4 4a2 2 0 012-2h4.586A2 2 0 0113 3.414L16.586 7A2 2 0 0117 8.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4zm2 6a1 1 0 011-1h6a1 1 0 110 2H7a1 1 0 01-1-1zm1 3a1 1 0 100 2h6a1 1 0 100-2H7z" clip-rule="evenodd"></path>
                            </svg>
                        </div>
                    </div>
                    
                    <!-- Content area for title ONLY, with padding -->
                    <div class="px-6 py-4 text-center"> 
                        <h3 class="text-xl font-semibold text-gray-800 mb-4">NOC for Trip</h3> 
                    </div>

                    <!-- Full-width button, directly inside noc-card, at the very bottom -->
                    <a href="#" class="block w-full py-3 text-white font-medium text-lg text-center rounded-b-lg transition-all duration-300 hover:opacity-90" style="background-color: #CB1428;">Apply Now</a>
                </div>

                <!-- NOC Card: NOC IBBC -->
                <div class="noc-card flex-shrink-0 w-64 md:w-72 lg:w-80 bg-white rounded-lg shadow-xl overflow-hidden cursor-pointer transition-all duration-500 ease-in-out opacity-70 transform scale-90">
                    <div class="relative">
                        <img src="{{ asset('assets/images/mosque.jpg') }}" alt="NOC IBBC" class="w-full h-40 object-cover">
                        <div class="absolute bottom-0 left-0 bg-white p-2 rounded-tr-lg">
                            <svg class="w-5 h-5 text-red-700" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M4 4a2 2 0 012-2h4.586A2 2 0 0113 3.414L16.586 7A2 2 0 0117 8.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4zm2 6a1 1 0 011-1h6a1 1 0 110 2H7a1 1 0 01-1-1zm1 3a1 1 0 100 2h6a1 1 0 100-2H7z" clip-rule="evenodd"></path>
                            </svg>
                        </div>
                    </div>
                    <div class="px-6 py-4 text-center">
                        <h3 class="text-xl font-semibold text-gray-800 mb-4">NOC IBBC</h3>
                    </div>
                    <a href="#" class="block w-full py-3 text-white font-medium text-lg text-center rounded-b-lg transition-all duration-300 hover:opacity-90" style="background-color: #CB1428;">Apply Now</a>
                </div>

                <!-- NOC Card: NOC New Student (This will be the initially highlighted card) -->
                <div class="noc-card flex-shrink-0 w-64 md:w-72 lg:w-80 bg-white rounded-lg shadow-xl overflow-hidden cursor-pointer transition-all duration-500 ease-in-out">
                    <div class="relative">
                        <img src="{{ asset('assets/images/mosque.jpg') }}" alt="NOC New Student" class="w-full h-40 object-cover">
                        <div class="absolute bottom-0 left-0 bg-white p-2 rounded-tr-lg">
                            <svg class="w-5 h-5 text-red-700" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M4 4a2 2 0 012-2h4.586A2 2 0 0113 3.414L16.586 7A2 2 0 0117 8.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4zm2 6a1 1 0 011-1h6a1 1 0 110 2H7a1 1 0 01-1-1zm1 3a1 1 0 100 2h6a1 1 0 100-2H7z" clip-rule="evenodd"></path>
                            </svg>
                        </div>
                    </div>
                    <div class="px-6 py-4 text-center">
                        <h3 class="text-xl font-semibold text-gray-800 mb-4">NOC New Student</h3>
                    </div>
                    <a href="#" class="block w-full py-3 text-white font-medium text-lg text-center rounded-b-lg transition-all duration-300 hover:opacity-90" style="background-color: #CB1428;">Apply Now</a>
                </div>

                <!-- NOC Card: NOC HEC -->
                <div class="noc-card flex-shrink-0 w-64 md:w-72 lg:w-80 bg-white rounded-lg shadow-xl overflow-hidden cursor-pointer transition-all duration-500 ease-in-out opacity-70 transform scale-90">
                    <div class="relative">
                        <img src="{{ asset('assets/images/mosque.jpg') }}" alt="NOC HEC" class="w-full h-40 object-cover">
                        <div class="absolute bottom-0 left-0 bg-white p-2 rounded-tr-lg">
                            <svg class="w-5 h-5 text-red-700" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M4 4a2 2 0 012-2h4.586A2 2 0 0113 3.414L16.586 7A2 2 0 0117 8.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4zm2 6a1 1 0 011-1h6a1 1 0 110 2H7a1 1 0 01-1-1zm1 3a1 1 0 100 2h6a1 1 0 100-2H7z" clip-rule="evenodd"></path>
                            </svg>
                        </div>
                    </div>
                    <div class="px-6 py-4 text-center">
                        <h3 class="text-xl font-semibold text-gray-800 mb-4">NOC HEC</h3>
                    </div>
                    <a href="#" class="block w-full py-3 text-white font-medium text-lg text-center rounded-b-lg transition-all duration-300 hover:opacity-90" style="background-color: #CB1428;">Apply Now</a>
                </div>

                <!-- NOC Card: Visa Renewal -->
                <div class="noc-card flex-shrink-0 w-64 md:w-72 lg:w-80 bg-white rounded-lg shadow-xl overflow-hidden cursor-pointer transition-all duration-500 ease-in-out opacity-70 transform scale-90">
                    <div class="relative">
                        <img src="{{ asset('assets/images/mosque.jpg') }}" alt="Visa Renewal" class="w-full h-40 object-cover">
                        <div class="absolute bottom-0 left-0 bg-white p-2 rounded-tr-lg">
                            <svg class="w-5 h-5 text-red-700" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M4 4a2 2 0 012-2h4.586A2 2 0 0113 3.414L16.586 7A2 2 0 0117 8.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4zm2 6a1 1 0 011-1h6a1 1 0 110 2H7a1 1 0 01-1-1zm1 3a1 1 0 100 2h6a1 1 0 100-2H7z" clip-rule="evenodd"></path>
                            </svg>
                        </div>
                    </div>
                    <div class="px-6 py-4 text-center">
                        <h3 class="text-xl font-semibold text-gray-800 mb-4">Visa Renewal</h3>
                    </div>
                    <a href="#" class="block w-full py-3 text-white font-medium text-lg text-center rounded-b-lg transition-all duration-300 hover:opacity-90" style="background-color: #CB1428;">Apply Now</a>
                </div>
            </div>
        </div>
    </section>



@endsection