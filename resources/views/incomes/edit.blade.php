@extends('layouts.app')

@section('content')
<div class="container mx-auto py-6 max-w-md">
    <h1 class="text-2xl font-bold mb-4">Edit Income</h1>

    @if ($errors->any())
        <div class="bg-red-100 text-red-700 p-3 rounded mb-4">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>- {{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('income.update', $income) }}" method="POST" class="bg-white p-6 rounded shadow">
        @csrf
        @method('PUT')
        <div class="mb-4">
            <label class="block mb-1">Source</label>
            <input type="text" name="source" class="w-full border px-3 py-2 rounded" value="{{ old('source', $income->source) }}" required>
        </div>
        <div class="mb-4">
            <label class="block mb-1">Received By</label>
            <input type="text" name="received_by" class="w-full border px-3 py-2 rounded" value="{{ old('received_by', $income->received_by) }}" required>
        </div>
        <div class="mb-4">
            <label class="block mb-1">Amount Paid</label>
            <input type="number" step="0.01" name="amount_paid" class="w-full border px-3 py-2 rounded" value="{{ old('amount_paid', $income->amount_paid) }}" required>
        </div>
        <div class="mb-4">
            <label class="block mb-1">Amount Remaining</label>
            <input type="number" step="0.01" name="amount_remaining" class="w-full border px-3 py-2 rounded" value="{{ old('amount_remaining', $income->amount_remaining) }}" required>
        </div>
        <div class="mb-4">
            <label class="block mb-1">Date</label>
            <input type="date" name="date" class="w-full border px-3 py-2 rounded" value="{{ old('date', $income->date->format('Y-m-d')) }}" required>
        </div>
        <button type="submit" class="btn bg-blue-500 hover:bg-blue-600">Update</button>
        <a href="{{ route('income.index') }}" class="btn bg-gray-400 hover:bg-gray-500 ml-2">Cancel</a>
    </form>
</div>
@endsection
