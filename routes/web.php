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

Route::get('/', function () {
    return view('front.pages.index');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'admin'], function()
{
    Route::get('add-user', function () {
        return view('front.pages.add_user');
    })->name('add-user');

    Route::resource('employee','EmployeeController');
    Route::resource('department','DepartmentController');
    Route::resource('section','SectionController');
    Route::get('employee/details/{id}','EmpController@details')->name('emp.details');
    Route::get('file/resume/{id}','FileController@resume');
    Route::resource('daily-attendance','DailyAttendanceController');
    Route::post('attendance/show','DailyAttendanceController@showAttendanceDept');
    Route::post('attendance/store','DailyAttendanceController@storeAttendanceDept');
    Route::get('/attendance-type/edit/{id}','AttendanceTypeController@edit');
    Route::get('attendance/type','AttendanceTypeController@index')->name('attendance.type');
    Route::post('/save','AttendanceTypeController@store');
    Route::post('/update/{id}','AttendanceTypeController@update');
    Route::delete('/attendance-type/delete/{id}','AttendanceTypeController@delete');
    Route::post('attendance/store/csv','DailyAttendanceController@storeCsv')->name('attendance.csv');
    Route::get('holiday','HolidayController@index')->name('holiday');
    Route::post('holiday/store','HolidayController@store');
    Route::post('holiday/store','HolidayController@store');
    Route::get('holiday/edit/{id}','HolidayController@edit');
    Route::resource('unit','UnitController');
    Route::resource('leave','LeaveController');


});


