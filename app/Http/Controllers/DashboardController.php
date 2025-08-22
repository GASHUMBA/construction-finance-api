<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Project;
use App\Models\Employee; // Singular
use App\Models\Expense;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
   
public function index()
{
    $employeesCount = Employee::count();
    $projectsCount  = Project::count();
    $clientsCount   = User::where('role','client')->count();
    $revenue        = Project::where('status','completed')->sum('budget');
    $totalExpenses  = Expense::sum('amount');
    
    $latestEmployees = Employee::latest()->take(5)->get(); // Add this!

    return view('dashboard', compact(
        'employeesCount',
        'projectsCount',
        'clientsCount',
        'revenue',
        'totalExpenses',
        'latestEmployees' // <-- make sure it's here
    ));
}
}