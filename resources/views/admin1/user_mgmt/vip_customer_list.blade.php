@extends('admin.layouts.layout')

@section('title','VIP Customer List')
@section('admin-content')

<!-- <style>
.nav-md .container.body .right_col {
    height: 611px;
}
</style> -->



<style>


div#datatable-buttons_length {
    width: 50% !important;
}

div#datatable-buttons_filter {
    margin-top: -48px;
    margin-bottom: 14px;
}
.dt-buttons.btn-group a.btn {
    border: solid 2px #80808036;
    display: flex;
    margin-bottom: 12px;
    border-radius: 5px;
}

a.btn.btn-default.buttons-copy.buttons-html5.btn-sm {
    border-radius: 5px;
}

a.btn.btn-default.buttons-csv.buttons-html5.btn-sm {
    border-radius: 5px;
}

a.btn.btn-default.buttons-excel.buttons-html5.btn-sm {
    border-radius: 5px;
}

a.btn.btn-default.buttons-pdf.buttons-html5.btn-sm {
    border-radius: 5px;
}

a.btn.btn-default.buttons-print.btn-sm {
    border-radius: 5px;
}

.dt-buttons.btn-group {
    gap: 11px;
}
.toggle-group .btn {
    font-size: 13px;
}
select#heard12 {
    font-size: 14px;
}
.table-responsive .table td, .table th {
    padding-bottom: 0px;
}



</style>

<!-- Bootstrap Toggle CSS -->


<!-- Bootstrap Toggle JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>


<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
          <!-- <h3>Customer Management</h3> -->
        <!-- @if(Session::has('message'))
          <div class="alert alert-success alert-dismissable">
              <i class="fa fa-check"></i>
              <button aria-hidden="true" data-dismiss="alert" class="close" type="button">x</button>
              {{Session::get('message')}}
          </div>

          @endif
          @if(Session::has('error'))
          <div class="alert alert-danger alert-dismissable">
              <i class="fa fa-check"></i>
              <button aria-hidden="true" data-dismiss="alert" class="close" type="button">x</button>
              {{Session::get('error')}}
          </div>
          @endif -->
      </div>


    </div>

    <div class="clearfix"></div>

    <div class="row">
      <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
          <div class="x_title d-flex justify-content-between align-items-center">
            <h2 class="mb-0">VIP Customer List</h2>
            <a href="{{route('admin.vip_customer_form')}}" class="btn btn-primary">Add New</a>
          </div>
          <div class="x_content">
            <div class="row">
              <div class="col-sm-12">
                <div class="card-box table-responsive">
                  <table id="datatable-buttons" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                      <tr>
                        <th>S.No.</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Mobile No.</th>
                        <th>Vendor Application</th>
                        <!-- <th>Gender</th> -->
                        <th>Account Status</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>

                      <?php $i = 1; ?>
                      @foreach ($user_list as $list)
                      <tr>
                        <td>{{$i}}</td>
                        <td>{{$list->first_name}}</td>
                        <td>{{$list->email_id}}</td>
                        <td>{{$list->mobile_number}}</td>
                        <td>
                    <select id="heard12" class="form-control" required>
													<option value="" >Choose Option</option>
													<option value="0">Approve</option>
													<option value="1">Reject</option>
												</select>

                      </td>
                        <!-- <td>{{$list->gender}}</td> -->
                        <td class="approve-btn">
                          <input data-id="{{$list->id}}" class="toggle-class" type="checkbox"
                            data-onstyle="success" data-offstyle="danger"
                            data-toggle="toggle" data-on="Approved" data-off="Suspended"
                            {{ $list->user_status ? 'checked' : '' }}>
                        </td>
                        <td>
                          <a href="{{ route('admin.vip_customer_view',$list->id)}}" class="btn btn-sm btn-info"><i class="fa fa-eye"></i></a>
                          <a href="{{ route('admin.vip_customer_edit',$list->id)}}" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i></a>
                          <a title="Delete User" class="btn btn-sm btn-danger" href="{{ route('admin.delete_user_list',$list->id)}}" onclick="return confirm('Are you sure you want to delete this record?')"><i class="fa fa-trash"></i>
                        </td>
                      </tr>
                      <?php $i++; ?>
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

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
            url: "<?php echo url('/admin/customer-status'); ?>",
            data: {
                _token: '{{ csrf_token() }}',
                'status': status,
                'id': id
            },
            success: function(data) {
                if (data.success) {
                    toastr.success('Status changed successfully');

                } else {
                    toastr.error('Failed to change status');
                }
            },
        });
    });
</script>

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