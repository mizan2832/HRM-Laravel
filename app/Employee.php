<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Constraints\GlobalConstraints;
use DB;
class Employee extends Model
{
    

    public static function getEmployees($name, $email, $mobile) {
        $employees = DB::table('employees');

        // Filter By Country
        if($name && $name!= GlobalConstraints::ALL) {
            $employees = $employees->where('employees.name',  'like', "%{$name}%");
        }
        if($email && $email!= GlobalConstraints::ALL) {
            $employees = $employees->where('employees.email','like', "%{$email}%");
        }
        if($mobile && $mobile!= GlobalConstraints::ALL) {
            $employees = $employees->where('employees.phone1','like', "%{$mobile}%");
        }

        return $employees->paginate(7);
    }
}
