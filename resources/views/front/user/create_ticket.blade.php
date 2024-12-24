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


            <div class="col-md-9">
                <div class="row profile-setting-form customer-profile">
                    <div class="col-md-12 grid-margin stretch-card customer-profile-card">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Support Ticket </h4>
                                <p class="card-description">Create Ticket</p>
                                <form class="profile-input-form customer-profile-form" action="{{ url('/createTicket') }}" id="support_form" enctype="multipart/form-data" method="POST">
                                @csrf
                                    <div class="row customer-input-inner">
                                    <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="exampleInputName1">Subject</label>
                                                <input type="text" class="form-control" name="subject" id="exampleInputName1" placeholder="Subject" required/>
                                            </div>
                                        </div>    
                                    <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="exampleSelectGender">Order id</label>
                                                    <select class="form-select" name="order_id" >
                                                    <option value="" disabled >Choose Order</option>
                                                    <option value="1">#12345</option>
                                                    <option value="2">#45874</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="exampleSelectGender">Support Type</label>
                                                    <select class="form-select" name="support_type">
                                                    <option value="" disabled>Choose Support Type</option>
                                                    <option value="1" >Tailor</option>
                                                    <option value="2" >Fabric Seller</option>
                                                    <option value="3" >Other</option>
                                                    </select>
                                                </div>
                                            </div>
                                            
                                        
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="exampleTextarea1">Message</label>
                                                <textarea class="form-control" name="message" id="exampleTextarea1" rows="3" required></textarea>
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
