{{-- resources/views/projects/index.blade.php --}}
@extends('layouts.app')

@section('title', 'Projects')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-3xl font-bold text-gray-800 mb-6">🏗️ Projects</h1>

    {{-- Success Message --}}
    @if(session('success'))
        <div class="bg-green-100 text-green-800 p-4 rounded-lg mb-4">
            {{ session('success') }}
        </div>
    @endif

    {{-- Add Project Button --}}
    <div class="mb-4">
        <a href="{{ route('projects.create') }}" 
           class="bg-blue-600 text-white px-4 py-2 rounded-lg shadow hover:bg-blue-700">
            ➕ Add New Project
        </a>
    </div>

    {{-- Projects Table --}}
    <div class="bg-white shadow-lg rounded-2xl p-6">
        <table class="w-full border-collapse">
            <thead>
                <tr class="bg-gray-100 text-left">
                     <th class="p-3 border">ID</th>
                    <th class="p-3 border">Name</th>
                    <th class="p-3 border">Client</th>
                     <th class="p-3 border">Email</th>
                      <th class="p-3 border">Phone</th>
                       <th class="p-3 border">Adress</th>
                    <th class="p-3 border">Status</th>
                    <th class="p-3 border">Deadline</th>
                    <th class="p-3 border">Budget</th>
                    <th class="p-3 border">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($projects as $project)
                    <tr class="hover:bg-gray-50">
                        <td class="p-3 border">{{ $project->id }}</td>
                        <td class="p-3 border">{{ $project->name }}</td>
                        <td class="p-3 border">{{ $project->client }}</td>
                        <td class="p-3 border">{{ $project->email }}</td>
                        <td class="p-3 border">{{ $project->phone }}</td>
                        <td class="p-3 border">{{ $project->adress}}</td>
                        <td class="p-3 border">
                            <span class="px-2 py-1 rounded text-sm
                                @if($project->status === 'Ongoing') bg-blue-200 text-blue-800 
                                @elseif($project->status === 'Completed') bg-green-200 text-green-800 
                                @else bg-yellow-200 text-yellow-800 @endif">
                                {{ $project->status }}
                            </span>
                        </td>
                        <td class="p-3 border">{{ \Carbon\Carbon::parse($project->deadline)->format('M d, Y') }}</td>
                        <td class="p-3 border">${{ number_format($project->budget, 2) }}</td>
                        <td class="p-3 border flex gap-2">
                            <a href="{{ route('projects.show', $project->id) }}" 
                               class="text-blue-600 hover:underline">View</a>
                            <a href="{{ route('projects.edit', $project->id) }}" 
                               class="text-green-600 hover:underline">Edit</a>
                            <form action="{{ route('projects.destroy', $project->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" 
                                        class="text-red-600 hover:underline"
                                        onclick="return confirm('Are you sure you want to delete this project?')">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="p-3 text-center text-gray-500">No projects found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- Pagination --}}
    <div class="mt-4">
        {{ $projects->links() }}
    </div>
</div>
@endsection
