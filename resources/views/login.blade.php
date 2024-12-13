@extends('front.layouts.layout')

@section('content')
  
        <div class="elite-register elite-login">
            <div class="container">
                <div class="row elite-register-inner">
                    <div class="signup-login-btn">
                        <a href="{{ url('login') }}" class="btn btn-block btn-primary btn-lg btn-block customer" style="width: 49%;">Customer</a>
                        <a href="{{ route('vendorLoginForm') }}" class="btn btn-outline-primary btn-lg btn-block vendor" style="width: 49%;">Vendor</a>
                    </div>

                    <div class="signup-inner-content">
                        
                    
                        @if(session()->has("success"))
                            <div class="alert alert-success" role="alert">
                                <strong>{{ session()->get("success") }} </strong>
                            </div>
                            @elseif(session()->has("error"))
                            <div class="alert alert-warning" role="alert">
                                <strong>{{ session()->get("error") }} </strong>
                            </div>
                        @endif

                        <div class="form-register form-login">
                            <h5>Welcome back</h5>
                            <p>Please log in to your account</p>
                            <form class="pt-3" action="{{ route('customerlogin')}}" method="POST">
                            {!! csrf_field() !!}

                                <div class="form-group">
                                    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email or phone number" name="email" />
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password" />
                                </div>
                            
                                <div class="reset-pass">
                                    <a href="#">Forgot Password?</a> 
                                </div>

                                <div class="mt-3 d-grid gap-2">
                                    <input type="submit" value="Sign In" class="btn btn-block btn-lg font-weight-medium auth-form-btn" />
                                </div>

                                <p class="already-account">Don't have an account yet? <a href="{{ url('register') }}">Sign Up</a></p>

                                <a href="#" class="continue">Or Continue with</a>

                                <div class="three-btn">
                                    <a href="#"><img class="one" src="https://votivelaravel.in/tailor_hub/public/web/images/one.svg" /></a>
                                    <a href="{{ route('google.redirect') }}"><img class="three" src="https://votivelaravel.in/tailor_hub/public/web/images/three.svg" /></a>
                                    <a href="#"><img class="two" src="https://votivelaravel.in/tailor_hub/public/web/images/two.svg" /></a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>






    
        @endsection