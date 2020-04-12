<?php
include("include/class.user.php");
include("include/mydb.php");
$user = new USER();
ini_set('dispaly_errors',1);
 $id = $_GET['userpayment'];

    if (empty($_GET['userpayment']))
       {
         $user->redirect('index.php');
      }
 $id = base64_decode($id);
 $row=$user->getUserDetails($id);
if($row['paid']=='Y') { $user->redirect("index.php"); }

?>

<!DOCTYPE html>
<html lang="en">
   <!-- Mirrored from hassandesigns.top/html/jobfinder/pricing.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 16 Jul 2018 07:36:03 GMT -->
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
      <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
      <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
      <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
      <![endif]-->
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
      <!--header start end--> 
      <!--inner heading start-->
      <div class="inner-heading">
         <div class="container">
            <h3>Our Packages</h3>
         </div>
      </div>
      <!--inner heading end--> 
      <!--Inner Content start-->
      <div class="inner-content about">
         <div class="container">
            <!--pricing Start-->
            <div class="plan-wrap" id="successdv2">
               <div class="container">
                  <ul class="row">
                     <li class="col-md-4 col-xs-12">
                        <div class="esiWrap">
                           <h3>Try our service without any pay</h3>
                           <div class="price">Free Membership</div>
                           <div class="planLinks">
                              <ul>
                                 <li><i class="fa fa-check-circle" aria-hidden="true"></i> Unlimited Job Search</li>
                                 <li><i class="fa fa-check-circle" aria-hidden="true"></i> Can Applied Unlimited Jobs</li>
                                 <li><i class="fa fa-check-circle" aria-hidden="true"></i> Job Listing</li>
                                 <li><i class="fa fa-check-circle" aria-hidden="true"></i> 1 Month Validity</li>
                              </ul>
                              <div class="get-btn hidden-xs"><a href="#" class="btn btn-info btn-lg scrollToTop" data-toggle="modal" data-target="#myModal">Get Started</a></div>
							  <div class="get-btn visible-xs"><a href="#" class="btn btn-info btn-sm scrollToTop1" data-toggle="modal" data-target="#myModal">Get Started</a></div>
                           </div>
                        </div>
                     </li>
                     <li class="col-md-4  col-xs-12" style="display: none">
                        <div class="esiWrap esiAdvance">
                           <h3>Premium</h3>
                           <div class="price">₹ 1000 for 6 Month $50</div>
                           <div class="planLinks">
                              <ul>
                                 <li><i class="fa fa-check-circle" aria-hidden="true"></i> Unlimited Job Search</li>
                                 <li><i class="fa fa-check-circle" aria-hidden="true"></i> Apply Unlimited Jobs</li>
                                 <li><i class="fa fa-check-circle" aria-hidden="true"></i> Job Listing</li>
                                 <li><i class="fa fa-check-circle" aria-hidden="true"></i> 6 Month Validity</li>
                              </ul>
                              <div class="get-btn hidden-xs"><a href="#" class="btn btn-info btn-lg scrollToTop" data-toggle="modal" data-target="#myModal">Get Started</a></div>
							   <div class="get-btn visible-xs"><a href="#" class="btn btn-info btn-sm scrollToTop1" data-toggle="modal" data-target="#myModal">Get Started</a></div>
                           </div>
                        </div>
                     </li>
                     <li class="col-md-4 col-xs-12" style="display: none">
                        <div class="esiWrap">
                           <h3>Ultimate</h3>
                           <div class="price">₹ 2500 for 12 Month $80</div>
                           <div class="planLinks">
                              <ul>
                                 <li><i class="fa fa-check-circle" aria-hidden="true"></i> Unlimited Job Search</li>
                                 <li><i class="fa fa-check-circle" aria-hidden="true"></i> Apply Unlimited Jobs </li>
                                 <li><i class="fa fa-check-circle" aria-hidden="true"></i> Job Listing</li>
                                 <li><i class="fa fa-check-circle" aria-hidden="true"></i> 12 Month Validity</li>
                              </ul>
                              <div class="get-btn hidden-xs"><a href="#" class="btn btn-info btn-lg scrollToTop" data-toggle="modal" data-target="#myModal">Get Started</a></div>
							  <div class="get-btn visible-xs"><a href="#" class="btn btn-info btn-sm scrollToTop1" data-toggle="modal" data-target="#myModal">Get Started</a></div>
                           </div>
                        </div>
                     </li>
                  </ul>
               </div>
            </div>
            
          <div class="col-md-12" style="padding:0px 0px; display:none" id="success3">
		  
