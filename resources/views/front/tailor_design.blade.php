@extends('front.layouts.layout')

@section('content')


<div class="banner-tailors">
    <div class="container browse-tailors">
        <div class="row browse-content">
            <h1 class="text-white">{{$categoryType->category_name}}</h1>
        </div>
    </div>
</div>

<div class="shop-area mt-5 mb-5">
    <div class="container">
        <div class="row flex-row-reverse">
            <div class="col-lg-9">
                <div class="shop-page-wrap">
                    <div class="shop-top-bar">
                        <!--div-- class="shop-sorting-area">
                                    <select class="nice-select nice-select-style-2">
                                        <option>Default Sorting</option>
                                        <option>Sort by popularity</option>
                                        <option>Sort by average rating</option>
                                        <option>Sort by latest</option>
                                    </select>
                                </!--div-->
                    </div>
                    <div class="padding-54-row-col">
                        <div class="row">
                            @if ($vendors->count() > 0)
                            @foreach($vendors as $value)
                            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12 mb-5">
                                <div class="product-wrap">
                                    <div class="product-img img-zoom">

                                        @php
                                        $catalogue_image = DB::table('catalogue_images')
                                        ->where('catalogue_id', $value->id)
                                        ->value('catalogue_image');
                                        @endphp
                                        <a href="{{url('/catalogueDetail ,$value->id')}}">
                                            @if ($catalogue_image)
                                            <img class="img-fluid w-100" src="{{ asset('public/upload/catalogue/' . $catalogue_image) }}" alt="Catelogue Image">
                                            @else
                                            <img class="img-fluid w-100" src="{{ asset('public/default-image.jpg') }}" alt="Default Image">
                                            @endif

                                        </a>
                                        <div class="product-action-wrap">
                                            <a href="{{url('/catalogueDetail',$value->id)}}"><button title="View" class="viewatc">VIEW</button></a>
                                            <button title="Add To Cart" class="addcart">ADD TO CART</button>
                                        </div>
                                    </div>
                                    <div class="product-content text-center">
                                        <h3><a href="{{url('/catalogueDetail',$value->id)}}">{{@$value->vendor->name}}</a></h3>
                                        <div class="product-price">
                                            <span>{{$value->start_price}}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            @else
                            No Design selected for Stiching
                            @endif

                        </div>
                    </div>
                    <div class="pagination-style text-center mt-30">
                        {{ $vendors->links('pagination::bootstrap-4') }}
                        <!--ul>
                                    <li><a class="active" href="#">01</a></li>
                                    <li><a href="#">02</a></li>
                                    <li><a href="#">03</a></li>
                                    <li><a href="#">04</a></li>
                                    <li><a href="#">05</a></li>
                                </ul-->
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="sidebar-wrapper sidebar-wrapper-mr">
                    <div class="sidebar-widget mb-5">
                        <h3 class="sidebar-widget-title">Filter By Type</h3>
                        <div class="shop-category">
                            <ul>
                                @foreach($CategoryTypes as $types)
                                <li><a href="{{ url('tailor_design',$types->category_id) }}">{{$types->category_name }}</a></li>
                                @endforeach

                            </ul>
                        </div>
                    </div>
                    <div class="sidebar-widget mb-5">
                        <h3 class="sidebar-widget-title">Filter By Prices</h3>
                        <div class="price-filter">
                            <div id="slider-range"></div>
                            <div class="price-slider-amount">
                                <button type="button">Filter</button>
                                <div class="label-input">
                                    <span>Price: </span>
                                    <input type="text" id="amount" name="price" placeholder="Add Your Price" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="sidebar-widget mb-5">
                        <h3 class="sidebar-widget-title">Filter By Size</h3>
                        <div class="sidebar-widget-size">
                            <ul>
                                <li><a href="#">L</a></li>
                                <li><a href="#">M</a></li>
                                <li><a href="#">S</a></li>
                                <li><a href="#">XL</a></li>
                                <li><a href="#">XXL</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="sidebar-widget mb-5">
                        <h3 class="sidebar-widget-title">Filter By Color</h3>
                        <div class="sidebar-widget-color">
                            <ul>
                                <li><a title="White" class="white" href="#">white</a></li>
                                <li><a title="Pink" class="pink" href="#">pink</a></li>
                                <li><a title="Yellow" class="yellow" href="#">yellow</a></li>
                                <li><a title="Black" class="black" href="#">black</a></li>
                                <li><a title="Blue" class="blue" href="#">blue</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection