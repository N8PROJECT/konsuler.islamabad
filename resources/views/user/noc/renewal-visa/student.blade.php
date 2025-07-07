@extends('layouts.app')

@section('title', 'Renewal Visa for Student')

@section('content')

    {{-- Hero Section --}}
    <section class="relative min-h-[68vh] flex items-center justify-center">
        <div class="absolute inset-0 bg-cover bg-center bg-no-repeat"
            style="background-image: url('{{ asset('assets/images/noc-new-student-header.png') }}');">
            <div class="absolute inset-0 bg-white/50"></div>
        </div>

        <div class="relative z-10 text-center px-4 sm:px-6 lg:px-8 max-w-3xl mx-auto">
            <h1 class="text-4xl sm:text-5xl md:text-6xl lg:text-xl xl:text-3xl font-bold mb-6 leading-tight"
                style="color: #494949; letter-spacing: 1px;">
                Visa for Student
            </h1>
            <p class="text-2xl text-red-600" style="letter-spacing: 1px;">
                Student Form
            </p>
        </div>
    </section>

    <section class="py-16 px-4 sm:px-6 lg:px-8 bg-white">
        <form action="{{ route('application.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            @if ($errors->any())
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6 max-w-3xl mx-auto">
                    <ul class="list-disc list-inside">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <input type="hidden" name="type_id" value="4">
            <input type="hidden" name="renewal_for" value="student">

            <div class="max-w-4xl sm:max-w-6xl lg:max-w-7xl mx-auto text-center mb-12">
                <h2 class="text-2xl sm:text-3xl font-bold text-gray-600 mb-4">
                    Personal Information
                </h2>
            </div>

            <div class="max-w-6xl mx-auto">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-x-20 gap-y-8 mb-10">
                    <div class="grid gap-1">
                        <label for="">Full Name</label>
                        <input type="text" name="fullname" placeholder="Full Name" class="w-full h-11 px-3 border border-gray-400 rounded">
                    </div>
                    <div class="grid gap-1">
                        <label for="">Visa Expired Date</label>
                        <input type="date" name="visa_expired_date" class="w-full h-11 px-3 border border-gray-400 rounded">
                    </div>
                    <div class="grid gap-1">
                        <label for="">Place of Birth</label>
                        <input type="text" name="place_of_birth" placeholder="Place of Birth" class="w-full h-11 px-3 border border-gray-400 rounded">
                    </div>
                    <div class="grid gap-1">
                        <label for="">Passport Number</label>
                        <input type="text" name="passport_number" placeholder="Passport Number" class="w-full h-11 px-3 border border-gray-400 rounded">
                    </div>
                    <div class="grid gap-1">
                        <label for="">Date of Birth</label>
                        <input type="date" name="date_of_birth" class="w-full h-11 px-3 border border-gray-400 rounded">
                    </div>
                    <div class="grid gap-1">
                        <label for="">Passport Issued Date</label>
                        <input type="date" name="passport_issued_date" class="w-full h-11 px-3 border border-gray-400 rounded">
                    </div>
                    <div class="grid gap-1">
                        <label for="">Nationality</label>
                        <input type="text" name="nationality" placeholder="Nationality" class="w-full h-11 px-3 border border-gray-400 rounded">
                    </div>
                    <div class="grid gap-1">
                        <label for="">Passport Expired Date</label>
                        <input type="date" name="passport_expired_date" class="w-full h-11 px-3 border border-gray-400 rounded">
                    </div>
                    <div class="grid gap-1">
                        <label for="">Visa Start Date</label>
                        <input type="date" name="visa_start_date" class="w-full h-11 px-3 border border-gray-400 rounded">
                    </div>
                </div>
            </div>

            <div class="max-w-4xl sm:max-w-6xl lg:max-w-7xl mx-auto text-center mb-12 mt-20">
                <h2 class="text-2xl sm:text-3xl font-bold text-gray-600 mb-4">
                    Upload Document
                </h2>
            </div>

            <!-- Upload File Section -->
            <div class="max-w-6xl mx-auto mb-16">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-x-20 gap-y-8">

                    <!-- Upload Kiri -->
                    <div class="grid gap-1">
                        <div class="flex flex-col items-center gap-4 w-full">
                            <label class="text-center">Bukti Lapor Diri (Portal Peduli WNI)</label>

                            <!-- Wrapper Upload -->
                            <div id="upload-wrapper-lapor" class="w-full max-w-sm flex justify-center gap-4">
                                <button type="button"
                                    id="upload-btn-lapor"
                                    onclick="document.getElementById('bukti_lapor_diri').click()"
                                    class="bg-[#CB1428] text-white px-4 py-2 rounded hover:bg-[#a71120] transition">
                                    Upload
                                </button>
                                <input type="file" name="bukti_lapor_diri" id="bukti_lapor_diri" class="hidden">
                            </div>
                        </div>
                    </div>
                    <div class="grid gap-1">
                        <div class="flex flex-col items-center gap-4 w-full">
                            <label class="text-center">Passport</label>

                            <!-- Wrapper Upload -->
                            <div id="upload-wrapper-passport" class="w-full max-w-sm flex justify-center gap-4">
                                <button type="button"
                                    id="upload-btn-passport"
                                    onclick="document.getElementById('passport').click()"
                                    class="bg-[#CB1428] text-white px-4 py-2 rounded hover:bg-[#a71120] transition">
                                    Upload
                                </button>
                                <input type="file" name="passport" id="passport" class="hidden">
                            </div>
                        </div>
                    </div>
                    <div class="grid gap-1">
                        <div class="flex flex-col items-center gap-4 w-full">
                            <label class="text-center">Bonafide</label>

                            <!-- Wrapper Upload -->
                            <div id="upload-wrapper-bonafide" class="w-full max-w-sm flex justify-center gap-4">
                                <button type="button"
                                    id="upload-btn-bonafide"
                                    onclick="document.getElementById('bonafide').click()"
                                    class="bg-[#CB1428] text-white px-4 py-2 rounded hover:bg-[#a71120] transition">
                                    Upload
                                </button>
                                <input type="file" name="bonafide" id="bonafide" class="hidden">
                            </div>
                        </div>
                    </div>
                    <div class="grid gap-1">
                        <div class="flex flex-col items-center gap-4 w-full">
                            <label class="text-center">Visa</label>

                            <!-- Wrapper Upload -->
                            <div id="upload-wrapper-visa" class="max-w-sm flex justify-center gap-4">
                                <button type="button"
                                    id="upload-btn-visa"
                                    onclick="document.getElementById('visa').click()"
                                    class="w-full bg-[#CB1428] text-white px-4 py-2 rounded hover:bg-[#a71120] transition">
                                    Upload
                                </button>
                                <input type="file" name="visa" id="visa" class="hidden">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Continue Button -->
            <div class="max-w-6xl mx-auto mt-12">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-x-20">
                    <div class="md:col-span-2">
                        <button type="submit" class="w-full bg-[#CB1428] text-white text-lg font-semibold py-3 rounded hover:bg-[#a71120] transition tracking-wide uppercase">
                            Continue
                        </button>
                    </div>
                </div>
            </div>

        </form>
    </section>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const handleFileUpload = (inputId, wrapperId) => {
                const fileInput = document.getElementById(inputId);
                const wrapper = document.getElementById(wrapperId);
                const uploadBtn = wrapper.querySelector('button');

                fileInput.addEventListener('change', () => {
                    if (fileInput.files.length > 0) {
                        const file = fileInput.files[0];
                        const fileName = file.name;
                        const fileURL = URL.createObjectURL(file);

                        // Sembunyikan tombol Upload
                        uploadBtn.style.display = 'none';

                        // Buat elemen info file
                        const fileInfo = document.createElement('div');
                        fileInfo.className = 'file-info flex items-center gap-4';
                        fileInfo.innerHTML = `
                            <span class="text-gray-700 truncate max-w-[200px]">${fileName}</span>
                            <a href="${fileURL}" target="_blank"
                                class="ml-4 bg-green-600 text-white px-3 py-1 rounded hover:bg-green-700 transition text-sm">
                                View
                            </a>
                        `;

                        // Tambahkan ke wrapper
                        wrapper.appendChild(fileInfo);
                    }
                });
            };

            handleFileUpload('bukti_lapor_diri', 'upload-wrapper-lapor');
            handleFileUpload('passport', 'upload-wrapper-passport');
            handleFileUpload('bonafide', 'upload-wrapper-bonafide');
            handleFileUpload('visa', 'upload-wrapper-visa');
        });
    </script>

@endsection