@extends('front.layouts.layout') @section('content')


<style>
  .vendor-dasboard nav#sidebar {
    min-height: calc(100vh - 60px);
    background: #fff;
    font-family: "Nunito", sans-serif;
    font-weight: 500;
    padding: 0;
    width: 268px;
    z-index: 11;
    transition: width 0.25s ease, background 0.25s ease;
    -webkit-transition: width 0.25s ease, background 0.25s ease;
    -moz-transition: width 0.25s ease, background 0.25s ease;
    -ms-transition: width 0.25s ease, background 0.25s ease;
  }

  .vendor-dasboard ul.nav {
    display: flex;
    flex-direction: column;
    padding: 20px 11px;
  }

  .vendor-dasboard ul.nav a.nav-link {
    display: flex;
    align-items: center;
    gap: 11px;
  }

  p.text-muted.order-value-text {
    font-weight: 600;
    color: #00b2079c !important;
  }

  .vendor-dasboard {
    background-color: #F5F7FF;
    padding-left: 0;
    display: flex;
    gap: 30px;
  }

  .vendor-dasboard nav#sidebar.sidebar .nav:not(.sub-menu)>.nav-item.active {
    background: #ff8a00;
  }

  .vendor-dasboard .main-panel {
    transition: width 0.25s ease, margin 0.25s ease;
    width: calc(100% - 235px);
    min-height: calc(100vh - 60px);
    display: -webkit-flex;
    display: flex;
    -webkit-flex-direction: column;
    flex-direction: column;
  }


  .vendor-dasboard .content-wrapper {
    padding-top: 5px;
  }

  .row.card-vendor-inner {
    margin-top: 0;
    margin-bottom: 8px;
    width: 100%;
    margin-top: 120px;
  }

  .quick-tasks {
    float: right;
    margin-top: 20px;
    margin-right: 30px;
    display: flex;
    gap: 15px;
  }

  .quick-tasks a.task-btn.add-product {
    border: none;
    background-color: rgb(0 178 7);
    color: #fff;
    padding: 5px 20px;
    border-radius: 5px;
    display: flex;
    align-items: center;
    gap: 10px;
  }

  .quick-tasks a.task-btn.respond-messages {
    border: none;
    padding: 5px 25px;
    background-color: #ff8a00;
    color: #fff;
    border-radius: 5px;
    display: flex;
    align-items: center;
    gap: 10px;
  }

  .quick-tasks a.task-btn.view-analytics {
    border: none;
    background-color: black;
    color: #fff;
    padding: 5px 18px;
    border-radius: 5px;
    display: flex;
    align-items: center;
    gap: 10px;
  }

  .top-products .table-responsive td {
    font-size: 14px;
  }

  .top-products .table-responsive th {
    font-size: 15px;
  }

  .card-vendor-inner .card.card-tale {
    border: none;
    border-radius: 16px;
  }

  a.add-product-btn {
    background-color: #00b207;
    line-height: 5.0;
    color: #fff;
    border-radius: 5px;
    font-weight: 500;
    display: flex;
    align-items: center;
    width: 19%;
    height: 48px;
    margin-bottom: 35px;
    margin-top: 35px;
    justify-content: center;
  }

.row.top-products .filter-bar {
    float: right;
    display: flex;
    gap: 14px;
    font-size: 15px;
    margin-top: 11px;
}

  .row.top-products .filter-bar input#filter-date {
    padding: 0px 8px;
  }

  .row.top-products .filter-bar select#filter-status {
    padding: 0px 8px;
  }

  .row.top-products .filter-bar select#filter-product-type {
    padding: 0px 8px;
  }






  a.add-product-btn span.btn-icon {
    font-size: 28px !important;
  }

  a.add-product-btn:hover {
    background-color: #ff8a00;
  }

  a.add-product-btn span {
    font-size: 20px;
    padding-right: 15px;
  }

  .card-vendor-inner .card-body.one {
    background: #7DA0FA;
    color: #fff;
    border-radius: 16px;
    box-shadow: 1px 5px 11px #00000036;
  }

  .row.order-details {
    margin-bottom: 3px;
  }

  .card.card-dark-blue {
    background: #4747A1;
    color: #ffffff;
    border-radius: 16px;
  }

  .card-vendor-inner .card-body.three {
    background: #7978E9;
    color: #fff;
    border-radius: 16px;
    box-shadow: 1px 5px 11px #00000036;
  }

  .card-vendor-inner .card-body.four {
    background: #F3797E;
    color: #fff;
    border-radius: 16px;
  }

  .card-vendor-inner p.text-one {
    margin-bottom: 0;
    font-weight: 500;
    font-size: 18px;

  }

  .card-vendor-inner p.fs-30 {
    font-size: 30px;
    font-weight: 700;
    margin-bottom: 8px;
  }

  .card-vendor-inner p.days-text {
    margin-bottom: 0;
    font-weight: 600;
  }

  .card-vendor-inner .card {
    border: none;
    box-shadow: 1px 5px 11px #00000036;
  }



  .card-vendor-inner .card-body {
    border-radius: 5px;
  }


  .order-details .card {
    border: none;
    margin-bottom: 28px;
  }

