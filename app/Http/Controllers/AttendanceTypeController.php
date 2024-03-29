<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AttendanceType;
use DB;
class AttendanceTypeController extends Controller
{
    public function index(){
        $types = AttendanceType::all();
        return view('front.pages.attendance.attendance_type')->withTypes($types);
    }

    public function store(Request $request){

        $type = new AttendanceType();
        $type->name = $request->name;
        $type->save();
        return response()->json($type);
    }

    public function edit(Request $request){
        $type = AttendanceType::find($request->id);
        return response()->json($type);
    }

    public function update(Request $request){
        $type = AttendanceType::find($request->id);
        $type->name = $request->name;
        $type->save();

        return response()->json($type);
        
    }
    public function delete(Request $request){
        
         $delete_type = DB::table('attendance_types')->where('id', '=', $request->id)->delete();

        return response()->json($request->id); 
    }
}
