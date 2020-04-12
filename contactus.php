<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>MeeM.one Jobportal</title>

<!-- Fav Icon -->
<link rel="shortcut icon" href="favicon.ico">

<!-- Bootstrap -->
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/owl.carousel.css" rel="stylesheet">
<link href="css/font-awesome.css" rel="stylesheet">
<link href="css/style.css" rel="stylesheet">
<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic' rel='stylesheet' type='text/css'>
<link href="https://fonts.googleapis.com/css?family=Alice" rel="stylesheet">

<script src="js/jquery-2.1.4.min.js"></script> 

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

<!--inner heading start-->
<div class="inner-heading">
  <div class="container">
    <h3>Contact Us</h3>
  </div>
</div>
<!--inner heading end--> 


<!--Inner Content start-->
<div class="inner-content contact-now"> 
<div class="container">  

  <!--Contact Start-->
  <div class="row">
      <div class="col-md-6">
        <div class="contact"> <span><i class="fa fa-phone"></i></span>
          <div class="information"> <strong>Phone No:</strong>
            <p style="font-weight:normal; font-size:16px;">0091 8686151489</p>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="contact"> <span><i class="fa fa-envelope"></i></span>
          <div class="information"> <strong>Email Address:</strong>
            <p style="font-weight:normal; font-size:16px;">support@meem.one</p>
          </div>
        </div>
      </div>
    </div>  
  <script>
  $(document).ready(function() {
   $("#contactForm").submit(function(event) {
  event.preventDefault();
  var data=$("#contactForm").serialize();
  $.ajax ({
   
   type: 'post',
   url:  'contact_mail.php',
   data: data,
   
   success: function(response)
   {
   $("#msg").show();
    $("#msg").html(response);
   }
   
   });
  
   });
  });
  
  </script>
    
    
    <div class="row formCont">
      <div class="col-md-8 col-md-push-2">
        <form method="post" id="contactForm">
          <div class="row">
              <div class="alert alert-success" id="msg" style="display:none"></div>

            <div class="col-sm-6">
              <div class="input-wrap">
                <input type="text" name="name" placeholder="Full Name" maxlength="20" class="form-control" required>
                <div class="form-icon"><i class="fa fa-user" aria-hidden="true"></i></div>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="input-wrap">
                <input type="tel" name="phone" placeholder="Your Phone"  maxlength="15"  class="form-control" required>
                <div class="form-icon"><i class="fa fa-phone" aria-hidden="true"></i></div>
              </div>
            </div>
          </div>
          <div class="row">
           <div class="col-sm-6">
          <div class="input-wrap">
            <input type="email" name="email" placeholder="Your Email"  maxlength="50" class="form-control" required>
            <div class="form-icon"><i class="fa fa-envelope" aria-hidden="true"></i></div>
            </div>                      
            </div>
            <div class="col-sm-6">
          <div class="input-wrap">
            <input type="text" name="subject" placeholder="Enter subject"  maxlength="150" class="form-control" required>
            <div class="form-icon"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></div>
            </div>                      
            </div>
          </div>
          <div class="input-wrap">
            <textarea class="form-control" name="message" placeholder="Type Your Message here.." required></textarea>
            <div class="form-icon"><i class="fa fa-comment" aria-hidden="true"></i></div>
          </div>
          <div class="contact-btn">
            <button class="sub" type="submit" value="submit" name="submitted"> <i class="fa fa-paper-plane" aria-hidden="true"></i> Send Message</button>
          </div>
        </form>
      </div>

    </div>
    
    
  <!--Contact End--> 
  
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
          <div class="followWrp"> <span>Follow Us</span>
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