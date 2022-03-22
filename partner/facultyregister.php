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
    <a href=""><b>Faculty </b>Register</a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body ">  <!-- login-card-body -->
      <p class="login-box-msg">Register to start your session</p>

      <form role="form" action="action.php" method="post" enctype="multipart/form-data">
  <div class="form-row">
    <div class="form-group col-md-12">
      <label for="inputEmail4">Faculty Name <span style="color:red;">*</span></label>
      <input type="text" class="form-control" required name="Faculty_name" id="inputEmail4" placeholder="Faculty Name">
    </div>
  </div>
  <div class="form-row">
    
    <div class="form-group col-md-6">
      <label for="inputPassword4">Mobile No. <span style="color:red;">*</span></label>
      <input type="text" class="form-control" required name="mobile_no" id="inputPassword4" placeholder="Mobile Number">
    </div>
    <div class="form-group col-md-6">
      <label for="inputAddress">Alternate Mobile No. <span style="color:red;">*</span></label>
    <input type="text" class="form-control" required name="alt_mobile" id="inputAddress" placeholder="Alternate Mobile No.">
    </div>
  </div>
   <div class="form-row">
    <div class="form-group col-md-4">
     <label for="inputAddress2">Aadhar <span style="color:red;">*</span></label>
    <input type="text" class="form-control" required name="aadhar" id="inputAddress2" placeholder="Aadhar">
    </div>
    <div class="form-group col-md-4">
     <label for="inputCity">Email <span style="color:red;">*</span></label>
      <input type="email" name="email" required class="form-control" placeholder="Email Id" id="inputCity">
    </div>
     <div class="form-group col-md-4">
     <label for="inputCity">PAN No. <span style="color:red;">*</span></label>
      <input type="text" name="pan" required class="form-control" placeholder="PAN No." id="inputCity">
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputCity">Vill/City <span style="color:red;">*</span></label>
      <input type="text" name="vill" required class="form-control" placeholder="Village/City" id="inputCity">
    </div>
    <div class="form-group col-md-6">
      <label for="inputCity">Post <span style="color:red;">*</span></label>
      <input type="text" name="post" required class="form-control" placeholder="Post" id="inputCity">
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputCity">Landmark <span style="color:red;">*</span></label>
      <input type="text" name="landmark" required class="form-control" placeholder="Landmark" id="inputCity">
    </div>
    <div class="form-group col-md-6">
      <label for="inputCity">Dist <span style="color:red;">*</span></label>
      <input type="text" name="dist" required class="form-control" placeholder="Dist" id="inputCity">
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputCity">State <span style="color:red;">*</span></label>
      <input type="text" name="state" required class="form-control" placeholder="State" id="inputCity">
    </div>
    <div class="form-group col-md-6">
      <label for="inputCity">Pin <span style="color:red;">*</span></label>
      <input type="text" name="pin" required class="form-control" placeholder="Pin" id="inputCity">
    </div>
  </div>
   <div class="form-row">
    <div class="form-group col-md-4">
      <label for="inputCity">Highest Qualification <span style="color:red;">*</span></label>
      <input type="text" name="highest" required class="form-control" placeholder="Highest Qualification" id="inputCity">
    </div>
    <div class="form-group col-md-4">
      <label for="inputCity">Passing date <span style="color:red;">*</span></label>
      <input type="date" name="passing_date" required class="form-control" id="inputCity">
    </div>
    <div class="form-group col-md-4">
      <label for="inputCity">Grade <span style="color:red;">*</span></label>
      <input type="text" name="grade" required class="form-control" placeholder="Grade" id="inputCity">
    </div>
  </div>
   <div class="form-row">
    <div class="form-group col-md-12">
      <label for="inputEmail4">Choose Department <span style="color:red;">*</span></label>
      <select class="form-control" required name="department_id">
              <option>--SELECT--</option>
              <?php 
                foreach ($department as $key => $value) {
                  ?><option value="<?php echo $value['id']?>"><?php echo $value['department']?></option><?php
                }
              ?>
       </select>
    </div>
  </div>
  <div class="form-row mb-5">
    <div class="form-group col-md-6">
      <label for="inputCity">Password <span style="color:red;">*</span></label>
      <input type="password" name="password" required class="form-control" placeholder="Password" id="inputCity">
    </div>
    <div class="form-group col-md-6">
      <label for="inputCity">Confirm Password <span style="color:red;">*</span></label>
      <input type="password" name="con_pass" required class="form-control" placeholder="Confirm Password" id="inputCity">
    </div>
  </div>
   <div class="form-row ">
    <div class="form-group col-md-6">
       <button type="submit" name="add-Faculty" class="btn btn-success">Submit</button>
    </div>
    <div class="form-group col-md-6">
      <a href="index.php" style="float: right;">Login</a>
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

