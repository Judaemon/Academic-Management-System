<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    use HasFactory;

    public function teacher()
    {
        return $this->belongsTo(User::class);
    }

    public function grade_level()
    {
        return $this->belongsTo(GradeLevel::class);
    }

    public function admission()
    {
        return $this->hasMany(admission::class);
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
