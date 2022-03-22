<?php
session_start();
if($_SESSION['role']!='2'){
    header('location:index.php');
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
  <title>Assignment</title>
  <?php include'includes/header-links.php'; ?>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
    <?php include'includes/top-header.php'; ?>
    <?php include'includes/sidebar.php'; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
   <?php include'includes/page-header.php'; ?>

    <!-- Main content -->
   
  <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Exam</h3>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <form role="form" action="action.php" method="post">
                    <div class="card-body">
                      <div class="row">
                        <div class="col-md-6">
                            <label>Department<span style="color:red;">*</span></label>
                            <select class="form-control" required name="department_id">
                              <option>--SELECT--</option>
                              <?php 
                                foreach ($department as $key => $value) {
                                  ?><option value="<?php echo $value['id']?>"><?php echo $value['department']?></option><?php
                                }
                              ?>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label>Subject<span style="color:red;">*</span></label>
                            <select class="form-control" name="subject">
                              <option>--SELECT--</option>
                              <option value="hindi">Hindi</option>
                              <option value="english">English</option>
                              <option value="math">Math</option>
                              <option value="physics">Physics</option>
                              <option value="chemistry">Chemistry</option>
                              <option value="Biology">Biology</option>
                              <option value="history">History</option>
                              <option value="polity">Polity</option>
                              <option value="geogrophy">Geogrophy</option>
                              <option value="economy">Economy</option>
                            </select>
                        </div>
                          <div class="col-md-6 col-12">
                            <label>Create Exam Name</label>
                            <input type="text" name="exam_name" placeholder="Exam Name" class="form-control">
                          </div>
                          <div class="col-md-6 col-12">
                            <label>Timing</label>
                            <input type="time" name="timing" class="form-control">
                          </div>
                         <div class="col-md-4">
                            <button class="btn btn-primary btn-sm btn-block" type="submit" name="create-exam" style="margin-top: 10px;">Save</button>
                          </div> 
                      </div>
                      
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>






    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
 <?php include'includes/copyright.php'; ?>

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

<!-- Modal -->
<div class="modal fade" id="departmentModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><b>Assignment Update</b></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
       <form action="action.php" method="post">
        <div class="modal-body">
          <div class="row">
            <div class="col-md-12 col-12">
              <input type="hidden" name="id" id="id" class="form-control"> 
              <label>Department <span style="color:red;">*</span></label>
              <select class="form-control" required id="department_id"  name="department_id">
                  <option>--SELECT--</option>
                  <?php 
                    foreach ($department as $key => $value) {
                      ?><option selected value="<?php echo $value['id']?>"><?php echo $value['department']?></option><?php
                    }
                  ?>
              </select>
            </div>
            <div class="col-md-12 col-12">
              <label>Subject <span style="color:red;">*</span></label>
              <input type="text" name="subject" id="subject" class="form-control" required="">
            </div>
             <div class="col-md-12 col-12">
              <label>Unit <span style="color:red;">*</span></label>
              <input type="text" name="unit" id="unit" class="form-control" required="">
            </div>
           
          </div>
        </div>
        <div class="modal-footer">
          <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
          <button type="submit" name="change-assignment" class="btn btn-primary">Save changes</button>
        </div>
     </form>
    </div>
  </div>
</div>
 <script type="text/javascript">
   $(document).ready(function(){
      $('body').on('click','.editdepartment',function(){
        $('#id').val($(this).data('id'));
        $('#department_id').val($(this).data('department_id'));
        $('#subject').val($(this).data('subject'));
        $('#unit').val($(this).data('unit'));
      });
   });
 </script>
</body>
</html>
