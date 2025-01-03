@extends('front.layouts.layout') @section('content')


<!-- Bootstrap Toggle CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">

<div class="banner-tailors">
    <div class="container browse-tailors">
        <div class="row browse-content">
            <h1 class="text-white">Shipping Add</h1>
        </div>
    </div>
</div>

  <div class="container-fluid page-body-wrapper vendor-dasboard customer-dash">
  @include('front.user.sidebar')

    <div class="col-md-9">
      <div class="row shipping-address-user">    
      <a href="{{url('addShipping')}}" class="add-new-address"><span>+</span>ADD NEW ADDRESSss</a>
      <div class="default-address">
          
          @foreach ($address as $list)
            <div class="name-here-add">
              <div class="name-inner">
                <div class="will-gose-inner">
                    <h5>{{$list->address_name}}</h5>
                    <span>{{$list->address_line_1}}</span>
                    <span>{{$list->address_line_2}}</span>
                    <span>Landmark : {{$list->landmark}}</span>
                    <span>{{$list->country_name}}</span>
                    <span>{{$list->state_name}}</span>
                    <span>{{$list->city_name}}</span>
                    <span>{{$list->postal_code}}</span>
                </div>
                <div class="action-buttons">
                  
                  @if($list->is_primary==0)
                  <span class="set-btn-inner setDefault btn btn-outline-success" addr_id={{$list->id}}>{{$list->is_primary==1?'':'SET DEFAULT'}}</span>
                  @endif
                  <div class="fa-icons-btn">
                  <a href="{{ route('addShipping',$list->id)}}">
                    <span class="edit-btn" title="Edit">
                      <i class="fas fa-edit"></i> <!-- Edit Icon -->
                    </span>
                  </a>
                  <a href="{{ route('deleteAddress',$list->id)}}" onclick="return confirm('Are you sure you want to delete this Address?')">
                    <span class="delete-btn" title="Delete">
                      <i class="fas fa-trash"></i> <!-- Delete Icon -->
                    </span>
                  </a>
                  </div>
                </div>
              </div>
            </div>
          @endforeach 
          
      </div>
    </div>
  </div>
  </div>

  <script>
  $(document).ready(function () {
    $(document).on('click', '.setDefault', function () {
      var addr_id = $(this).attr('addr_id'); // Get the addr_id from the attribute
      //alert('Hello, addr_id: ' + addr_id);

      $.ajax({
        url: "<?php echo url('/defaultAddress'); ?>",
        type: 'POST',
        dataType: "json",
        data: {
          addr_id: addr_id,
          _token: '{{ csrf_token() }}' // Include CSRF token for Laravel
        },
        success: function (response) {
          alert('Default status updated successfully!');
          // Optionally refresh or update the UI
          location.reload();
        },
        error: function (xhr, status, error) {
          console.error('Error:', error);
          alert('Failed to update the default status.');
        }
      });
    });
  });
</script>



@endsection
