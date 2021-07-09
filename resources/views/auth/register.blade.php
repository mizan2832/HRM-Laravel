@extends('front.master')
@push('css')
<link rel="stylesheet" href="css/registration.css">
<script src="js/regis.js"></script>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<style type="">
  input[type='file'] {
     color: transparent;
  }
</style>
@endpush
@section('content')
<!-- MultiStep Form -->
<div class="container">
  @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    <form id="regForm" action="{{route('register')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="tab"><h1>Register As a Tutor</h1>
          <!-- One "tab" for each step in the form: -->
          
            <p>Full Name:</p>
            <input placeholder="Enter your full name"  value="{{ old('name') }}" required  name="name">
              <p>Select Gender</p>           
              <select name="gender" id="gender" >
                <option value="1" disabled>Select Gender</option>
                <option value="1">Male</option>
                <option value="0">Female</option>
              </select>
            <p>Phone Number:</p>
            <input type="text" placeholder="Enter your phone number"  value="{{ old('phone_number') }}" required  name="phone_number">
            <p>Email Address:</p>
            <input type="email" placeholder="Enter your Email" oninput="this.className = ''" value="{{ old('email') }}" required  name="email">
            <p>Password:</p>
            <input placeholder="Enter your password" type="password" oninput="this.className = ''" value="{{ old('password') }}" required  name="password">
        
            <p>Password Confirmation:</p>
            <input type="password" placeholder="Retype your password"  value="{{ old('password_confirmation') }}" required  name="password_confirmation">
            <div class="row col-md-12 mt-4">
              <div class="col-md-3 border border-0">
                  <input type="file" name="nijerChobi" accept="image/*" title=" " onchange="studentProfile(event)">
              </div>
              <div class="col-md-3">
                  <img style="width:100px;height:100px;position: ;margin-top:-10px;" title=" " class="hidden" id="profile" />
              </div>

          </div>
          </div>

          {{-- person information --}}


          <div class="tab">
            <h1>Personal Information</h1>
            <div class="row ">
              <div class="col-md-6">
                  <p>Your Current Institution:</p>
                  <input placeholder="Your current institution" value="{{ old('institution') }}" required name="institution">
              </div>
              <div class="col-md-6">
                  <p>Name of the Subject you are studding on:</p>
                  <input placeholder="Enter your subject" value="{{ old('subject') }}" required name="subject">
              </div>
          </div>

          <div class="row ">
              <div class="col-md-6">
                  <p>Your Highest Qualification:</p>
                  <input type="text" placeholder="Enter your qualification" value="{{ old('qualification') }}" required name="qualification">
              </div>
              <div class="col-md-6">
                  <p>Background Medium:</p>
                  <div class="form-group">
                      <select class="form-control" id="sel1" value="{{ old('s_medium') }}" required name="s_medium">
                    <option value="b">Bangla Medium</option>
                    <option value="e">English Medium</option>
                  </select>
                  </div>
              </div>
          </div>

          <label for="pwd">Your SSC/O-level information:</label> <br>
          <div class="row ssc">
              <div class="col-sm-3"><input type="text" placeholder="Passing Year" value="{{ old('ssc_year') }}" required name="ssc_year"></div>
              <div class="col-sm-3"><input type="text" placeholder="Institution" value="{{ old('ssc_institution') }}" required name="ssc_institution"></div>
              <div class="col-sm-3"><input type="text" placeholder="Group" value="{{ old('ssc_group') }}" required name="ssc_group"></div>
              <div class="col-sm-3"><input type="text" placeholder="GPA" value="{{ old('ssc_gpa') }}" required name="ssc_gpa"></div>
          </div>
          <label for="pwd">Your HSC/A-level information:</label><br>
          <div class="row hsc">
              <div class="col-sm-3"><input type="text" placeholder="Passing Year" value="{{ old('hsc_year') }}" required name="hsc_year"></div>
              <div class="col-sm-3"><input type="text" placeholder="Institution" value="{{ old('hsc_institution') }}" required name="hsc_institution"></div>
              <div class="col-sm-3"><input type="text" placeholder="Group" value="{{ old('hsc_group') }}" required name="hsc_group"></div>
              <div class="col-sm-3"><input type="text" placeholder="GPA" value="{{ old('hsc_gpa') }}" required name="hsc_gpa"></div>
          </div>
          <label for="pwd">Your Honours information:</label><br>
          <div class="row honours">
              <div class="col-sm-3"><input type="text" placeholder="Passing Year" value="{{ old('honours_year') }}" required name="honours_year"></div>
              <div class="col-sm-3"><input type="text" placeholder="Institution" value="{{ old('honours_institution') }}" required name="honours_institution"></div>
              <div class="col-sm-3"><input type="text" placeholder="Subject" value="{{ old('honours_subject') }}" required name="honours_subject"></div>
              <div class="col-sm-3"><input type="text" placeholder="Gpa" value="{{ old('honours_gpa') }}" required name="honours_gpa"></div>
          </div>
          <label for="pwd">About Yourself:</label>
          <div class="row">
              <div class="col-sm-12">
                  <textarea value="{{ old('about_yourself') }}" required name="about_yourself" class="form-control" title="Write about yourself"></textarea>
              </div>
          </div>
          <div class="row col-md-12 mt-4">
            <div class="col-md-3 border border-0">
                <input type="file" name="chatroCard" accept="image/*" title=" " onchange="studentIdCard(event)">
            </div>
            <div class="col-md-3">
                <img style="width:100px;height:100px;position: ;margin-top:-10px;" title=" " class="hidden" id="idcard" />
            </div>
          <div class="col-md-3 border border-0">
              <input type="file" name="votarCard"  accept="image/*" title=" " onchange="nationalIdCard(event)">
          </div>
          <div class="col-md-3">
              <img style="width:100px;height:100px;position: ;margin-top:-10px;" title=" " class="hidden" id="nationalid" />
          </div>
        </div>
          
      </div>
      


