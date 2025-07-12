@extends('layouts.app')

@section('title', 'Application')

@section('content')

    {{-- Hero Section --}}
    <section class="relative min-h-[68vh] flex items-center justify-center">
        <div class="absolute inset-0 bg-cover bg-center bg-no-repeat"
            style="background-image: url('{{ asset('assets/images/application.png') }}');">
            <div class="absolute inset-0 bg-white/50"></div>
        </div>
        <div class="relative z-10 text-center px-4 sm:px-6 lg:px-8 max-w-3xl mx-auto">
            <h1 class="text-4xl sm:text-5xl md:text-6xl lg:text-xl xl:text-3xl font-bold mb-6 leading-tight"
                style="color: #494949; letter-spacing: 1px;">
                Embassy of Indonesia - Islamabad
            </h1>
            <p class="text-2xl text-red-600" style="letter-spacing: 1px;">
                Application List
            </p>
        </div>
    </section>

    {{-- Main Table --}}
    <div class="max-w-6xl mx-auto mt-12 mb-20 px-4">

        {{-- On Process --}}
        <h2 class="text-xl font-bold text-red-600 mb-2">On Process</h2>
        <div class="overflow-x-auto">
            <table class="w-full border-collapse">
                <thead>
                    <tr class="text-left text-sm text-gray-600 border-b">
                        <th class="py-2 w-1/4">Name</th>
                        <th class="py-2 w-1/4">Date</th>
                        <th class="py-2 w-1/4">Status</th>
                        <th class="py-2 w-1/4">Action</th>
                    </tr>
                </thead>
                <tbody class="text-sm">
                    @forelse ($onProcess as $app)
                        <tr class="border-b">
                            <td class="py-3">{{ $app->type->name ?? 'NOC' }}</td>
                            <td class="py-3">{{ \Carbon\Carbon::parse($app->created_at)->format('d M Y') }}</td>
                            <td class="py-3 text-yellow-600 font-medium capitalize">{{ $app->status }}</td>
                            <td class="py-3">
                                <div class="flex gap-2">
                                    <a href="{{ route('application.show', $app->id) }}" class="bg-green-600 hover:bg-green-700 text-white px-3 py-1 rounded text-xs">View</a>

                                    @if ($app->status === 'pending')
                                        <form action="{{ route('application.destroy', $app->id) }}" method="POST" onsubmit="return confirm('Are you sure?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded text-xs">Delete</button>
                                        </form>
                                    @endif
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="4" class="py-3 text-center text-gray-500">No on-process application.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{-- Recently Processed --}}
        <h2 class="text-xl font-bold text-red-600 mt-10 mb-2">Recently Visa/NOC</h2>
        <div class="overflow-x-auto">
            <table class="w-full border-collapse">
                <thead>
                    <tr class="text-left text-sm text-gray-600 border-b">
                        <th class="py-2 w-1/4">Name</th>
                        <th class="py-2 w-1/4">Date</th>
                        <th class="py-2 w-1/4">Status</th>
                        <th class="py-2 w-1/4">Action</th>
                    </tr>
                </thead>
                <tbody class="text-sm">
                    @forelse ($recently as $app)
                        <tr class="border-b">
                            <td class="py-3">{{ $app->type->name ?? 'NOC' }}</td>
                            <td class="py-3">{{ \Carbon\Carbon::parse($app->created_at)->format('d M Y') }}</td>
                            <td class="py-3">
                                <span class="text-sm font-medium {{ match($app->status) {
                                    'approved' => 'text-green-600',
                                    'rejected', 'cancelled' => 'text-red-600',
                                    'reviewed' => 'text-blue-600',
                                    default => 'text-yellow-600',
                                } }}">
                                    {{ ucfirst($app->status) }}
                                </span>
                            </td>
                            <td class="py-3">
                                <div class="flex gap-2">
                                    @if ($app->status !== 'cancelled')
                                        <a href="{{ route('application.show', $app->id) }}" class="bg-green-600 hover:bg-green-700 text-white px-3 py-1 rounded text-xs">View</a>
                                    @endif

                                    @if ($app->status === 'pending')
                                        <form action="{{ route('application.destroy', $app->id) }}" method="POST" onsubmit="return confirm('Are you sure?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded text-xs">Delete</button>
                                        </form>
                                    @endif

                                    @if ($app->status === 'reviewed')
                                        <a href="{{ route('application.edit', $app->id) }}" class="bg-yellow-500 hover:bg-yellow-600 text-white px-3 py-1 rounded text-xs">Edit</a>
                                    @endif

                                    @if ($app->status === 'approved' && $app->noc)
                                        <a href="{{ asset(str_replace('public/', 'storage/', $app->noc)) }}" 
                                        target="_blank"
                                        class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-1 rounded text-xs">
                                            ⬇️ Download
                                        </a>
                                    @endif
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="4" class="py-3 text-center text-gray-500">No recent application.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

@endsection