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
                Kedutaan Besar Republik Indonesia
                <p class="text-base sm:text-lg md:text-xl mb-8 font-normal max-w-2xl mx-auto" style="color: #494949;">
                    Pengajuan Pembuatan Facilitation Letter
                </p>
            </h1>

            <a href="#apply-now">
                <button
                    class="inline-block px-8 py-3 sm:px-10 sm:py-4 text-white font-semibold text-lg rounded-md transition-all duration-300 hover:opacity-90 hover:transform hover:scale-105 shadow-lg"
                    style="background-color: #CB1428;">
                    Apply Now
                </button>
            </a>
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
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z">
                            </path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-800 mb-3">
                        Portal Peduli WNI
                    </h3>
                    <a href="https://peduliwni.kemlu.go.id/beranda.html"
                        class="inline-block px-4 py-2 bg-[#CB1428] text-white text-sm rounded-full hover:bg-[#a61021] transition">
                        Visit Site
                    </a>
                </div>

                <div class="text-center">
                    <div class="w-24 h-24 mx-auto mb-6 rounded-full flex items-center justify-center" 
                            style="background-color: rgba(203, 20, 40, 0.1);">
                        <svg class="w-10 h-10" style="color: #CB1428;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z">
                            </path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-800 mb-3">
                        Safe Travel
                    </h3>
                    <a href="https://safetravel.kemlu.go.id/"
                        class="inline-block px-4 py-2 bg-[#CB1428] text-white text-sm rounded-full hover:bg-[#a61021] transition">
                        Visit Site
                    </a>
                </div>

                <div class="text-center">
                    <div class="w-24 h-24 mx-auto mb-6 rounded-full flex items-center justify-center" 
                            style="background-color: rgba(203, 20, 40, 0.1);">
                        <svg class="w-10 h-10" style="color: #CB1428;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8.111 16.404a5.5 5.5 0 017.778 0M12 20h.01m-7.08-7.071c3.904-3.905 10.236-3.905 14.141 0M1.394 9.393c5.857-5.857 15.355-5.857 21.213 0">
                            </path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-800 mb-3">
                        Apply Visa Pakistan
                    </h3>
                    <a href="https://visa.nadra.gov.pk/"
                        class="inline-block px-4 py-2 bg-[#CB1428] text-white text-sm rounded-full hover:bg-[#a61021] transition">
                        Visit Site
                    </a>
                </div>

                <div class="text-center">
                    <div class="w-24 h-24 mx-auto mb-6 rounded-full flex items-center justify-center" 
                            style="background-color: rgba(203, 20, 40, 0.1);">
                        <svg class="w-10 h-10" style="color: #CB1428;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                            </path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-800 mb-3">
                        Layanan Peduli WNI
                    </h3>
                    <a href="https://peduliwni.kemlu.go.id/pelayanan.html"
                        class="inline-block px-4 py-2 bg-[#CB1428] text-white text-sm rounded-full hover:bg-[#a61021] transition">
                        Visit Site
                    </a>
                </div>
            </div>

        </div>
    </section>

    <section class="py-16 px-4 sm:px-6 lg:px-8 bg-white" id="apply-now">
        <div class="max-w-7xl mx-auto text-center mb-12">
            <h2 class="text-3xl sm:text-4xl font-bold text-gray-800 mb-4" style="color: #CB1428;">
                Facilitaion Letter
            </h2>
            <p class="text-gray-600 text-lg max-w-2xl mx-auto">
                Choose from a variety of official requests including New Student, Visa Renewal, IBBC, HEC, and more - all tailored to meet your consular needs.
            </p>
        </div>
     
        <div class="relative max-w-6xl mx-auto"> 
          
            <button id="prevBtn" class="absolute -left-16 top-1/2 -translate-y-1/2 bg-red-700 hover:bg-red-800 text-white p-3 rounded-full shadow-lg z-20 focus:outline-none transition-transform duration-200 transform hover:scale-110 hidden md:block">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
            </button>
            <button id="nextBtn" class="absolute -right-16 top-1/2 -translate-y-1/2 bg-red-700 hover:bg-red-800 text-white p-3 rounded-full shadow-lg z-20 focus:outline-none transition-transform duration-200 transform hover:scale-110 hidden md:block">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
            </button>

           
            <div id="noc-carousel" class="flex items-center space-x-6 py-8 overflow-x-auto scroll-smooth scrollbar-hide">

                <div class="noc-card flex-shrink-0 w-64 md:w-72 lg:w-80 bg-white rounded-lg shadow-xl overflow-hidden cursor-pointer transition-all duration-500 ease-in-out" id="card-1">
                    <div class="relative">
                        <img src="{{ asset('assets/images/mosque.jpg') }}" alt="NOC New Student" class="w-full h-40 object-cover">
                        <div class="absolute bottom-0 left-0 bg-white p-2 rounded-tr-lg">
                            <svg class="w-5 h-5 text-red-700" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M4 4a2 2 0 012-2h4.586A2 2 0 0113 3.414L16.586 7A2 2 0 0117 8.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4zm2 6a1 1 0 011-1h6a1 1 0 110 2H7a1 1 0 01-1-1zm1 3a1 1 0 100 2h6a1 1 0 100-2H7z" clip-rule="evenodd"></path>
                            </svg>
                        </div>
                    </div>
                    <div class="px-6 py-4 text-center">
                        <h3 class="text-xl font-semibold text-gray-800 mb-4">New Admission</h3>
                    </div>
                    <a href="{{ route('noc.newstudent') }}" class="block w-full py-3 text-white font-medium text-lg text-center rounded-b-lg transition-all duration-300 hover:opacity-90" style="background-color: #CB1428;">Apply Now</a>
                </div>

                <div class="noc-card flex-shrink-0 w-64 md:w-72 lg:w-80 bg-white rounded-lg shadow-xl overflow-hidden cursor-pointer transition-all duration-500 ease-in-out" id="card-2">
                    <div class="relative">
                        <img src="{{ asset('assets/images/mosque.jpg') }}" alt="Visa Renewal" class="w-full h-40 object-cover">
                        <div class="absolute bottom-0 left-0 bg-white p-2 rounded-tr-lg">
                            <svg class="w-5 h-5 text-red-700" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M4 4a2 2 0 012-2h4.586A2 2 0 0113 3.414L16.586 7A2 2 0 0117 8.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4zm2 6a1 1 0 011-1h6a1 1 0 110 2H7a1 1 0 01-1-1zm1 3a1 1 0 100 2h6a1 1 0 100-2H7z" clip-rule="evenodd"></path>
                            </svg>
                        </div>
                    </div>
                    <div class="px-6 py-4 text-center">
                        <h3 class="text-xl font-semibold text-gray-800 mb-4">Visa</h3>
                    </div>
                    <a href="{{ route('noc.renewalvisa') }}" class="block w-full py-3 text-white font-medium text-lg text-center rounded-b-lg transition-all duration-300 hover:opacity-90" style="background-color: #CB1428;">Apply Now</a>
                </div>

                <div class="noc-card flex-shrink-0 w-64 md:w-72 lg:w-80 bg-white rounded-lg shadow-xl overflow-hidden cursor-pointer transition-all duration-500 ease-in-out" id="card-3">
                    <div class="relative">
                        <img src="{{ asset('assets/images/mosque.jpg') }}" alt="NOC IBBC" class="w-full h-40 object-cover">
                        <div class="absolute bottom-0 left-0 bg-white p-2 rounded-tr-lg">
                            <svg class="w-5 h-5 text-red-700" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M4 4a2 2 0 012-2h4.586A2 2 0 0113 3.414L16.586 7A2 2 0 0117 8.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4zm2 6a1 1 0 011-1h6a1 1 0 110 2H7a1 1 0 01-1-1zm1 3a1 1 0 100 2h6a1 1 0 100-2H7z" clip-rule="evenodd"></path>
                            </svg>
                        </div>
                    </div>
                    <div class="px-6 py-4 text-center">
                        <h3 class="text-xl font-semibold text-gray-800 mb-4">IBBC</h3>
                    </div>
                    <a href="{{ route('noc.ibbc') }}" class="block w-full py-3 text-white font-medium text-lg text-center rounded-b-lg transition-all duration-300 hover:opacity-90" style="background-color: #CB1428;">Apply Now</a>
                </div>
     
                <div class="noc-card flex-shrink-0 w-64 md:w-72 lg:w-80 bg-white rounded-lg shadow-xl overflow-hidden cursor-pointer transition-all duration-500 ease-in-out" id="card-4">
                    <div class="relative">
                        <img src="{{ asset('assets/images/mosque.jpg') }}" alt="NOC HEC" class="w-full h-40 object-cover">
                        <div class="absolute bottom-0 left-0 bg-white p-2 rounded-tr-lg">
                            <svg class="w-5 h-5 text-red-700" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M4 4a2 2 0 012-2h4.586A2 2 0 0113 3.414L16.586 7A2 2 0 0117 8.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4zm2 6a1 1 0 011-1h6a1 1 0 110 2H7a1 1 0 01-1-1zm1 3a1 1 0 100 2h6a1 1 0 100-2H7z" clip-rule="evenodd"></path>
                            </svg>
                        </div>
                    </div>
                    <div class="px-6 py-4 text-center">
                        <h3 class="text-xl font-semibold text-gray-800 mb-4">HEC</h3>
                    </div>
                    <a href="{{ route('noc.hec') }}" class="block w-full py-3 text-white font-medium text-lg text-center rounded-b-lg transition-all duration-300 hover:opacity-90" style="background-color: #CB1428;">Apply Now</a>
                </div>

                <div class="noc-card flex-shrink-0 w-64 md:w-72 lg:w-80 bg-white rounded-lg shadow-xl overflow-hidden cursor-pointer transition-all duration-500 ease-in-out" id="card-5">
                    <div class="relative">
                        <img src="{{ asset('assets/images/mosque.jpg') }}" alt="NOC for Trip" class="w-full h-40 object-cover">
                       
                        <div class="absolute bottom-0 left-0 bg-white p-2 rounded-tr-lg">
                            <svg class="w-5 h-5 text-red-700" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M4 4a2 2 0 012-2h4.586A2 2 0 0113 3.414L16.586 7A2 2 0 0117 8.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4zm2 6a1 1 0 011-1h6a1 1 0 110 2H7a1 1 0 01-1-1zm1 3a1 1 0 100 2h6a1 1 0 100-2H7z" clip-rule="evenodd"></path>
                            </svg>
                        </div>
                    </div>
                    <div class="px-6 py-4 text-center"> 
                        <h3 class="text-xl font-semibold text-gray-800 mb-4">Trip</h3> 
                    </div>
                    <a href="#" class="block w-full py-3 text-white font-medium text-lg text-center rounded-b-lg transition-all duration-300 hover:opacity-90" style="background-color: #CB1428;">Apply Now</a>
                </div>

            </div>
        </div>
    </section>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const carousel = document.getElementById('noc-carousel');
            const prevBtn = document.getElementById('prevBtn');
            const nextBtn = document.getElementById('nextBtn');

            const scrollAmount = carousel.querySelector('.noc-card').offsetWidth + 24; // 24px = space-x-6

            nextBtn.addEventListener('click', () => {
                const maxScrollLeft = carousel.scrollWidth - carousel.clientWidth;

                if (Math.ceil(carousel.scrollLeft) >= maxScrollLeft) {
                    // Scroll ulang ke awal
                    carousel.scrollTo({ left: 0, behavior: 'smooth' });
                } else {
                    carousel.scrollBy({ left: scrollAmount, behavior: 'smooth' });
                }
            });

            prevBtn.addEventListener('click', () => {
                if (carousel.scrollLeft <= 0) {
                    // Scroll ke akhir
                    carousel.scrollTo({ left: carousel.scrollWidth, behavior: 'smooth' });
                } else {
                    carousel.scrollBy({ left: -scrollAmount, behavior: 'smooth' });
                }
            });
        });
    </script>



@endsection