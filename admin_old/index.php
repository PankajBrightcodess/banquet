 <?php 
	session_start();
	$msg = "";
		if(isset($_SESSION['msg'])){
			$msg = $_SESSION['msg'];
			unset($_SESSION['msg']);
		}
		if($msg != ""){
			echo "<script> alert('$msg') </script>";
		}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<?php include 'header-links.php'; ?>
	<title>Admin Login | perfect venue</title>
</head>
        <body style="background-color: #4e598f;">
        <section class="login" >
		   <div class="container">
			  <div class="row justify-content-center">
				
			    	<div class="col-md-6">
				    	<div class="login-form">
						<div class="logo-section">
							<h1 style="font-size: 35px;" class="text-center">Perfect Venue</h1><hr>
							<h3 class="text-light">Admin Login</h3>
						</div>
						<form action="action.php" method="POST">
							<div class="form-group">
								<i class="fa fa-envelope-square fa-lg passkey"></i>
								<input type="email" name="email" placeholder="Enter User Id:" class="form-control" required="" style="padding-left: 30px;">
							</div>
							<div class="form-group">
								<i class="fa fa-key fa-lg passkey"></i>
								<input type="password" name="pass" placeholder="Enter Password:" class="form-control" required="" style="padding-left: 30px;">
							</div>
							<input type="submit" class="btn btn-primary form-control" name="login" value="Login">
						</form>
					</div>
				</div>
				
			</div>
		</div>
	</section>
	<?php include 'footer-link.php'; ?>
</body>