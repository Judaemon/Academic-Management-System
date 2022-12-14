<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admission extends Model
{
    use HasFactory;

    protected $fillable = [
        'status',
        'academic_year_id',

        'student_id',
        'enrolled_by',
        'admit_to_grade_level',
        'section_id',
    ];

    public function academic_year()
    {
        return $this->belongsTo(AcademicYear::class);
    }

    public function student()
    {
        return $this->belongsTo(User::class);
    }

    public function enrolled_by_user()
    {
        return $this->belongsTo(User::class, 'enrolled_by', 'id');
    }

    public function grade_level()
    {
        return $this->belongsTo(GradeLevel::class, 'admit_to_grade_level', 'id');
    }

    public function section()
    {
        return $this->belongsTo(Section::class);
    }
}
