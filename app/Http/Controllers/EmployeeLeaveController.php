<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Leave;
class EmployeeLeaveController extends Controller
{
    public function index() {
        $leave = Leave::all();
        return view('front.pages.leave.empLeave')->withLeaves($leave);
    }

    public function store(Request $request)
    {
        return response()->json($request);
    }
}
