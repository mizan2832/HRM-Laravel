@extends('front.master')
@section('title','Attendance Type')
@push('head')
<style>
    .attnHeader{
        border: 1px solid black;
        border-radius: 50%;
        background-color: green;
        color: #ffffff;
    }
    table th {
      text-align: center; 
    }

    .table {
        margin: auto;
        width: 50% !important; 
    }
</style>
@endpush
@section('content')
    <div class="attnType">
        <h1 class="text-center attnHeader">Attendance Type</h1>
        <div class="container mt-5"> 
            <button type="button" id="add" class="btn btn-primary" data-toggle="modal" data-target="#addType">
               Add Type
              </button> 
                    <div class="attnTable">
                        <table class="table table-bordered table-striped text-center" id="tTable">
                            <thead>
                                <tr>
                                   <th>Type</th>
                                   <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                                    @foreach ($types as $type)
                                     <tr>
                                        <td>{{$type->name}}</td>
                                        <td><a href="javascript:void(0)"  class="edit_type" data-id="{{ $type->id }}"><i class="far fa-edit"></i></a> <a href=""><i class="fas fa-trash-alt"></i></a>  </td>
                                    </tr>
                                    @endforeach
                            </tbody>
                         </table>
                    </div>
           
        </div>
          
        </div>

        <div class="modal fade" id="addType" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="model-header">
                    <h1 class="text-center">Type</h1>
                </div>
               
                <div class="modal-body">
                    <div class="input-group mb-3">
                        <input type="text" id="name" class="form-control" placeholder="type name" >         
                      </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" id="typeSave" class="btn btn-primary">Save</button>
                    <button type="button" id="update" class="btn btn-primary">Update</button>
                  </div>

              </div>
              <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}"> 

            </div>
          </div>
    </div>
@endsection
@push('js')
    <script>
      $('#add').click(function(){
        $('#update').hide();
        $('#typeSave').show();
      })

      $('#typeSave').click(function(){
        var name = $('#name').val();
        $.ajax({
            type:'POST',
            dataType:'json',
            url:'/save',
            data:{"_token": $('#token').val(),name:name},
            success: function(data){
                var name = data.name;
                var data = "<tr>";
                    data += "<td id='"+data.id+"'>"+name+"</td>";
                    data += "<td><a href='#' class='edit_type' data-id='"+data.id+"'><i class='far fa-edit'></i></a> <a href=''><i class='fas fa-trash-alt'></i></a> </td>";
                    data += "</tr>";
                let tableBody = $('#tTable tbody').append(data);
               
            }

        })
      });

      $('.edit_type').click(function(){
        var type_id = $(this).data('id');
        console.log(type_id);
            $.ajax({
                method:'GET',
                dataType:'JSON',
                data : {data:type_id},
                url : '/attendance-type/edit/'+type_id,
                success:function(data){
                    $('#addType').modal('show');
                    $('#name').val(data.name);  
                    $('#typeSave').hide();
                    $('#update').show();
            }
        })


      });
      
    

    </script>
@endpush