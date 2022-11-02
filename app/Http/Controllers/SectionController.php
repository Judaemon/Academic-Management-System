<?php

namespace App\Http\Controllers;

use App\Models\Section;
use Illuminate\Http\Request;

class SectionController extends Controller
{
    public function index()
    {
        return view('sections.index');
    }

    // public function sectionsWithOpenSlots(Request $request)
    // {
    //     return Section::query()
    //         ->when(
    //             $request->search,
    //             fn (Builder $query) => $query
    //                 ->where(DB::raw('CONCAT_WS(" ", firstname, lastname)'), 'like', "%{$request->search}%")
    //                 ->orWhere('id', 'like', "%{$request->search}%")
    //         )
    //         ->when(
    //             $request->exists('selected'),
    //             fn (Builder $query) => $query->whereIn('id', $request->input('selected', [])),
    //             fn (Builder $query) => $query->limit(10)
    //         )
    //         ->orderBy('full_name')
    //         ->role('Student')
    //         ->get();
    // }
}
