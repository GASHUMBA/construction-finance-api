<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'client',
        'email',
        'phone',
        'address',
        'status',
        'start_date',
        'deadline',
        'budget',
        'cost',
        'profit',
        'description',
        'manager_id',
    ];
}
