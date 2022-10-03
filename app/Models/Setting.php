<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    public $fillable = [
        'institute_name',
        'institute_acronym',
        'logo',
        'address'
        ,
        'mobile_1',
        'mobile_2',
        'telephone_1',
    ];
}
