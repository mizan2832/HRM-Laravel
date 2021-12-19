@extends('front.master')
@section('title','Holiday')

@section('content')
<div class="container">
        <div class="holiday-header text-center d-flex align-items-center justify-content-center
        ">
            <div class="row">
                    <form class="form-inline">
                        <div class="form-group">
                            <label for="year">Select Year:</label>
                            <select name="year" id="year">
                                <option value="20">2021</option>
                                <option value="20">2020</option>
                            </select>
                          </div>
                          <div class="form-group">
                            <label for="month">Select Month:</label>
                            <select name="month" id="month">
                                <option value="jan">January</option>
                                <option value="feb">February</option>
                            </select>
                          </div>
                       
                          <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
            </div>
        </div>
        <div class="holiday-body">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-hover">
                        <thead>
                          <tr>
                            <th>#SI</th>
                            <th>Holiday Name</th>
                            <th>Date</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>John</td>
                            <td>Doe</td>
                            <td>john@example.com</td>
                            <td>
                                <a href="#"><i class="far fa-edit"></i></a>
                                <a href="#"><i class="fas fa-trash-alt"></i></a>
                           </td>
                          </tr>
                          <tr>
                            <td>Mary</td>
                            <td>Moe</td>
                            <td>mary@example.com</td>
                            <td>
                                <a href="#"><i class="far fa-edit"></i></a>
                                <a href="#"><i class="fas fa-trash-alt"></i></a>
                           </td>
                          </tr>
                          <tr>
                            <td>July</td>
                            <td>Dooley</td>
                            <td>july@example.com</td>
                            <td>
                                <a href="#"><i class="far fa-edit"></i></a>
                                <a href="#"><i class="fas fa-trash-alt"></i></a>
                           </td>
                          </tr>
                        </tbody>
                      </table>
    
                </div>
                <div class="col-md-6">
                    <form class="form-horizontal">
                        <div class="form-group">
                          <label class="control-label col-sm-3" for="holiday-name">Holiday name:</label>
                          <div class="col-sm-6">
                            <input type="text" class="form-control" id="holiday_name" placeholder="Enter holiday name" name="holiday-name">
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="control-label col-sm-3" for="date">Date:</label>
                          <div class="col-sm-9">          
                            <input type="date" class="date" id="date">
                          </div>
                        </div>
                       
                        <div class="form-group">        
                          <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-primary  d-flex align-items-center justify-content-center">Add</button>
                          </div>
                        </div>
                      </form>
                </div>
            </div>
        </div>
        
    </div>
@endsection