@extends('layouts.app')

@section('title', 'NOC Renewal Visa')

@section('content')

    {{-- Hero Section --}}
    <section class="relative min-h-[68vh] flex items-center justify-center">
        <div class="absolute inset-0 bg-cover bg-center bg-no-repeat"
            style="background-image: url('{{ asset('assets/images/renewal-visa.png') }}');">
            <div class="absolute inset-0 bg-white/50"></div>
        </div>

        <div class="relative z-10 text-center px-4 sm:px-6 lg:px-8 max-w-3xl mx-auto">
            <h1 class="text-4xl sm:text-5xl md:text-6xl lg:text-xl xl:text-3xl font-bold mb-6 leading-tight"
                style="color: #494949; letter-spacing: 1px;">
                Facilitation Letter
            </h1>
            <p class="text-2xl text-red-600" style="letter-spacing: 1px;">
                Renewal Visa Form
            </p>
        </div>
    </section>

    <section class="py-16 px-4 sm:px-6 lg:px-8 bg-white" id="apply-now">
        <div class="max-w-6xl mx-auto">
            <div class="flex flex-wrap justify-center gap-6">

                {{-- Card 1 --}}
                <div class="w-64 md:w-72 lg:w-80 bg-white rounded-lg shadow-xl overflow-hidden cursor-pointer transition-all duration-500 ease-in-out">
                    <div class="relative">
                        <img src="{{ asset('assets/images/visa/image.png') }}" alt="For Student" class="w-full h-40 object-cover">
                        <div class="absolute bottom-0 left-0 bg-white p-2 rounded-tr-lg">
                            <svg class="w-5 h-5 text-red-700" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M4 4a2 2 0 012-2h4.586A2 2 0 0113 3.414L16.586 7A2 2 0 0117 8.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4zm2 6a1 1 0 011-1h6a1 1 0 110 2H7a1 1 0 01-1-1zm1 3a1 1 0 100 2h6a1 1 0 100-2H7z" clip-rule="evenodd" />
                            </svg>
                        </div>
                    </div>
                    <div class="px-6 py-4 text-center">
                        <h3 class="text-xl font-semibold text-gray-800 mb-4">For Student</h3>
                    </div>
                    <a href="{{ route('renewalvisa.student') }}" class="block w-full py-3 text-white font-medium text-lg text-center rounded-b-lg hover:opacity-90" style="background-color: #CB1428;">Apply Now</a>
                </div>

                {{-- Card 2 --}}
                <div class="w-64 md:w-72 lg:w-80 bg-white rounded-lg shadow-xl overflow-hidden cursor-pointer transition-all duration-500 ease-in-out">
                    <div class="relative">
                        <img src="{{ asset('assets/images/visa/image (1).png') }}" alt="For Spouse" class="w-full h-40 object-cover">
                        <div class="absolute bottom-0 left-0 bg-white p-2 rounded-tr-lg">
                            <svg class="w-5 h-5 text-red-700" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M4 4a2 2 0 012-2h4.586A2 2 0 0113 3.414L16.586 7A2 2 0 0117 8.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4zm2 6a1 1 0 011-1h6a1 1 0 110 2H7a1 1 0 01-1-1zm1 3a1 1 0 100 2h6a1 1 0 100-2H7z" clip-rule="evenodd" />
                            </svg>
                        </div>
                    </div>
                    <div class="px-6 py-4 text-center">
                        <h3 class="text-xl font-semibold text-gray-800 mb-4">For Spouse</h3>
                    </div>
                    <a href="{{ route('renewalvisa.spouse') }}" class="block w-full py-3 text-white font-medium text-lg text-center rounded-b-lg hover:opacity-90" style="background-color: #CB1428;">Apply Now</a>
                </div>

                {{-- Card 3 --}}
                <div class="w-64 md:w-72 lg:w-80 bg-white rounded-lg shadow-xl overflow-hidden cursor-pointer transition-all duration-500 ease-in-out">
                    <div class="relative">
                        <img src="{{ asset('assets/images/visa/image (2).png') }}" alt="For Child" class="w-full h-40 object-cover">
                        <div class="absolute bottom-0 left-0 bg-white p-2 rounded-tr-lg">
                            <svg class="w-5 h-5 text-red-700" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M4 4a2 2 0 012-2h4.586A2 2 0 0113 3.414L16.586 7A2 2 0 0117 8.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4zm2 6a1 1 0 011-1h6a1 1 0 110 2H7a1 1 0 01-1-1zm1 3a1 1 0 100 2h6a1 1 0 100-2H7z" clip-rule="evenodd" />
                            </svg>
                        </div>
                    </div>
                    <div class="px-6 py-4 text-center">
                        <h3 class="text-xl font-semibold text-gray-800 mb-4">For Child</h3>
                    </div>
                    <a href="{{ route('renewalvisa.child') }}" class="block w-full py-3 text-white font-medium text-lg text-center rounded-b-lg hover:opacity-90" style="background-color: #CB1428;">Apply Now</a>
                </div>

            </div>
        </div>
    </section>


@endsection