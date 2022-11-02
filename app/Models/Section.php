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

    public function teacher()
    {
        return $this->belongsTo(User::class);
    }

    public function grade_level()
    {
        return $this->belongsTo(GradeLevel::class);
    }

    protected $fillable = [
        'name',
        'capacity',

        'teacher_id',
        'grade_level_id',
    ];

    protected $appends = ['has_slot'];

    public function getHasSlotAttribute()
    {
        $taken_slots = Admission::query()
            ->where("academic_year_id", setting("academic_year_id"))
            ->where('section_id', $this->id)
            ->count();

        if ($taken_slots < $this->capacity) {
            return true;
        }

        return false;
    }
}
