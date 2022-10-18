<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fee extends Model
{
    use HasFactory;

    protected $fillable = [
        'fee_name',
        'amount',
        'grade_level_id',
    ];

    public function grade_level()
    {
        return $this->belongsTo(GradeLevel::class);
    }

}
