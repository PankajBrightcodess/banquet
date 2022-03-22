<?php 
session_start();
include '../admin/connection.php';
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
// if(isset($_POST['studentregister'])){
// 	$username = $_POST['username'];
// 	$applicantname = $_POST['applicantname'];
// 	$email = $_POST['email'];
// 	$con_email = $_POST['con_email'];
// 	$password = $_POST['password'];
// 	$con_password = $_POST['con_password'];
// 	$mobile = $_POST['mobile'];
// 	$con_mobile = $_POST['con_mobile'];
// 	$added_on = date('Y-m-d');
// 	$query="SELECT * FROM `student_register` WHERE `email`='$email'";
// 	$run=mysqli_query($conn,$query);
// 	$num=mysqli_num_rows($run);
// 	if($num){
// 		$_SESSION['msg']='You have Already Registered !';
// 		header("Location: ".$_SERVER['HTTP_REFERER']);
// 	}else{
// 		if($email==$con_email && $password==$con_password && $mobile==$con_mobile){
// 			$query="INSERT INTO `student_register`(`username`,`student_name`,`email`,`password`,`mobile`,`added_on`) VALUES ('$username','$applicantname','$email','$password','$mobile','$added_on')";
// 			$sql=mysqli_query($conn,$query);
// 			if($sql){
// 				header("Location:index.php");
// 				$_SESSION['msg']="Successfully Added!!!";	
// 			}
// 			else{
// 				$_SESSION['msg']="Not added !!!";
// 				header("Location:$_SERVER[HTTP_REFERER]");
// 			}
// 		}
// 		else{
// 			    $_SESSION['msg']="Something Error !!!";
// 			    header("Location:$_SERVER[HTTP_REFERER]");
// 		}
		
// 	}
// }

	if(isset($_POST['partnerlogin'])){
		// echo '<pre>';
		// print_r($_POST);die;
	$email=$_POST['email'];
	$pass=$_POST['pass'];
	$query="SELECT * FROM `partner_details` WHERE `email`='$email' and `password`='$pass'";
	$run=mysqli_query($conn,$query); 
	$num=mysqli_num_rows($run);
	if($num){
		$data=mysqli_fetch_assoc($run);
		// echo '<pre>';
		// print_r($data);die;
		$_SESSION['id'] = $data['id'];
		$_SESSION['name'] = $data['name'];
		$_SESSION['role'] = $data['role'];
		header('location:dashboard.php');		
	}
	else{
		$_SESSION['msg']='Invalid details !!!';
		header("Location: ".$_SERVER['HTTP_REFERER']);
	}
}

// ................garbage....................


if(isset($_POST['add_notice'])){

	$notice_id = $_POST['notice_id'];
	$notice_title = $_POST['notice_title'];
	$notice = $_POST['notice'];
	$principal_name= $_POST['principal_name'];
	$added_on = date('Y-m-d');
	$query="SELECT * FROM `student_register` WHERE `email`='$email'";
	$run=mysqli_query($conn,$query);
	$num=mysqli_num_rows($run);
	if($num){
	$query="INSERT INTO `principal_notice`(`notice_id`,`notice_heading`,`notice`,`principal_name`,`added_on`) VALUES ('$notice_id','$notice_title','$notice','$principal_name','$added_on')";
		$sql=mysqli_query($conn,$query);
		if($sql){
			 header("Location:$_SERVER[HTTP_REFERER]");
			$_SESSION['msg']="Successfully Added!!!";	
		}
		else{
			$_SESSION['msg']="Not added result !!!";
			header("Location:$_SERVER[HTTP_REFERER]");
		}
	}
	else{
		$_SESSION['msg']='Notice Id Already Exist !';
		header("Location: ".$_SERVER['HTTP_REFERER']);
	}
}

if(isset($_POST['update_notice'])){
	// echo '<pre>';
	// print_r($_POST);die;
	$id = $_POST['id'];
	$notice_id = $_POST['notice_id'];
	$notice_title = $_POST['notice_title'];
	$notice = $_POST['notice'];
	$query="UPDATE `principal_notice` SET `notice_id`='$notice_id',`notice_heading`='$notice_title',`notice`='$notice' WHERE `id`='$id'";
				$run=mysqli_query($conn,$query);
				if($run){
					 header('Location:view_notice.php');
					$_SESSION['msg']="Notice Update Successfully !!!";	
				}
				else{
					$_SESSION['msg']="Notice Not Updated!!!";
					header("location:$_SERVER[HTTP_REFERER]");
				}
}

