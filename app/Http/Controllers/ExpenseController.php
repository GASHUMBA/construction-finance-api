<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use Illuminate\Http\Request;

class ExpenseController extends Controller
{
    // Display a listing of expenses
    public function index()
    {
        $expenses = Expense::latest()->paginate(10); // paginate for professional listing
        return view('expenses.index', compact('expenses'));
    }

    // Show the form for creating a new expense
    public function create()
    {
        return view('expenses.create');
    }

    // Store a newly created expense
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'amount' => 'required|numeric|min:0',
            'description' => 'nullable|string',
            'date' => 'required|date',
        ]);

        Expense::create($request->all());
        return redirect()->route('expenses.index')->with('success', 'Expense created successfully.');
    }

    // Display a specific expense
    public function show(Expense $expense)
    {
        return view('expenses.show', compact('expense'));
    }

    // Show the form for editing an expense
    public function edit(Expense $expense)
    {
        return view('expenses.edit', compact('expense'));
    }

    // Update an expense
    public function update(Request $request, Expense $expense)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'amount' => 'required|numeric|min:0',
            'description' => 'nullable|string',
            'date' => 'required|date',
        ]);

        $expense->update($request->all());
        return redirect()->route('expenses.index')->with('success', 'Expense updated successfully.');
    }

    // Delete an expense
    public function destroy(Expense $expense)
    {
        $expense->delete();
        return redirect()->route('expenses.index')->with('success', 'Expense deleted successfully.');
    }
}
