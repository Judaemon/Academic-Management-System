<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    public $fillable = [
        'system_name',
        'school_name',
        'logo',
        'address'
        ,
        'mobile_1',
        'mobile_2',
        'telephone_1',
    ];
}
