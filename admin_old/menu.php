  	<!-- Sidebar -->
<div class="w3-sidebar w3-bar-block w3-border-right" style="display:none" id="mySidebar">
  <button onclick="w3_close()" class="w3-bar-item w3-large"><h2 style="margin-left: 20px;">Close &times; </h2></button>
  
  <div class="nav-item dropdown">
       <!--  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-expanded="false">
          event
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="#">wedding</a>
          <a class="dropdown-item" href="#">birthday party</a>
          <a class="dropdown-item" href="#">social events</a>
           <a class="dropdown-item" href="#">corporate events</a>
        </div> -->
  
        <a href="dashboard.php"  style="margin-left: 30px; padding-top: 20px;">dashboard</a><hr>
      </div>
      <div>
        <a href="add_event.php" style="margin-left: 30px; padding-top: 20px;">Event</a><hr>
        
      </div>
       <div>
        <a href="add_city.php" style="margin-left: 30px; padding-top: 20px;">city</a><hr>
      </div>
       <div class="dropdown">
      <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-expanded="false">
         Master key
       </button>
          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
         <a class="dropdown-item" href="add_partner.php">Add partner</a>
         <a class="dropdown-item" href="list_partner.php">list partner</a>
         </div>
       </div>
</div>

<!-- Page Content -->
<div class="w3-teal">
  <button class="w3-button w3-teal w3-xlarge" onclick="w3_open()">☰</button>
  <img src="img/perfect.png" width="15%;" >
  <div class="nav-item dropdown" style="float: right;">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-expanded="false">
          Admin 
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="#">logout</a>
         
        </div>
      </div>
</div>


<script>
function w3_open() {
  document.getElementById("mySidebar").style.display = "block";
}

function w3_close() {
  document.getElementById("mySidebar").style.display = "none";
}
</script>