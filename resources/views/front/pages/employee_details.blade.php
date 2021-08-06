@extends('front.master')
@section('title','Employee Details')
@section('content')
<div class="container">
        <div class="row col-md-12 col-sm-12 mt-2">
            <div class="col-md-6 col-sm-6">
                <div class="card per-del">
                    <div class="card-header" style="background-color: #5C6BC0;color:#ffffff;font-size:1.2em;">Person
                        Details
                    </div>
                
                <div class="card-body">
                    <div class="row col-md-12 col-sm-12">
                        <div class="col-md-4 col-sm-4">
                            <img src="{{ asset('front/assets/images/profilePicture/'.$employee->profile_picture) }}" alt="" width="100" height="100">
                        </div>
                        <div class="col-md-8 col-sm-8">
                            <table class="table table-bordered">
                                <tr>
                                    <td>Employee Name</td>
                                    <td>{{ $employee->name }}</td>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td>{{ $employee->email }}</td>
                                </tr>
                                <tr>
                                    <td>Department</td>
                                    <td>{{ $employee->department }}</td>
                                </tr>
                                <tr>
                                    <td>Gender</td>
                                    <td>{{ $employee->gender }}</td>
                                </tr>
                                <tr>
                                    <td>Joining Date</td>
                                    <td>{{ $employee->joining_date }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
              </div>
            </div>
            <div class="col-md-6 col-sm-6">
                <div class="card per-del">
                    <div class="card-header" style="background-color: #5C6BC0;color:#ffffff;font-size:1.2em;">Person
                        Details
                    </div>
                </div>
                <div class="card-body">
                    <div class="row col-md-12 col-sm-12">
                        <div class="col-md-4 col-sm-4">
                           
                        </div>
                        <div class="col-md-8 col-sm-8"></div>
                    </div>
                </div>
            </div>
        </div>  
    </div>  
@endsection