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
    $query="SELECT * FROM `add_city` WHERE `id`='$id'";
    $run=mysqli_query($conn,$query);
    while($data=mysqli_fetch_assoc($run)){
      $city=$data;
      // print_r($city);
    }
    // print_r($city); die;
 }
 $query1="SELECT * FROM `add_city` WHERE `status`='1'";
  $run1=mysqli_query($conn,$query1);
  while($data=mysqli_fetch_assoc($run1)){
    $city1[]=$data;
  }
 ?>

<!DOCTYPE html>
<html>
<head lang="en">
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <?php include 'header-links.php'; ?>

  <!-- <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css"> -->
  <title> edit Event | Perfect Venue</title>
</head>
<body>

<?php include 'menu.php'; ?>
 <div class="container">
  <div class="row">
  <div class="col-md-6">
    <form action="action.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" class="form-control" value="<?php echo $city['id'] ?>">
            <div class="form-group">
                  <label class="label" style="margin-top: 90px;">City Name</label><br>
                  <input type="text" name="city_name" class="form-control" value="<?php echo $city['city_name']; ?>">
              </div>
              
          <center><input type="submit" name="update_city" class="btn btn-success btn-sm" value="upadte"></center>
    </form>
  </div>
  
    <div class="col-md-6" style="margin-top: 60px;">
        <div class="table-responsive">
          <table class="table">
              <thead>
                <tr>
                  <th scope="col">City name</th>
                  <th scope="col">Edit</th>
                  <th scope="col">Delete</th>
                </tr>
              </thead>
              <tbody>
                <?php
                if(!empty($city1)){
                  foreach ($city1 as $key => $value1) {
                    ?>

                     <tr>
                        <td><?php echo $value1["city_name"]; ?></td>
                        <td><a href="edit_city.php?id=<?= $value1['id']; ?>" class="btn btn-success btn-lg">Edit</a></td>
                        <td><a class="del" data-id="<?php echo $value1['id']; ?>"><span class="btn btn-danger">Delete</span></a>
                        </td>
                     </tr>
                    <?php
                  }
                }

                ?>
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
            data:{id:id,del_city:'del_city'},
            success: function(data){
              location.reload();
              }
            });
          } 
        else {
          alert('City Deletion Cancel !!!');
      }   
          });
     });
   </script>
</body>
</html>