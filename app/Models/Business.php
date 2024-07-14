<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Business extends Model
{
    use HasFactory;

    protected $fillable = [
        'trader_id',
        'name',
        'type',
        'location',
    ];

    /**
     * Get the trader that owns the business.
     */
    public function trader()
    {
        return $this->belongsTo(Trader::class);
    }
}
