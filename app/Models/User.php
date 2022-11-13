<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    protected $fillable = [
        'first_name',
        'middle_name',
        'last_name',
        'suffix',


        'birth_date',
        'birth_place',
        'nationality',
        'gender',
        'mother_tongue',
        'religion',

        'weight',
        'height',
        'pwd_id',

        'mobile_number',
        'email',
        'address',

        'kinder_name',
        'kinder_grad_date',

        'elementary_name',
        'elementary_grad_date',

        'junior_high_name',
        'junior_high_grad_date',

        'lrn',
        'esc',
        'qvr',

        'mother_name',
        'mother_number',
        'mother_email',
        'mother_address',

        'father_name',
        'father_number',
        'father_email',
        'father_address',

        'emergency_contact_name',
        'emergency_contact_relationship',
        'emergency_contact_number',
        'emergency_contact_address',

        'password',

        'pag_ibig',
        'philhealth',
        'sss',
        'tin',

        'email_verified_at',

        'grade_level',
        'latest_average_grade',
        'status',

        'grade_level_id',

        'currently_enrolled',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function isTeacher()
    {
        return $this->hasRole('Teacher');
    }

    public function subject()
    {
        return $this->hasMany(Subject::class);
    }

    public function sections()
    {
        return $this->hasMany(Section::class);
    }

    public function admission()
    {
        return $this->hasMany(Admission::class, 'student_id', 'id');
    }

    public function grades()
    {
        return $this->hasMany(Grade::class, 'student_id', 'id');
    }
}
