@extends('layouts.app')

@section('content')
<div class="container mx-auto py-6 max-w-md">
    <h1 class="text-2xl font-bold mb-4">Income Details</h1>

    <div class="bg-white p-6 rounded shadow">
        <p><strong>Source:</strong> {{ $income->source }}</p>
        <p><strong>Received By:</strong> {{ $income->received_by }}</p>
        <p><strong>Amount Paid:</strong> ${{ $income->amount_paid }}</p>
        <p><strong>Amount Remaining:</strong> ${{ $income->amount_remaining }}</p>
        <p><strong>Date:</strong> {{ $income->date->format('Y-m-d') }}</p>
    </div>

    <a href="{{ route('income.index') }}" class="btn bg-gray-400 hover:bg-gray-500 mt-4 inline-block">Back</a>
</div>
@endsection
