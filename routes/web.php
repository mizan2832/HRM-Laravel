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
    Route::get('employee/details/{id}','EmpController@details')->name('emp.details');
    Route::get('file/resume/{id}','FileController@resume');

});