.order-details p.card-title {
    color: #010101;
    font-weight: 600;
    font-size: 18px;
    margin-bottom: 0px !important;
}

  .order-details p.font-weight-500 {
    font-size: 15px;
  }

  .order-details .order-value {
    justify-content: space-around;
  }

  .top-products .badge.badge-success {
    color: #57B657;
    border: 1px solid #57B657;
    padding: 6px 8px;
    border-radius: 18px;
  }


  .top-products .badge.badge-warning {
    color: #FFC100;
    border: 1px solid #FFC100;
    padding: 6px 8px;
    border-radius: 18px;
  }

  .top-products .badge.badge-danger {
    color: #FF4747;
    border: 1px solid #FF4747;
    padding: 6px 8px;
    border-radius: 18px;
  }


  .top-products p.card-title.mb-0 {
    font-weight: 600;
    color: #000;
    font-size: 18px;
    margin-bottom: 18px !important;
  }

  .row.top-products {
    margin-bottom: 30px;
  }

  .row.top-products .card {
    border: none;
  }

.filters-layout p.card-title.mb-0 {
    font-weight: 600;
    color: #000;
    font-size: 18px;
    margin-bottom: 18px !important;
}
.filters-layout {
    display: flex;
    flex-direction: column;
    gap: 20px;
    background-color: #fff;
    padding: 28px;
    border-radius: 5px;
    margin-bottom: 30px;
}

.filters {
  margin-bottom: 20px;
}

#myChart {
  margin-top: 20px;
}

p.trends-text {
    font-weight: 600;
    color: #000;
    font-size: 18px;
    margin-bottom: 0px !important;
}

.top-products .table-responsive {
    margin-top: 35px;
}

canvas#myChart {
    margin-top: 0;
}
   .metric-container {
            display: flex;
            justify-content: space-between;
            margin: 20px 0;
        }
     .metric-card {
    padding: 20px;
    border-radius: 8px;
    width: 100%;
    text-align: center;
}
        .metric-card h3 {
            margin: 10px 0;
            font-size: 1.5em;
        }
        .metric-card p {
            font-size: 1.2em;
            color: #333;
        }

canvas#metricsChart {
    width: 400px !important;
    height: 400px !important;
    margin: auto;
}


  /* Container for the two columns */
    .metric-container {
        display: flex;
        gap: 20px; /* Add space between the columns */
        flex-wrap: wrap; /* Allow wrapping on smaller screens */
        justify-content: space-between;
    }

    /* Style for each metric card */
    .metric-card {
        background-color: #fff;
        border: 1px solid #ddd;
        border-radius: 10px;
        padding: 20px;
        width: 48%; /* Each card takes up nearly half of the container */
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease;
    }

    /* Hover effect for cards */
    .metric-card:hover {
        transform: translateY(-10px);
    }

    /* Style for the title */
    .metric-card h3 {
        font-size: 1.25rem;
        color: #333;
        margin-bottom: 15px;
    }

    /* Make the chart responsive */
    canvas {
        width: 100%;
        height: auto;
    }

</style>

<div class="banner-tailors">
  <div class="container browse-tailors">
    <div class="row browse-content">
      <h1 class="text-white">Vendor-Dashboard</h1>
    </div>
  </div>
</div>





<div class="container-fluid page-body-wrapper vendor-dasboard">
  @include('front.vendor.vendor_sidebar')




  <div class="main-panel">
    <div class="content-wrapper">
      <!--             <h3>Dashboard</h3> -->
      <!-- <a class="add-product-btn" href="#">
  <span class="btn-icon">+</span>
  <span class="btn-text">Add Product</span>
