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
                            <th>Holiday Name</th>
                            <th>Date</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                       @foreach ($holidays as $day)
                        <tr>  
                           <td class="holi_name-{{$day->id}}">{{$day->name}}</td>
                           <td class="holi_date-{{$day->id}}">{{$day->date}}</td>
                           <td><a href="javascript:void(0)"  class="edit_holiday" data-id="{{ $day->id }}"><i class="far fa-edit"></i></a> <a href="javascript:void(0)" class='delete_holiday' data-id="{{ $day->id }}">  <i class="fas fa-trash-alt"></i></a> </td>
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
                     <input type="hidden" name="update" id="update_id">

                     
                </div>
            </div>
        </div>
        
    </div>
@endsection

@push('js')
<script>

  $("#add").click(function(){
    var date = $('#date').val();
    var holiday_name = $('#holiday_name').val();
    var update_id = $("#update_id").val();
    if (update_id>0) {
      url = "/holiday/update/"+update_id;
      data={"_token": $('#token').val(),id:update_id,holiday_name:holiday_name,date:date,update:'update'};
    }
    else{
      url = "/holiday/store";
      data={"_token": $('#token').val(),holiday_name:holiday_name,date:date};
    }
    $.ajax({
          type:"POST",
          dataType:'json',
          url: url,
          data:data,
          success:function(data){
                if(data.update=='update'){
                  const holi_name = document.querySelector(`.holi_name-${data.holiday.id}`);
                  holi_name.textContent = data.holiday.name;
                  const holi_date = document.querySelector(`".holi_date-${data.holiday.id}"`);
                  holi_date.textContent = data.holiday.date;
;
                }
                else{
                    var name = data.name;
                    var date = data.date;
                    var data = "<tr>";
                       data += "<td class='holi_name-"+data.id+"'>"+name+"</td>";
                       data += "<td class='holi_date"+data.id+"'>"+date+"</td>";
                       data += "<td><a href='javascript:void(0)'  class='edit_holiday' data-id='"+data.id+"'><i class='far fa-edit'></i></a> <a href='javascript:void(0)' class='delete_holiday' data-id='"+data.id+ "'>  <i class='fas fa-trash-alt'></i></a></td></tr>";

                    $(".holiday_t tbody").append(data);
                }
              
              }
          })
  });

  $(".edit_holiday").click(function(){
    $("#add").text('Update');
    $("#add").attr("id","update");
    var id = $(this).data('id');
    $("#update_id").val(id);
    
    $.ajax({
                method:'GET',
                dataType:'JSON',
                data : {data:id},
                url : '/holiday/edit/'+id,
                success:function(data){
                    $('#holiday_name').val(data.name);  
                    $('#date').val(data.date);  
                    // console.log(data);
            }
        })

  });

  $("#update").click(function(e){
        var id = $("#update_id").val();
        var name = $('#holiday_name').val();
        var date = $('#date').val();
        $.ajax({
            type:'POST',
            dataType:'json',
            url:'/holiday/update/'+id,
            data:{"_token": $('#token').val(),id:id,name:name,date:date},
            success: function(data){
              console.log(data);
              // const td = document.querySelector(`.name-${data.id}`);
              // td.textContent = data.name;
            }

        })
      });



</script>
@endpush