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
        'public',
        'beneficiary',
        'guardian_name',
        'guardian_number',
        'guardian_occupation',
        'guardian_address',
        'guardian_relationship',
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

    public function sections()
    {
        return $this->hasMany(Section::class);
    }
}
