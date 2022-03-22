<?php
session_start();
include 'connection.php';
function Imageupload($dir,$inputname,$allext,$pass_width,$pass_height,$pass_size,$newname){
	if(file_exists($_FILES["$inputname"]["tmp_name"])){
		// do this contain any file check
		$file_extension = strtolower( pathinfo($_FILES["$inputname"]["name"], PATHINFO_EXTENSION));
		$error="";
		if(in_array($file_extension, $allext)){
			// file extension check
			list($width, $height, $type, $attr) = getimagesize($_FILES["$inputname"]["tmp_name"]);
			$image_weight = $_FILES["$inputname"]["size"];
			if($width <= "$pass_width" && $height <= "$pass_height" && $image_weight <= "$pass_size"){
				// dimension check
				$tmp = $_FILES["$inputname"]["tmp_name"];
				$extension[1]="jpg";
				$name=$newname.".".$extension[1];
				if(move_uploaded_file($tmp, "$dir" .$name)){
					return true;
				}
			}
			else{
				$error .="Please upload photo size of $pass_width X $pass_height !!!";
			}
		}
		else{
			$error .="Please upload an image !!!";
		}
	}
	else{
		$error .="Please Select an image !!!";
	}
	return $error;
}

if(isset($_POST['login'])){
	$email=$_POST['email'];
	$pass=$_POST['pass'];
	$query="SELECT * FROM `admin` WHERE `email`='$email' and `password`='$pass'";
	$run=mysqli_query($conn,$query);
	$num=mysqli_num_rows($run);
	if($num){
		header('location:dashboard.php');
	}
	else{
		$_SESSION['msg']='Invalid details !!!';
		header("Location: " . $_SERVER['HTTP_REFERER']);
	}
}

if(isset($_POST['add_event'])){
	$event_name=$_POST['event_name'];
	$query="INSERT INTO `add_event`(`event_name`) VALUES ('$event_name')";
	$sql=mysqli_query($conn,$query);
		if($sql){
			$_SESSION['msg']="Event Added Successfully !!!";
			header('Location:add_event.php');
		}
		else{
			$_SESSION['msg']="Event Not Added!!!";
			header("location:$_SERVER[HTTP_REFERER]");
		}
}

if(isset($_POST['update_event'])){
	$id=$_POST['id'];
	$event_name=$_POST['event_name'];                          
    $query="UPDATE `add_event` SET `event_name`='$event_name' WHERE `id`='$id'";
	$sql=mysqli_query($conn,$query);
	if($sql){
		 $_SESSION['msg']="Event Update Successfully !!!";
		 header('Location:add_event.php');			
	}
    else{
         $_SESSION['msg']="Event Not Update !!!";
         header("location:$_SERVER[HTTP_REFERER]");
    }   
}   

if(isset($_POST['del_event'])){
	$id=$_POST['id'];
	$query="UPDATE `add_event` SET `status`='0' WHERE `id`='$id'";
	// echo $query;die;	
	$run=mysqli_query($conn,$query);
	if($run===true){
		$_SESSION['msg']="Event Deleted Successfully !!!";
	}
	else{
		$_SESSION['msg']="Event Deletion Cancel !!!";
	}
}    
if(isset($_POST['add_city'])){
	$city_name=$_POST['city_name'];
	$query="INSERT INTO `add_city`(`city_name`) VALUES ('$city_name')";
	$sql=mysqli_query($conn,$query);
		if($sql){
			$_SESSION['msg']="city Added Successfully !!!";
			header('Location:add_city.php');
		}
		else{
			$_SESSION['msg']="city Not Added!!!";
			header("location:$_SERVER[HTTP_REFERER]");
		}
}
if(isset($_POST['update_city'])){
	$id=$_POST['id'];
	$city_name=$_POST['city_name'];                          
    $query="UPDATE `add_city` SET `city_name`='$city_name' WHERE `id`='$id'";
	$sql=mysqli_query($conn,$query);
	if($sql){
		 $_SESSION['msg']="city Update Successfully !!!";
		 header('Location:add_city.php');			
	}
    else{
         $_SESSION['msg']="city Not Update !!!";
         header("location:$_SERVER[HTTP_REFERER]");
    }   
}   

if(isset($_POST['del_city'])){
	$id=$_POST['id'];
	$query="UPDATE `add_city` SET `status`='0' WHERE `id`='$id'";
	// echo $query;die;	
	$run=mysqli_query($conn,$query);
	if($run===true){
		$_SESSION['msg']="city Deleted Successfully !!!";
	}
	else{
		$_SESSION['msg']="city Deletion Cancel !!!";
	}
} 

if(isset($_POST['add_partner'])){
	// echo '<pre>';
	// print_r($_FILES);
	// print_r($_POST);die;

	$company_name=$_POST['company_name'];
	$mobile=$_POST['mobile'];
	$address=$_POST['address'];
	$rate=$_POST['rate'];
	$rating=$_POST['rating'];
	$event=$_POST['event'];
	// print_r($_POST); die;
	$city=$_POST['city'];
	$photo = $_FILES['image']['name'];
	$photo = explode('.', $photo);
	$image = time().$photo[0];
	$imagename = $_FILES['image']['tmp_name'];
	list($width,$height)=getimagesize($_FILES['image']['tmp_name']);
	$dir="img/partner/";
	$allext=array("png","PNG","jpg","JPG","jpeg","JPEG","gif","GIF");
	$check=Imageupload($dir,'image',$allext,"2560","1024",'100000000',$image);
	if ($check===true) {
		$image = $image.".jpg";
		$query="INSERT INTO `add_partner`(`company_name`,`mobile`,`address`,`rate`,`rating`,`event`,`city`,`image`) VALUES ('$company_name','$mobile','$address','$rate', '$rating','$event','$city','$image')";
		$sql=mysqli_query($conn,$query);
		if($sql){
			$_SESSION['msg']="Addpartner Added Successfully !!!";
			header('Location:add_partner.php');
		}
		else{
			$_SESSION['msg']="Addpartner not Details Not Added !!!";
		}
	}
	else{
		$_SESSION['msg']=$check;
		header("location:$_SERVER[HTTP_REFERER]");
	}
}

if(isset($_POST['searchCompany'])){
	echo "hi";
}

if(isset($_POST['get_list'])){
		$id=$_POST['id'];
	$query "SELECT `event_name` FROM add_event
      WHERE event_name LIKE '$id%'";
      $run2=mysqli_query($conn,$query);
  while($data=mysqli_fetch_assoc($run2)){
    $list[]=$data;
  }
  print_r($list);
}





?>