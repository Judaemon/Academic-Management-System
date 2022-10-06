<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Payments;

class PaymentsController extends Controller
{
    public function index()
    {
        return view('payments.index');
    }
}