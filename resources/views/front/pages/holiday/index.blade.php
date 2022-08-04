@extends('front.master')
@section('title','Holiday')
@push('head')
  <meta name="csrf-token" content="{{ csrf_token() }}">
@endpush

@section('content')
<div class="container">
        <div class="holiday-header text-center d-flex align-items-center justify-content-center
        ">
            <div class="row">
                    <form class="form-inline">
                        <div class="form-group">
                            <label for="year">Select Year:</label>
                            <select name="year" id="year">
                                <option value="20">2021</option>
                                <option value="20">2020</option>
                            </select>
                          </div>
                          <div class="form-group">
                            <label for="month">Select Month:</label>
                            <select name="month" id="month">
                                <option value="jan">January</option>
                                <option value="feb">February</option>
                            </select>
                          </div>
                       
                          <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
            </div>
        </div>
        <div class="holiday-body">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-hover holiday_t">
                        <thead>
                          <tr>
                            <th>#SI</th>
                            <th>Holiday Name</th>
                            <th>Date</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                       @php
                              $i = 1;
                       @endphp
                       @foreach ($holidays as $day)
                        <tr>  
                           <td>{{$i++}}</td>
                           <td>{{$day->name}}</td>
                           <td>{{$day->date}}</td>
                        </tr>
                       @endforeach
                        </tbody>
                      </table>
    
                </div>
                <div class="col-md-6">
                   
                        <div class="form-group" >
                          <label class="control-label col-sm-3" for="holiday-name">Holiday name:</label>
                          <div class="col-sm-6">
                            <input type="text" class="form-control" id="holiday_name" placeholder="Enter holiday name" name="holiday-name">
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="control-label col-sm-3" for="date">Date:</label>
                          <div class="col-sm-9">          
                            <input type="date" class="date" id="date">
                          </div>
                        </div>
                       
                        <div class="form-group">        
                          <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" id="add"  class="btn btn-primary  d-flex align-items-center justify-content-center">Add </button>                     
                            </div>
                        </div>

                     <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}"> 

                     
                </div>
            </div>
        </div>
        
    </div>
@endsection

@push('js')
<script>

  $("#add").click(function(){
    let date = $('#date').val();
    let holiday_name = $('#holiday_name').val();
    $.ajax({
          type:"POST",
          dataType:'json',
          url: "/holiday/store",
          data:{"_token": $('#token').val(),date:date,holiday_name:holiday_name},
          success:function(data){
                var name = data.name;
                var date = data.date;
                var data = "<tr>";
                   data += "<td>"+name+"</td>";
                   data += "<td>"+date+"</td></tr>";

                $(".holiday_t tbody").append(data);

              }
          })
  })



</script>
@endpush