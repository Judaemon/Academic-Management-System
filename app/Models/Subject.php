<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Subject extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    public function section()
    {
        return $this->belongsTo(Section::class);
    }

    public function teacher()
    {
        return $this->belongsTo(User::class);
    }

    public function grade_level()
    {
        return $this->belongsTo(GradeLevel::class);
    }

    public function grades()
    {
        return $this->hasOne(Grade::class);
    }

    protected $fillable = [
        'name',
        'subject_code',

        'teacher_id',
        'grade_level_id',
    ];
}
