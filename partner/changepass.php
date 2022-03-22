<?php
session_start();
if(isset($_SESSION['adminemail'])){
  header('location:dashboard.php');
}
include'../connection.php';
$msg = "";
    if (isset($_SESSION['msg'])) {
        $msg = $_SESSION['msg'];
        unset($_SESSION['msg']);
    }
    if ($msg != "") {
        echo "<script> alert('$msg')</script>";
    }
     $query="SELECT * FROM `department_master` WHERE `status`='1'";
    $run=mysqli_query($conn,$query);
    while ($data=mysqli_fetch_assoc($run)) {
      $department[]=$data;
    }
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Faculty Change Password</title>
  <?php include'includes/header-links.php'; ?>
</head>
<body class="hold-transition login-page">
  <!-- Content Wrapper. Contains page content -->

  <div  style="margin-top: 2rem;">  <!-- class="login-box" -->
  <div class="login-logo">
    <a href=""><b>Change </b>Password</a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body ">  <!-- login-card-body -->
      <!-- <p class="login-box-msg">Register to start your session</p> -->

  <form role="form" action="action.php" method="post" enctype="multipart/form-data">
  <div class="form-row">
    <div class="form-group col-md-12 mb-3">
      <label for="inputCity">New Password <span style="color:red;">*</span></label>
      <input type="password" name="password" required class="form-control" placeholder="Password" id="inputCity">
    </div>
    <div class="form-group col-md-12">
      <label for="inputCity">Confirm Password <span style="color:red;">*</span></label>
      <input type="password" name="con_pass" required class="form-control" placeholder="Confirm Password" id="inputCity">
    </div>
  </div>
   <div class="form-row ">
    <div class="form-group col-md-6">
       <button type="submit" name="change-pass" class="btn btn-success">Submit</button>
    </div>
    <!-- <div class="form-group col-md-6">
      <a href="index.php" style="float: right;">Login</a>
    </div> -->
  </div>

</form>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->
<!-- /.content-wrapper -->
<!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

 <?php include'includes/footer-links.php'; ?>
 <script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
  });
</script>
 
</body>
</html>

