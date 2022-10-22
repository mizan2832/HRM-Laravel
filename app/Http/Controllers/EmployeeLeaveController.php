<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Leave;
use App\EmployeeLeave;
class EmployeeLeaveController extends Controller
{
    public function index() {
        $leave = Leave::all();
        return view('front.pages.leave.empLeave')->withLeaves($leave);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'emp_id' => 'required',
            'from' => 'required',
            'to' => 'required',
            'leaveType' => 'required',
            'reason' => 'required',
        ]);
        return response()->json($request);
    }
}
