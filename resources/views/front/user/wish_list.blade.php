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
                            @if ($wishlistItems->isEmpty())
                                <tr>
                                    <td colspan="5" class="text-center">
                                        No Wishlist Available
                                    </td>
                                </tr>
                            @else
                            @foreach ($wishlistItems as $wishlistItem)
                                <tr>
                                    <td>
                                        <div class="wishlist-table-list">
                                            <div class="img-product">
                                                @if ($wishlistItem->product->product_image)
                                                    <img src="{{ asset('/public/Productupload') . '/' . $wishlistItem->product->product_image }}"
                                                        alt="Suit">
                                                @else
                                                    <img src="{{ asset('/public/front_assets/images/design2.png') }}" />
                                                @endif
                                            </div>
                                            <div class="name-product">
                                                {{ $wishlistItem->product->product_name ?? "Not Available" }}
                                            </div>
                                        </div>
                                    </td>
                                    <td class="price">${{ $wishlistItem->product->product_price ?? "Not Available"}}</td>
                                    <td><span class="stock-status in-stock">In Stock</span></td>
                                    <td><button class="btn-primary small-btn">Add to Cart</button></td>
                                    <td class="text-center"><a href="#" class="trash-icon"><i
                                                class="far fa-trash-alt"></i></a></td>

                                </tr>
                            @endforeach                                
                            @endif
                        </tbody>
                    </table>
                </div>


            </div>
        </div>
    </div>
@endsection
