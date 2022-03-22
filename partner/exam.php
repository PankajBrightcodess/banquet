<?php
session_start();
if($_SESSION['role']!='2'){
    header('location:index.php');
  }
include'../connection.php';
$msg = "";
    if (isset($_SESSION['msg'])) {
        $msg = $_SESSION['msg'];
        unset($_SESSION['msg']);
    }
    if ($msg != "") {
        echo "<script> alert('$msg')</script>";
    }
    $id = $_SESSION['id'];
    $query="SELECT * FROM `exam_master` WHERE `faculty_id`='$id'";
    $run=mysqli_query($conn,$query);
    while ($data=mysqli_fetch_assoc($run)) {
      $exam[]=$data;
    }  
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Assignment</title>
  <?php include'includes/header-links.php'; ?>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
    <?php include'includes/top-header.php'; ?>
    <?php include'includes/sidebar.php'; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
   <?php include'includes/page-header.php'; ?>

    <!-- Main content -->
   
  <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Exam</h3>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <form role="form"  id="form_data" method="post"> <!-- action="action.php" -->
                    <div class="card-body">
                      <div class="row">
                        <div class="col-md-6">
                            <label>Exam Type<span style="color:red;">*</span></label>
                            <select class="form-control exams" required id="exams" name="exam_type">
                              <option>--SELECT--</option>
                              <?php 
                                foreach ($exam as $key => $value) {
                                  ?><option value="<?php echo $value['exam_name']?>"><?php echo $value['exam_name']?></option><?php
                                }
                              ?>
                            </select>
                        </div>
                        <div class="col-md-6 mb-5">
                            <label>Subject<span style="color:red;">*</span></label>
                            <select class="form-control" required name="subject" id="subject">
                              <option>--SELECT--</option>
                                
                            </select> </div> </div> <div class="row"
                            style="background:gray;border-radius: 10px;">
                            <div
                            class="col-md-12"><label>Question</label></div>
                            <div class="col-md-12"> <div class="form-group">
                            <input type="text" name="question" id="question"
                            class="form-control" placeholder="Enter Your
                            Question"> </div> </div> <div class="col-md-3">
                            <div class="form-group"> <input type="text"
                            name="option_1"  class="form-control"
                            id="option_1"  placeholder="Option One"> </div>
                            </div> <div class="col-md-3"> <div
                            class="form-group"> <input type="text"
                            name="option_2" class="form-control"
                            id="option_2" placeholder="Option Two"> </div>
                            </div> <div class="col-md-3"> <div
                            class="form-group"> <input type="text"
                            name="option_3" class="form-control"
                            id="option_3" placeholder="Option Three"> </div>
                            </div> <div class="col-md-3"> <div
                            class="form-group"> <input type="text"
                            name="option_4" class="form-control"
                            id="option_4" placeholder="Option Four"> </div>
                            </div> <div class="col-md-12"> <div
                            class="form-group"> <input type="text"
                            name="correct" class="form-control" id="correct"
                            placeholder="Correct Option"> </div> </div> <div
                            class="col-md-6"> <div class="form-group"> <input
                            type="button" name="add_question" class="btn
                            btn-success add_question"  value="Submit"> </div>
                            </div> </div> </form> </div> </div> </div> </div>
                            </div> </div> </section> <section
                            class="content"> <div class="container-fluid">
                            <div class="row"> <div class="col-md-12"> <div
                            class="card card-primary"> <div
                            class="card-header"> <h3 class="card-title">Exam
                            List</h3> </div> <div class="row"> <div
                            class="col-md-12"> <form role="form"
                            id="form_data" method="post"> <!--
                            action="action.php" --> <div class="card-body">
                            <?php $query="SELECT * FROM `question`";
                            $run=mysqli_query($conn,$query); 
                            while($data=mysqli_fetch_assoc($run))
                             { 
                                $quest[]=$data; 
                             }    
                      ?>
                      <div class="row">
                        <div class="col-md-12 mb-5" style="background:lightblue; padding: 10px; border-radius:  10px;"><h4 class="text-center"><?php echo $quest[0]['exam_type']?></h4><span class="text-uppercase"><?php echo $quest[0]['subject']?><hr></span>
                        </div>
                        <?php 
                          if(!empty($quest)){
                            $i=0;
                            foreach ($quest as $key => $value) {
                              $i++;
                              ?>
                             
                             <div class="col-md-12" style="background:lightblue; padding: 10px; border-radius: 10px;">
                                 <b><?php echo $i;?>.<span>      <?php echo $value['question']?></span></b>
                             </div>
                            <div class="col-md-3" >1. <?php echo $value['option_1']?></div>
                            <div class="col-md-3" >2. <?php echo $value['option_2']?></div>
                            <div class="col-md-3" >3. <?php echo $value['option_3']?></div>
                            <div class="col-md-3 " >4. <?php echo $value['option_4']?></div>
                            <div class="col-md-12 mb-5"><hr></div>
                         

                              <?php
                            }
                          }



                        ?>
                        
                      </div>
                    
                    <!--   <div class="row" style="background:gray;border-radius: 10px;">
                        <div class="col-md-12"><label>Question Paper</label></div>
                          <div class="col-md-12">
                            <div class="form-group">
                            <input type="text" name="question" id="question" class="form-control" placeholder="Enter Your Question">
                          </div>
                        </div>
                          <div class="col-md-3">
                            <div class="form-group">
                            <input type="text" name="option_1"  class="form-control" id="option_1"  placeholder="Option One">
                          </div>
                        </div>
                          <div class="col-md-3">
                             <div class="form-group">
                            <input type="text" name="option_2" class="form-control" id="option_2" placeholder="Option Two">
                          </div>
                        </div>
                          <div class="col-md-3">
                            <div class="form-group">
                            <input type="text" name="option_3" class="form-control" id="option_3" placeholder="Option Three">
                          </div>
                        </div>
                          <div class="col-md-3">
                            <div class="form-group"> 
                            <input type="text" name="option_4" class="form-control" id="option_4" placeholder="Option Four">
                          </div>
                        </div>
                         <div class="col-md-12">
                            <div class="form-group">
                              <input type="text" name="correct" class="form-control" id="correct" placeholder="Correct Option">
                          </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                              <input type="button" name="add_question" class="btn btn-success add_question"  value="Submit">
                          </div>
                        </div>
                    </div> -->
                  </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>






    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
 <?php include'includes/copyright.php'; ?>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

 <?php include'includes/footer-links.php'; ?>
 <script type="text/javascript">
  // $(document).ready(function(){
    $('body').on('click','.add_question',function(){
     // debugger; 
     var exams = $('#exams').val();
     var subject = $('#subject').val();
     var question = $('#question').val();
     var option_1 = $('#option_1').val();
     var option_2 = $('#option_2').val();
     var option_3 = $('#option_3').val();
     var option_4 = $('#option_4').val();
     var correct = $('#correct').val();
     // var records = $('#form_data').serialize();
    $.ajax({
            type:'POST',
            url:'action.php',
            data:{exams:exams,subject:subject,question:question,option_1:option_1,option_2:option_2,option_3:option_3,option_4:option_4,correct:correct,add_question:'add_question'},
            success: function(data){
              if(data==1){
                $('#question').val('');
                $('#option_1').val('');
                $('#option_2').val('');
                $('#option_3').val('');
                $('#option_4').val('');
                $('#correct').val('');
              }
                // alert(data);
                // console.log(data);
              },
                error: function(){ 
                   alert("error");
                },
          });
    });
    // });
 </script>
 <script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
  });


  



      $('.exams').change(function(e){
         var id=$(this).val();
        $.ajax({
                type:'POST',
                url:'action.php',
               data:{id:id,exam_subject:'exam_subject'},
                success: function(data){
                      console.log(data);
                    $('#subject').html(data);
                    },

                    error: function(){ 
                       alert("error");
                    },
        });
    return false;
    });
