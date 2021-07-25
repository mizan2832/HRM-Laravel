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

    function action(Request $request)
    {
     
        if($request->ajax())
        {
            $output = '';
            $query = $request->get('query');

            if($query != '')
            {
                $data = DB::table('employees')->where('name','like','%'.$query.'%')
                ->orWhere('department','like','%'.$query.'%')
                ->orWhere('phone1','like','%'.$query.'%')
                ->orWhere('total_salary','like','%'.$query.'%')
                ->orderBy('id','desc')
                ->get();
            }
            else{
                $data = DB::table('employees')->orderBy('id','desc')
                ->get();

            }
            $total_row = $data->count();
            if($total_row > 0)
            {
                $i = 1;
                foreach ($data as $row) {
                    $output .= '
                        <tr>
                            <td>'.$i++.'</td>
                            <td>'.$row->name.'</td>
                            <td>'.$row->department.'</td>
                            <td>'.$row->joining_date.'</td>
                            <td>'.$row->phone1.'</td>
                            <td>'.$row->total_salary.'</td>
                            <td><button class="btn btn-success">edit</button></td>
                        </tr>      
                    ';
                }
            }
            else
            {
             $output = '
             <tr>
              <td align="center" colspan="5">No Data Found</td>
             </tr>
             ';
            }

            $data = array(
                'table_data' => $output,
                'total_data' => $total_row
            );
            echo json_encode($data);
        }
    }
}
