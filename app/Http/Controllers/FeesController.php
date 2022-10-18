<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Fee;

class FeesController extends Controller
{
    public function index()
    {
        return view('fees.index');
    }

    public function fees(Request $request)
    {
        return Fee::query()
            ->select('id', 'fee_name')
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
            ->orderBy('fee_name')
            ->get();
    }
}
