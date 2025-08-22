@extends('layouts.app')

@section('content')
<div class="container mx-auto py-6">
    <h1 class="text-2xl font-bold mb-4">Incomes</h1>

    <a href="{{ route('income.create') }}" class="btn bg-green-500 hover:bg-green-600 mb-4">Add Income</a>

    @if(session('success'))
        <div class="bg-green-100 text-green-700 p-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <div class="overflow-x-auto">
        <table class="min-w-full bg-white rounded shadow">
            <thead>
                <tr>
                    <th class="px-4 py-2 border">Source</th>
                    <th class="px-4 py-2 border">Received By</th>
                    <th class="px-4 py-2 border">Amount Paid</th>
                    <th class="px-4 py-2 border">Amount Remaining</th>
                    <th class="px-4 py-2 border">Date</th>
                    <th class="px-4 py-2 border">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($incomes as $income)
                    <tr class="hover:bg-gray-100">
                        <td class="px-4 py-2 border">{{ $income->source }}</td>
                        <td class="px-4 py-2 border">{{ $income->received_by }}</td>
                        <td class="px-4 py-2 border">${{ $income->amount_paid }}</td>
                        <td class="px-4 py-2 border">${{ $income->amount_remaining }}</td>
                        <td class="px-4 py-2 border">{{ $income->date->format('Y-m-d') }}</td>
                        <td class="px-4 py-2 border">
                            <a href="{{ route('income.edit', $income) }}" class="btn btn-edit mr-2">Edit</a>
                            <form action="{{ route('income.destroy', $income) }}" method="POST" class="inline-block" onsubmit="return confirm('Are you sure?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-delete">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                @if($incomes->isEmpty())
                    <tr>
                        <td colspan="6" class="px-4 py-2 border text-center">No incomes found.</td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
</div>
@endsection
