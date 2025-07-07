@extends('layouts.app')

@section('title', 'NOC IBCC Preview')

@section('content')
<div class="max-w-3xl mx-auto bg-white p-12 border border-gray-300 text-[15px] leading-relaxed font-serif">
    <div class="text-center mb-6">
        <img src="{{ asset('path/to/garuda.png') }}" alt="Garuda Emblem" class="mx-auto w-12">
        <h2 class="font-bold uppercase text-[14px] mt-2">EMBASSY OF THE REPUBLIC OF INDONESIA<br>ISLAMABAD</h2>
    </div>

    <div class="mb-6">
        <p>No. <span class="underline">492/PK/ISL/III/2025</span></p>
    </div>

    <div class="mb-6">
        <p>The Deputy Director<br>
        Inter Board Committee of Chairman (IBCC)<br>
        Government of Pakistan<br>
        Islamabad.</p>
    </div>

    <div class="mb-6 font-bold underline">
        Subject: Request to HSSC Equivalence Certificate
    </div>

    <div class="mb-6">
        <p>Dear Sir,</p>
        <p>I have the honor to inform you that the following Indonesian student:</p>
        <p>
            Name: <span class="text-blue-700 font-semibold">{{ $fullname }}</span><br>
            Date & Place of Birth: <span class="text-blue-700 font-semibold">{{ $place_of_birth }}, {{ $date_of_birth }}</span><br>
            Passport No: <span class="text-blue-700 font-semibold">{{ $passport_number }}</span>
        </p>
        <p class="mt-4">
            {{-- is the holder of <span class="text-blue-700 font-semibold">{{ $school_name }}</span> dated <span class="text-red-600">{{ $graduation_date }}</span> <i>(copy enclosed)</i>, --}}
            which has been granted to him/her after completing 12 years of education.
            This is considered equivalent to the Higher Secondary School Certificate (HSSC) of the educational system in Pakistan.
        </p>
        <p class="mt-4">
            In this regard, it would be highly appreciated if the esteemed IBCC may kindly issue equivalence certificate of HSSC
            <span class="text-blue-700 font-semibold">{{ $name }}</span> for further continuation of his/her study at the
            <span class="text-blue-700 font-semibold">International Islamic University Islamabad (IIUI)</span>.
        </p>
        <p class="mt-4">Thanking you for your kind cooperation and with profound regards.</p>
    </div>

    <div class="flex justify-between items-end mt-12">
        <div></div>
        <div class="text-right">
            {{-- <p>Islamabad, {{ $letter_date }}</p> --}}
            <p class="mt-2 font-bold">Head of Protocol and Consular Affairs</p>
            <img src="{{ asset('path/to/stamp-signature.png') }}" alt="Signature" class="w-32 mt-2">
            <p class="mt-1">Rika Gartiaka<br><span class="text-gray-700">Second Secretary</span></p>
        </div>
    </div>
</div>
@endsection