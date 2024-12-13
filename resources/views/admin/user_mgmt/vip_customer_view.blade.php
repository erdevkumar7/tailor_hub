@extends('admin.layouts.layout')

@section('title','VIP Customer View')
@section('admin-content')

<div class="right_col" role="main">
    <div class="">


        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 customer-form-first">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>VIP Customer View </h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br />
                        <form id="course_form" method="post" class="form-horizontal form-label-left" enctype="multipart/form-data">
                            {!! csrf_field() !!}

                            <div class="form-group row">
                                <!-- First row -->
                                <div class="col-md-6">
                                    <label class="control-label">First Name<span class="mandatory" style="color:red"> *</span></label>
                                    <input type="text" class="form-control"  name="first_name" value="{{ $user_detail->first_name }}" disabled>
                                </div>

                                <div class="col-md-6">
                                    <label class="control-label">Last Name<span class="mandatory" style="color:red"> *</span></label>
                                    <input type="text" class="form-control" name="last_name" value="{{ $user_detail->last_name }}" disabled>
                                </div>
                            </div>

                            <div class="form-group row">
                                <!-- Second row -->
                                <div class="col-md-6">
                                    <label class="control-label">Email ID<span class="mandatory" style="color:red"> *</span></label>
                                    <input type="email" class="form-control"  name="email_id" value="{{ $user_detail->email_id }}" disabled>
                                </div>

                                <div class="col-md-6">
                                    <label class="control-label">Mobile Number<span class="mandatory" style="color:red"> *</span></label>
                                    <input type="text" class="form-control"  name="mobile_number" value="{{ $user_detail->mobile_number }}" disabled>
                                </div>
                            </div>

                            <div class="form-group row">

                                <div class="col-md-6">
                                    <label class="control-label">Gender</label>
                                    <select id="heard" class="form-control" name="gender" disabled>
                                        <option value="1" {{ $user_detail->gender == 1 ? 'selected' : '' }} disabled>Male</option>
                                        <option value="2" {{ $user_detail->gender == 2 ? 'selected' : '' }} disabled>Female</option>
                                    </select>
                                </div>
                                         <!-- Fourth row -->
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

                            </div>

                            <div class="form-group row">
                                <!-- Fifth row -->

                                <div class="col-md-6">
                                    <label class="control-label">City</label>
                                    <input type="text" class="form-control" name="user_city" value="{{ $city->city_name }}" disabled>
                                </div>


                                <div class="col-md-6">
                                    <label class="control-label">Zip Code</label>
                                    <input type="text" class="form-control"  name="user_zipcode" value="{{ $user_detail->zipcode }}" disabled>
                                </div>
                            </div>

                            <div class="form-group row">
                                <!-- Sixth row -->
                                <div class="col-md-6">
                                    <label class="control-label">Profile Image</label>
                                    <div>
                                        <!-- Image Display -->
                                        <img src="{{ asset('public/admin/uploads/user/'. $user_detail->profile_image) }}" id="upload_image_display" style="margin-top: 10px; border-radius: 10px;" alt="brand image" height="80px" width="100px">
                                    </div>
                                  </div>


                            </div>
                            </div>




                            <div class="form-group row">
                                <!-- Tenth row -->


                            </div>


                            <div class="form-group row">
                                <div class="col-md-12 go-back-btn mt-3">
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

@endsection
