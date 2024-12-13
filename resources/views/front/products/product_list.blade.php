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
<nav class="sidebar sidebar-offcanvas" id="sidebar">
  <ul class="nav">
    <li class="nav-item active">
      <a class="nav-link" href="index.html">
<i class="fa fa-th" aria-hidden="true"></i>
        <span class="menu-title">Dashboard</span>
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link" data-bs-toggle="collapse" href="#form-elements" aria-expanded="false" aria-controls="form-elements">
<i class="fa fa-bars"></i>
        <span class="menu-title">Subscriptions</span>
        <i class="menu-arrow"></i>
      </a>
    </li>

<li class="nav-item">
  <a class="nav-link" data-bs-toggle="collapse" href="#tables-menu" aria-expanded="false" aria-controls="tables-menu">
    <i class="fa fa-th" aria-hidden="true"></i>
    <span class="menu-title">Customer</span>
    <i class="menu-arrow fa fa-chevron-down"></i>
  </a>
  <!-- Dropdown items -->
  <div class="collapse" id="tables-menu">
    <ul class="nav flex-column sub-menu">
      <li class="nav-item">
        <a class="nav-link" href="simple-table.html">Customers</a>
      </li>
          <li class="nav-item">
        <a class="nav-link" href="simple-table.html">Quotes</a>
      </li>

      </ul>
  </div>
</li>



    <li class="nav-item">
      <a class="nav-link" data-bs-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
<i class="fa fa-th" aria-hidden="true"></i>
        <span class="menu-title">Invoice</span>
        <i class="menu-arrow"></i>
      </a>
 
    </li>

    <li class="nav-item">
      <a class="nav-link" href="../../../docs/documentation.html">
<i class="fa fa-th" aria-hidden="true"></i>
        <span class="menu-title">Products</span>
      </a>
    </li>
  </ul>
</nav>

            <div class="col-md-9">
                <div class="row product-list">
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
                <a href="{{ route('addColor',$list->id)}}" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i></a>
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
