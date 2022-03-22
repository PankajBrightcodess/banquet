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
	$query="SELECT * FROM `add_event` WHERE `status`='1'";
	$run=mysqli_query($conn,$query);
	while($data=mysqli_fetch_assoc($run)){
		$event[]=$data;
	}
	// echo '<pre>';
	// print_r($event); die;
?>
<!DOCTYPE html>
<html>
<head lang="en">
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<?php include 'header-links.php'; ?>

	<!-- <link rel="stylesheet" href="banquet/admin/s.css"> -->
	<title>ADD Event | Perfect Venue</title>
</head>
<body>
<?php include 'menu.php'; ?>	

	
<section>
	
	<div class="container">
		<div class="row">
			<div class="col-md-6" style="margin-top: 40px;">
				<form action="action.php" method="POST" enctype="multipart/form-data">
		       <div class="form-group">
		      <label class="label">Event Name</label>
			
		     	<input type="text" name="event_name" class="form-control" placeholder="Enter Event Name">
		     </div>
	     	<input type="submit" name="add_event" class="btn btn-success btn-sm" value="Submit">
	         </form>
			</div>
			
			<div class="col-md-6" style="margin-top: 60px;">
				<nav class="navbar navbar">
              <form class="form-inline">
               <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
               <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
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
  							if(!empty($event)){
  								foreach ($event as $key => $value) {
  									?>

  									 <tr>
			  						    <th scope="row"><?php echo $value['event_name']; ?></th>
			  						    <td><a href="edit_event.php?id=<?= $value['id']; ?>"><span class="btn btn-success">Edit</span></a></td>
			  						    <td><span class="btn btn-danger">Delete</span></td>
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
</section>
    
   <?php include'footer.php' ?>
  <?php include 'footer-link.php'; ?>
</body>
</html>


	