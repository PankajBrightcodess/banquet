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
  <title>Faculty Register</title>
  <?php include'includes/header-links.php'; ?>
</head>
<body class="hold-transition login-page">
  <!-- Content Wrapper. Contains page content -->

  <div  style="margin-top: 2rem;">  <!-- class="login-box" -->
  <div class="login-logo">
    <a href=""><b>Forgot </b>Password</a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body ">  <!-- login-card-body -->
      <p class="login-box-msg"></p>

      <form role="form" action="action.php" method="post" enctype="multipart/form-data">
  <div class="form-row">
    <div class="form-group col-md-12">
      <label for="inputEmail4">Email Id <span style="color:red;">*</span></label>
      <input type="text" class="form-control" required name="email_id" id="inputEmail4" placeholder="Enter Valid Email Id">
    </div>
  </div>
   <div class="form-row ">
    <div class="form-group col-md-6">
       <button type="submit" name="forgot-password" class="btn btn-sm btn-success">Submit</button>
    </div>
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

