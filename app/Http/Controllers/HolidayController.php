<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Holiday;
class HolidayController extends Controller
{
    public function index(Request $request)
    {
       if ($request->date) {
           $holidays = Holiday::all();
           return response()->json(array(
                    'holiday' => $holidays
                   
                ));
       }else{
           $holidays = Holiday::all();
           return view('front.pages.holiday.index')->withHolidays($holidays);
       }
       
    }
    
    public function store(Request $request){
        $holiday = new Holiday;
        $holiday->name = $request->holiday_name;
        $holiday->date = $request->date;
        $holiday->save();
        return response()->json($holiday);
    }

    public function edit(Request $request){
        $holiday = Holiday::find($request->id);
        return response()->json($holiday);

    }

    public function update(Request $request){
        $holiday = Holiday::find($request->id);
        $holiday->name= $request->holiday_name;
        $holiday->date= $request->date;
        $holiday->save();
        return response()->json(array(
                'holiday' => $holiday,
                'update' => $request->update,
      ));

    }
}

