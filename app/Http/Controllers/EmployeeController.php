<?php

namespace App\Http\Controllers;

use App\Employee;
use App\User;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
  
    public function index()
    {
       return view('front.pages.employee_list');
    }


    public function create()
    {
        return view('front.pages.add_empoyee');
    }

    public function store(Request $request)
    {
       $employee = new Employee();
       $employee->name = $request->name;
       $employee->father_name = $request->father_name;
       $employee->gender = $request->gender;
       $employee->birth_date = $request->date;
       $employee->phone1 = $request->phone1;
       $employee->phone2 = $request->phone2;
       $employee->local_address = $request->local_address;
       $employee->permanent_address = $request->permanent_area;
       $employee->nationality = $request->nationality;
       $employee->reference1 = $request->reference1;
       $employee->reference1_phone = $request->reference1_phone;
       $employee->reference2 = $request->reference2;
       $employee->reference2_phone = $request->reference2_phone;
       $employee->zip_code = $request->zip_code;
       $employee->meritial_status = $request->meritial_status;

       $profile_picture = $request->name . '.' . 
       $request->file('photo')->getClientOriginalExtension();

       $request->file('photo')->move(
           base_path() . '/public/front/assets/images/profilePicture', $profile_picture
       );
       $employee->profile_picture = $profile_picture;

       $resume = $request->name . '.' . 
       $request->file('resume')->getClientOriginalExtension();

       $request->file('resume')->move(
           base_path() . '/public/front/assets/images/resume', $resume
       );
       $employee->resume = $resume;

       $joining_letter = $request->name . '.' . 
       $request->file('joining_letter')->getClientOriginalExtension();
       $request->file('joining_letter')->move(
           base_path() . '/public/front/assets/images/joining_letter', $joining_letter
       );
       $employee->joining_letter = $joining_letter;

       $other = $request->name . '.' . 
       $request->file('other')->getClientOriginalExtension();
       $request->file('other')->move(
           base_path() . '/public/front/assets/images/other', $other
       );
       $employee->other = $other;




    }

    public function show(Employee $employee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employee $employee)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        //
    }
}
