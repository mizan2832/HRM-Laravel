@extends('front.master')
@section('title','Daily Attendance')
@section('content')
<div class="row">
    <div class="container bg-attn">
        <h3 style="padding-bottom:1.2rem; border-bottom:2px solid black;">Daily Attendance</h3>
    </div>
</div>
<div class="container  bg-attn">
<div class="form-inline  bg-attn" >
      <label for="emp_dept" class="mb-2 mr-sm-2">Employee by department:</label>
      <select name="emp_dept" id="emp_dept" class="form-control col-md-3">
          <option value="all">All Department</option>
          @foreach ($departments as $dept)
              <option value="{{$dept->id}}">{{$dept->dpt_name}}</option>
          @endforeach
      </select>
      <label for="date" class="mb-2 mr-sm-2">Date:</label>
      <input type="date" class="form-control mb-2 mr-sm-2" id="date"  name="pswd">
          
      <button type="submit" id="submit"  class="btn btn-primary mb-2" onclick="departmentData()">Submit</button>
    </div>


  </div>
  <div class="container bg-attn  mt-2">
    z
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
        </thead>
        <tbody>
   
         
        </tbody>
      </table>
    </div>
    <div class="container mt-2">
            <p style="float: left;">Showing 1 to 3 of 10 entities</p>
            <div class="paginate" style="float: right;">
              <div class="btn-group">
                <button type="button" style="margin-right: 2px;" class="btn btn-primary">Previous</button>
                <button type="button" class="btn btn-primary">Next</button>
              </div>
            </div>
      </div>
      <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">

      <input type="submit" value="save" id="save" onclick="attendance_save()" class="btn btn-success attn-save">
 
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
      var date = new Date();
      $('#date').val(date.toISOString().slice(0, 10));
        function allData()
        {
          var date = $('#date').val();

            $.ajax({
                type:"GET",
                dataType:'json',
                url: "attendance/show/",
                data:{"_token": $('#token').val(),date:date},
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
                    $.each(data.employees,function(key,value){
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

        function departmentData()
        {
          var emp_dept = $('#emp_dept').val();
          var date = $('#date').val();
          $.ajax({
                type:"GET",
                dataType:'json',
                url: "attendance/show/"+emp_dept,
                data:{date:date},
                success:function(data){
                  var $i=1;
                    $.each(data,function(key,value){
                      data = data+ "<tr>"
                      data = data + "<td>"+ ($i++) +"</td>"
                      data = data + "<td>"+ value.name +"</td>"
                      data = data + "<td>Manual</td>"
                      data = data + "<td><input type='time' class='inTime' name='inTime[]'></td>"
                      data = data + "<input type='number'  class='emp_id' name='emp_id[]'  value="+value.employee_id+" hidden>"
                      data = data + "<td><input type='time' class='outTime' name='outTime[]'></td>"
                      data = data + "<td><input type='number' name='otTime[]' id='otTime'></td>"
                      data = data + "<td><select name='attn_type[]' class='attn_type'><option value='0'>Absent</option><option value='1'>Present</option> <option value='2'>On leave</option></select>  </td>"
                      data = data + "</tr>"
                    })
                      $('tbody').html(data);

                  // console.log(data);
                 }
              })
          
        }

        function attendance_save(){
          var date = $('#date').val();
          var emp_id   = [];       
          var inTime  =[];
          var outTime = [];
          var otTime  = [];
          var attn_type = [];

          $('.emp_id').each(function(){
            emp_id.push($(this).val());
          });
          $('.inTime').each(function(){
            inTime.push($(this).val());
          });
          $('.outTime').each(function(){
            outTime.push($(this).val());
          });
          $('.otTime').each(function(){
            otTime.push($(this).val());
          });
          $('.attn_type').each(function(){
            attn_type.push('ab');
          });

          $.ajax({
            type:"POST",
            dataType:'json',
            url: "attendance/store",
            data:{"_token": $('#token').val(),date:date,emp_id:emp_id,inTime:inTime,outTime:outTime,otTime:otTime,attn_type:attn_type},
            success:function(data){
              console.log(data);
            }
          })


        }
        
          allData();
    </script>
@endpush