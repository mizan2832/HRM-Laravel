@extends('front.master')
@section('title','Daily Attendance')
@section('content')
<div class="row">
    <div class="container bg-attn">
        <h3 style="padding-bottom:1.2rem; border-bottom:2px solid black;">Daily Attendance</h3>
    </div>
</div>
<div class="container  bg-attn">
<form class="form-inline  bg-attn" action="/action_page.php">
      <label for="emp_dept" class="mb-2 mr-sm-2">Employee by department:</label>
      <select name="" id="emp_dept" class="form-control col-md-3">
          <option value="">Operator</option>
          <option value="">Programmer</option>
      </select>
      <label for="date" class="mb-2 mr-sm-2">Date:</label>
      <input type="date" class="form-control mb-2 mr-sm-2" id="date"  name="pswd">
          
      <button type="submit" class="btn btn-primary mb-2">Submit</button>
    </form>


  </div>
  <div class="container bg-attn  mt-2">
    <div class="row">
      <div class="entities">
          <p>Show</p>
          <input type="number"  spinbutt id="numOfEmployee">
          <p>Entities</p>
      </div>
      <div class="attn-search">
        <span>Search</span>
        <input type="text">
      </div>
    </div>
    <div class="attn-table pt-2">
      <table style="width: 100%" class="table table-hover table-responsive table-bordered">
        <thead>
          <th style="width: 5%">SI</th>
          <th style="width:20%">Employee Name</th>
          <th style="width: 20%">Attendance Type</th>
          <th style="width: 10%">In Time</th>
          <th style="width: 10%">Out Time</th>
          <th style="width: 10%">Overtime</th>
          <th style="width: 10%">Status</th>
        </thead>
        <tbody>
          <tr>
            <td>1</td>
            <td>Mizanur Rahman</td>
            <td>Manual</td>
            <td>8:00 AM</td>
            <td>8:00 PM</td>
            <td>2 HOURS</td>
            <td>
              <select name="" id="">
                <option value="">Absent</option>
                <option value="">Present</option>
                <option value="">On leave</option>
              </select>
            </td>
          </tr>
          <tr>
            <td>1</td>
            <td>Mizanur Rahman</td>
            <td>Manual</td>
            <td>8:00 AM</td>
            <td>8:00 PM</td>
            <td>2 HOURS</td>
            <td>
              <select name="" id="">
                <option value="">Absent</option>
                <option value="">Present</option>
                <option value="">On leave</option>
              </select>
            </td>
          </tr>
          <tr>
            <td>1</td>
            <td>Mizanur Rahman</td>
            <td>Manual</td>
            <td>8:00 AM</td>
            <td>8:00 PM</td>
            <td>2 HOURS</td>
            <td>
              <select name="" id="">
                <option value="">Absent</option>
                <option value="">Present</option>
                <option value="">On leave</option>
              </select>
            </td>
          </tr>
         
        </tbody>
      </table>
    </div>
    <div class="container mt-2">
            <p style="float: left;">Showing 1 to 3 of 10 entities</p>
            <div class="paginate" style="float: right;">
              <div class="btn-group">
                <button type="button" style="margin-right: 2px;" class="btn btn-primary">Previous</button>
                <button type="button" class="btn btn-primary">Next</button>
              </div>
            </div>
      </div>
    </div>
  </div>

  
@endsection