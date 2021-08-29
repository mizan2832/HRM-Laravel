@extends('front.master')
@section('title','Employee Details')
@section('content')

<div class="container">
    <h2>Employee Details </h2>
  <br>
  <!-- Nav tabs -->
  <ul class="nav nav-tabs">
    <li class="nav-item">
      <a class="nav-link active" data-toggle="tab" href="#personal">Personal Information</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="tab" href="#documents">Documents</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="tab" href="#salary">Salary</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="tab" href="#bank_details">Bank Information</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="tab" href="#account_details">Account Information</a>
    </li>
  </ul>

  <!-- Tab panes -->
  <div class="tab-content">
    <div id="personal" class="container tab-pane active"><br>
        <table class="table table-bordered table-sm">
            <tbody>
              <tr>
                <td>Name</td>
                <td>{{ $employee->name }}</td>
              </tr>
              <tr>
                <td>Department</td>
                <td>{{ $employee->department }}</td>
              </tr>
              <tr>
                <td>Employee Id</td>
                <td>{{ $employee->employee_id }}</td>
              </tr>
              <tr>
                <td>Father's Name</td>
                <td>{{ $employee->father_name }}</td>
              </tr>
              <tr>
                <td>Email</td>
                <td>{{ $employee->email }}</td>
              </tr>
              <tr>
                <td>Gender</td>
                <td>{{ $employee->gender }}</td>
              </tr>
              <tr>
                <td>Birthdate</td>
                <td>{{ $employee->birth_date }}</td>
              </tr>
              <tr>
                <td>phone</td>
                <td>{{ $employee->phone1 }}</td>
              </tr>
              <tr>
                <td>Gender</td>
                <td>{{ $employee->gender }}</td>
              </tr>
              <tr>
                <td>Present Address</td>
                <td>{{ $employee->local_address }}</td>
              </tr>
              <tr>
                <td>Permanent address</td>
                <td>{{ $employee->permanent_address }}</td>
              </tr>
              <tr>
                <td>Meretial Status</td>
                <td>{{ $employee->meritial_status }}</td>
              </tr>
              <tr>
                <td>Joining Date</td>
                <td>{{ $employee->joining_date }}</td>
              </tr>
              
            </tbody>
          </table>
    </div>
    <div id="documents" class="container tab-pane fade"><br>
     <table class="table table-bordered table-sm">
         <tbody>
             <tr>
                 <td>Resume Letter</td>
                 <td></td>
                 <td></td>
             </tr>
             <tr>
                 <td>Offer Letter</td>
                 <td></td>
                 <td></td>
             </tr>
             <tr>
                 <td>Joining Letter</td>
                 <td></td>
                 <td></td>
             </tr>
             <tr>
                 <td>Other Document</td>
                 <td></td>
                 <td></td>
             </tr>
         </tbody>
     </table>
    </div>
    <div id="salary" class="container tab-pane fade"><br>
        <table class="table table-responsive table-bordered table-sm justify-content-center">
            <tbody>
                <tr>
                    <td>Basic</td>
                    <td>{{ $employee->basic }}</td>
                </tr>
                <tr>
                    <td>Medical Allowance</td>
                    <td>{{ $employee->medical_allowance }}</td>
                </tr>
                <tr>
                    <td>Transport</td>
                    <td>{{ $employee->transport }}</td>
                </tr>
                <tr>
                    <td>House Rent</td>
                    <td>{{ $employee->house_rent }}</td>
                </tr>
                <tr>
                    <td>Meal</td>
                    <td>{{ $employee->meal }}</td>
                </tr>
                <tr>
                    <td>Absent</td>
                    <td>{{ $employee->absent }}</td>
                </tr>
                <tr>
                    <td>Tax</td>
                    <td>{{ $employee->tax }}</td>
                </tr>
                <tr>
                    <td>Total Salary</td>
                    <td>{{ $employee->total_salary }}</td>
                </tr>
                
            </tbody>
        </table>
    </div>
    <div id="bank_details" class="container tab-pane fade"><br>
        <table class="table table-responsive table-bordered table-sm justify-content-center">
            <tbody>
                <tr>
                    <td>Holder Name</td>
                    <td>{{ $employee->holder_name }}</td>
                </tr>
                <tr>
                    <td>Account Number</td>
                    <td>{{ $employee->account_number }}</td>
                </tr>
                <tr>
                    <td>Bank</td>
                    <td>{{ $employee->bank_name }}</td>
                </tr>
                <tr>
                    <td>Branch name</td>
                    <td>{{ $employee->branch_name }}</td>
                </tr>
                
                
            </tbody>
        </table>
    </div>
    <div id="account_details" class="container tab-pane fade"><br>
      <h3>Account Details</h3>
    </div>
  </div>
 </div>  
@endsection