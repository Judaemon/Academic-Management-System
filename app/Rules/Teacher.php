<?php

namespace App\Rules;

use App\Models\User;
use Illuminate\Contracts\Validation\Rule;

class Teacher implements Rule
{
    public function __construct()
    {
        //
    }

    public function passes($attribute, $value)
    {
        return User::find($value)->isTeacher();
    }

    public function message()
    {
        return 'The selected user is not a teacher.';
    }
}
