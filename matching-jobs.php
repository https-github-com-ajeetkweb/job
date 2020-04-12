<?php
   include("include/class.user.php");
   $user = new USER();
   include("include/mydb.php");  
   
 $token=isset($_GET['token']) ? $_GET['token'] : '';

   if($token=='')
  {
   if(!$user->is_logged_in()) {
      $user->redirect("login.php");
     }
  }  
 else
 {
   $stmt=$user->runQuery("select * from user_login_tble where token=?");
   $stmt->execute(array($token));
   $tdata=$stmt->fetch(PDO::FETCH_ASSOC);
   $_SESSION['USER_name']=$tdata['username'];
   $_SESSION['USER_ID']=$tdata['userid'];
 }


 
    // Turn off all error reporting
   ini_set('display_errors', 0);
   error_reporting(0);
   ini_set('error_reporting', E_ALL);
    
    
    $username= $_SESSION['USER_name'];
    $uid=$_SESSION['USER_ID'];
    
    // get user details
    $stmt=$user->runQuery("select * from job_users where id='$uid' and paid='Y'");
    $stmt->execute();
    $result=$stmt->fetch();
    
   // matching jobs with user data
   include("include/getMatching.php"); 
    $sc=mysqli_query($con,$sql);
    $job_count=mysqli_num_rows($sc);
   
   while($rw=mysqli_fetch_array($sc))
      {
   
       $job_ids .=$rw['id']. ',';
       $city .=$rw['city'] . ",";
       $edu .=$rw['qualification'] . ",";
       $industry .=$rw['industry'] . ",";
       
     }
     $job_ids= substr($job_ids,0,-1);
      $city= substr($city,0,-1);
      $edu= substr($edu,0,-1);
      $industry= substr($industry,0,-1);
     
   //Insert or update matched jobs count in db
   	$ucount=$user->checkUserMatch($uid);
   	$stmt=($ucount=='0') ? $user->insertMatchCount($uid,$job_count,$job_ids) :  $user->updateCount($uid,$job_count,$job_ids);
   	
   
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
         
                     $(".result").html(data);
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
      <?php      include 'include/profile_header.php';?>
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
               <div class="sidebar"
               <div class="col-md-3 col-sm-4" style="display: none;;">
                  <div class="leftSidebar">
                     <div class="filter">Refine Search</div>
                     <div class="sidebarpad">
                        <form method="post" id="search_form">
                           <h4>Job Search</h4>
                           <div class="input-wrap">
                              <input type="text" name="keyword" value="<?php echo isset($_POST['keyword']) ? $_POST['keyword'] : '' ?>" placeholder="Job Search" class="form-control">
                           </div>
                           <h4>Categories</h4>
                           <div class="input-wrap">
                              <select name="category" class="form-control">
                                 <option value="">Category </option>
                                 <?php 
                                    $s=mysqli_query($con, "select * from industry");
                                    while($rp=mysqli_fetch_array($s)) {
                                    ?>
                                 <option value="<?php echo $rp['name'];?>" <?php if($_POST['category']==$rp['name']){ ?> selected="selected" <?php } ?>><?php echo $rp['name'];?></option>
                                 <?php } ?>
                              </select>
                           </div>
                           <h4>Education</h4>
                           <div class="input-wrap">
                              <select name="education" class="form-control">
                                 <option value="">Select Education</option>
                                 <?php 
                                    $s=mysqli_query($con, "select * from education_tble");
                                    while($rp=mysqli_fetch_array($s)) {
                                    ?>
                                 <option value="<?php echo $rp['education'];?>" <?php if($_POST['education']==$rp['education']){ ?> selected="selected" <?php } ?>><?php echo $rp['education'];?></option>
                                 <?php } ?>
                              </select>
                           </div>
                           <h4>City</h4>
                           <div class="input-wrap">
                              <select id="basic"  name="location" class="selectpicker show-tick" data-live-search="true" required>
                                 <option value="" selected="selected">Select Location</option>
                                 <?php 
                                    $sql = $user->runQuery("select distinct city from meem_jobs where status='1' order by city asc");
                                    $sql->execute();
                                    $rw=$sql->fetchAll();
                                    foreach($rw as $row) {
                                    ?>
                                 <option value="<?php echo $row['city'];?>" <?php if($_POST['location']==$row['city']){ ?> selected="selected" <?php } ?>><?php echo $row['city'];?></option>
                                 <?php } ?>
                              </select>
                           </div>
                           <div class="sub-btn">
                              <input type="button" class="sbutn" id="search_btn" value="Search Filter">
                           </div>
                        </form>
                        <div class="ad"></div>
                     </div>
                  </div>
               </div>
               <div class="col-md-10 col-sm-10 col-md-push-1">
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
                  <div class="col-md-12 text-center" id="display" style="padding:100px 0px;border:1px solid; text-align:center; display:none">
                     <p style="text-align:center">
                        Please wait....<br>
                        Fetching jobs suitable for your profile.
                     </p>
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
         	var url = "match_result.php";
         	$.ajax({
         	type: "POST",
         	url: url,
         	data: $("#search_form").serialize(),
         	beforeSend: function()
         	{ 
         	     $(".result").fadeIn(5);   
                  $(".loader").html('<div style=""><img src="images/loadinga.gif" /></div>');
         	},
         	success: function(data)
         	{   
         	 $("#display").hide(5); 
         	 $(".result").fadeIn(5);               
         	 $('.result').html(data);
         	}               
         	});
                 
         $(document).on('click','#search_btn' ,function(){
         
         
         var url = "match_result.php";
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