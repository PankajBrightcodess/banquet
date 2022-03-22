<?php
session_start();
if($_SESSION['role']!='1'){
    header('location:index.php');
  }
include'connection.php';
$msg = "";
    if (isset($_SESSION['msg'])) {
        $msg = $_SESSION['msg'];
        unset($_SESSION['msg']);
    }
    if ($msg != "") {
        echo "<script> alert('$msg')</script>";
    }
    
   
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Enquery List</title>
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
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-danger  ">
              <div class="card-header">
                <h3 class="card-title">Enquiry</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <div class="row">
                <div class="col-md-12">
                  <div class="department-list">
                     <div class="card">
              <div class="card-header">
                <h5 style="font-weight: bold;">Enquiry List</h5>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>S. No.:</th>
                    <th>Name</th>
                    <th>Address</th>
                    <th>City</th>
                    <th>Dist</th>
                    <th>Mobile</th>
                    <th>Email</th>
                    <th>Which Event</th>
                    <th>Event Date</th>
                    <!-- <th>Action</th> -->
                    
                  </tr>
                  </thead>
                  <tbody >
                 <?php 
                 $sql = "SELECT * FROM `enquiry` WHERE `status`='1'";
                  $res = mysqli_query($conn,$sql);
                  while($data = mysqli_fetch_assoc($res)){
                    $enquiry[]=$data;
                  }
                  // echo '<pre>';
                  // print_r($enquiry);die; 
                 if(!empty($enquiry)){$sn=0;
                  // echo '<pre>';
                  // print_r($partner);
                  foreach ($enquiry as $key => $row) {$sn++;
                    ?>
                      <tr>
                        <td><?php echo $sn; ?></td>
                        <td><?php echo $row['st_name']; ?></td>
                        <td><?php echo $row['address']; ?></td>
                        <td><?php echo $row['city']; ?></td>
                        <td><?php echo $row['dist']; ?></td>
                        <td><?php echo $row['mobile']; ?></td>
                        <td><?php echo $row['email']; ?></td>
                        <td><?php echo $row['events_name']; ?></td>
                        <!-- <td><?php echo $row['date']; ?></td> -->
                        <td><?php echo date('d-m-Y', strtotime($row['date'])); ?></td>
                       <!--  <td><button class="btn btn-sm btn-success editpartner" data-id="<?php echo $row['id']; ?>" data-st_name="<?php echo $row['st_name']; ?>" data-address="<?php echo $row['address']; ?>" data-city="<?php echo $row['city'];?>" data-dist="<?php echo $row['dist']; ?>" data-mobile="<?php echo $row['mobile'];?>" data-email="<?php echo $row['email'];?>" data-events_name="<?php echo $row['events_name'];?>" data-date="<?php echo $row['date'];?>" data-toggle="modal" data-target="#exampleModal" >&nbsp;&nbsp;<i class="far fa-edit nav-icon" ></i>       &nbsp;Edit</button>
                        </td>  -->

                    <?php
                  }
                 }
                         
                ?>
                        
                            
                        </tr>
                 
                    </tbody>
                 
                </table>
              </div>
              <!-- /.card-body -->
            </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Partner Edit</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="POST" action="action.php">
      <div class="modal-body">
      <div class="row">
        <div class="col-md-12 col-lg-12 col-12 mb-2">
           <label>Name <span style="color:red;">*</span></label>
          <input type="text" name="st_name" id="st_name" class="form-control">
          <input type="hidden" name="id" id="ids" class="form-control">
       </div>
        <div class="col-md-12 mb-2">
          <label>Address<span style="color:red;">*</span></label>
          <input type="text" name="address" id="address" class="form-control" required="" placeholder="Enter Address :">
        </div>
        <div class="col-md-12 mb-2">
          <label>City<span style="color:red;">*</span></label>
          <input type="text" name="city" id="city" class="form-control" required="" placeholder="Enter Address :">
        </div>
        <div class="col-md-12 mb-2">
          <label>Dist<span style="color:red;">*</span></label>
          <input type="text" name="dist" id="dist" class="form-control" required="" placeholder="Enter Address :">
        </div>
        <div class="col-md-12 mb-2">
          <label>Mobile<span style="color:red;">*</span></label>
          <input type="text" name="mobile" id="mobile" class="form-control" required="" placeholder="Enter Address :">
        </div>  
        <div class="col-md-12 mb-2">
          <label>Email<span style="color:red;">*</span></label>
          <input type="email" name="email" id="email" class="form-control" required="" placeholder="Example@gmail.com :">
        </div>
         <div class="col-md-12 mb-2">
          <label>Event Name.<span style="color:red;">*</span></label>
          <input type="text" name="events_name" id="events_name" class="form-control" required="" placeholder="Enter Aadhar :">
        </div>
        <div class="col-md-12 mb-2">
          <label>Event Date<span style="color:red;">*</span></label>
          <input type="text" name="date" id="date" class="form-control" required="" placeholder="Enter New Password :">
        </div>

      </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" name="update_event" class="btn btn-info">Update</button>
      </div>
      </form>
    </div>
  </div>
</div>






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

<script type="text/javascript">
  $('.formdata').click(function(e){
    // debugger;
    var name = $('#name').val();  
    var fname = $('#fname').val();
    var address = $('#address').val();
    var mobile = $('#mobile').val();
    var alt_mobile = $('#alt_mobile').val();
    var email = $('#email').val();
    var aadhar = $('#aadhar').val();
    var password = $('#password').val();
    $.ajax({
      type:'POST',
      url:'action.php',
      data:{name:name,fname:fname,address:address,mobile:mobile,alt_mobile:alt_mobile,email:email,aadhar:aadhar,password:password,add_partner:'add_partner'},
       success: function(result){
                    console.log(result);
                   location.reload();
                    },

                    error: function(){ 
                       alert("error");
                    },
    })
   
  });
</script>
 <script type="text/javascript">
   $(document).ready(function(){
      $('body').on('click','.editpartner',function(){
        debugger;
        $('#ids').val($(this).data('id'));
        $('#st_name').val($(this).data('st_name'));
        $('#address').val($(this).data('address'));
        $('#city').val($(this).data('city'));
        $('#mobile').val($(this).data('mobile'));
        $('#email').val($(this).data('email'));
        $('#events_name').val($(this).data('events_name'));
        $('#date').val($(this).data('date'));
        // $('#passwords').val($(this).data('password'));
      });
   });
 </script>
</body>
</html>
