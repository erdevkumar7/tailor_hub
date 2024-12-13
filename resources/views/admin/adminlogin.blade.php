

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TailorHub | Admin</title>
    <link rel="icon" href="{{ url('/') }}/public/assets/images/front_image/escort.png" type="image/icon type">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.6.0/mdb.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" type="text/css" href="{{ asset('public/assets/css/style.css') }}">
</head>

<body>

<style>
.site-section.bg-light.login_sec {
    padding-bottom: 11%;
}

</style>
<div class="site-section bg-light login_sec">

<div class="container">

    <div class="row justify-content-center">

        <div class="col-md-6 mb-5" data-aos="fade">

            <h2 class="mb-5 text-black" style="text-align:center">ADMIN LOGIN</h2>

            <form action="{{ route('adminlogin')}}" method="POST" class="p-5 bg-white">
                @csrf

                @if(session()->has("success"))

                    <div class="alert alert-success" role="alert">

                        <strong>{{ session()->get("success") }} </strong>

                    </div>

                    @elseif(session()->has("error"))

                    <div class="alert alert-warning" role="alert">

                        <strong>{{ session()->get("error") }} </strong>

                    </div>

                    @endif

                <div class="row form-group">

                    <div class="col-md-12">

                        <label class="text-black" for="email">Email</label>

                        <input value="{{ (isset($_COOKIE["remember"])) ? json_decode($_COOKIE["remember"])->email : ""  }}" required type="email" id="email" name="email" class="form-control {{ $errors->has("email") ? "is-invalid" : "" }}">

                        @if($errors->has("email"))

                        <span class="text-danger">{{ $errors->first("email") }}</span>

                        @endif

                    </div>

                </div>

                <div class="row form-group">

                    <div class="col-md-12">

                        <label class="text-black" for="subject">Password</label>

                        <input value="{{ (isset($_COOKIE["remember"])) ? json_decode($_COOKIE["remember"])->password : ""  }}"  required type="password" name="password" id="subject" class="form-control {{ $errors->has("password") ? "is-invalid" : "" }}">

                        @if($errors->has("password"))

                        <span class="text-danger">{{ $errors->first("password") }}</span>

                        @endif

                    </div>

                </div>



                <div class="row form-group loginmid">

                    <div class="col-6">

                        <div class="form-check">

                            <input {{ (isset($_COOKIE["remember"])) ? "checked" : ""  }} class="form-check-input" type="checkbox" name="remember_me" id="defaultCheck1">

                            <label class="form-check-label" for="defaultCheck1">

                                Remember me

                            </label>

                        </div>

                    </div>

                    <!-- <div class="col-6 text-right">

                        <a href="" class="nav-link">Forgot Password?</a>

                    </div> -->

                </div>

                <div class="row form-group">

                    <div class="col-md-12">


                      <div class="text-center">
                        <input type="submit" value="Login" class="btn btn-primary py-2 px-4 text-white">
                      </div>

                    </div>

                </div>

            </form>

        </div>

    </div>

</div>

</div>


</body>

</html>
 <!-- first-section start -->


    <!-- first-section start -->


<!--  gradenzy section end-->