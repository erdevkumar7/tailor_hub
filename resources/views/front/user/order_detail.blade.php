@extends('front.layouts.layout') @section('content')




<div class="banner-tailors">
  <div class="container browse-tailors">
    <div class="row browse-content">
      <h1 class="text-white">Order Dtails</h1>
    </div>
  </div>
</div>







<div class="container-fluid page-body-wrapper vendor-dasboard">
  @include('front.user.sidebar')

  <div class="col-md-9 new-order-detail-inner">
    <h4>Order details</h4>
    <div class="customer-order-inner">
      <div class="customer-order">
        <div>
          <p>Order ID:<span><b>18089</b></span></p>
          <span>Tue,july 08,2024</span>
<!--           <a href="#" class="approve-btn">Approved</a>
 -->        </div>
        <div class="change-status">
<!--           <a href="#">Change status</a>
 -->        </div>

      </div>

      <div class="row customer-profile-order">
        <div class="col-md-6 customer-profile-order-left">
          <div>
            <i class="fa fa-user"></i>
          </div>

          <div>
            <h3>Customer</h3>
            <p>Name: <span><b>Maria Aniston</span></b></p>
            <p>Email: <span><b>marian@wholesaletronics.com</b></span></p>
            <p><b>Phone: +(065)786 55 67</b></p>

          </div>

        </div>

        <div class="col-md-6 customer-profile-order-right">
          <div>
            <i class="fa fa-shopping-cart"></i>
          </div>

          <div>
            <h3>Shipping Address</h3>
            <p>Shipping: <span><b>Next express</span></b></p>
            <p>Payment method: <span><b>Stripe</b></span></p>
            <p>Status:<b>Approved</b></p>

          </div>

        </div>

      </div>


<div class="products-list-show">
<table class="show-list-inner">
    <h5>Products</h5>
    <thead>
        <tr>
            <th>NAME</th>
            <th>QUANTITY</th>
             <th>UNIT PRICE</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td><img src="https://votivelaravel.in/tailor_hub/public/front_assets/images/design2.png" alt="Shirt"> Shirt</td>
            <td>40</td>
             <td>$291</td>
        </tr>
        <tr>
            <td><img src="https://votivelaravel.in/tailor_hub/public/front_assets/images/design2.png" alt="Shirt"> Shirt</td>
           
            <td>34</td>
             <td>$389</td>
        </tr>
        <tr>
            <td><img src="https://votivelaravel.in/tailor_hub/public/front_assets/images/design2.png" alt="Shirt"> Shirt</td>
         
            <td>89</td>
            <td>$165</td>
        </tr>
        <tr>
            <td><img src="https://votivelaravel.in/tailor_hub/public/front_assets/images/design2.png" alt="Shirt"> Shirt</td>
           
            <td>98</td>
             <td>$111</td>
        </tr>
        <tr>
            <td><img src="https://votivelaravel.in/tailor_hub/public/front_assets/images/design2.png" alt="Shirt"> Shirt</td>
            
            <td>11</td>
            <td>$51</td>
        </tr>
    </tbody>
    <tfoot>
        <tr>
            <td colspan="2" style="text-align: right; font-weight: bold;">Total (Grand):</td>
            <td style="font-weight: bold;">$1007</td>
        </tr>
    </tfoot>
</table>

</div>


    </div>
  </div>


</div>












@endsection