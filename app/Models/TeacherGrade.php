<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class TeacherGrade extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    protected $fillable = [
        'first_quarter',
        'second_quarter',
        'third_quarter',
        'fourth_quarter',

        'student_id',
        'section_id',
        'subject_id',
    ];
}
