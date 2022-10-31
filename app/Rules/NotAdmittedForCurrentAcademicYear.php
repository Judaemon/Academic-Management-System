<?php

namespace App\Rules;

use App\Models\Admission;
use Illuminate\Contracts\Validation\Rule;

class NotAdmittedForCurrentAcademicYear implements Rule
{
    public function __construct()
    {
        //
    }

    public function passes($attribute, $value)
    {
        $hasAdmissionRecord = Admission::query()
            ->where("academic_year_id", setting("academic_year_id"))
            ->where('student_id', $value)
            ->exists();

        return !$hasAdmissionRecord;
    }

    public function message()
    {
        return 'The chosen student already has admission record.';
    }
}
