<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DailyAttendance extends Model
{
    protected $fillable = ['emp_id','attn_type','in_time','out_time','overtime','date','status'];
}
