<style>
  .dropdown-toggle::after {
    display: inline-block;
    margin-left: .255em;
    vertical-align: .255em;
    content: "";
    border-top: .3em solid;
    border-right: .3em solid transparent;
    border-bottom: 0;
    border-left: .3em solid transparent;
    display: none;
  }




</style>

<div class="col-md-3 left_col">
  <div class="left_col scroll-view">
    <div class="navbar nav_title" style="border: 0;">
      <a href="index.html" class="site_title"><i class="fa fa-paw"></i> <span>TailorHub</span></a>
    </div>

    <div class="clearfix"></div>



    <br />

    <!-- sidebar menu -->
    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
      <div class="menu_section">
        <ul class="nav side-menu">
          <li>
            <a href="{{route('admindashboard')}}"><i class="fa fa-home" ></i> Dashboard </a>
          </li>
		  <li>
            <a ><i class="fa fa-asterisk" aria-hidden="true"></i> Settings <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu" style="display: none;">
                  <li><a href="{{ route('getSize') }}">Size Master</a></li>
                  <li><a href="{{ route('getColor') }}">Color Master</a></li>
                  <li><a href="{{ route('getSpeciality') }}">Speciality Master</a></li>
				  <li><a href="{{ route('getFebricType') }}">Febric Type</a></li>
                  <li><a href="{{ route('getPlans') }}">Subsription Plan</a></li>
				  <li><a href="{{ route('getCategory') }}">Product Category</a></li>
                </ul>
          </li>
          <li>
  <a ><i class="fa fa-user" aria-hidden="true"></i> User Management <span class="fa fa-chevron-down"></span></a>
  <ul class="nav child_menu" style="display: none;">
    <li><a href="{{ route('admin.customer_list') }}">Customer Management</a></li>
    <li><a href="{{ route('admin.vip_customer_list') }}">VIP Customer Management</a></li>
  </ul>
</li>


<li><a><i class="fa fa-edit"></i> Vendor <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{ route('admin.tailor_list') }}">Tailor Management</a></li>
                      <li><a href="{{ route('admin.fabric_seller_list') }}">Fabric Seller Management</a></li>
                      <li><a href="{{ route('admin.tailor_seller_list') }}">Tailor and Fabric Seller Management</a></li>
					<li><a href="{{ route('listDocument') }}">Documents</a></li>
                    </ul>
                </li>
          <!-- <li><a><i class="fa fa-edit"></i> Vendor <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{ route('admin.tailor_list') }}">Tailor Management</a></li>
                      <li><a href="form.html">Fabric Seller Management</a></li>
                      <li><a href="form.html">Tailor and Fabric Seller Management</a></li>

                    </ul>
                </li> -->
				<li>
                <a ><i class="fa fa-asterisk" aria-hidden="true"></i> Policy <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu" style="display: none;">
                  <li><a href="{{ route('aboutUs') }}">About Us</a></li>
                  <li><a href="{{ route('privacyPolicy') }}">Privacy Policy</a></li>
                  <li><a href="{{ route('termsConditions') }}">Terms & Conditions</a></li>
                </ul>
              </li>
            </ul>

      </div>


    </div>
    <!-- /sidebar menu -->


  </div>
</div>



