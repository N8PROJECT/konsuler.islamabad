@extends('layouts.app')

@section('title', 'Edit Application')

@section('content')
<div class="max-w-4xl mx-auto mt-12 mb-20 px-4">
    <h2 class="text-2xl font-bold text-red-600 mb-6">Edit Application</h2>

    @if (session('error'))
        <div class="bg-red-100 text-red-700 px-4 py-3 rounded mb-4">
            {{ session('error') }}
        </div>
    @endif

    @if ($application->comment)
        <div class="bg-yellow-50 border-l-4 border-yellow-400 p-4 rounded shadow-sm mb-6">
            <h3 class="text-lg font-semibold text-yellow-800 mb-2">Admin Comment</h3>
            <p class="text-sm text-gray-700 whitespace-pre-line">{{ $application->comment }}</p>
        </div>
    @endif

    <form action="{{ route('application.update', $application->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <input type="hidden" name="type_id" value="{{ $application->type_id }}">

        @if ($application->type_id == 4)
            <input type="hidden" name="renewal_for" value="{{ $application->renewal_for }}">
        @endif

        @php
            $config = config('noc')[$application->type_id];
            $subtype = $application->type_id == 4 ? ($config['subtypes'][$application->renewal_for] ?? []) : null;
            $fields = $subtype['fields'] ?? ($config['fields'] ?? []);
            $documents = $subtype['documents'] ?? ($config['documents'] ?? []);
        @endphp

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 mb-8">
            @foreach ($fields as $field => $label)
                <div>
                    <label class="block text-sm font-medium text-gray-700">{{ $label }}</label>
                    @if (str_contains($field, 'date'))
                        <input
                            type="date"
                            name="{{ $field }}"
                            value="{{ old($field, $application->$field ? \Carbon\Carbon::parse($application->$field)->format('Y-m-d') : '') }}"
                            class="mt-1 block w-full border border-gray-300 rounded px-3 py-2"
                        />
                    @else
                        <input type="text" name="{{ $field }}" value="{{ old($field, $application->$field) }}" class="mt-1 block w-full border border-gray-300 rounded px-3 py-2">
                    @endif
                    @error($field)
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
            @endforeach
        </div>

        {{-- Family Members jika ada --}}
        @if (($config['members'] ?? false) || ($application->type_id === 4 && $application->renewal_for === 'children'))
            <h3 class="text-lg font-semibold text-gray-700 mb-2">Family Members</h3>
            <div id="members-wrapper">
                @foreach ($application->members as $index => $member)
                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 mb-4">
                        <input type="hidden" name="members[{{ $index }}][id]" value="{{ $member->id }}">
                        <input type="text" name="members[{{ $index }}][name]" placeholder="Name" value="{{ $member->name }}" class="border px-3 py-2 rounded">
                        <input type="text" name="members[{{ $index }}][relation]" placeholder="Relation" value="{{ $member->relation }}" class="border px-3 py-2 rounded">
                        <input type="text" name="members[{{ $index }}][passport_number]" placeholder="Passport Number" value="{{ $member->passport_number }}" class="border px-3 py-2 rounded">
                    </div>
                @endforeach
            </div>
        @endif

        {{-- Dokumen --}}
        <h3 class="text-lg font-semibold text-gray-700 mb-2 mt-6">Uploaded Documents</h3>
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
            @foreach ($documents as $field => $label)
                <div>
                    <label class="block text-sm font-medium text-gray-700">{{ $label }}</label>
                    @if ($application->$field)
                        <div class="mt-1 mb-1">
                            <a href="{{ asset('storage/' . $application->$field) }}" target="_blank" class="text-blue-600 underline text-sm">View Current File</a>
                        </div>
                    @endif
                    <input type="file" name="{{ $field }}" class="mt-1 block w-full border border-gray-300 rounded px-3 py-2">
                    @error($field)
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
            @endforeach
        </div>

        <div class="mt-8">
            <button type="submit" class="bg-red-600 text-white px-6 py-2 rounded hover:bg-red-700">Update Application</button>
        </div>
    </form>
</div>
@endsection
