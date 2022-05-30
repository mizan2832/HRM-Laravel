@extends('front.master')
@section('title','Leave Type')
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
                <h2 style="background:gray;">Leave Form</h2>
                @if ($errors->any())
                    @foreach ($errors->all() as $error)
                        <div style="color: red;">{{$error}}</div>
                    @endforeach
                 @endif
                <form class="form-inline" action="{{ route('leave.create') }}" method="POST" >
                    @csrf
                    <div class="container">
                    <div class="row col-md-12">
                      <div class="col-md-6"> 
                   
                         <input type="text" value="{{ old('type') }}" class="form-control mb-2 mr-sm-2" id="type" placeholder="Enter type" name="type">
                      </div>
                      <div class="col-md-6">
                        <input type="text" value="{{ old('code') }}" class="form-control mb-2 mr-sm-2" id="code" placeholder="Enter code" name="code">
                      </div>
                      
                    </div>
                    <div class="row justify-content-center">
                      <button type="submit" id="save" class="btn btn-primary">Submit</button>
                    </div> 
                    </div>
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
                      @foreach ($leaves as $l)
                          <tr>
                              <td>{{ $l->type }}</td>
                              <td>{{ $l->code }}</td>
                              <td>
                                <td>
                                  <a href="{{ route('leave.edit',$l->id) }}"><i class="far fa-edit"></i></a>
                              
                                  <a href="" onclick="if(confirm('Do you want to delete this leave?'))event.preventDefault(); document.getElementById('delete-{{$l->type}}').submit();" class="btn btn-sm btn-outline-danger py-0"><i class="fas fa-trash-alt"></i></a></a>
                                  <form id="delete-{{$l->type}}" method="post" action="{{route('leave.destroy',$l->id)}}" style="display: none;">
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