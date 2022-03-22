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
      <img src="../admin/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Banquet</span>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="../admin/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
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
                <a href="add_profile.php" class="nav-link <?php if($page == 'create_exam'){ echo 'active';} ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Profile</p>
                </a>
              </li>
              
            </ul>
          </li> 
         <!--  <li class="nav-item has-treeview <?php if(in_array($page, $product)){echo 'menu-open';} ?>">
            <a href="#" class="nav-link <?php if(in_array($page, $product)){echo 'active';} ?>">
              <i class="fas fa-layer-group nav-icon"></i>
              <p>
                View Assignment
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="#" class="nav-link  <?php if($page == 'add-product'){ echo 'active'; }?>">
                  <i class="fas fa-plus-circle nav-icon"></i>
                  <p>Department Wise</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link  <?php if($page == 'product-list'){ echo 'active'; }?>">
                  <i class="fas fa-clipboard-list nav-icon"></i>
                  <p>faculty Wise</p>
                </a>
              </li>
               <li class="nav-item">
                <a href="#" class="nav-link  <?php if($page == 'product-list'){ echo 'active'; }?>">
                  <i class="fas fa-clipboard-list nav-icon"></i>
                  <p>Unit Wise</p>
                </a>
              </li>
            </ul>
          </li>  -->
           <!--  <li class="nav-item has-treeview <?php if(in_array($page, $product)){echo 'menu-open';} ?>">
            <a href="#" class="nav-link <?php if(in_array($page, $product)){echo 'active';} ?>">
              <i class="fas fa-layer-group nav-icon"></i>
              <p>
                Assignment
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
      <ul class="nav nav-treeview">
              <li class="nav-item">
                
              </li>
              <li class="nav-item">
                <a href="assignment_list.php" class="nav-link  <?php if($page == 'product-list'){ echo 'active'; }?>">
                  <i class="fas fa-clipboard-list nav-icon"></i>
                  <p>View Assignment</p>
                </a>
              </li>
            </ul> 
          </li> -->
         <!--  <li class="nav-item">
            <a href="add_assignment.php" class="nav-link  <?php if($page == 'add-product'){ echo 'active'; }?>">
              <i class="fas fa-plus-circle nav-icon"></i>
              <p>Assignment</p>
            </a>
          </li> -->
        <!--   <li class="nav-item"> <a href="notice_list.php" class="nav-link
          <?php if($page == 'assignment'){ echo 'active';} ?>"> <i class="fas
          fa-layer-group nav-icon"></i> <p> View Notice </p> </a> </li>  -->
          <!-- <li
          class="nav-item"> <a href="#" class="nav-link <?php if
          ($page == 'assignment'){ echo 'active';} ?>"> <i class="fas
          fa-clipboard-list nav-icon"></i> <p> View Assignment </p> </a>
          </li> -->
       <!--  <li class="nav-item">
            <a href="exam.php" class="nav-link <?php if($page == 'exam'){ echo 'active';} ?>">
              <i class="fas fa-medal nav-icon"></i>
              <p>
                Exam
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