@extends('front.layouts.layout') @section('content')


<!-- Bootstrap Toggle CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">

<div class="banner-tailors">
    <div class="container browse-tailors">
        <div class="row browse-content">
            <h1 class="text-white">Wishlist</h1>
        </div>
    </div>
</div>

<div class="container-fluid page-body-wrapper vendor-dasboard customer-dash">
@include('front.user.sidebar')

       <div class="col-md-9">
          <div class="row wishlist-product">
  <div class="main-heading mb-10">My Wishlist</div>
			       <div class="table-wishlist">
    <table cellpadding="0" cellspacing="0" border="0" width="100%">
        <thead>
            <tr>
                <th width="45%">Product Name</th>
                <th width="15%">Unit Price</th>
                <th width="15%">Stock Status</th>
                <th width="15%">Actions</th>
                <th width="10%">Remove</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>
                    <div class="wishlist-table-list">
                        <div class="img-product">
                            <img src="https://votivelaravel.in/tailor_hub/public/front_assets/images/design2.png" alt="Black Suit">
                        </div>
                        <div class="name-product">
                            Black Suit
                        </div>
                    </div>
                </td>
                <td class="price">$110.00</td>
                <td><span class="stock-status in-stock">In Stock</span></td>
                <td><button class="btn-primary small-btn">Add to Cart</button></td>
                <td class="text-center"><a href="#" class="trash-icon"><i class="far fa-trash-alt"></i></a></td>
            </tr>
            <tr>
                <td>
                    <div class="wishlist-table-list">
                        <div class="img-product">
                            <img src="https://votivelaravel.in/tailor_hub/public/front_assets/images/fashion.jpg" alt="Gray Suit">
                        </div>
                        <div class="name-product">
                            Gray Suit
                        </div>
                    </div>
                </td>
                <td class="price">$90</td>
                <td><span class="stock-status in-stock">In Stock</span></td>
                <td><button class="btn-primary small-btn">Add to Cart</button></td>
                <td class="text-center"><a href="#" class="trash-icon"><i class="far fa-trash-alt"></i></a></td>
            </tr>
            <tr>
                <td>
                    <div class="wishlist-table-list">
                        <div class="img-product">
                            <img src="https://votivelaravel.in/tailor_hub/public/front_assets/images/cloth-one.jpg" alt="New Design Suit">
                        </div>
                        <div class="name-product">
                            New Design Suit
                        </div>
                    </div>
                </td>
                <td class="price">$325</td>
                <td><span class="stock-status in-stock">In Stock</span></td>
                <td><button class="btn-primary small-btn">Add to Cart</button></td>
                <td class="text-center"><a href="#" class="trash-icon"><i class="far fa-trash-alt"></i></a></td>
            </tr>
              <tr>
                <td>
                    <div class="wishlist-table-list">
                        <div class="img-product">
                            <img src="https://votivelaravel.in/tailor_hub/public/front_assets/images/design2.png" alt="Black Suit">
                        </div>
                        <div class="name-product">
                            Black Suit
                        </div>
                    </div>
                </td>
                <td class="price">$811</td>
                <td><span class="stock-status in-stock">In Stock</span></td>
                <td><button class="btn-primary small-btn">Add to Cart</button></td>
                <td class="text-center"><a href="#" class="trash-icon"><i class="far fa-trash-alt"></i></a></td>
            </tr>
              <tr>
                <td>
                    <div class="wishlist-table-list">
                        <div class="img-product">
                            <img src="https://votivelaravel.in/tailor_hub/public/front_assets/images/cloth-one.jpg" alt="New Design Suit">
                        </div>
                        <div class="name-product">
                            New Design Suit
                        </div>
                    </div>
                </td>
                <td class="price">$118</td>
                <td><span class="stock-status in-stock">In Stock</span></td>
                <td><button class="btn-primary small-btn">Add to Cart</button></td>
                <td class="text-center"><a href="#" class="trash-icon"><i class="far fa-trash-alt"></i></a></td>
            </tr>
              <tr>
                <td>
                    <div class="wishlist-table-list">
                        <div class="img-product">
                            <img src="https://votivelaravel.in/tailor_hub/public/front_assets/images/fashion.jpg" alt="Gray Suit">
                        </div>
                        <div class="name-product">
                            Gray Suit
                        </div>
                    </div>
                </td>
                <td class="price">$99</td>
                <td><span class="stock-status in-stock">In Stock</span></td>
                <td><button class="btn-primary small-btn">Add to Cart</button></td>
                <td class="text-center"><a href="#" class="trash-icon"><i class="far fa-trash-alt"></i></a></td>
            </tr>
        </tbody>
    </table>
</div>

                   
                </div>
            </div>
</div>




@endsection
