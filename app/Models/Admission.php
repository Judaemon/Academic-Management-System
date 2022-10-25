<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admission extends Model
{
    use HasFactory;

    public function student_id()
    {
        return $this->belongsTo(User::class);
    }

    protected $fillable = [
        'status',
        'enrolled_by',
        'date_enrolled',
        'section_id',
        'student_id',
    ];
}
