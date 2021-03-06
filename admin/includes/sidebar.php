  <?php
  $cp = substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1);
  $cpage = explode('.',$cp); 
  $page=$cpage[0];
  $armkey=array('category','subcategory','company','delivery-zone');
  $product=array('add-product','product-list');
  ?>

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="" class="brand-link">
      <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Banquet</span>
    </a>
 <!-- Sidebar -->
    <div class="sidebar">
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Banquet</a>
        </div>
      </div>
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
               <li class="nav-item">
            <a href="dashboard.php" class="nav-link <?php if($page == 'dashboard'){ echo 'active';} ?>">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview <?php if(in_array($page, $armkey)){echo 'menu-open';} ?>">
            <a href="#" class="nav-link <?php if(in_array($page, $armkey)){echo 'active';} ?>">
              <i class="fas fa-key nav-icon"></i>
              <p>
                Master Key
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="event.php" class="nav-link <?php if($page == 'category'){ echo 'active';} ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Event</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="city.php" class="nav-link <?php if($page == 'subcategory'){ echo 'active';} ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>City</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview <?php if(in_array($page, $product)){echo 'menu-open';} ?>">
            <a href="#" class="nav-link <?php if(in_array($page, $product)){echo 'active';} ?>">
              <i class="fas fa-layer-group nav-icon"></i>
              <p>
                Partner
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="partner_list.php" class="nav-link  <?php if($page == 'product-list'){ echo 'active'; }?>">
                  <i class="fas fa-clipboard-list nav-icon"></i>
                  <p>Partner List</p>
                </a>
              </li>
            </ul>
          </li> 
     <li class="nav-item has-treeview <?php if(in_array($page, $product)){echo 'menu-open';} ?>">
            <a href="#" class="nav-link <?php if(in_array($page, $product)){echo 'active';} ?>">
              <i class="fas fa-layer-group nav-icon"></i>
              <p>
                Booking
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="booking_details.php" class="nav-link  <?php if($page == 'product-list'){ echo 'active'; }?>">
                  <i class="fas fa-clipboard-list nav-icon"></i>
                  <p>Booking Events</p>
                </a>
              </li>
            </ul>
          </li> 
         
      <li class="nav-item">
            <a href="enquiry_list.php" class="nav-link <?php if($page == 'order'){ echo 'active';} ?>">
              <i class="fas fa-list-alt nav-icon"></i>
              <p>
                Enquery List
              </p>
            </a>
          </li> 
        <!--   <li class="nav-item">
            <a href="view_assignment.php" class="nav-link <?php if($page == 'assignment'){ echo 'active';} ?>">
              <i class="fas fa-trophy nav-icon"></i>
              <p>
                Assignment
              </p>
            </a>
          </li> -->
          <!-- <li class="nav-item">
            <a href="gifted-winners.php" class="nav-link <?php if($page == 'gifted-winners'){ echo 'active';} ?>">
              <i class="fas fa-medal nav-icon"></i>
              <p>
                Gifted Winners
              </p>
            </a>
          </li> -->
          <li class="nav-item">
            <a href="logout.php" class="nav-link">
              <i class="nav-icon fas fa-sign-out-alt"></i>
              <p>Logout</p>
            </a>
          </li>

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
    
  </aside>