</a>
 -->
      <div class="quick-tasks">
        <a href="#" class="task-btn add-product">
          <i class="fas fa-plus"></i> Add Product
        </a>
        <a href="#" class="task-btn respond-messages">
          <i class="fas fa-envelope"></i> Respond to Messages
        </a>
        <a href="#" class="task-btn view-analytics">
          <i class="fas fa-chart-bar"></i> View Analytics
        </a>
      </div>
      <div class="row card-vendor-inner">
        <div class="col-md-3 mb-4 stretch-card transparent">
          <div class="card card-tale">
            <div class="card-body one">
              <p class="text-one">Today's Sales</p>
              <p class="fs-30">$4,006</p>
              <!--p-- class="days-text">10.00% (30 days)</!--p-->
            </div>
          </div>
        </div>
        <div class="col-md-3 mb-4 stretch-card transparent">
          <div class="card card-dark-blue">
            <div class="card-body two">
              <p class="text-one">Total Earnings </p>
              <p class="fs-30 mb-2">$61,344</p>
              <!--p-- class="days-text">22.00% (30 days)</!--p-->
            </div>
          </div>
        </div>


        <div class="col-md-3 mb-4 stretch-card transparent">
          <div class="card card-dark-blue">
            <div class="card-body three">
              <p class="text-one">Pending Orders </p>
              <p class="fs-30 mb-2">340</p>
              <!--p-- class="days-text">22.00% (30 days)</!--p-->
            </div>
          </div>
        </div>

        <div class="col-md-3 mb-4 stretch-card transparent">
          <div class="card card-dark-blue">
            <div class="card-body four">
              <p class="text-one">Top-Selling Product </p>
              <p class="fs-30 mb-2 ankara-text"> 1,203 </p>
              <!--p-- class="days-text">22.00% (30 days)</!--p-->
            </div>
          </div>
        </div>
      </div>



  <div class="row order-details">
  <!-- Order Details Section -->
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <p class="card-title mb-4">Order Details</p>
<div class="metric-container">
    <!-- First Metric Card for the Chart -->
    <div class="metric-card">
        <h3>Metrics Overview</h3>
        <canvas id="metricsChart"></canvas>
    </div>

    <!-- Second Metric Card for Additional Metrics -->
    <div class="metric-card">
        <h3>Additional Metrics</h3>
        <!-- Add additional content here -->
        <p>Some additional metrics and stats can be placed here.</p>

        <div class="metrics">
            <div class="metric">
                <h4>Metric 1</h4>
                <p>Value: 120</p>
            </div>
            <div class="metric">
                <h4>Metric 2</h4>
                <p>Value: 85</p>
            </div>
            <div class="metric">
                <h4>Metric 3</h4>
                <p>Value: 75</p>
            </div>
        </div>
    </div>
</div>


      </div>
    </div>
  </div>

  <!-- Sales Report Section -->
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <div class="d-flex justify-content-between mb-4">
          <p class="card-title">Sales Report</p>
        </div>

        <div id="sales-chart-legend" class="chartjs-legend mt-4 mb-2"></div>
        <canvas id="sales-chart"></canvas>
      </div>
    </div>
  </div>
