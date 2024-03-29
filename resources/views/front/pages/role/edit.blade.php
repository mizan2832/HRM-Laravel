@extends('front.master')
@section('title','Role edit')
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
                <h2 style="background:gray;">section Form</h2>
                @if ($errors->any())
                    @foreach ($errors->all() as $error)
                        <div style="color: red;">{{$error}}</div>
                    @endforeach
                 @endif
                <form class="form-inline" action="{{ route('role.update', $singleDept->id) }}" method="POST" >
                    @csrf
                    @method('PUT')
                    <label for="role" class="mb-2 mr-sm-2">role:</label>
                    <input type="text" value="{{ $singleDept->name }}" class="form-control mb-2 mr-sm-2" id="role" placeholder="Enter role" name="name">
                    
                    <button type="submit" class="btn btn-primary mb-2">Submit</button>
                  </form>
            </div>
            <div class="col-md-6 col-sm-6 col-lg-6">
                <a href="{{ route('role.index') }}"><button class="btn btn-primary btn-sm">Add New role</button></a>
                <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th>Name</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($allroles as $role)
                          <tr>
                              <td>{{ $role->name }}</td>
                              
                                <td>
                                  <a href="{{ route('role.edit',$role->id) }}"><i class="far fa-edit"></i></a>
                              
                                  <a href="" onclick="if(confirm('Do you want to delete this role?'))event.preventDefault(); document.getElementById('delete-{{$role->name}}').submit();" class="btn btn-sm btn-outline-danger py-0"><i class="fas fa-trash-alt"></i></a></a>
                                  <form id="delete-{{$role->name}}" method="post" action="{{route('section.destroy',$role->id)}}" style="display: none;">
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