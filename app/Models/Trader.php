<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trader extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'phone',
        'age',
        'gender',
        // Add other fields as needed
    ];

    // Define relationships if applicable
    public function user()
    {
        return $this->belongsTo(User::class); // Assuming Trader belongs to User
    }
}
