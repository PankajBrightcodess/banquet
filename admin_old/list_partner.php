<?php 
session_start();
include_once('connection.php');
$msg = "";
	if (isset($_SESSION['msg'])) {
		$msg=$_SESSION['msg'];
		unset($_SESSION['msg']);
	}
	if ($msg != "") {
		echo "<script> alert('$msg') </script>";
	}
	$query3="SELECT * FROM `list_partner` WHERE `status`='1'";
	$run=mysqli_query($conn,$query3);
	while($data=mysqli_fetch_assoc($run)){
		$city[]=$data;
	}
	// echo '<pre>';
	// print_r($city); die;
?>
<!doctype html>
<html>
  <head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<?php include 'header-links.php'; ?>
 </head>
   <body>
     <?php include 'menu.php' ?>
          <div class="container">
           <div class="row">
            <div class="col-md-12" style="margin-top: 60px;">
             <div class="table-responsive">
                <table class="table">
                 <thead>
                  <tr>
                   <th scope="col">city name</th>
                   <th scope="col">Mobile no</th>
                   <th scope="col">Address</th>
                   <th scope="col">Rate</th>
                   <th scope="col">City</th>
                   <th scope="col">Event</th>
                   <th scope="col">Rating</th>
                   <th scope="col">Edit</th>
                   <th scope="col">Delete</th>
                </tr>
              </thead>
              <tbody>
                <?php
                if(!empty($city)){
                  foreach ($city as $key => $value2) {
                    ?>

                     <tr>
                       <th scope="row"><?php echo $value['list_part']; ?></th>
                        <td><a href="list_partner.php?id=<?= $value['id']; ?>"><span class="btn btn-success">Edit</span></a></td>
                        <td><span class="btn btn-danger">Delete</span></td>
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
       <?php include'footer-link.php' ?>
       <script type="text/javascript">
        $(document).ready(function(){
        $("body").on("click",".del",function(){
          var id=$(this).attr('data-id');
           if (confirm('You Want To Delete !!!')) {
            $.ajax({
            url:"action.php",
            type:'POST',
            data:{id:id,del_list_partner:'del_list_partner'},
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

     </body>
   </html>