@extends('front.layouts.layout')
@section('content')

<div class="banner-tailors">
<div class="container browse-tailors">
  <div class="row browse-content">
    <h1 class="text-white">Explore Products</h1>
  </div>
</div>
</div>

<div class="container py-5">
	<div class="row g-4 fabrics-container">
    @foreach($exploredProducts as $product)
		<div class="col-lg-3 col-md-6 fabrics-item">
            <div class="position-relative rounded overflow-hidden">
                <div class="fabrics-image">
                    <img class="img-fluid w-100" src="{{asset('/public/Productupload').'/'.$product->product_image}}" alt="">
                </div>
                    <div class="fabrics-overlay">
                        <div class="mt-auto title-fab">
                            <a class="h5 d-block text-white mt-1 mb-0 hover-effect" href="{{route('product.MachentByCategoryId', $product->category->category_id)}}">{{$product->category->category_name }}</a>
                        </div>
                    </div>
            </div>
        </div>
    @endforeach
	</div>
</div>

@endsection