<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class HistoryTransaction extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'purpose_id',
        'transaction_type',
        'amount',
        'status',
        'available_balance'
    ];

    // Relationship
    public function purpose()
    {
        return $this->belongsTo(Purpose::class);
    }

}
