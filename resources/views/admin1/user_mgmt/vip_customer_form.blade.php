@extends('admin.layouts.layout')

@section('title','VIP Customer Form')
@section('admin-content')

<style>
    .invalid-feedback {
        font-size: 100% !important;
    }

    /* form#course_form span {
    width: 50%;
    padding-left: 11px;
} */
</style>

<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>VIP Customer Management</h3>
            </div>


        </div>

        <div class="clearfix"></div>

        <div class="row">

            <div class="col-md-12 customer-form-first">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>VIP Customer Form </h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br />
                        <form action="{{ route('admin.vipcustomerFormAction') }}" id="course_form" method="post" enctype="multipart/form-data" class="form-horizontal form-label-left">
                            {!! csrf_field() !!}

                            <div class="form-group row">
                                <!-- First row -->
                                <div class="col-md-6">
                                    <label class="control-label">First Name<span class="mandatory" style="color:red"> *</span></label>
                                    <input type="text" class="form-control" placeholder="Enter First Name" name="first_name" autofocus onkeyup="value=value.replace(/[^\a-\z\A-\Z ]/g,'')">
                                    @if ($errors->has('first_name'))
                                    <span class="" style="color:red">
                                        {{ $errors->first('first_name') }}
                                    </span>
                                    @endif
                                </div>


                                <div class="col-md-6">
                                    <label class="control-label">Last Name<span class="mandatory" style="color:red"> *</span></label>
                                    <input type="text" class="form-control" autofocus
                                        onkeyup="value=value.replace(/[^\a-\z\A-\Z ]/g,'')" placeholder="Enter Last Name" name="last_name">
                                    @if ($errors->has('last_name'))
                                    <span class="" style="color:red">
                                        {{ $errors->first('last_name') }}
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <!-- Second row -->
                                <div class="col-md-6">
                                    <label class="control-label">Email ID<span class="mandatory" style="color:red"> *</span></label>
                                    <input type="email" class="form-control" id="email" placeholder="Enter Email ID" name="email_id">
                                    @if ($errors->has('email_id'))
                                    <span class="" style="color:red">
                                        {{ $errors->first('email_id') }}
                                    </span>
                                    @endif
                                </div>

                                <div class="col-md-6">
                                    <label class="control-label">Mobile Number<span class="mandatory" style="color:red"> *</span></label>
                                    <input type="text" class="form-control" placeholder="Enter Mobile Number" name="mobile_number" onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')" title="Only numbers are allowed" minlength="1                                            " maxlength="12" required>
                                    <!-- <input type="text" class="form-control" placeholder="Enter Mobile Number" name="mobile_number"> -->
                                    @if ($errors->has('mobile_number'))
                                    <span class="" style="color:red">
                                        {{ $errors->first('mobile_number') }}
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <!-- Third row -->
                                <div class="col-md-6">
                                    <label class="control-label">Password</label>
                                    <input type="password" class="form-control" placeholder="Enter Password" name="password">
                                </div>

                                <div class="col-md-6">
                                    <label class="control-label">Profile Image<span class="mandatory" style="color:red"> *</span></label>
                                    <input type="file" class="form-control" placeholder="Enter Profile Image" name="profile_image">

                                    <!-- Error message directly below input -->
                                    @if ($errors->has('profile_image'))
                                    <div style="color:red; margin-top: 5px;">
                                        {{ $errors->first('profile_image') }}
                                    </div>
                                    @endif
                                </div>
                            </div>


                            <div class="form-group row">

                                <div class="col-md-6">
                                    <label class="control-label">Gender</label>
                                    <select id="heard" class="form-control" name="gender" required>
                                        <option value="" disabled>Choose Gender</option>
                                        <option value="1">Male</option>
                                        <option value="2">Female</option>
                                        <option value="3">Others</option>
                                    </select>
                                </div>
                                <!-- Fourth row -->
                                <div class="col-md-6">
                                    <label class="control-label">Address<span class="mandatory" style="color:red"> *</span></label>
                                    <input type="text" class="form-control" placeholder="Enter Address" name="user_address">
                                    @if ($errors->has('user_address'))
                                    <span class="" style="color:red">
                                        {{ $errors->first('user_address') }}
                                    </span>
                                    @endif
                                </div>

                            </div>

                            <div class="form-group row">
                                <!-- Fifth row -->
                                <div class="col-md-6">
                                    <label class="control-label">Country</label>

                                    <select id="country" class="form-control" name="country_id" required>
                                        <option value="">Choose Country</option>
                                        @foreach ($country as $show_country )
                                        <option value="{{$show_country->country_id}}">{{$show_country->country_name}}</option>
                                        @endforeach
                                    </select>
                                    <!-- <input type="text"
                                    class="form-control" placeholder="Enter Country" name="user_country"> -->
                                    <!-- onkeyup="value=value.replace(/[^\a-\z\A-\Z ]/g,'')"  -->
                                </div>

                                <div class="col-md-6">
                                    <label class="control-label">State</label>
                                    <select id="state" class="form-control" name="state_id" required>
                                        <option value=""></option>

                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <!-- Sixth row -->

                                <div class="col-md-6">
                                    <label class="control-label">City</label>
                                    <select id="city" class="form-control" name="city_id" required>
                                        <option value=""></option>

                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label class="control-label">Zip Code</label>
                                    <input type="text" onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')" class="form-control" placeholder="Enter Zip Code" name="user_zipcode">
                                </div>

                            </div>
                            <div class="form-group row">
                                <div class="col-md-12 go-back-btn mt-3">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                    <button type="button" class="btn btn-primary" onclick="history.back()">Go Back</button>


                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<script>
    window.addEventListener('load', function() {
        $("#course_form").validate({
            rules: {
                first_name: {
                    required: true
                },
                last_name: {
                    required: true
                },
                email_id: {
                    required: true,
                    email: true,
                    remote: {
                        url: "{{url('/admin/useremail')}}",
                        type: "post",
                        data: {
                            email: function() {
                                return $("#email").val();
                            },
                            '_token': '{{csrf_token()}}'
                        }
                    }
                },
                mobile_number: {
                    required: true
                },


                user_address: {
                    required: true
                },
                profile_image: {
                    required: true
                },
            },
            messages: {
                first_name: {
                    required: "First name is required"
                },
                last_name: {
                    required: "Last name is required"
                },
                email_id: {
                    required: "Email is required",
                    email: "Enter a valid email",
                    remote: "This email is already taken"
                },
                mobile_number: {
                    required: "Mobile number is required"
                },


                user_address: {
                    required: "Address is required"
                },
                profile_image: {
                    required: "Profile Image is required"
                },

            },
            errorElement: 'span',
            errorPlacement: function(error, element) {
                error.addClass('invalid-feedback');
                error.insertAfter(element);
            },

        });
    });
