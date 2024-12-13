@extends('front.layouts.layout') @section('content')

<div class="banner-tailors">
    <div class="container browse-tailors">
        <div class="row browse-content">
            <h1 class="text-white">Customer Dashboard</h1>
        </div>
    </div>
</div>

<div class="container-fluid page-body-wrapper vendor-dasboard">
    @include('front.user.sidebar')

    <div class="main-panel">
        <div class="content-wrapper">
            <h3 class="cust-text">Customer</h3>
            <div class="row customer-dash-inner">
                <div class="col-md-4 mb-4 stretch-card transparent">
                    <div class="card card-tale">
                        <div class="card-body one">
                            <p class="text-one">Total Orders Placed</p>
                            <p class="fs-30">10600</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4 stretch-card transparent">
                    <div class="card card-dark-blue">
                        <div class="card-body two">
                            <p class="text-one">Orders Pending Delivery</p>
                            <p class="fs-30 mb-2">89</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 mb-4 stretch-card transparent">
                    <div class="card card-dark-blue">
                        <div class="card-body three">
                            <p class="text-one">Total Spending</p>
                            <p class="fs-30 mb-2">$3050</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row most-purchased">
                <h2>Most Frequently Purchased Items</h2>
                <div class="carousel slide" id="media" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="item">
                                        <img src="https://votivelaravel.in/tailor_hub/public/front_assets/images/design2.png" alt="Category 1" />
                                        <h3>Category 1</h3>
                                        <p>Top products 1</p>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="item">
                                        <img src="https://votivelaravel.in/tailor_hub/public/front_assets/images/cloth-one.jpg" alt="Category 2" />
                                        <h3>Category 2</h3>
                                        <p>Top products 2</p>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="item">
                                        <img src="https://votivelaravel.in/tailor_hub/public/front_assets/images/fashion.jpg" alt="Category 3" />
                                        <h3>Category 3</h3>
                                        <p>Top products 3</p>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="item">
                                        <img src="https://votivelaravel.in/tailor_hub/public/front_assets/images/design2.png" alt="Category 1" />
                                        <h3>Category 1</h3>
                                        <p>Top products 1</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="item">
                                        <img src="https://votivelaravel.in/tailor_hub/public/front_assets/images/design2.png" alt="Category 1" />
                                        <h3>Category 1</h3>
                                        <p>Top products 1</p>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="item">
                                        <img src="https://votivelaravel.in/tailor_hub/public/front_assets/images/cloth-one.jpg" alt="Category 2" />
                                        <h3>Category 2</h3>
                                        <p>Top products 2</p>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="item">
                                        <img src="https://votivelaravel.in/tailor_hub/public/front_assets/images/fashion.jpg" alt="Category 3" />
                                        <h3>Category 3</h3>
                                        <p>Top products 3</p>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="item">
                                        <img src="https://votivelaravel.in/tailor_hub/public/front_assets/images/design2.png" alt="Category 1" />
                                        <h3>Category 1</h3>
                                        <p>Top products 1</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="item">
                                        <img src="https://votivelaravel.in/tailor_hub/public/front_assets/images/design2.png" alt="Category 1" />
                                        <h3>Category 1</h3>
                                        <p>Top products 1</p>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="item">
                                        <img src="https://votivelaravel.in/tailor_hub/public/front_assets/images/cloth-one.jpg" alt="Category 2" />
                                        <h3>Category 2</h3>
                                        <p>Top products 2</p>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="item">
                                        <img src="https://votivelaravel.in/tailor_hub/public/front_assets/images/fashion.jpg" alt="Category 3" />
                                        <h3>Category 3</h3>
                                        <p>Top products 3</p>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="item">
                                        <img src="https://votivelaravel.in/tailor_hub/public/front_assets/images/design2.png" alt="Category 1" />
                                        <h3>Category 1</h3>
                                        <p>Top products 1</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#media" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#media" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>

            <div class="row average-spending-section">
                <h2>Average Spending per Order</h2>

                <div class="product-list">
                    <div class="product-card">
                        <img src="https://votivelaravel.in/tailor_hub/public/front_assets/images/cloth-one.jpg" alt="" />
                        <p>Product 1 Name</p>
                        <span>$50</span>
                        <button>Add to Cart</button>
                    </div>
                    <div class="product-card">
                        <img src="https://votivelaravel.in/tailor_hub/public/front_assets/images/fashion.jpg" alt="" />
                        <p>Product 2 Name</p>
                        <span>$75</span>
                        <button>Add to Cart</button>
                    </div>
                    <div class="product-card">
                        <img src="https://votivelaravel.in/tailor_hub/public/front_assets/images/cloth-one.jpg" alt="" />
                        <p>Product 3 Name</p>
                        <span>$100</span>
                        <button>Add to Cart</button>
                    </div>
                    <div class="product-card">
                        <img src="https://votivelaravel.in/tailor_hub/public/front_assets/images/design2.png" alt="" />
                        <p>Product 4 Name</p>
                        <span>$125</span>
                        <button>Add to Cart</button>
                    </div>
                </div>
            </div>

            <div class="row most-purchased recent-purchases">
                <h2>Recent Purchases</h2>
                <div id="recentPurchasesCarousel" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <!-- First item -->
                        <div class="carousel-item active">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="card">
                                        <img src="https://votivelaravel.in/tailor_hub/public/front_assets/images/fashion.jpg" class="card-img-top" alt="Product 1" />
                                        <div class="card-body text-center">
                                            <h5 class="card-title">Product 1</h5>
                                            <p class="card-text">Description of Product 1</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="card">
                                        <img src="https://votivelaravel.in/tailor_hub/public/front_assets/images/cloth-one.jpg" class="card-img-top" alt="Product 2" />
                                        <div class="card-body text-center">
                                            <h5 class="card-title">Product 2</h5>
                                            <p class="card-text">Description of Product 2</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="card">
                                        <img src="https://votivelaravel.in/tailor_hub/public/front_assets/images/design2.png" class="card-img-top" alt="Product 3" />
                                        <div class="card-body text-center">
                                            <h5 class="card-title">Product 3</h5>
                                            <p class="card-text">Description of Product 3</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="card">
                                        <img src="https://votivelaravel.in/tailor_hub/public/front_assets/images/cloth-one.jpg" class="card-img-top" alt="Product 2" />
                                        <div class="card-body text-center">
                                            <h5 class="card-title">Product 2</h5>
                                            <p class="card-text">Description of Product 2</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Second item -->
                        <div class="carousel-item">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="card">
                                        <img src="https://votivelaravel.in/tailor_hub/public/front_assets/images/fashion.jpg" class="card-img-top" alt="Product 1" />
                                        <div class="card-body text-center">
                                            <h5 class="card-title">Product 1</h5>
                                            <p class="card-text">Description of Product 1</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="card">
                                        <img src="https://votivelaravel.in/tailor_hub/public/front_assets/images/cloth-one.jpg" class="card-img-top" alt="Product 2" />
                                        <div class="card-body text-center">
                                            <h5 class="card-title">Product 2</h5>
                                            <p class="card-text">Description of Product 2</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="card">
                                        <img src="https://votivelaravel.in/tailor_hub/public/front_assets/images/design2.png" class="card-img-top" alt="Product 3" />
                                        <div class="card-body text-center">
                                            <h5 class="card-title">Product 3</h5>
                                            <p class="card-text">Description of Product 3</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="card">
                                        <img src="https://votivelaravel.in/tailor_hub/public/front_assets/images/cloth-one.jpg" class="card-img-top" alt="Product 2" />
                                        <div class="card-body text-center">
                                            <h5 class="card-title">Product 2</h5>
                                            <p class="card-text">Description of Product 2</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Carousel controls -->
                    <button class="carousel-control-prev" type="button" data-bs-target="#recentPurchasesCarousel" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#recentPurchasesCarousel" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="/resources/chart.js/chart.umd.js"></script>
