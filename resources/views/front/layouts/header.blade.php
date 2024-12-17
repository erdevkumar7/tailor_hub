<div class="preloader-wrapper">
    <div class="preloader">
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
                <input class="form-control rounded-start rounded-0 bg-light" type="email"
                    placeholder="search by tailor specialty, fabric type, etc."
                    aria-label="search by tailor specialty, fabric type, etc.">
                <button class="btn btn-dark rounded-end rounded-0" type="submit">Search</button>
            </form>
        </div>
    </div>
</div>

<header>
    <div class="topbar-top">
        <div class="container topbar bg-light">
            <div class="row gx-0 d-none d-lg-flex">
                <div class="col-lg-7 text-start">
                    <div class="h-100 d-inline-flex align-items-center py-0 me-4">
                        <small class="fa fa-map-marker-alt text-primary me-2"></small>
                        <small>Address will goes here</small>
                    </div>
                </div>
                @if (Auth::guard('user')->check() || Auth::guard('vendor')->check())
                    <div class="col-lg-5 text-end">
                        <div class="h-100 btns-set d-inline-flex align-items-center py-0 me-1">
                            <a href="{{ url('/logout') }}">Logout <i class="bi bi-box-arrow-right"></i></a>
                        </div>

                    </div>
                @else
                    <div class="col-lg-5 text-end">
                        <div class="h-100 btns-set d-inline-flex align-items-center py-0 me-1">
                            <a href="{{ url('/register') }}">Sign Up <i class="bi bi-arrow-right"></i></a>
                        </div>
                        <div class="h-100 btns-set d-inline-flex align-items-center">
                            <a href="{{ url('/login') }}">Login <i class="bi bi-arrow-right"></i></a>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
    <div class="center-row-top">
        <div class="container center-row">
            <div class="row py-3 border-bottom">

                <div class="col-sm-4 col-lg-3 text-center mob--left text-sm-start">
                    <div class="main-logo">
                        <a href="{{ url('/') }}">
                            <img src="{{ url('/public') }}/front_assets/images/logo-new.png" alt="logo"
                                class="img-fluid">
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

                <div
                    class="col-sm-8 col-lg-3 d-flex justify-content-end mob-right gap-5 align-items-center mt-4 mt-sm-0 justify-content-center justify-content-sm-end">

                    <nav class="main-menu d-flex navbar navbar-expand-lg">

                        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas"
                            data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
                            <span class="navbar-toggler-icon"></span>
                        </button>

                        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar"
                            aria-labelledby="offcanvasNavbarLabel">

                            <div class="offcanvas-header justify-content-end">
                                <button type="button" class="btn-close" data-bs-dismiss="offcanvas"
                                    aria-label="Close"></button>
                            </div>

                            <div class="offcanvas-body">

                                <ul
                                    class="navbar-nav justify-content-end desk-hide menu-list list-unstyled d-flex gap-md-3 mb-0">
                                    <li class="nav-item active">
                                        <a href="{{ url('/') }}" class="nav-link">Home </a>
                                    </li>
                                    <li class="nav-item dropdown">
                                        <a href="{{ url('/AllTailors') }}" class="nav-link">Browse Tailors </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('browseFebrics') }}" class="nav-link">Browse Fabrics </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#" class="nav-link">Explore Designs </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{route('exploreProducts')}}" class="nav-link">Explore Products </a>
                                    </li>
                                </ul>

                                <ul class="d-flex list-unstyled m-2">

                                    @if (Auth::guard('user')->check())
                                        <li><a href="#"><i class="bi bi-bell"></i></a></li>
                                        <li class="cart"><a href="#"><i class="bi bi-bag"></i>
                                                <span>6</span></a></li>
                                    @endif
                                    <li class="d-lg-none">
                                        <a href="#" class="" data-bs-toggle="offcanvas"
                                            data-bs-target="#offcanvasSearch" aria-controls="offcanvasSearch">
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
    </div>
    <div class="btm-row-top">
        <div class="container btm-row">
            <div class="row">
                <div class="d-flex  justify-content-center justify-content-sm-between align-items-center">
                    <nav class="main-menu d-flex navbar navbar-expand-lg">

                        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas"
                            data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
                            <span class="navbar-toggler-icon"></span>
                        </button>

                        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar"
                            aria-labelledby="offcanvasNavbarLabel">

                            <div class="offcanvas-header justify-content-end">
                                <button type="button" class="btn-close" data-bs-dismiss="offcanvas"
                                    aria-label="Close"></button>
                            </div>

                            <div class="offcanvas-body">

                                <ul
                                    class="navbar-nav justify-content-end  menu-list list-unstyled d-flex gap-md-3 mb-0">
                                    <li class="nav-item active">
                                        <a href="{{ url('/') }}" class="nav-link">Home </a>
                                    </li>

                                    @if (Auth::guard('user')->check())
                                        <li class="nav-item">
                                            <a href="{{ url('customerDashboard') }}" class="nav-link">Dashboard </a>
                                        </li>
                                        <li class="nav-item dropdown">
                                            <a href="{{ url('/AllTailors') }}" class="nav-link">Browse Tailors </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{ route('browseFebrics') }}" class="nav-link">Browse Fabrics
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#" class="nav-link">Explore Designs </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{route('exploreProducts')}}" class="nav-link">Explore Products </a>
                                        </li>
                                    @elseif(Auth::guard('vendor')->check())
                                        <li class="nav-item">
                                            <a href="{{ url('vendorsDasboard') }}" class="nav-link">Dashboard </a>
                                        </li>
                                    @else
                                        <li class="nav-item dropdown">
                                            <a href="{{ url('/AllTailors') }}" class="nav-link">Browse Tailors </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{ route('browseFebrics') }}" class="nav-link">Browse Fabrics
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#" class="nav-link">Explore Designs </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{route('exploreProducts')}}" class="nav-link">Explore Products </a>
                                        </li>
                                    @endif

                                </ul>

                                <ul class="d-flex d--none list-unstyled mt-0">
                                    <li><a href="#"><i class="bi bi-bell"></i></a></li>
                                    <li class="cart"><a href="#"><i class="bi bi-bag"></i> <span>4</span></a>
                                    </li>
                                    <li class="d-lg-none">
                                        <a href="#" class="" data-bs-toggle="offcanvas"
                                            data-bs-target="#offcanvasSearch" aria-controls="offcanvasSearch">
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
    </div>
</header>
