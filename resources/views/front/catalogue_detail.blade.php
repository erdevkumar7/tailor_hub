@extends('front.layouts.layout') @section('content')

<div class="banner-tailors">
    <div class="container browse-tailors">
        <div class="row browse-content">
            <h1 class="text-white">Catalogue Detail</h1>
        </div>
    </div>
</div>

<div class="container">
    <div class="row product-detail-page">
        <div class="col-lg-6 product-summary-left">
            <!-- Main Product Image -->

             <h1>{{@$catalogue->vendor->name}}</h1>
            <div class="main-product-image">

                <img id="main-product-image" src="{{url('public/upload/catalogue',$catalogue_image->catalogue_image)}}" alt="Main Product" class="" />
            </div>

            <!-- Related Product Images -->
            <div class="related-product-images mt-3">
                <div class="row product-images-inner">
                @if(!empty($related_image) && count($related_image) > 0)
                @foreach($related_image as $index => $image)
                <div class="col-3 one related-product-one">
                        <a href="javascript:void(0);">
                            <img src="{{url('public/upload/catalogue',$image->catalogue_image)}}" alt="Related Product 1" class="related-product-img" />
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
            <h1 class="product_title entry-title">{{$catalogue->catalogue_name}}</h1>
            <p class="price">{{$catalogue->start_price}}</p>


            <div class="quantity">
                <div class="quantity-inner">
                    <button class="minus" aria-label="Decrease">&minus;</button>
                    <input type="number" class="input-box" value="1" min="1" max="10" />
                    <button class="plus" aria-label="Increase">&plus;</button>
                </div>
                <div class="add-to-cart-btn">
                    <a href="#" type="submit" name="add-to-cart" class="single_add_to_cart_button button alt" data-bs-toggle="modal" data-bs-target="#book-now-popup">Add to cart</a>
                </div>
            </div>

            <div class="modal fade" id="book-now-popup" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content"> 			
                        <div class="modal-body">
                            <div class="center-txt">
                                <h2>Do you want to ?</h2>
                                    <div class="md-txt">
                                        <h4><a href="javascript:void(0)" class="fab_stich" cat_id="{{$catalogue->id}}" type="fabric">Shop Fabrics for Stiching</a></h4>
                                        <h4>Or</h4>
                                        <h4><a href="javascript:void(0)" class="fab_stich" cat_id="{{$catalogue->id}}" type="mesurment">Continue to Add Measurements</a></h4>
                                    </div>
                            </div>
                            <div class="center-btn">
                                <a href="#">Back to Fabric</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <p class="product-meta"><span>Category:</span>{{@$categoryName->category_name}}</p>
            <h6>Free shipping on orders over $50!</h6>
            <ul class="refunds-text">
                <li><i class="fa fa-check-circle"></i>No-Risk Money Back Guarantee!</li>
                <li><i class="fa fa-check-circle"></i>No Hassle Refunds</li>
                <li><i class="fa fa-check-circle"></i>Secure Payments</li>
            </ul>
            <h6 class="mt-3"><u>Description</u></h6>
            <p class="dolor-text">{{$catalogue->description}}</p>
        </div>
    </div>


    <div class="container related-products-list">
        <h1 class="inner-detail-pdc">Related Catalogue</h1>
   <img src="{{ url('/public') }}/front_assets/images/Line.png">
        <div class="row related-products">
        @if(!empty($relatedcatalogue) && count($relatedcatalogue) > 0)
        @foreach($relatedcatalogue as $index => $value)
        <div class="col-md-3 col-sm-6 product-item">


                <div class="product-wrap">
                    <div class="product-img img-zoom">
                        <a href="#">
                            <img class="img-fluid w-100" src="{{url('public/upload/catalogue',$value->catalogue_image)}}" alt="" />
                        </a>
                    </div>
                    <div class="product-content text-center">
                     <span class="review-rating">★★★★★</span>

                        <h3><a href="#">{{@$catalogue->vendor->name}}</a></h3>
                        <div class="product-price">
                            <span>{{$value->start_price}}</span>


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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $(document).on('click','.fab_stich',function(){
        var catalogue_id=$(this).attr('cat_id');
        var type    = $(this).attr('type');
        var customerId = @json($customer_id);
        if(customerId==0 && type=='mesurment')
        {
            Swal.fire({
                title: "Please login before proceed to Measurement",
                icon: "info",
                draggable: true
                });
        }
        else{
            $.ajax({
                type: "POST",
                dataType: "json",
                url: "<?php echo url('/saveDesignId'); ?>",
                data: {
                    _token: '{{ csrf_token() }}',
                    'catalogue_id': catalogue_id,
                    'type':type
                },
                success: function(data) {
                    //window.location.href = "<?php echo route('browseFebrics'); ?>"; 
                    window.location.href = data.redirect_url;
                    
                },
                error: function(xhr) {
                    console.error('Error storing Catalogue ID:', xhr.responseText);
                }
            });
        }
    });
    </script>
    
    
    @endsection

