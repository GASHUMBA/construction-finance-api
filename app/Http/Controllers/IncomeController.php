<?php

namespace App\Http\Controllers;

use App\Models\Income;
use Illuminate\Http\Request;

class IncomeController extends Controller
{
    // Display a list of incomes
    public function index()
    {
        $incomes = Income::latest()->get();

    $monthlyIncomes = Income::selectRaw('MONTH(date) as month, SUM(amount_paid) as total')
    ->groupBy('month')
    ->pluck('total', 'month')
    ->toArray();
    return view('incomes.index', compact('incomes', 'monthlyIncomes'));
    }

    // Show the form to create a new income
    public function create()
    {
        return view('incomes.create');
    }

    // Store a new income
    public function store(Request $request)
    {
        $request->validate([
            'source' => 'required|string|max:255',
            'received_by' => 'required|string|max:255',
            'amount_paid' => 'required|numeric',
            'amount_remaining' => 'required|numeric',
            'date' => 'required|date',
        ]);

        Income::create($request->all());

        return redirect()->route('incomes.index')->with('success', 'Income added successfully!');
    }

    // Show a single income
    public function show(Income $income)
    {
        return view('incomes.show', compact('income'));
    }

    // Show the form to edit an income
    public function edit(Income $income)
    {
        return view('incomes.edit', compact('income'));
    }

    // Update an income
    public function update(Request $request, Income $income)
    {
        $request->validate([
            'source' => 'required|string|max:255',
            'received_by' => 'required|string|max:255',
            'amount_paid' => 'required|numeric',
            'amount_remaining' => 'required|numeric',
            'date' => 'required|date',
        ]);

        $income->update($request->all());

        return redirect()->route('incomes.index')->with('success', 'Income updated successfully!');
    }

    // Delete an income
    public function destroy(Income $income)
    {
        $income->delete();
        return redirect()->route('incomes.index')->with('success', 'Income deleted successfully!');
    }
}
