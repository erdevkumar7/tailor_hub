@extends('front.layouts.layout')

@section('content')

<div id="carouselExampleCaptions" class="carousel cust-slider slide" data-bs-ride="carousel">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="{{ url('/public') }}/front_assets/images/bg-1.png" class="d-block w-100" alt="...">
      <div class="carousel-caption d-md-block">
	  <span>Welcome to OUR COMPANY</span>
        <h1>Create Your Own Style</h1>
		<h4>Sale up to <span style="color:#FF8A00;">40% OFF</span></h4>
        <p>Free shipping on all your order. we deliver, you enjoy</p>
		<a href="#">Get Your Custom Outfit <i class="bi bi-arrow-right"></i></a>
      </div>
    </div>
    <div class="carousel-item">
      <img src="{{ url('/public') }}/front_assets/images/bg-1.png" class="d-block w-100" alt="...">
      <div class="carousel-caption d-md-block">
	  <span>Welcome to OUR COMPANY</span>
        <h1>Create Your Own Style</h1>
		<h4>Sale up to <span style="color:#FF8A00;">40% OFF</span></h4>
        <p>Free shipping on all your order. we deliver, you enjoy</p>
		<a href="#">Get Your Custom Outfit <i class="bi bi-arrow-right"></i></a>
      </div>
    </div>
    <div class="carousel-item">
      <img src="{{ url('/public') }}/front_assets/images/bg-1.png" class="d-block w-100" alt="...">
      <div class="carousel-caption d-md-block">
	  <span>Welcome to OUR COMPANY</span>
        <h1>Create Your Own Style</h1>
		<h4>Sale up to <span style="color:#FF8A00;">40% OFF</span></h4>
        <p>Free shipping on all your order. we deliver, you enjoy</p>
		<a href="#">Get Your Custom Outfit <i class="bi bi-arrow-right"></i></a>
      </div>
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>


