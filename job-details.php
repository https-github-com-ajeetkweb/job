<?php
   include("include/class.user.php");
   $user = new USER();
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
      <div class="header-wrap">
         <div class="container">
            <!--row start-->
            <div class="row">
               <!--col-md-3 start-->
               <div class="col-md-3 col-sm-3">
                  <div class="logo"><a href="index.php"><img src="images/logo.png" alt=""></a></div>
                  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
               </div>
               <!--col-md-3 end--> 
               <!--col-md-7 end-->
               <div class="col-md-4 col-sm-9">
                  <!--Navigation start-->
                  <div class="navigationwrape">
                     <div class="navbar navbar-default" role="navigation">
                        <div class="navbar-header"> </div>
                        <div class="navbar-collapse collapse">
                           <ul class="nav navbar-nav">
                              <li class="dropdown"> <a href="index.php" class="active"> Home </a>
                              </li>
                              <li> <a href="aboutus.php"> About Us</a></li>
                              <li> <a href="contatus.php"> Contact us </a></li>
                           </ul>
                        </div>
                        <div class="clearfix"></div>
                     </div>
                  </div>
                  <!--Navigation start--> 
               </div>
               <!--col-md-3 end--> 
               <!--col-md-2 start-->
               <div class="col-md-5 col-sm-12">
                  <div class="header-right">
                     <div class="post-btn"><a href="jobseeker.php"><i class="fa fa-suitcase"></i> Job Seeker</a></div>
                     <div class="login-btn"><a href="login.php">Login</a></div>
                     <div class="user-wrap">
                        <div class="register-btn"><a href="employer.php">Employer Zone</a></div>
                        <div class="clearfix"></div>
                     </div>
                     <div class="clearfix"></div>
                  </div>
               </div>
               <!--col-md-2 end--> 
            </div>
            <!--row end--> 
         </div>
      </div>
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
                        <div class="row">
                           <div class="col-md-3 col-sm-3 col-xs-3">
                              <div class="listImg"><img src="images/jobdetail.jpg" alt=""></div>
                           </div>
                           <div class="col-md-9 col-sm-9 col-xs-9">
                              <h3><?php echo $row['job_title'];?></h3>
                              <p><?php echo $row['company_name'];?></p>
                              <i class="fa fa-briefcase" aria-hidden="true"></i> <?php if(!empty($row['prefer_min_exp'])) { echo $row['prefer_min_exp']. ' - '.$row['prefer_max_exp'].  ' yrs Exp' ; } else { echo 'Fresher';} ?>
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
                              <div class="click-btn"><a href="#" data-toggle="modal" data-target="#myModal">Apply Now</a></div>
                              <!-- The Modal -->
                              <div class="modal" id="myModal">
                                 <div class="modal-dialog">
                                    <div class="modal-content">
                                       <!-- Modal Header -->
                                       <div class="modal-header">
                                          <h4 class="modal-title">Login & Apply for this Job</h4>
                                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                                       </div>
                                       <!-- Modal body -->
                                       <div class="modal-body">
                                          <div class="col-md-12">
                                             <h4 id="error"><?php if(isset($msg)) { echo $msg; }?></h4>
                                          </div>
                                          <form method="post" id="applyForm">
                                             <input type="hidden" name="login_apply" value="apply">
                                             <input type="hidden" name="emp_id" value="<?php echo $row['emp_id'];?>">
                                             <input type="hidden" name="job_id" value="<?php echo $id;?>">
                                             <div class="form-group">
                                                <label>Email ID:</label>
                                                <input type="email" name="email" class="form-control" id="email" maxlength="50" required="">
                                             </div>
                                             <div class="form-group">
                                                <label>Password:</label>
                                                <input type="password" name="password" class="form-control" id="pwd" maxlength="20" required="">
                                             </div>
                                             <input type="submit" name="submit-btn" class="btn btn-primary btn-lg col-md-offset-5 no_radius" value="Login & apply">
                                          </form>
                                          <div class="login-help">
                                             If you are a new user - <a href="jobseeker.php">Register here</a>
                                          </div>
                                       </div>
                                       <!-- Modal footer -->
                                       <div class="modal-footer">
                                          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <h2>Job Discription</h2>
                        <p style="margin-bottom:15px"><?php echo $row['job_desc'];?></p>
		    <!-- start -->		
            
             <!-- end -->
      		<!-- start -->		
             <div class="col-md-6 col-xs-12 no_padd">
			 <div class="col-md-12 col-xs-12 no_padd">
			 <div class="col-md-6 col-xs-6 no_padd my_border">Job Type</div>
			 <div class="col-md-6 col-xs-6 no_padd after_l"><?php echo $row['job_type'];?></div>
			 </div>
			 </div>
             <!-- end -->      
			 <!-- start -->		
             <div class="col-md-6 col-xs-12 no_padd">
			 <div class="col-md-12 col-xs-12 no_padd after_c">
			 <div class="col-md-6 col-xs-6 no_padd my_border">Job Role</div>
			 <div class="col-md-6 col-xs-6 no_padd after_l"><?php echo $row['job_role'];?></div>
			 </div>
			 </div>
             <!-- end -->   
			 <!-- start -->	
       <?php // echo $row['job_role'];?>
       <div class="col-md-6 col-xs-12 no_padd" style="display: none;">
			 <div class="col-md-12 col-xs-12 no_padd after_c">
			 <div class="col-md-6 col-xs-6 no_padd my_border">This job need travel </div>
			 <div class="col-md-6 col-xs-6 no_padd after_l">10%</div>
			 </div>
			 </div>
      <?php// } ?> 
             <!-- end --> 			 
		
			 <!-- start -->		
			<div class="col-md-6 col-xs-12 no_padd">
			 <div class="col-md-12 col-xs-12 no_padd after_c">
			 <div class="col-md-6 col-xs-6 no_padd my_border">Minimum Salary </div>
			 <div class="col-md-6 col-xs-6 no_padd after_l"><?php echo $row['currency'].' '.$row['min_salary'];?></div>
			 </div>
			 </div>
             <!-- end --> 
			 <!-- start -->			 
			<div class="col-md-6 col-xs-12 no_padd">
			 <div class="col-md-12 col-xs-12 no_padd after_c">
			 <div class="col-md-6 col-xs-6 no_padd my_border">Maximum Salary </div>
			 <div class="col-md-6 col-xs-6 no_padd after_l"><?php echo $row['currency'].' '.$row['max_salary'];?></div>
			 </div>
			 </div>
             <!-- end -->  
			<!-- start -->			 
			<div class="col-md-6 col-xs-12 no_padd">
			 <div class="col-md-12 col-xs-12 no_padd after_c">
			 <div class="col-md-6 col-xs-6 no_padd my_border">Numbers of Positions </div>
			 <div class="col-md-6 col-xs-6 no_padd after_l"><?php echo $row['Vacancies'];?></div>
			 </div>
			 </div>
             <!-- end --> 
		    <!-- start -->			 
			<div class="col-md-6 col-xs-12 no_padd">
			 <div class="col-md-12 col-xs-12 no_padd after_c">
			 <div class="col-md-6 col-xs-6 no_padd my_border">Job Location Country </div>
			 <div class="col-md-6 col-xs-6 no_padd after_l"><?php echo $row['country'];?></div>
			 </div>
			 </div>
             <!-- end --> 
			 <!-- start -->			 
			<div class="col-md-6 col-xs-12 no_padd">
			 <div class="col-md-12 col-xs-12 no_padd after_c">
			 <div class="col-md-6 col-xs-6 no_padd my_border">State  </div>
			 <div class="col-md-6 col-xs-6 no_padd after_l"><?php echo $row['state'];?></div>
			 </div>
			 </div>
             <!-- end --> 
          <!-- start -->			 
			<div class="col-md-6 col-xs-12 no_padd">
			 <div class="col-md-12 col-xs-12 no_padd after_c">
			 <div class="col-md-6 col-xs-6 no_padd my_border">City/Town</div>
			 <div class="col-md-6 col-xs-6 no_padd after_l"><?php echo $row['city'];?></div>
			 </div>
			 </div>
             <!-- end --> 
              <div class="col-md-12 col-xs-12 prj"><h2 style="margin-bottom:3px; margin-top:4px;">Preferences for this Job</h2> </div>
		   <!-- start -->			 
			<div class="col-md-6 col-xs-12 no_padd">
			 <div class="col-md-12 col-xs-12 no_padd after_c">
			 <div class="col-md-6 col-xs-6 no_padd my_border">Preferred Education</div>
			 <div class="col-md-6 col-xs-6 no_padd after_l"><?php echo $row['prefer_edu'];?></div>
			 </div>
			 </div>
             <!-- end --> 
		   <!-- start -->			 
			<div class="col-md-6 col-xs-12 no_padd">
			 <div class="col-md-12 col-xs-12 no_padd after_c">
			 <div class="col-md-6 col-xs-6 no_padd my_border">Preferred Experience</div>
			 <div class="col-md-6 col-xs-6 no_padd after_l"><?php echo $row['prefer_min_exp'];?> to <?php echo $row['prefer_max_exp'];?> Years</div>
			 </div>
			 </div>
             <!-- end --> 	 
                        <div class="clearfix"></div>
                        <h2 style="margin-bottom:3px; margin-top:10px;">Key Skills</h2>
                        <ul class="keyLinks keyskills">
                           <?php
                              $skills=explode(',',$row['prefer_skill']);
                              foreach($skills as $skill) {
                              ?>
                           <li><?php echo $skill;?></li>
                           <?php } ?>
                        </ul>
				 <div class="clearfix"></div>	
      <?php if($row['prefer_industry']) { ?>   	
       <!-- start -->			 
			<div class="col-md-6 col-xs-12 no_padd">
			 <div class="col-md-12 col-xs-12 no_padd after_c">
			 <div class="col-md-6 col-xs-6 no_padd my_border">Preferred Industry</div>
			 <div class="col-md-6 col-xs-6 no_padd after_l"><?=$row['prefer_industry'];?></div>
			 </div>
			 </div>
       <!-- end -->
     <?php } if($row['prefer_lang']) { ?>
     <!-- start -->			 
			<div class="col-md-6 col-xs-12 no_padd">
			 <div class="col-md-12 col-xs-12 no_padd after_c">
			 <div class="col-md-6 col-xs-6 no_padd my_border">Languages Known</div>
			<div class="col-md-6 col-xs-6 no_padd after_l"><?=$row['prefer_lang'];?> </div>
			 </div>
			 </div>
     <!-- end --> 
      <?php } if($row['prefer_marital']) { ?>
     <!-- start -->			 
			<div class="col-md-6 col-xs-12 no_padd">
			 <div class="col-md-12 col-xs-12 no_padd after_c">
			 <div class="col-md-6 col-xs-6 no_padd my_border">Marital Status</div>
			 <div class="col-md-6 col-xs-6 no_padd after_l"><?=$row['prefer_marital'];?></div>
			 </div>
			 </div>
     <!-- end -->
     <?php } if($row['prefer_health']) { ?>  	 
     <!-- start -->			 
			<div class="col-md-6 col-xs-12 no_padd">
			 <div class="col-md-12 col-xs-12 no_padd after_c">
			 <div class="col-md-6 col-xs-6 no_padd my_border">Health Status</div>
			 <div class="col-md-6 col-xs-6 no_padd after_l"><?=$row['prefer_health'];?></div>
			 </div>
			 </div>
      <!-- end --> 
  <?php } if($row['prefer_gender']) { ?>
     <!-- start -->			 
			<div class="col-md-6 col-xs-12 no_padd">
			 <div class="col-md-12 col-xs-12 no_padd after_c">
			 <div class="col-md-6 col-xs-6 no_padd my_border">Preferred Gender</div>
			 <div class="col-md-6 col-xs-6 no_padd after_l"><?=$row['prefer_gender'];?></div>
			 </div>
			 </div>
     <!-- end -->
     <?php } if($row['prefer_body']) { ?> 	 
    <!-- start -->			 
			<div class="col-md-6 col-xs-12 no_padd">
			 <div class="col-md-12 col-xs-12 no_padd after_c">
			 <div class="col-md-6 col-xs-6 no_padd my_border">Physique </div>
			 <div class="col-md-6 col-xs-6 no_padd after_l"><?=$row['prefer_body'];?></div>
			 </div>
			 </div>
      <!-- end --> 
  <?php } if($row['prefer_min_age']) { ?> 
   <!-- start -->			 
			<div class="col-md-6 col-xs-12 no_padd">
			 <div class="col-md-12 col-xs-12 no_padd after_c">
			 <div class="col-md-6 col-xs-6 no_padd my_border">Age</div>
			 <div class="col-md-6 col-xs-6 no_padd after_l"><?=$row['prefer_min_age'];?> to <?=$row['prefer_max_age'];?> Years</div>
			 </div>
			 </div>
     <?php } if($row['prefer_min_height']) { ?>  
             <!-- end --> 	 
              <!-- start -->			 
			<div class="col-md-6 col-xs-12 no_padd">
			 <div class="col-md-12 col-xs-12 no_padd after_c">
			 <div class="col-md-6 col-xs-6 no_padd my_border">Minimum Height </div>
			 <div class="col-md-6 col-xs-6 no_padd after_l"><?=$row['prefer_min_height'];?> ft</div>
			 </div>
			 </div>
     <!-- end --> 
     <?php } if($row['prefer_max_height']) { ?> 	
    <!-- start -->			 
			<div class="col-md-6 col-xs-12 no_padd">
			 <div class="col-md-12 col-xs-12 no_padd after_c">
			 <div class="col-md-6 col-xs-6 no_padd my_border">Maximum Height  </div>
			 <div class="col-md-6 col-xs-6 no_padd after_l"><?=$row['prefer_max_height'];?> ft</div>
			 </div>
			 </div>
       <!-- end -->
      <?php } if($row['prefer_religion']) { ?>   	
    <!-- start -->			 
			<div class="col-md-6 col-xs-12 no_padd">
			 <div class="col-md-12 col-xs-12 no_padd after_c">
			 <div class="col-md-6 col-xs-6 no_padd my_border">Religion</div>
			 <div class="col-md-6 col-xs-6 no_padd after_l"><?=$row['prefer_religion'];?></div>
			 </div>
			 </div>
     <?php } if($row['prefer_nation']) { ?>  
             <!-- end --> 
              <!-- start -->			 
			<div class="col-md-6 col-xs-12 no_padd">
			 <div class="col-md-12 col-xs-12 no_padd after_c">
			 <div class="col-md-6 col-xs-6 no_padd my_border">Nationality</div>
			 <div class="col-md-6 col-xs-6 no_padd after_l"><?=$row['prefer_nation'];?></div>
			 </div>
			 </div>
        <!-- end --> 
      <?php } if($row['prefer_ncountry']) { ?>    	
       <!-- start -->			 
			<div class="col-md-6 col-xs-12 no_padd">
			 <div class="col-md-12 col-xs-12 no_padd after_c">
			 <div class="col-md-6 col-xs-6 no_padd my_border">Native Country</div>
			 <div class="col-md-6 col-xs-6 no_padd after_l"><?=$row['prefer_ncountry'];?></div>
			 </div>
			 </div>
      <!-- end --> 	
    <?php } if($row['prefer_nstate']) { ?>  

     <!-- start -->			 
			<div class="col-md-6 col-xs-12 no_padd">
			 <div class="col-md-12 col-xs-12 no_padd after_c">
			 <div class="col-md-6 col-xs-6 no_padd my_border">Native State</div>
			 <div class="col-md-6 col-xs-6 no_padd after_l"><?=$row['prefer_nstate'];?></div>
			 </div>
			 </div>
    <!-- end -->
     <?php } if($row['prefer_ncity']) { ?>  
    <!-- start -->			 
			<div class="col-md-6 col-xs-12 no_padd">
			 <div class="col-md-12 col-xs-12 no_padd after_c">
			 <div class="col-md-6 col-xs-6 no_padd my_border">Native City/Town</div>
			 <div class="col-md-6 col-xs-6 no_padd after_l"><?=$row['prefer_ncity'];?></div>
			 </div>
			 </div>
       <!-- end --> 
     <?php } if($row['prefer_rcountry']) { ?>   		
        <!-- start -->			 
			<div class="col-md-6 col-xs-12 no_padd">
			 <div class="col-md-12 col-xs-12 no_padd after_c">
			 <div class="col-md-6 col-xs-6 no_padd my_border">Residence Country</div>
			 <div class="col-md-6 col-xs-6 no_padd after_l"><?=$row['prefer_rcountry'];?></div>
			 </div>
			 </div>
     <!-- end --> 
     <?php } if($row['prefer_rstate']) { ?> 	
              <!-- start -->			 
			<div class="col-md-6 col-xs-12 no_padd">
			 <div class="col-md-12 col-xs-12 no_padd after_c">
			 <div class="col-md-6 col-xs-6 no_padd my_border">Residence State</div>
			 <div class="col-md-6 col-xs-6 no_padd after_l"><?=$row['prefer_rstate'];?></div>
			 </div>
			 </div>
   <!-- end --> 
   <?php } if($row['prefer_rcity']) { ?>  	
              <!-- start -->			 
			<div class="col-md-6 col-xs-12 no_padd">
			 <div class="col-md-12 col-xs-12 no_padd after_c">
			 <div class="col-md-6 col-xs-6 no_padd my_border">Residence City/Town</div>
			 <div class="col-md-6 col-xs-6 no_padd after_l"><?=$row['prefer_rcity'];?></div>
			 </div>
			 </div>
      <!-- end --> 
    <?php }?>     	
			
		              <!-- start -->			 
			<div class="col-md-12 col-xs-12 no_padd" style="border-top:1px solid #ccc; margin-top:8px; display: none;">
			 <h2 style="margin-top:5px; margin-bottom:0px;">Contact Details</h2>
			 <div class="col-md-12 col-xs-12 no_padd after_c">
			 <div class="col-md-4 col-xs-6 no_padd my_border">Contact Person Mobile Number </div>
			 <div class="col-md-3 col-xs-6 no_padd after_l">91 54654654654</div>
			 </div>
			 <div class="col-md-12 col-xs-12 no_padd after_c">
			 <div class="col-md-4 col-xs-6 no_padd my_border">Contact Email </div>
			 <div class="col-md-3 col-xs-6 no_padd after_l">info@meem.one</div>
			 </div>
			<div class="col-md-12 col-xs-12 no_padd after_c">
			 <div class="col-md-4 col-xs-6 no_padd my_border">Company Address </div>
			 <div class="col-md-3 col-xs-6 no_padd after_l">Vidya Nagar, Hyderabad, TS.</div>
			 </div>
			 </div>
             <!-- end --> 	 
   
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
      <script>
        /*
         * Apply for job after login
         * can only apply for a matched job 
         * 
         */  
          
         $(document).ready(function(){
         $("#applyForm").submit(function(event) {
           event.preventDefault();   
          var data=$("#applyForm").serialize();
          $.ajax ({
            type: 'post',
            url : 'apply_job.php',  // Login and apply for matched job
            data : data,
            
            success : function(response)
            { 
                if(response=='ok') {
                  $("#error").html("<div class='alert alert-success'>Your application has been sent successfully.</div>");  
                 setTimeout(function() { window.location='appliedjobs.php';},1200);    
                 
                }
                else if(response=='no-match') { // if this job  is not matching with job seeker profile
                  $("#error").html("<div class='alert alert-danger'>Sorry, Your profile didn't match with this Job criteria.</div>");  
                 setTimeout(function() { window.location='matching-jobs.php';},1500);    
               
                } 
           else {
              $("#error").html(response);
            }
         }
         
           });
         });
         });
      </script>
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