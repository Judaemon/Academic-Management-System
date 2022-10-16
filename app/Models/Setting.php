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
        'address',
        'academic_year',

        'profile_editing',
        'notification_type',
        'notify_grades',
        'notify_payments',

        'email',
        'mobile_1',
        'mobile_2',
        'telephone_1',

        'website_link',
        'facebook_link',
        'instagram_link',
        'twitter_link',
    ];
}
