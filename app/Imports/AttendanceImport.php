<?php

namespace App\Imports;

use App\DailyAttendance;
use Maatwebsite\Excel\Concerns\ToModel;

class AttendanceImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new DailyAttendance([
            //
        ]);
    }
}