</script>

<script>
    $(document).ready(function() {
        $('#country').change(function() {
            var cid = this.value; //let cid = $(this).val(); we cal also write this.
            $.ajax({
                url: "{{url('/getstate')}}",
                type: "POST",
                datatype: "json",
                data: {
                    country_id: cid,
                    '_token': '{{csrf_token()}}'
                },
                success: function(result) {
                    $('#state').html('<option value="">Select State</option>');
                    $.each(result.state, function(key, value) {
                        $('#state').append('<option value="' + value.state_id + '">' + value.state_name + '</option>');
                    });
                },
                errror: function(xhr) {
                    console.log(xhr.responseText);
                }
            });
        });

        $('#state').change(function() {
            var sid = this.value;
            $.ajax({
                url: "{{url('/getcity')}}",
                type: "POST",
                datatype: "json",
                data: {
                    state_id: sid,
                    '_token': '{{csrf_token()}}'
                },
                success: function(result) {
                    console.log(result);
                    $('#city').html('<option value="">Select City</option>');
                    $.each(result.city, function(key, value) {
                        $('#city').append('<option value="' + value.city_id + '">' + value.city_name + '</option>')
                    });
                },
                errror: function(xhr) {
                    console.log(xhr.responseText);
                }
            });
        });
    });
</script>

@endsection