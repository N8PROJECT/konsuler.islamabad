@extends('layouts.app')

@section('title', 'New Student Application')

@section('content')
    <h1 class="text-2xl font-bold mb-4">New Student Application</h1>

    @if(session('success'))
        <div class="bg-green-200 text-green-800 p-2 rounded mb-4">{{ session('success') }}</div>
    @endif

    @if ($errors->any())
        <div class="bg-red-200 text-red-800 p-2 rounded mb-4">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>• {{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('applications.store') }}" enctype="multipart/form-data" class="space-y-4">
        @csrf
        <input type="hidden" name="type_id" value="1">

        <!-- Pemohon -->
        <h2 class="text-lg font-semibold">Data Pemohon</h2>
        <div>
            <label>Full Name</label>
            <input type="text" name="fullname" class="w-full border p-2" required>
        </div>
        <div>
            <label>Nationality</label>
            <input type="text" name="nationality" class="w-full border p-2" required>
        </div>
        <div>
            <label>Passport Number</label>
            <input type="text" name="passport_number" class="w-full border p-2" required>
        </div>
        <div>
            <label>Issued Date</label>
            <input type="date" name="passport_issued_date" class="w-full border p-2" required>
        </div>
        <div>
            <label>Expiry Date</label>
            <input type="date" name="passport_expired_date" class="w-full border p-2" required>
        </div>
        <div>
            <label>NIK</label>
            <input type="text" name="nik" class="w-full border p-2" required>
        </div>
        <div>
            <label>Place of Birth</label>
            <input type="text" name="place_of_birth" class="w-full border p-2" required>
        </div>
        <div>
            <label>Date of Birth</label>
            <input type="date" name="date_of_birth" class="w-full border p-2" required>
        </div>

        <!-- Members (repeatable) -->
        <h2 class="text-lg font-semibold mt-6">Family Members (optional)</h2>
        <div id="members-container"></div>
        <button type="button" onclick="addMember()" class="bg-blue-500 text-white px-4 py-1 rounded">Add Member</button>

        <!-- Upload File -->
        <h2 class="text-lg font-semibold mt-6">Upload Documents</h2>
        @php
            $files = [
                'surat_pengantar_ppmi', 'passport', 'ektp', 'kartu_keluarga',
                'ijazah', 'surat_kemampuan_finansial',
                'surat_acceptance_universitas_pakistan', 'surat_keterangan_kemenag'
            ];
        @endphp

        @foreach ($files as $field)
            <div>
                <label class="capitalize">{{ str_replace('_', ' ', $field) }}</label>
                <input type="file" name="{{ $field }}" class="w-full border p-2" required>
            </div>
        @endforeach

        <button type="submit" class="bg-green-600 text-white px-6 py-2 mt-4 rounded">Submit Application</button>
    </form>

    <script>
        let memberIndex = 0;
        function addMember() {
            const container = document.getElementById('members-container');
            const memberFields = `
                <div class="border p-3 mb-4 rounded bg-gray-50">
                    <h3 class="font-semibold mb-2">Member</h3>
                    <input type="text" name="members[${memberIndex}][name]" placeholder="Name" class="w-full border p-2 mb-2" required>
                    <input type="text" name="members[${memberIndex}][nik]" placeholder="NIK" class="w-full border p-2 mb-2">
                    <input type="text" name="members[${memberIndex}][pob]" placeholder="Place of Birth" class="w-full border p-2 mb-2">
                    <input type="date" name="members[${memberIndex}][dob]" placeholder="Date of Birth" class="w-full border p-2 mb-2">
                    <input type="text" name="members[${memberIndex}][nationality]" placeholder="Nationality" class="w-full border p-2 mb-2" required>
                    <input type="text" name="members[${memberIndex}][relation]" placeholder="Relation" class="w-full border p-2 mb-2" required>
                    <input type="text" name="members[${memberIndex}][address]" placeholder="Address" class="w-full border p-2 mb-2">
                </div>
            `;
            container.insertAdjacentHTML('beforeend', memberFields);
            memberIndex++;
        }
    </script>
@endsection