</div>



      <div class="row top-products">
        <div class="col-md-12 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <div class="filter-bar">
                <input type="date" id="filter-date" placeholder="Select Date">
                <select id="filter-status">
                  <option value="">All Statuses</option>
                  <option value="pending">Pending</option>
                  <option value="shipped">Shipped</option>
                  <option value="delivered">Delivered</option>
                </select>
                <select id="filter-product-type">
                  <option value="">All Product Types</option>
                  <option value="electronics">Electronics</option>
                  <option value="clothing">Clothing</option>
                  <option value="accessories">Accessories</option>
                </select>
                <button onclick="applyFilters()">Filter</button>
              </div>
              <p class="card-title mb-0">Recent Orders</p>

              <div class="table-responsive">
                <table class="table table-striped table-borderless">
                  <thead>
                    <tr>
                      <th>Product</th>
                      <th>Customer Name</th>
                      <th>Product Quantity</th>
                      <th>Payment Status</th>
                      <th>Expected Delivery Date</th>
                      <th>Price</th>
                      <th>Date</th>
                      <th>Status</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>Search Engine Marketing</td>
                      <td>John Doe</td>
                      <td>2</td>
                      <td>Paid</td>
                      <td>22 Sep 2018</td>
                      <td>$362</td>
                      <td>21 Sep 2018</td>
                      <td class="font-weight-medium">
                        <div class="badge badge-success">Completed</div>
                      </td>
                    </tr>
                    <tr>
                      <td>Search Engine Optimization</td>
                      <td>Jane Smith</td>
                      <td>1</td>
                      <td>Paid</td>
                      <td>14 Jun 2018</td>
                      <td>$116</td>
                      <td>13 Jun 2018</td>
                      <td class="font-weight-medium">
                        <div class="badge badge-success">Completed</div>
                      </td>
                    </tr>
                    <tr>
                      <td>Display Advertising</td>
                      <td>Mike Brown</td>
                      <td>3</td>
                      <td>Pending</td>
                      <td>29 Sep 2018</td>
                      <td>$551</td>
                      <td>28 Sep 2018</td>
                      <td class="font-weight-medium">
                        <div class="badge badge-warning">Pending</div>
                      </td>
                    </tr>
                    <tr>
                      <td>Pay Per Click Advertising</td>
                      <td>Emily Davis</td>
                      <td>5</td>
                      <td>Pending</td>
                      <td>01 Jul 2018</td>
                      <td>$523</td>
                      <td>30 Jun 2018</td>
                      <td class="font-weight-medium">
                        <div class="badge badge-warning">Pending</div>
                      </td>
                    </tr>
                    <tr>
                      <td>E-Mail Marketing</td>
                      <td>Chris Wilson</td>
                      <td>4</td>
                      <td>Cancelled</td>
                      <td>02 Nov 2018</td>
                      <td>$781</td>
                      <td>01 Nov 2018</td>
                      <td class="font-weight-medium">
                        <div class="badge badge-danger">Cancelled</div>
                      </td>
                    </tr>
                    <tr>
                      <td>Referral Marketing</td>
                      <td>Lisa Adams</td>
                      <td>3</td>
                      <td>Pending</td>
                      <td>21 Mar 2018</td>
                      <td>$283</td>
                      <td>20 Mar 2018</td>
                      <td class="font-weight-medium">
                        <div class="badge badge-warning">Pending</div>
                      </td>
                    </tr>
                    <tr>
                      <td>Social Media Marketing</td>
                      <td>Paul Martinez</td>
                      <td>6</td>
                      <td>Paid</td>
                      <td>27 Oct 2018</td>
                      <td>$897</td>
                      <td>26 Oct 2018</td>
                      <td class="font-weight-medium">
                        <div class="badge badge-success">Completed</div>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>



      <div class="filters-layout">
        <p class="trends-text">Sales Trends</p>
<div class="filters">
  <label for="dateRange">Select Date Range:</label>
  <select id="dateRange">
    <option value="7">Last 7 Days</option>
    <option value="30">This Month</option>
    <option value="all">All Time</option>
  </select>
</div>

<canvas id="myChart"></canvas>

      </div>








    </div>
  </div>

</div>




<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="/resources/chart.js/chart.umd.js"></script>
<script src="/resources/js/off-canvas.js"></script>



<script>
    // Wait until the page is loaded to initialize the chart
    window.onload = function() {
        // Sample data
        const data = {
            labels: ['Pending Orders', 'Total Earnings', 'Customer Reviews'],
            datasets: [{
                label: 'Metrics Overview',
                data: [10, 50, 30], // Example values for the chart
                backgroundColor: ['#FF6384', '#36A2EB', '#FFCE56'], // Colors for the chart sections
                hoverOffset: 4
            }]
        };

        // Get the canvas element by its ID
        const ctx = document.getElementById('metricsChart').getContext('2d');
        
        // Create the pie chart
        const metricsChart = new Chart(ctx, {
            type: 'pie', // Type of chart: pie, bar, etc.
            data: data
        });
    };
</script>



