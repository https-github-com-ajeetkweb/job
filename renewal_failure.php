<?php

  $status      =$_POST["status"];
  $firstname   =$_POST["firstname"];
  $amount      =$_POST["amount"];
  $txnid       =$_POST["txnid"];
  $posted_hash =$_POST["hash"];
  $key         =$_POST["key"];
  $productinfo =$_POST["productinfo"];
  $email       =$_POST["email"];
  $userid  =$_POST["udf1"];

 $retHashSeq = $salt.'|'.$status.'||||||||||'.$userid.'|'.$email.'|'.$firstname.'|'.$productinfo.'|'.$amount.'|'.$txnid.'|'.$key;
  $hash = hash("sha512", $retHashSeq);

  if ($hash != $posted_hash) {
    $msg= "Invalid Transaction. Please try again";

  } 
?>

<html>
   <head>
      <meta charset="utf-8">
      <title>MeeM.one Job Portal - payment status</title>
      <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
      <!-- Stylesheets -->
      <link rel="stylesheet" href="css/animate.css">
      <link rel="stylesheet" href="css/bootstrap.css">
      <link rel="stylesheet" href="css/font-awesome.min.css">
      <link rel="stylesheet" href="css/smoothness/jquery-ui-1.10.4.custom.min.css">
      <link rel="stylesheet" href="rs-plugin/css/settings.css">
      <link rel="stylesheet" href="css/theme.css">
      <link rel="stylesheet" href="css/colors/turquoise.css" id="switch_style">
      <link rel="stylesheet" href="css/responsive.css">      
      </head>
      <body>
      
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
                <li class="dropdown"> <a href="index.php"> Home </a>
           
                </li>
                <li> <a href="aboutus.php"> About Us</a></li>
                <li> <a href="contactus.php" class="active"> Contact us </a></li>
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
          <div class="register-btn"><a href="employer.php">Employer Registration</a></div>
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
      
      
      
      <div class="container" style="margin-top:50px; margin-bottom:50px">
      
       <div class="col-md-8 col-md-push-2" style="padding:20px 10px; background:#ECF8FF; border: 2px solid #a4e0ff;">
      <div class="row">
      <div class="col-md-12 mt100">
      <div class="alert alert-danger">
      <?php echo $msg;?>
      </div>
       
      <h3><a href="membership-renewal.php?token=<?php echo base64_encode($userid);?>" class="btn btn-primary">Back to Payment page</a></h3>
      </div>
     </div>
      </div>
      </div>      
      <footer style="margin-top:0px;">
         <div class="footer-bottom">
            <div class="container">
               <div class="row">
                  <div class="col-xs-6"> &copy; 2018 MeeM.one All Rights Reserved </div>
                  <div class="col-xs-6 text-right">
                     <ul>
                        <li><a href="contact-01.html">Powered by RidaITS</a></li>
                     </ul>
                  </div>
               </div>
            </div>
         </div>
      </footer>
      </body>
      </html>
