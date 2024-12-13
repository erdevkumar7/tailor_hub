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
<p class="deleniti-text">Praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia.
Excepteur sint occaecat cupidatat non proident, suntin culpa qui offic ia deserunt mollit anim id est laborum.
</p>
<div class="row first-inner-content">
<div class="col-md-6 about-inner-left">
    <img src="https://votivelaravel.in/tailor_hub/public/front_assets/images/design2.png">

</div>

<div class="col-md-6 about-inner-right">
    <h3>Alex Antony</h3>
    <h4>owner</h4>
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>

    <div class="about-inner-btn">
                <!-- Button to trigger modal -->
    <button type="button" class="btn btn-primary popup_btn1" data-bs-toggle="modal" data-bs-target="#book-now-popup">
        BOOK NOW
    </button>
                <a href="#">FOLLOW</a>
                <a href="#">VIEW DESIGNS</a>
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
            <div id="testimonial-slider" class="owl-carousel">
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


<!-- <div class="deatail-about">
    <div class="container">
        <h1>About Tailor</h1>
        <div class="row about-tailor">
            <div class="col-md-8 about-tailor-left">
                <img decoding="async" src="{{ url('public/images/tailor-img-two.png') }}" alt="tailor_image" />
            </div>

            <div class="col-md-4 about-tailor-right">
                <p><span>Name</span> : {{ $tailor->name }} {{ $tailor->last_name }}</p>
                <p><span>Shop</span> : {{ $tailor->business_name }}</p>
                <p><span>Experience</span> : 10 Years</p>
                <p><span>Location</span> : {{ $tailor->address }}</p>
            </div>
        </div>

        <div class="about-me">
            <h3>About me</h3>
            <p>Lorem ipsum dolor sit amet consectetur. Ac tortor mattis pharetra blandit commodo pellentesque quam sed arcu. Congue ultricies diam massa felis scelerisque diam dictum. Aliquam enim velit nunc libero sed.</p>

            <div class="about-three-btn">
                <a href="#">BOOK NOW</a>
                <a href="#">FOLLOW</a>
                <a href="#">VIEW DESIGNS</a>
            </div>
        </div>

        <div class="rating-reviews">
            <span><i class="fa fa-star" aria-hidden="true"></i>4.5</span>
            <h2>Rating’s & Reviews</h2>
        </div>


<div class="reviews-detail">
<img src="./images/review.png">
<div class="reviews-inner-detail">
<h3>Smith<span>4 days ago</span></h3>
<p>Lorem ipsum is typically a corrupted version of De finibus bonorum et malorum, a 1st-century BC text by the Roman statesman and philosopher Cicero, with words altered, added, and removed to make it nonsensical and improper Latin. The first two words themselves are a truncation of dolorem ipsum ("pain itself").</p>
</div>
</div>


<div class="reviews-detail">
<img src="./images/review.png">
<div class="reviews-inner-detail">
<h3>Smith<span>4 days ago</span></h3>
<p>Lorem ipsum is typically a corrupted version of De finibus bonorum et malorum, a 1st-century BC text by the Roman statesman and philosopher Cicero, with words altered, added, and removed to make it nonsensical and improper Latin. The first two words themselves are a truncation of dolorem ipsum ("pain itself").</p>
</div>
</div>



    </div>
</div> -->



@endsection
