<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Section;
class SectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sec = Section::all();
        return view('front.pages.section.index')->withSection($sec);;
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
        // dd($request);
        $validated = $request->validate([
            'name' => 'required|unique:sections|max:255',
        ]);
        $sec = new Section();
        $sec->name = $request->name;
        $sec->save();
        return redirect()->route('section.index')->with('success','Section has been added successfully!');
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
        $dept = Section::find($id);
        $allDept = Section::all();
        return view('front.pages.section.edit')->withAllSection($allDept)->withSingleDept($dept);
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
            'name' => 'required|unique:sections|max:255',
        ]);
        $dept = Section::find($id);
        $dept->name = $request->name;
        $dept->save();
        return redirect()->route('section.index')->with('success','Section updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Section $section)
    {
        $section->delete();
        return redirect()->back()->with('success','Section deleted successfully!');
    }
}
