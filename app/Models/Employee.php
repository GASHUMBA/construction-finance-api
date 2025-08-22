<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    // Mass assignable fields
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone',
        'position',
        'salary',
        'hired_date',
        'department',
    ];

    // Optional: cast dates to Carbon instances
    protected $dates = [
        'hired_date',
        'created_at',
        'updated_at',
    ];
}
