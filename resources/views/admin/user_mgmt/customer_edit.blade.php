@extends('admin.layouts.layout')

@section('title','Edit Customer')
@section('admin-content')

<div class="right_col" role="main">
    <div class="">
        <div class="page-title">



        </div>

        <div class="clearfix"></div>

        <div class="row">

            <div class="col-md-12 customer-form-first">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Customer Edit </h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br />
                        <form action="{{ url('admin/customer_formAction') }}" method="post" enctype="multipart/form-data" class="form-horizontal form-label-left" id="course_form">
                            {!! csrf_field() !!}
                            <input type="hidden"  value="{{ $user_detail->id }}" name="id">
                            <div class="form-group row">
                                <!-- First row -->
                                <div class="col-md-6">
                                    <label class="control-label">First Name<span class="mandatory" style="color:red"> *</span></label>
                                    <input type="text" class="form-control" value="{{ $user_detail->first_name }}" autofocus oninput="value=value.replace(/[^\a-\z\A-\Z ]/g,'')" placeholder="Enter First Name" name="first_name">
                                    @if ($errors->has('first_name'))
                                    <span class="" style="color:red">
                                        {{ $errors->first('first_name') }}
                                    </span>
                                    @endif
                                </div>


                                <div class="col-md-6">
                                    <label class="control-label">Last Name<span class="mandatory" style="color:red"> *</span></label>
                                    <input type="text" class="form-control" value="{{ $user_detail->last_name }}" autofocus oninput="value=value.replace(/[^\a-\z\A-\Z ]/g,'')" placeholder="Enter Last Name" name="last_name">
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
                                    <input type="email" class="form-control" id="email" value="{{ $user_detail->email_id }}" placeholder="Enter Email ID" name="email_id">
                                    @if ($errors->has('email_id'))
                                    <span class="" style="color:red">
                                        {{ $errors->first('email_id') }}
                                    </span>
                                    @endif
                                </div>

                                <div class="col-md-6">
                                    <label class="control-label">Mobile Number<span class="mandatory" style="color:red"> *</span></label>
                                    <input type="text" class="form-control" value="{{ $user_detail->mobile_number }}" placeholder="Enter Mobile Number" name="mobile_number" oninput="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')" title="Only numbers are allowed" minlength="1                                            " maxlength="12" required >
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
                                    <input type="password" class="form-control"  placeholder="Enter Password" name="password">
                                    @if ($errors->has('password'))
                                    <span class="" style="color:red">
                                        {{ $errors->first('password') }}
                                    </span>
                                    @endif
                                </div>
                                <!-- <div class="col-md-6">
                                    <label class="control-label">Customer Type<span class="mandatory" style="color:red"> *</span></label>
                                    <select id="heard" class="form-control" required>
                                        <option value="" disabled>Choose Option</option>
                                        <option value="0">NON VIP</option>
                                        <option value="1">VIP</option>
                                    </select>
                                </div> -->

                                <div class="col-md-6">
                                    <label class="control-label">Profile Image</label>
                                    <input type="file" class="form-control"  placeholder="Enter Profile Image" name="profile_image">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <img src="{{ asset('public/admin/uploads/user/'. $user_detail->profile_image) }}" id="upload_image_display" style="margin-top: 10px;margin-left: 5px;border-radius: 10px;" alt="brand image" height="100px" width="100px">
                                        </div>
                                        <br>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <!-- Fourth row -->
                                <div class="col-md-6">
                                    <label class="control-label">Address<span class="mandatory" style="color:red"> *</span></label>
                                    <input type="text" class="form-control" value="{{ $user_detail->address }}" placeholder="Enter Address" name="user_address">
                                    @if ($errors->has('user_address'))
                                    <span class="" style="color:red">
                                        {{ $errors->first('user_address') }}
                                    </span>
                                    @endif
                                </div>
                                                 <!-- Tenth row -->
                                <div class="col-md-6">
                                    <label class="control-label">Gender</label>
                                    <select id="heard12" class="form-control" name="gender" required>
                                        <option value="" disabled {{ !$user_detail->gender ? 'selected' : '' }}>Choose Gender</option>
                                        <option value="1" {{ $user_detail->gender == 1 ? 'selected' : '' }}>Male</option>
                                        <option value="2" {{ $user_detail->gender == 2 ? 'selected' : '' }}>Female</option>
                                    </select>
                                </div>

                            </div>

                            <div class="form-group row">
                                <!-- Fifth row -->
                                <div class="col-md-6">
                                    <label class="control-label">Country</label>
                                    <select id="country" class="form-control" name="country_id" >
                                    <option value="" >Choose Country</option>
                                        @foreach($countries as $country)
                                            <option value="{{ $country->country_id }}" {{ $user_detail->country_id == $country->country_id ? 'selected' : '' }}>
                                                {{ $country->country_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-md-6">
                                    <label class="control-label">State</label>
                                    <select id="state" class="form-control" name="state_id" >
                                    <option value="" >Choose State</option>
                                        @foreach($state as $states_list)
                                            <option value="{{ $states_list->state_id }}" {{ $user_detail->state_id == $states_list->state_id  ? 'selected' : '' }}>
                                                {{ $states_list->state_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <!-- <div class="col-md-6">
                                    <label class="control-label">State</label>
                                    <select id="state" class="form-control" name="state_id"  required>
													<option value="" ></option>

												</select>
                                </div> -->

                            </div>

                            <div class="form-group row">
                                <!-- Sixth row -->

                                <div class="col-md-6">
                                    <label class="control-label">City</label>
                                    <select id="city" class="form-control" name="city_id" >
                                    <option value="" >Choose City</option>
                                        @foreach($city as $city_list)
                                            <option value="{{ $city_list->city_id }}" {{ $user_detail->city_id == $city_list->city_id   ? 'selected' : '' }}>
                                                {{ $city_list->city_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-md-6">
                                    <label class="control-label">Zip Code</label>
                                    <input type="text" class="form-control" value="{{ $user_detail->zipcode }}" oninput="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')" title="Only numbers are allowed" minlength="1                                            " maxlength="12" required placeholder="Enter Zip Code" name="user_zipcode">
                                </div>


                            </div>



                            <div class="form-group row">



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
                first_name: { required: true },
                last_name: { required: true },
                email_id: {
                    required: true,
                    email: true ,

                },
                mobile_number: { required: true },
                user_address: { required: true },

            },
            messages: {
                first_name: { required: "First name is required" },
                last_name: { required: "Last name is required" },
                email_id: { required: "Email is required", email: "Enter a valid email" },
                mobile_number: { required: "Mobile number is required" },
                user_address: { required: "Address is required" },

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
    $(document).ready(function () {
  $('#country').change(function () {
    var cid = this.value;   //let cid = $(this).val(); we cal also write this.
    $.ajax({
      url: "{{url('/getstate')}}",
      type: "POST",
      datatype: "json",
      data: {
        country_id: cid,
         '_token':'{{csrf_token()}}'
      },
      success: function(result) {
        $('#state').html('<option value="">Select State</option>');
        $.each(result.state, function(key, value) {
          $('#state').append('<option value="' +value.state_id+ '">' +value.state_name+ '</option>');
        });
      },
      errror: function(xhr) {
          console.log(xhr.responseText);
        }
      });
  });

  $('#state').change(function () {
    var sid = this.value;
    $.ajax({
      url: "{{url('/getcity')}}",
      type: "POST",
      datatype: "json",
      data: {
        state_id: sid,
         '_token':'{{csrf_token()}}'
      },
      success: function(result) {
        console.log(result);
        $('#city').html('<option value="">Select City</option>');
        $.each(result.city, function(key, value) {
          $('#city').append('<option value="' +value.city_id+ '">' +value.city_name+ '</option>')
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