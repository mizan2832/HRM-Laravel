<?php

namespace App\Http\Controllers;

use App\DailyAttendance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use App\Department;
use App\Employee;
use App\Leave;

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
        $leaves = Leave::all();
        $d = date('Y-m-d');
        $datas =  DB::table('daily_attendances')
            ->join('employees', function ($join) {
                $join->on('employees.employee_id', '=', 'daily_attendances.emp_id');
                    
            })
            ->select('daily_attendances.*', 'employees.name')
            ->where('daily_attendances.date', '=' ,''.$d.'')
            ->paginate(2);
     


        return View::make('front.pages.attendance.daily_attendance', array('datas' => $datas,'departments' => $department,'leaves'=>$leaves));

        
       
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
       
        $attn = new DailyAttendance();
        $emp_id = $request->emp_id;
        $attn->emp_name = $request->emp_name;
        $attn->attn_type = $request->code;
        $in_time = date("g:i a", strtotime(".$request->in_time . UTC"));
        $out_time = date("g:i a", strtotime(".$request->out_time . UTC"));
        $attn->in_time = $in_time;
        $attn->out_time = $out_time;
        $start = strtotime($request->in_time);
        $end = strtotime($request->out_time);
        $hours = ($end - $start)/3600;
        if($hours>8){
            $ot = $hours-8;
            $hour = floor($ot);
            $min = fmod($ot,1);
            if($min>0 && $min<= 0.25){
                $ot = $hour+0.25;
            }
            elseif($min>0.25 && $min<= 0.50){
                $ot = $hour+0.50;
            }
            elseif($min>0.50 && $min<= 0.75){
                $ot = $hour+0.75;
            }
            elseif($min>0.75 && $min< 1.0){
                $ot = $hour+1;
            }

        }
        $attn->overtime = $ot;
        $attn->date = $request->date;
        $attn->emp_id = $request->emp_id;
        $attn->save();
        return redirect()->route('daily-attendance.index');
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

    public function storeCsv(Request $request){

        $path = $request->file('upload_file')->store('upload/files', 'public');
      
        $filePath=$upload->getRealPath();
        //open and read
        $file=fopen($filePath, 'r');
        
        $header= fgetcsv($file);
        dd($header);
        return response()->json($data);


        // // dd($header);
        // $escapedHeader=[];
        // //validate
        // foreach ($header as $key => $value) {
        //     $lheader=strtolower($value);
        //     $escapedItem=preg_replace('/[^a-z]/', '', $lheader);
        //     array_push($escapedHeader, $escapedItem);
        // }

        // //looping through othe columns
        // while($columns=fgetcsv($file))
        // {
        //     if($columns[0]=="")
        //     {
        //         continue;
        //     }
        //     //trim data
        //     foreach ($columns as $key => &$value) {
        //         $value=preg_replace('/\D/','',$value);
        //     }

        // $data= array_combine($escapedHeader, $columns);

        // // setting type
        // foreach ($data as $key => &$value) {
        //     $value=($key=="zip" || $key=="month")?(integer)$value: (float)$value;
        // }

        // // Table update
        // $zip=$data['zip'];
        // $month=$data['month'];
        // $lodging=$data['lodging'];
        // $meal=$data['meal'];
        // $housing=$data['housing'];

        // $budget= Budget::firstOrNew(['zip'=>$zip,'month'=>$month]);
        // $budget->lodging=$lodging;
        // $budget->meal=$meal;
        // $budget->housing=$housing;
        // $budget->save();
        // }
        
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
