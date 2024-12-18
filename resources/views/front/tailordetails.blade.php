@extends('front.layouts.layout')



@section('content')

<div class="banner-tailors">
<div class="container browse-tailors">
  <div class="row browse-content">
    <h1 class="text-white">Tailors Profile</h1>
  </div>
</div>
</div>

<div class="about-tailor-inner">
<div class="container">
<h1 class="about-text-inner">About Tailor</h1>
<p class="deleniti-text">{{$tailor->short_description}}
</p>
<div class="row first-inner-content">
<div class="col-md-6 about-inner-left">
    <img src="{{$tailor->profile_img==''?url('public/front_assets/images/design2.png'):url('public/upload/').'/'.$tailor->profile_img}}">

</div>

<div class="col-md-6 about-inner-right">
    <h3>{{$tailor->name." ".$tailor->last_name}}</h3>
    <h4>{{ $tailor->business_name==''?'Shop name':$tailor->business_name }}</h4>
    <p>{{$tailor->long_description}}</p>

    <div class="about-inner-btn">
                <!-- Button to trigger modal -->
    <button type="button" class="btn btn-primary popup_btn1" data-bs-toggle="modal" data-bs-target="#book-now-popup">
        BOOK NOW
    </button>
                <a href="javascript:void(0);" id='vlike' vid="{{ $tailor->vendor_id }}">{{ $tailor->is_liked ? 'Followed' : 'Follow' }}</a>
                <a href="{{ url('/tailorCatalogue',$tailor->vendor_id) }}">VIEW DESIGNS</a>
    </div>

</div>
	
	<!-- Modal -->
    <div class="modal fade" id="book-now-popup" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content"> 			
                <div class="modal-body">
					<div class="center-txt">
						<h2>Do you want to ?</h2>
							<div class="md-txt">
								<h4><a href="#">Shop Fabrics for Stiching</a></h4>
								<h4>Or</h4>
								<h4><a href="#">Continue to Add Measurements & Add Clothes</a></h4>
							</div>
					</div>
					<div class="center-btn">
						<a href="#">Back to Fabric</a>
					</div>
                </div>
            </div>
        </div>
    </div>

</div>

</div>

