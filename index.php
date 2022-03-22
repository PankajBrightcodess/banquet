<?php
session_start();
include'admin/connection.php';
$msg = "";
    if (isset($_SESSION['msg'])) {
        $msg = $_SESSION['msg'];
        unset($_SESSION['msg']);
    }
    if ($msg != "") {
        echo "<script> alert('$msg')</script>";
    }
    $query="SELECT * FROM `add_event` WHERE `status`='1'";
  $run=mysqli_query($conn,$query);
  while($data=mysqli_fetch_assoc($run)){
    $event[]=$data;
  }
  
?>
 <!doctype html>
<html lang="en">
 <head>
  <style type="text/css">
  .d{background: url(img/01.jpg);}
  </style>
    <style type="text/css">
    .card{ box-shadow: 0px 2px 18px 2px #702b2b;
    padding: 10px; border-radius: 15px!important; }
    .checked {
      color: orange;
    }
    .green-box {
    width: 28px;
    height: 18px;
    border-radius: 3px;
    background-color: #428b2c;
    font-size: 12px;
    font-weight: 500;
    float: center;
    color: #fff;
    margin-right: 5px;
    padding: 5px;
  }
  .green-btn {
    background: url(data:next.png);
    background: linear-gradient(to bottom,#499f43 0,#048003 100%);
    width: 100%;
    float: left;
    padding: 10px;
    margin: 8px 0;
    text-align: center;
    color: #fff!important;
    border-radius: 6px;
    font-weight: 400;
    font-size: 16px;
    text-shadow: 1px 1px rgb(0 0 0 / 50%);
    cursor: pointer;
    order: 0;
    outline: 0;
  }
  .box{
    margin: 10px;
  }
  .box img{
    border-radius: 15px;
  }
  p , h4{
    text-align: left;
  }
  @media(max-width:2560px){
    .best{margin-top:100px ;}
  }
  @media(max-width:1440px){
    .best{margin-top:100px ;}
  }
  @media(max-width:1024px){
    
  }
  @media(max-width:576px){
    .best{margin-top:23px ;}
  }
  @media(max-width:425px){
    .best{margin-top:23px ;}
  }
  @media(max-width:375px){
    .best{margin-top:23px ;}
  }
  @media(max-width:320px){
    .best{margin-top:23px ;}
  }
  </style>
  <title>Perfect venue | Home</title>
       <?php include"headerlink.php"; ?>
 </head>
  <body>
       <?php include"menu.php"; ?>
        <section class="d">
         <img src="img/01.jpg" width="100%">
   </section>
      <div clsss="dd" style="margin-top: -50px;">
         <h2  class="formp" style="color:red;">Perfect Place for All your events needs</h2><br>
         <h4 class="formp" style="padding:0px; color:#ce41bf; padding: 15px;">Best perfect venue provides in  your budget</h4>
    </div>
<section class="formm">
   <div class="container" style="margin-top: 20px;">
       <div class="row">
            <div class="col-md-2 col-12">
       </div>
          <div class="col-md-3 col-12">
                <h5  style="color: white;">Which event</h5>
            <div class="dropdown" style="width:100%;">
                  <!-- <button class="btn-lg dropdown-toggle form-control" type="button" id="#drop" data-toggle="dropdown" aria-expanded="false" style="background:white;  width:100%;">Choose your event</button> -->

                     <!-- <ul class="dropdown-menu" aria-labelledby="#drop" style="width:100%;"> -->
                     <select class="form-control event" id="event">
                            <option>---Select---</option>
                            <?php 
                                if(!empty($event)){
                                    foreach ($event as $key => $value) {
                                      ?><li><option value="<?php echo $value['id'];?>"><?php echo $value['event_name'];?></option></li><?php
                                    }
                                }
                            ?>
                          </select>
                 <!-- </ul>  -->
            </div>
            <!-- <input type="text" name="event" class="form-control" id="event" > -->
          </div>
               <div class="col-md-3 col-12">
                 <div class="dropdown" style="width:100%;">
                   <h5 style="color: white;" >City</h5>
                   <select class="form-control city" id="city">
                   </select>
              </div>
            </div>
        <div class="col-md-2 col-12">
            <button type="button" class="bbtn btn btn-lg search" style="padding: 4px; width:100%; color:white;">Search!</button>  
       </div>
             <div class="col-md-2 col-12"></div>
        </div>
      </div>
    </section> 
  <section class="serwe">
  <div class="container">
     <h2 style="padding-top: 40px; padding-bottom: 15px; color:red;"><center>Services we provide</center></h2>
     <div class="row justify-content-center">
        <div class="col-md-3 col-12 serwee">
          <img src="img/02.png" class="serweimg">
          <h5 class="text-center">Wedding Ceremony</h5>
        </div>
        <div class="col-md-3 col-12 serwee">
          <img src="img/03.png" class="serweimg">
          <h5 class="text-center">Corporate Events </h5>
       </div>
       <div class="col-md-3 col-12 serwee">
           <img src="img/04.png" class="serweimg">
           <h5 class="text-center">Birthday Party</h5>
      </div>
        <div class="col-md-3 col-12 serwee">
          <img src="img/05.png" class="serweimg">
          <h5 class="text-center">Social Events</h5>
        </div>
         <div class="col-md-3">
          <center><img src="img/btn.jpg" width="100%"; style="padding-top:20px;"></center>
        </div>
      </div>
  </section>


  <section style="background-image: url(img/background.jpg);margin-top: 40px;">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-6 afr">
          <h3><span style="color:red; margin-left: 10px;">Who <span style="color:#ce41bf;;">we are</span><hr style="border: 3px solid  red; width: 60px;margin-top: -1px; opacity: 100%; margin-left:10px; ">   </span></h3>
             <p style="padding: 10px;"> perfect venue  Providing Online Services is a Normal / Standards/Premium perfect venue for Various occasion like (Wedding Ceremony, Birthday Party, Anniversary, Corporate Events, Seminar, Social Events & many more events.</p>
             <p  style="padding: 10px;"> perfect venue  online portal is the best for all users who desire to the best & awesome service  perfect venue  Services would take pride in being a part of it. From  booking to check out. we provide a tremendous range of facilities that every people praise to our best services Our Exports team helps you to how to find the best perfect venue  in all over India.</p>
             <p style="padding: 10px;">Our perfect venue and their Professionals are trusted valuable to make your occasion fabulous.</p>
             <h4><img src="img/btn red.jpg" style="width:40%;margin-top: 10px;"></h4>
            </div>
           <div class="col-md-6"style="background-color:#fd717e; padding-top: 10px; padding:50px;">
          <img src="img/aff.png" width="100%">
        </div>
      </div>
    </div>
  </section>

  <section>
    <div class="container" style=" padding-bottom: 50px;">
        <center><h2 style="padding-top: 40px; color: #bf5b65;">100% Privacy Control Services</h2></center>
        <center><h2>verifying by Our team</h2></center>
           <div class="row">
              <div class="col-md-6" style="padding-left: 20px;">
                <img src="img/08.png" width="8%">
                 <h4 class="vb" style="color: #bf5b65; margin-top: 10px;">Lakhs of Genuine Members</h4><hr style="border: 1px solid  #bf5b65; width: 330px;margin-top: 1px; opacity: 100%;">
                 <p>Search by locaon, Community, profession & more from</p> <p>lakhs of acve members</p>
                 <img src="img/09.png" width="8%">
                 <h4 class="vb" style="color: #bf5b65; margin-top: 10px;">Verificaon by Visit</h4><hr style="border: 1px solid  #bf5b65; width: 330px;margin-top: 1px; opacity: 100%;">
                  <p>Documents on Age, Address, Income etc. collected, </p><p>Verified stamp added to profile</p>
                   <img src="img/10.png" width="8%">
                  <h4 class="vb" style="color: #bf5b65; margin-top: 10px;">100% Privacy Control</h4><hr style="border: 1px solid  #bf5b65; width: 330px;margin-top: 1px; opacity: 100%;">
                 <p>secured your any type of requirement with my  </p><p>perfect perfect venue portal</p>
             </div>
            <div class="col-md-6" style="padding-top: 15px; ">
          <img src="img/girl (1).jpg" width="100%" height="90%;">
        </div>
      </div>
    </div>
  </section>

 <section  style="background-image: url(img/background11.jpg); background-size: cover; padding-top: 50px; padding-bottom: 40px;">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-6"></div>
        <div class="col-md-6">
          <div class="wel" style="padding:0px; background-color: #e47c8b;">
            <div id="home-sell-box">
              <form action="admin/action.php"  method="post" style="border:3px solid white; padding: 0px;margin-top: 0px;background: #dc354500;padding: 3px;">
                <div class="row justify-content-center">
                  <div class="col-md-12">
                    <center><h5 style="margin: 10px 10px; color: black"><b>Enquiry Form</b></h5></center>
                    <input type="text" name="st_name" placeholder="Name :" class="form-control" required>        
                    </div>
                    <div class="col-md-12">
                    <input type="text" name="address" placeholder="Address :" class="form-control" required>        
                    </div>
                    <div class="col-md-6">
                    <input type="text" name="city" placeholder="City :" class="form-control" required>
                    </div>
                    <div class="col-md-6">
                    <input type="text" name="dist" placeholder="District :" class="form-control" required>
                    </div>
                    <div class="col-md-12">
                    <input type="text" name="mobile" placeholder="Mob:" class="form-control" required> 
                   </div>
                   <div class="col-md-12">
                    <input type="email" name="email" placeholder="Email :" class="form-control" required>
                   </div>
                   <div class="col-md-12">
                    <input type="tel" name="events_name" placeholder="Which Event :" class="form-control" required>
                   </div>
                   <div class="col-md-12">
                    <input type="date" name="date" placeholder="Date :" class="form-control" required>    
                   </div>
                   <div class="col-md-12">
                     <button class="btn" type="submit" name="add_enquiry"> <img src="img/submit.png" style="width: 100%"></button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
 
  <section style="background: linear-gradient( 306deg,#2d3134 53%,#bf5b65 42%);">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-6">
          <center><h4 style="padding-top: 20px;color: white;"><b>India’s Leading best perfect venue</b></h4></center>
          <center><h4 style="padding-top: 0px;color: white;"><b> Booking Portal</b></h4></center>
        </div>
        <div class="col-md-6" style="padding-top: 20px;">
          <center><img src="img/book now.png" style="width:40%; height: 50px;"></center>
          <center><p style="color:white;">Shadi-Party-Function / Corporate Event / Social Event / Meeting etc.</p></center>
        </div>
      </div>
    </div>
  </section>


<!-- Modal -->
<div class="modal fade bd-example-modal-lg" id="searching" style="z-index:9999999;" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content modellist">
     <!-- <div class="box">
    <div class="container">
      <div class="card">
        <div class="row">
          <div class="col-md-4">
            <img src="b1.jpeg" width="100%">
          </div>
          <div class="col-md-4 text-center">
            <h4 style="padding-top: 20px;">Season Banquets</h4>
            <p><span class="green-box">4.1</span>
            <span class="fa fa-star checked"></span>
            <span class="fa fa-star checked"></span>
            <span class="fa fa-star checked"></span>
            <span class="fa fa-star"></span>
            <span class="fa fa-star"></span></p>
           
            <p><i style="color: red;"class="fas fa-phone fa-rotate-90"></i> +91-987654321</p>
            <p><i  style="color: red;"class="fas fa-arrow-right"> </i>Banquet Halls, Party Lawns</p>
           
            <img src="jdvrsl_verified.svg" width="20%">
            
          </div>
          <div class="col-md-4">
            <a class="green-btn best" href="#">Best Deal <img src="next.png" width="10%"></a>
          </div> 
        </div>
      </div>

    </div>
  </div> -->


<!-- 
  <div class="box ">
    <div class="container">
      <div class="card">
        <div class="row">
          <div class="col-md-4">
            <img src="b1.jpeg" width="100%">
          </div>
          <div class="col-md-4 text-center">
            <h4 style="padding-top: 20px;">Season Banquets</h4>
            <p><span class="green-box">4.1</span>
            <span class="fa fa-star checked"></span>
            <span class="fa fa-star checked"></span>
            <span class="fa fa-star checked"></span>
            <span class="fa fa-star"></span>
            <span class="fa fa-star"></span></p>
           
            <p><i style="color: red;"class="fas fa-phone fa-rotate-90"></i> +91-987654321</p>
            <p><i  style="color: red;"class="fas fa-arrow-right"> </i>Banquet Halls, Party Lawns</p>
            <img src="jdvrsl_verified.svg" width="20%">
            
          </div>
          <div class="col-md-4">
            <a class="green-btn best" href="#">Best Deal <img src="next.png" width="10%"></a>
          </div> 
        </div>
      </div>

    </div>
  </div> -->

 <!--   <div class="box ">
    <div class="container">
      <div class="card">
        <div class="row">
          <div class="col-md-4">
            <img src="b1.jpeg" width="100%">
          </div>
          <div class="col-md-4 text-center">
            <h4 style="padding-top: 20px;">Season Banquets</h4>
            <p><span class="green-box">4.1</span>
            <span class="fa fa-star checked"></span>
            <span class="fa fa-star checked"></span>
            <span class="fa fa-star checked"></span>
            <span class="fa fa-star"></span>
            <span class="fa fa-star"></span></p>
           
            <p><i style="color: red;"class="fas fa-phone fa-rotate-90"></i> +91-987654321</p>
            <p><i  style="color: red;"class="fas fa-arrow-right"> </i>Banquet Halls, Party Lawns</p>
            <img src="jdvrsl_verified.svg" width="20%">
            
          </div>
          <div class="col-md-4">
            <a class="green-btn best" href="#">Best Deal <img src="next.png" width="10%"></a>
          </div> 
        </div>
      </div>

    </div>
  </div> -->
 <!--   <div class="box ">
    <div class="container">
      <div class="card">
        <div class="row">
          <div class="col-md-4">
            <img src="b1.jpeg" width="100%">
          </div>
          <div class="col-md-4 text-center">
            <h4 style="padding-top: 20px;">Season Banquets</h4>
            <p><span class="green-box">4.1</span>
            <span class="fa fa-star checked"></span>
            <span class="fa fa-star checked"></span>
            <span class="fa fa-star checked"></span>
            <span class="fa fa-star"></span>
            <span class="fa fa-star"></span></p>
           
            <p><i style="color: red;"class="fas fa-phone fa-rotate-90"></i> +91-987654321</p>
            <p><i  style="color: red;"class="fas fa-arrow-right"> </i>Banquet Halls, Party Lawns</p>
            <img src="jdvrsl_verified.svg" width="20%">
            
          </div>
          <div class="col-md-4">
            <a class="green-btn best" href="#">Best Deal <img src="next.png" width="10%"></a>
          </div> 
        </div>
      </div>

    </div>
  </div> -->
<!--    <div class="box ">
    <div class="container">
      <div class="card">
        <div class="row">
          <div class="col-md-4">
            <img src="b1.jpeg" width="100%">
          </div>
          <div class="col-md-4 text-center">
            <h4 style="padding-top: 20px;">Season Banquets</h4>
            <p><span class="green-box">4.1</span>
            <span class="fa fa-star checked"></span>
            <span class="fa fa-star checked"></span>
            <span class="fa fa-star checked"></span>
            <span class="fa fa-star"></span>
            <span class="fa fa-star"></span></p>
           
            <p><i style="color: red;"class="fas fa-phone fa-rotate-90"></i> +91-987654321</p>
            <p><i  style="color: red;"class="fas fa-arrow-right"> </i>Banquet Halls, Party Lawns</p>
            <img src="jdvrsl_verified.svg" width="20%">
            
          </div>
          <div class="col-md-4">
            <a class="green-btn best" href="#">Best Deal <img src="next.png" width="10%"></a>
          </div> 
        </div>
      </div>

    </div>
  </div> -->
   <!-- <div class="box ">
    <div class="container">
      <div class="card">
        <div class="row">
          <div class="col-md-4">
            <img src="b1.jpeg" width="100%">
          </div>
          <div class="col-md-4 text-center">
            <h4 style="padding-top: 20px;">Season Banquets</h4>
            <p><span class="green-box">4.1</span>
            <span class="fa fa-star checked"></span>
            <span class="fa fa-star checked"></span>
            <span class="fa fa-star checked"></span>
            <span class="fa fa-star"></span>
            <span class="fa fa-star"></span></p>
           
            <p><i style="color: red;"class="fas fa-phone fa-rotate-90"></i> +91-987654321</p>
            <p><i  style="color: red;"class="fas fa-arrow-right"> </i>Banquet Halls, Party Lawns</p>
            <img src="jdvrsl_verified.svg" width="20%">
            
          </div>
          <div class="col-md-4">
            <a class="green-btn best" href="#">Best Deal <img src="next.png" width="10%"></a>
          </div> 
        </div>
      </div>

    </div>
  </div> -->
    </div>
  </div>
</div>
  
    <?php include"footer.php"; ?>
    <?php include"footerlink.php"; ?>

    <script>
  $(document).ready( function () {
    $('#datatable').DataTable();

} );
</script>
<script type="text/javascript" >

 
  $("body").on("click",".search",function(){
      // debugger;
        var event_id=$('.event').val();
        var city_id=$('.city').val();
      $.ajax({
      url:"action.php",
      type:'POST',
      data:{event_id:event_id,city_id:city_id,get_partner_list:'get_partner_list'},
      success: function(data){
        console.log(data);
        $("#searching").modal('show');
        $(".modellist").html(data);
        // location.reload();
        }
      }); 

    });

  $("body").on("change",".event",function(){
   // $('.event').change(function(e){
    // debugger;
    var id = $(this).val();  
    $.ajax({
      type:'POST',
      url:'action.php',
      data:{id:id,list_city:'list_city'},
       success: function(result){
                    console.log(result);
                          $('.city').html(result);
                    },
                    error: function(){ 
                       alert("error");
                    },
    });
   
  });
</script>

  </body>
</html>




