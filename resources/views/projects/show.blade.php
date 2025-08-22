{{-- resources/views/projects/show.blade.php --}}
@extends('layouts.app')

@section('title', 'Project Details')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-3xl font-bold text-gray-800 mb-6">📋 Project Details</h1>

    {{-- Back Button --}}
    <a href="{{ route('projects.index') }}" 
       class="inline-block mb-4 px-4 py-2 bg-gray-600 text-white rounded-lg hover:bg-gray-700">
       ⬅ Back to Projects
    </a>

    {{-- Project Details Card --}}
    <div class="bg-white shadow-lg rounded-2xl p-6">
        <h2 class="text-2xl font-semibold text-gray-700 mb-4">{{ $project->name }}</h2>

        <div class="mb-3">
            <strong class="text-gray-700">Client:</strong>
            <span class="ml-2 text-gray-600">{{ $project->client }}</span>
        </div>

        <div class="mb-3">
            <strong class="text-gray-700">Status:</strong>
            <span class="ml-2 px-2 py-1 rounded text-sm
                @if($project->status === 'Ongoing') bg-blue-200 text-blue-800
                @elseif($project->status === 'Completed') bg-green-200 text-green-800
                @else bg-yellow-200 text-yellow-800 @endif">
                {{ $project->status }}
            </span>
        </div>

        <div class="mb-3">
            <strong class="text-gray-700">Deadline:</strong>
            <span class="ml-2 text-gray-600">{{ \Carbon\Carbon::parse($project->deadline)->format('M d, Y') }}</span>
        </div>

        <div class="mb-3">
            <strong class="text-gray-700">Budget:</strong>
            <span class="ml-2 text-gray-600">${{ number_format($project->budget, 2) }}</span>
        </div>

        <div class="mb-3">
            <strong class="text-gray-700">Created At:</strong>
            <span class="ml-2 text-gray-600">{{ $project->created_at->format('M d, Y h:i A') }}</span>
        </div>

        <div class="mb-3">
            <strong class="text-gray-700">Last Updated:</strong>
            <span class="ml-2 text-gray-600">{{ $project->updated_at->format('M d, Y h:i A') }}</span>
        </div>

        {{-- Action Buttons --}}
        <div class="mt-6 flex gap-4">
            <a href="{{ route('projects.edit', $project->id) }}" 
               class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700">
               ✏️ Edit
            </a>

            <form action="{{ route('projects.destroy', $project->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" 
                        onclick="return confirm('Are you sure you want to delete this project?')"
                        class="bg-red-600 text-white px-4 py-2 rounded-lg hover:bg-red-700">
                    🗑️ Delete
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
