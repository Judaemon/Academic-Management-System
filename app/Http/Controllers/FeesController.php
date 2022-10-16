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
}
