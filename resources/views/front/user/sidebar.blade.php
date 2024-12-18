<nav class="sidebar sidebar-offcanvas" id="sidebar">
  <ul class="nav">
  <li class="nav-item active">
      <a class="nav-link" href="{{url('customerDashboard')}}" >
      <i class="fa fa-th" aria-hidden="true"></i>
          <span class="menu-title">Dashboard</span>
        <i class="menu-arrow"></i>
      </a>
    </li><li class="nav-item ">
      <a class="nav-link" href="{{url('customerProfile')}}">
        <i class="fa fa-user"></i>
          <span class="menu-title">My Profile</span>
        <i class="menu-arrow"></i>
      </a>
    </li>
    <li class="nav-item ">
      <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
        <i class="fa fa-shopping-cart"></i>
          <span class="menu-title">Order History</span>
        <i class="menu-arrow"></i>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-bs-toggle="collapse" href="#form-elements" aria-expanded="false" aria-controls="form-elements">
<i class="fa fa-list"></i>
        <span class="menu-title">Wishlist</span>
        <i class="menu-arrow"></i>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-bs-toggle="collapse" href="#charts" aria-expanded="false" aria-controls="charts">
<i class='fas fa-ticket-alt'></i>
        <span class="menu-title">Support Tickets</span>
        <i class="menu-arrow"></i>
      </a>

    </li>
    <li class="nav-item">
  <a class="nav-link" data-bs-toggle="collapse" href="#tables-menu" aria-expanded="false" aria-controls="tables-menu">
<i class='fa fa-map-marker'></i>
    <span class="menu-title">Shipping Address</span>
    <i class="menu-arrow fa fa-chevron-down"></i>
  </a>
  <!-- Dropdown items -->
  <div class="collapse" id="tables-menu">
    <ul class="nav flex-column sub-menu">
      <li class="nav-item">
        <a class="nav-link" href="{{url('addShipping')}}">Add Address</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{url('shippingAddress')}}">View Address</a>
      </li>
    </ul>
  </div>
</li>

    </li>
    <!--li class="nav-item">
      <a class="nav-link"  href="{{url('addShipping')}}" >
      <i class="fa fa-map-marker" aria-hidden="true"></i>
        <span class="menu-title">Shipping Address</span>
        <i class="menu-arrow"></i>
      </a>
    </li-->

        <li class="nav-item">
      <a class="nav-link" href="{{url('mesurment')}}" >
<i class="fa fa-balance-scale" aria-hidden="true"></i>
        <span class="menu-title">Measurements</span>
        <i class="menu-arrow"></i>
      </a>
    </li>

  </ul>
</nav>