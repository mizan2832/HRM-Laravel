@extends('front.master')
@section('title', 'Add new employee')
    @push('head')
        <link href="https://parsleyjs.org/src/parsley.css" rel="stylesheet" />
    @endpush
@section('content')
    <h3 style="margin-left: 10px;">Add Employee</h3>
    <div class="container">
        <form action="{{ route('employee.store') }}" id="validate_form" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="row col-md-12 col-sm-12 mt-2">
                <div class="col-md-6 col-sm-6">
                    <div class="card per-del">
                        <div class="card-header" style="background-color: #5C6BC0;color:#ffffff;font-size:1.2em">Person
                            Details</div>
                        <div class="card-body">

                            <div class="form-group row">
                                <label for="name" class="col-sm-3 col-form-label">Name</label>
                                <div class="col-sm-9">
                                    <input type="text" value="{{ old('name') }}" name="name" class="form-control" id="name"
                                        data-parsley-required-message="Empoyee name is required.
                                    " data-parsley-required="true" >
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="father_name" class="col-sm-3 col-form-label">Father Name</label>

                                <div class="col-sm-9">
                                    <input type="text" value="{{ old('father_name') }}" name="father_name" class="form-control "
                                        data-parsley-required-message="Father name is required.
                                    " data-parsley-required="true" id="father_name" >
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="gender" class="col-sm-3 col-form-label">Gender</label>
                                <div class="col-sm-9">
                                    <select class="form-control" data-parsley-required-message="Gender is required.
                                    " data-parsley-required="true" value="{{ old('gender') }}" name="gender" id="gender">
                                        <option value="m">Male</option>
                                        <option value="f">Female</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="birth" class="col-sm-3 col-form-label">Date of birth</label>
                                <div class="col-sm-9">
                                    <input type="date" value="{{ old('date') }}" name="date" class="form-control" id="birth"
                                        data-parsley-required-message="Birth date is required." required >
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="phone1" class="col-sm-3 col-form-label">Phone 1</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="phone1" value="{{ old('phone1') }}" name="phone1"
                                        data-parsley-type="number"  data-parsley-required="true"
                                        data-parsley-required-message="Phone number is required." 
                                        >
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="phone2" class="col-sm-3 col-form-label">Phone 2</label>
                                <div class="col-sm-9">
                                    <input type="text" data-parsley-type="number" 
                                         data-parsley-required="true" class="form-control" id="phone2"
                                        value="{{ old('phone2') }}" name="phone2" data-parsley-required-message="Phone number is required.
                                    " data-parsley-required="true" >
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="local_address" class="col-sm-3 col-form-label">Local Address</label>
                                <div class="col-sm-9">
                                    <textarea value="{{ old('local_address') }}" name="local_address" data-parsley-required-message="Present address is required.
                                    " data-parsley-required="true" id="local_address" class="form-controll" cols="43"
                                        rows="4"></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="permanent_address" class="col-sm-3 col-form-label">Parmanent Address</label>
                                <div class="col-sm-9">
                                    <textarea value="{{ old('permanent_area') }}" name="permanent_area" id="permanent_area" class="form-controll"
                                        data-parsley-required-message="Permanent address is required.
                                    " data-parsley-required="true" cols="43" rows="4"></textarea>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="nationality" data-parsley-required="true"
                                    class="col-sm-3 col-form-label">Nationality</label>
                                <div class="col-sm-9">
                                    <input type="text" data-parsley-required-message="Nationality is required.
                                    " data-parsley-required="true" class="form-control" id="nationality" value="{{ old('nationality') }}" name="nationality"
                                        >
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="reference1" data-parsley-required="true"
                                    class="col-sm-3 col-form-label">Reference 1</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" data-parsley-required-message="Reference is required.
                                    " data-parsley-required="true" id="reference1" value="{{ old('reference1') }}" name="reference1" >
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="reference1_phone" data-parsley-required="true"
                                    class="col-sm-3 col-form-label">Reference 1 Phone</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="reference1_phone"
                                        data-parsley-required-message="Phone number is required.
                                    " data-parsley-required="true" value="{{ old('reference1_phone') }}" name="reference1_phone" >
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="reference2" class="col-sm-3 col-form-label">Reference 2</label>
                                <div class="col-sm-9">
                                    <input type="text" data-parsley-required="true" class="form-control"
                                        data-parsley-required-message="Phone number is required.
                                    " data-parsley-required="true" id="reference2" value="{{ old('reference2') }}" name="reference2" >
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="reference2_phone" class="col-sm-3 col-form-label">Reference 2 Phone</label>
                                <div class="col-sm-9">
                                    <input type="text" data-parsley-required-message="Phone number is required.
                                    " data-parsley-required="true" class="form-control" id="reference2_phone"
                                        value="{{ old('reference2_phone') }}" name="reference2_phone" >
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="zip_code" class="col-sm-3 col-form-label">Zip Code</label>
                                <div class="col-sm-9">
                                    <input type="text" data-parsley-required-message="Zip code is required.
                                    " data-parsley-required="true" class="form-control" id="zip_code" value="{{ old('zip_code') }}" name="zip_code">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="meritial_status" class="col-sm-3 col-form-label">Meritial status</label>
                                <div class="col-sm-9">
                                    <select class="form-control" data-parsley-required="true" value="{{ old('meritial_status') }}" name="meritial_status"
                                        id="meritial_status">
                                        <option value="">Select</option>
                                        <option value="b">Bachelor</option>
                                        <option value="m">Merried</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="photo" class="col-sm-3 col-form-label">Photo</label>
                                <div class="col-sm-9">
                                    <input  type="file" name="photo">
                                </div>
                            </div>


                        </div>

                    </div>
                    <div class="card per-del">
                        <div class="card-header">Documents</div>
                        <div class="card-body">
                            <div class="form-group row">
                                <label for="resume" style="margin-top: -15px" class="col-sm-3 col-form-label">Resume
                                </label>
                                <div class="col-sm-9">
                                    <input  type="file"  name="resume">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="Offer" style="margin-top: -15px" class="col-sm-3 col-form-label">Offer
                                    Letter</label>
                                <div class="col-sm-9">
                                    <input type="file"  name="offer">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="joining letter" style="margin-top: -15px"
                                    class="col-sm-3 col-form-label">Joining Letter</label>
                                <div class="col-sm-9">
                                    <input type="file" name="joining_letter">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="other" style="margin-top: -15px" class="col-sm-3 col-form-label">Other</label>
                                <div class="col-sm-9">
                                    <input type="file" name="other">
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
                <div class="col-md-6 col-sm-6">
                    <div class="card per-del">
                        <div class="card-header" style="background-color: #5C6BC0;color:#ffffff;font-size:1.2em">
                            Account Login
                        </div>
                        <div class="card-body">
                            <div class="form-group row">
                                <label for="email" class="col-sm-3 col-form-label">Email</label>
                                <div class="col-sm-9">
                                    <input type="email" value="{{ old('email') }}" name="email" data-parsley-required-message="Email is required.
                            "  data-parsley-type="email" class="form-control" id="email"
                                        >
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="username" class="col-sm-3 col-form-label">Username</label>
                                <div class="col-sm-9">
                                    <select value="{{ old('username') }}" name="username"
                              id="username" class="form-control">
                                        <option value="1">Admin</option>
                                        <option value="2">Super Admin</option>
                                        <option value="3">Manager</option>
                                        <option value="4">Staff</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="password" class="col-sm-3 col-form-label">Password</label>
                                <div class="col-sm-9">
                                    <input type="password" id="pass" 
                                        data-parsley-required-message="Please enter password" value="{{ old('password') }}" name="password"
                                        class="form-control" id="passwordCheck" >
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="password" class="col-sm-3 col-form-label">Confirm Password</label>
                                <div class="col-sm-9">
                                    <input type="password" value="{{ old('password_confirmation') }}" name="password_confirmation" class="form-control" id="password"
                                        data-parsley-required-message="Please re-enter your new password."
                                        >
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card per-del mt-2 ">
                        <div class="card-header" style="background-color: #5C6BC0;color:#ffffff;font-size:1.2em">
                            Employee Details
                        </div>
                        <div class="card-body">
                            <div class="form-group row">
                                <label for="employee_id" class="col-sm-3 col-form-label">Employee ID</label>
                                <div class="col-sm-9">
                                    <input type="text" value="{{ old('employee_id') }}" name="employee_id" class="form-control" id="employee_id"
                                         placeholder="Auto Gengerated">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="department" class="col-sm-3 col-form-label">Department</label>
                                <div class="col-sm-9">
                                    <select value="{{ old('department') }}" name="department" id="department"  class="form-control">
                                        <option>Select a department</option>
                                        <option value="1">Marketing</option>
                                        <option value="2">Store</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="joining_date" class="col-sm-3 col-form-label">Date of joining</label>
                                <div class="col-sm-9">
                                    <input type="date" data-parsley-required-message="Date is required.
                            " required value="{{ old('joining_date') }}" name="joining_date" class="form-control" id="joining_date">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="status" class="col-sm-3 col-form-label">Status</label>
                                <div class="col-sm-9">
                                    <select value="{{ old('status') }}" name="status"
                              id="status" class="form-control">
                                        <option value="1">Active</option>
                                        <option value="0">Inactive</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card per-del mt-2">
                        <div class="card-header" style="background-color: #5C6BC0;color:#ffffff;font-size:1.2em">
                            Financial Details
                        </div>
                        <div class="card-body wrapper">
                            <div class="form-group row">
                                <label for="" class="col-sm-3 col-form-label">Basic Salary</label>
                                <div class="col-sm-9">
                                    <div class="input-group input-group-sm">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">$</span>
                                        </div>
                                        <input type="number" ata-parsley-required-message="Basic amount is required.
                               " data-parsley-required="true" min=0 oninput="validity.valid||(value='');" value="{{ old('basic') }}" name="basic"
                                            class="amount form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-3 col-form-label">Medical Allowance</label>
                                <div class="col-sm-9">
                                    <div class="input-group input-group-sm">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">$</span>
                                        </div>
                                        <input type="number" ata-parsley-required-message="MA is required.
                               " data-parsley-required="true" min=0 oninput="validity.valid||(value='');" value="{{ old('medical') }}" name="medical"
                                            class="amount form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-3 col-form-label">
                                    <pre></pre>Transport
                                </label>
                                <div class="col-sm-9">
                                    <div class="input-group input-group-sm">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">$</span>
                                        </div>
                                        <input type="number" ata-parsley-required-message="TR is required.
                               " data-parsley-required="true"
                                            value="{{ old('transport') }}" name="transport" class="amount form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-3 col-form-label">House Rent</label>
                                <div class="col-sm-9">
                                    <div class="input-group input-group-sm">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">$</span>
                                        </div>
                                        <input type="number" ata-parsley-required-message="HR is required.
                               " data-parsley-required="true" min=0 oninput="validity.valid||(value='');" value="{{ old('house_rent') }}" name="house_rent"
                                            class="amount form-control">
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
                    <div class="card per-del">
                        <div class="card-header">
                            Deduction
                        </div>
                        <div class="card-body wrapper">
                            <div class="form-group row">
                                <label for="" class="col-sm-3 col-form-label">Tax</label>
                                <div class="col-sm-9">
                                    <div class="input-group input-group-sm">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">$</span>
                                        </div>
                                        <input type="number" value="{{ old('tax') }}" name="tax" class="minus_amount form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-3 col-form-label">Absent Fee</label>
                                <div class="col-sm-9">
                                    <div class="input-group input-group-sm">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">$</span>
                                        </div>
                                        <input type="number" value="{{ old('absent') }}" name="absent" class="minus_amount form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-3 col-form-label">
                                    <pre></pre>Meal Cost
                                </label>
                                <div class="col-sm-9">
                                    <div class="input-group input-group-sm">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">$</span>
                                        </div>
                                        <input type="number" value="{{ old('meal') }}" name="meal" class="minus_amount
                                 form-control">
                                    </div>
                                </div>
                            </div>



                        </div>
                    </div>
                    <div class="card per-del">
                        <div class="card-body dedu">

                            <div class="form-group row">
                                <label for="total_salary" class="col-sm-3 col-form-label">Total Salary</label>
                                <div class="col-sm-9">
                                    <div class="input-group input-group-sm">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">$</span>
                                        </div>
                                        <input type="text" value="{{ old('total_salary') }}" name="total_salary" class="form-control total_salary">
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="card per-del mt-2">
                        <div class="card-header" style="background-color: #5C6BC0;color:#ffffff;font-size:1.2em">
                            Bank Account Details
                        </div>
                        <div class="card-body">
                            <div class="form-group row">
                                <label for="holder name" class="col-sm-3 col-form-label">Account Holder Name</label>
                                <div class="col-sm-9">
                                    <input type="text" ata-parsley-required-message="Holder is required.
                            " data-parsley-required="true" class="form-control" id="holder_name" value="{{ old('holder_name') }}" name="holder_name"
                                        >
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="account number" class="col-sm-3 col-form-label">Account Number</label>
                                <div class="col-sm-9">
                                    <input type="text" ata-parsley-required-message="Account Number is required.
                            " data-parsley-required="true" class="form-control" id="account_number" value="{{ old('account_number') }}" name="account_number"
                                        >
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="Bank Name" class="col-sm-3 col-form-label">Bank Name</label>
                                <div class="col-sm-9">
                                    <input type="text" ata-parsley-required-message="Bank Name is required.
                            " data-parsley-required="true" class="form-control" id="bank_name" value="{{ old('bank_name') }}" name="bank_name"
                                        >
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="Branch" class="col-sm-3 col-form-label">Branch</label>
                                <div class="col-sm-9">
                                    <input type="text" ata-parsley-required-message="Branch is required.
                            " data-parsley-required="true" class="form-control" id="branch" value="{{ old('branch') }}" name="branch"
                                        >
                                </div>
                            </div>
                            <button type="submit" class="btn btn-success">SUBMIT</button>
                        </div>
                    </div>

                </div>
            </div>
        </form>
    </div>
