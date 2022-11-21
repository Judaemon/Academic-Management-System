<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AcademicYear extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'is_open_for_admission',
        'status',

        'start_date',
        'school_days',
        'end_date',
    ];
}