<script src="/resources/js/off-canvas.js"></script>

<script>
    $(document).ready(function () {
        $("#media").carousel({
            pause: true,
            interval: false,
            ride: "off",
            autoplay: false,
        });
    });
</script>

<script>
    $(document).ready(function () {
        $("#recentPurchasesCarousel").carousel({
            pause: true,
            interval: false,
            ride: "off",
            autoplay: false,
        });
    });
</script>

<script>
    // Example of setting the calculated value dynamically
    const calculatedValue = 1234.56; // Replace with your actual calculation logic
    document.getElementById("calculatedValue").textContent = `$${calculatedValue.toFixed(2)}`;
</script>

<script>
    const ctx = document.getElementById("sales-chart").getContext("2d");
    const salesChart = new Chart(ctx, {
        type: "bar",
        data: {
            labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
            datasets: [
                {
                    label: "Votes",
                    data: [12, 19, 3, 5, 2, 3, 20, 18, 11, 28, 8, 9],
                    backgroundColor: [
                        "rgba(255, 99, 132, 0.2)",
                        "rgba(54, 162, 235, 0.2)",
                        "rgba(255, 206, 86, 0.2)",
                        "rgba(75, 192, 192, 0.2)",
                        "rgba(153, 102, 255, 0.2)",
                        "rgba(255, 159, 64, 0.2)",
                        "rgba(255, 99, 132, 0.2)",
                        "rgba(54, 162, 235, 0.2)",
                        "rgba(255, 206, 86, 0.2)",
                        "rgba(75, 192, 192, 0.2)",
                        "rgba(153, 102, 255, 0.2)",
                        "rgba(255, 159, 64, 0.2)",
                    ],
                    borderColor: [
                        "rgba(255, 99, 132, 1)",
                        "rgba(54, 162, 235, 1)",
                        "rgba(255, 206, 86, 1)",
                        "rgba(75, 192, 192, 1)",
                        "rgba(153, 102, 255, 1)",
                        "rgba(255, 159, 64, 1)",
                        "rgba(255, 99, 132, 1)",
                        "rgba(54, 162, 235, 1)",
                        "rgba(255, 206, 86, 1)",
                        "rgba(75, 192, 192, 1)",
                        "rgba(153, 102, 255, 1)",
                        "rgba(255, 159, 64, 1)",
                    ],
                    borderWidth: 1,
                },
            ],
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true,
                },
            },
        },
    });
</script>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const ctx = document.getElementById("sales-chart").getContext("2d");
        new Chart(ctx, {
            /* Chart configuration */
        });
    });
</script>

@endsection
