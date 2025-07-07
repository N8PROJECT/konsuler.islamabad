@extends('layouts.app')

@section('title', 'Application Detail')

@section('content')
<div class="max-w-4xl mx-auto mt-12 mb-20 px-4">
    <h2 class="text-2xl font-bold text-red-600 mb-6">Application Detail</h2>

    {{-- Info Utama --}}
    <div class="grid grid-cols-2 gap-6 text-sm">
        {{-- Status dan Type --}}
        <div>
            <p class="text-gray-500">Type</p>
            <p class="font-medium">{{ $application->type->name ?? 'NOC' }}</p>
        </div>
        <div>
            <p class="text-gray-500">Status</p>
            @php
                $color = match($application->status) {
                    'approved' => 'text-green-600',
                    'rejected', 'cancelled' => 'text-red-600',
                    'reviewed' => 'text-blue-600',
                    default => 'text-yellow-600',
                };
            @endphp
            <p class="font-medium {{ $color }}">{{ $application->status_label }}</p>
        </div>

        {{-- Field Default --}}
        @php
            $baseFields = $fieldSets[$application->type_id]['fields'] ?? [];
        @endphp

        @foreach ($baseFields as $field => $label)
            @php
                $value = $application->$field;
                $formatted = in_array($field, [
                    'date_of_birth', 'passport_issued_date', 'passport_expired_date',
                    'visa_start_date', 'visa_expired_date', 'dob',
                    'dob_spouse', 'passport_issued_date_spouse', 'passport_expired_date_spouse', 
                    'graduation_date', 'refer_letter_date',
                ]) ? ($value ? \Carbon\Carbon::parse($value)->format('d M Y') : null) : $value;
            @endphp
            @if ($value)
                <div>
                    <p class="text-gray-500">{{ $label }}</p>
                    <p class="font-medium">{{ $formatted }}</p>
                </div>
            @endif
        @endforeach

        {{-- Field Tambahan (Spouse/Children/etc) --}}
        @php
            $subFields = ($application->type_id == 4 && isset($fieldSets[4]['subtypes'][$application->renewal_for]))
                ? $fieldSets[4]['subtypes'][$application->renewal_for]['fields'] ?? []
                : [];
        @endphp

        @if (!empty($subFields))
            <div class="col-span-2 mt-4">
                <h3 class="text-md font-semibold text-gray-700">
                    {{ ucfirst($application->renewal_for) }} Information
                </h3>
            </div>
        @endif

        @foreach ($subFields as $field => $label)
            @continue(isset($baseFields[$field]))
            @php
                $value = $application->$field;
                $formatted = in_array($field, [
                    'date_of_birth', 'passport_issued_date', 'passport_expired_date',
                    'visa_start_date', 'visa_expired_date', 'dob',
                    'dob_spouse', 'passport_issued_date_spouse', 'passport_expired_date_spouse'
                ]) ? ($value ? \Carbon\Carbon::parse($value)->format('d M Y') : null) : $value;
            @endphp
            @if ($value)
                <div>
                    <p class="text-gray-500">{{ $label }}</p>
                    <p class="font-medium">{{ $formatted }}</p>
                </div>
            @endif
        @endforeach
    </div>

    {{-- Family Members --}}
    @if ($application->members->count())
        <h3 class="text-xl font-bold mt-10 mb-2">Family Members</h3>
        <div class="overflow-x-auto">
            <table class="min-w-[1000px] w-full text-sm border-collapse">
                <thead class="text-left text-gray-600 border-b bg-gray-100">
                    <tr>
                        <th class="py-2 px-3">Name</th>
                        <th class="py-2 px-3">ID Number</th>
                        <th class="py-2 px-3">PoB</th>
                        <th class="py-2 px-3">DoB</th>
                        <th class="py-2 px-3">Nationality</th>
                        <th class="py-2 px-3">Relation</th>
                        <th class="py-2 px-3">Passport Number</th>
                        <th class="py-2 px-3">Passport Issued</th>
                        <th class="py-2 px-3">Passport Expired</th>
                        <th class="py-2 px-3">Visa Start</th>
                        <th class="py-2 px-3">Visa Expired</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($application->members as $member)
                        <tr class="border-b hover:bg-gray-50">
                            <td class="py-2 px-3">{{ $member->name }}</td>
                            <td class="py-2 px-3">{{ $member->nik }}</td>
                            <td class="py-2 px-3">{{ $member->pob }}</td>
                            <td class="py-2 px-3">{{ $member->dob ? \Carbon\Carbon::parse($member->dob)->format('d M Y') : '-' }}</td>
                            <td class="py-2 px-3">{{ $member->nationality }}</td>
                            <td class="py-2 px-3">{{ $member->relation }}</td>
                            <td class="py-2 px-3">{{ $member->passport_number }}</td>
                            <td class="py-2 px-3">{{ $member->passport_issued_date ? \Carbon\Carbon::parse($member->passport_issued_date)->format('d M Y') : '-' }}</td>
                            <td class="py-2 px-3">{{ $member->passport_expired_date ? \Carbon\Carbon::parse($member->passport_expired_date)->format('d M Y') : '-' }}</td>
                            <td class="py-2 px-3">{{ $member->visa_start_date ? \Carbon\Carbon::parse($member->visa_start_date)->format('d M Y') : '-' }}</td>
                            <td class="py-2 px-3">{{ $member->visa_expired_date ? \Carbon\Carbon::parse($member->visa_expired_date)->format('d M Y') : '-' }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif

    {{-- Uploaded Documents --}}
    @php
        $documents = ($application->type_id == 4 && isset($fieldSets[4]['subtypes'][$application->renewal_for]))
            ? $fieldSets[4]['subtypes'][$application->renewal_for]['documents'] ?? []
            : $fieldSets[$application->type_id]['documents'] ?? [];
    @endphp

    <h3 class="text-xl font-bold mt-10 mb-4">Uploaded Documents</h3>
    <div class="grid grid-cols-2 gap-4 text-sm">
        @foreach ($documents as $field => $label)
            @if ($application->$field)
                <div>
                    <p class="text-gray-500">{{ $label }}</p>
                    <a href="{{ asset('storage/' . $application->$field) }}" target="_blank" class="text-blue-600 underline">View File</a>
                </div>
            @endif
        @endforeach
    </div>

    {{-- Admin Comment --}}
    @if ($application->comment)
        <div class="mt-12 bg-yellow-50 border-l-4 border-yellow-400 p-4 rounded shadow-sm">
            <h3 class="text-lg font-semibold text-yellow-800 mb-2">Admin Comment</h3>
            <p class="text-sm text-gray-700 whitespace-pre-line">{{ $application->comment }}</p>
        </div>
    @endif

    <div class="mt-10">
        <a href="{{ route('applications') }}" class="text-blue-600 hover:underline text-sm">&larr; Back to Applications</a>
    </div>
</div>
@endsection
