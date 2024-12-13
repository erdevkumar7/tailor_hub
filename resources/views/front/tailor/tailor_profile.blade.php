@extends('front.layouts.layout') @section('content')

<div class="banner-tailors">
<div class="container browse-tailors">
  <div class="row browse-content">
    <h1 class="text-white">Customer-Profile</h1>
  </div>
</div>
</div>

<div class="container-fluid page-body-wrapper vendor-dasboard">
<nav class="sidebar sidebar-offcanvas" id="sidebar">
  <ul class="nav">
    <li class="nav-item active">
      <a class="nav-link" href="index.html">
<i class="fa fa-th" aria-hidden="true"></i>
        <span class="menu-title">Dashboard</span>
      </a>
    </li>


<li class="nav-item">
  <a class="nav-link" data-bs-toggle="collapse" href="#tables-menu" aria-expanded="false" aria-controls="tables-menu">
    <i class="fa fa-th" aria-hidden="true"></i>
    <span class="menu-title">Profile</span>
    <i class="menu-arrow fa fa-chevron-down"></i>
  </a>
  <!-- Dropdown items -->
  <div class="collapse" id="tables-menu">
    <ul class="nav flex-column sub-menu">
      <li class="nav-item">
        <a class="nav-link" href="simple-table.html">Profile Setting </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="data-table.html">Data Table</a>
      </li>
    </ul>
  </div>
</li>


    <li class="nav-item">
      <a class="nav-link" data-bs-toggle="collapse" href="#icons" aria-expanded="false" aria-controls="icons">
<i class="fa fa-th" aria-hidden="true"></i>
        <span class="menu-title">Icons</span>
        <i class="menu-arrow"></i>
      </a>  
    </li>
    <li class="nav-item">
      <a class="nav-link" data-bs-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
<i class="fa fa-th" aria-hidden="true"></i>
        <span class="menu-title">Order Mangement</span>
        <i class="menu-arrow"></i>
      </a>
 
    </li>

    <li class="nav-item">
      <a class="nav-link" href="../../../docs/documentation.html">
<i class="fa fa-th" aria-hidden="true"></i>
        <span class="menu-title">Message</span>
      </a>
    </li>
  </ul>
</nav>



            <div class="col-md-9">
                <div class="row profile-setting-form customer-profile">
                    <div class="col-md-9 grid-margin stretch-card customer-profile-card">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Profile Updates</h4>
                                <p class="card-description">Basic Details</p>
                                <form class="profile-input-form customer-profile-form" action="{{ url('/profile_update') }}" id="profile_form" enctype="multipart/form-data" method="POST">
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
                                                <input type="text" class="form-control" name="last_name" id="exampleInputName2" placeholder="Last Name" value="" />
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
                                            <label for="exampleSelectGender">Country</label>
                                              <select class="form-select" name="country_id" id="country">
                                                <option value="" disabled {{ !$vendor->country_id ? 'selected' : '' }}>Choose Country</option>
                                                  @foreach($countries as $country)
                                                    <option value="{{ $country->country_id }}" {{ $vendor->country_id == $country->country_id ? 'selected' : '' }}>{{ $country->country_name }}
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
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="exampleTextarea1">Postal Code</label>
                                                    <input type="text" class="form-control" name="zipcode" id="exampleInputName2" placeholder="Postal Code" value="{{ $vendor->zip_code }}"/>
                                                </div>
                                            </div>
                                        {{-- <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleSelectGender">Gender</label>
                                                <select class="form-select" name="gender" id="exampleSelectGender">
                                                    <option value="">Select Gender</option>
                                                    <option value="1">Male</option>
                                                    <option value="2">Female</option>
                                                </select>
                                            </div>
                                        </div> --}}
                                        {{-- <div class="col-md-12">
                                            <div class="form-group">
                                                <label>File Upload</label>
                                                <input type="file" id="profile-image" name="img" class="form-control" accept="image/*"/>

                                            </div>
                                        </div> --}}
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="exampleTextarea1">Address</label>
                                                <textarea class="form-control" name="address" id="exampleTextarea1" rows="4">{{ $vendor->address }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex mt-3 sub-cen-btn">
                                        <button type="submit" class="btn btn-primary me-2">Submit</button>
                                        <button class="btn btn-light">Cancel</button>
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


@endsection
