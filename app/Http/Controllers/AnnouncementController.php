<?php

namespace App\Http\Controllers;

use App\Models\Annoucement;
use Illuminate\Http\Request;

use App\Mail\AnnouncementMail;
use Mail;

class AnnouncementController extends Controller
{
    public function index()
    {
        return view('announcements.index');
    }

    public function sendMail()
    {

    }
}
