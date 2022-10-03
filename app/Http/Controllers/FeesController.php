<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Fee;

class FeesController extends Controller
{
    public function index()
    {
        $fees = Fee::paginate();

        return view('livewire.school_fees.index', compact('fees'));
    }
}
