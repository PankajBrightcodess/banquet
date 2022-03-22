<?php
session_start();
include('connection.php');
$msg="";
  if (isset($_SESSION['msg'])) {
      $msg = $_SESSION['msg'];
      unset($_SESSION['msg']);
  }
  if ($msg != "") {
      echo "<script> alert('$msg')</script>";
  }
 if($_GET['id']){
 	$id=$_GET['id'];
  	$query="SELECT * FROM `add_event` WHERE `id`='$id'";
 	  $run=mysqli_query($conn,$query);
		while($data=mysqli_fetch_assoc($run)){
			$event=$data;
			// print_r($event);
		}
    // print_r($event); die;
 }
 $query1="SELECT * FROM `add_event` WHERE `status`='1'";
  $run1=mysqli_query($conn,$query1);
  while($data=mysqli_fetch_assoc($run1)){
    $event1[]=$data;
  }
 ?>

<!DOCTYPE html>
<html>
<head lang="en">
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <?php include 'header-links.php'; ?>

  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <title> edit Event | Perfect Venue</title>
</head>
<body>

<?php include 'menu.php'; ?>
 <div class="container">
  <div class="row">
  <div class="col-md-6">
    <form action="action.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" class="form-control" value="<?php echo $event['id'] ?>">
            <div class="form-group">
                  <label class="label" style="margin-top: 90px;">Event Name</label><br>
                  <input type="text" name="event_name" class="form-control" value="<?php echo $event['event_name']; ?>">
              </div>
              
          <center><input type="submit" name="update_event" class="btn btn-success btn-sm" value="upadte"></center>
    </form>
  </div>
  
    <div class="col-md-6" style="margin-top: 60px;">
        <nav class="navbar navbar">
              <form class="form-inline">
               <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
               <button class="btn btn-outline-success my-2 my-sm-0" type="update">Search</button>
              </form>
             </nav>
        <div class="table-responsive">
          <table class="table">
              <thead>
                <tr>
                  <th scope="col">Event name</th>
                  <th scope="col">Edit</th>
                  <th scope="col">Delete</th>
                </tr>
              </thead>
              <tbody>
                <?php
                if(!empty($event1)){
                  foreach ($event1 as $key => $value1) {
                    ?>

                     <tr>
                        <td><?php echo $value1["event_name"]; ?></td>
                        <td><a href="edit_event.php?id=<?= $value1['id']; ?>" class="btn btn-success btn-lg">Edit</a></td>
                        <td><a class="del" data-id="<?php echo $value1['id']; ?>"><span class="btn btn-danger">Delete</span></a>
                        </td>
                     </tr>
                    <?php
                  }
                }

                ?>
                 
               <!--  <tr>
                  <th scope="row">birthday</th>
                  <td><span class="btn btn-success">Edit</span></td>
                  <td><span class="btn btn-success">Delete</span></td>
                  
                </tr>
                <tr>
                  <th scope="row">social event</th>
                  <td><span class="btn btn-success">Edit</span></td>
                  <td><span class="btn btn-success">Delete</span></td>
                  
                </tr> -->
              </tbody>
          </table>
        </div>
      </div>
  </div>
 </div>

   <?php include'footer.php' ?>
   <?php include 'footer-link.php'; ?>
   <script type="text/javascript">
     $(document).ready(function(){
        $("body").on("click",".del",function(){
        var id=$(this).attr('data-id');
          if (confirm('You Want To Delete !!!')) {
            $.ajax({
            url:"action.php",
            type:'POST',
            data:{id:id,del_event:'del_event'},
            success: function(data){
              location.reload();
              }
            });
          } 
        else {
          alert('Event Deletion Cancel !!!');
      }   
          });
     });
   </script>
</body>
</html>