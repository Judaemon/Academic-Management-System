<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fee extends Model
{
    use HasFactory;

    protected $fillable = [
        'fee_name',
        'academic_year_id',
    ];

    public function academic_year()
    {
        return $this->belongsTo(AcademicYear::class);
    }

}
