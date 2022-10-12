<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Section extends Authenticatable
{
    use HasApiTokens, Notifiable;

    public function subjects()
    {
        return $this->belongsToMany(Subject::class);
    }

    public function teachers()
    {
        return $this->hasMany(User::class);
    }

    protected $fillable = [
        'name',
        'capacity',
        'teacher_id',
        'grade_level_id',
    ];
}
