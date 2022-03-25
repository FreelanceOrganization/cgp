<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class HistoryTransaction extends Model
{
    use HasFactory, SoftDeletes;

    const TYPE_DEPOSIT = 0;
    const TYPE_WITHDRAW = 1;
    const TYPE_PAY_DEBTS = 2;
    const TYPE_ADD_DEBTS = 3;

    protected $fillable = [
        'purpose_id',
        'transaction_type',
        'amount',
        'status',
    ];

    // Relationship
    public function purpose()
    {
        return $this->belongsTo(Purpose::class);
    }

}
