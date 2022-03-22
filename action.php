<?php 
session_start();
include 'admin/connection.php';
function Imageupload($dir,$inputname,$allext,$pass_width,$pass_height,$pass_size,$newname){
	// print_r($inputname);
	// print_r($_FILES["$inputname"]["tmp_name"]);die;
	if(file_exists($_FILES["$inputname"]["tmp_name"])){
		// do this contain any file check
		$file_extension = strtolower( pathinfo($_FILES["$inputname"]["name"], PATHINFO_EXTENSION));
		$error="";
			// print_r($file_extension);die;
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
// '''''''''''''''''''''''''''''''''''''''


if(isset($_POST['list_city'])){
	$id = $_POST['id'];
	$query="SELECT * FROM `add_city` WHERE `event_id`='$id' and `status`='1'";
	$run=mysqli_query($conn,$query);
	  while($data=mysqli_fetch_assoc($run)){
      $city[]=$data;
    }

    if(!empty($city)){
    	// $html.= "<option value="">---SELECT---</option>";
    	foreach ($city as $key => $value) {
    		$html = "<option value=".$value['id'].">".$value['city_name']."</option>";
    		print_r($html);
    	}	   
    }	
		
}
//'''''''''''''''''''''city end''''''''''''''''''''''
if(isset($_POST['get_partner_list'])){
	// echo '<pre>';
	// print_r($_POST);
	$event_id = $_POST['event_id'];
	$city_id = $_POST['city_id'];
	$query="SELECT * FROM `partner_details` WHERE `event`='$event_id' AND `city`='$city_id'";
	$run = mysqli_query($conn,$query);
	while($data=mysqli_fetch_assoc($run)){
		$partner[]=$data;
	}
	// echo '<pre>';
	// print_r($partner);die;
	if(!empty($partner)){
		foreach ($partner as $key => $value) {

			$html = '<div class="box ">';
			    $html.='<div class="container">';
			      $html.='<div class="card">';
			        $html.='<div class="row">';
			          $html.='<div class="col-md-4">';
			            $html.='<img src="b1.jpeg" width="100%">';
			            $html.='</div>';
			            $html.='<div class="col-md-4 text-center">';
			            $html.='<h4 style="padding-top: 20px;">'.$value['name'].'</h4>';
			            $html.='<p><span class="green-box">4.1</span>';
			            $html.='<span class="fa fa-star checked"></span>';
			            $html.='<span class="fa fa-star checked"></span>';
			            $html.='<span class="fa fa-star checked"></span>';
			            $html.='<span class="fa fa-star"></span>';
			            $html.='<span class="fa fa-star"></span></p>';
			            $html.='<p><i style="color: red;"class="fas fa-phone fa-rotate-90"></i> +91-'.$value['mobile'].'</p>';
			            $html.='<p><i  style="color: red;"class="fas fa-arrow-right"> </i>'.$value['address'].'</p>';
			            if($value['approve_status']==1){
			            	$html.='<img src="jdvrsl_verified.svg" width="20%">';
			            }
			            
			          $html.='</div>';
			          $html.='<div class="col-md-4">';
			            $html.='<a class="green-btn best" href="#">Best Deal <img src="next.png" width="10%"></a>';
			          $html.='</div>';
			        $html.='</div>';
			      $html.='</div>';

			    $html.='</div>';
			  $html.='</div>';
		    echo $html;
		}

		
	}
	else{
		$html = '<div class="box ">';
			    $html.='<div class="container">';
			      $html.='<div class="card">';
			        $html.='<div class="row">';
			         $html.='<div class="col-md-12">';
			            $html.='<h2>Sorry! No Such Records</h2>';
			          $html.='</div>';
			          
			        $html.='</div>';
			      $html.='</div>';

			    $html.='</div>';
			  $html.='</div>';
			  echo $html;

	}
	// echo $html;
}	

	
   


   // ''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''Center Area Start'''''''''''''''''''''''''''''''''''''''''''''''''''''''''''


   
?>