{{-- tuition information --}}


<div class="tab">
            <h1>Tuition information</h1>
            <div class="row">
                <div class="col-md-6">
                    <p>Districts:</p>
                    <div class="form-group">
                        <select class="form-control" value="{{ old('district') }}" required name="district" id="sel1">
                          <option>Select Your District:</option>
                          <option value="d">Dhaka</option>
                          <option value="t">Tangail</option>
                          <option value="m">Mymansing</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <p>Select your preferred area:</p>
                    <div class="form-group">
                        <select class="form-control" value="{{ old('preferred_area') }}" required name="preferred_area" id="sel1">
                        <option>Select Your preferred area:</option>
                        <option value="m">Mirpur</option>
                        <option value="ada">Adabor</option>
                        <option value="kol">Kollanpur</option>
                      </select>
                    </div>
    
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <p>Select Medium:</p>
                    <div class="form-group">
                        <select class="form-control" value="{{ old('medium') }}" required name="medium" id="sel1">
                        <option value="b">Bangla Medium</option>
                        <option value="e">English Medium</option>
                        <option value="arbi">Arbi Version</option>
                      </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <p> Preferred Classes:</p>
                    <div class="form-group">
                        <select class="form-control" value="{{ old('preferred_class') }}" required name="preferred_class" id="sel1">
                          <option value="play">Play</option>
                          <option value="nursary">Nursary</option>
                          <option value="8">class 8</option>
                        </select>
                    </div>
    
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <p>Preferred Subjects:</p>
                    <div class="form-group">
                        <select class="form-control" value="{{ old('preferred_subject') }}" required name="preferred_subject" id="sel1">
                        <option value="english">English</option>
                        <option value="bangla">Bangla</option>
                        <option value="math">Math</option>
                      </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <p> Day per Week:</p>
                    <input type="number" value="{{ old('tuitoring_days') }}" required name="tuitoring_days" style="height: 40px; margin-top:1px;" required>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <p>Timing Shift:</p>
                    <div class="form-group">
                        <select class="form-control" value="{{ old('shift') }}" required name="shift" id="sel1">
                      <option value="m">Morning</option>
                      <option value="e">Evening</option>
                      <option value="a">Afternoon</option>
                      <option value="n">Noon</option>
                    </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <p> Expected Salary:</p>
    
                    <input type="number" value="{{ old('salary') }}" required name="salary" min="3000" max="20000" style="height: 40px; margin-top:1px;" required>
    
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <p>Preferred Tuitoring Style:</p>
                    <div class="form-group">
                        <select class="form-control" value="{{ old('tuitoring_style') }}" required name="tuitoring_style" id="sel1">
                          <option value="fri">Frindly</option>
                          <option value="pol">Politely</option>
                        </select>
                    </div>
                </div>
    
            </div>
            <div class="row">
                <div class="col-md-12">
                    <p>Experience:</p>
                    <textarea value="{{ old('experience') }}" required name="experience" title="Your Experience" class="form-control"></textarea>
                </div>
                <button type="submit" class="btn btn-success">Submit</button>
            </div>
          </div>
          <div style="overflow:auto;">
            <div style="float:right; margin-top:60px;">
              <button type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
              <button type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>
            </div>
          </div>
          <!-- Circles which indicates the steps of the form: -->
          <div style="text-align:center;margin-top:40px;">
            <span class="step"></span>
            <span class="step"></span>
            <span class="step"></span>
            <span class="step"></span>
          </div>
        
      </form>
