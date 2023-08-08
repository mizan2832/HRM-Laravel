<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Holiday;
use DB;
class HolidayController extends Controller
{
    public function index(Request $request)
    {
           $holidays = DB::table("holidays")->get();
           return view('front.pages.holiday.index')->withHolidays($holidays);
    }

    public function list() {
        $holidays = DB::table("holidays")->get();
        return response()->json($holiday);

    }
    public function store(Request $request){
        $holiday = new Holiday;
        $holiday->name = $request->holiday_name;
        $holiday->from = $request->from;
        $holiday->to = $request->to;
        $holiday->save();
        return response()->json($holiday);
    }

    public function edit(Request $request){
        $holiday = Holiday::find($request->id);
        return response()->json($holiday);

    }

    public function update(Request $request){
        $holiday = Holiday::find($request->id);
        $holiday->name = $request->holiday_name;
        $holiday->from = $request->from;
        $holiday->to = $request->to;
        $holiday->save();
        return response()->json(array(
                'holiday' => $holiday,
                'update' => $request->update,
      ));

    }
    public function delete(Request $request){
        $holiday = DB::table('holidays')->where('id', '=', $request->id)->delete();
        return response()->json($holiday);
    }
}

