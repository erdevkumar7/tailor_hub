@extends('front.layouts.layout') @section('content')

<div class="banner-tailors">
    <div class="container browse-tailors">
        <div class="row browse-content">
            <h1 class="text-white">Measurement List</h1>
        </div>
    </div>
</div>

<div class="container-fluid page-body-wrapper vendor-dasboard">
    @include('front.user.sidebar')

    <div class="col-md-9 new-measurement-list-show">
        <a href="{{url('mesurment')}}" class="new-create-btn"><span>+</span> Create New Measurement</a>
        <div class="row create-new-measurement">
            @if($measurement->count()>0)
            @foreach($measurement as $value)
            <div class="col-md-6 new-measurement-inner">
                <ul class="messages">
                    <li class="message">
                        <a href="#">
                            <div class="header">
                                <span class="from">{{$value->measurment_title}}</span>
                                <div class="edit-delte-list">
                                    <a href="{{ url('mesurment/'.$value->id)}}"><i class="fas fa-edit"></i></a>
                                    <a href="{{ url('deleteMeasurment/'.$value->id)}}" onclick="return confirm('Are you sure you want to delete this Measurment ?')"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                </div>
                            </div>
                            <div class="title">
                            Full Soulder : {{$value->full_soulder}} cm
                            </div>
                            <div class="title two">
                            Full Sleeves : {{$value->full_sleeves}} cm
                            </div>
                            <a href="{{ url('mesurment/'.$value->id)}}"> More ...</a>
                        </a>
                    </li>
                </ul>
            </div>
            @endforeach
            @endif
        </div>
    </div>
</div>
<!-- Toastr CSS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet" />

<!-- Toastr JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<script>
    $(document).ready(function() {
        @if(Session::has('message'))
            toastr.success("{{ Session::get('message') }}");
        @endif

        @if(Session::has('error'))
            toastr.error("{{ Session::get('error') }}");
        @endif

        @if(Session::has('info'))
            toastr.info("{{ Session::get('info') }}");
        @endif

        @if(Session::has('warning'))
            toastr.warning("{{ Session::get('warning') }}");
        @endif
    });
</script>
@endsection
