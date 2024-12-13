@extends('admin.layouts.layout')

@section('title','Category List')
@section('admin-content')

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

<!-- Bootstrap Toggle JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>



<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
          
      </div>


    </div>

    <div class="clearfix"></div>
    
<!--FIlter Section start-->  
<!--div-- class="row">

<div class="col-md-12 customer-form-first">
    <div class="x_panel">
        <div class="x_title">
            <h2>About Us </h2>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <br />
            <form action="{{ url('admin/aboutUs') }}" id="course_form" method="post" enctype="multipart/form-data" class="form-horizontal form-label-left">
                {!! csrf_field() !!}
                <div class="form-group row">
                    <div class="col-md-12">
                        <label class="control-label">About Us<span class="mandatory" style="color:red"> *</span></label>
                        <textarea name="policy_content">  </textarea>
                        @if ($errors->has('policy_content'))
                            <span class="" style="color:red">
                                {{ $errors->first('policy_content') }}
                            </span>
                        @endif
                    </div>
                    
                </div>
                
                <div class="form-group row">
                    <div class="col-md-12 go-back-btn mt-3">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <button type="button" class="btn btn-primary" onclick="history.back()">Go Back</button>
                    </div>
                </div>
            </form>

        </div>
    </div>
</div>

</!--div-->   
<!--FIlter Section End-->  


    <div class="row">
      <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
          <div class="x_title d-flex justify-content-between align-items-center">
            <h2 class="mb-0">Document List</h2>
            
          </div>
          <div class="x_content">
            <div class="row">
              <div class="col-sm-12">
                <div class="card-box table-responsive">
                  <table id="datatable-buttons" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                      <tr>
                        <th>S.No.</th>
                        <th>Vendor</th>
                        <th>Mobile</th>
                        <th>Document</th>
                        <th>Document Name</th>
                        <th>Status</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>

                      <?php $i = 1; ?>
                      @foreach ($document as $list)
                      <tr data-id="{{$list->id}}">
                        <td>{{$i}}</td>
                        <td>{{$list->name.' '.$list->last_name}}</td>
                        <td>{{$list->mobile_no}}</td>
                        <td><button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal{{$i}}">Document {{$i}}</button></td>
                        <td>{{$list->doc_name}}</td>
                        <td><select name="doc_status" class="form-control docu_status">
                            <option value="0" {{ $list->verification_status == 0 ? 'selected' : '' }}>Pending</option>
                            <option value="1" {{ $list->verification_status == 1 ? 'selected' : '' }}>Approved</option>
                            <option value="2" {{ $list->verification_status == 2 ? 'selected' : '' }}>Rejected</option>
                        </select></td>
                        <td>
                          <a title="Delete Document" class="btn btn-sm btn-danger" href="{{ route('deleteDocument',$list->id)}}" onclick="return confirm('Are you sure you want to delete this record?')"><i class="fa fa-trash"></i>
                        </td>

                      </tr>
                      <div class="modal fade" id="myModal{{$i}}" role="dialog">
                                                        <div class="modal-dialog">
                                                        
                                                        <!-- Modal content-->
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                            {{$list->doc_name}}
                                                            
                                                            </div>
                                                            <div class="modal-body">
                                                            <p>@php
                                                                    $fileExtension = pathinfo($list->doc_file, PATHINFO_EXTENSION);
                                                                @endphp

                                                                @if(in_array($fileExtension, ['jpg', 'jpeg', 'png', 'gif']))
                                                                    <!-- Display Image -->
                                                                    <img src="{{ asset('public/documents/' . $list->doc_file) }}" alt="Document" class="img-fluid">
                                                                @elseif($fileExtension == 'pdf')
                                                                    <!-- Display PDF -->
                                                                    <embed src="{{ asset('public/documents/' . $list->doc_file) }}" type="application/pdf" width="100%" height="500px" />
                                                                @else
                                                                    <!-- Display Download Link for Other Files -->
                                                                    <a href="{{ asset('public/documents/' . $list->doc_file) }}" target="_blank">View or Download File</a>
                                                                @endif
                                                            </p>
                                                            </div>
                                                            <div class="modal-footer">
                                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                            </div>
                                                        </div>
                                                        
                                                        </div>
                                                    </div>
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
    $('.docu_status').on("change", function() {
      let docId = $(this).closest('tr').data('id'); 
      let status = $(this).val(); 
      $.ajax({
            type: "POST",
            dataType: "json",
            url: "<?php echo url('/admin/documentStatus'); ?>",
            data: {
                _token: '{{ csrf_token() }}',
                'status': status,
                'id': docId
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