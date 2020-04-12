<?php
   include("include/class.user.php");
   $user = new USER();
   
   // Turn off all error reporting
   ini_set('display_errors', 1);
   error_reporting(1);
   ini_set('error_reporting', E_ALL);
   
   $phpself = $_SERVER['PHP_SELF'];
   include("include/mydb.php");
   ?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
      <title>MeeM.one Job Portal</title>
      <!-- Fav Icon -->
      <link rel="shortcut icon" href="">
      <!-- Bootstrap -->
      <link href="css/bootstrap.min.css" rel="stylesheet">
      <link href="css/owl.carousel.css" rel="stylesheet">
      <link href="css/font-awesome.css" rel="stylesheet">
      <link href="css/style.css" rel="stylesheet">
      <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic' rel='stylesheet' type='text/css'>
      <link href="https://fonts.googleapis.com/css?family=Alice" rel="stylesheet">
      <link rel="stylesheet" href="css/bootstrap-selected.css">
      <script src="js/bootstrap-select.js" defer></script>
   </head>
   <body>
      <!--header start-->
      <div class="header-wrap">
         <div class="container">
            <!--row start-->
            <div class="row">
               <!--col-md-3 start-->
               <div class="col-md-4 col-sm-3 yes_mar">
                  <div class="logo"><a href="index.php"><img src="images/logo.png" alt="logo" class="hidden-xs"> </a>
				  <img src="images/logo_m.png" alt="logo" class="visible-xs m_mobile">
				  <span class="lgo_font hidden-xs">Job Portal</span>
				  <span class="job_mlogo visible-xs">Job Portal</span>
				  </div>
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
                              <li> <a href="contactus.php"> Contact us </a></li>
                           </ul>
                        </div>
                        <div class="clearfix"></div>
                     </div>
                  </div>
                  <!--Navigation start--> 
               </div>
               <!--col-md-3 end--> 
               <!--col-md-2 start for desktop-->
               <div class="col-md-4 col-xs-12 no_nm hidden-xs">
                  <div class="header-right">
                     <div class="post-btn"><a href="jobseeker.php"><i class="fa fa-suitcase"></i> Job Seeker</a></div>
                     <div class="login-btn"><a href="login.php">Login</a></div>
					   <div class="reg-btn visible-xs"><a href="employer.php">Employer zone</a></div>
                     <div class="user-wrap hidden-xs">
                        <div class="register-btn"><a href="employer.php">Employer Zone</a></div>
                        <div class="clearfix"></div>
                     </div>
                     <div class="clearfix"></div>
                  </div>
               </div>
			    <!--col-md-2 start for mobile-->
               <div class=" col-xs-12 no_nm visible-xs">
                  <div class="header-right">
                     <div class="post-btn"><a href="jobseeker.php"><i class="fa fa-suitcase"></i> Job Seeker</a></div>
                     <div class="login-btn"><a href="login.php">Login</a></div>
					   <div class="reg-btn visible-xs"><a href="employer.php">Employer zone</a></div>
                     <div class="user-wrap hidden-xs">
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
      <!--slider start-->
      <div class="slider-wrap">
         <div class="container">
            <div class="sliderTxt">
               <p>Find your desire one in a minute</p>
               <h1>Join us & Find the right job. Right now.</h1>
               <div class="form-wrap">
                  <form method="post" action="job-listing.php">
                     <div class="row">
                        <div class="col-md-4">
                           <div class="input-group">
                               <input type="text" name="keyword" id="keyword" placeholder="Job title, skills, or company" class="form-control input_height" maxlength="50" style="font-size:19px;">
                           </div>
                        </div>
                        <div class="col-md-3">
                           <div class="input-group input_height">
                              <select  name="location" id="location" class=" selectpicker show-tick" data-live-search="true">
                                 <option value="" selected="selected">Location</option>
                                 <?php 
                                   // SELECT LOCATIONS OF AVAIABLE JOBS
                                    $sql = $user->runQuery("select distinct city from meem_jobs where  status=1 and pay_status=1 order by city asc");
                                    $sql->execute();
                                    $rw=$sql->fetchAll();
                                    $city='';
                                    foreach($rw as $row) {
                                       $city_array=array();
                                       $city .= $row['city'].',';
                                    }
                                    $city=substr($city, 0,-1);
                                    $city_array=explode(',', $city);
                                    foreach ($city_array as $city) {                                
                                    ?>
                                 <option value="<?php echo $city;?>"><?php echo $city;?></option>
                                 <?php } ?>
                              </select>
                           </div>
                        </div>
                        <div class="col-md-3">
                           <div class="input-group">
                              <select name="exp" class="selectpicker show-tick input_height">
                                 <option value="">Experience</option>
                                 <option value="Fresher">0 Year</option>
                                 <option value="1">1</option>
                                 <option value="2">2</option>
                                 <option value="3">3</option>
                                 <option value="4">4</option>
                                 <option value="5">5</option>
                                 <option value="6">6</option>
                                 <option value="7">7</option>
                                 <option value="8">8</option>
                                 <option value="9">9</option>
                                 <option value="10">10</option>
                                 <option value="11">11</option>
                                 <option value="12">12</option>
                                 <option value="13">13</option>
                                 <option value="15">14</option>
                                 <option value="15">15</option>
                              </select>
                           </div>
                        </div>
                        <div class="col-md-2">
                           <div class="input-btn">
                              <input type="submit" class="sbutn" name="search-btn" value="Search" onClick="return validate_search()">
                           </div>
                        </div>
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
      <!--slider end--> 
 
      <!--Browse Job Start-->
      <div class="browse-wrap">
         <div class="container">
            <div class="heading-title">Browse <span>Jobs</span></div>
            <ul class="row">
               <?php
               // Jobs based on industry type
                  $st=$user->runQuery("select  * from industry limit 0,8");
                  $st->execute();
                  $itjob=$st->rowCount();
                  if($itjob>0) {
                   $rw=$st->fetchAll();
                   foreach($rw as $data) {
                       $industry=$data['name'];
                     
                  ?>
               <a href="job-listing.php?job_token=<?php echo base64_encode($industry);?>">
                  <li class="col-md-3 col-sm-6 col-xs-6">
                     <div class="jobsWrp">
                        <div class="job-icon"><?php echo $data['image'];?></div>
                        <div class="jobTitle">
               <a href="job-listing.php?job_token=<?php echo base64_encode($industry);?>"><?php echo $industry;?></a></div>
               </div>
               </li>
               </a>
               <?php }} ?>
            </ul>
            <!-- <div class="read-btn"><a href="#">View All Categories</a></div>-->
         </div>
      </div>
      <!--Browse Job End--> 
      <!--featured jobs-->
      <div class="featured-wrap">
         <div class="container">
            <div class="heading-title">Recent uploaded <span>Jobs</span></div>
            <ul class="row">
               <?php
               // getting recent jobs 
               
                  $stmt=$user->getRecentJobs();
                   $rw=$stmt->fetchAll();
                   foreach ($rw as $row){
                     ?>   
               <li class="col-md-6 col-sm-6">
                  <div class="listWrpService">
                     <div class="row">
                        <div class="col-md-3 col-sm-3 col-xs-3">
                           <div class="listImg"><img src="images/feature02.png" alt=""></div>
                        </div>
                        <div class="col-md-9 col-sm-9 col-xs-9">
                           <h3><a href="job-details.php?token=<?php echo base64_encode($row['id']);?>"><?php echo $row['job_title'];?></a></h3>
                           <p><?php echo $row['company_name'];?></p>
                           <ul class="featureInfo">
                              <li><i class="fa fa-map-marker" aria-hidden="true"></i> <?php echo $row['city'];?></li>
                              <li><i class="fa fa-calendar" aria-hidden="true"></i> <?php echo date('d-m-Y',strtotime($row['post_date']));?> </li>
                           </ul>
                           <div class="click-btn"><a href="job-details.php?token=<?php echo base64_encode($row['id']);?>" style="font-family: Calibri">View Details</a></div>
                        </div>
                     </div>
                  </div>
               </li>
               <?php } ?>
            </ul>
            <div class="read-btn"><a href="job-listing.php">View all jobs</a></div>
         </div>
      </div>
      <!--feature end--> 
      <!--How it works start-->
      <div class="works-wrap">
         <div class="container">
            <div class="heading-title">How it <span>works</span></div>
            <div class="headTxt"></div>
            <ul class="row works-service">
               <li class="col-md-4">
                  <div class="worksIcon"><i class="fa fa-files-o" aria-hidden="true"></i></div>
                  <h3>Create Your Resume</h3>
               </li>
               <li class="col-md-4">
                  <div class="worksIcon"><i class="fa fa-paper-plane" aria-hidden="true"></i></div>
                  <h3>Apply for Your Jobs</h3>
               </li>
               <li class="col-md-4">
                  <div class="worksIcon"><i class="fa fa-check-square-o" aria-hidden="true"></i></div>
                  <h3>Hired Now</h3>
               </li>
            </ul>
         </div>
      </div>
      <!--business end--> 
      <!--app start-->
      <div class="app-wrap">
         <div class="container">
            <div class="row">
               <div class="col-md-12 text-center">
                  <div class="click-bttn "><a href="jobseeker.php"><i class="fa fa-upload" aria-hidden="true"></i> Upload your resume</a></div>
               </div>
            </div>
         </div>
      </div>
      <!--app end--> 
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
      
      
      
      
    <script>
        // VALIDATE SEARCH
         function validate_search()
         {
          var valid=true;
         
         if(!$("#keyword").val())
         {
           $("#keyword").css('border', '1px solid #FF6600');
         valid=false;
         }  
          
          return valid;
          
         }
      </script>  
      
    
      <!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
      <script src="js/jquery-2.1.4.min.js"></script> 
      <!-- Include all compiled plugins (below), or include individual files as needed --> 
      <script src="js/bootstrap.min.js"></script> 
      <!-- general script file --> 
      <script src="js/owl.carousel.js"></script> 
      <script type="text/javascript" src="js/script.js"></script>
   </body>
</html>