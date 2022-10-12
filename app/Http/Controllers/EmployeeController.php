<?php

namespace App\Http\Controllers;

use App\Employee;
use App\User;
use App\Role;
use Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use DB;
use Auth;
class EmployeeController extends Controller
{
  
    public function index()
    {
       $list = Employee::paginate(7);
       
       return view('front.pages.employee.employee_list')->withList($list);
    }

    public function create()
    {
        $roles= Role::all();
        return view('front.pages.employee.add_empoyee')->withRoles($roles);
    }

    public function store(Request $request)
    {
        // dd($request);
       $employee = new Employee();
       $user = new User();
       $employee->name = $request->name;
       $employee->father_name = $request->father_name;
       $employee->email = $request->email;
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

       $offer = $request->name . '.' . 
       $request->file('offer')->getClientOriginalExtension();
       $request->file('offer')->move(
           base_path() . '/public/front/assets/images/offer', $offer
       );
       $employee->offer = $offer;

       

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
       $employee->employee_id = $request->employee_id;
       $employee->department = $request->department;
       $employee->joining_date = $request->joining_date;
       $employee->status = $request->status;
       $employee->basic = $request->basic;
       $employee->medical_allowance = $request->medical;
       $employee->transport = $request->transport;
       $employee->house_rent = $request->house_rent;
       $employee->tax = $request->tax;
       $employee->absent = $request->absent;
       $employee->meal = $request->meal;
       $employee->total_salary = $request->total_salary;
       $employee->holder_name = $request->holder_name;
       $employee->account_number = $request->account_number;
       $employee->bank_name = $request->bank_name;
       $employee->branch_name = $request->branch;
       $employee->save();

       $user->name = $request->name;

      
            $user->username = 'Staff';
        
       $user->email = $request->email;
       $user->role_id = $request->role;
       $user->password = Hash::make($request->password);
       $user->save();
     
       return redirect()->route('employee.index');

    }

    public function getMoreEmployees(Request $request){
        $name = $request->name;
        $email = $request->email;
        $mobile = $request->mobile;

        if($request->ajax()) {
            
            $list = Employee::getEmployees($name, $email, $mobile);
            // return response()->json($name);
            
                return view('front.pages.employee.employee_table', compact('list'))->render();
        }
    }

    public function show(Employee $employee)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        
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
