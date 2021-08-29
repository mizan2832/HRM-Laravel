<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;
class FileController extends Controller
{
    public function resume(Request $request){
        $emp = Employee::find($request->id);
        return view('front.pages.employee.resume')->withEmp($emp);
    }
}
