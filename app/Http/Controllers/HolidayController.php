<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Holiday;
class HolidayController extends Controller
{
    public function index()
    {
        return view('front.pages.holiday.index');
    }
    
    public function store(Request $request){
        $holiday = new Holiday;
        $holiday->name = $request->holiday_name;
        $holiday->date = $request->date;
        $holiday->save();
        return response()->json($holiday);
    }
}

