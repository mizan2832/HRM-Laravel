@extends('front.master')
@section('title','Employee List')
@push('head')
@endpush
@section('content')
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

