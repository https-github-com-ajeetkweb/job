<?php
   include("include/class.user.php");
   $user = new USER();
   
   // job seeker Login
   if(isset($_POST['login-btn']))
   {
      $email=$_POST['email'];
      $password=$_POST['password'];
      $password= md5($password); 
      $stmt=$user->loginUser($email,$password);
      $row=$stmt->fetch(PDO::FETCH_ASSOC);
      $id=base64_encode($row['id']);
      if($password==$row['password'])
      {
          if($row['paid']=='Y')
              {
   
             $_SESSION['USER_name']=$row['name'];
             $_SESSION['USER_ID']=$row['id'];
             header("location:matching-jobs.php");
          
            } else  {
              
           $msg="<div class='alert alert-danger'>Your Account has expired. &nbsp; <span><a href='renewal.php?token=$id'  style='color:#fff; background:#006633;border-radius:5px;text-decoration:none;border:none; padding:5px 10px'>Renew membership</a></span></div>";  
          }
          }
      else {
          
          $msg="<div class='alert alert-danger'>Incorrect email id or password.</div>";
      }   
   }
   
   // forgot password script
   if(isset($_POST['forgot-btn']))
   {
       $email=$_POST['email2'];
       $msg2=$user->sendForgotPswd($email);
   }
   
   
   
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
      <link rel="shortcut icon" href="favicon.ico">
      <!-- Bootstrap -->
      <link href="css/bootstrap.min.css" rel="stylesheet">
      <link href="css/owl.carousel.css" rel="stylesheet">
      <link href="css/font-awesome.css" rel="stylesheet">
      <link href="css/style.css" rel="stylesheet">
      <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic' rel='stylesheet' type='text/css'>
      <link href="https://fonts.googleapis.com/css?family=Alice" rel="stylesheet">
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
                              <li> <a href=""> About Us</a></li>
                              <li> <a href=""> Contact us </a></li>
                           </ul>
                        </div>
                        <div class="clearfix"></div>
                     </div>
                  </div>
                  <!--Navigation start--> 
               </div>
               <!--col-md-3 end--> 
               <!--col-md-2 start-->
               <div class="col-md-4 col-sm-12">
                  <div class="header-right">
                     <div class="post-btn"><a href="jobseeker.php"><i class="fa fa-user"></i> Register</a></div>
                     <div class="clearfix"></div>
                  </div>
               </div>
               <!--col-md-2 end--> 
            </div>
            <!--row end--> 
         </div>
      </div>
      <!--header start end--> 
      <?php if(empty($_GET['option'])) { ?>
      <!--inner heading start-->
      <div class="inner-heading">
         <div class="container">
            <h3>Job Seeker Login</h3>
         </div>
      </div>
      <!--inner heading end--> 
      <?php } ?>
      <!--Inner Content start-->
      <div class="inner-content loginWrp">
         <div class="container">
            <!--Login Start-->
            <div class="row">
               <div class="col-md-3"></div>
               <div class="col-md-6">
                  <div class="login">
                     <?php if(empty($_GET['option'])) { ?>
                     <div class="contctxt">User Login</div>
                     <div class="col-md-12">
                        <?php if(isset($msg)) { echo $msg; }?>  
                     </div>
                     <div class="clearfix"></div>
                     <div class="formint conForm">
                        <form method="post" id="loginForm">
                           <div class="input-wrap">
                              <label class="input-group-addon">Email</label>
                              <input type="email" name="email" id="email" placeholder="User email id" max="50" onBlur="checkValue(this.value)" class="form-control">
                           </div>
                           <div class="input-wrap" style="margin:5px 0px 5px;">
                              <input type="password" name="password" id="password" placeholder="Password"  maxlength="20" onBlur="checkValue(this.value)" class="form-control">
                           </div>
                           <div class="sub-btn">
                              <input type="submit" class="sbutn" value="Login" name="login-btn" onClick="return validate()">
                           </div>
                           <div><span><a href="login.php?option=forgotPswd">Forgot Password?</a></span></div>
                           <div class="newuser"><i class="fa fa-user" aria-hidden="true"></i> New User ? <a href="jobseeker.php">Register Here</a></div>
                        </form>
                     </div>
                     <?php } else { ?>
                     <div class="contctxt">Forgot Password ?</div>
                     <div class="col-md-12">
                        <?php if(isset($msg2)) { echo $msg2; }?>  
                     </div>
                     <div class="clearfix"></div>
                     <div class="formint conForm">
                        <form method="post">
                           <div class="input-wrap">
                              <label class="input-group-addon">Email ID</label>
                              <input type="email" name="email2" id="email2" placeholder="Enter your registered Email ID" max="50" onBlur="checkValue(this.value)" class="form-control" required="">
                           </div>
                           <div class="sub-btn" style="margin-top:5px;">
                              <input type="submit" class="sbutn" value="Submit" name="forgot-btn">
                           </div>
                           <div class="newuser"><i class="fa fa-lock" aria-hidden="true"></i> &nbsp; <a href="login.php">login</a></div>
                        </form>
                     </div>
                     <?php } ?>
                  </div>
               </div>
               <div class="col-md-3"></div>
            </div>
            <!--Login End--> 
         </div>
      </div>
      <!--Inner Content End--> 
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
      <!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
      <script src="js/jquery-2.1.4.min.js"></script> 
      <!-- Include all compiled plugins (below), or include individual files as needed --> 
      <script src="js/bootstrap.min.js"></script> 
      <!-- SLIDER REVOLUTION SCRIPTS  --> 
      <script type="text/javascript" src="rs-plugin/js/jquery.themepunch.tools.min.js"></script> 
      <script type="text/javascript" src="rs-plugin/js/jquery.themepunch.revolution.min.js"></script> 
      <!-- general script file --> 
      <script src="js/owl.carousel.js"></script> 
      <script type="text/javascript" src="js/script.js"></script>
      <input type="submit" value="" />
      </form>
      <script>
         function validate()
         {
         var valid=true;
         if(!$("#email").val()) {
         $("#email").css('border', '1px solid #FF6600');
         $("#email").focus();
         valid=false;
         }
         if(!$("#password").val()) {
         
         $("#password").css('border', '1px solid #FF6600');
         
         $("#password").focus();
         
         valid=false;
         }
         return valid;
         }
         
         function checkValue(data)
         
         {
         if(!$("#password").val()) {  $("#password").css('border', '1px solid #FF6600'); } else { $("#password").css('border', '1px solid #009999'); }
         
         if(!$("#email").val()) {  $("#email").css('border', '1px solid #FF6600'); } else { $("#email").css('border', '1px solid #009999'); }
         
         }
          
      </script>	
   </body>
</html>