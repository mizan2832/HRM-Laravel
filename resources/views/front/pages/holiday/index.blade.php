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
                            <th>From</th>
                            <th>To</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody class="table_body">
                       @foreach ($holidays as $day)
                        <tr>
                           <td class="holi_name-{{$day->id}}">{{$day->name}}</td>
                           <td class="holi_date-{{$day->id}}">{{$day->from}}</td>
                           <td class="holi_date-{{$day->id}}">{{$day->to}}</td>
                           <td><button  onclick='editHoliday({{ $day->id }})'  data-id="{{ $day->id }}"><i class="far fa-edit"></i></button> <button onclick='deleteHoliday({{ $day->id }})' data-id="{{ $day->id }}">  <i class="fas fa-trash-alt"></i></button> </td>
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

    $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

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
    $.ajax({
                method:"GET",
                dataType:'JSON',
                url: "{{ route('holiday.list') }}",

                success:function(data){
                    $(".holiday_t tbody").html("");
                    for (let i = 0; i < data.length; i++) {
                            let editbtn = " <button";
                               editbtn += " data-id="  +data[i].id+ " onclick='editHoliday("+data[i].id+")' ><i class='far fa-edit'></i></button>";
                            let deletebtn = " <button class='delete_holiday' " ;
                               deletebtn += " data-id="  +data[i].id+ " onclick='deleteHoliday("+data[i].id+")' ><i class='fas fa-trash-alt'></i></button>";
                            let holidayRow = "<tr>";
                                holidayRow += "<td>" + data[i].name + "</td>";
                                holidayRow += "<td>" + data[i].from + "</td>";
                                holidayRow += "<td>" + data[i].to + "</td>";
                                holidayRow += "<td>" + editbtn + deletebtn  + "</td>";
                                holidayRow += "</tr>";
                                $('.holiday_t tbody').append(holidayRow);

                            }
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
                    showAllHolidays();
                     $("#holiday_name").val("");
                     $("#from").val("");
                     $("#to").val("");

              }
          })
  });
    function editHoliday(id){
        $("#add").text('Update');
        $("#add").attr("id","update");
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

    }

 function deleteHoliday(id){
    $.ajax({
                method:'DELETE',
                dataType:'JSON',
                data : {"_token": $('#token').val(),id:id},
                url : '/holiday/delete/'+id,
                success:function(data){
                    showAllHolidays();
            }
        })
 }




</script>
@endpush
