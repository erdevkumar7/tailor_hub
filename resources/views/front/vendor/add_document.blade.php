@extends('front.layouts.layout') @section('content')
<style>
   .plus {
    font-size: 20px !important;
    margin-top: 22px;
}
.remove
{
    font-size: 20px !important;
    margin-top: 22px;
    width: 34px;
}
</style>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<div class="banner-tailors">
<div class="container browse-tailors">
  <div class="row browse-content">
    <h1 class="text-white">Documents</h1>
  </div>
</div>
</div>

<div class="container-fluid page-body-wrapper vendor-dasboard">
@include('front.vendor.vendor_sidebar')



            <div class="col-md-9">
                <div class="row profile-setting-form customer-profile">
                    <div class="col-md-12 grid-margin stretch-card customer-profile-card">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Documents</h4>
                                <!--p-- class="card-description">Basic Details</!--p-->
                                <form class="profile-input-form customer-profile-form" action="{{ url('/addDocument') }}" enctype="multipart/form-data" method="POST">
                                @csrf
                                    <div class="row customer-input-inner">
                                        <div id="cls">
                                            <div class="row">
                                                <div class="col-md-5">
                                                    <div class="form-group">
                                                        <label for="exampleSelectGender">Document File</label>
                                                        <input type="file" class="form-control" name="files[0][docu]" />
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="exampleSelectGender">Document Name</label>
                                                        <input type="text" class="form-control" name="files[0][name]" />
                                                    </div>
                                                </div>
                                                <div class="col-md-1">
                                                    <div class="btn btn-outline-success plus" id="add" data-counter="">+</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex mt-3 sub-cen-btn">
                                        <button type="submit" class="btn btn-outline-success me-2">Submit</button>
                                        <button class="btn btn-outline-danger">Cancel</button>
                                    </div>
                                    </form>
                            </div>
                        </div>
                    </div>

                    


                </div>


                <div class="row profile-setting-form customer-profile">
                    <div class="col-md-12 grid-margin stretch-card customer-profile-card">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Documents List</h4>
                                    <div class="row customer-input-inner">
                                        <table id="myTable" class="table table-striped" style="width:100%">
                                            <thead>
                                                <tr>
                                                <th>Id</th>
                                                    <th>Document</th>
                                                    <th>Name</th>
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php $i = 1; ?>
                                            @if(count($vendor_doc)>0)
                                                @foreach($vendor_doc as $list)
                                                    <tr>
                                                        <td>{{$i}}</td>
                                                        <td><button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal{{$i}}">Document {{$i}}</button></td>
                                                        <td>{{$list->doc_name}}</td>
                                                        <td>{{$list->verification_status==0?'Pending':($list->verification_status==1?'Approved':'Rejected')}}</td>
                                                        <td>
                                                            <a title="Delete Product" class="btn btn-sm btn-danger" href="{{ route('deleteDoc',$list->id)}}" onclick="return confirm('Are you sure you want to delete this Product?')"><i class="fa fa-trash"></i>
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
                                            @endif
                                                
                                            </tbody>
                                        </table>    
                                   </div>
                            </div>
                        </div>
                    </div>

                    


                </div>
            </div>
        </div>

        <script src="https://cdn.datatables.net/2.1.8/js/dataTables.min.js"></script>

<script>
  let table = new DataTable('#myTable');

    let fileCounter = {{ count($vendor_doc)}};
    $('#add').click(function(){
        if (fileCounter < 5) 
        { 
            fileCounter++;
            $('#cls').append(`<div class="row"><div class="col-md-5"><div class="form-group"><label for="exampleSelectGender">Document File</label><input type="file" class="form-control" name="files[${fileCounter}][docu]" accept="image/*" /></div></div><div class="col-md-6"><div class="form-group"><label for="exampleSelectGender">Document Name</label><input type="text" class="form-control" name="files[${fileCounter}][name]" /></div></div><div class="col-md-1"><div class="btn btn-outline-danger remove" data-counter="">-</div></div></div>`);
        } 
        else 
        {
            alert('You can only add up to 6 files.');
        }
    });

    $('#cls').on('click', '.remove', function() {
        $(this).closest('.row').remove();
        fileCounter--;
    });
  </script>

  
@endsection
