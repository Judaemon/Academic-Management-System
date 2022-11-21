<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class RolesController extends Controller
{
    public function index()
    {
        if (!$this->authorize('view_roles')) {
            return redirect('/dashboard');
        }

        return view('roles.index');
    }

    public function roles(Request $request)
    {
        return Role::query()
            ->select('name', 'id')
            ->orderBy('name')
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
            ->get();
    }
}
