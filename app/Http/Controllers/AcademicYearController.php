<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\AcademicYear;

class AcademicYearController extends Controller
{
    public function index()
    {
        return view('academic-years.index');
    }

    public function academic_year(Request $request)
    {
        return AcademicYear::query()
            ->select('id', 'title', DB::raw("CONCAT(start_date, ' to ', end_date) AS date"))
            ->when(
                $request->search,
                fn (Builder $query) => $query
                    ->where('title', 'like', "%{$request->search}%")
                    ->orWhere('id', 'like', "%{$request->search}%")
            )
            ->when(
                $request->exists('selected'),
                fn (Builder $query) => $query->whereIn('id', $request->input('selected', [])),
                fn (Builder $query) => $query->limit(10)
            )
            ->orderBy('title')
            ->get();
    }
}
