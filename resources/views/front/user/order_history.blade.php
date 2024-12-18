@extends('front.layouts.layout') @section('content')


<!-- Bootstrap Toggle CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">

<div class="banner-tailors">
    <div class="container browse-tailors">
        <div class="row browse-content">
            <h1 class="text-white">Order History</h1>
        </div>
    </div>
</div>

<div class="container-fluid page-body-wrapper vendor-dasboard customer-dash">
@include('front.user.sidebar')

       <div class="col-md-9">
    <div class="row order-history-user">    
        <!-- Orders Table-->
            <div class="d-flex pb-3 left-top">
                <div class="form-inline">
                    <label class="text-muted mr-3" for="order-sort">Sort Orders</label>
                    <select class="form-control" id="order-sort">
                        <option>All</option>
                        <option>Delivered</option>
                        <option>In Progress</option>
                        <option>Delayed</option>
                        <option>Canceled</option>
                    </select>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead>
                        <tr>
                            <th>Order #</th>
                            <th>Date Purchased</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><a class="navi-link" href="#order-details" data-toggle="modal">78A643CD409</a></td>
                            <td>August 08, 2024</td>
                            <td><span class="badge badge-danger m-0">Canceled</span></td>
                            <td><span class="view-btn">View</span></td>
                        </tr>
                        <tr>
                            <td><a class="navi-link" href="#order-details" data-toggle="modal">34VB5540K83</a></td>
                            <td>July 21, 2024</td>
                            <td><span class="badge badge-info m-0">In Progress</span></td>
                            <td><span class="view-btn">View</span></td>
                        </tr>
                        <tr>
                            <td><a class="navi-link" href="#order-details" data-toggle="modal">112P45A90V2</a></td>
                            <td>June 15, 2023</td>
                            <td><span class="badge badge-warning m-0">Delayed</span></td>
                            <td><span class="view-btn">View</span></td>
                        </tr>
                        <tr>
                            <td><a class="navi-link" href="#order-details" data-toggle="modal">28BA67U0981</a></td>
                            <td>May 19, 2021</td>
                            <td><span class="badge badge-success m-0">Delivered</span></td>
                            <td><span class="view-btn">View</span></td>
                        </tr>
                        <tr>
                            <td><a class="navi-link" href="#order-details" data-toggle="modal">502TR872W2</a></td>
                            <td>April 04, 2023</td>
                            <td><span class="badge badge-success m-0">Delivered</span></td>
                            <td><span class="view-btn">View</span></td>
                        </tr>
                        <tr>
                            <td><a class="navi-link" href="#order-details" data-toggle="modal">47H76G09F33</a></td>
                            <td>March 30, 2024</td>
                            <td><span class="badge badge-success m-0">Delivered</span></td>
                            <td><span class="view-btn">View</span></td>
                        </tr>
                           <tr>
                            <td><a class="navi-link" href="#order-details" data-toggle="modal">112P45A90V2</a></td>
                            <td>June 15, 2025</td>
                            <td><span class="badge badge-warning m-0">Delayed</span></td>
                            <td><span class="view-btn">View</span></td>
                        </tr>
                               <tr>
                            <td><a class="navi-link" href="#order-details" data-toggle="modal">502TR872W2</a></td>
                            <td>April 04, 2025</td>
                            <td><span class="badge badge-success m-0">Delivered</span></td>
                            <td><span class="view-btn">View</span></td>
                        </tr>

                    </tbody>
                </table>
            </div>



                   
          </div>
       </div>
</div>




@endsection
