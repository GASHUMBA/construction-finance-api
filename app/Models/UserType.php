<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserType extends Model
{
    use HasFactory;

    // Table name (optional if following Laravel conventions)
    protected $table = 'user_type';

    // Primary key (optional if 'id' is used)
    protected $primaryKey = 'id';

    // Mass assignable fields
    protected $fillable = [
        'type',
    ];

    // Disable timestamps if the table doesn't have created_at/updated_at
    public $timestamps = false;

    // Relationships example (if users belong to a type)
    public function users()
    {
        return $this->hasMany(User::class, 'user_type_id');
    }
}
