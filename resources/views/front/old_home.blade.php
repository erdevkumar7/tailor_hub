<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Tailor</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="format-detection" content="telephone=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="author" content="">
    <meta name="keywords" content="">
    <meta name="description" content="">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
	<link href="{{ url('/public') }}/front_assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="{{ url('/public') }}/front_assets/css/vendor.css">
    <link rel="stylesheet" type="text/css" href="{{ url('/public') }}/front_assets/style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.theme.min.css">
	
    <link rel="stylesheet" href="{{ url('/public') }}/front_assets/css/elegant-icons.css" type="text/css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;700&family=Open+Sans:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">

  </head>
  <body>

    <div class="preloader-wrapper">
      <div class="preloader">
      </div>
    </div>

    <div class="offcanvas offcanvas-end" data-bs-scroll="true" tabindex="-1" id="offcanvasCart" aria-labelledby="My Cart">
      <div class="offcanvas-header justify-content-center">
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body">
        <div class="order-md-last">
          <h4 class="d-flex justify-content-between align-items-center mb-3">
            <span class="text-primary">Your cart</span>
            <span class="badge bg-primary rounded-pill">3</span>
          </h4>
          <ul class="list-group mb-3">
            <li class="list-group-item d-flex justify-content-between lh-sm">
              <div>
                <h6 class="my-0">Growers cider</h6>
                <small class="text-body-secondary">Brief description</small>
              </div>
              <span class="text-body-secondary">$12</span>
            </li>
            <li class="list-group-item d-flex justify-content-between lh-sm">
              <div>
                <h6 class="my-0">Fresh grapes</h6>
                <small class="text-body-secondary">Brief description</small>
              </div>
              <span class="text-body-secondary">$8</span>
            </li>
            <li class="list-group-item d-flex justify-content-between lh-sm">
              <div>
                <h6 class="my-0">Heinz tomato ketchup</h6>
                <small class="text-body-secondary">Brief description</small>
              </div>
              <span class="text-body-secondary">$5</span>
            </li>
            <li class="list-group-item d-flex justify-content-between">
              <span>Total (USD)</span>
              <strong>$20</strong>
            </li>
          </ul>
  
          <button class="w-100 btn btn-primary btn-lg" type="submit">Continue to checkout</button>
        </div>
      </div>
    </div>
    
    <div class="offcanvas offcanvas-end" data-bs-scroll="true" tabindex="-1" id="offcanvasSearch" aria-labelledby="Search">
      <div class="offcanvas-header justify-content-end">
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body">
        <div class="order-md-last">
          <h4 class="d-flex justify-content-between align-items-center mb-3">
            <span class="text-primary">Search</span>
          </h4>
          <form role="search" action="index.html" method="get" class="navform d-flex mt-3 gap-0">
            <input class="form-control rounded-start rounded-0 bg-light" type="email" placeholder="search by tailor specialty, fabric type, etc." aria-label="search by tailor specialty, fabric type, etc.">
            <button class="btn btn-dark rounded-end rounded-0" type="submit">Search</button>
          </form>
        </div>
      </div>
    </div>

    <header>
	
	<div class="container-fluid topbar bg-light p-0">
        <div class="row gx-0 d-none d-lg-flex">
            <div class="col-lg-7 px-5 text-start">
                <div class="h-100 d-inline-flex align-items-center py-0 me-4">
                    <small class="fa fa-map-marker-alt text-primary me-2"></small>
                    <small>Address will goes here</small>
                </div>
            </div>
            <div class="col-lg-5 px-5 text-end">
                <div class="h-100 btns-set d-inline-flex align-items-center py-0 me-1">
                    <a href="#">Sign Up <i class="bi bi-arrow-right"></i></a>
                </div>
                <div class="h-100 btns-set d-inline-flex align-items-center">
                    <a href="#">Login <i class="bi bi-arrow-right"></i></a>
                </div>
            </div>
        </div>
    </div>
      <div class="container-fluid center-row">
        <div class="row py-3 border-bottom">
          
          <div class="col-sm-4 col-lg-3 text-center mob--left text-sm-start">
            <div class="main-logo">
              <a href="{{ url('/') }}">
                <img src="{{ url('/public') }}/front_assets/images/logo-new.png" alt="logo" class="img-fluid">
              </a>
            </div>
          </div>
          
          <div class="col-sm-6 offset-sm-2 offset-md-0 col-lg-6 d-none searchbar d-lg-block">
            <div class="hero__search__form">
                            <form action="#">
                                
                                <input type="text" placeholder="search by tailor specialty, fabric type, etc.">
                                <button type="submit" class="site-btn">Search</button>
                            </form>
                        </div>
          </div>
          
          <div class="col-sm-8 col-lg-3 d-flex justify-content-end mob-right gap-5 align-items-center mt-4 mt-sm-0 justify-content-center justify-content-sm-end">

            <nav class="main-menu d-flex navbar navbar-expand-lg">

              <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
                <span class="navbar-toggler-icon"></span>
              </button>

              <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">

                <div class="offcanvas-header justify-content-end">
                  <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>

                <div class="offcanvas-body">      
              
                  <ul class="navbar-nav justify-content-end desk-hide menu-list list-unstyled d-flex gap-md-3 mb-0">
                    <li class="nav-item active">
                      <a href="#" class="nav-link">Home <i class="bi bi-chevron-down"></i></a>
                    </li>
                    <li class="nav-item dropdown">
                      <a href="#" class="nav-link">Browse Tailors <i class="bi bi-chevron-down"></i></a>
                    </li>
                    <li class="nav-item">
                      <a href="#" class="nav-link">Browse Fabrics <i class="bi bi-chevron-down"></i></a>
                    </li>
                    <li class="nav-item">
                      <a href="#" class="nav-link">Explore Designs <i class="bi bi-chevron-down"></i></a>
                    </li>
                    <li class="nav-item">
                      <a href="#" class="nav-link">Explore Fabrics <i class="bi bi-chevron-down"></i></a>
                    </li>
                  </ul>
				  
				  <ul class="d-flex list-unstyled m-2">
					<li><a href="#"><i class="bi bi-bell"></i></a></li>
                    <li class="cart"><a href="#"><i class="bi bi-bag"></i> <span>3</span></a></li>
					  <li class="d-lg-none">
						<a href="#" class="" data-bs-toggle="offcanvas" data-bs-target="#offcanvasSearch" aria-controls="offcanvasSearch">
						  <i class="bi bi-search"></i>
						</a>
					  </li>
					</ul>
                
                </div>
				
				

              </div>
			  </nav>

          </div>

        </div>
      </div>
      <div class="container-fluid btm-row">
        <div class="row">
          <div class="d-flex  justify-content-center justify-content-sm-between align-items-center">
            <nav class="main-menu d-flex navbar navbar-expand-lg">

              <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar"
                aria-controls="offcanvasNavbar">
                <span class="navbar-toggler-icon"></span>
              </button>

              <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">

                <div class="offcanvas-header justify-content-end">
                  <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>

                <div class="offcanvas-body">      
              
                  <ul class="navbar-nav justify-content-end  menu-list list-unstyled d-flex gap-md-3 mb-0">
                    <li class="nav-item active">
                      <a href="#" class="nav-link">Home <i class="bi bi-chevron-down"></i></a>
                    </li>
                    <li class="nav-item dropdown">
                      <a href="#" class="nav-link">Browse Tailors <i class="bi bi-chevron-down"></i></a>
                    </li>
                    <li class="nav-item">
                      <a href="#" class="nav-link">Browse Fabrics <i class="bi bi-chevron-down"></i></a>
                    </li>
                    <li class="nav-item">
                      <a href="#" class="nav-link">Explore Designs <i class="bi bi-chevron-down"></i></a>
                    </li>
                    <li class="nav-item">
                      <a href="#" class="nav-link">Explore Fabrics <i class="bi bi-chevron-down"></i></a>
                    </li>
                  </ul>
				  
				  <ul class="d-flex d--none list-unstyled mt-0">
					<li><a href="#"><i class="bi bi-bell"></i></a></li>
                    <li class="cart"><a href="#"><i class="bi bi-bag"></i> <span>3</span></a></li>
					  <li class="d-lg-none">
						<a href="#" class="" data-bs-toggle="offcanvas" data-bs-target="#offcanvasSearch" aria-controls="offcanvasSearch">
						  <i class="bi bi-search"></i>
						</a>
					  </li>
					</ul>
                
                </div>
				
				

              </div>
			  </nav>
			  
			  <div class="info-head">
				<div class="h-100 d-inline-flex align-items-center py-0">
                    <small><i class="bi bi-telephone"></i> (012) 345-6789</small>
                </div>
			  </div>
          </div>
        </div>
      </div>
    </header>
    
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

    <footer class="py-5">
      <div class="container-fluid">
	   <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6 col-sm-6 footer--set">
            <div class="footer-menu">
			<div class="f-col1">
              <h4>Customer Support</h4>
			  <p>Morbi cursus porttitor enim lobortis molestie. Duis gravida turpis dui, eget bibendum magna congue nec.</p>
			  <p class="no_email_footer"><span>0 1 2 3 4 5 6 7 8</span> or <span>mail@info.com</span></p>
			  </div>
              
            </div>
          </div>

          <div class="col-md-2 col-sm-6 footer--set">
            <div class="footer-menu">
              <h4 class="widget-title">My Account</h4>
              <ul class="menu-list list-unstyled">
                <li class="menu-item">
                  <a href="#" class="nav-link">My Account</a>
                </li>
                <li class="menu-item">
                  <a href="#" class="nav-link">Order History </a>
                </li>
                <li class="menu-item">
                  <a href="#" class="nav-link">Wishlist</a>
                </li>
                <li class="menu-item">
                  <a href="#" class="nav-link">Settings</a>
                </li>
              </ul>
            </div>
          </div>
          <div class="col-md-2 col-sm-6 footer--set">
            <div class="footer-menu">
              <h4 class="widget-title">Quick Links</h4>
              <ul class="menu-list list-unstyled">
                <li class="menu-item">
                  <a href="#" class="nav-link">Home</a>
                </li>
                <li class="menu-item">
                  <a href="#" class="nav-link">Browse Tailors</a>
                </li>
                <li class="menu-item">
                  <a href="#" class="nav-link">Browse Fabrics</a>
                </li>
                <li class="menu-item">
                  <a href="#" class="nav-link">Explore Designs</a>
                </li>
              </ul>
            </div>
          </div>
          <div class="col-md-2 col-sm-6 footer--set">
            <div class="footer-menu">
              <h4 class="widget-title">Other Links</h4>
              <ul class="menu-list list-unstyled">
                <li class="menu-item">
                  <a href="#" class="nav-link">About Us</a>
                </li>
                <li class="menu-item">
                  <a href="#" class="nav-link">Contact Us</a>
                </li>
                <li class="menu-item">
                  <a href="#" class="nav-link">FAQ’s</a>
                </li>
                <li class="menu-item">
                  <a href="#" class="nav-link">Terms & Condition</a>
                </li>
              </ul>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 col-sm-6 footer--set">
            <div class="footer-menu">
              <h4 class="widget-title">Download Our Mobile App</h4>
				<img class="img-fluid " src="{{ url('/public') }}/front_assets/images/download-app.png" alt="">
            </div>
          </div>
          
        </div>
		</div>
      </div>
    </footer>
    <div id="footer-bottom">
      <div class="container-fluid">
	  <div class="container">
        <div class="row">
          <div class="col-md-4 copyright">
            <div class="social-links">
                <ul class="d-flex list-unstyled gap-2">
                  <li>
                    <a href="#" class="btn btn-outline-light">
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"><path fill="currentColor" d="M15.12 5.32H17V2.14A26.11 26.11 0 0 0 14.26 2c-2.72 0-4.58 1.66-4.58 4.7v2.62H6.61v3.56h3.07V22h3.68v-9.12h3.06l.46-3.56h-3.52V7.05c0-1.05.28-1.73 1.76-1.73Z"/></svg>
                    </a>
                  </li>
                  <li>
                    <a href="#" class="btn btn-outline-light">
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"><path fill="currentColor" d="M22.991 3.95a1 1 0 0 0-1.51-.86a7.48 7.48 0 0 1-1.874.794a5.152 5.152 0 0 0-3.374-1.242a5.232 5.232 0 0 0-5.223 5.063a11.032 11.032 0 0 1-6.814-3.924a1.012 1.012 0 0 0-.857-.365a.999.999 0 0 0-.785.5a5.276 5.276 0 0 0-.242 4.769l-.002.001a1.041 1.041 0 0 0-.496.89a3.042 3.042 0 0 0 .027.439a5.185 5.185 0 0 0 1.568 3.312a.998.998 0 0 0-.066.77a5.204 5.204 0 0 0 2.362 2.922a7.465 7.465 0 0 1-3.59.448A1 1 0 0 0 1.45 19.3a12.942 12.942 0 0 0 7.01 2.061a12.788 12.788 0 0 0 12.465-9.363a12.822 12.822 0 0 0 .535-3.646l-.001-.2a5.77 5.77 0 0 0 1.532-4.202Zm-3.306 3.212a.995.995 0 0 0-.234.702c.01.165.009.331.009.488a10.824 10.824 0 0 1-.454 3.08a10.685 10.685 0 0 1-10.546 7.93a10.938 10.938 0 0 1-2.55-.301a9.48 9.48 0 0 0 2.942-1.564a1 1 0 0 0-.602-1.786a3.208 3.208 0 0 1-2.214-.935q.224-.042.445-.105a1 1 0 0 0-.08-1.943a3.198 3.198 0 0 1-2.25-1.726a5.3 5.3 0 0 0 .545.046a1.02 1.02 0 0 0 .984-.696a1 1 0 0 0-.4-1.137a3.196 3.196 0 0 1-1.425-2.673c0-.066.002-.133.006-.198a13.014 13.014 0 0 0 8.21 3.48a1.02 1.02 0 0 0 .817-.36a1 1 0 0 0 .206-.867a3.157 3.157 0 0 1-.087-.729a3.23 3.23 0 0 1 3.226-3.226a3.184 3.184 0 0 1 2.345 1.02a.993.993 0 0 0 .921.298a9.27 9.27 0 0 0 1.212-.322a6.681 6.681 0 0 1-1.026 1.524Z"/></svg>
                    </a>
                  </li>                 
                  <li>
                    <a href="#" class="btn btn-outline-light">
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"><path fill="currentColor" d="M17.34 5.46a1.2 1.2 0 1 0 1.2 1.2a1.2 1.2 0 0 0-1.2-1.2Zm4.6 2.42a7.59 7.59 0 0 0-.46-2.43a4.94 4.94 0 0 0-1.16-1.77a4.7 4.7 0 0 0-1.77-1.15a7.3 7.3 0 0 0-2.43-.47C15.06 2 14.72 2 12 2s-3.06 0-4.12.06a7.3 7.3 0 0 0-2.43.47a4.78 4.78 0 0 0-1.77 1.15a4.7 4.7 0 0 0-1.15 1.77a7.3 7.3 0 0 0-.47 2.43C2 8.94 2 9.28 2 12s0 3.06.06 4.12a7.3 7.3 0 0 0 .47 2.43a4.7 4.7 0 0 0 1.15 1.77a4.78 4.78 0 0 0 1.77 1.15a7.3 7.3 0 0 0 2.43.47C8.94 22 9.28 22 12 22s3.06 0 4.12-.06a7.3 7.3 0 0 0 2.43-.47a4.7 4.7 0 0 0 1.77-1.15a4.85 4.85 0 0 0 1.16-1.77a7.59 7.59 0 0 0 .46-2.43c0-1.06.06-1.4.06-4.12s0-3.06-.06-4.12ZM20.14 16a5.61 5.61 0 0 1-.34 1.86a3.06 3.06 0 0 1-.75 1.15a3.19 3.19 0 0 1-1.15.75a5.61 5.61 0 0 1-1.86.34c-1 .05-1.37.06-4 .06s-3 0-4-.06a5.73 5.73 0 0 1-1.94-.3a3.27 3.27 0 0 1-1.1-.75a3 3 0 0 1-.74-1.15a5.54 5.54 0 0 1-.4-1.9c0-1-.06-1.37-.06-4s0-3 .06-4a5.54 5.54 0 0 1 .35-1.9A3 3 0 0 1 5 5a3.14 3.14 0 0 1 1.1-.8A5.73 5.73 0 0 1 8 3.86c1 0 1.37-.06 4-.06s3 0 4 .06a5.61 5.61 0 0 1 1.86.34a3.06 3.06 0 0 1 1.19.8a3.06 3.06 0 0 1 .75 1.1a5.61 5.61 0 0 1 .34 1.9c.05 1 .06 1.37.06 4s-.01 3-.06 4ZM12 6.87A5.13 5.13 0 1 0 17.14 12A5.12 5.12 0 0 0 12 6.87Zm0 8.46A3.33 3.33 0 1 1 15.33 12A3.33 3.33 0 0 1 12 15.33Z"/></svg>
                    </a>
                  </li>
                </ul>
              </div>
          </div>
		  <div class="col-md-4 copyright">
            <p>© 2024. All Rights Reserved</p>
          </div>
          <div class="col-md-4 credit-link text-start text-md-end">
            <img class="img-fluid " src="{{ url('/public') }}/front_assets/images/payment.png" alt="">
          </div>
        </div>
      </div>
	  </div>
    </div>
    <script src="{{ url('/public') }}/front_assets/js/jquery-1.11.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
	<script type="text/javascript" src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.js"></script>
	
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <script src="{{ url('/public') }}/front_assets/js/plugins.js"></script>
    <script src="{{ url('/public') }}/front_assets/js/script.js"></script>
	
	<script>
		$(document).ready(function(){
    $("#testimonial-slider").owlCarousel({
        items:3,
        itemsDesktop:[1000,1],
        itemsDesktopSmall:[979,1],
        itemsTablet:[768,1],
        pagination:false,
        navigation:true,
        navigationText:["",""],
        rewindNav : false,
        autoPlay:true
    });
});
	</script>
  </body>
</html>