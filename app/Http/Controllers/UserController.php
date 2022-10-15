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

    public function teachers(Request $request)
    {
        // It checks if there is already a selected item.
        if ($request->has('selected')) {
            return User::query()
                ->role('Teacher')
                ->select(DB::raw("CONCAT(firstname, ' ', lastname) AS full_name"),'id')
                ->where('id', $request->selected)
                ->get();
        }
    
        return User::query()
        ->role('Teacher')
        ->select(DB::raw("CONCAT(firstname, ' ', lastname) AS full_name"),'id')
        ->when(
            $request->search,
            fn (Builder $query) => $query
                ->where(DB::raw('CONCAT_WS(" ", firstname, lastname)'), 'like', "%{$request->search}%")
        )
        ->get();
    }

    public function users(Request $request)
    {
        return User::query()
            ->select(DB::raw("CONCAT(firstname, ' ', lastname) AS name"), 'id')
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
}
