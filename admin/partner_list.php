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
    $query="SELECT * FROM `add_event` WHERE `status`='1'";
  $run=mysqli_query($conn,$query);
  while($data=mysqli_fetch_assoc($run)){
    $event[]=$data;
  }


    
   
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Partner List</title>
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
                <h3 class="card-title">Partner</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <div class="row">
                   <div class="col-md-3">
                  <form role="form" action="#" id="form_data" enctype="multipart/form-data" method="post">
                    <div class="card-body">
                      <div class="row">
                        <div class="col-md-12 mb-2">
                          <label>Name <span style="color:red;">*</span></label>
                          <input type="text" name="name" id="name" class="form-control" required="" placeholder="Enter Name :">
                        </div>
                         <div class="col-md-12 mb-2">
                          <label>Father's Name <span style="color:red;">*</span></label>
                          <input type="text" name="fname" id="fname" class="form-control" required="" placeholder="Enter Father's Name :">
                        </div>
                         <div class="col-md-12 mb-2">
                          <label>Address<span style="color:red;">*</span></label>
                          <input type="text" name="address" id="address" class="form-control" required="" placeholder="Enter Address :">
                        </div>
                        <div class="col-md-12 mb-2">
                          <label>Event/Category<span style="color:red;">*</span></label>
                          <select class="form-control event" id="event">
                            <option>---Select---</option>
                            <?php 
                                if(!empty($event)){
                                    foreach ($event as $key => $value) {
                                      ?><option value="<?php echo $value['id'];?>"><?php echo $value['event_name'];?></option><?php
                                    }
                                }
                            ?>
                          </select>
                        </div>
                          <div class="col-md-12 mb-2">
                          <label>City<span style="color:red;">*</span></label>
                          <select class="form-control city" id="city">
                            <!-- <option>---Select---</option> -->
                           
                          </select>
                        </div>
                         <div class="col-md-12 mb-2">
                          <label>Mobile<span style="color:red;">*</span></label>
                          <input type="text" name="mobile" id="mobile" class="form-control" required="" placeholder="Enter Address :">
                        </div>
                        <div class="col-md-12 mb-2">
                          <label>Alternative Mobile<span style="color:red;">*</span></label>
                          <input type="text" name="alt_mobile" id="alt_mobile" class="form-control" required="" placeholder="Enter Address :">
                        </div>
                        <div class="col-md-12 mb-2">
                          <label>Email<span style="color:red;">*</span></label>
                          <input type="email" name="email" id="email" class="form-control" required="" placeholder="Example@gmail.com :">
                        </div>
                         <div class="col-md-12 mb-2">
                          <label>Aadhar No.<span style="color:red;">*</span></label>
                          <input type="text" name="aadhar" id="aadhar" class="form-control" required="" placeholder="Enter Aadhar :">
                        </div>
                        <div class="col-md-12 mb-2">
                          <label>Password.<span style="color:red;">*</span></label>
                          <input type="password" name="password" id="password" class="form-control" required="" placeholder="Enter New Password :">
                        </div>
                       <!--  <div class="col-md-12 mb-2">
                          <label>Upload Image.<span style="color:red;">*</span></label>
                          <input type="file" name="upload_image" id="upload_image" class="form-control" required="" placeholder="Enter New Password :">
                        </div> -->
                        <div class="col-md-4">
                          <button class="btn btn-info btn-sm btn-block formdata" type="button" name="add_partner" style="margin-top: 10px;">Save</button>
                        </div>
                      </div>
                    </div>
                  </form>
                </div>
               
                
                <div class="col-md-9">
                  <div class="department-list">
                     <div class="card">
              <div class="card-header">
                <h5 style="font-weight: bold;">Partner List</h5>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>S. No.:</th>
                    <th>Name</th>
                    <th>Father's Name</th>
                    <th>Address</th>
                    <th>Mobile</th>
                    <th>Alt. Mobile</th>
                    <th>Email Id</th>
                    <th>Aadhar</th>
                    <th>Password</th>
                    <th>Reg. Date</th>
                    <th>Action</th>
                    
                  </tr>
                  </thead>
                  <tbody >
                 <?php 
                 $sql = "SELECT * FROM `partner_details` WHERE `status`='1'";
                  $res = mysqli_query($conn,$sql);
                  while($data = mysqli_fetch_assoc($res)){
                    $partner[]=$data;
                  } 
                 if(!empty($partner)){$sn=0;
                  // echo '<pre>';
                  // print_r($partner);
                  foreach ($partner as $key => $row) {$sn++;
                    ?>
                      <tr>
                        <td><?php echo $sn; ?></td>
                        <td><?php echo $row['name']; ?></td>
                        <td><?php echo $row['fname']; ?></td>
                        <td><?php echo $row['address']; ?></td>
                        <td><?php echo $row['mobile']; ?></td>
                        <td><?php echo $row['alt_mobile']; ?></td>
                        <td><?php echo $row['email']; ?></td>
                        <td><?php echo $row['aadhar']; ?></td>
                        <td><?php echo $row['password']; ?></td>
                        <td><?php echo date('d-m-Y', strtotime($row['added_on'])); ?></td>
                        <td><button class="btn btn-sm btn-success editpartner" data-id="<?php echo $row['id']; ?>" data-name="<?php echo $row['name']; ?>" data-fname="<?php echo $row['fname']; ?>" data-address="<?php echo $row['address'];?>" data-mobile="<?php echo $row['mobile']; ?>" data-alt_mobile="<?php echo $row['alt_mobile'];?>" data-email="<?php echo $row['email'];?>" data-aadhar="<?php echo $row['aadhar'];?>" data-password="<?php echo $row['password'];?>" data-toggle="modal" data-target="#exampleModal" >&nbsp;&nbsp;<i class="far fa-edit nav-icon" ></i>       &nbsp;Edit</button>
                        </td> 

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
          <input type="text" name="name" id="names" class="form-control">
          <input type="hidden" name="id" id="ids" class="form-control">
       </div>
        <div class="col-md-12 mb-2">
          <label>Father's Name <span style="color:red;">*</span></label>
          <input type="text" name="fname" id="fnames" class="form-control" required="" placeholder="Enter Father's Name :">
        </div>
        <div class="col-md-12 mb-2">
          <label>Address<span style="color:red;">*</span></label>
          <input type="text" name="address" id="addresss" class="form-control" required="" placeholder="Enter Address :">
        </div>
        <div class="col-md-12 mb-2">
          <label>Mobile<span style="color:red;">*</span></label>
          <input type="text" name="mobile" id="mobiles" class="form-control" required="" placeholder="Enter Address :">
        </div>
        <div class="col-md-12 mb-2">
          <label>Alternative Mobile<span style="color:red;">*</span></label>
          <input type="text" name="alt_mobile" id="alt_mobiles" class="form-control" required="" placeholder="Enter Address :">
        </div>
        <div class="col-md-12 mb-2">
          <label>Email<span style="color:red;">*</span></label>
          <input type="email" name="email" id="emails" class="form-control" required="" placeholder="Example@gmail.com :">
        </div>
         <div class="col-md-12 mb-2">
          <label>Aadhar No.<span style="color:red;">*</span></label>
          <input type="text" name="aadhar" id="aadhars" class="form-control" required="" placeholder="Enter Aadhar :">
        </div>
        <div class="col-md-12 mb-2">
          <label>Password.<span style="color:red;">*</span></label>
          <input type="password" name="password" id="passwords" class="form-control" required="" placeholder="Enter New Password :">
        </div>
        

      </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" name="update_partner" class="btn btn-info">Update</button>
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
    debugger;
    var name = $('#name').val();  
    var fname = $('#fname').val();
    var address = $('#address').val();
    var event = $('#event').val();
    var city = $('#city').val();
    var mobile = $('#mobile').val();
    var alt_mobile = $('#alt_mobile').val();
    var email = $('#email').val();
    var aadhar = $('#aadhar').val();
    var password = $('#password').val();
    var upload_image = $('#upload_image').val();
    // var upload_image = Base64.encode(upload_imag);
    // alert(upload_image);
    $.ajax({
      type:'POST',
      url:'action.php',
      data:{name:name,fname:fname,address:address,event:event,city:city,mobile:mobile,alt_mobile:alt_mobile,email:email,aadhar:aadhar,password:password,add_partner:'add_partner'},
       success: function(result){
                    console.log(result);
                   location.reload();
                    },

                    error: function(){ 
                       alert("error");
                    },
    })
   
  });


  $('.event').change(function(e){
    debugger;
    var id = $(this).val();  
    
    $.ajax({
      type:'POST',
      url:'action.php',
      data:{id:id,list_city:'list_city'},
       success: function(result){
                    console.log(result);
                          $('.city').html(result);
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
        // debugger;
        $('#ids').val($(this).data('id'));
        $('#names').val($(this).data('name'));
        $('#fnames').val($(this).data('fname'));
        $('#addresss').val($(this).data('address'));
        $('#mobiles').val($(this).data('mobile'));
        $('#alt_mobiles').val($(this).data('alt_mobile'));
        $('#emails').val($(this).data('email'));
        $('#aadhars').val($(this).data('aadhar'));
        $('#passwords').val($(this).data('password'));
      });
   });
 </script>
</body>
</html>
