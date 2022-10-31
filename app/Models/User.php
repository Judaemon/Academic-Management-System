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
        'firstname',
        'lastname',
        'email',
        'password',
        'middlename',
        'suffix',
        'birthdate',
        'birthplace',
        'religion',
        'gender',
        'mothertongue',
        'nationality',
        'pwdid',
        'height',
        'weight',
        'mobilenumber',
        'address',
        'school_kinder',
        'school_kindergrad',
        'school_elementary',
        'school_elementarygrad',
        'school_juniorhigh',
        'lrn',
        'esc',
        'qvr',
        'public_id',
        'beneficiary',
        'emergency_contact_name',
        'emergency_contact_number',
        'emergency_contact_occupation',
        'emergency_contact_address',
        'emergency_contact_relationship',
        'mparent_name',
        'mparent_number',
        'mparent_occupation',
        'mparent_address',
        'fparent_name',
        'fparent_number',
        'fparent_occupation',
        'fparent_address',
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
}
