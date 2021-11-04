@extends('front.master')
@section('title','Daily Attendance')
@section('content')
<div class="row">
    <div class="container bg-attn m-2">
        <h3 style="padding-bottom:1.2rem; border-bottom:2px solid black;">Daily Attendance</h3>
    </div>
</div>
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

  
@endsection