<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;

    // Table name (optional if it follows Laravel convention 'reports')
    protected $table = 'reports';

    // Mass assignable fields
    protected $fillable = [
        'title',
        'description',
        'report_type',
        'generated_by',
        'data', // optional: store JSON or other info
    ];
}
