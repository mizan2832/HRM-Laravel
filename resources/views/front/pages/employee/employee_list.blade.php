@extends('front.master')
@section('title','Employee List')
@push('head')
@endpush
@section('content')
<h2 style="text-align: center">Employee List</h2>

<form class="form-inline">

  <label for="name" class="mr-sm-2">Name</label>
  <input type="text" class="form-control mb-2 mr-sm-2" placeholder="Enter name" id="name">

  <label for="email" class="mr-sm-2">Email</label>
  <input type="email" class="form-control mb-2 mr-sm-2" placeholder="Enter email" id="email">

  <label for="number" class="mr-sm-2">Mobile</label>
  <input type="number" class="form-control mb-2 mr-sm-2" placeholder="Enter mobile" id="mobile">
{{--       
  <label for="select" class="mr-sm-2">Select</label>
  <select name="select" id="select" class="form-control mb-2 mr-sm-2">
    <option value="">Select option</option>
    <option value="department">Department</option>
    <option value="joining_date">Joining Date</option>
    <option value="section">Section</option>
    <option value="unit">Unit</option>
  </select> --}}

</form>
<div id="employee_data">
  @include('front.pages.employee.employee_table')
</div>
@endsection
@push('js')
    <script>
        $(document).on('click', '.pagination a', function(event) {
          event.preventDefault();
          var page = $(this).attr('href').split('page=')[1];
          getMoreUsers(page);
        });
        $('#name').on('keyup', function() {
          getMoreUsers();
        });

        $('#email').on('keyup', function (e) {
					getMoreUsers();
        });
        
        $('#mobile').on('keyup', function (e) {
					getMoreUsers();
				});
      
      function getMoreUsers(page) {

          var name = $('#name').val();
          var email = $("#email").val();
          var mobile = $("#mobile").val();
          $.ajax({
            type: "GET",
            data: {
              'name':name,
              'email': email,
              'mobile': mobile,
            },
            url: "{{ route('employees.get-more-employees') }}" + "?page=" + page,
            success:function(data) {
              $('#employee_data').html(data);
              // console.log(data);
            }
          });
          }


        
    </script>
@endpush

