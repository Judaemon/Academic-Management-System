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
        'payment_method',
        'fee_id',
        'remaining_total',
        'others',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function fee()
    {
        return $this->belongsTo(Fee::class, 'fee_id', 'id');
    }

    public function accountant()
    {
        return $this->belongsTo(User::class, 'accountant_id', 'id');
    }
}
