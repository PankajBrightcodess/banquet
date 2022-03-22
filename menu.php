<section class="ad">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
              <a href="index.php"><img src="img/perfect.png" width="35%"></a>
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                  <li class="nav-item active">
                    <a class="nav-link" href="#"data-toggle="modal" data-target="#exampleModal"><img src="img/register.jpg" style="width:20px;">Register Account<span class="sr-only">(current)</span></a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#"data-toggle="modal" data-target="#login"><img src="img/login.jpg" style="width:20px;">Login</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#"data-toggle="modal" data-target="#signup"><img src="img/signup.jpg" style="width:20px;">Signup</a>
                  </li>
                </ul>
              </div>
            </nav>
          </div>
        </div>
      </div>
    </section>


    <!-- Modal -->
     <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="z-index: 999999;">
      <div class="modal-dialog">
       <div class="modal-content"  style="background-color:#ffffffb3;">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel" style="color:red;">Register account</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="col-md-12">
          <form name="sentMessage" id="contactForm" novalidate="novalidate">
            <div class="control-group">
              <input type="text" class="form-control" id="name" placeholder="Full Name" required="required" data-validation-required-message="Please enter your name" />
              <p class="help-block text-danger"></p>
                            </div>
                            <div class="control-group">
                                <input type="email" class="form-control" id="email" placeholder=" Email" required="required" data-validation-required-message="Please enter your email" />
                                <p class="help-block text-danger"></p>
                            </div>
                             <div class="control-group">
                                <input type="email" class="form-control" id="username" placeholder="username" required="required" data-validation-required-message="Please enter your email" />
                                <p class="help-block text-danger"></p>
                            </div>
              
                            <div class="control-group">
                                <input type="email" class="form-control" id="password" placeholder="Password" required="required" data-validation-required-message="Please enter your email" />
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="control-group">
                                <input type="email" class="form-control" id="repeatpassword" placeholder="Repeat password" required="required" data-validation-required-message="Please enter your email" />
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="control-group">
                                <input type="text" class="form-control" id="mobile" placeholder="Mobile no:" required="required" data-validation-required-message="Please enter a subject" />
                                <p class="help-block text-danger"></p>
                            </div>
                            
                            <div>
                              <center><button style="margin-right: 10px; padding: 5px; width: 30%; background-color:#0000ffb0; color: white;">Registor</button></center>
                            </div>
                        </form>
                    </div>
                 </div>
               </div>
          </div>
       </div>



<!-- Modal -->
<div class="modal fade" id="login" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="z-index: 999999;">
  <div class="modal-dialog">
    <div class="modal-content" style="background-color:#ffffffb3;">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel" style="color:red;">Login</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
         
                   <form name="sentMessage" id="contactForm" novalidate="novalidate">
                            <div class="control-group">
                                <input type="text" class="form-control" id="username" placeholder="username" required="required" data-validation-required-message="Please enter your name" />
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="control-group">
                                <input type="email" class="form-control" id="password" placeholder=" password" required="required" data-validation-required-message="Please enter your email" />
                                <p class="help-block text-danger"></p>
                            </div>
                           
                             <center><button style="margin-right: 10px; padding: 5px; width: 30%; background-color:#0000ffb0; color: white;">Login</button></center>
                            </div>
                        </form>
      </div>
     
    </div>
  </div>
</div>


<!-- Modal -->
<div class="modal fade" id="signup" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="z-index: 999999;">
  <div class="modal-dialog">
    <div class="modal-content" style="background-color:#ffffffb3;">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel" style="color:red;">Signup</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
         <div id="success"></div>
                   <form name="sentMessage" id="contactForm" novalidate="novalidate">
                            <div class="control-group">
                                <input type="text" class="form-control" id="name" placeholder=" Name" required="required" data-validation-required-message="Please enter your name" />
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="control-group">
                                <input type="email" class="form-control" id="email" placeholder=" Email" required="required" data-validation-required-message="Please enter your email" />
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="control-group">
                                <input type="text" class="form-control" id="mobile" placeholder="Mobile no:" required="required" data-validation-required-message="Please enter a subject" />
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="control-group">
                                <input class="form-control" id="password" placeholder="Password" required="required" data-validation-required-message="Please enter your message"></input>
                                <p class="help-block text-danger"></p>
                            </div>
                            <div>
                               <center><button style="margin-right: 10px; padding: 5px; width: 30%; background-color:#0000ffb0; color: white;">Signup</button></center>
                            </div>
                        </form>
      </div>
      
    </div>
  </div>
</div>

