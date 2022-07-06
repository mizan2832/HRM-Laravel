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
        
               
                
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addType">
               Add Type
              </button>
              
                    <div class="attnTable">
                        <table class="table table-bordered table-striped text-center">
                            <thead>
                                <tr>
                                   <th>Type</th>
                                   <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td></td>
                                    <td></td>
                                </tr>
                             
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
                        <input type="text" class="form-control" placeholder="type name" >
                    
                      </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save</button>
                  </div>

              </div>
            </div>
          </div>
    </div>
@endsection
@push('js')
    <script>
        
    </script>
@endpush