<?php
   include("include/class.user.php");
   $user = new USER();
   include("include/mydb.php");    
    // Turn off all error reporting
   ini_set('display_errors', 0);
   error_reporting(0);
   ini_set('error_reporting', E_ALL);
   
   $industry=$_GET['job_token'];
   $industry= base64_decode($industry);
   
   
   // unset sessions for pagination
    unset($_SESSION['education'],$_SESSION['location'],$_SESSION['category'],$_SESSION['min_exp'],$_SESSION['keyword']);
   
   
   ?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
      <title>Job Listing</title>
      <!-- Fav Icon -->
      <link rel="shortcut icon" href="">
      <!-- Bootstrap -->
      <link href="css/bootstrap.min.css" rel="stylesheet">
      <link href="css/owl.carousel.css" rel="stylesheet">
      <link href="css/font-awesome.css" rel="stylesheet">
      <link href="css/style.css" rel="stylesheet">
      <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic' rel='stylesheet' type='text/css'>
      <link href="https://fonts.googleapis.com/css?family=Alice" rel="stylesheet">
      <link rel="stylesheet" href="css/bootstrap-select.css">
      <script src="js/bootstrap-select.js" defer></script>
      <!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
      <script src="js/jquery-2.1.4.min.js"></script> 
      <script>
         // pagination
         function getresult(url) {
          
             $.ajax({
                 url: url,
                 type: "GET",
                 data:  {rowcount:$("#rowcount").val()},
                 beforeSend: function(){$("#overlay").show();},
                 success: function(data){
         
                     $(".result").html(data);  // display jobs in div class named 'result'
                     setInterval(function() {$("#overlay").hide(); },500);
                 },
                 error: function()
                 {}
             });
         }
         
      </script>
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
                  <!--Navegation start-->
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
                  <!--Navegation start--> 
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
            <h3>Job Listing</h3>
         </div>
      </div>
      <!--inner heading end--> 
      <!--Inner Content start-->
      <div class="inner-content listing">
         <div class="container">
            <!--Job Listing Start-->
            <div class="row">
               <div class="col-md-3 col-sm-4">
                  <div class="leftSidebar">
                     <div class="filter">Refine Search</div>
                     <div class="sidebarpad">
                        <form method="post" id="search_form">
                           <div class="col-md-12 col-xs-6 new_m">
                              <label style="font-weight:bold;">Experience</label>
                              <div class="">
                                 <select name="min_exp" class="form-control">
                                    <option value="" selected="">--Experience--</option>
                                    <option value="Fresher" <?php if($_POST['exp']=='Fresher') { ?> selected="" <?php } ?>>Fresher</option>
                                    <option value="1" <?php if($_POST['exp']==1) { ?> selected="" <?php } ?>>1</option>
                                    <option value="2" <?php if($_POST['exp']==2) { ?> selected="" <?php } ?>>2</option>
                                    <option value="3" <?php if($_POST['exp']==3) { ?> selected="" <?php } ?>>3</option>
                                    <option value="4" <?php if($_POST['exp']==4) { ?> selected="" <?php } ?>>4</option>
                                    <option value="5" <?php if($_POST['exp']==5) { ?> selected="" <?php } ?>>5</option>
                                    <option value="6" <?php if($_POST['exp']==6) { ?> selected="" <?php } ?>>6</option>
                                    <option value="7" <?php if($_POST['exp']==7) { ?> selected="" <?php } ?>>7</option>
                                    <option value="8" <?php if($_POST['exp']==8) { ?> selected="" <?php } ?>>8</option>
                                    <option value="9" <?php if($_POST['exp']==9) { ?> selected="" <?php } ?>>9</option>
                                    <option value="10" <?php if($_POST['exp']==10) { ?> selected="" <?php } ?>>10</option>
                                    <option value="11" <?php if($_POST['exp']==11) { ?> selected="" <?php } ?>>11</option>
                                    <option value="12" <?php if($_POST['exp']==12) { ?> selected="" <?php } ?>>12</option>
                                    <option value="13" <?php if($_POST['exp']==13) { ?> selected="" <?php } ?>>13</option>
                                    <option value="14" <?php if($_POST['exp']==14) { ?> selected="" <?php } ?>>14</option>
                                    <option value="15" <?php if($_POST['exp']==15) { ?> selected="" <?php } ?>>15</option>
                                 </select>
                              </div>
                           </div>
                           <div class="col-md-12 col-xs-6 new_m">
                              <label style="font-weight:bold;">Job Search</label>
                              <div class="">
                                 <input type="text" name="keyword" value="<?php echo isset($_POST['keyword']) ? $_POST['keyword'] : '' ?>" placeholder="Job Search" class="form-control">
                              </div>
                           </div>
                           <div class="col-md-12 col-xs-6 new_m">
                              <label style="font-weight:bold;">Industry</label>
                              <div class="">
                                 <?php if(empty($_GET['job_token'])) { ?>
                                 <select name="category" class="form-control">
                                    <option value="">Industry </option>
                                    <?php 
                                       $s=mysqli_query($con, "select * from industry");
                                       while($rp=mysqli_fetch_array($s)) {
                                       ?>
                                    <option value="<?php echo $rp['name'];?>" <?php if($_POST['category']==$rp['name']){ ?> selected="selected" <?php } ?>><?php echo $rp['name'];?></option>
                                    <?php } ?>
                                 </select>
                                 <?php } else { ?>  
                                 <input type="text" name="category" class="form-control" value="<?php echo $industry;?>" readonly="">  
                                 <?php } ?>
                              </div>
                           </div>
                           <div class="col-md-12 col-xs-6 new_m">
                              <label style="font-weight:bold;">Education</label>
                              <div class="">
                                 <select name="education" class="form-control">
                                    <option value="">Education</option>
                                    <?php 
                                       $s=mysqli_query($con, "select distinct prefer_edu from meem_jobs where status='1' and pay_status=1 ");
                                       while($rp=mysqli_fetch_array($s)) {
                                           $education .=$rp['prefer_edu'] . ",";
                                       }
                                       $education=substr($education,0,-1);
                                       $education=str_replace(', ',',',$education);
                                       $education=explode(",",$education);
                                       $education=array_unique($education);
                                       foreach($education as  $value) {
                                       ?>
                                    <option value="<?php echo $value;?>" <?php if($_POST['qualification']==$value){ ?> selected="selected" <?php } ?>><?php echo $value;?></option>
                                    <?php } ?>
                                 </select>
                              </div>
                           </div>
                           <div class="col-md-12 col-xs-12 new_m">
                              <label style="font-weight:bold;">City</label>
                              <div class="">
                                 <select id="basic"  name="location" class="form-control" required>
                                    <option value="" selected="selected">Select Location</option>
                                    <?php                                          
                                       $sql = $user->runQuery("select distinct city from meem_jobs where  status=1 and pay_status=1 order by city asc");
                                       $sql->execute();
                                       $rw=$sql->fetchAll();
                                       foreach($rw as $row) {
                                           $city_array=array();
                                           $city .= $row['city'].',';
                                           }
                                           $city=substr($city, 0,-1);
                                           $city_array=explode(',', $city);
                                    foreach ($city_array as $city) {
                                       ?>
                                    <option value="<?php echo $city;?>" <?php if($_POST['location']==$city){ ?> selected="selected" <?php } ?>><?php echo $city;?></option>
                                    <?php } ?>
                                 </select>
                              </div>
                           </div>
                           <div class="sub-btn">
                              <input type="button" class="sbutn" id="search_btn" value="Search Filter">
                           </div>
                        </form>
                        <div class="ad"></div>
                     </div>
                  </div>
               </div>
               <div class="col-md-9 col-sm-8">
                  <div id="overlay">
                     <div>
                        <img src="loading.gif" width="64px" height="64px"/>
                     </div>
                  </div>
                  <div class="result">
                     <div class="col-md-12 text-center">
                        <div class="loader"></div>
                     </div>
                  </div>
               </div>
            </div>
            <!--Job Listing End--> 
         </div>
      </div>
      <!--Inner Content End--> 
      <!--footer start-->
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
      <script type="text/javascript">
         $(document).ready(function() {
         	var url = "search_result.php";  // send request for jobs to this file
         	$.ajax({
         	type: "POST",
         	url: url,
         	data: $("#search_form").serialize(), // post refine form data
         	beforeSend: function()
         	{
         	 $(".result").fadeOut(5); 
                  $(".loader").html('<div style=""><img src="images/loadinga.GIF" /></div>');
         	},
         	success: function(data)
         	{   
         	 $(".result").fadeIn(5);               
         	 $('.result').html(data);
         	}               
         	});
                 
         $(document).on('click','#search_btn' ,function(){
     
         var url = "search_result.php";
         $.ajax({
         type: "POST",
         url: url,
         data: $("#search_form").serialize(),
         beforeSend: function()
         {	
         $('.result').css({"opacity":"0.1"});
         $(".loader").html('<div style=""><img src="images/loadinga.GIF" /></div>');
         
          },
         success: function(data)
         {  
          $(".loader").html('');
         $('.result').css({"opacity":"1"});    
         $(".result").fadeTo( "slow", 1);            
         $('.result').html(data);
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