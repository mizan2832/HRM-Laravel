<?php

namespace App\Http\Controllers;

use App\DailyAttendance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
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
        $d = date('Y-m-d');
        $datas =  DB::table('daily_attendances')
            ->join('employees', function ($join) {
                $join->on('employees.employee_id', '=', 'daily_attendances.emp_id');
                    
            })
            ->select('daily_attendances.*', 'employees.name')
            ->where('daily_attendances.date', '=' ,''.$d.'')
            ->paginate(2);


        return View::make('front.pages.attendance.daily_attendance', array('datas' => $datas,'departments' => $department));

        
       
    }

    public function showAttendance(Request $request)
    {

        $datas = DailyAttendance::paginate(2);
        
        return response()->json($datas);
        // return View::make('front.pages.attendance.daily_attendance', array('datas' => $datas));
        // if ($date) {
            // $attendance = DB::table('daily_attendances')
            // ->join('employees', 'employees.employee_id', '=', 'daily_attendances.emp_id')
            // ->select('daily_attendances.*', 'employees.name')
            // ->get();
            
        //     return response()->json(array(
        //         'data_exit' => $date,
        //         'attendance' => $attendance
               
        //     ));

        // }else{
        //     $employees = Employee::all();
        //     return response()->json(array(
        //         'data_exit' => $date,
        //         'employees' => $employees
               
        //     ));
        // }

    }
    public function showAttendanceDept(Request $request)
    {
        // $employees = Employee::where('department','=',$dpt_id)->get();
        // return response()->json($employees);

        $department = Department::all();
        $d = date('Y-m-d');
        $datas =  DB::table('daily_attendances')
            ->join('employees', function ($join) {
                $join->on('employees.employee_id', '=', 'daily_attendances.emp_id');
                    
            })
            ->select('daily_attendances.*', 'employees.name')
            ->where('employees.department','=',''.$request->emp_dept.'')
            ->where('daily_attendances.date', '=' ,''.$request->date.'')
            ->get();

            return response()->json($datas);
        // return View::make('front.pages.attendance.daily_attendance', array('datas' => $datas,'departments' => $department));

        // return Response::json(View::make('front.pages.attendance.daily_attendance', array('datas' => $datas,'departments' => $department))->render());


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
        return response()->json($request);
    }
    public function storeAttendanceDept(Request $request)
    {
       $len = count($request->emp_id);
       for ($i=0; $i <$len; $i++) { 
           $date = $request->date;
           $emp_id = $request->emp_id[$i];
           $attn_type = $request->attn_type[$i];
           $inTime = $request->inTime[$i];
           $outTime = $request->outTime[$i];
           $otTime = $request->otTime[$i];
           $status = 'manual';

         $data= DB::table('daily_attendances')->insert([
            'emp_id' =>$emp_id,
            'attn_type' =>$status,
            'in_time' => $inTime,
            'out_time' => $outTime,
            'overtime' => $otTime,
            'date' => $date,
            'status' => $attn_type,
        ]);
       }
        return response()->json($data);
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
