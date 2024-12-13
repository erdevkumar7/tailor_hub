@extends('admin.layouts.layout')

@section('title','Subscription Plan Form')
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
                        <h2>Subscription Plan Form </h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br />
                        <form action="{{ url('admin/addPlan') }}" id="course_form" method="post" enctype="multipart/form-data" class="form-horizontal form-label-left">
                            {!! csrf_field() !!}
                            <div class="form-group row">
                                
                                <div class="col-md-6">
                                    <input type="hidden" name='plan_id' value="{{ $plan_detail?$plan_detail->plan_id:'' }}">
                                    <label class="control-label">Plan Name<span class="mandatory" style="color:red"> *</span></label>
                                    <input type="text" class="form-control" placeholder="Enter Color Name" name="plan_name" minlength="1" maxlength="50" value="{{ $plan_detail?$plan_detail->plan_name:'' }}" >
                                    @if ($errors->has('plan_name'))
                                        <span class="" style="color:red">
                                            {{ $errors->first('plan_name') }}
                                        </span>
                                    @endif
                                </div>
                                <div class="col-md-6">
                                    
                                    <label class="control-label">Plan Amount<span class="mandatory" style="color:red"> *</span></label>
                                    <input type="text" class="form-control" placeholder="Enter Plan Amount" name="plan_amount" minlength="1" maxlength="7" value="{{ $plan_detail?$plan_detail->plan_amount:'' }}" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" >
                                    @if ($errors->has('plan_amount'))
                                        <span class="" style="color:red">
                                            {{ $errors->first('plan_amount') }}
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <label class="control-label">Plan Html<span class="mandatory" style="color:red"> *</span></label>
                                    <textarea name="plan_html">  {{ $plan_detail?$plan_detail->plan_html:'' }}</textarea>
                                    @if ($errors->has('plan_html'))
                                        <span class="" style="color:red">
                                            {{ $errors->first('plan_html') }}
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

<script src="https://cdn.tiny.cloud/1/hz0ftlkr3s7g8ok8vksee6eaunnv21klzdecjhp5y5xft0au/tinymce/7/tinymce.min.js" referrerpolicy="origin"></script>
<script>
  tinymce.init({
    selector: 'textarea',
    plugins: [
      // Core editing features
      'anchor', 'autolink', 'charmap', 'codesample', 'emoticons', 'image', 'link', 'lists', 'media', 'searchreplace', 'table', 'visualblocks', 'wordcount',
      // Your account includes a free trial of TinyMCE premium features
      // Try the most popular premium features until Dec 3, 2024:
      'checklist', 'mediaembed', 'casechange', 'export', 'formatpainter', 'pageembed', 'a11ychecker', 'tinymcespellchecker', 'permanentpen', 'powerpaste', 'advtable', 'advcode', 'editimage', 'advtemplate', 'ai', 'mentions', 'tinycomments', 'tableofcontents', 'footnotes', 'mergetags', 'autocorrect', 'typography', 'inlinecss', 'markdown',
      // Early access to document converters
      'importword', 'exportword', 'exportpdf'
    ],
    toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | addcomment showcomments | spellcheckdialog a11ycheck typography | align lineheight | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
    tinycomments_mode: 'embedded',
    tinycomments_author: 'Author name',
    mergetags_list: [
      { value: 'First.Name', title: 'First Name' },
      { value: 'Email', title: 'Email' },
    ],
    ai_request: (request, respondWith) => respondWith.string(() => Promise.reject('See docs to implement AI Assistant')),
    exportpdf_converter_options: { 'format': 'Letter', 'margin_top': '1in', 'margin_right': '1in', 'margin_bottom': '1in', 'margin_left': '1in' },
    exportword_converter_options: { 'document': { 'size': 'Letter' } },
    importword_converter_options: { 'formatting': { 'styles': 'inline', 'resets': 'inline',	'defaults': 'inline', } },
  });
</script>
<script>
window.addEventListener('load', function() {
    $("#course_form").validate({
        rules: {
            plan_name: { required: true },
            plan_amount: { required: true },
            plan_html:{ required : true}
                
            },
            messages: {
                plan_name: { required: "Plan name is required" },
                plan_amount: { required: "Plan Amount is required" },
                plan_html : { required: "Plan Html is required" }

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