<div class="container-xxl py-5 abt-block">
        <div class="container">
            <div class="row g-5 align-items-center">
			<div class="col-lg-1"></div>
                <div class="col-lg-5 lft_abt">
                    <h6 class="text-primary text-uppercase">About Us</h6>
                    <h2 class="mb-4">Who We Are</h2>
                    <p class="mb-4 bold-txt">Ut enim adminim veniam, quis nostru exercitation ullamco lorem ipsum. Excepteur sint occaecat cupidatat.</p>
					<p class="mb-4">Praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia.</p>
					<p class="mb-4">Excepteur sint occaecat cupidatat non proident, suntin culpa qui offic ia deserunt mollit anim id est laborum.</p>

                    <a href="" class="btn btn-primary py-3 px-5">Read More <i class="bi bi-arrow-right"></i></a>
                </div>
				<div class="col-lg-5 pt-4 rgt_abts" style="min-height: 400px;">
                    <div class="position-relative h-100 wow fadeIn" data-wow-delay="0.1s" style="visibility: visible; animation-delay: 0.1s; animation-name: fadeIn;">
                        <img class="position-absolute img-fluid w-100" src="{{ url('/public') }}/front_assets/images/about.jpg" style="object-fit: cover;" alt="">
                    </div>
                </div>
                <div class="col-lg-1"></div>
            </div>
        </div>
    </div>


	<div class="container-fluid services-block bg-dark py-5">
        <div class="container">
		<div class="row">
			<div class="py-5">
                <h2 class="text-white mb-0">Our Services</h2>
				<img class="img-fluid" src="{{ url('/public') }}/front_assets/images/Line.png" alt="">
                <p class="text-white mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua Ut enim ad minim veniam.</p>
            </div>
		</div>
            <div class="row g-4">
                <div class="col-md-6 col-lg-3 wow fadeIn" data-wow-delay="0.1s" style="visibility: visible; animation-delay: 0.1s; animation-name: fadeIn;">
                    <div class="py-5 px-4 serv--boxs">
                        <img class="img-fluid" src="{{ url('/public') }}/front_assets/images/serv1.png" alt="">
                        <div class="serv-cont">
                            <h5 class="mb-3">Custom Clothing Manufacturing</h5>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                            <a class="text-secondary border-bottom" href="">Read More <i class="bi bi-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 wow fadeIn" data-wow-delay="0.1s" style="visibility: visible; animation-delay: 0.1s; animation-name: fadeIn;">
                    <div class="py-5 px-4 serv--boxs">
                        <img class="img-fluid" src="{{ url('/public') }}/front_assets/images/serv4.png" alt="">
                        <div class="serv-cont">
                            <h5 class="mb-3">Bulk Textile or<br>Clothing Production</h5>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.m</p>
                            <a class="text-secondary border-bottom" href="">Read More <i class="bi bi-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 wow fadeIn" data-wow-delay="0.1s" style="visibility: visible; animation-delay: 0.1s; animation-name: fadeIn;">
                    <div class="py-5 px-4 serv--boxs">
                        <img class="img-fluid" src="{{ url('/public') }}/front_assets/images/serv2.png" alt="">
                        <div class="serv-cont">
                            <h5 class="mb-3">Fabric Sourcing<br> and Supply</h5>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                            <a class="text-secondary border-bottom" href="">Read More <i class="bi bi-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 wow fadeIn" data-wow-delay="0.1s" style="visibility: visible; animation-delay: 0.1s; animation-name: fadeIn;">
                    <div class="py-5 px-4 serv--boxs">
                        <img class="img-fluid" src="{{ url('/public') }}/front_assets/images/serv3.png" alt="">
                        <div class="serv-cont">
                            <h5 class="mb-3">Private Label Manufacturing</h5>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                            <a class="text-secondary border-bottom" href="">Read More <i class="bi bi-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
	
	
	<section class="py-5 featured_block overflow-hidden">
      <div class="container">
        <div class="row">
          <div class="col-md-12">

            <div class="section-header d-flex flex-wrap justify-content-between mb-1">
              <h2 class="section-title">Featured Tailors</h2>
			
              <div class="d-flex align-items-center">
                <div class="swiper-buttons">
                  <button class="swiper-prev category-carousel-prev btn btn-yellow">❮</button>
                  <button class="swiper-next category-carousel-next btn btn-yellow">❯</button>
                </div>
              </div>
            </div>
            
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">

            <div class="category-carousel swiper">
              <div class="swiper-wrapper">
                <div  class="nav-link category-item swiper-slide">
                  <img class="w-100" src="{{ url('/public') }}/front_assets/images/tailor1.png" alt="Category Thumbnail">
                  <div class="tailor_info">
					  <h3 class="category-title">Tailor Name Goes Here</h3>
					  <div class="stars"><span class="fa fa-star checked"></span> <span class="fa fa-star checked"></span> <span class="fa fa-star checked"></span> <span class="fa fa-star"></span> <span class="fa fa-star"></span></div>
		          </div>
				  <div class="follow-btn"><a href="#">Follow</a></div>
				  
                </div>
                <div  class="nav-link category-item swiper-slide">
                  <img class="w-100" src="{{ url('/public') }}/front_assets/images/tailor2.png" alt="Category Thumbnail">
                  <div class="tailor_info">
					  <h3 class="category-title">Tailor Name Goes Here</h3>
					  <div class="stars"><span class="fa fa-star checked"></span> <span class="fa fa-star checked"></span> <span class="fa fa-star checked"></span> <span class="fa fa-star"></span> <span class="fa fa-star"></span></div>
		          </div>
				  <div class="follow-btn"><a href="#">Follow</a></div>
				  
                </div>
                <div  class="nav-link category-item swiper-slide">
                  <img class="w-100" src="{{ url('/public') }}/front_assets/images/tailor3.png" alt="Category Thumbnail">
                  <div class="tailor_info">
					  <h3 class="category-title">Tailor Name Goes Here</h3>
					  <div class="stars"><span class="fa fa-star checked"></span> <span class="fa fa-star checked"></span> <span class="fa fa-star checked"></span> <span class="fa fa-star"></span> <span class="fa fa-star"></span></div>
		          </div>
				  <div class="follow-btn"><a href="#">Follow</a></div>
				  
                </div>
                <div  class="nav-link category-item swiper-slide">
                  <img class="w-100" src="{{ url('/public') }}/front_assets/images/tailor4.png" alt="Category Thumbnail">
                  <div class="tailor_info">
					  <h3 class="category-title">Tailor Name Goes Here</h3>
					  <div class="stars"><span class="fa fa-star checked"></span> <span class="fa fa-star checked"></span> <span class="fa fa-star checked"></span> <span class="fa fa-star"></span> <span class="fa fa-star"></span></div>
		          </div>
				  <div class="follow-btn"><a href="#">Follow</a></div>
				  
                </div>
                <div  class="nav-link category-item swiper-slide">
                  <img class="w-100" src="{{ url('/public') }}/front_assets/images/tailor5.png" alt="Category Thumbnail">
                  <div class="tailor_info">
					  <h3 class="category-title">Tailor Name Goes Here</h3>
					  <div class="stars"><span class="fa fa-star checked"></span> <span class="fa fa-star checked"></span> <span class="fa fa-star checked"></span> <span class="fa fa-star"></span> <span class="fa fa-star"></span></div>
		          </div>
				  <div class="follow-btn"><a href="#">Follow</a></div>
				  
                </div>
                <div  class="nav-link category-item swiper-slide">
                  <img class="w-100" src="{{ url('/public') }}/front_assets/images/tailor1.png" alt="Category Thumbnail">
                  <div class="tailor_info">
					  <h3 class="category-title">Tailor Name Goes Here</h3>
					  <div class="stars"><span class="fa fa-star checked"></span> <span class="fa fa-star checked"></span> <span class="fa fa-star checked"></span> <span class="fa fa-star"></span> <span class="fa fa-star"></span></div>
		          </div>
				  <div class="follow-btn"><a href="#">Follow</a></div>
				  
                </div>
                <div  class="nav-link category-item swiper-slide">
                  <img class="w-100" src="{{ url('/public') }}/front_assets/images/tailor2.png" alt="Category Thumbnail">
                  <div class="tailor_info">
					  <h3 class="category-title">Tailor Name Goes Here</h3>
					  <div class="stars"><span class="fa fa-star checked"></span> <span class="fa fa-star checked"></span> <span class="fa fa-star checked"></span> <span class="fa fa-star"></span> <span class="fa fa-star"></span></div>
		          </div>
				  <div class="follow-btn"><a href="#">Follow</a></div>
				  
                </div>
                <div  class="nav-link category-item swiper-slide">
                  <img class="w-100" src="{{ url('/public') }}/front_assets/images/tailor3.png" alt="Category Thumbnail">
                  <div class="tailor_info">
					  <h3 class="category-title">Tailor Name Goes Here</h3>
					  <div class="stars"><span class="fa fa-star checked"></span> <span class="fa fa-star checked"></span> <span class="fa fa-star checked"></span> <span class="fa fa-star"></span> <span class="fa fa-star"></span></div>
		          </div>
				  <div class="follow-btn"><a href="#">Follow</a></div>
				  
                </div>
                <div  class="nav-link category-item swiper-slide">
                  <img class="w-100" src="{{ url('/public') }}/front_assets/images/tailor4.png" alt="Category Thumbnail">
                  <div class="tailor_info">
					  <h3 class="category-title">Tailor Name Goes Here</h3>
					  <div class="stars"><span class="fa fa-star checked"></span> <span class="fa fa-star checked"></span> <span class="fa fa-star checked"></span> <span class="fa fa-star"></span> <span class="fa fa-star"></span></div>
		          </div>
				  <div class="follow-btn"><a href="#">Follow</a></div>
				  
                </div>
                <div  class="nav-link category-item swiper-slide">
                  <img class="w-100" src="{{ url('/public') }}/front_assets/images/tailor5.png" alt="Category Thumbnail">
                  <div class="tailor_info">
					  <h3 class="category-title">Tailor Name Goes Here</h3>
					  <div class="stars"><span class="fa fa-star checked"></span> <span class="fa fa-star checked"></span> <span class="fa fa-star checked"></span> <span class="fa fa-star"></span> <span class="fa fa-star"></span></div>
		          </div>
				  <div class="follow-btn"><a href="#">Follow</a></div>
				  
                </div>
                
                
              </div>
            </div>

          </div>
        </div>
      </div>
    </section>
	
	
	<div class="container-fluid fabrics-block py-5">
        <div class="container">
		<div class="row">
			<div class="py-5">
                <h2 class="text-black mb-0">Featured Fabrics</h2>
				<img class="img-fluid" src="{{ url('/public') }}/front_assets/images/Line.png" alt="">
            </div>
		</div>
            <div class="row g-4 grid-fabric">
                <div class="col-md-6 col-lg-4 wow fadeIn" data-wow-delay="0.1s" style="visibility: visible; animation-delay: 0.1s; animation-name: fadeIn;">
                    <div class="py-5 px-4 fabrics--boxs">
					  <img src="{{ url('/public') }}/front_assets/images/fabrics1.png" alt="Snow" style="width:100%;">
					  <div class="centered">
						<h4>Material Type - Title</h4>
						<p>Offer - <span>15% off</span></p>
						<p>Price - <span>250$</span></p>
						<p class="mb-3">Availability - <span>Available</span></p>
						<a href="#">Buy Now <i class="bi bi-arrow-right"></i></a>
					  </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 wow fadeIn" data-wow-delay="0.1s" style="visibility: visible; animation-delay: 0.1s; animation-name: fadeIn;">
                    <div class="py-5 px-4 fabrics--boxs">
					  <img src="{{ url('/public') }}/front_assets/images/fabrics2.png" alt="Snow" style="width:100%;">
					 <div class="centered">
						<h4>Material Type - Title</h4>
						<p>Offer - <span>15% off</span></p>
						<p>Price - <span>250$</span></p>
						<p class="mb-3">Availability - <span>Available</span></p>
						<a href="#">Buy Now <i class="bi bi-arrow-right"></i></a>
					  </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 wow fadeIn" data-wow-delay="0.1s" style="visibility: visible; animation-delay: 0.1s; animation-name: fadeIn;">
                    <div class="py-5 px-4 fabrics--boxs">
					  <img src="{{ url('/public') }}/front_assets/images/fabrics3.png" alt="Snow" style="width:100%;">
					  <div class="centered">
						<h4>Material Type - Title</h4>
						<p>Offer - <span>15% off</span></p>
						<p>Price - <span>250$</span></p>
						<p class="mb-3">Availability - <span>Available</span></p>
						<a href="#">Buy Now <i class="bi bi-arrow-right"></i></a>
					  </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
	
	
	
	<div class="container-fluid designs-block py-5">
        <div class="container">
		<div class="row">
			<div class="py-5">
                <h2 class="text-black mb-0">Featured Designs</h2>
				<img class="img-fluid" src="{{ url('/public') }}/front_assets/images/Line.png" alt="">
            </div>
		</div>
            <div class="row g-4 grid-designs">
                <div class="col-md-6 col-lg-4 wow fadeIn" data-wow-delay="0.1s" style="visibility: visible; animation-delay: 0.1s; animation-name: fadeIn;">
                    <div class="designs-item">
                        <div class="overflow-hidden">
                            <img class="img-fluid" src="{{ url('/public') }}/front_assets/images/design1.png" alt="">
                        </div>
                        <div class="p-4 border border-2 border-light border-top-0">
                            <h4 class="mb-0">Design Name</h4>
                            <a class="fw-medium" href="">Customize Now<i class="fa fa-arrow-right ms-2"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 wow fadeIn" data-wow-delay="0.1s" style="visibility: visible; animation-delay: 0.1s; animation-name: fadeIn;">
                    <div class="designs-item">
                        <div class="overflow-hidden">
                            <img class="img-fluid" src="{{ url('/public') }}/front_assets/images/design2.png" alt="">
                        </div>
                        <div class="p-4 border border-2 border-light border-top-0">
                            <h4 class="mb-0">Design Name</h4>
                            <a class="fw-medium" href="">Customize Now<i class="fa fa-arrow-right ms-2"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 wow fadeIn" data-wow-delay="0.1s" style="visibility: visible; animation-delay: 0.1s; animation-name: fadeIn;">
                    <div class="designs-item">
                        <div class="overflow-hidden">
                            <img class="img-fluid" src="{{ url('/public') }}/front_assets/images/design3.png" alt="">
                        </div>
                        <div class="p-4 border border-2 border-light border-top-0">
                            <h4 class="mb-0">Design Name</h4>
                            <a class="fw-medium" href="">Customize Now<i class="fa fa-arrow-right ms-2"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
	
	<div class="container-fluid bg-light overflow-hidden my-5 px-lg-0">
        <div class="container about px-lg-0">
            <div class="row g-0 mx-lg-0">
                <div class="col-lg-6 ps-lg-0 abt-min-ht" style="min-height: 400px;">
                    <div class="position-relative abt--img h-100">
                        <img class="position-absolute img-fluid w-100 h-100" src="{{ url('/public') }}/front_assets/images/vip-membership.png" style="object-fit: cover;" alt="">
                    </div>
                </div>
                <div class="col-lg-6 about-text py-5 wow fadeIn" data-wow-delay="0.5s" style="visibility: visible; animation-delay: 0.5s; animation-name: fadeIn;">
                    <div class="mem-infos">
                        <div class="section-title text-start">
							<h4>Exclusive Access</h4>
                            <h2 class="display-5 mb-4">Get VIP Membership</h2>
                        </div>
                        <p class="mb-4 pb-2">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.	</p>
						<ul class="feat--vip">
							<li><i class="bi bi-check-circle"></i> Personalized Tailoring Services</li>
							<li><i class="bi bi-check-circle"></i> Priority Support</li>
							<li><i class="bi bi-check-circle"></i> Exclusive Designs</li>
							<li><i class="bi bi-check-circle"></i> Early access to new fabrics</li>
							<li><i class="bi bi-check-circle"></i> Discounts</li>
							<li><i class="bi bi-check-circle"></i> Personalized Consultations</li>
						</ul>
                        <a href="" class="btn btn-primary py-3 px-5">Join VIP <i class="bi bi-arrow-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
	
	<div class="container-fluid hiw bg-light py-5">
        <div class="container">
		<div class="row">
			<div class="py-5">
                <h2 class="text-black mb-0">How It Works</h2>
				<img class="img-fluid" src="images/Line.png" alt="">
            </div>
		</div>
            <div class="row g-4">
                <div class="col-md-6 col-lg-3 wow fadeIn" data-wow-delay="0.1s" style="visibility: visible; animation-delay: 0.1s; animation-name: fadeIn;">
                    <div class="py-5 px-4 process--boxs">
                        <img class="img-fluid" src="{{ url('/public') }}/front_assets/images/process-1.png" alt="">
                        <div class="serv-cont">
                            <h5 class="mb-3">Browse Tailors and<br> Fabrics</h5>
                            <p>Users can follow their favorite tailors or save fabrics for later</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 wow fadeIn" data-wow-delay="0.1s" style="visibility: visible; animation-delay: 0.1s; animation-name: fadeIn;">
                    <div class="py-5 px-4 process--boxs">
                        <img class="img-fluid" src="{{ url('/public') }}/front_assets/images/process-2.png" alt="">
                        <div class="serv-cont">
                            <h5 class="mb-3">Customize your<br> order</h5>
                            <p>Choose your preferred fabrics and tailor.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 wow fadeIn" data-wow-delay="0.1s" style="visibility: visible; animation-delay: 0.1s; animation-name: fadeIn;">
                    <div class="py-5 px-4 process--boxs">
                        <img class="img-fluid" src="{{ url('/public') }}/front_assets/images/process-3.png" alt="">
                        <div class="serv-cont">
                            <h5 class="mb-3">Place your order and<br> track progress</h5>
                            <p>Receive updates from the tailor as they work on your outfit.</p>
                            
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 wow fadeIn" data-wow-delay="0.1s" style="visibility: visible; animation-delay: 0.1s; animation-name: fadeIn;">
                    <div class="py-5 px-4 process--boxs">
                        <img class="img-fluid" src="{{ url('/public') }}/front_assets/images/process-4.png" alt="">
                        <div class="serv-cont">
                            <h5 class="mb-3">Receive your custom<br> made outfit</h5>
                            <p>Users can also leave a review of the tailor after receiving their product, as it builds customer confidence.</p>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
	
	<div class="container-fluid review-block">
		<div class="container">
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


	<div class="container category">
		<div class="row">
          <div class="col-md-12">

            <div class="section-header mb-1">
              <h2 class="section-title">Popular Categories</h2>
			  <img class="img-fluid" src="{{ url('/public') }}/front_assets/images/Line.png" alt="">
            </div>
            
          </div>
        </div>
		
		<div class="block-cgr">
			<div class="row portfolio-container">
            <div class="col-xl-4 col-lg-6 col-md-6 portfolio-item first">
                <div class="position-relative portfolio-box">
                    <img class="img-fluid w-100" src="{{ url('/public') }}/front_assets/images/category1.png" alt="">
                    <a class="portfolio-title shadow-sm" href="">
                        <p class="h4 text-uppercase">Wedding Dresses</p>
                    </a>
                    <a class="portfolio-btn" href="#" data-lightbox="portfolio">
                        <span href="#">Shop Now</span>
                    </a>
                </div>
            </div>
            <div class="col-xl-4 col-lg-6 col-md-6 portfolio-item second">
                <div class="position-relative portfolio-box">
                    <img class="img-fluid w-100" src="{{ url('/public') }}/front_assets/images/category2.png" alt="">
                    <a class="portfolio-title shadow-sm" href="">
                        <p class="h4 text-uppercase">Traditional Attires</p>
                    </a>
                    <a class="portfolio-btn" href="#" data-lightbox="portfolio">
                        <span href="#">Shop Now</span>
                    </a>
                </div>
            </div>
            <div class="col-xl-4 col-lg-6 col-md-6 portfolio-item first">
                <div class="position-relative portfolio-box">
                    <img class="img-fluid w-100" src="{{ url('/public') }}/front_assets/images/category3.png" alt="">
                    <a class="portfolio-title shadow-sm" href="">
                        <p class="h4 text-uppercase">Men’s Suits</p>
                    </a>
                    <a class="portfolio-btn" href="#" data-lightbox="portfolio">
                        <span href="#">Shop Now</span>
                    </a>
                </div>
            </div>
            <div class="col-xl-4 col-lg-6 col-md-6 portfolio-item second">
                <div class="position-relative portfolio-box">
                    <img class="img-fluid w-100" src="{{ url('/public') }}/front_assets/images/category4.png" alt="">
                    <a class="portfolio-title shadow-sm" href="">
                        <p class="h4 text-uppercase">Ankara</p>
                    </a>
                    <a class="portfolio-btn" href="#" data-lightbox="portfolio">
                        <span href="#">Shop Now</span>
                    </a>
                </div>
            </div>
            <div class="col-xl-4 col-lg-6 col-md-6 portfolio-item first">
                <div class="position-relative portfolio-box">
                    <img class="img-fluid w-100" src="{{ url('/public') }}/front_assets/images/category5.png" alt="">
                    <a class="portfolio-title shadow-sm" href="">
                        <p class="h4 text-uppercase">Lace</p>
                    </a>
                    <a class="portfolio-btn" href="#" data-lightbox="portfolio">
                        <span href="#">Shop Now</span>
                    </a>
                </div>
            </div>
            <div class="col-xl-4 col-lg-6 col-md-6 portfolio-item second">
                <div class="position-relative portfolio-box">
                    <img class="img-fluid w-100" src="{{ url('/public') }}/front_assets/images/category6.png" alt="">
                    <a class="portfolio-title shadow-sm" href="">
                        <p class="h4 text-uppercase">Silk</p>
                    </a>
                    <a class="portfolio-btn" href="#" data-lightbox="portfolio">
                        <span href="#">Shop Now</span>
                    </a>
                </div>
            </div>
        </div>
		</div>
	</div>
	
	<div class="container-fluid  py-0">
        <div class="container newsletter">
            <div class="row g-4">
                <div class="col-md-5 news-left col-lg-5 wow fadeIn" data-wow-delay="0.1s" style="visibility: visible; animation-delay: 0.1s; animation-name: fadeIn;">
                    <div class="news--boxs">
                        
                        <div class="newss-cont">
                            <h6 class="mb-3">NEWSLETTER</h5>
                            <h2>Subscribe Now!</h2>
							<p>Subscribe to get the latest tailor designs and fabric collections delivered to your inbox.</p>
                        </div>
						<form class="d-flex mt-3 gap-0" role="newsletter">
                <input class="form-control rounded-start " type="email" placeholder="your mail address" aria-label="Email Address">
                <button class="btn btn-dark rounded-end " type="submit">Send Message</button>
              </form>
                    </div>
                </div>
                <div class="col-md-7 news-right col-lg-7 wow fadeIn" data-wow-delay="0.1s" style="visibility: visible; animation-delay: 0.1s; animation-name: fadeIn;">
                    <div class="news-image">
                        <img class="img-fluid" src="{{ url('/public') }}/front_assets/images/newsletter-bg.png" alt="">
                        <div class="user-cont">
                            
                        </div>
                    </div>
                </div>   
            </div>
        </div>
    </div>
    


    

    <script>
       var storedLatitude = "{{ session('latitude') }}";
    var storedLongitude = "{{ session('longitude') }}";

    if (!storedLatitude || !storedLongitude) {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(
                function(position) {
                    var latitude = position.coords.latitude;
                    var longitude = position.coords.longitude;

                    // Save location to the server
                    $.ajax({
                        url: "{{ route('store.location') }}", // Define this route in Laravel
                        method: "POST",
                        data: {
                            latitude: latitude,
                            longitude: longitude,
                            _token: "{{ csrf_token() }}"
                        },
                        success: function(response) {
                            console.log("Location saved successfully!");
                        },
                        error: function(error) {
                            console.error("Error saving location:", error);
                        }
                    });
                },
                function(error) {
                    console.error("Error getting location:", error);
                }
            );
        } else {
            console.error("Geolocation is not supported by this browser.");
        }
    } else {
        console.log("Location already stored:", storedLatitude, storedLongitude);
    }
</script>




    @endsection
