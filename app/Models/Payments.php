<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payments extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'accountant_id',
        'amount_paid',
        'fee_id',
        // 'payment_status',
        'others_payment',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function school_fee()
    {
        return $this->belongsTo(Fee::class);
    }
}
