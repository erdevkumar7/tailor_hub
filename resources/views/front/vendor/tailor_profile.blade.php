@extends('front.layouts.layout') @section('content')
<!--link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet" /-->
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.2/css/select2.min.css" rel="stylesheet" />
<style>
    .select2-container--default .select2-selection--multiple .select2-selection__choice {
        padding: 1px 25px !important;
    padding-right: 10px !important;
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
@include('front.vendor.vendor_sidebar')



            <div class="col-md-9">
                <div class="row profile-setting-form customer-profile">
                    <div class="col-md-9 grid-margin stretch-card customer-profile-card">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Profile Update</h4>
                                <p class="card-description">{{ $vendor->vendor_type == 1 ? 'Tailor' : ($vendor->vendor_type == 2 ? 'Fabric Seller' : 'Tailor & Fabric Seller') }}
                                </p>
                                <form class="profile-input-form customer-profile-form" action="{{ url('/updateProfile') }}" id="profile_form" enctype="multipart/form-data" method="POST">
                                @csrf
                                    <div class="row customer-input-inner">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputName1">First Name</label>
                                                <input type="text" class="form-control" name="name" id="exampleInputName1" placeholder="First Name" value="{{ $vendor->name }}" />
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputName2">Last Name</label>
                                                <input type="text" class="form-control" name="last_name" id="exampleInputName2" placeholder="Last Name" value="{{ $vendor->last_name }}" />
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputEmail3">Email address</label>
                                                <input type="email" class="form-control" name="email" id="exampleInputEmail3" placeholder="Email" value="{{ $vendor->email }}" readonly/>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                            <label for="exampleInputName2">Mobile Number</label>
                                            <input type="text" class="form-control" name="mobile_number" id="exampleInputName2" placeholder="Mobile Number" value="{{ $vendor->mobile_no }}" readonly/>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputName2">Business Name</label>
                                                <input type="text" class="form-control" name="business_name" id="exampleInputName2" placeholder="Business Name" value="{{ $vendor->business_name }}" />
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="exampleTextarea1">Experience (In Year)</label>
                                                    <input type="text" class="form-control" name="experience" id="exampleInputName2" placeholder="Experience (In Year)" value="{{ $vendor->experience }}"/>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleTextarea1">Profile Description(Short)</label>
                                                <textarea class="form-control" name="short_description" id="exampleTextarea1" rows="4">{{ $vendor->short_description }}</textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleTextarea1">Profile Description(Long)</label>
                                                <textarea class="form-control" name="long_description" id="exampleTextarea1" rows="4">{{ $vendor->long_description }}</textarea>
                                            </div>
                                        </div>
                                        @if($vendor->vendor_type==0)
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleTextarea1">Vendor Type</label>
                                                <select class="form-select" name="vendor_type" >
                                                    <option value="1">Tailor</option>
                                                    <option value="2">Fabric Seller</option>
                                                    <option value="3">Tailor & Fabric Seller</option>
                                                </select>
                                            </div>
                                        </div>
                                        @endif
                                        <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="exampleTextarea1">Speciality</label>
                                                    <select class="mySelect for" name="selected_ids[]" multiple="multiple" style="width: 100%">
                                                    @foreach ($speciality as $option)
                                                        <option value="{{ $option->id }}" 
                                                            @if(in_array($option->id, $selected)) selected @endif>
                                                            {{ $option->text }}
                                                        </option>
                                                    @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="exampleSelectGender">Country</label>
                                                    <select class="form-select" name="country_id" id="country">
                                                    <option value="" disabled {{ !$vendor->country_id ? 'selected' : '' }}>Choose Country</option>
                                                    @foreach($countries as $country)
                                                        <option value="{{ $country->country_id }}" {{ $vendor->country_id == $country->country_id ? 'selected' : '' }}>
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
                                                    @foreach($state as $states_list)
                                                        <option value="{{ $states_list->state_id }}" {{ $vendor->state_id == $states_list->state_id  ? 'selected' : '' }}>
                                                            {{ $states_list->state_name }}
                                                        </option>
                                                    @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="exampleSelectGender">City</label>
                                                    <select class="form-select" name="city_id" id="city">
                                                    <option value="" disabled>Choose City</option>
                                                    @foreach($city as $city_list)
                                                        <option value="{{ $city_list->city_id }}" {{ $vendor->city_id == $city_list->city_id   ? 'selected' : '' }}>
                                                            {{ $city_list->city_name }}
                                                        </option>
                                                    @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="exampleTextarea1">Postal Code</label>
                                                    <input type="text" class="form-control" name="zipcode" id="exampleInputName2" placeholder="Postal Code" value="{{ $vendor->zip_code }}"/>
                                                </div>
                                            </div>
                                            
                                            
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="exampleTextarea1">Address</label>
                                                <textarea class="form-control" name="address" id="exampleTextarea1" rows="4">{{ $vendor->address }}</textarea>
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
                <div class="col-3 profile-right customer-profile-right">

    <div class="card">
        <div class="card-body">
            <h4>Profile Image</h4>
              <label for="profile-image" class="upload-label" style="cursor: pointer;">
                <img id="preview" src="{{ $vendor->profile_img==''?'https://votivelaravel.in/tailor_hub/public/front_assets/images/design2.png': url('/public/upload').'/'.$vendor->profile_img }} " alt="Profile Image" style="width: 100%; max-width: 200px; border: 1px dashed #ccc; padding: 10px;" />
                <span>Please Upload Image</span>
              </label>
              <input type="file" id="profile-image" name="img" style="display: none;" accept="image/*" />
              <input type="hidden" name="old_image" value="{{ $vendor->profile_img  }}"/>
        </div>
    </div>
</div>
</form>
<script>
    const fileInput = document.getElementById('profile-image');
    const previewImage = document.getElementById('preview');

    fileInput.addEventListener('change', function (event) {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function (e) {
                previewImage.src = e.target.result; // Update the image preview
            };
            reader.readAsDataURL(file);
        }
    });
</script>

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
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.2/js/select2.min.js"></script>
<script>
    $(document).ready(function () {
        var data = @json($speciality); // Convert PHP array to JavaScript
        
        var placeholder = "Select options";

        $(".mySelect").select2({
            data: data,
            placeholder: placeholder,
            allowClear: false,
            minimumResultsForSearch: 5,
        });
    });
</script>
@endsection
