@extends('front.layouts.layout') @section('content')


<!-- Bootstrap Toggle CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">

<div class="banner-tailors">
    <div class="container browse-tailors">
        <div class="row browse-content">
            <h1 class="text-white">Shipping Address</h1>
        </div>
    </div>
</div>

<div class="container-fluid page-body-wrapper vendor-dasboard customer-dash">
@include('front.user.sidebar')

            <div class="col-md-9">
                <div class="row product-list">
                    <table id="myTable" class="table table-striped" style="width:100%">
        <thead>
            <tr>
            <th>Id</th>
                <th>Title</th>
                <th>Country</th>
                <th>State</th>
                <th>City</th>
                <th>Postal Code</th>
                <th>Primary</th>
                <th>Is active</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>

            <?php $i = 1; ?>
            @foreach ($address as $list)
            <tr>
              <td>{{$i}}</td>
              <td>{{$list->address_name}}</td>
              <td>{{$list->country_name}}</td>
              <td>{{$list->state_name}}</td>
              <td>{{$list->city_name}}</td>
              <td>{{$list->postal_code}}</td>
              <td>{{$list->postal_code}}</td>
              <td class="approve-btn">
                <input data-id="{{$list->id}}" class="toggle-class" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Active" data-off="Inactive"
                  {{ $list->is_active ? 'checked' : '' }}>
              </td>
              <td>
                <a href="{{ route('addShipping',$list->id)}}" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i></a>
                <a title="Delete Address" class="btn btn-sm btn-danger" href="{{ route('deleteAddress',$list->id)}}" onclick="return confirm('Are you sure you want to delete this Address?')"><i class="fa fa-trash"></i>
              </td>
            </tr>
            <?php $i++; ?>
            @endforeach
            
        </tbody>
    </table>
                </div>
            </div>
</div>

<script src="https://cdn.datatables.net/2.1.8/js/dataTables.min.js"></script>

<script>
  let table = new DataTable('#myTable');
  </script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>
<script>
        $(document).ready(function() {
            $('.toggle-class').bootstrapToggle();
        });
    </script>
<script>
    $('.toggle-class').on("change", function() {
        var status = $(this).prop('checked') == true ? 1 : 0;
        var id = $(this).data('id');
        
        
        $.ajax({
            type: "POST",
            dataType: "json",
            url: "<?php echo url('/addressStatus'); ?>",
            data: {
                _token: '{{ csrf_token() }}',
                'status': status,
                'id': id,
               
            },
            success: function(data) {
                if (data.success) {
                    toastr.success('Status changed successfully');
                   // location.reload();

                } else {
                    toastr.error('Failed to change status');
                    //location.reload();
                }
            },
        });
    });
</script>
@endsection
