@extends('front.layouts.layout') @section('content')


<!-- Bootstrap Toggle CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">

<div class="banner-tailors">
    <div class="container browse-tailors">
        <div class="row browse-content">
            <h1 class="text-white">Shipping Add</h1>
        </div>
    </div>
</div>

<div class="container-fluid page-body-wrapper vendor-dasboard customer-dash">
@include('front.user.sidebar')

<div class="col-md-9">
    <div class="row shipping-address-user">    
    <a class="add-new-address"><span>+</span>ADD NEW ADDRESSss</a>
<div class="default-address">
    <h5>DEFAULT ADDRESS</h5>
<div class="name-here-add">
    <div class="name-inner">
        <div class="will-gose-inner">
        <h5>Name Here</h5>
        <span>27 Address will goes here</span>
        <span>City Name</span>
        <span>State</span>
        <span>Mobile: (0123) 456 789</span>
        </div>

              <div class="action-buttons">
  <span class="set-btn-inner">SET DEFAULT</span>
  
  <div class="fa-icons-btn">
  <span class="edit-btn" title="Edit">
    <i class="fas fa-edit"></i> <!-- Edit Icon -->
  </span>
  <span class="delete-btn" title="Delete">
    <i class="fas fa-trash"></i> <!-- Delete Icon -->
  </span>
</div>
</div>
    </div>

</div>

</div>




<div class="default-address">
    <h5>OTHER ADDRESS</h5>
<div class="name-here-add">
    <div class="name-inner">
        <div class="will-gose-inner">
        <h5>Name Here</h5>
        <span>27 Address will goes here</span>
        <span>City Name</span>
        <span>State</span>
        </div>

          <div class="action-buttons">
  <span class="set-btn-inner">SET DEFAULT</span>
  
  <div class="fa-icons-btn">
  <span class="edit-btn" title="Edit">
    <i class="fas fa-edit"></i> <!-- Edit Icon -->
  </span>
  <span class="delete-btn" title="Delete">
    <i class="fas fa-trash"></i> <!-- Delete Icon -->
  </span>
</div>
</div>
    </div>
</div>

<div class="name-here-add">
    <div class="name-inner">
        <div class="will-gose-inner">
        <h5>Name Here</h5>
        <span>27 Address will goes here</span>
        <span>City Name</span>
        <span>State</span>
        </div>

      <div class="action-buttons">
  <span class="set-btn-inner">SET DEFAULT</span>
  
  <div class="fa-icons-btn">
  <span class="edit-btn" title="Edit">
    <i class="fas fa-edit"></i> <!-- Edit Icon -->
  </span>
  <span class="delete-btn" title="Delete">
    <i class="fas fa-trash"></i> <!-- Delete Icon -->
  </span>
</div>
</div>

    </div>
</div>

</div>

                   
          </div>
       </div>
</div>




@endsection
