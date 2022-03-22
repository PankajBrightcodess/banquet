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
<html>
<head lang="en">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<?php include 'header-links.php'; ?>
	<title>dashboard</title>
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<link rel="stylesheet" href="banquet/admin/style.css">
  <!-- <link rel="stylesheet" href="banquet/admin/s.css"> -->
</head>
  <body>
    <?php include 'menu.php'; ?>
  


 
 
 
  <?php include'footer.php' ?>
  <?php include 'footer-link.php'; ?>
   
  </body>
</html>