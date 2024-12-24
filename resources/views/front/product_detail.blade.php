@extends('front.layouts.layout') @section('content')

<div class="banner-tailors">
    <div class="container browse-tailors">
        <div class="row browse-content">
            <h1 class="text-white">Product Detail</h1>
        </div>
    </div>
</div>

<div class="container">
    <div class="row product-detail-page">
        <div class="col-lg-6 product-summary-left">
            <!-- Main Product Image -->
             <h1>{{@$product->vendor->name}}</h1>
            <div class="main-product-image">
                <img id="main-product-image" src="{{url('public/Productupload',$product->product_image)}}" alt="Main Product" class="" />
            </div>

            <!-- Related Product Images -->
            <div class="related-product-images mt-3">
                <div class="row product-images-inner">
                    <div class="col-3 one related-product-one">
                        <a href="javascript:void(0);">
                            <img src="{{url('public/Productupload',$product->product_image)}}" alt="Related Product 1" class="related-product-img" />
                        </a>
                    </div>
                @if(!empty($productImages) && count($productImages) > 0)
                @foreach($productImages as $index => $image)
                <div class="col-3 one related-product-one">
                        <a href="javascript:void(0);">
                            <img src="{{url('public/Productupload',$image->product_image)}}" alt="Related Product 1" class="related-product-img" />
                        </a>
                </div>
                @endforeach
                @else
                <p>No Images On Galary</p>
                @endif
                </div>
            </div>
        </div>

        <div class="col-lg-6 product-summary-right">
            <h1 class="product_title entry-title">{{$product->product_name}}</h1>
            <p class="price"><span>{{$product->product_price}}</span>{{$product->final_price}}</p>
            

            <div class="quantity">
                <div class="quantity-inner">
                    <button class="minus" aria-label="Decrease">&minus;</button>
                    <input type="number" class="input-box quantity-input" value="1" min="1"
                        max="10" />
                    <button class="plus" aria-label="Increase">&plus;</button>
                </div>
                <div class="add-to-cart-btn">
                    <a href="javascript:void(0)" class="single_add_to_cart_button button alt product-add-to-cart"
                        data-product-id="{{ $product->id }}">Add to Cart</a>
                </div>

                <script>
                    $(document).on('click', '.product-add-to-cart', function() {
                        const productId = $(this).data('product-id');
                        const quantity = $(this).closest('.quantity').find('.quantity-input').val();

                        $.ajax({
                            url: "{{ route('customer.productAddToCart') }}",
                            method: 'POST',
                            data: {
                                product_id: productId,
                                quantity: quantity,
                                _token: "{{ csrf_token() }}",
                            },
                            success: function(response) {
                                alert(response.message);
                            },
                            error: function(xhr) {
                                alert('Something went wrong. Please try again.');
                            },
                        });
                    });
                </script>
            </div>

            <p class="product-meta"><span>Category:</span>{{@$categoryName->category_name}}</p>
            <h6>Free shipping on orders over $50!</h6>
            <ul class="refunds-text">
                <li><i class="fa fa-check-circle"></i>No-Risk Money Back Guarantee!</li>
                <li><i class="fa fa-check-circle"></i>No Hassle Refunds</li>
                <li><i class="fa fa-check-circle"></i>Secure Payments</li>
            </ul>
            <h6 class="mt-3"><u>Description</u></h6>
            <p class="dolor-text">{{$product->product_details}}</p>
        </div>
    </div>

 
    <div class="container related-products-list">
        <h1 class="inner-detail-pdc">Related Products</h1>
   <img src="{{url('public/front_assets/images/Line.png')}}">
        <div class="row related-products">
        @if(!empty($relatedvendor) && count($relatedvendor) > 0)
        @foreach($relatedvendor as $index => $value)
        <div class="col-md-3 col-sm-6 product-item">
                <div class="product-wrap">
                    <div class="product-img img-zoom">
                        <a href="#">
                            <img class="img-fluid w-100" src="{{url('public/Productupload',$value->product_image)}}" alt="" />
                        </a>
                    </div>
                    <div class="product-content text-center">
                     <span class="review-rating">★★★★★</span>

                        <h3><a href="#">{{@$value->vendor->name}}</a></h3>
                        <div class="product-price">
                            <span>{{$value->final_price}}</span>
                                                

                        </div>
                    </div>
                </div>
        </div>
        @endforeach
        @else
        <p>No products available blogs this category</p>
        @endif


        </div>
    </div>


   <div class="row reviews-details">
        <div class="reviews-point">
            <h2>Customer Reviews</h2>

            <div class="review">
                <div class="review-header">
                    <strong>John Doe</strong>
                    <span class="review-rating">★★★★★</span>
                </div>
                <p class="review-comment">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.

</p>
            </div>

            <div class="review">
                <div class="review-header">
                    <strong>Jane Smith</strong>
                    <span class="review-rating">★★★★☆</span>
                </div>
                <p class="review-comment">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.

</p>
            </div>

            <a href="#" class="see-all-reviews-btn">See All Reviews</a>
        </div>
    </div>

        </div>

    <script>
        // JavaScript to handle the click event
        document.querySelectorAll(".related-product-img").forEach((image) => {
            image.addEventListener("click", function () {
                const mainImage = document.getElementById("main-product-image");
                mainImage.src = this.src; // Update the main product image source
            });
        });
    </script>

    <script>
        (function () {
            const quantityContainer = document.querySelector(".quantity");
            const minusBtn = quantityContainer.querySelector(".minus");
            const plusBtn = quantityContainer.querySelector(".plus");
            const inputBox = quantityContainer.querySelector(".input-box");

            updateButtonStates();

            quantityContainer.addEventListener("click", handleButtonClick);
            inputBox.addEventListener("input", handleQuantityChange);

            function updateButtonStates() {
                const value = parseInt(inputBox.value);
                minusBtn.disabled = value <= 1;
                plusBtn.disabled = value >= parseInt(inputBox.max);
            }

            function handleButtonClick(event) {
                if (event.target.classList.contains("minus")) {
                    decreaseValue();
                } else if (event.target.classList.contains("plus")) {
                    increaseValue();
                }
            }

            function decreaseValue() {
                let value = parseInt(inputBox.value);
                value = isNaN(value) ? 1 : Math.max(value - 1, 1);
                inputBox.value = value;
                updateButtonStates();
                handleQuantityChange();
            }

            function increaseValue() {
                let value = parseInt(inputBox.value);
                value = isNaN(value) ? 1 : Math.min(value + 1, parseInt(inputBox.max));
                inputBox.value = value;
                updateButtonStates();
                handleQuantityChange();
            }

            function handleQuantityChange() {
                let value = parseInt(inputBox.value);
                value = isNaN(value) ? 1 : value;

                // Execute your code here based on the updated quantity value
                console.log("Quantity changed:", value);
            }
        })();
    </script>

    @endsection

