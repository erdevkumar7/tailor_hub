@extends('front.layouts.layout')

@section('content')
<style>
    .pagination .flex.justify-between.flex-1.sm\:hidden {
    display: flex;
    justify-content: space-between;
}

.pagination p.text-sm.text-gray-700.leading-5 {
    text-align: center;
}

.pagination svg.w-5.h-5 {
    width: 50px;
}

.pagination {
    display: flex;
    justify-content: center;
}

</style>

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
                            <i class="fa fa-heart vlike" aria-hidden="true" vid="{{ $tailor->vendor_id }}" style="color: {{ $tailor->is_liked ? 'red' : 'gray' }};"></i>
                        </div>
                        <div class="listing-title">
                            <a href="#" class="">{{ $tailor->name }} {{ $tailor->last_name }} </a>
                        </div>
                        <div class="location-date-wrapper">
                            <p><b> Specialties</b> - {{ $tailor->specialities }}</p>
                        </div>
                        <div class="row location-date-wrapper mt-2">
                            <div class="col-lg-4 col-md-6 col-6 location align-items-center no-gutter-right mb-2"><i class="fas fa-tshirt"></i><span>{{ $tailor->business_name==''?'Shop name':$tailor->business_name }}</span></div>
                            <div class="col-lg-4 col-md-6 col-6 location align-items-center no-gutter-right mb-2"><i class="fa fa-map-marker" aria-hidden="true"></i><span> {{ $tailor->address==''?'Address':$tailor->address }}</span></div>
                        </div>

                        <div class="view-profile-btn">
                            <a href="{{ url('/tailorDetails',$tailor->vendor_id) }}">VIEW PROFILE</a>
                        </div>
                    </div>
                </div>
            </div>


        @endforeach

        </div>
<div class="pagination">
    {{ $tailors->links() }}
</div>


    </div>
</div>
<script>
    $('.vlike').on("click", function() {
        var vendor_id = $(this).attr('vid');
        
      $.ajax({
            type: "POST",
            dataType: "json",
            url: "<?php echo url('/likeVendor'); ?>",
            data: {
                _token: '{{ csrf_token() }}',
                'vendor_id': vendor_id,
            },
            success: function(data) {
                if (data.success) {
                    if(data.message=='liked')
                    {
                        $('.vlike[vid="' + vendor_id + '"]').css('color', 'red');
                    }
                    if(data.message=='disliked')
                    {
                        $('.vlike[vid="' + vendor_id + '"]').css('color', '');
                    }
                    
                } else {
                    
                    console.log('Failed to change status');
                }
            },
        });
    });
</script>
@endsection
