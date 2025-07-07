@extends('adminlte::page')

@section('title', 'Application Detail')

@section('content_header')
    <h1>Application Detail</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header bg-primary text-white">
            <strong>Applicant Info</strong>
        </div>
        @if ($errors->any())
            <div class="alert alert-danger mt-2">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="card-body">
            <div class="row mb-2">
                <div class="col-md-6"><strong>Type:</strong> {{ $application->type->name ?? 'NOC' }}</div>
                <div class="col-md-6"><strong>Full Name:</strong> {{ $application->fullname }}</div>
            </div>
            <div class="row mb-2">
                <div class="col-md-6"><strong>NIK:</strong> {{ $application->nik }}</div>
                <div class="col-md-6"><strong>Place of Birth:</strong> {{ $application->place_of_birth }}</div>
            </div>
            <div class="row mb-2">
                <div class="col-md-6"><strong>Date of Birth:</strong> {{ \Carbon\Carbon::parse($application->date_of_birth)->format('d M Y') }}</div>
                <div class="col-md-6"><strong>Nationality:</strong> {{ $application->nationality }}</div>
            </div>
            <div class="row mb-2">
                <div class="col-md-6"><strong>Passport Number:</strong> {{ $application->passport_number }}</div>
                <div class="col-md-6"><strong>Issued Date:</strong> {{ \Carbon\Carbon::parse($application->passport_issued_date)->format('d M Y') }}</div>
            </div>
            <div class="row mb-2">
                <div class="col-md-6"><strong>Expired Date:</strong> {{ \Carbon\Carbon::parse($application->passport_expired_date)->format('d M Y') }}</div>
                <div class="col-md-6">
                    <strong>Status:</strong>
                    <span class="badge bg-{{ match($application->status) {
                        'approved' => 'success',
                        'rejected', 'cancelled' => 'danger',
                        'reviewed' => 'primary',
                        default => 'warning',
                    } }}">
                        {{ ucfirst($application->status) }}
                    </span>
                </div>
            </div>
        </div>
    </div>

    @if ($application->members->count())
        <div class="card mt-4">
            <div class="card-header bg-info text-white">
                <strong>Family Members</strong>
            </div>
            <div class="card-body p-0">
                <table class="table table-striped table-bordered mb-0">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>NIK</th>
                            <th>Place of Birth</th>
                            <th>Date of Birth</th>
                            <th>Nationality</th>
                            <th>Relation</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($application->members as $member)
                            <tr>
                                <td>{{ $member->name }}</td>
                                <td>{{ $member->nik }}</td>
                                <td>{{ $member->pob }}</td>
                                <td>{{ \Carbon\Carbon::parse($member->dob)->format('d M Y') }}</td>
                                <td>{{ $member->nationality }}</td>
                                <td>{{ $member->relation }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif

    <div class="card mt-4">
        <div class="card-header bg-secondary text-white">
            <strong>Uploaded Documents</strong>
        </div>
        <div class="card-body">
            @php
                $documents = [
                    'surat_pengantar_ppmi' => 'Surat Pengantar PPMI',
                    'ektp' => 'E-KTP',
                    'surat_kemampuan_finansial' => 'Surat Kemampuan Finansial',
                    'surat_keterangan_kemenag' => 'Surat Keterangan Kemenag',
                    'passport' => 'Passport',
                    'ijazah' => 'Ijazah',
                    'surat_acceptance_universitas_pakistan' => 'Surat Acceptance Universitas Pakistan',
                ];
            @endphp

            <ul class="list-group">
                @foreach ($documents as $field => $label)
                    @if ($application->$field)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            {{ $label }}
                            <a href="{{ asset('storage/' . $application->$field) }}" target="_blank" class="btn btn-sm btn-outline-primary">
                                View
                            </a>
                        </li>
                    @endif
                @endforeach
            </ul>
        </div>
    </div>

    @if (!in_array($application->status, ['cancelled', 'rejected']))
        <div class="card mt-4">
            <div class="card-header bg-warning text-white">
                <strong>Admin Action</strong>
            </div>
            <div class="card-body">
                {{-- Comment Form --}}
                <form method="POST" action="{{ route('admin.application.comment', $application->id) }}">
                    @csrf
                    <div class="form-group mb-3">
                        <label for="comment">Comment:</label>
                        <textarea name="comment" id="comment" rows="4" class="form-control" required>{{ old('comment', $application->comment) }}</textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit Comment & Mark as Reviewed</button>
                </form>

                {{-- Reject Form --}}
                <form method="POST" action="{{ route('admin.application.reject', $application->id) }}" class="mt-3"
                    onsubmit="return confirm('Are you sure you want to reject this application?')">
                    @csrf
                    <button type="submit" class="btn btn-danger">Reject Application</button>
                </form>
            </div>
        </div>
    @endif

    @if ($application->status !== 'approved' && $application->status !== 'rejected' && $application->status !== 'cancelled')
        <div class="card mt-4">
            <div class="card-header bg-success text-white">Approve Application</div>
            <div class="card-body">
                <form action="{{ route('admin.application.approve', $application->id) }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-success">Approve</button>
                </form>
            </div>
        </div>
    @endif

    <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary mt-4">← Back to Dashboard</a>
@stop
