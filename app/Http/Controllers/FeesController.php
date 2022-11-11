<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Http\Request;

use App\Models\Fee;

class FeesController extends Controller
{
    public function index()
    {
        return view('fees.index');
    }

    public function fees($id ,Request $request)
    {
        return Fee::query()
            ->select('id', 'fee_name', 'amount')
            ->orderBy('fee_name')
            ->where('grade_level_id', $id)
            ->orWhere('grade_level_id', NULL)
            ->when(
                $request->search,
                fn (Builder $query) => $query
                    ->where('id', 'like', "%{$request->search}%")
                    ->orWhere('fee_name', 'like', "%{$request->search}%")
            )
            ->when(
                $request->exists('selected'),
                fn (Builder $query) => $query->whereIn('id', $request->input('selected', [])),
                fn (Builder $query) => $query->limit(10)
            )
            ->get();
    }
}
