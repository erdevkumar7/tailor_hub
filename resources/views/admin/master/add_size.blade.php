@extends('admin.layouts.layout')

@section('title','Size Master Form')
@section('admin-content')

<style>
      .invalid-feedback {
    font-size: 100% !important;
}

 /* form#course_form span {
    width: 50%;
    padding-left: 11px;
} */
</style>

<div class="right_col" role="main">
    <div class="">
        

        <div class="clearfix"></div>

        <div class="row">

            <div class="col-md-12 customer-form-first">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Size Master Form </h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br />
                        <form action="{{ url('admin/addSize') }}" id="course_form" method="post" enctype="multipart/form-data" class="form-horizontal form-label-left">
                        {!! csrf_field() !!}
                            <div class="form-group row">
                                <!-- First row -->
                                <div class="col-md-6">
                                    <input type="hidden" name='size_id' value="{{ $size_detail?$size_detail->id:'' }}">
                                    <label class="control-label">Size Name<span class="mandatory" style="color:red"> *</span></label>
                                    <input type="text" class="form-control" placeholder="Enter Size Name" name="size_name" minlength="1" maxlength="4" value="{{ $size_detail?$size_detail->size_name:'' }}" >
                                    @if ($errors->has('size_name'))
                                        <span class="" style="color:red">
                                            {{ $errors->first('size_name') }}
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

        </div>
    </div>
</div>

<script>
window.addEventListener('load', function() {
    $("#course_form").validate({
        rules: {
                size_name: { required: true },
                
            },
            messages: {
                size_name: { required: "Size name is required" },
                

            },
            errorElement: 'span',
            errorPlacement: function(error, element) {
                error.addClass('invalid-feedback');
                error.insertAfter(element);
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