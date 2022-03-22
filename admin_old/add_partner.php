<?php 
  include_once('connection.php');
  $query3="SELECT * FROM `add_event` WHERE `status`='1'";
  $run=mysqli_query($conn,$query3);
  while($data=mysqli_fetch_assoc($run)){
    $event[]=$data;
  }
   $query4="SELECT * FROM `add_city` WHERE `status`='1'";
  $run2=mysqli_query($conn,$query4);
  while($data=mysqli_fetch_assoc($run2)){
    $city[]=$data;
  }
  // echo '<pre>';
  // print_r($city);
  // print_r($event);die;
  // $query5="SELECT * FROM `add_partener` WHERE `status`='1'";
  // $run3=mysqli_query($conn,$query5);
  // while($data=mysqli_fetch_assoc($run3)){
  //   $partner[]=$data;
  // }
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
  <div class="card">
 	<div class="card-header">
		<center><h5 style="margin: 10px 10px; color: black"><b>Add Partner</b></h5></center>
	</div>
    <div class="card-body">
     <div class="row">
	     <div class="col-md-6" style="margin-top: 0px;">
          <div class="wel" style="padding:0px;">
            <div id="home-sell-box">
              <form action="action.php"  method="post" style="border:3px solid white; padding: 0px;margin-top: 0px;background: ##dc354500;padding: 3px;" enctype="multipart/form-data">
                 <div class="row justify-content-center">
                   <div class="col-md-12" style="margin-bottom: 10px;">
                    
                    <input type="text" name="company_name" placeholder="Company-Name :" class="form-control" required>        
                    </div>

                    <div class="col-md-12" style="margin-bottom: 10px;">
                     <input type="text" name="mobile" placeholder="Moblie :" class="form-control" required>        
                     </div>
                     <div class="col-md-12" style="margin-bottom: 10px;">

                    <input type="text" name="address" placeholder="Address :" class="form-control" required>
                    </div>
                   <div class="col-md-12" style="margin-bottom: 10px;">
                    <input type="text" name="rate" placeholder="Rate :" class="form-control" required>
                   </div>
                    <div class="col-md-12">
                     <label for="img">Company image:</label>
                      <input type="file" id="img" name="image" accept="image/*">
                  </div>
                  <center><button class="btn btn-lg btn-primary mt-3" type="submit"  name="add_partner">Add</button></center>
                </div>
              
            </div>
          </div>
        </div>
     <div class="col-md-6"  style="margin-top: 40px;">
          <div class="col-md-12" style="margin-bottom: 10px;">
            <input type="text" name="rating" placeholder="Rating:" class="form-control" required> 
               </div>
                <div class="col-md-12" style="margin-bottom: 10px;">
                <label for="event">select event</label>
                <select id="event" name="event" class="form-control">
                  <option>---SELECT---</option>
                  <?php
                    if(!empty($event)){
                      foreach($event as $eventlist){?>
                     <option value="<?php echo $eventlist['id']; ?>"><?php echo $eventlist['event_name']; ?></option>
                  <?php }
                    }

                    ?>
                  <!-- <option value="australia" selected>event</option>
                <option value="canada">birthday</option>
                <option value="usa">corporate event</option> -->
               </select> 
           </div>
         <div class="col-md-12" style="margin-bottom: 10px;">
              <label for="city">select city</label>
                <select id="city" name="city" class="form-control">
                  <option>---SELECT---</option>
                  <?php
                    if(!empty($city)){
                      foreach($city as $citylist){ ?>
                       <option value="<?php echo $citylist['id']; ?>"><?php echo $citylist['city_name']; ?></option>
                       <?php }
                    }
                    ?>
                 <!-- <option value="australia" selected>city</option>
                 <option value="canada">mumbai</option>
                 <option value="usa">dhanbad</option>
                  -->
              }
              </select> 
             </div>
            </div>
          </form>
        </div>
      </div>
   </div>
</div>
<?php include'footer.php' ?>
<?php include'footer-link.php' ?>
</body>
</html>
