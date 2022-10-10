@extends('front.master')
@section('title','Employee List')
@push('head')
@endpush
@section('content')
@include('employee_table')
@endsection
@push('js')
    <script>
      $(document).ready(function(){
        $(document).on('click', '.pagination a', function(event) {
          event.preventDefault();
          var page = $(this).attr('href').split('page=')[1];
          getMoreUsers(page);
        });

      })

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
              // $('#user_data').html(data);
              console.log(data);
            }
          });
          }
    </script>
@endpush