</div>
    
@endsection

@push('js')
    <script>

    var studentProfile = function(event) {
        var output = document.getElementById('profile');
        output.src = URL.createObjectURL(event.target.files[0]);
        output.onload = function() {
          URL.revokeObjectURL(output.src) // free memory
        }
      };
    var studentIdCard = function(event) {
        var output = document.getElementById('idcard');
        output.src = URL.createObjectURL(event.target.files[0]);
        output.onload = function() {
          URL.revokeObjectURL(output.src) // free memory
        }
      };
    var nationalIdCard = function(event) {
        var output = document.getElementById('nationalid');
        output.src = URL.createObjectURL(event.target.files[0]);
        output.onload = function() {
          URL.revokeObjectURL(output.src) // free memory
        }
      };

      var currentTab = 0; // Current tab is set to be the first tab (0)
     showTab(currentTab); // Display the current tab

function showTab(n) {
  // This function will display the specified tab of the form...
  var x = document.getElementsByClassName("tab");
  x[n].style.display = "block";
  //... and fix the Previous/Next buttons:
  if (n == 0) {
    document.getElementById("prevBtn").style.display = "none";
  } else {
    document.getElementById("prevBtn").style.display = "inline";
  }
  if (n == (x.length - 1)) {
    document.getElementById("nextBtn").innerHTML = "Submit";
  } else {
    document.getElementById("nextBtn").innerHTML = "Next";
  }
  //... and run a function that will display the correct step indicator:
  fixStepIndicator(n)
}

function nextPrev(n) {
  // This function will figure out which tab to display
  var x = document.getElementsByClassName("tab");
  // Exit the function if any field in the current tab is invalid:
  if (n == 1 && !validateForm()) return false;
  // Hide the current tab:
  x[currentTab].style.display = "none";
  // Increase or decrease the current tab by 1:
  currentTab = currentTab + n;
  // if you have reached the end of the form...
  if (currentTab >= x.length) {
    // ... the form gets submitted:
    document.getElementById("regForm").submit();
    return false;
  }
  // Otherwise, display the correct tab:
  showTab(currentTab);
}

function validateForm() {
  // This function deals with validation of the form fields
  var x, y, i, valid = true;
  x = document.getElementsByClassName("tab");
  y = x[currentTab].getElementsByTagName("input");
  // A loop that checks every input field in the current tab:
  for (i = 0; i < y.length; i++) {
    // If a field is empty...
    if (y[i].value == "") {
      // add an "invalid" class to the field:
      y[i].className += " invalid";
      // and set the current valid status to false
      valid = false;
    }
  }
  // If the valid status is true, mark the step as finished and valid:
  if (valid) {
    document.getElementsByClassName("step")[currentTab].className += " finish";
  }
  return valid; // return the valid status
}

function fixStepIndicator(n) {
  // This function removes the "active" class of all steps...
  var i, x = document.getElementsByClassName("step");
  for (i = 0; i < x.length; i++) {
    x[i].className = x[i].className.replace(" active", "");
  }
  //... and adds the "active" class on the current step:
  x[n].className += " active";
}


function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function (e) {
                $('#profile-img-tag').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    $("#profile-img").change(function(){
        readURL(this);
    });
    </script>
@endpush ()           