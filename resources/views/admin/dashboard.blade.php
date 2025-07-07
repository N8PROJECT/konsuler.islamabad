@extends('adminlte::page')

@section('title', 'Admin Dashboard')

@section('content_header')
    <h1>All Applications</h1>
@stop

@section('content')
    <div class="table-responsive">
        <table class="table table-bordered table-hover">
            <thead class="table-light">
                <tr>
                    <th>ID</th>
                    <th>User</th>
                    <th>Type</th>
                    <th>Status</th>
                    <th>Submitted At</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($applications as $app)
                    <tr>
                        <td>{{ $app->id }}</td>
                        <td>{{ $app->user->name }}</td>
                        <td>{{ $app->type->name ?? '-' }}</td>
                        <td>
                            <span class="badge bg-{{ match($app->status) {
                                'approved' => 'success',
                                'rejected' => 'danger',
                                'cancelled' => 'danger',
                                'reviewed' => 'primary',
                                default => 'warning',
                            } }}">
                                {{ ucfirst($app->status) }}
                            </span>
                        </td>
                        <td>{{ $app->created_at->format('d M Y') }}</td>
                        <td>
                            @if ($app->status !== 'cancelled')
                                <a href="{{ route('admin.application.show', $app->id) }}" class="btn btn-sm btn-info">View</a>
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center">No applications found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@stop
