@extends('front.master')
@section('title','Employee leave')
@push('head')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('front/assets/attendance/styles.css') }}">
@endpush
@section('content')
<div class="row">
    <div class="container bg-attn">
      <div class="attn-header"  style="padding-bottom:1.2rem; border-bottom:2px solid black;">
          <h3>Leave data</h3>
      </div>
      </div>
      @if ($errors->any())
          <div class="alert alert-danger">
              <ul>
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
              </ul>
          </div>
      @endif
      <button class="btn btn-primary" id="add" data-toggle="modal" data-target="#leave">Add Leave</button>
      <div class="modal fade attn-model" id="leave" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="model-header">
                <h1 class="text-center">Add leave of employee</h1>
            </div>
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
                    <div class="row col-md-12 pt-2">    
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
                     
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" id="save" class="btn btn-primary">Save</button>
              </div>
          
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
    
    <div id="leave_data">
      @include('front.pages.leave.leave_list')
    </div>
      </table>
    </div>
      <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}"> 
    </div>
  </div>

  
@endsection
@push('js')
<script>
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
      }
    });

    $(document).on('click', '.pagination a', function(event) {
         event.preventDefault();
         var page = $(this).attr('href').split('page=')[1];
         getMoreLeaves(page);
    });
   

    $('#save').click(function(){
      var emp_id = $('#emp_id').val();
      var from = $('#from').val();
      var to = $('#to').val();
      var leaveType = $('#leaveType').val();
      var reason = $('#reason').val();
      var approved = $('#approved').val();
      $.ajax({
              type:'POST',
              url : '/emp/leave', 
              data : {"_token": $('#token').val(),emp_id:emp_id,from:from,to:to,leaveType:leaveType,reason:reason,approved:approved},
              success:function(data){  
                    $('#leave_data').html(data);
                }
        })
      $("#leave").modal('hide');
    })

    function getMoreLeaves(page) {
      $.ajax({
              type:'GET',
              url : "{{ route('employees.leave') }}" + "?page=" + page,
              success:function(data){  
                    $('#leave_data').html(data);
                }
        })
        
    }
 
       


</script>
 
@endpush