@extends('front.layouts.layout') @section('content')


<!-- Bootstrap Toggle CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">

<div class="banner-tailors">
    <div class="container browse-tailors">
        <div class="row browse-content">
            <h1 class="text-white">Shipping View</h1>
        </div>
    </div>
</div>

<div class="container-fluid page-body-wrapper vendor-dasboard customer-dash">
@include('front.user.sidebar')

       <div class="col-md-9">

       </div>
</div>




@endsection
