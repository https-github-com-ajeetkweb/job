<?php
include("include/class.user.php");
$user = new USER();

// Turn off all error reporting
ini_set('display_errors',1);
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
      <title>Employer's Registration</title>
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
               <div class="col-md-5 col-sm-9">
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
               <div class="col-md-4 col-sm-12">
                  <div class="header-right">
                     <div class="post-btn"><a href="employerlogin.php"><i class="fa fa-lock"></i> Employer Login</a></div>
                     <div class="user-wrap">
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
<div class="inner-heading1">
  <div class="container">
    <h3 class="cus_text">Employer Registration</h3>
  </div>
</div>
      <!--inner heading end--> 
      <!--Inner Content start-->
      <div class="inner-content loginWrp pattern_2">
         <div class="container">
            <!--Post Job Start-->
            <div class="row" >
               <div class="col-md-2 col-sm-2"></div>
               <div class="col-md-8 col-sm-8">
                  <div class="login" id="registerform">
                     <div class="formint conForm">
                        <form id="registerForm" method="post" enctype="multipart/form-data">
                           <div class="row">
                              <div class="contctxt">Fill in your details to create an account. <span class="red">*</span></div>
                              <div class="row" style="margin-top: 15px">
                                 <div class="col-md-6 ">
                                    <div class="input-wrap">
                                       <label>Full Name <span class="red">*</span> </label>
                                       <input type="text" name="name" id="name" placeholder="Enter your full name" class="form-control" maxlength="35" onKeyPress="return ValidateAlpha(event);" onBlur="checkValue(this.value)">
                                    </div>
                                 </div>
                                 <div class="col-md-6 ">
                                    <div class="input-wrap">
                                       <label>Email <span class="red">*</span></label>
                                       <input type="email" name="email" id="email" placeholder="Type your email" class="form-control" maxlength="45" onBlur="checkmail(this.value)">
                                    <span id="msg" style="font-size:15px; font-family:Calibri; margin-top:5px"></span>
                                    </div>
                                 </div>
                              </div>
                              <div class="clearfix"></div>
                              <div class="row" style="margin-top: 15px">
                                 <div class="col-md-6">
                                    <div class="input-wrap">
                                       <label>Company Name <span class="red">*</span></label>
                                       <input type="text" name="cmp_name" id="cmp_name" placeholder="" class="form-control" onBlur="checkValue(this.value)"  maxlength="50" onKeyPress="return ValidateAlpha(event);">
                                    </div>
                                 </div>
                                 <div class="col-md-6">
								 <label>Industry Type <span class="red">*</span></label>
                                    <div class="styled-select">
                                       <select id="basic" name="industry" class="show-tick form-control " data-live-search="true" onBlur="checkValue(this.value)">
                                          <option value="" selected="selected">--Select--</option>
                                          <?php 
                                          $sql = $user->runQuery("select * from industry");
                                          $sql->execute();
                                          $rw=$sql->fetchAll();
                                          foreach($rw as $row) {
                                         ?>
                                          <option value="<?php echo $row['name'];?>"><?php echo $row['name'];?></option>
                                          
                                          <?php } ?>
                                    </select>
									 <span class="fa fa-sort-desc"></span>
                                    </div>
                                 </div>
                              </div>
							 <div class="row" style="margin-top: 15px">
                                 <div class="col-md-6 ">
                                    <div class="input-wrap">
                                       <label> </label>
                                       <div class="radio" style="margin:3px 0px 0px 1px; padding:0px;">
                                          <label class="i-checks">
                                          <input name="cmp_type" id="cmp_type" value="Company"  type="radio">
                                          <i></i>Company</label>
                                          <label class="i-checks" style="margin-left:20px;">
                                          <input name="cmp_type" id="cmp_type" value="Consultant" type="radio"><i></i>Consultant</label>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-md-6">
                                    <div class="input-wrap">
                                       <label>Designation <span class="red">*</span></label>
                                       <input type="text" name="role" id="role" placeholder="" class="form-control" maxlength="50" onKeyPress="return ValidateAlpha(event);" onBlur="checkValue(this.value)">
                                    </div>
                                 </div>
                              </div>
							<div class="row">
                                 <div class="col-md-6">
                                    <div class="input-wrap">
								 <label>Country <span class="red">*</span></label>
                                    <div class="styled-select">
                                  <select id="rcountry"  name="rcountry" class=" show-tick form-control rcountry" data-live-search="true" onBlur="checkValue(this.value)">
                                          <option value="" selected="selected">--Select--</option>
                                           <?php
                                                $s = mysqli_query($con,"select * from country");
                                                while ($rw = mysqli_fetch_array($s)) {
                                                    ?>
                                             <option value="<?php echo $rw['country_id']; ?>" ><?php echo $rw['country_name']; ?></option>
                                             <?php } ?>
                                    </select>
									 <span class="fa fa-sort-desc"></span>
                                    </div>
                                        <div id="error2" style="color:lightcoral"></div>
                                    </div>
                                 </div>
                                 <div class="col-md-6">
								 <label>State <span class="red">*</span></label>
                                    <div class="styled-select">
                                         <select id="rstate" name="rstate" class=" show-tick form-control rstate" data-live-search="true" onBlur="checkValue(this.value)">
                                          <option value="" selected="selected">--Select--</option>
                                          </select>
									 <span class="fa fa-sort-desc"></span>
                                    </div>
                                 </div>
                              </div>
							<div class="row" style="margin-top: 15px">
                                 <div class="col-md-6">
                                    
                                       <label>City <span class="red">*</span></label>
									     <div class="styled-select">
                                       <select id="rcity" name="rcity" class="show-tick form-control rcity" data-live-search="true" onBlur="checkValue(this.value)">
                                          <option value="" selected="selected">--Select--</option>
                                          </select>
										   <span class="fa fa-sort-desc"></span>
                                    </div>
                                 </div>
                                 <div class="col-md-6">
                                    <div class="input-wrap">
                                       <label>Office Address <span class="red">*</span></label>
                                       <input type="text" name="address" id="address" placeholder="" class="form-control" onBlur="checkValue(this.value)"> 
                                    </div>
                                 </div>
                              </div>
                              <div class="row" style="margin-top: 15px">
                                 <div class="col-md-3">
                                   
                                       <label>Mobile Number <span class="red">*</span></label>
									   <div class="styled-select">
                                       <select class="form-control countrycode" name="code" id="code">
                                            <option value="">select country code</option>
                                        </select>
										<span class="fa fa-sort-desc"></span>
                                    </div>
                                 </div>
                                 <div class="col-md-9  margin_t">
                                    <div class="input-wrap">
                                       <input type="tel" id="mobile" name="mobile" placeholder="Type your mobile number" maxlength="15" class="form-control" onBlur="checkValue(this.value)" onKeyPress="return isNumberKey(event)">
                                    </div>
                                 </div>
                              </div>
                         <div class="row" style="margin-top: 15px">
                                 <div class="col-md-12" >
                                    <div class="input-wrap">
                                       <label>Upload Profile Photo</label>
                                       <input id="fileUpload2" class="form-control input-sm" type="file" name="file" />
                                    </div>
                                 </div>
                              </div>
                              <div class="row" style="margin-top: 15px">
                                 <div class="col-md-12">
                                    <div class="input-wrap">
                                       <label>Add LinkedIn <i class="fa fa-linkedin-square"></i></label>
                                       <input type="text" name="link2" placeholder="Paste here LinkedIn link" class="form-control" maxlength="100"> 
                                    </div>
                                 </div>
                              </div>
                              <div class="row" style="margin-top: 15px">
                                 <div class="col-md-12">
                                    <div class="input-wrap">
                                        <textarea class="form-control" name="about" placeholder="Others"></textarea>
                                    </div>
                                 </div>
                              </div>
                              <div class="col-md-6 col-md-push-3" style="margin-top: 15px">
                                 <div class="sub-btn">
                                    <input type="submit" class="sbutn"  id="registerme" value="Register Now">
                                     <img src="images/loader.gif" width="50" height="50" id="rload" style="display: none">
                                 </div>
                              </div>
                           </div>
                        </form>
                     </div>
                  </div>
               </div>
               <div class="col-md-2 col-sm-2"></div>
            </div>
            <!--Post Job End--> 
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
      <script src="js/file-upload.js"></script> 
     
       <script src="js/script-register.js"></script>
      
      
      
   </body>
</html>