
<form  enctype="multipart/form-data" method="POST" action="{{ route('daily-attendance.store') }}">
    @csrf
   
      <div class="container">
      <div class="row mb-2 col-md-12">
        <div class="col-md-4">
          <div class="col">
          <div class="form-outline">
            <label class="form-label" for="form3Example1">Employee Id</label>
            <input type="text" id="emp_id" name="emp_id" class="form-control" />
          </div>
        </div>
      </div>
        <div class="col-md-4">
          <div class="col">
            <div class="form-outline">
              <label class="form-label" for="form3Example2">In Time</label>
              <input type="time" name="in_time" id="in_time" class="form-control" />
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="col">
            <div class="form-outline">
              <label class="form-label" for="form3Example2">Out Time</label>
              <input type="time" name="out_time" id="out_time" class="form-control" />
            </div>
          </div>
        </div>    
      </div>
  
      <div class="row mb-2 col-md-12">
        <div class="col-md-4">
          <div class="col">
          <div class="form-outline">
            <label class="form-label" for="form3Example1">Department</label>
            <select name="dept_name" id="dept_name" class="form-control">
              <option value="">Select Department</option>
              @foreach ($departments as $dept)
                  <option value="{{$dept->id}}">{{$dept->dpt_name}}</option>
              @endforeach
            
            </select>
          </div>
        </div></div>
        <div class="col-md-4">
          <div class="col">
            <div class="form-outline">
              <label class="form-label" for="form3Example2">Date</label>
              <input type="date" id="date" value="@php echo date("Y-m-d");  @endphp" name="date" class="form-control" />
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="col">
            <div class="form-outline">
              <label class="form-label" for="form3Example2">Attendance Type</label>
              <select name="code" id="code" class="form-control">
                <option value="">Select Type</option>
                @foreach ($leaves as $le)
                   <option value="{{$le->code}}">{{$le->type}}</option>
                @endforeach
              </select>
            </div>
          </div>
        </div>   
      </div>
  
  
      <!-- Submit button -->
      <div class="row justify-content-center">
        <button type="submit" id="save" class="btn btn-primary">Submit</button>
      </div> 
  
    </div>
    </form>