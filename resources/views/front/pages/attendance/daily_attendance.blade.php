@extends('front.master')
@section('title','Daily Attendance')
@push('head')
    
@endpush
@section('content')
<div class="row">
    <div class="container bg-attn">
        <h3 style="padding-bottom:1.2rem; border-bottom:2px solid black;">Daily Attendance</h3>
    </div>
</div>


<form  enctype="multipart/form-data" method="POST" action="{{ route('daily-attendance.store') }}">
  @csrf
 
    <div class="container">
    <div class="row mb-2 col-md-12">
      <div class="col-md-2">
        <div class="col">
        <div class="form-outline">
          <label class="form-label" for="form3Example1">Employee Id</label>
          <input type="text" id="emp_id" name="emp_id" class="form-control" />
        </div>
      </div>
    </div>
      <div class="col-md-4">
        <div class="col">
        <div class="form-outline">
          <label class="form-label" for="form3Example1">Employee Name</label>
          <input type="text" id="emp_name" name="emp_name" class="form-control" />
        </div>
      </div>
     </div>
      <div class="col-md-3">
        <div class="col">
          <div class="form-outline">
            <label class="form-label" for="form3Example2">In Time</label>
            <input type="time" name="in_time" id="in_time" class="form-control" />
          </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="col">
          <div class="form-outline">
            <label class="form-label" for="form3Example2">Out Time</label>
            <input type="time" name="out_time" id="out_time" class="form-control" />
          </div>
        </div>
      </div>    
    </div>

    <div class="row mb-2 col-md-12">
      <div class="col-md-4">
        <div class="col">
        <div class="form-outline">
          <label class="form-label" for="form3Example1">Department</label>
          <select name="dept_name" id="dept_name" class="form-control">
            <option value="">Select Department</option>
            @foreach ($departments as $dept)
                <option value="{{$dept->id}}">{{$dept->dpt_name}}</option>
            @endforeach
          
          </select>
        </div>
      </div></div>
      <div class="col-md-4">
        <div class="col">
          <div class="form-outline">
            <label class="form-label" for="form3Example2">Date</label>
            <input type="date" id="date" name="date" class="form-control" />
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="col">
          <div class="form-outline">
            <label class="form-label" for="form3Example2">Attendance Type</label>
            <select name="code" id="code" class="form-control">
              <option value="">Select Type</option>
              @foreach ($leaves as $le)
                 <option value="{{$le->code}}">{{$le->type}}</option>
              @endforeach
            </select>
          </div>
        </div>
      </div>   
    </div>


    <!-- Submit button -->
    <div class="row justify-content-center">
      <button type="submit" id="save" class="btn btn-primary">Submit</button>
    </div> 

  </div>
  </form>
  
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
                
        
            </tr> 
          @endforeach

         
        </tbody>
      </table>
    </div>
    <div class="container mt-2">
            <p style="float: left;">Showing 1 to 3 of 10 entities</p>
            <div class="paginate" style="float: right;">

              {{ $datas->links() }}

              {{-- <div class="btn-group">
                <button type="button" style="margin-right: 2px;" class="btn btn-primary">Previous</button>
                <button type="button" class="btn btn-primary">Next</button>
              </div> --}}
            </div>
      </div>
      <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">

      <input type="submit" value="save" id="save" onclick="attendance_save()" class="btn btn-success attn-save">
 
    </div>
  </div>

  
@endsection
{{-- @push('js')
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
                  
                  // if (data.data_exit==true) {
                  // var $i=1;
                  //  d = '';
                  //   $.each(data.attendance,function(key,value){
                  //     d = d+ " <tr>"
                  //     d = d + "<td>"+ ($i++) +"</td>"
                  //     d = d + "<td>"+ value.name +"</td>"
                  //     d = d + "<input type='hidden'  class='emp_id' name='emp_id[]'  value="+value.employee_id+" >"
                  //     d = d + "<td><input type='time'  class='inTime' name='inTime[]' value="+value.in_time+"></td>"
                  //     d = d + "<td><input type='time'  class='outTime' name='outTime[]' value="+value.out_time+"></td>"
                  //     d = d + "<td><input type='number' name='otTime[]'  class='otTime' value="+value.overtime+"></td>"
                  //     d = d + "<td><select name='attn_type[]'  class='attn_type'  value="+value.status+"><option value='ab'>Absent</option><option value='p'>Present</option> <option value='r'>On leave</option></select>  </td>"
                  //     d = d + "</tr> "
                  //   })
                  //     $('tbody').html(d);
                  // }
                  // else{
                  //   var $i=1;
                  //   d = '';
                  //   $.each(data.employees,function(key,value){
                  //     d = d+ " <tr>"
                  //     d = d + "<td>"+ ($i++) +"</td>"
                  //     d = d + "<td>"+ value.name +"</td>"
                  //     d = d + "<td> <input  type='hidden' class='emp_id' name='emp_id[]'  value="+value.employee_id+" ></td>"
                  //     d = d + "<td><input type='time'  class='inTime' name='inTime[]' ></td>"
                  //     d = d + "<td><input type='time'  class='outTime' name='outTime[]' ></td>"
                  //     d = d + "<td><input type='number' name='otTime[]'  class='otTime' ></td>"
                  //     d = d + "<td><select name='attn_type[]'  class='attn_type' ><option value='ab'>Absent</option><option value='p'>Present</option> <option value='r'>On leave</option></select>  </td>"
                     
                  //     d = d + "</tr> "
                  //   })
                  //     $('tbody').html(d);
                  // }
                   

                  console.log(data.data_exit);
                 }
              })
        }

        function departmentData()
        {
          // var content= $('tbody').val();
          // console.log(content);
          var emp_dept = $('#emp_dept').val();
          var date = $('#date').val();
          var file = $('#file').val();
          if (file) {
            $.ajax({
                type:'post',
                dataType:'json',
                url: "attendance/store/csv",
                data:{"_token": $('#token').val(),date:date,file:file},
                success:function(data){
                  console.log(data)
                }

                
            })
          }else{

          $.ajax({
                type:"post",
                dataType:'json',
                url: "attendance/show",
                data:{"_token": $('#token').val(),date:date,emp_dept:emp_dept},
                success:function(data){
                  var $i=1;
                    $.each(data,function(key,value){
                      data = data+ "<tr>"
                      data = data + "<td>"+ ($i++) +"</td>"
                      data = data + "<td>"+ value.name +"</td>"
                      data = data + "<td>Manual</td>"
                      data = data + "<td><input type='time' class='inTime' name='inTime[]'  value="+value.in_time+"></td>"
                      data = data + "<input type='number'  class='emp_id' name='emp_id[]'  value="+value.employee_id+" hidden>"
                      data = data + "<td><input type='time' class='outTime' value="+value.out_time+" name='outTime[]'></td>"
                      data = data + "<td><input type='number' name='otTime[]' id='otTime' value="+value.overtime+"></td>"
                      data = data + "<td><select name='attn_type[]' class='attn_type'><option value='0'>Absent</option><option value='1'>Present</option> <option value='2'>On leave</option></select>  </td>"
                      data = data + "</tr>"
                    })
                      $('tbody').html(data);
                      $('.paginate').empty();
                 }
              })
          }

          
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
        
          // allData();
    </script>
@endpush --}}