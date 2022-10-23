<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Leave;
use App\EmployeeLeave;
class EmployeeLeaveController extends Controller
{
    public function index() {
        $leave = Leave::all();
        $empleaves = EmployeeLeave::paginate(2);
        return view('front.pages.leave.empLeave')->withLeaves($leave)->withempleaves($empleaves);
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

        $empleaves = new EmployeeLeave;
        $empleaves->emp_id = $request->emp_id;
        $empleaves->reason = $request->reason;
        $empleaves->from = $request->from;
        $empleaves->to = $request->to;
        $empleaves->leave_type = $request->leaveType;
        $empleaves->save();

        if($request->ajax()) {
            $empleaves = EmployeeLeave::paginate(2);
            return view('front.pages.leave.leave_list', compact('empleaves'))->render();
        }

    }

    public function leavePagination(Request $request) {
        
        if($request->ajax()) {
            $empleaves = EmployeeLeave::paginate(2);
            return view('front.pages.leave.leave_list', compact('empleaves'))->render();
        }
    }
}
