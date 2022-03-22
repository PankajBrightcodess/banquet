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
   $query="SELECT add_city.* ,add_event.event_name FROM add_city  INNER JOIN add_event  ON add_event.id = add_city.event_id  WHERE add_city.status=1";
   // echo '<pre>';
   // print_r($query);die;
     $run=mysqli_query($conn,$query);
    while($data=mysqli_fetch_assoc($run)){
      $city[]=$data;
    } 
    // echo '<pre>'; 
    // print_r($city);die;
    
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>City</title>
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
            <div class="card card-danger">
              <div class="card-header">
                <h3 class="card-title">Master Key City</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <div class="row">
                <div class="col-md-3">
                  <form role="form" action="action.php" method="post">
                    <div class="card-body">
                      <div class="row">
                        <div class="col-md-12">
                         
                          <label>Event<span style="color:red;">*</span></label>
                          <select class="form-control" required name="event_id">
                            <option>--SELECT--</option>
                            <?php 
                            if(!empty($event)){
                              foreach ($event as $key => $value) {
                                ?><option value="<?php echo $value['id']?>"><?php echo $value['event_name']?></option><?php
                              }

                            }
                            ?>
                          </select>
                        </div>
                        <div class="col-md-12">
                          <label>City<span style="color:red;">*</span></label>
                          <input type="text" name="city_name" class="form-control" required="" placeholder="Enter City:">
                        </div>
                        <div class="col-md-4">
                          <button class="btn btn-info btn-sm btn-block" type="submit" name="add_city" style="margin-top: 10px;">Save</button>
                        </div>
                      </div>
                    </div>
                  </form>
                </div>
                <div class="col-md-9">
                  <div class="department-list">
                     <div class="card">
              <div class="card-header">
                <h5 style="font-weight: bold;">City List</h5>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>S. No.:</th>
                    <th>Event</th>
                    <th>City</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>

                    <?php 
                        if(!empty($city)){$sn=0;
                          foreach ($city as $key => $row) {++$sn;
                            ?>
                              <tr>
                                <td><?php echo $sn; ?></td>
                                <td><?php echo $row['event_name']; ?></td>
                                <td><?php echo $row['city_name']; ?></td>
                                <td>
                                
                                      
                                  <button class="btn btn-sm btn-success editcity"  data-id="<?php echo $row['id']; ?>" data-event_id="<?php echo $row['event_id']; ?>" data-city_name="<?php echo $row['city_name']; ?>" data-toggle="modal" data-target="#exampleModal">&nbsp;&nbsp;<i class="far fa-edit nav-icon"></i>&nbsp;Edit</button>
                                      <button class="btn btn-sm btn-danger del" data-id="<?php echo $row['id'] ?>" type="submit" name="delete-department"> &nbsp;&nbsp;<i class="fa fa-trash-alt nav-icon"></i>&nbsp;Delete </button>
                                </td>
                              </tr>
                            <?php
                          }
                        }

                    ?>
                
                      
                     
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
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="POST" action="action.php">
      <div class="modal-body">
      <div class="row">
         <div class="col-md-12 mb-2">
              <label>Event<span style="color:red;">*</span></label>
              <select class="form-control" required name="event_id" id="event_id">
                <option>--SELECT--</option>
                <?php 
                if(!empty($event)){
                  foreach ($event as $key => $value) {
                    ?><option value="<?php echo $value['id']?>"><?php echo $value['event_name']?></option><?php
                  }

                }
                ?>
              </select>
         </div>
        <div class="col-md-12 col-lg-12 col-12 mb-2">
           <label>City<span style="color:red;">*</span></label>
          <input type="text" name="city_name" id="city_name" class="form-control">
          <input type="hidden" name="id" id="id" class="form-control">
        </div>

      </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" name="update_city" class="btn btn-info">Update</button>
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
    $('.del').click(function(e){
        debugger;
         var id=$(this).attr('data-id');
         if(confirm('Are you Sure !')){
         $.ajax({
                type:'POST',
                url:'action.php',
               data:{id:id,del_city:'del_city'},
                success: function(result){
                    console.log(result);
                    location.reload();
                    },

                    error: function(){ 
                       alert("error");
                    },
        });
    }
    return false;
    });

   $(document).ready(function(){

      $('body').on('click','.editcity',function(){
        debugger;
        $('#id').val($(this).data('id'));
        $('#event_id').val($(this).data('event_id'));
        $('#city_name').val($(this).data('city_name'));
      });
   });

 </script>
</body>
</html>