@endsection
@push('js')
    <script type="text/javascript">
        $(document).ready(function() {
            var maxField = 10; //Input fields increment limitation
            var addButton = $('.add_button'); //Add button selector
            var wrapper = $('.wrapper');
            var x = 0; //Initial field counter is 1
            var x = 1; //Initial field counter is 1
            var wrapper = $('.wrapper');
            //Once add button is clicked

            $(addButton).click(function() {
                //Check maximum number of input fields
                if (x < maxField) {
                    x++; //Increment field counter
                    $(wrapper).append(
                        '<div class="form-group rem row"><select name="salary[]" ' +
                        'class="col-sm-4 ml-2"  id="' + x + '">' +
                        '<option value="hr">House</option><option value="hr">Transportation</option> <option value="hr">Telephone</option></select><div class="col-sm-4"><div class="input-group input-group-sm"><div class="input-group-prepend"><span class="input-group-text">$</span>  </div><input type="text"' +
                         'name="amount[]" class="form-control amount"> </div></div><div class="col-sm-2"> <button href="javascript:void(0);" class="remove" title="Add field"><i class="fas fa-minus"></i></button> </div></div>'

                    ); //Add field html
                }
                sumIt();
            });

            //Once remove button is clicked
            $(wrapper).on('click', '.remove', function(e) {
                $(this).parents('.rem').remove(); //Remove field html
                x--; //Decrement field counter
                sumIt();
            });
            var y = 1; //Initial field counter is 1

            $('.add_deduction').click(function() {
                if (y < maxField) {
                    y++; //Increment field counter
                    $('.dedu').append(
                        '<div class="form-group deduct row"><select name=' +
                        '"deduct_type' + y +
                        '" class="col-sm-4 ml-2" id=""><option value="hr">House</option><option value="hr">Transportation</option> <option value="hr">Telephone</option></select><div class="col-sm-4"><div class="input-group input-group-sm"><div class="input-group-prepend"><span class="input-group-text">$</span>  </div><input type="text" ' +
                        '  name="deduct_amount' + y +
                        '" class="minus_amount form-control"> </div></div><div class="col-sm-2"> <button href="javascript:void(0);" class="deduction" title="Add field"><i class="fas fa-minus"></i></button> </div></div>'
                        );

                }
            });
            $('.dedu').on('click', '.deduction', function(e) {
                $(this).parents('.deduct').remove(); //Remove field html
                x--; //Decrement field counter                 
            });
        });
        $(document).ready(function() {
            $(document).on("keyup", ".amount", calculateSum);
            $(document).on("keyup", ".minus_amount", calculateSum);
            $(document).on("click", ".deduction", calculateSum);
            $(document).on("click", ".remove", calculateSum);
        });

        function calculateSum() {

            var sum = 0;
            var deduction = 0;
            $(".amount").each(function() {

                if (!isNaN(this.value) && this.value.length != 0) {
                    sum += parseFloat(this.value);
                }

            });
            $(".minus_amount").each(function() {

                if (!isNaN(this.value) && this.value.length != 0) {
                    deduction += parseFloat(this.value);
                }

            });
            sum = sum - deduction;
            $(".total_salary").val(sum.toFixed(2));
        }
        $(document).ready(function() {

            $('#validate_form').parsley();
        });
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/parsley.js/2.3.4/parsley.min.js"></script>


@endpush
