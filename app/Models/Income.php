<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Income extends Model
{
    use HasFactory;

    // Optional: explicitly set the table if you kept it singular
    // protected $table = 'income';

    protected $fillable = [
        'source',
        'received_by',
        'amount_paid',
        'amount_remaining',
        'date',
    ];

    protected $casts = [
        'date' => 'date',
        'amount_paid' => 'decimal:2',
        'amount_remaining' => 'decimal:2',
    ];
}
