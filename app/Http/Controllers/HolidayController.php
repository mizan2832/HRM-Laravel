<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HolidayController extends Controller
{
    public function index()
    {
        return view('front.pages.holiday.index');
    }
}
