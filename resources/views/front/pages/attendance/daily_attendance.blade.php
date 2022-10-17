@extends('front.master')
@section('title','Daily Attendance')
@push('head')
    <link rel="stylesheet" href="{{ asset('front/assets/attendance/styles.css') }}">
@endpush
@section('content')
<div class="row">
    <div class="container bg-attn">
      <div class="attn-header"  style="padding-bottom:1.2rem; border-bottom:2px solid black;">
       
          <h3>Daily Attendance</h3>
          <button class="btn btn-primary" id="add" data-toggle="modal" data-target="#attn">Add Attendance</button>
       
      </div>
      </div>

      <div class="modal fade attn-model" id="attn" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="model-header">
                <h1 class="text-center">Employee attandance</h1>
            </div>
        <form enctype="multipart/form-data" method="POST" action="{{ route('daily-attendance.store') }}">
          @csrf
            <div class="modal-body">
                <div class="container">
                    <div class="row col-md-12">
                      <div class="col-md-4">
                        <label class="form-label" for="form3Example1">Id Number</label>
                        <input type="text" name="emp_id" id="emp_id" class="form-control" placeholder="Id ">
                      </div>
                      <div class="col-md-4">
                        <label class="form-label" for="form3Example1">Entry Time</label>
                        <input  type="time" name="in_time" id="in_time" class="form-control">

                      </div>
                      <div class="col-md-3">
                        <label class="form-label" for="form3Example1">Out Time</label>
                        <input  type="time" name="out_time" id="out_time" class="form-control">
                      </div>
                    </div>
                    <div class="row col-md-12">
                                   
                      <div class="col-md-3">
                        <label class="form-label" for="form3Example2">Type</label>
                        <select name="code" id="code" class="form-control">
                          <option value="">Select Type</option>
                          @foreach ($types as $tp)
                             <option value="{{$tp->id}}">{{$tp->name}}</option>
                          @endforeach
                        </select>
                      </div>
                      <div class="col-md-4">
                        <label class="form-label" for="form3Example1">Date</label>
                        <input type="date" name="date" id="date" class="form-control">
                      </div>
                    
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" id="typeSave" class="btn btn-primary">Save</button>
              
              </div>
           </form>
          </div>
          <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}"> 
          <input type="hidden" name="id" id='update_id'>

        </div>
      </div>



</div>
  <div class="container bg-attn  mt-2">
    <div class="row">
      <div class="entities">
          <p>Show</p>
          <input type="number"  id="numOfEmployee">
          <p>Entities</p>
      </div>
      <div class="attn-search">
        <span>Search</span>
        <input type="text">
      </div>
    </div>
    <div class="attn-table pt-2">
      <table style="width: 100%" class="table table-hover table-responsive table-bordered">
        <thead>
          <th style="width: 5%">SI</th>
          <th style="width:20%">Employee Name</th>
          <th style="width: 10%">In Time</th>
          <th style="width: 10%">Out Time</th>
          <th style="width: 10%">Overtime</th>
          <th style="width: 10%">Status</th>
          <th style="width: 10%">Action</th>
        </thead>
        <tbody>
         @php
             $i=1;
         @endphp
          @foreach ($datas as $data)
            <tr>
                <td>{{$i++}}</td>
                <td>{{$data->name}} </td>
                <td>{{$data->in_time}}</td>
                <td>{{$data->out_time}}</td>
                <td>{{$data->overtime}}</td>
                <td>{{$data->attn_type}} </td>
                <td><a href=""><i class="far fa-edit"></i></a> <a href=""><i class="fas fa-trash-alt"></i></a></td>
            </tr> 
          @endforeach
        </tbody>
      </table>
    </div>
    <div class="container mt-2">
            <p style="float: left;">Showing 1 to 3 of 10 entities</p>
            <div class="paginate" style="float: right;">
            </div>
      </div>
      <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}"> 
    </div>
  </div>

  
@endsection
@push('js')
   
@endpush