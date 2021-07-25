@extends('front.master')
@section('title','Employee List')
@push('head')
<meta name="csrf-token" content="{{ csrf_token() }}">
@endpush
@section('content')
<div class="container box">
    <div class="panel panel-default">
     <div class="panel-body">
      <div class="form-group">
       <input type="text" name="search" id="search" class="form-control" placeholder="Search employee" />
      </div>
      <div class="table-responsive">
       <h3 align="center">Total Employee : <span id="total_records"></span></h3>
       <table class="table table-striped table-bordered">
        <thead>
         <tr>
          <th>No.</th>
          <th>Name</th>
          <th>Department</th>
          <th>Joining Date</th>
          <th>Phone</th>
          <th>Salary</th>
          <th>Action</th>
         </tr>
        </thead>
        <tbody>
 
        </tbody>
       </table>
      </div>
     </div>    
    </div>
   </div>
@endsection
@push('js')
<script>
    $(document).ready(function(){
    
     fetch_employee_data();
    
     function fetch_employee_data(query = '')
     {

      $.ajax({
       url:"{{ route('list.employees') }}",
       method:'GET',
       data:{query:query},
       dataType:'json',
       success:function(data)
       {
        $('tbody').html(data.table_data);
        $('#total_records').text(data.total_data);
       }
      })
     }
    
     $(document).on('keyup', '#search', function(){
      var query = $(this).val();
      fetch_employee_data(query);
     });
    });
    </script>
@endpush