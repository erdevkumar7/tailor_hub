<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Tailorhub</title>
    <!-- plugins:css -->
    
	
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
	<link href="{{ url('/public') }}/front_assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="{{ url('/public') }}/front_assets/css/vendor.css">
    <link rel="stylesheet" type="text/css" href="{{ url('/public') }}/front_assets/style.css">
    <link rel="stylesheet" type="text/css" href="{{ url('/public') }}/front_assets/taiorstyle.css">
    <link rel="stylesheet" type="text/css" href="{{ url('/public') }}/front_assets/detail.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.theme.min.css">
	
	

    <link rel="stylesheet" href="{{ url('/public') }}/front_assets/css/elegant-icons.css" type="text/css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;700&family=Open+Sans:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">

  </head>
  <body>
  
        <div class="elite-register elite-login">
            <div class="container">
                <div class="row elite-register-inner">
                    <div class="signup-login-btn">
                        <a href="{{ url('register') }}" class="btn btn-block btn-primary btn-lg btn-block customer" style="width: 49%;">Customer</a>
                        <a href="{{ route('vendorSignupForm') }}" class="btn btn-outline-primary btn-lg btn-block vendor" style="width: 49%;">Vendor</a>
                    </div>

                    <div class="signup-inner-content">
                        <!-- <img src="https://votivelaravel.in/tailor_hub/public/web/images/newlogo.png" />
                        <h4 class="text-center">Elite Clothiers</h4> -->

                        <div class="form-register form-login">
                            <h5>Welcome backsss</h5>
                            <p>Please log in to your account</p>

                            <div class="form-group">
                                <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email or phone number" name="email_id" />
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password" />
                            </div>
                        
                            <div class="reset-pass">
                           <a href="#">Forgot Password ?</a> 
                           </div>

                            <div class="mt-3 d-grid gap-2">
                                <input type="submit" value="Sign In" class="btn btn-block btn-lg font-weight-medium auth-form-btn" />
                            </div>

                            <p class="already-account">Don't have an account yet? <a href="#">Sign Up</a></p>

                            <a href="#" class="continue">Or Continue with</a>

                            <div class="three-btn">
                                <a href="#"><img class="one" src="https://votivelaravel.in/tailor_hub/public/web/images/one.svg" /></a>
                                <a href="#"><img class="three" src="https://votivelaravel.in/tailor_hub/public/web/images/three.svg" /></a>
                                <a href="#"><img class="two" src="https://votivelaravel.in/tailor_hub/public/web/images/two.svg" /></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>






    <!-- container-scroller -->
    <!-- plugins:js -->
    <!--script src="{{ url('/public') }}/web/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <!--script src="{{ url('/public') }}/web/js/off-canvas.js"></script>
    <script src="{{ url('/public') }}/web/js/template.js"></script>
    <script src="{{ url('/public') }}/web/js/settings.js"></script>
    <script src="{{ url('/public') }}/web/js/todolist.js"></script-->
    <!-- endinject -->
  </body>
</html>