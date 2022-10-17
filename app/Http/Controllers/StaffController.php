<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StaffController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('front.pages.index');
    }


    public function attendance()
    {
        return 'attendance';
        return view('front.pages.other.attendance');
    }
    public function leave()
    {
        return 'leave';
        
    }
    public function profile()
    {
        return 'profile';
        
    }

    
}
