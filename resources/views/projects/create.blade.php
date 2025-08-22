{{-- resources/views/projects/create.blade.php --}}
@extends('layouts.app')

@section('title', 'Add Project')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-3xl font-bold text-gray-800 mb-6">➕ Add New Project</h1>

    {{-- Validation Errors --}}
    @if ($errors->any())
        <div class="bg-red-100 text-red-800 p-4 rounded-lg mb-4">
            <ul class="list-disc pl-6">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Back Button --}}
    <a href="{{ route('projects.index') }}" 
       class="inline-block mb-4 px-4 py-2 bg-gray-600 text-white rounded-lg hover:bg-gray-700">
       ⬅ Back to Projects
    </a>

    {{-- Create Project Form --}}
    <div class="bg-white shadow-lg rounded-2xl p-6">
        <form action="{{ route('projects.store') }}" method="POST">
            @csrf

            {{-- Project Name --}}
            <div class="mb-4">
                <label for="name" class="block text-gray-700 font-medium">Project Name</label>
                <input type="text" id="name" name="name" value="{{ old('name') }}"
                       class="w-full mt-2 p-2 border rounded-lg focus:ring focus:ring-blue-300"
                       required>
            </div>

            {{-- Client --}}
            <div class="mb-4">
                <label for="client" class="block text-gray-700 font-medium">Client</label>
                <input type="text" id="client" name="client" value="{{ old('client') }}"
                       class="w-full mt-2 p-2 border rounded-lg focus:ring focus:ring-blue-300"
                       required>
            </div> 
            <div class="mb-4">
                <label for="client" class="block text-gray-700 font-medium">Email</label>
                <input type="text" id="email" name="email" value="{{ old('email') }}"
                       class="w-full mt-2 p-2 border rounded-lg focus:ring focus:ring-blue-300"
                       required>
            </div>
             <div class="mb-4">
                <label for="phone" class="block text-gray-700 font-medium">Phone</label>
                <input type="text" id="phone" name="phone" value="{{ old('phone') }}"
                       class="w-full mt-2 p-2 border rounded-lg focus:ring focus:ring-blue-300"
                       required>
            </div>
              <div class="mb-4">
                <label for="adress" class="block text-gray-700 font-medium">Adress</label>
                <input type="text" id="adress" name="adress" value="{{ old('adress') }}"
                       class="w-full mt-2 p-2 border rounded-lg focus:ring focus:ring-blue-300"
                       required>    
            </div>

            {{-- Status --}}
            <div class="mb-4">
                <label for="status" class="block text-gray-700 font-medium">Status</label>
                <select id="status" name="status"
                        class="w-full mt-2 p-2 border rounded-lg focus:ring focus:ring-blue-300"
                        required>
                    <option value="Ongoing" {{ old('status') == 'Ongoing' ? 'selected' : '' }}>Ongoing</option>
                    <option value="Completed" {{ old('status') == 'Completed' ? 'selected' : '' }}>Completed</option>
                    <option value="Pending" {{ old('status') == 'Pending' ? 'selected' : '' }}>Pending</option>
                </select>
            </div>

            {{-- Deadline --}}
            <div class="mb-4">
                <label for="deadline" class="block text-gray-700 font-medium">Deadline</label>
                <input type="date" id="deadline" name="deadline" value="{{ old('deadline') }}"
                       class="w-full mt-2 p-2 border rounded-lg focus:ring focus:ring-blue-300"
                       required>
            </div>

            {{-- Budget --}}
            <div class="mb-4">
                <label for="budget" class="block text-gray-700 font-medium">Budget (RWF)</label>
                <input type="number" step="0.01" id="budget" name="budget" value="{{ old('budget') }}"
                       class="w-full mt-2 p-2 border rounded-lg focus:ring focus:ring-blue-300">
            </div>

            {{-- Submit Button --}}
            <div class="mt-6">
                <button type="submit" 
                        class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 shadow">
                    ✅ Save Project
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
