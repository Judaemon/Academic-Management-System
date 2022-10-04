<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payments extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'payment_value',
        'academic_year_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function academic_year()
    {
        return $this->belongsTo(AcademicYear::class);
    }
}
