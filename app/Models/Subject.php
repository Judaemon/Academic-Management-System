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
        return $this->belongsToMany(Section::class);
    }
    
    protected $fillable = [
        'name',
        'teacher_id',
        'subject_code',
    ];
}
