@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4">
    <h1 class="text-2xl font-bold mb-4">Employees</h1>
    <p class="mb-4">Manage your employees efficiently.</p>

    <div class="mb-4">
        <a href="{{ route('employees.create') }}" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded">
            Add Employee
        </a>
    </div>

    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <div class="overflow-x-auto">
        <table class="min-w-full border border-gray-300">
            <thead class="bg-gray-200">
                <tr>
                    <th class="py-2 px-4 border-b">ID</th>
                    <th class="py-2 px-4 border-b">First Name</th>
                     <th class="py-2 px-4 border-b">Last Name</th>
                    <th class="py-2 px-4 border-b">Email</th>
                    <th class="py-2 px-4 border-b">Phone</th>
                    <th class="py-2 px-4 border-b">Position</th>
                    <th class="py-2 px-4 border-b">Salary</th>
                    <th class="py-2 px-4 border-b">Date of Joining</th>
                    <th class="py-2 px-4 border-b">Department</th>
                    <th class="py-2 px-4 border-b">Created At</th>
                    <th class="py-2 px-4 border-b">Updated At</th>
                    <th class="py-2 px-4 border-b">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($employees as $employee)
                <tr class="hover:bg-gray-100">
                    <td class="py-2 px-4 border-b">{{ $employee->id }}</td>
                    <td class="py-2 px-4 border-b">{{ $employee->first_name }}</td>
                    <td class="py-2 px-4 border-b">{{ $employee->last_name }}</td>
                    <td class="py-2 px-4 border-b">{{ $employee->email }}</td>
                    <td class="py-2 px-4 border-b">{{ $employee->phone }}</td>
                    <td class="py-2 px-4 border-b">{{ $employee->position }}</td>
                    <td class="py-2 px-4 border-b">RWF {{ $employee->salary }}</td>
                    <td class="py-2 px-4 border-b">
    {{ $employee->hired_date ? date('Y-m-d', strtotime($employee->hired_date)) : 'N/A' }}
</td>

                    <td class="py-2 px-4 border-b">{{ $employee->department }}</td>
                    <td class="py-2 px-4 border-b">{{ $employee->created_at->format('Y-m-d H:i') }}</td>
                    <td class="py-2 px-4 border-b">{{ $employee->updated_at->format('Y-m-d H:i') }}</td>
                    <td class="py-2 px-4 border-b">
                        <a href="{{ route('employees.show', $employee->id) }}" class="text-blue-500 hover:underline">View</a> |
                        <a href="{{ route('employees.edit', $employee->id) }}" class="text-yellow-500 hover:underline">Edit</a> |
                        <form action="{{ route('employees.destroy', $employee->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Are you sure you want to delete this employee?')" class="text-red-500 hover:underline">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="py-4 px-4 text-center text-gray-500">
                        No employees found.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
