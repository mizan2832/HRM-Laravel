<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Employee;
use App\Section;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('front.pages.index');
    }
    public function fetchdata(Request $request)
    {
        if ($request->ajax()) {
            $data = Section::latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $actionBtn = '<a href="javascript:void(0)" class="edit btn btn-success btn-sm" id='.$row->id.' >Edit</a> <a href="#" class="delete btn btn-danger btn-sm" id="'.$row->id.'">Delete</a>';
                    return $actionBtn;
                })
                ->addColumn('checkbox', '<input type="checkbox" name="student_checkbox[]" class="student_checkbox" value="{{$id}}" />')
                ->rawColumns(['checkbox','action'])
                ->make(true);
        }
    }
   
}
