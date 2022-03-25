<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Purpose extends Model
{
    use HasFactory, SoftDeletes;

    const CREDITS = 0;
    const SAVINGS = 1;

    protected $fillable = [
        'user_id',
        'type',
        'amount',
        'interest',
        'available_balance'
    ];

    // Relationship
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function transactions()
    {
        return $this->hasMany(HistoryTransaction::class);
    }
}
