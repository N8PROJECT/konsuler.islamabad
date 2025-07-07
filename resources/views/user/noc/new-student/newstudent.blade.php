@extends('layouts.app')

@section('title', 'NOC New Student')

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
                Facilitation Letter
            </h1>
            <p class="text-2xl text-red-600" style="letter-spacing: 1px;">
                New Admission
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

            <input type="hidden" name="type_id" value="1">

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
                        <label for="">ID Number</label>
                        <input type="text" name="nik" placeholder="ID Number" class="w-full h-11 px-3 border border-gray-400 rounded">
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
                </div>
            </div>

            <div class="max-w-4xl sm:max-w-6xl lg:max-w-7xl mx-auto text-center mb-12">
                <h2 class="text-2xl sm:text-3xl font-bold text-gray-600 mb-4">
                    Additional Information
                </h2>
            </div>

            <div class="max-w-6xl mx-auto">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-x-20 gap-y-8 mb-10">
                    <div class="grid gap-1">
                        <label for="">Next University</label>
                        <input type="text" name="universitas_selanjutnya" placeholder="Next University" class="w-full h-11 px-3 border border-gray-400 rounded">
                    </div>
                    <div class="grid gap-1">
                        <label for="">Refer Letter Number</label>
                        <input type="text" name="refer_letter_number" placeholder="Refer Letter Number" class="w-full h-11 px-3 border border-gray-400 rounded">
                    </div>
                    <div class="grid gap-1">
                        <label for="">Major</label>
                        <input type="text" name="major" placeholder="Major" class="w-full h-11 px-3 border border-gray-400 rounded">
                    </div>
                    <div class="grid gap-1">
                        <label for="">Refer Letter Date</label>
                        <input type="date" name="refer_letter_date" class="w-full h-11 px-3 border border-gray-400 rounded">
                    </div>
                    <div class="grid gap-1">
                        <label for="">Refer Letter</label>
                        <input type="text" name="refer_letter" placeholder="Refer Letter" class="w-full h-11 px-3 border border-gray-400 rounded">
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
                            <label class="text-center">Surat Kemampuan Finansial</label>

                            <!-- Wrapper Upload -->
                            <div id="upload-wrapper-finansial" class="w-full max-w-sm flex justify-center gap-4">
                                <button type="button"
                                    id="upload-btn-finansial"
                                    onclick="document.getElementById('surat_kemampuan_finansial').click()"
                                    class="bg-[#CB1428] text-white px-4 py-2 rounded hover:bg-[#a71120] transition">
                                    Upload
                                </button>
                                <input type="file" name="surat_kemampuan_finansial" id="surat_kemampuan_finansial" class="hidden">
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

                    <!-- Upload Kanan -->
                    <div class="grid gap-1">
                        <div class="flex flex-col items-center gap-4 w-full">
                            <label class="text-center">E-KTP</label>

                            <!-- Wrapper Upload -->
                            <div id="upload-wrapper-ektp" class="max-w-sm flex justify-center gap-4">
                                <button type="button"
                                    id="upload-btn-ektp"
                                    onclick="document.getElementById('e_ktp').click()"
                                    class="w-full bg-[#CB1428] text-white px-4 py-2 rounded hover:bg-[#a71120] transition">
                                    Upload
                                </button>
                                <input type="file" name="ektp" id="e_ktp" class="hidden">
                            </div>
                        </div>
                    </div>
                    <div class="grid gap-1">
                        <div class="flex flex-col items-center gap-4 w-full">
                            <label class="text-center">Surat Keterangan Kemenag</label>

                            <!-- Wrapper Upload -->
                            <div id="upload-wrapper-kemenag" class="max-w-sm flex justify-center gap-4">
                                <button type="button"
                                    id="upload-btn-kemenag"
                                    onclick="document.getElementById('surat_keterangan_kemenag').click()"
                                    class="w-full bg-[#CB1428] text-white px-4 py-2 rounded hover:bg-[#a71120] transition">
                                    Upload
                                </button>
                                <input type="file" name="surat_keterangan_kemenag" id="surat_keterangan_kemenag" class="hidden">
                            </div>
                        </div>
                    </div>
                    <div class="grid gap-1">
                        <div class="flex flex-col items-center gap-4 w-full">
                            <label class="text-center">Ijazah</label>

                            <!-- Wrapper Upload -->
                            <div id="upload-wrapper-ijazah" class="max-w-sm flex justify-center gap-4">
                                <button type="button"
                                    id="upload-btn-ijazah"
                                    onclick="document.getElementById('ijazah').click()"
                                    class="w-full bg-[#CB1428] text-white px-4 py-2 rounded hover:bg-[#a71120] transition">
                                    Upload
                                </button>
                                <input type="file" name="ijazah" id="ijazah" class="hidden">
                            </div>
                        </div>
                    </div>
                    <div class="grid gap-1">
                        <div class="flex flex-col items-center gap-4 w-full">
                            <label class="text-center">Kartu Keluarga</label>

                            <!-- Wrapper Upload -->
                            <div id="upload-wrapper-keluarga" class="max-w-sm flex justify-center gap-4">
                                <button type="button"
                                    id="upload-btn-keluarga"
                                    onclick="document.getElementById('kartu_keluarga').click()"
                                    class="w-full bg-[#CB1428] text-white px-4 py-2 rounded hover:bg-[#a71120] transition">
                                    Upload
                                </button>
                                <input type="file" name="kartu_keluarga" id="kartu_keluarga" class="hidden">
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
                <label>ID Number</label>
                <input type="text" name="members[0][nik]" placeholder="ID Number" class="w-full h-11 px-3 border border-gray-400 rounded">
            </div>
            <div class="grid gap-1">
                <label>Place of Birth</label>
                <input type="text" name="members[0][pob]" placeholder="Place of Birth" class="w-full h-11 px-3 border border-gray-400 rounded">
            </div>
            <div class="grid gap-1">
                <label>Address</label>
                <input type="text" name="members[0][address]" placeholder="Address" class="w-full h-11 px-3 border border-gray-400 rounded">
            </div>
            <div class="grid gap-1">
                <label>Date of Birth</label>
                <input type="date" name="members[0][dob]" class="w-full h-11 px-3 border border-gray-400 rounded">
            </div>
            <div class="grid gap-1">
                <label>Relationship to you</label>
                <input type="text" name="members[0][relation]" placeholder="Relationship (e.g. Spouse)" class="w-full h-11 px-3 border border-gray-400 rounded">
            </div>
            <div class="grid gap-1">
                <label>Nationality</label>
                <input type="text" name="members[0][nationality]" placeholder="Nationality" class="w-full h-11 px-3 border border-gray-400 rounded">
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
            handleFileUpload('e_ktp', 'upload-wrapper-ektp');
            handleFileUpload('surat_kemampuan_finansial', 'upload-wrapper-finansial');
            handleFileUpload('surat_keterangan_kemenag', 'upload-wrapper-kemenag');
            handleFileUpload('passport', 'upload-wrapper-passport');
            handleFileUpload('ijazah', 'upload-wrapper-ijazah');
            handleFileUpload('kartu_keluarga', 'upload-wrapper-keluarga');
        });
    </script>

@endsection