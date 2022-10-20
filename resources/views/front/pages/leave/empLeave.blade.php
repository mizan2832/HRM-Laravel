@extends('front.master')
@section('title','Employee leave')
@push('head')
    <link rel="stylesheet" href="{{ asset('front/assets/attendance/styles.css') }}">
@endpush
@section('content')
<div class="row">
    <div class="container bg-attn">
      <div class="attn-header"  style="padding-bottom:1.2rem; border-bottom:2px solid black;">
       
          <h3>Leave data</h3>
      </div>
      </div>
      <button class="btn btn-primary" id="add" data-toggle="modal" data-target="#leave">Add Leave</button>

      <div class="modal fade attn-model" id="leave" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="model-header">
                <h1 class="text-center">Add leave of employee</h1>
            </div>
        <form method="POST" action="{{ route('departure.store') }}">
          @csrf
            <div class="modal-body">
                <div class="container">
                    <div class="row col-md-12">
                      <div class="col-md-4">
                        <label class="form-label" for="form3Example1">Id Number</label>
                        <input type="text" name="emp_id" id="emp_id" class="form-control" placeholder="Id ">
                      </div>
                      <div class="col-md-4">
                        <label class="form-label" for="form3Example1">From</label>
                        <input type="date" name="from" id="from" class="form-control">
                      </div>
                      <div class="col-md-3">
                        <label class="form-label" for="form3Example1">To</label>
                        <input  type="date" name="to" id="to" class="form-control">
                      </div>
                    </div>
                    <div class="row col-md-12">
                                   
                      <div class="col-md-3">
                        <label class="form-label" for="form3Example2">Type</label>
                        <select name="leaveType" id="leaveType" class="form-control">
                          <option value="">Leave Type</option>
                          @foreach ($leaves as $le)
                             <option value="{{$le->code}}">{{$le->type}}</option>
                          @endforeach
                        </select>
                      </div>
                      <div class="col-md-4">
                        <label class="form-label" for="form3Example1">Reason</label>
                        <textarea name="reason" class="form-control" id="reason" cols="30" rows="1"></textarea>
                      </div>
                      <div class="col-md-4">
                        <label class="form-label pt-4" for="form3Example1">Approval</label>
                        <input type="radio"  name="approved" id="approved">
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
          <th style="width: 10%">From</th>
          <th style="width: 10%">To</th>
          <th style="width: 10%">Leave type</th>
          <th style="width: 10%">Reason</th>
          <th style="width: 10%">Action</th>
        </thead>
        <tbody>
         @php
             $i=1;
         @endphp
          {{-- @foreach ($datas as $data)
            <tr>
                <td>{{$i++}}</td>
                <td>{{$data->name}} </td>
                <td>{{$data->in_time}}</td>
                <td>{{$data->out_time}}</td>
                <td>{{$data->overtime}}</td>
                <td>{{$data->attn_type}} </td>
                <td><a href=""><i class="far fa-edit"></i></a> <a href=""><i class="fas fa-trash-alt"></i></a></td>
            </tr> 
          @endforeach --}}
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