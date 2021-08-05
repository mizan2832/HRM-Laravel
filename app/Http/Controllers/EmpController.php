<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Employee;
use App\User;
class EmpController extends Controller
{
     function index(){
        return view('front.pages.employee_list');
    }

    public function details(Request $request)
    {
       $employee = Employee::find($request->id);
       return view('front.pages.employee_details')->withEmployee($employee);
    }
}
