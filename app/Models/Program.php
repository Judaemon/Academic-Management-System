<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'starting_grade_level_id',
    ];

    public function grade_level()
    {
        return $this->hasMany(GradeLevel::class);
    }

    public function section()
    {
        return $this->hasManyThrough(Section::class, GradeLevel::class);
    }
}
