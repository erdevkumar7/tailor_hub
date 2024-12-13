@extends('front.layouts.layout')

@section('content')

<div class="banner-tailors">
<div class="browse-tailors">
  <div class="browse-content">
    <h1 class="text-white">Browse Tailors</h1>
  </div>
</div>
</div>



<div class="tailor-featured">
    <div class="container">
        <div class="row featured-list-first">
            <div class="dropdown">
                <a class="btn btn-secondary dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Select Type
                </a>

                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">Action</a></li>
                    <li><a class="dropdown-item" href="#">Another action</a></li>
                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                </ul>
            </div>

            <div class="dropdown">
                <a class="btn btn-secondary dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Select location
                </a>

                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">Action</a></li>
                    <li><a class="dropdown-item" href="#">Another action</a></li>
                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                </ul>
            </div>

            <div class="dropdown">
                <a class="btn btn-secondary dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Select status
                </a>

                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">Action</a></li>
                    <li><a class="dropdown-item" href="#">Another action</a></li>
                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                </ul>
            </div>

            <div class="input-group">
                <div class="form-outline" data-mdb-input-init>
                    <input type="search" id="form1" class="form-control" />
                </div>
                <button type="button" class="btn search-btn" data-mdb-ripple-init>
                    <i class="fas fa-search"></i>
                </button>
            </div>
        </div>



        <div class="row featured-list">
            @foreach ($tailors as $tailor)
            <div class="col-md-4">
                <div class="listfoliopro-listing-item">
                    <div class="card-img-container">
                        <img decoding="async" src="{{ url('public/images/tailor-img-two.png') }}" alt="tailor_image" />

                        <div class="star-icon">
                            <i class="fa fa-star" aria-hidden="true"></i>
                            <p>4.5</p>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="three-icon-list">
                            <i class="fa fa-envelope" aria-hidden="true"></i>
                            <i class="fa fa-share-alt" aria-hidden="true"></i>
                            <i class="fa fa-heart" aria-hidden="true"></i>
                        </div>
                        <div class="listing-title">
                            <a href="#" class="">{{ $tailor->name }} {{ $tailor->last_name }} </a>
                        </div>
                        <div class="location-date-wrapper">
                            <p><b> Specialties</b> - Wedding Dresses, Traditional Attires, Men’s Suits</p>
                        </div>
                        <div class="row location-date-wrapper mt-2">
                            <div class="col-lg-4 col-md-6 col-6 location align-items-center no-gutter-right mb-2"><i class="fas fa-tshirt"></i><span>Cloth House</span></div>
                            <div class="col-lg-4 col-md-6 col-6 location align-items-center no-gutter-right mb-2"><i class="fa fa-map-marker" aria-hidden="true"></i><span> Address Here</span></div>
                        </div>

                        <div class="view-profile-btn">
                            <a href="{{ url('/tailorDetails',$tailor->vendor_id) }}">VIEW PROFILE</a>
                        </div>
                    </div>
                </div>
            </div>


        @endforeach

        </div>



    </div>
</div>

@endsection
