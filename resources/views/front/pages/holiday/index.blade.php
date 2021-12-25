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
                    <table class="table table-hover">
                        <thead>
                          <tr>
                            <th>#SI</th>
                            <th>Holiday Name</th>
                            <th>Date</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                       
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
                            <input type="submit" onclick="holiday()" class="btn btn-primary  d-flex align-items-center justify-content-center" value="Add">                          </div>
                        </div>
                     
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


  function holiday(){
    let date = $('#date').val();
    let holiday_name = $('#holiday_name').val();

      $.ajax({
              type:"POST",
              dataType:'json',
              url: "holiday/store",
              data:{date:date,holiday_name:holiday_name},
              success:function(data){
                console.log(data);
              }
            })

      }

  function all_holiday(){

    function allData()
        {
         
            $.ajax({
                type:"GET",
                dataType:'json',
                url: "holiday/show/",
                success:function(data){
                  
                  if (data.data_exit==true) {
                  var $i=1;
                   d = '';
                    $.each(data.attendance,function(key,value){
                      d = d+ " <tr>"
                      d = d + "<td>"+ ($i++) +"</td>"
                      d = d + "<td>"+ value.name +"</td>"
                      d = d + "<input type='hidden'  class='emp_id' name='emp_id[]'  value="+value.employee_id+" >"
                      d = d + "<td><input type='time'  class='inTime' name='inTime[]' value="+value.in_time+"></td>"
                      d = d + "<td><input type='time'  class='outTime' name='outTime[]' value="+value.out_time+"></td>"
                      d = d + "<td><input type='number' name='otTime[]'  class='otTime' value="+value.overtime+"></td>"
                      d = d + "<td><select name='attn_type[]'  class='attn_type'  value="+value.status+"><option value='ab'>Absent</option><option value='p'>Present</option> <option value='r'>On leave</option></select>  </td>"
                      d = d + "</tr> "
                    })
                      $('tbody').html(d);
                  }
                  else{
                    var $i=1;
                    d = '';
                    $.each(data.holidays,function(key,value){
                      d = d+ " <tr>"
                      d = d + "<td>"+ ($i++) +"</td>"
                      d = d + "<td>"+ value.name +"</td>"
                      d = d + "<td> <input  type='hidden' class='emp_id' name='emp_id[]'  value="+value.employee_id+" ></td>"
                      d = d + "<td><input type='time'  class='inTime' name='inTime[]' ></td>"
                      d = d + "<td><input type='time'  class='outTime' name='outTime[]' ></td>"
                      d = d + "<td><input type='number' name='otTime[]'  class='otTime' ></td>"
                      d = d + "<td><select name='attn_type[]'  class='attn_type' ><option value='ab'>Absent</option><option value='p'>Present</option> <option value='r'>On leave</option></select>  </td>"
                     
                      d = d + "</tr> "
                    })
                      $('tbody').html(d);
                  }
                   

                  console.log(data.data_exit);
                 }
              })
        }
  }

  all_holiday();


</script>
@endpush