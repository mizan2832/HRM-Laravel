@extends('front.master')
@section('title','Units')
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
                <h2 style="background:gray;">Section Form</h2>
                @if ($errors->any())
                    @foreach ($errors->all() as $error)
                        <div style="color: red;">{{$error}}</div>
                    @endforeach
                 @endif
                <form class="form-inline" action="" method="POST" >
                    @csrf
                    <label for="unit" class="mb-2 mr-sm-2">Unit:</label>
                    <input type="text" value="{{ old('unit') }}" class="form-control mb-2 mr-sm-2" id="unit" placeholder="Enter unit" name="name">
                    
                    <button type="submit" class="btn btn-primary mb-2">Submit</button>
                  </form>
            </div>
            <div class="col-md-6 col-sm-6 col-lg-6">
                <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th>Name</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($units as $u)
                          <tr>
                              <td>{{ $u->name }}</td>
                              <td>
                                <td>
                                  <a href="{{ route('unit.edit',$u->id) }}"><i class="far fa-edit"></i></a>
                              
                                  <a href="" onclick="if(confirm('Do you want to delete this section?'))event.preventDefault(); document.getElementById('delete-{{$u->name}}').submit();" class="btn btn-sm btn-outline-danger py-0"><i class="fas fa-trash-alt"></i></a></a>
                                  <form id="delete-{{$u->name}}" method="post" action="{{route('unit.destroy',$u->id)}}" style="display: none;">
                                  @csrf
                                  @method('DELETE')
                                </form>

                                 </a>
                                
                                </td>
                              </td>
                          </tr>
                      @endforeach
                      
                    </tbody>
                  </table>
            </div>
        </div>
    </div>
@endsection