<script>
  // Create the first chart (sales-chart)
  const ctxSales = document.getElementById('sales-chart').getContext('2d');
  const salesChart = new Chart(ctxSales, {
    type: 'bar',
    data: {
      labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
      datasets: [{
        label: 'Votes',
        data: [12, 19, 3, 5, 2, 3, 20, 18, 11, 28, 8, 9],
        backgroundColor: [
          'rgba(244, 67, 54, 0.6)',  // Red
          'rgba(33, 150, 243, 0.6)', // Blue
          'rgba(76, 175, 80, 0.6)',  // Green
          'rgba(255, 193, 7, 0.6)',  // Yellow
          'rgba(156, 39, 176, 0.6)', // Purple
          'rgba(255, 87, 34, 0.6)',  // Orange
          'rgba(0, 188, 212, 0.6)',  // Cyan
          'rgba(103, 58, 183, 0.6)', // Deep Purple
          'rgba(205, 220, 57, 0.6)', // Lime
          'rgba(233, 30, 99, 0.6)',  // Pink
          'rgba(121, 85, 72, 0.6)',  // Brown
          'rgba(63, 81, 181, 0.6)'   // Indigo
        ],
        borderColor: [
          'rgba(244, 67, 54, 1)',    // Red
          'rgba(33, 150, 243, 1)',   // Blue
          'rgba(76, 175, 80, 1)',    // Green
          'rgba(255, 193, 7, 1)',    // Yellow
          'rgba(156, 39, 176, 1)',   // Purple
          'rgba(255, 87, 34, 1)',    // Orange
          'rgba(0, 188, 212, 1)',    // Cyan
          'rgba(103, 58, 183, 1)',   // Deep Purple
          'rgba(205, 220, 57, 1)',   // Lime
          'rgba(233, 30, 99, 1)',    // Pink
          'rgba(121, 85, 72, 1)',    // Brown
          'rgba(63, 81, 181, 1)'     // Indigo
        ],
        borderWidth: 1
      }]
    },
    options: {
      scales: {
        y: {
          beginAtZero: true
        }
      }
    }
  });

  // Create the second chart (myChart)
  const ctxMyChart = document.getElementById('myChart').getContext('2d');
  const dataSets = {
    "7": {
      labels: ["Day 1", "Day 2", "Day 3", "Day 4", "Day 5", "Day 6", "Day 7"],
      revenue: [200, 300, 250, 400, 350, 500, 450],
      orders: [30, 40, 35, 50, 45, 60, 55]
    },
    "30": {
      labels: ["Week 1", "Week 2", "Week 3", "Week 4"],
      revenue: [1200, 1500, 1800, 1600],
      orders: [200, 250, 300, 280]
    },
    "all": {
      labels: ["January", "February", "March", "April", "May", "June", "July"],
      revenue: [5000, 7000, 6000, 8000, 7500, 9000, 8500],
      orders: [600, 800, 700, 900, 850, 1000, 950]
    }
  };

  let currentData = dataSets["7"];  // Default to Last 7 Days

  // Create the chart
  let myChart = new Chart(ctxMyChart, {
    type: 'line',
    data: {
      labels: currentData.labels,
      datasets: [
        {
          label: 'Revenue',
          data: currentData.revenue,
          borderColor: 'rgba(75, 192, 192, 1)',
          fill: false
        },
        {
          label: 'Orders',
          data: currentData.orders,
          borderColor: 'rgba(153, 102, 255, 1)',
          fill: false
        }
      ]
    },
    options: {
      responsive: true,
      scales: {
        x: {
          title: {
            display: true,
            text: 'Time Period'
          }
        },
        y: {
          title: {
            display: true,
            text: 'Values'
          }
        }
      }
    }
  });

  // Update chart based on date range filter selection
  document.getElementById('dateRange').addEventListener('change', function(event) {
    const selectedRange = event.target.value;
    currentData = dataSets[selectedRange];

    myChart.data.labels = currentData.labels;
    myChart.data.datasets[0].data = currentData.revenue;
    myChart.data.datasets[1].data = currentData.orders;

    myChart.update();
  });
</script>












<script>
  function applyFilters() {
    // Get filter values
    const filterDate = document.getElementById("filter-date").value;
    const filterStatus = document.getElementById("filter-status").value.toLowerCase();
    const filterProductType = document.getElementById("filter-product-type").value.toLowerCase();

    // Get all table rows
    const rows = document.querySelectorAll(".table tbody tr");

    rows.forEach(row => {
      const date = row.cells[6].textContent.trim(); // Date column
      const status = row.cells[7].textContent.trim().toLowerCase(); // Status column
      const product = row.cells[0].textContent.trim().toLowerCase(); // Product column

      // Check if the row matches the filters
      const matchesDate = filterDate ? date === filterDate : true;
      const matchesStatus = filterStatus ? status.includes(filterStatus) : true;
      const matchesProductType = filterProductType ? product.includes(filterProductType) : true;

      // Show or hide the row based on the filters
      if (matchesDate && matchesStatus && matchesProductType) {
        row.style.display = ""; // Show row
      } else {
        row.style.display = "none"; // Hide row
      }
    });
  }
</script>













@endsection