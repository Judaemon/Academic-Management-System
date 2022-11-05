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

    protected $fillable = [
        'first_quarter',
        'second_quarter',
        'third_quarter',
        'fourth_quarter',

        'student_id',
        'subject_id',
    ];
}
