@extends('front.master')
@section('title','Add new employee')
@section('content')
<h3 style="margin-left: 10px;">Add Employee</h3>
<div class="container">
    <div class="row col-md-12 col-sm-12 mt-2">
        <div class="col-md-6 col-sm-6">
            <div class="card per-del">
                <div class="card-header">Person Details</div>
                <div class="card-body">

                    <form autocomplete="off" action="#">
                        <div class="form-group row">
                            <label for="name" class="col-sm-2 col-form-label">Name</label>
                            <div class="col-sm-10">
                                <input type="text" name="name" class="form-control" id="name" autocomplete="off">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="father_name" class="col-sm-2 col-form-label">Father Name</label>
                            <div class="col-sm-10">
                                <input type="text" name="father_name" class="form-control" id="father_name" autocomplete="off">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="gender" class="col-sm-2 col-form-label">Gender</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="gender" id="gender">
                                    <option value="">Male</option>
                                    <option value="">Female</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="birth" class="col-sm-2 col-form-label">Date of birth</label>
                            <div class="col-sm-10">
                                <input type="date" name="date" class="form-control" id="birth" autocomplete="off">
                            </div>
                        </div>
                    
                        <div class="form-group row">
                            <label for="phone1" class="col-sm-2 col-form-label">Phone 1</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="phone1" name="phone1" autocomplete="off">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="phone2" class="col-sm-2 col-form-label">Phone 2</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="phone2" name="phone2" autocomplete="off">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="local_address" class="col-sm-2 col-form-label">Local Address</label>
                            <div class="col-sm-10">
                                <textarea name="local_area" id="local_area" class="form-controll" cols="43" rows="4"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="permanent_address" class="col-sm-2 col-form-label">Parmanent Address</label>
                            <div class="col-sm-10">
                                <textarea name="permanent_area" id="permanent_area" class="form-controll" cols="43" rows="4"></textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="nationality" class="col-sm-2 col-form-label">Nationality</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="nationality" name="nationality" autocomplete="off">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="reference1" class="col-sm-2 col-form-label">Reference 1</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="reference1" name="reference1" autocomplete="off">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="reference1_phone" class="col-sm-2 col-form-label">Reference 1 Phone</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="reference1_phone" name="reference1_phone" autocomplete="off">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="reference2" class="col-sm-2 col-form-label">Reference 2</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="reference2" name="reference2" autocomplete="off">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="reference2_phone" class="col-sm-2 col-form-label">Reference 2 Phone</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="reference2_phone" name="reference2_phone" autocomplete="off">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="zip_code" class="col-sm-2 col-form-label">Zip Code</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="zip_code" name="zip_code" autocomplete="off">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="meritial_status" class="col-sm-2 col-form-label">Meritial status</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="meritial_status" id="meritial_status">
                                    <option value="">Select</option>
                                    <option value="">Bachelor</option>
                                    <option value="">Merried</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="photo" class="col-sm-2 col-form-label">Photo</label>
                            <div class="col-sm-10">
                                <input type="file" name="photo">
                            </div>
                        </div>
                   

                </div>
                
              </div>
        </div>
        <div class="col-md-6 col-sm-6">
          <div class="card per-del">
            <div class="card-header">
                Account Login
            </div>
            <div class="card-body">
                <div class="form-group row">
                    <label for="username" class="col-sm-2 col-form-label">Username</label>
                    <div class="col-sm-10">
                        <input type="username" name="username" class="form-control" id="username"  autocomplete="off">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="email" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <input type="email" name="email" class="form-control" id="email"  autocomplete="off">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="password" class="col-sm-2 col-form-label">Password</label>
                    <div class="col-sm-10">
                        <input type="password" name="password" class="form-control" id="password"  autocomplete="off">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="password" class="col-sm-2 col-form-label">Confirm Password</label>
                    <div class="col-sm-10">
                        <input type="password" name="password_confirmation" class="form-control" id="password"  autocomplete="off">
                    </div>
                </div>
            </div>
          </div>
          <div class="card per-del">
            <div class="card-header">
                Module Access
            </div>
            <div class="card-body">
                 <div class="form-group row">
                    <label style="margin-top: -8px;" for="employee" class="col-sm-3 col-form-label">Employee</label>
                    <div class="col-sm-9">
                        <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="attd_view" id="attd_view" value="attd_view">
                                <label class="form-check-label" for="attd_view">view</label>
                          </div>
                          <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="attd_add" id="attd_add" value="attd_add">
                                <label class="form-check-label" for="attd_add">Add</label>
                          </div>
                          <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="attd_edit" id="attd_edit" value="attd_edit" >
                                <label class="form-check-label" for="attd_edit">Edit</label>
                          </div>
                          <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="attd_delete" id="attd_delete" value="attd_delete" >
                                <label class="form-check-label" for="attd_delete">Delete</label>
                          </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label style="margin-top: -8px;" for="department" class="col-sm-3 col-form-label">Department</label>
                    <div class="col-sm-9">
                        <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="emp_view" id="dept_view" value="dept_view">
                                <label class="form-check-label" for="dept_view">view</label>
                          </div>
                          <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="dept_add" id="dept_add" value="dept_add">
                                <label class="form-check-label" for="dept_add">Add</label>
                          </div>
                          <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="dept_edit" id="dept_edit" value="dept_edit" >
                                <label class="form-check-label" for="dept_edit">Edit</label>
                          </div>
                          <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="dept_delete" id="dept_delete" value="dept_delete" >
                                <label class="form-check-label" for="dept_delete">Delete</label>
                          </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label style="margin-top: -8px;" for="attendance" class="col-sm-3 col-form-label">Attendance</label>
                    <div class="col-sm-9">
                        <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="attd_view" id="dept_view" value="dept_view">
                                <label class="form-check-label" for="dept_view">view</label>
                          </div>
                          <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="dept_add" id="dept_add" value="dept_add">
                                <label class="form-check-label" for="dept_add">Add</label>
                          </div>
                          <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="dept_edit" id="dept_edit" value="dept_edit" >
                                <label class="form-check-label" for="dept_edit">Edit</label>
                          </div>
                          <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="dept_delete" id="dept_delete" value="dept_delete" >
                                <label class="form-check-label" for="dept_delete">Delete</label>
                          </div>
                    </div>
                </div>
            </div>
          </div>
        </div>
    </div>
</div>
@endsection