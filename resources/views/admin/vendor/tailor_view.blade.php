@extends('admin.layouts.layout')

@section('title','Customer Form')
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
                <!-- <h3>Tailor Management</h3> -->
            </div>
        </div>

        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 customer-form-first">
                <div class="x_panel">
                <div class="x_title">
                    @if($user_detail->vendor_type == 1)
                        <h2>Tailor View</h2>
                    @elseif($user_detail->vendor_type == 2)
                        <h2>Fabric Seller View</h2>
                    @elseif($user_detail->vendor_type == 3)
                        <h2>Tailor & Fabric Seller View</h2>
                    @endif
                    <div class="clearfix"></div>
                </div>
                    <div class="x_content">
                        <br />
                        <form action="{{ url('admin/tailorFormAction') }}" id="course_form" method="post" enctype="multipart/form-data" class="form-horizontal form-label-left">
                            {!! csrf_field() !!}

                            <div class="form-group row">
                                <!-- First row: Name and Email -->
                                <div class="col-md-6">
                                    <label class="control-label">First Name<span class="mandatory" style="color:red"> *</span></label>
                                    <input type="text" class="form-control"  name="first_name" value="{{ $user_detail->name }}" disabled>
                                </div>

                                <div class="col-md-6">
                                    <label class="control-label">Last Name<span class="mandatory" style="color:red"> *</span></label>
                                    <input type="text" class="form-control" name="last_name" value="{{ $user_detail->last_name }}" disabled>
                                </div>
                            </div>

                            <div class="form-group row">
                                <!-- Business Name and Mobile Number -->
                                <div class="col-md-6">
                                    <label class="control-label">Business Name<span class="mandatory" style="color:red"> *</span></label>
                                    <input type="text" class="form-control" placeholder="Enter Business Name" value="{{ $user_detail->business_name }}" name="business_name" disabled>
                                </div>

                                <div class="col-md-6">
                                    <label class="control-label">Mobile Number<span class="mandatory" style="color:red"> *</span></label>
                                    <input type="text" class="form-control"  name="mobile_number" value="{{ $user_detail->mobile_no }}" disabled>
                                </div>
                            </div>

                            <div class="form-group row">
                                <!-- Email and Password -->
                                <div class="col-md-6">
                                    <label class="control-label">Email<span class="mandatory" style="color:red"> *</span></label>
                                    <input type="email" class="form-control"  name="email_id" value="{{ $user_detail->email }}" disabled>
                                </div>

                                <div class="col-md-6">
                                    <label class="control-label">Profile Image</label>
                                    <div>
                                        <!-- Image Display -->
                                        <img src="{{ asset('public/upload/vendor/'. $user_detail->profile_img) }}" id="upload_image_display" style="margin-top: 10px; border-radius: 10px;" alt="brand image" height="80px" width="100px">
                                    </div>
                                  </div>
                            </div>

                            <div class="form-group row">
                                <!-- Profile Image and Gender -->


                                <div class="col-md-6">
                                    <label class="control-label">Zip Code</label>
                                    <input type="text" class="form-control"  name="user_zipcode" value="{{ $user_detail->zip_code }}" disabled>
                                </div>
                                <div class="col-md-6">
                                    <label class="control-label">Address<span class="mandatory" style="color:red"> *</span></label>
                                    <input type="text" class="form-control"  name="user_address" value="{{ $user_detail->address }}" disabled>
                                </div>

                            </div>

                            <div class="form-group row">





                                <div class="col-md-6">
                                    <label class="control-label">Country</label>
                                    <input type="text" class="form-control" name="user_country" value="{{ $countries->country_name }}" disabled>
                                </div>

                                <div class="col-md-6">
                                    <label class="control-label">State</label>
                                    <input type="text" class="form-control" name="user_states" value="{{ $state->state_name }}" disabled>
                                </div>

                                <!-- Zip Code -->

                            </div>

                            <div class="form-group row">
                                <!-- Country, State, and City -->
                                <div class="col-md-6">
                                    <label class="control-label">City</label>
                                    <input type="text" class="form-control" name="user_city" value="{{ $city->city_name }}" disabled>
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
                business_name: {
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
                business_name: {
                    required: "Business Name is required"
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