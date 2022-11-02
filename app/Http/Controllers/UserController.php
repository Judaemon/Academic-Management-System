<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index()
    {
        if (!auth()->user()->can('view_users')) {
            return redirect('/dashboard');
        }

        return view('users.index');
    }

    public function users(Request $request)
    {
        return User::query()
            ->select(DB::raw("CONCAT(firstname, ' ', lastname) AS name"), 'id', 'email')
            ->orderBy('name')
            ->when(
                $request->search,
                fn (Builder $query) => $query
                    ->where(DB::raw('CONCAT_WS(" ", firstname, lastname)'), 'like', "%{$request->search}%")
                    ->orWhere('id', 'like', "%{$request->search}%")
            )
            ->when(
                $request->exists('selected'),
                fn (Builder $query) => $query->whereIn('id', $request->input('selected', [])),
                fn (Builder $query) => $query->limit(10)
            )
            ->get();
    }

    public function teachers(Request $request)
    {
        return User::query()
            ->select(DB::raw("CONCAT(firstname, ' ', lastname) AS full_name"), 'id')
            ->when(
                $request->search,
                fn (Builder $query) => $query
                    ->where(DB::raw('CONCAT_WS(" ", firstname, lastname)'), 'like', "%{$request->search}%")
                    ->orWhere('id', 'like', "%{$request->search}%")
            )
            ->when(
                $request->exists('selected'),
                fn (Builder $query) => $query->whereIn('id', $request->input('selected', [])),
                fn (Builder $query) => $query->limit(10)
            )
            ->orderBy('full_name')
            ->role('Teacher')
            ->get();
    }

    public function students(Request $request)
    {
        return User::query()
            ->select(DB::raw("CONCAT(firstname, ' ', lastname) AS full_name"), 'id')
            ->when(
                $request->search,
                fn (Builder $query) => $query
                    ->where(DB::raw('CONCAT_WS(" ", firstname, lastname)'), 'like', "%{$request->search}%")
                    ->orWhere('id', 'like', "%{$request->search}%")
            )
            ->when(
                $request->exists('selected'),
                fn (Builder $query) => $query->whereIn('id', $request->input('selected', [])),
                fn (Builder $query) => $query->limit(10)
            )
            ->orderBy('full_name')
            ->role('Student')
            ->get();
    }
}
