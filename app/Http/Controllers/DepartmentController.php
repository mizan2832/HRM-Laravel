<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Department;
class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dept = Department::all();
        return view('front.pages.department.index')->withDepartment($dept);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
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

      $validated = $request->validate([
                'dpt_name' => 'required|unique:departments|max:255',
            ]);
            $dept = new Department();
            $dept->dpt_name = $request->dpt_name;
            $dept->save();
            return redirect()->route('department.index')->with('success','Department has been added successfully!');
        
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dept = Department::find($id);
        $allDept = Department::all();
        return view('front.pages.department.edit')->withAllDepartment($allDept)->withSingleDept($dept);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'dpt_name' => 'required|unique:departments|max:255',
        ]);
        $dept = Department::find($id);
        $dept->dpt_name = $request->dpt_name;
        $dept->save();
        return redirect()->route('department.index')->with('success','Department updated successfully!');
    
    }


    public function destroy(Department $department)
    {
        $department->delete();
        return redirect()->back()->with('success','Department deleted successfully!');
    }
}