<div class="col-md-10 success_1 col-md-push-1 ">
<h3 class="mem_f">Welcome To <span class='success_3'>MeeM.one</span> Job Portal.<br>
You are successfully registered with MeeM.one Job Portal.<br>
You have selected 1 month free membership.
</h3>
</div>
<div class="col-md-10 success_1 col-md-push-1">
<h4 class="mem_m"> <i class="fa fa-exclamation-circle"></i> We've sent <span class='success_3'>Login ID and Password</span> on your registered EmailID.</h4>
</div>
</div>  
            
            
            
            <!--pricing End--> 
			      <!-- for submition -->
      <div class="row">
          <div class="col-md-12" id="successdv">
            <div id="loginbox" style="margin-top:20px;" class=" col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
               <div class="panel panel-info" >
                  <div class="panel-heading">
                     <div class="panel-title">Details</div>
                  </div>
                  <div style="padding-top:30px" class="panel-body" >
                     <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>
                     <form id="loginform" class="form-horizontal" role="form">
                        <div style="margin-bottom: 25px" class="input-group">
                           <span class="input-group-addon"><i class="fa fa-user"></i></span>
                           <input id="login-username" type="text" class="form-control" name="username" value="<?php echo  $row['name']; ?>" readonly="" style="border:1px solid #ccc;">                                        
                        </div>
                        <div style="margin-bottom: 25px" class="input-group">
                           <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                           <input id="login-password" type="text" class="form-control" value="<?php echo  $row['email']; ?>" readonly="" style="border:1px solid #ccc;">
                        </div>
                        <div style="margin-bottom: 25px" class="input-group">
                           <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                           <input id="login-phone" type="text" class="form-control"  value="<?php echo  $row['mcode'].' '.$row['mobile']; ?>" readonly="" style="border:1px solid #ccc;">
                        </div>
                        <div style="margin-bottom: 25px" class="input-group">
                           <span class="input-group-addon"><i class="fa fa-list-alt"></i></span>
                            <input type="hidden"  name="amount" id="amount"> 
                          <select id="package" name="package" class="form-control" onChange="getpackage()" style="border:1px solid #ccc;">
                            <option value=""> Select your Membership package</option>
                            <?php $sql=mysqli_query($con,"select * from membership");
                            $i=1;
                            while($rw=mysqli_fetch_array($sql)) {
                                if($i==1) {
                            ?>
                            <option value="<?php echo $rw['price_usd'];?> " <?php if($rw['price_usd']==0) { ?> selected<?php } ?>><?php echo $rw['plans'];?></option>
                                <?php $i++; } } ?>
                               
                            </select>
                        </div>
                        <div style="margin-top:10px" class="form-group">
                           <!-- Button -->
                           <div class="col-md-6 controls col-md-push-4">
                         <button type="button" id="pay-btn2"  class="btn btn-success" onClick="payoffer()">Proceed for registration</button>
                           </div>
                        </div>
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!--Inner Content End--> 
         </div>
      </div>

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
      
    <script type="text/javascript" language="javascript"> 
 function getpackage()
 {
      var amnt=$("#package").val();
      $('#amount').val(amnt);
      
 }     
    </script>  
    
 <script type="text/javascript">
	    
function payoffer() {
 var amount = document.getElementById("package").value;
 //alert(amount);
 if (amount == '')
  {
	alert("Please select membership package");
	return false;
  }  

 $.ajax({
    type: 'post',
    url: 'offer.php',
    data: {'userid':<?php echo $id;?>},
	
	 beforeSend: function() {
		$("#pay-btn2").html('please wait..');
	  },
	
	success: function(result) {
      
        $("#success3").show();
	   $("#successdv").fadeOut();
           $("#successdv2").fadeOut();
	   $("#header").fadeOut();
	   $("#logo").fadeOut();
	   $("#success-header").show();
	   
	}
  });
}
</script>   
    
    
      
      
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
      <script>
         $(document).ready(function(){
            $('.scrollToTop').click(function(){
         		$('html, body').animate({scrollTop : 700},400);
         		return false;
         	});
         	
         });
      </script> 
	        <script>
         $(document).ready(function(){
            $('.scrollToTop1').click(function(){
         		$('html, body').animate({scrollTop : 1500},400);
         		return false;
         	});
         	
         });
      </script> 
   </body>
</html>