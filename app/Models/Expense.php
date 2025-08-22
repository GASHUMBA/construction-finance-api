<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    use HasFactory;

    // Mass assignable fields
    protected $fillable = [
        'title',       // Description or title of the expense
        'amount',      // Expense amount
        'category',    // Optional category
        'date',        // Date of expense
        'employee_id', // Optional: which employee made it
        'project_id',  // Optional: related project
        'notes',       // Optional notes
    ];

    // Relationships

    // An expense may belong to an employee
    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

    // An expense may belong to a project
    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}
