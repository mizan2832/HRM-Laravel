<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Role;
class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::all();
        return view('front.pages.role.index')->withRoles($roles);
    }

    public function store(Request $request)
    {
        // dd($request);
        $validated = $request->validate([
            'name' => 'required|unique:roles|max:255',
        ]);
        $sec = new Role();
        $sec->name = $request->name;
        $sec->save();
        return redirect()->route('role.index')->with('success','Section has been added successfully!');
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
        $dept = role::find($id);
        $Roles = role::all();
        return view('front.pages.role.edit')->withAllroles($Roles)->withSingleDept($dept);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|unique:roles|max:255',
        ]);
        $dept = Role::find($id);
        $dept->name = $request->name;
        $dept->save();
        return redirect()->route('role.index')->with('success','Role updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $role->delete();
        return redirect()->back()->with('success','Section deleted successfully!');
    }
}