if(isset($_POST['del_notice'])){
	$id = $_POST['id'];	
	$query="DELETE FROM `principal_notice` WHERE `id`='$id'";
	$sql=mysqli_query($conn,$query);
	if($sql){
		 header('Location:view_notice.php');
		$_SESSION['msg']="Notice Deleted Successfully !!!";	
	}
	else{
		$_SESSION['msg']="Notice Not Deleted!!!";
		header("location:$_SERVER[HTTP_REFERER]");
	}
}


if(isset($_POST['resultupload'])){
	
		$enroll=$_POST['enroll'];
		$course=$_POST['course'];
		$name=$_POST['name'];
		$center_id=$_POST['center_id']; 
		$added_on=date('Y-m-d');
		$photo = $_FILES['upload_image']['name'];
		$photo = explode('.',$photo);
		$image= time().$photo[0];
		$imagename = $_FILES['upload_image']['tmp_name'];
			list($width,$height)=getimagesize($_FILES['upload_image']['tmp_name']);
		$dir="../upload/";
		$allext=array("png","PNG","jpg","JPG","jpeg","JPEG","GIF","gif","pdf");
		$check = Imageupload($dir,'upload_image',$allext,"1800000","1800000",'100000000',$image);	
			// print_r($check);die;
		if($check===true){
			$image = $image.".jpg";	
			$query="INSERT INTO `result`(`enroll`,`course`,`name`,`upload_image`,`added_on`,`center_id`) VALUES ('$enroll','$course','$name','$image','$added_on','$center_id')";
			$sql=mysqli_query($conn,$query);
			if($sql){
				 header("Location:$_SERVER[HTTP_REFERER]");
				$_SESSION['msg']="Successfully Added!!!";	
			}
			else{
				$_SESSION['msg']="Not added result !!!";
				header("Location:$_SERVER[HTTP_REFERER]");
			}
		}
		else{
			$_SESSION['msg']=$check;
			header("location:$_SERVER[HTTP_REFERER]");	
		}
}


