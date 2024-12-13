@extends('front.layouts.layout') @section('content')


<!-- Bootstrap Toggle CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">

<div class="banner-tailors">
    <div class="container browse-tailors">
        <div class="row browse-content">
            <h1 class="text-white">Product-List</h1>
        </div>
    </div>
</div>


          

<div class="container-fluid page-body-wrapper vendor-dasboard customer-dash">

@include('front.vendor.vendor_sidebar')
  <div class="col-md-9">
    <div class="row product-list">
        @if (Session::has('message'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ Session::get('message') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
            @endif
                    <table id="myTable" class="table table-striped" style="width:100%">
        <thead>
            <tr>
            <th>Id</th>
                <th>Category</th>
                <th>Product</th>
                <th>Detail</th>
                <th>Type</th>
                <th>Product For</th>
                <th>Availability</th>
                <th>Is active</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>

            <?php $i = 1; ?>
            @foreach ($products as $list)
            <tr>
              <td>{{$i}}</td>
              <td>{{$list->category_name}}</td>
              <td>{{$list->product_name}}</td>
              <td>{{$list->product_details}}</td>
              <td>{{$list->product_type==1?'Readymade':'Fabric'}}</td>
              <td>{{$list->gender_type==1?'Male':'Female'}}</td>
              <td class="approve-btn">
                <input data-id="{{$list->id}}" data-type="availability" class="toggle-class" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Yes" data-off="No"
                  {{ $list->is_available ? 'checked' : '' }}>
              </td>
              <td class="approve-btn">
                <input data-id="{{$list->id}}" data-type="is_active" class="toggle-class" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Active" data-off="Inactive"
                  {{ $list->is_active ? 'checked' : '' }}>
              </td>
              <td>
                <a href="{{ route('addProduct',$list->id)}}" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i></a>
                <a title="Delete Product" class="btn btn-sm btn-danger" href="{{ route('deleteProduct',$list->id)}}" onclick="return confirm('Are you sure you want to delete this Product?')"><i class="fa fa-trash"></i>
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
        var type = $(this).data('type');
        
        $.ajax({
            type: "POST",
            dataType: "json",
            url: "<?php echo url('/productStatus'); ?>",
            data: {
                _token: '{{ csrf_token() }}',
                'status': status,
                'id': id,
                'type':type
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
