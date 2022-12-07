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
        'refunder_account_id',
        'academic_year_id',
        'amount_paid',
        'payment_method',
        'fee_id',
        'balance',
        'others',
        'payment_status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function fee()
    {
        return $this->belongsTo(Fee::class, 'fee_id', 'id');
    }

    public function academic_year()
    {
        return $this->belongsTo(AcademicYear::class, 'academic_year_id', 'id');
    }

    public function accountant()
    {
        return $this->belongsTo(User::class, 'accountant_id', 'id');
    }

    public function refund()
    {
        return $this->belongsTo(User::class, 'refunder_account_id', 'id');
    }
}