</script>
<!-- Modal -->
<div class="modal fade" id="departmentModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><b>Assignment Update</b></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
       <form action="action.php" method="post">
        <div class="modal-body">
          <div class="row">
            <div class="col-md-12 col-12">
              <input type="hidden" name="id" id="id" class="form-control"> 
              <label>Department <span style="color:red;">*</span></label>
              <select class="form-control" required id="department_id"  name="department_id">
                  <option>--SELECT--</option>
                  <?php 
                    foreach ($department as $key => $value) {
                      ?><option selected value="<?php echo $value['id']?>"><?php echo $value['department']?></option><?php
                    }
                  ?>
              </select>
            </div>
            <div class="col-md-12 col-12">
              <label>Subject <span style="color:red;">*</span></label>
              <input type="text" name="subject" id="subject" class="form-control" required="">
            </div>
             <div class="col-md-12 col-12">
              <label>Unit <span style="color:red;">*</span></label>
              <input type="text" name="unit" id="unit" class="form-control" required="">
            </div>
           
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" name="change-assignment" class="btn btn-primary">Save changes</button>
        </div>
       </form>
    </div>
  </div>
</div>
 <script type="text/javascript">
   $(document).ready(function(){
      $('body').on('click','.editdepartment',function(){
        $('#id').val($(this).data('id'));
        $('#department_id').val($(this).data('department_id'));
        $('#subject').val($(this).data('subject'));
        $('#unit').val($(this).data('unit'));
      });
   });
 </script>
</body>
</html>



<!--  [id] => 30
            [exam_type] => Half Yearly 
            [subject] => english
            [question] => ............... is your name?
            [option_1] => Why
            [option_2] => Who
            [option_3] => What
            [option_4] => Where
            [correct_option] => What
            [added_on] => 2022-02-08 -->