<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\EmpController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\LeaveController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\HolidayController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\EmployeeLeaveController;
use App\Http\Controllers\AttendanceTypeController;
use App\Http\Controllers\DailyAttendanceController;


Auth::routes();

Route::get('/', [HomeController::class,'index'])->name('home');

Route::group(['middleware' => 'admin'], function()
{
    Route::get('add-user', function () {
        return view('front.pages.add_user');
    })->name('add-user');

    Route::resource('/employee',EmployeeController::class);
    Route::get('/employeetable',[EmployeeController::class,'getMoreEmployees'])->name('employees.get-more-employees');
    Route::resource('/department',DepartmentController::class);
    Route::resource('section',SectionController::class);
    Route::get('employee/details/{id}',[EmpController::class,'details'])->name('emp.details');
    Route::get('file/resume/{id}',[FileController::class,'resume']);
    Route::resource('/daily-attendance',DailyAttendanceController::class);
    Route::post('attendance/show',[DailyAttendanceController::class,'showAttendanceDept']);
    Route::post('attendance/store',[DailyAttendanceController::class,'storeAttendanceDept']);
    Route::get('/attendance-type/edit/{id}',[AttendanceTypeController::class,'edit']);
    Route::get('attendance/type',[AttendanceTypeController::class,'index'])->name('attendance.type');
    Route::delete('/attendance-type/delete/{id}',[AttendanceTypeController::class,'delete']);
    Route::post('/update/{id}',[AttendanceTypeController::class,'update']);
    Route::post('/save',[AttendanceTypeController::class,'store']);
    Route::post('attendance/store/csv',[DailyAttendanceController::class,'storeCsv'])->name('attendance.csv');
    Route::get('holiday',[HolidayController::class,'index'])->name('holiday');
    Route::post('/holiday/store',[HolidayController::class,'store']);
    Route::get('/holiday/list',[HolidayController::class,'list']);
    Route::get('holiday/edit/{id}',[HolidayController::class,'edit']);
    Route::post('holiday/update/{id}',[HolidayController::class,'update']);
    Route::delete('holiday/delete/{id}',[HolidayController::class,'delete']);
    Route::get('role',[RoleController::class,'index'])->name('role.index');
    Route::post('role',[RoleController::class,'store'])->name('role.store');
    Route::get('role/{id}',[RoleController::class,'edit'])->name('role.edit');
    Route::put('role/update/{id}',[RoleController::class,'update'])->name('role.update');
    Route::delete('role/delete/{id}',[RoleController::class,'destroy'])->name('role.destroy');
    Route::resource('unit',UnitController::class);
    Route::resource('leave',LeaveController::class);
    Route::get('/emp/leave',[EmployeeLeaveController::class,'index'])->name('departure.emp');
    Route::post('/emp/leave',[EmployeeLeaveController::class,'store'])->name('departure.store');
    Route::get('/pagination',[EmployeeLeaveController::class,'leavePagination'])->name('employees.leave');


});

Route::get('/staff', [StaffController::class,'index'])->name('staff');

Route::group(['middleware'=>'staff'],function(){
    Route::get('attendance',[StaffController::class,'attendance'])->name('staff.attendance');
    Route::get('profile',[StaffController::class,'profile'])->name('staff.profile');
    Route::get('myleave',[StaffController::class,'leave'])->name('staff.leave');
});


