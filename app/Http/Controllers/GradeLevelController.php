<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\GradeLevel;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;

class GradeLevelController extends Controller
{
    public function index()
    {
        return view('grade-levels.index');
    }

    public function grade_level(Request $request)
    {
        return GradeLevel::query()
            ->when(
                $request->search,
                fn (Builder $query) => $query
                    ->where('name', 'like', "%{$request->search}%")
                    ->orWhere('id', 'like', "%{$request->search}%")
            )
            ->when(
                $request->exists('selected'),
                fn (Builder $query) => $query->whereIn('id', $request->input('selected', [])),
                fn (Builder $query) => $query->limit(10)
            )
            ->orderBy('name')
            ->get();
    }
}
