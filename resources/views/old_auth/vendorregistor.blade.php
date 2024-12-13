<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Tailorhub</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ url('/public') }}/web/vendors/feather/feather.css">
    <link rel="stylesheet" href="{{ url('/public') }}/web/vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="{{ url('/public') }}/web/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="{{ url('/public') }}/web/vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ url('/public') }}/web/vendors/mdi/css/materialdesignicons.min.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{ url('/public') }}/web/css/style.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="{{ url('/public') }}/web/images/favicon.png" />
  </head>
  <body>
    <div class="container-scroller">
      <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-center auth px-0">
          <div class="row w-100 mx-0">
            <div class="col-lg-4 mx-auto">

            <div><a href="{{ url('register') }}" class="btn btn-outline-primary btn-lg btn-block" style="width: 49%;">Customer</a>
            <a href="{{ route('vendorSignupForm') }}" class="btn btn-block btn-primary btn-lg btn-block"  style="width: 49%;">Vendor</a></div>

              <div class="auth-form-light text-left py-5 px-4 px-sm-5">
                <div class="brand-logo">
                  <img src="{{ url('/public') }}/web/images/logo.svg" alt="logo">
                </div>
                <h4>New here?</h4>
                <h6 class="font-weight-light">Signing up is easy. It only takes a few steps</h6>
                @if(session()->has("success"))
                    <div class="alert alert-success" role="alert">
                        <strong>{{ session()->get("success") }} </strong>
                    </div>
                    @elseif(session()->has("error"))
                    <div class="alert alert-warning" role="alert">
                        <strong>{{ session()->get("error") }} </strong>
                    </div>
                    @endif
                <form class="pt-3" method="POST" action="{{ route('vendorSignupForm') }}">
                {!! csrf_field() !!}
                  <div class="form-group">
                    <input type="text" class="form-control" id="exampleInputUsername1" placeholder="Namse" name="first_name">
                  </div>
                  <div class="form-group">
                    <input type="email" class="form-control form-control-lg" id="exampleInputEmail1" placeholder="Email" name="email_id">
                  </div>
                  <!--div-- class="form-group">
                    <select class="form-select form-select-lg" id="exampleFormControlSelect2">
                      <option>Country</option>
                      <option>United States of America</option>
                      <option>United Kingdom</option>
                      <option>India</option>
                      <option>Germany</option>
                      <option>Argentina</option>
                    </select>
                  </!--div-->
                  <div class="form-group">
                    <input type="password" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Password" name="password">
                  </div>
                  <div class="mb-4">
                    <div class="form-check">
                      <label class="form-check-label text-muted">
                        <input type="checkbox" class="form-check-input" name="terms"> I agree to all Terms & Conditions </label>
                    </div>
                  </div>
                  <div class="mt-3 d-grid gap-2">
                    <input type="submit" value="Sign Up" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">
                  </div>
                  <div class="text-center mt-4 font-weight-light"> Already have an account? <a href="{{ route('vendorLoginForm') }}" class="text-primary">Login</a>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="{{ url('/public') }}/web/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="{{ url('/public') }}/web/js/off-canvas.js"></script>
    <script src="{{ url('/public') }}/web/js/template.js"></script>
    <script src="{{ url('/public') }}/web/js/settings.js"></script>
    <script src="{{ url('/public') }}/web/js/todolist.js"></script>
    <!-- endinject -->
  </body>
</html>