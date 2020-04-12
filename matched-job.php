<?php
   include("include/class.user.php");
   $user = new USER();
   
   // check user login
   if(!$user->is_logged_in())
       {
      $user->redirect("login.php");
       }
          
   $username= $_SESSION['USER_name'];
   $uid=$_SESSION['USER_ID'];  
          
    $id= base64_decode($_GET['token']);
    
    // get job details
    $row=$user->getJobDetail($id);
   
   
   ?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
      <title>Job Finder</title>
      <!-- Fav Icon -->
      <link rel="shortcut icon" href="">
      <!-- Bootstrap -->
      <link href="css/bootstrap.min.css" rel="stylesheet">
      <link href="css/owl.carousel.css" rel="stylesheet">
      <link href="css/font-awesome.css" rel="stylesheet">
      <link href="css/style.css" rel="stylesheet">
      <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic' rel='stylesheet' type='text/css'>
      <link href="https://fonts.googleapis.com/css?family=Alice" rel="stylesheet">
      <!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
      <script src="js/jquery-2.1.4.min.js"></script> 
   </head>
   <body>
      <!--header start-->
      <?php      include 'include/profile_header.php';?>
      <!--header start end--> 
      <!--inner heading start-->
      <div class="inner-heading">
         <div class="container">
            <h3>Job Details</h3>
         </div>
      </div>
      <!--inner heading end--> 
      <!--Inner Content start-->
      <div class="inner-content listing detail">
         <div class="container">
            <div class="inner-wrap">
               <div class="row">
                  <div class="col-md-8">
                     <div class="listWrpService jobdetail">
                        <div class="col-md-12">
                           <h4 id="error"><?php if(isset($msg)) { echo $msg; }?></h4>
                        </div>
                        <div class="row">
                           <div class="col-md-3 col-sm-3 col-xs-3">
                              <div class="listImg"><img src="images/jobdetail.jpg" alt=""></div>
                           </div>
                           <div class="col-md-9 col-sm-9 col-xs-9">
                              <h3><?php echo $row['job_title'];?></h3>
                              <p><?php echo $row['company_name'];?></p>
                              <i class="fa fa-briefcase" aria-hidden="true"></i> <?php if(!empty($row['min_exp'])) { echo $row['min_exp']. ' - '.$row['max_exp'].  ' yrs Exp' ; } else { echo 'Fresher';} ?>
                              <ul class="featureInfo">
                                 <li><i class="fa fa-map-marker" aria-hidden="true"></i><?php echo $row['city'];?></li>
                                 <li><i class="fa fa-calendar" aria-hidden="true"></i>
                                    <?php  $day=date('d',strtotime($row['post_date']));
                                       $month=date('M',strtotime($row['post_date']));
                                       $year=date('Y',strtotime($row['post_date']));
                                       echo $day. ' '. $month. ' '. $year;   
                                       ?> 
                                 </li>
                              </ul>
                              <?php if(!empty($row['job_type'])) { ?> 
                              <div class="time-btn"><?php echo $row['job_type'];?></div>
                              <?php } ?>   
                              <div class="click-btn">
                                 <form method="post" id="applyForm">
                                    <input type="hidden" name="job_id" value="<?php echo $id;?>">
                                    <input type="hidden" name="emp_id" value="<?php echo $row['emp_id'];?>">
                                    <?php
                                       $stmt=$user->runQuery("select * from job_applications where user_id='$uid' and job_id='$id' ");
                                       $stmt->execute();
                                       $n=$stmt->rowCount();
                                       if($n==0) {                                     
                                       ?>
                                    <input type="submit" value="Apply Now" class="btn btn-primary">
                                    <?php } else { ?>
                                    <div class="btn btn-success"><i class="fa fa-check-square" aria-hidden="true"></i> Already applied For this job.</div>
                                    <?php } ?>
                                 </form>
                                  
                                  
                                 <script>
                               // job application by user
                                     
                                    $(document).ready(function(){
                                    $("#applyForm").submit(function(event) {
                                      event.preventDefault();  
                                     
                                     var data=$("#applyForm").serialize();
                                     $.ajax ({
                                       type: 'post',
                                       url : 'apply_job.php',
                                       data : data,
                                       
                                       success : function(response)
                                       { 
                                         
                                           if(response=='ok') {
                                             $("#error").html("<div class='alert alert-success'>You have successfully applied for this job.</div>");  
                                            
                                           } else {
                                         $("#error").html(response);
                                       }
                                    }
                                    
                                      });
                                    });
                                    });
                                 </script> 
                                 
                                 
                                 
                              </div>
                           </div>
                        </div>
                        <h2>Job Discription</h2>
                        <p style="margin-bottom: 30px"><?php echo $row['job_desc'];?></p>
                        <?php if(!empty($row['min_salary'])) { ?>
                        <div class="col-md-7 no_padd salary">
                           <div class="col-md-3 no_padd">Salary :</div>
                           <div class="col-md-9"> <?php echo $row['min_salary'] . ' - '. $row['max_salary'];?> P.A.</div>
                        </div>
                        <?php } ?>
                        <div class="col-md-7 no_padd salary">
                           <div class="col-md-3 no_padd">Industry :</div>
                           <div class="col-md-9"> <?php echo $row['industry'];?></div>
                        </div>
                        <div class="col-md-7 no_padd salary">
                           <div class="col-md-3 no_padd">Role :</div>
                           <div class="col-md-9"> <?php echo $row['job_role'];?></div>
                        </div>
                        <div class="clearfix"></div>
                        <h2>Key Skills</h2>
                        <ul class="keyLinks keyskills">
                           <?php
                              $skills=explode(',',$row['prefer_skill']);
                              foreach($skills as $skill) {
                              ?>
                           <li><?php echo $skill;?></li>
                           <?php } ?>
                        </ul>
                        <div class="clearfix"></div>
                        <h2>Education Requirements</h2>
                        <div class="col-md-7 no_padd salary">
                           <div class="col-md-12"> <?php echo $row['prefer_edu'];?></div>
                        </div>
                        <div class="clearfix"></div>
                        <br>
                        <h2>Desired Candidate Profile</h2>
                        <p><?php echo $row['candidate_profile'];?></p>
                        <h2>Contact Details</h2>
                        <div style="color: #666; font-size: 13px">
                           <div>Contact Company : &nbsp; &nbsp; <?php echo $row['company_name'];?></div>
                           <div>Website : &nbsp; &nbsp; <?php echo $row['website'];?></div>
                           <div>Contact Number : &nbsp; &nbsp; <?php echo $row['contact_number'];?></div>
                        </div>
                        <div class="clearfix"></div>
                     </div>
                  </div>
                  <div class="col-md-4">
                     <div class="sidebarWrp listWrpService jobdetail">
                        <h3>About Company</h3>
                        <p><?php echo $row['company_about'];?></p>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!--Inner Content end--> 
      <!--copyright start-->
      <div class="footer">
         <div class="container">
            <div class="row">
               <div class="col-md-6 col-sm-6">
                  <div class="copyright">Copyright © 2018 MeeM.one - All Rights Reserved.</div>
               </div>
               <div class="col-md-6 col-sm-6">
                  <div class="social">
                     <div class="followWrp">
                        <span>Follow Us</span>
                        <ul class="social-wrap">
                           <li><a href="#."><i class="fa fa-facebook-square" aria-hidden="true"></i></a></li>
                           <li><a href="#."><i class="fa fa-linkedin-square" aria-hidden="true"></i></a></li>
                        </ul>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!--copyright end--> 
      <!-- Include all compiled plugins (below), or include individual files as needed --> 
      <script src="js/bootstrap.min.js"></script> 
      <!-- SLIDER REVOLUTION SCRIPTS  --> 
      <script type="text/javascript" src="rs-plugin/js/jquery.themepunch.tools.min.js"></script> 
      <script type="text/javascript" src="rs-plugin/js/jquery.themepunch.revolution.min.js"></script> 
      <!-- general script file --> 
      <script src="js/owl.carousel.js"></script> 
      <script type="text/javascript" src="js/script.js"></script>
   </body>
</html>