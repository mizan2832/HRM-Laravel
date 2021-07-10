@extends('front.master')
@section('title','Users')
@section('content')

    <div class="container">
        <div class="row col-md-12 col-sm-12 mt-2">
            <div class="col-md-6 col-sm-6">
                <div class="card per-del">
                    <div class="card-header">Person Details</div>
                    <div class="card-body">

                        <form autocomplete="off" action="#">
                            <div class="form-group row">
                                <label for="name" class="col-sm-2 col-form-label">Name</label>
                                <div class="col-sm-10">
                                    <input type="text" name="name" class="form-control" id="name" autocomplete="off">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="birth" class="col-sm-2 col-form-label">Birth</label>
                                <div class="col-sm-10">
                                    <input type="date" name="date" class="form-control" id="birth" autocomplete="off">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-10">
                                    <input type="email" name="email" class="form-control" id="inputEmail3"  autocomplete="off">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="phone1" class="col-sm-2 col-form-label">Phone 1</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="phone1" name="phone1" autocomplete="off">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="phone2" class="col-sm-2 col-form-label">Phone 2</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="phone2" name="phone2" autocomplete="off">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="street" class="col-sm-2 col-form-label">Street</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="street" name="street" autocomplete="off">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="city" class="col-sm-2 col-form-label">City</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="city" name="city" autocomplete="off">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="zip_code" class="col-sm-2 col-form-label">Zip Code</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="zip_code" name="zip_code" autocomplete="off">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="country" class="col-sm-2 col-form-label">Country</label>
                                <div class="col-sm-10">
                                    <select class="form-control" name="country" id="country">
                                        <option value="">Select Country</option>
                                        <option value="">Bangladesh</option>
                                        <option value="">India</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="meritial_status" class="col-sm-2 col-form-label">Meritial status</label>
                                <div class="col-sm-10">
                                    <select class="form-control" name="meritial_status" id="meritial_status">
                                        <option value="">Select</option>
                                        <option value="">Bachelor</option>
                                        <option value="">Merried</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="photo" class="col-sm-2 col-form-label">Photo</label>
                                <div class="col-sm-10">
                                    <input type="file" name="photo">
                                </div>
                            </div>
                        </form>

                    </div>
                    
                  </div>
            </div>
            <div class="col-md-6 col-sm-6">
                <div class="card-header">Person Details</div>
            </div>
        </div>
    </div>
@endsection