</div>


    <div class="container-fluid review-block">
        <div class="container review-block-inner">
            <div class="row">
                  <div class="col-md-12">
                    <div class="section-header mb-1">
                      <h2 class="section-title">Customer Reviews</h2>
                        <img class="img-fluid" src="{{ url('/public') }}/front_assets/images/Line.png" alt="">
                      <div class="d-flex align-items-center">

                      </div>
                    </div>
                    
                  </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div id="testimonial-slider" class="owl-carousel" >
                        <div class="testimonial">
                            <div class="content">
                                <img class="img-fluid" src="{{ url('/public') }}/front_assets/images/vector.png" alt="">
                                <p class="description">
                                    “Aenean et nisl eget eros consectetur vestibulum vel id erat. Aliquam feugiat massa dui. Sed sagittis diam sit amet ante sodales semper. Aliquam commodo lorem laoreet ultricies ele. ”
                                </p>
                            </div>
                            <div class="testimonial-review">
                                <img src="{{ url('/public') }}/front_assets/images/reviw1.png" alt="">
                                <h3 class="testimonial-title">
                                    williamson
                                    
                                </h3>
                                <small>Web Desginer</small>
                            </div>
                        </div>
                        <div class="testimonial">
                            <div class="content">
                            <img class="img-fluid" src="{{ url('/public') }}/front_assets/images/vector.png" alt="">
                                <p class="description">
                                    “Aenean et nisl eget eros consectetur vestibulum vel id erat. Aliquam feugiat massa dui. Sed sagittis diam sit amet ante sodales semper. Aliquam commodo lorem laoreet ultricies ele. ”
                                </p>
                            </div>
                            <div class="testimonial-review">
                                <img src="{{ url('/public') }}/front_assets/images/reviw2.png" alt="">
                                <h3 class="testimonial-title">
                                    kristiana
                                    
                                </h3>
                                <small>Web Desginer</small>
                            </div>
                        </div>
                        <div class="testimonial">
                            <div class="content">
                            <img class="img-fluid" src="{{ url('/public') }}/front_assets/images/vector.png" alt="">
                                <p class="description">
                                    “Aenean et nisl eget eros consectetur vestibulum vel id erat. Aliquam feugiat massa dui. Sed sagittis diam sit amet ante sodales semper. Aliquam commodo lorem laoreet ultricies ele. ”
                                </p>
                            </div>
                            <div class="testimonial-review">
                                <img src="{{ url('/public') }}/front_assets/images/reviw3.png" alt="">
                                <h3 class="testimonial-title">
                                    kristiana
                                    
                                </h3>
                                <small>Web Desginer</small>
                            </div>
                        </div>
                        <div class="testimonial">
                            <div class="content">
                            <img class="img-fluid" src="{{ url('/public') }}/front_assets/images/vector.png" alt="">
                                <p class="description">
                                    “Aenean et nisl eget eros consectetur vestibulum vel id erat. Aliquam feugiat massa dui. Sed sagittis diam sit amet ante sodales semper. Aliquam commodo lorem laoreet ultricies ele. ”
                                </p>
                            </div>
                            <div class="testimonial-review">
                                <img src="{{ url('/public') }}/front_assets/images/reviw1.png" alt="">
                                <h3 class="testimonial-title">
                                    kristiana
                                
                                </h3>
                                <small>Web Desginer</small>
                            </div>
                        </div>
                        <div class="testimonial">
                            <div class="content">
                            <img class="img-fluid" src="{{ url('/public') }}/front_assets/images/vector.png" alt="">
                                <p class="description">
                                    “Aenean et nisl eget eros consectetur vestibulum vel id erat. Aliquam feugiat massa dui. Sed sagittis diam sit amet ante sodales semper. Aliquam commodo lorem laoreet ultricies ele. ”
                                </p>
                            </div>
                            <div class="testimonial-review">
                                <img src="{{ url('/public') }}/front_assets/images/reviw2.png" alt="">
                                <h3 class="testimonial-title">
                                    kristiana
                                    
                                </h3>
                                <small>Web Desginer</small>
                            </div>
                        </div>
                        <div class="testimonial">
                            <div class="content">
                            <img class="img-fluid" src="{{ url('/public') }}/front_assets/images/vector.png" alt="">
                                <p class="description">
                                    “Aenean et nisl eget eros consectetur vestibulum vel id erat. Aliquam feugiat massa dui. Sed sagittis diam sit amet ante sodales semper. Aliquam commodo lorem laoreet ultricies ele. ”
                                </p>
                            </div>
                            <div class="testimonial-review">
                                <img src="{{ url('/public') }}/front_assets/images/reviw3.png" alt="">
                                <h3 class="testimonial-title">
                                    kristiana,
                                    
                                </h3>
                                <small>Web Desginer</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <div class="row text-center btn-submit mt-5">
        <div class="col-sm-12">
        <a href="" class="btn btn-primary py-3 px-5">Submit Reviews <i class="bi bi-arrow-right"></i></a>
        </div>
        </div>
    </div>
</div>

<script>
    $('#vlike').on('click', function () {
        var vendor_id = $(this).attr('vid');

        $.ajax({
            type: "POST",
            dataType: "json",
            url: "<?php echo url('/likeVendor'); ?>",
            data: {
                _token: '{{ csrf_token() }}',
                'vendor_id': vendor_id,
            },
            success: function (data) {
                if (data.success) {
                    if (data.message === 'liked') {
                        // Change link text to "Followed" and set color to red
                        $('#vlike[vid="' + vendor_id + '"]').text('Followed');
                    }
                    if (data.message === 'disliked') {
                        // Change link text to "Follow" and reset color
                        $('#vlike[vid="' + vendor_id + '"]').text('Follow');
                    }
                } else {
                    console.log('Failed to change status');
                }
            },
            error: function (xhr, status, error) {
                console.error('Error:', error);
            }
        });
    });
</script>
   


@endsection
