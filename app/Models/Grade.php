<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Grade extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    public function student()
    {
        return $this->belongsTo(User::class);
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function section()
    {
        return $this->belongsTo(Section::class);
    }

    public function grades()
    {
        return $this->hasMany(Grade::class, 'student_id', 'id');
    }

    // public function section_students()
    // {
    //     return $this->hasMany(Section::class, 'section_id', 'id');
    // }

    protected $fillable = [
        'student_id',
        'subject_id',
        'first_quarter',
        'second_quarter',
        'third_quarter',
        'fourth_quarter',

        'student_id',
        'section_id',
        'subject_id',
    ];
}
