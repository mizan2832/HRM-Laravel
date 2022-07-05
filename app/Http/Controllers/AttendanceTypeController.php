<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AttendanceTypeController extends Controller
{
    public function index(){
        return view('front.pages.attendance.attendance_type');
    }
}
