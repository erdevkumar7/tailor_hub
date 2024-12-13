@extends('front.layouts.layout') @section('content')

<div class="banner-tailors">
<div class="container browse-tailors">
  <div class="row browse-content">
    <h1 class="text-white">Customer-Profile</h1>
  </div>
</div>
</div>

<div class="customer-profile">
    <div class="container">
        <div class="row customer-profile-inner">
            <div class="col-md-3 customer-profile-left">
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
      <li class="nav-item">
        <a class="nav-link" href="#">
          <i class="icon-grid menu-icon"></i>
          <span class="menu-title">Dashboard</span>
        </a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" data-bs-toggle="collapse" href="#profile" aria-expanded="false" aria-controls="auth">
          <i class="icon-head menu-icon"></i>
          <span class="menu-title">Profile</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse show" id="profile">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link active" href="#">Profile Setting </a></li>
          </ul>
        </div>  
      </li>
      <li class="nav-item">
        <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
          <i class="icon-layout menu-icon"></i>
          <span class="menu-title">Order Mangement</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="ui-basic">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="#">Order List</a></li>
          </ul>
        </div>
      </li>
    
    <li class="nav-item">
      <a class="nav-link" data-bs-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
        <i class="icon-head menu-icon"></i>
        <span class="menu-title">Message</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="auth">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="#">View Message </a></li>
        </ul>
      </div>
    </li>
    </ul>
  </nav>
            </div>

            <div class="col-md-9">
                <div class="row profile-setting-form customer-profile">
                    <div class="col-md-9 grid-margin stretch-card customer-profile-card">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Profile Update</h4>
                                <p class="card-description">Basic Details</p>
                                <form class="profile-input-form customer-profile-form" action="https://votivelaravel.in/tailor_hub/profile_update" id="profile_form" enctype="multipart/form-data" method="POST">
                                    <input type="hidden" name="_token" value="nmIBbSgKpt4zN2QbhHdouApEUNTNOzZkfbEa5m72" />
                                    <div class="row customer-input-inner">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputName1">First Name</label>
                                                <input type="text" class="form-control" name="first_name" id="exampleInputName1" placeholder="First Name" value="sushil sahu" />
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
                                                <input type="email" class="form-control" name="email" id="exampleInputEmail3" placeholder="Email" value="sushilvotivedesigner@gmail.com" />
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleSelectGender">Gender</label>
                                                <select class="form-select" name="gender" id="exampleSelectGender">
                                                    <option value="">Select Gender</option>
                                                    <option value="1">Male</option>
                                                    <option value="2">Female</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>File Upload</label>
                                                <input type="file" id="img" name="img" class="form-control" />
                                                <input type="hidden" name="old_image" value="" />
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="exampleTextarea1">Address</label>
                                                <textarea class="form-control" name="address" id="exampleTextarea1" rows="4"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex mt-3 sub-cen-btn">
                                        <button type="submit" class="btn btn-primary me-2">Submit</button>
                                        <button class="btn btn-light">Cancel</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                <div class="col-3 profile-right customer-profile-right">
    <div class="card">
        <div class="card-body">
            <h4>Profile Image</h4>
            <label for="profile-image" class="upload-label" style="cursor: pointer;">
                <img id="preview" src="https://votivelaravel.in/tailor_hub/public/front_assets/images/design2.png" alt="Profile Image" style="width: 100%; max-width: 200px; border: 1px dashed #ccc; padding: 10px;" />
                <span>Please Upload Image</span>
            </label>
            <input type="file" id="profile-image" style="display: none;" accept="image/*" />
        </div>
    </div>
</div>

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
    </div>
</div>

@endsection
