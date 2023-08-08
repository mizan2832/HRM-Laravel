@extends('front.master')
@section('title','Holiday')
@push('head')
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <style>
    .searchHoliday{
      justify-content: center;
    }
    #searchDate{
      margin-right: 2%;
    }
    .ui-datepicker-calendar {
        display: none;
    }
  </style>
@endpush

@section('content')
<div class="container">
        <div class="searchHoliday d-flex">
          <select class="form-control" name="month" id="month"></select>
          <select class="form-control" name="year" id="year"></select>
          <button class="btn btn-primary" id="search">Search</button>
        </div>

        <div class="holiday-body">
            <div class="row col-md-12">
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
                           <td class="holi_date-{{$day->id}}">{{$day->from}}</td>
                           <td class="holi_date-{{$day->id}}">{{$day->to}}</td>
                           <td><a href="javascript:void(0)"  class="edit_holiday" data-id="{{ $day->id }}"><i class="far fa-edit"></i></a> <a href="javascript:void(0)" class='delete-holiday' data-id="{{ $day->id }}">  <i class="fas fa-trash-alt"></i></a> </td>
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
                          <label class="control-label col-sm-3" for="date">From:</label>
                          <div class="col-sm-9">
                            <input type="date" class="date" id="from">
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="control-label col-sm-3" for="date">To:</label>
                          <div class="col-sm-9">
                            <input type="date" class="date" id="to">
                          </div>
                        </div>

                        <div class="form-group">
                          <div class="col-sm-offset-2 d-flex  col-sm-10">
                            <button type="submit" id="add"  class="btn btn-primary mr-1  d-flex align-items-center justify-content-center">Add </button>
                            <button type="submit" id="refresh"  class="btn btn-primary  d-flex align-items-center justify-content-center">Refresh </button>
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


        let startYear = 1800;
        let endYear = new Date().getFullYear();
        let months = ["January","February","March","April","Jun","July","Augest","September","October","Novermber","December"];

        for (i = endYear; i > startYear; i--)
        {
          $('#year').append($('<option />').val(i).html(i));
        }
        for (let index = 0; index < months.length; index++) {
          $('#month').append($('<option />').val(index).html(months[index]));
        }

        $("#search").click(function(){
          let year = $("#year").val();
          let month = $("#month").val();
        });


        $(function() {
            $('.date-picker').datepicker( {
            changeMonth: true,
            changeYear: true,
            showButtonPanel: true,
            dateFormat: 'MM yy',
            onClose: function(dateText, inst) {
                $(this).datepicker('setDate', new Date(inst.selectedYear, inst.selectedMonth, 1));
            }
            });
        });
  function showAllHolidays()
  {
    url = "/holiday/list";

    $.ajax({
                method:'GET',
                dataType:'JSON',
                url : url,
                success:function(response){
                  console.log(response);

            }
        })


  }

  $("#add").click(function(e){
    e.preventDefault();
    var from = $('#from').val();
    var to = $('#to').val();
    var holiday_name = $('#holiday_name').val();
    var update_id = $("#update_id").val();
    if (update_id>0) {
      url = "/holiday/update/"+update_id;
      data={"_token": $('#token').val(),id:update_id,holiday_name:holiday_name,from:from,to:to,update:'update'};
    }
    else{
      url = "/holiday/store";
      data={"_token": $('#token').val(),holiday_name:holiday_name,from:from,to:to};
    }
    $.ajax({
          type:"POST",
          dataType:'json',
          url: url,
          data:data,
          success:function(data){
              d_val = data;


                    showAllHolidays();

                    // var name = d_val.name;
                    // var from = d_val.from;
                    // var to = d_val.to;
                    // var tr = "<tr>";
                    //     tr += "<td class='holi_name-"+d_val.id+"'>"+name+"</td>";
                    //     tr += "<td class='holi_date_from-"+d_val.id+"'>"+from+"</td>";
                    //     tr += "<td class='holi_date_to-"+d_val.id+"'>"+to+"</td>";
                    //     tr += "<td> <a href='javascript:void(0)'  class='edit_holiday' data-id='"+d_val.id+"'><i class='far fa-edit'></i></a> <a href='javascript:void(0)' class='delete-holiday' data-id='"+d_val.id+ "'>  <i class='fas fa-trash-alt'></i></a></td></tr>";

                    //     console.log(tr);

                    //  $(".holiday_t tbody").append(tr);
                     $("#holiday_name").val("");
                     $("#from").val("");
                     $("#to").val("");



              }
          })
  });

  $(".edit_holiday").click(function(e){
    e.preventDefault();
    $("#add").text('Update');
    $("#add").attr("id","update");
    var id = $(this).attr('data-id');
    console.log(id);
    $("#update_id").val(id);
    $.ajax({
                method:'GET',
                dataType:'JSON',
                data : {data:id},
                url : '/holiday/edit/'+id,
                success:function(data){
                    $('#holiday_name').val(data.name);
                    $('#from').val(data.from);
                    $('#to').val(data.to);
                    // console.log(data);
            }
        })

  });

      $(".delete-holiday").click(function(){
        var id = $(this).attr('data-id');
        var ro = $(".data-id-"+id);
        console.log(id);
        $.ajax({
                method:'DELETE',
                dataType:'JSON',
                data : {"_token": $('#token').val(),id:id},
                url : '/holiday/delete/'+id,
                success:function(data){
                  window.reload();

            }
        })
      });



</script>
@endpush
