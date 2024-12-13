@extends('front.layouts.layout') @section('content')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<style>
   .plus {
    margin-top: 34px;
}
</style>


<div class="banner-tailors">
<div class="container browse-tailors">
  <div class="row browse-content">
    <h1 class="text-white">Profile</h1>
  </div>
</div>
</div>

<div class="container-fluid page-body-wrapper vendor-dasboard">
@include('front.user.sidebar')
@php
    $country_id = '';
@endphp
@if($address != '')
    @php
        $country_id = $address->country_id;
    @endphp
@endif

            <div class="col-md-9">
                <div class="row profile-setting-form customer-profile">
                    <div class="col-md-12 grid-margin stretch-card customer-profile-card">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Shipping Address </h4>
                                <p class="card-description">Add/Update Shipping Address</p>
                                <form class="profile-input-form customer-profile-form" action="{{ url('/addShipping') }}" id="profile_form" enctype="multipart/form-data" method="POST">
                                @csrf
                                    <div class="row customer-input-inner">
                                    <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputName1">Address Title</label>
                                                <input type="text" class="form-control" name="address_name" id="exampleInputName1" placeholder="Address Title" value="{{ $address?$address->address_name:''}}" required/>
                                                <input type="hidden" name="address_id" value="{{ $address?$address->id:''}}"/>
                                            </div>
                                        </div>    
                                    <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="exampleSelectGender">Country</label>
                                                    <select class="form-select" name="country_id" id="country">
                                                    <option value="" disabled >Choose Country</option>
                                                    @foreach($countries as $country)
                                                        <option value="{{ $country->country_id }}" {{ $country_id == $country->country_id ? 'selected' : '' }}>
                                                            {{ $country->country_name }}
                                                        </option>
                                                    @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="exampleSelectGender">State</label>
                                                    <select class="form-select" name="state_id" id="state">
                                                    <option value="" disabled>Choose State</option>
                                                    @if($state!='')
                                                    @foreach($state as $states_list)
                                                        <option value="{{ $states_list->state_id }}" {{ $address->state_id == $states_list->state_id  ? 'selected' : '' }}>
                                                            {{ $states_list->state_name }}
                                                        </option>
                                                    @endforeach
                                                    @endif
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="exampleSelectGender">City</label>
                                                    <select class="form-select" name="city_id" id="city">
                                                    <option value="" disabled>Choose City</option>
                                                    @if($city!='')
                                                    @foreach($city as $city_list)
                                                        <option value="{{ $city_list->city_id }}" {{ $address->city_id == $city_list->city_id   ? 'selected' : '' }}>
                                                            {{ $city_list->city_name }}
                                                        </option>
                                                    @endforeach
                                                    @endif
                                                    </select>
                                                </div>
                                            </div>
                                        
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleTextarea1">Address Line 1</label>
                                                <textarea class="form-control" name="address_line_1" id="exampleTextarea1" rows="3" required>{{ $address?$address->address_line_1:''}}</textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleTextarea1">Address Line 2</label>
                                                <textarea class="form-control" name="address_line_2" id="exampleTextarea1" rows="3" required>{{ $address?$address->address_line_2:''}}</textarea>
                                            </div>
                                        </div>
                                        
                                        
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputEmail3">Postal Code</label>
                                                <input type="text" class="form-control" name="postal_code" id="exampleInputEmail3" placeholder="Postal Code" value="{{ $address?$address->postal_code:''}}" required/>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputEmail3">Landmark</label>
                                                <input type="text" class="form-control" name="landmark" id="exampleInputEmail3" placeholder="Landmark" value="{{ $address?$address->landmark:''}}" required/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex mt-3 sub-cen-btn">
                                        <button type="submit" class="btn btn-outline-success me-2">Submit</button>
                                        <button class="btn btn-outline-danger">Cancel</button>
                                    </div>

                            </div>
                        </div>
                    </div>

</form>


                </div>
            </div>
        </div>

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