if(isset($_POST['del_result'])){
		
	$id = $_POST['id'];	
	$query="DELETE FROM `result` WHERE `id`='$id'";
	$sql=mysqli_query($conn,$query);
	if($sql){
		 header('Location:uploadresult.php');
		$_SESSION['msg']="Center Deleted Successfully !!!";	
	}
	else{
		$_SESSION['msg']="Center Not Deleted!!!";
		header("location:$_SERVER[HTTP_REFERER]");
	}
   }


   if(isset($_POST['change_student_pass'])){
   	// print_r($_POST);die;
   	$email = $_POST['email'];
	$query="SELECT * FROM `student` WHERE `email`='$email'";
	$run=mysqli_query($conn,$query);
		$num=mysqli_num_rows($run);
		if($num){
		$data=mysqli_fetch_assoc($run);
		$_SESSION['id'] = $data['id'];
		$_SESSION['enroll_no'] = $data['enroll_no'];
		if(!empty($_SESSION['enroll_no'])){
			header('location:newpassword_student.php');
		}
		else{
			$_SESSION['msg']="Please Enter Correct Email id";
			header("Location: " . $_SERVER['HTTP_REFERER']);
		}
		 }	
		else{
			$_SESSION['msg']="Please Enter Correct Email id";
			header("Location: " . $_SERVER['HTTP_REFERER']);
		}
   }

   if(isset($_POST['update_password_student'])){
   	// echo '<pre>';
   	// print_R($_POST);die;
		
		   if($_POST['new_pass']==$_POST['con_pass']){
		   	   $pass = $_POST['con_pass'];
				$id = $_SESSION['id'];
				$query="UPDATE `student` SET `pass`='$pass' WHERE `id`='$id'";
				$run=mysqli_query($conn,$query);
				if($run){
					 header('Location:index.php');
					$_SESSION['msg']="Password Updated Successfully !!!";	
				}
				else{
					$_SESSION['msg']="Password Not Updated!!!";
					header("location:$_SERVER[HTTP_REFERER]");
				}
			}
			else{
				$_SESSION['msg']="Please Enter Correct Password";
				header("Location: " . $_SERVER['HTTP_REFERER']);
			}
	}


	// '''''''''''''''''Department area start''''''''''''''''''''''
	if(isset($_POST['add-department'])){

		$department = $_POST['department'];
		$added_on = date('Y-m-d');
		;
		$query="INSERT INTO `department_master`(`department`,`added_on`) VALUES ('$department','$added_on')";
			$sql=mysqli_query($conn,$query);
			if($sql){
				 header("Location:$_SERVER[HTTP_REFERER]");
				$_SESSION['msg']="Successfully Added!!!";	
			}
			else{
				$_SESSION['msg']="Not added result !!!";
				header("Location:$_SERVER[HTTP_REFERER]");
			}
	}

	if(isset($_POST['add-duration'])){
		$department_id = $_POST['department_id'];
		$depart_duration = $_POST['depart_duration'];
		$added_on = date('Y-m-d');
		$query="INSERT INTO `duration_master`(`department_id`,`depart_duration`,`added_on`) VALUES ('$department_id','$depart_duration','$added_on')";
			$sql=mysqli_query($conn,$query);
			if($sql){
				 header("Location:$_SERVER[HTTP_REFERER]");
				$_SESSION['msg']="Successfully Added!!!";	
			}
			else{
				$_SESSION['msg']="Not added result !!!";
				header("Location:$_SERVER[HTTP_REFERER]");
			}
	}

	


	if(isset($_POST['add-Faculty'])){
		// echo '<pre>';
		// print_r($_POST);die;
		$name = $_POST['Faculty_name'];
		$mobile_no = $_POST['mobile_no'];
		$alt_mobile = $_POST['alt_mobile'];
		$aadhar_no = $_POST['aadhar'];
		$email_id = $_POST['email'];
		$panno = $_POST['pan'];
		$vill_city = $_POST['vill'];
		$post = $_POST['post'];
		$landmark = $_POST['landmark'];
		$dist = $_POST['dist'];
		$state = $_POST['state'];
		$pin = $_POST['pin'];
		$heighest = $_POST['highest'];
		$passing_date = $_POST['passing_date'];
		$rank = $_POST['grade'];
		$department_id = $_POST['department_id'];
		$password = $_POST['password'];
		$con_pass = $_POST['con_pass'];
		$added_on = date('Y-m-d');
		$query="SELECT * FROM `faculty` WHERE `email`='$email_id'";
		$run=mysqli_query($conn,$query);
		$num=mysqli_num_rows($run);
		if($num){
			$_SESSION['msg']="Already Registered !!!";
						header("Location:$_SERVER[HTTP_REFERER]");
		}else{
				if($password==$con_pass){
					   $query="INSERT INTO `faculty`(`faculty_name`,`mobile_no`,`alt_mobile`,`aadhar`,`email`,`pan_no`,`village`,`post`,`landmark`,`dist`,`state`,`pin`,`highest`,`passing_date`,`grade`,`department_id`,`password`,`added_on`) VALUES ('$name','$mobile_no','$alt_mobile','$aadhar_no','$email_id','$panno','$vill_city','$post','$landmark','$dist','$state','$pin','$heighest','$passing_date','$rank','$department_id','$password','$added_on')";
						$sql=mysqli_query($conn,$query);
						if($sql){
							 header("Location:$_SERVER[HTTP_REFERER]");
							$_SESSION['msg']="Successfully Added!!!";	
						}
						else{
							$_SESSION['msg']="Not added result !!!";
							header("Location:$_SERVER[HTTP_REFERER]");
						}

			    }
			    else{
			    	$_SESSION['msg']="Password Not Match !!!";
					header("Location:$_SERVER[HTTP_REFERER]");
			    }
		
		}
	} 

	if(isset($_POST['add-assignment'])){
		// echo '<pre>';
		// print_r($_POST);die;
		$department_id = $_POST['department_id'];
		$subject = $_POST['subject'];
		$unit = $_POST['unit'];
		$faculty_id= $_POST['id'];	
		$added_on = date('Y-m-d');
		$query =  "INSERT INTO `assignment`(`department_id`,`subject`,`unit`,`faculty_id`,`added_on`) VALUES ('$department_id','$subject','$unit','$faculty_id','$added_on')";
		// print_r($query);die;
		$sql=mysqli_query($conn,$query);
			if($sql){
				 header("Location:$_SERVER[HTTP_REFERER]");
				$_SESSION['msg']="Successfully Added !!!";	
			}
			else{
				$_SESSION['msg']="Not added result !!!";
				header("Location:$_SERVER[HTTP_REFERER]");
			}
	}

	if(isset($_POST['change-assignment'])){
		$id = $_POST['id'];
		$department_id = $_POST['department_id'];
		$subject = $_POST['subject'];
		$unit = $_POST['unit'];
	    $query="UPDATE `assignment` SET `department_id`='$department_id',`subject`='$subject',`unit`='$unit',`unit`='$unit' WHERE `id`='$id'";
		$run=mysqli_query($conn,$query);
		if($run){
			 header("Location:$_SERVER[HTTP_REFERER]");
			$_SESSION['msg']="Assignment Updated Successfully !!!";	
		}
		else{
			$_SESSION['msg']="Assignment Not Updated  !!!";
			header("location:$_SERVER[HTTP_REFERER]");
		}

	}

	// ''''''''''''''''''''''''''''''''''''''''Exam''''''''''''''''''''''''''''''''''''''''''''''''''
	if(isset($_POST['create-exam']))
	{
		$department_id= $_POST['department_id'];
		$subject= $_POST['subject'];
		$exam_name= $_POST['exam_name'];
		$timing= $_POST['timing'];
		$faculty_id = $_SESSION['id'];
		$added_on = date('Y-m-d');
		$query =  "INSERT INTO `exam_master`(`faculty_id`,`department_id`,`subject`,`exam_name`,`timing`,`added_on`) VALUES ('$faculty_id','$department_id','$subject','$exam_name','$timing','$added_on')";
		$sql=mysqli_query($conn,$query);
			if($sql){
				 header("Location:$_SERVER[HTTP_REFERER]");
				$_SESSION['msg']="Successfully Added !!!";	
			}
			else{
				$_SESSION['msg']="Not added result !!!";
				header("Location:$_SERVER[HTTP_REFERER]");
			}
	}

	if(isset($_POST['exam_subject'])){
		// print_r($_POST);die;
		$exam_subject = $_POST['id'];
		$query = "SELECT * FROM `exam_master` WHERE `exam_name`='$exam_subject'";
		$run=mysqli_query($conn,$query);
		    while ($data=mysqli_fetch_assoc($run)) {
		       $exam_master[]=$data;
		    }
		     foreach ($exam_master as $key => $value) {
		     	$html = "<option value=".$value['subject'].">".$value['subject']."</option>";
		     }
		    echo $html;

	}

	if(isset($_POST['add_question'])){
		$exams = $_POST['exams'];
		$subject = $_POST['subject'];
		$question = $_POST['question'];
		$option_1 = $_POST['option_1'];
		$option_2 = $_POST['option_2'];
		$option_3 = $_POST['option_3'];
		$option_4 = $_POST['option_4'];
		$correct = $_POST['correct'];
		$added_on = date('Y-m-d');
		$query =  "INSERT INTO `question`(`exam_type`,`subject`,`question`,`option_1`,`option_2`,`option_3`,`option_4`,`correct_option`,`added_on`) VALUES ('$exams','$subject','$question','$option_1','$option_2','$option_3','$option_4','$correct','$added_on')";
		$sql=mysqli_query($conn,$query);
		echo $sql;
			// if($sql){
			// 	$_SESSION['msg']="Successfully Added !!!";	
			// }
			// else{
			// 	$_SESSION['msg']="Not added result !!!";
			// 	header("Location:$_SERVER[HTTP_REFERER]");
			// }
	}

	if(isset($_POST['forgot-password'])){
		// echo '<pre>';
		// print_r($_POST);die;
		$email = $_POST['email_id'];
		$query = "SELECT `id` FROM `faculty` WHERE `email`= '$email'";
		 $run=mysqli_query($conn,$query);
		 $row = mysqli_num_rows($run);
		 $data=mysqli_fetch_assoc($run);
		 $_SESSION['id'] = $data['id'];
		if($row>0){
		    header('location:changepass.php');	
	    }
	    else{
	    	$_SESSION['msg']="Please Enter Valid Email Id !!!";
			header("Location:$_SERVER[HTTP_REFERER]");
	    }
	}

	if(isset($_POST['change-pass'])){


		if($_POST['password']==$_POST['con_pass']){
		   	   $pass = $_POST['con_pass'];
				$id = $_SESSION['id'];
				$query="UPDATE `faculty` SET `Password`='$pass' WHERE `id`='$id'";
				$run=mysqli_query($conn,$query);
				if($run){
					 header('Location:index.php');
					$_SESSION['msg']="Password Updated Successfully !!!";	
				}
				else{
					$_SESSION['msg']="Password Not Updated!!!";
					header("location:$_SERVER[HTTP_REFERER]");
				}
			}
			else{
				$_SESSION['msg']="Please Enter Correct Password";
				header("Location: " . $_SERVER['HTTP_REFERER']);
			}
	}
?>