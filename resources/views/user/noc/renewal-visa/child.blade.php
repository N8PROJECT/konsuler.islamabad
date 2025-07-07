@extends('layouts.app')

@section('title', 'Visa for Spouse')

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
                Visa for Child
            </h1>
            <p class="text-2xl text-red-600" style="letter-spacing: 1px;">
                Child Form
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
            <input type="hidden" name="renewal_for" value="children">

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
                        <label for="">Passport Number</label>
                        <input type="text" name="passport_number" placeholder="Passport Number" class="w-full h-11 px-3 border border-gray-400 rounded">
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
                    Family Information
                </h2>
            </div>
            <div id="family-forms" class="max-w-6xl mx-auto space-y-12">
                <!-- Form family member akan ditambahkan di sini -->
            </div>

            <!-- Add Member Button -->
            <div class="max-w-6xl mx-auto text-center mt-8">
                <button type="button" id="add-member" class="bg-[#CB1428] text-white px-6 py-2 rounded hover:bg-[#a71120] transition">
                    + Add Member
                </button>
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
                            <label class="text-center">Surat Pengantar PPMI</label>

                            <!-- Wrapper Upload -->
                            <div id="upload-wrapper-ppmi" class="w-full max-w-sm flex justify-center gap-4">
                                <button type="button"
                                    id="upload-btn-ppmi"
                                    onclick="document.getElementById('surat_pengantar_ppmi').click()"
                                    class="bg-[#CB1428] text-white px-4 py-2 rounded hover:bg-[#a71120] transition">
                                    Upload
                                </button>
                                <input type="file" name="surat_pengantar_ppmi" id="surat_pengantar_ppmi" class="hidden">
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
                            <label class="text-center">Passport Ayah</label>

                            <!-- Wrapper Upload -->
                            <div id="upload-wrapper-passport_ayah" class="w-full max-w-sm flex justify-center gap-4">
                                <button type="button"
                                    id="upload-btn-passport_ayah"
                                    onclick="document.getElementById('passport_ayah').click()"
                                    class="bg-[#CB1428] text-white px-4 py-2 rounded hover:bg-[#a71120] transition">
                                    Upload
                                </button>
                                <input type="file" name="passport_ayah" id="passport_ayah" class="hidden">
                            </div>
                        </div>
                    </div>
                    <div class="grid gap-1">
                        <div class="flex flex-col items-center gap-4 w-full">
                            <label class="text-center">Passport Ibu</label>

                            <!-- Wrapper Upload -->
                            <div id="upload-wrapper-passport_ibu" class="w-full max-w-sm flex justify-center gap-4">
                                <button type="button"
                                    id="upload-btn-passport_ibu"
                                    onclick="document.getElementById('passport_ibu').click()"
                                    class="bg-[#CB1428] text-white px-4 py-2 rounded hover:bg-[#a71120] transition">
                                    Upload
                                </button>
                                <input type="file" name="passport_ibu" id="passport_ibu" class="hidden">
                            </div>
                        </div>
                    </div>
                    <div class="grid gap-1">
                        <div class="flex flex-col items-center gap-4 w-full">
                            <label class="text-center">Bonafide Suami/Istri</label>

                            <!-- Wrapper Upload -->
                            <div id="upload-wrapper-bonafide_suami_istri" class="w-full max-w-sm flex justify-center gap-4">
                                <button type="button"
                                    id="upload-btn-bonafide_suami_istri"
                                    onclick="document.getElementById('bonafide_suami_istri').click()"
                                    class="bg-[#CB1428] text-white px-4 py-2 rounded hover:bg-[#a71120] transition">
                                    Upload
                                </button>
                                <input type="file" name="bonafide_suami_istri" id="bonafide_suami_istri" class="hidden">
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

    <template id="member-template">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-x-20 gap-y-8 border-t pt-8">
            <div class="grid gap-1">
                <label>Full Name</label>
                <input type="text" name="members[0][name]" placeholder="Full Name" class="w-full h-11 px-3 border border-gray-400 rounded">
            </div>
            <div class="grid gap-1">
                <label>Passport Number</label>
                <input type="text" name="members[0][passport_number]" placeholder="Passport Number" class="w-full h-11 px-3 border border-gray-400 rounded">
            </div>
            <div class="grid gap-1">
                <label>Nationality</label>
                <input type="text" name="members[0][nationality]" placeholder="Nationality" class="w-full h-11 px-3 border border-gray-400 rounded">
            </div>
            <div class="grid gap-1">
                <label>Passport Issued Date</label>
                <input type="date" name="members[0][passport_issued_date]" class="w-full h-11 px-3 border border-gray-400 rounded">
            </div>
            <div class="grid gap-1">
                <label>Relation</label>
                <input type="text" name="members[0][relation]" placeholder="Relationship (e.g. Spouse)" class="w-full h-11 px-3 border border-gray-400 rounded">
            </div>
            <div class="grid gap-1">
                <label>Passport Expired Date</label>
                <input type="date" name="members[0][passport_expired_date]" class="w-full h-11 px-3 border border-gray-400 rounded">
            </div>
        </div>
    </template>

    <script>
        document.getElementById('add-member').addEventListener('click', function () {
            const template = document.getElementById('member-template');
            const clone = template.content.cloneNode(true);
            document.getElementById('family-forms').appendChild(clone);
        });
    </script>

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

            handleFileUpload('surat_pengantar_ppmi', 'upload-wrapper-ppmi');
            handleFileUpload('passport', 'upload-wrapper-passport');
            handleFileUpload('passport_ibu', 'upload-wrapper-passport_ibu');
            handleFileUpload('passport_ayah', 'upload-wrapper-passport_ayah');
            handleFileUpload('bonafide_suami_istri', 'upload-wrapper-bonafide_suami_istri');
            handleFileUpload('visa', 'upload-wrapper-visa');
        });
    </script>

@endsection