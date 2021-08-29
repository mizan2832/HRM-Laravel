@extends('front.master')
@section('title','Departments')
@section('content')
    <div class="container mt-2">
        <div style="margin-top: 70px;" class="row col-md-12 col-sm-12 col-lg-12">
            <div class="card col-md-6 col-sm-6 col-lg-6">
            
              @if ($message = Session::get('success'))
              <div class="alert alert-success alert-block">
                     <button type="button" class="close" data-dismiss="alert">×</button>	
                      <strong>{{ $message }}</strong>
              </div>
              @endif
                <h2 style="background:gray;">Department Form</h2>
                @if ($errors->any())
                    @foreach ($errors->all() as $error)
                        <div style="color: red;">{{$error}}</div>
                    @endforeach
                 @endif
                <form class="form-inline" action="{{ route('department.update', $singleDept->id) }}" method="POST" >
                    @csrf
                    @method('PUT')
                    <label for="department" class="mb-2 mr-sm-2">Department:</label>
                    <input type="text" value="{{ $singleDept->dpt_name }}" class="form-control mb-2 mr-sm-2" id="department" placeholder="Enter Department" name="dpt_name">
                    
                    <button type="submit" class="btn btn-primary mb-2">Submit</button>
                  </form>
            </div>
            <div class="col-md-6 col-sm-6 col-lg-6">
                <a href="{{ route('department.index') }}"><button class="btn btn-primary btn-sm">Add New Department</button></a>
                <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th>Name</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($allDepartment as $dept)
                          <tr>
                              <td>{{ $dept->dpt_name }}</td>
                              
                                <td>
                                  <a href="{{ route('department.edit',$dept->id) }}"><i class="far fa-edit"></i></a>
                              
                                  <a href="" onclick="if(confirm('Do you want to delete this department?'))event.preventDefault(); document.getElementById('delete-{{$dept->dpt_name}}').submit();" class="btn btn-sm btn-outline-danger py-0"><i class="fas fa-trash-alt"></i></a></a>
                                  <form id="delete-{{$dept->dpt_name}}" method="post" action="{{route('department.destroy',$dept->id)}}" style="display: none;">
                                  @csrf
                                  @method('DELETE')
                                </form>

                                 </a>
                                
                                </td>
                        
                          </tr>
                      @endforeach
                      
                    </tbody>
                  </table>
            </div>
        </div>
    </div>
@endsection