<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('front.pages.index');
// });

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::group(['middleware' => 'admin'], function()
{
    Route::get('add-user', function () {
        return view('front.pages.add_user');
    })->name('add-user');

    Route::resource('employee','EmployeeController');
    Route::get('employeetable','EmployeeController@getMoreEmployees')->name('employees.get-more-employees');
    Route::resource('department','DepartmentController');
    Route::resource('section','SectionController');
    Route::get('employee/details/{id}','EmpController@details')->name('emp.details');
    Route::get('file/resume/{id}','FileController@resume');
    Route::resource('/daily-attendance','DailyAttendanceController');
    Route::post('attendance/show','DailyAttendanceController@showAttendanceDept');
    Route::post('attendance/store','DailyAttendanceController@storeAttendanceDept');                                   
    Route::get('/attendance-type/edit/{id}','AttendanceTypeController@edit');
    Route::get('attendance/type','AttendanceTypeController@index')->name('attendance.type');
    Route::delete('/attendance-type/delete/{id}','AttendanceTypeController@delete');
    Route::post('/update/{id}','AttendanceTypeController@update');
    Route::post('/save','AttendanceTypeController@store');
    Route::post('attendance/store/csv','DailyAttendanceController@storeCsv')->name('attendance.csv');
    Route::get('holiday','HolidayController@index')->name('holiday');
    Route::post('/holiday/store','HolidayController@store');
    Route::get('holiday/edit/{id}','HolidayController@edit');
    Route::post('holiday/update/{id}','HolidayController@update');
    Route::delete('holiday/delete/{id}','HolidayController@delete');
    Route::get('role','RoleController@index')->name('role.index');
    Route::post('role','RoleController@store')->name('role.store');
    Route::get('role/{id}','RoleController@edit')->name('role.edit');
    Route::put('role/update/{id}','RoleController@update')->name('role.update');
    Route::delete('role/delete/{id}','RoleController@destroy')->name('role.destroy');
    Route::resource('unit','UnitController');
    Route::resource('leave','LeaveController');
    Route::get('emp/leave','EmployeeLeaveController@index')->name('departure.emp');
    Route::post('emp/leave','EmployeeLeaveController@store')->name('departure.store');

});

Route::get('/staff', 'StaffController@index')->name('staff');

Route::group(['middleware'=>'staff'],function(){
    Route::get('attendance','StaffController@attendance')->name('staff.attendance');
    Route::get('profile','StaffController@profile')->name('staff.profile');
    Route::get('myleave','StaffController@leave')->name('staff.leave');
});


