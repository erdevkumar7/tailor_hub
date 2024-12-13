@extends('front.layouts.layout')

@section('content')


<div class="banner-tailors">
<div class="container browse-tailors">
  <div class="row browse-content">
    <h1 class="text-white">Browse Fabrics</h1>
  </div>
</div>
</div>

<div class="container py-5">

	<div class="row g-4 fabrics-container">
    @foreach($FebricTypes as $key => $value)
		<div class="col-lg-3 col-md-6 fabrics-item">
            <div class="position-relative rounded overflow-hidden">
                <div class="fabrics-image"><img class="img-fluid w-100" src="{{ url('/public') }}/front_assets/images/ankara.jpg" alt=""></div>
                    <div class="fabrics-overlay">
                        <div class="mt-auto title-fab">
                            <a class="h5 d-block text-white mt-1 mb-0 hover-effect" href="{{ url('febricMarchent',$value->febric_type_id) }}">{{$value->febric_type_name}}</a>
                        </div>
                    </div>
            </div>
        </div>
    @endforeach
	</div>
</div>


@endsection