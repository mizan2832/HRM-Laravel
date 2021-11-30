<?php

namespace App\Http\Controllers;

use App\DailyAttendance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Department;
use App\Employee;
class DailyAttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $department = Department::all();
        return view('front.pages.attendance.daily_attendance')->withDepartments($department);
    }

    public function showAttendance()
    {
        $employees = Employee::all();
        return response()->json($employees);

    }
 

    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\DailyAttendance  $dailyAttendance
     * @return \Illuminate\Http\Response
     */
    public function show(DailyAttendance $dailyAttendance)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\DailyAttendance  $dailyAttendance
     * @return \Illuminate\Http\Response
     */
    public function edit(DailyAttendance $dailyAttendance)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\DailyAttendance  $dailyAttendance
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DailyAttendance $dailyAttendance)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\DailyAttendance  $dailyAttendance
     * @return \Illuminate\Http\Response
     */
    public function destroy(DailyAttendance $dailyAttendance)
    {
        //
    }
}
