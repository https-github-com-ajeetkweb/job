<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
      <title>Post a Job</title>
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
                  <div class="logo"><a href="index.html"><img src="images/logo.png" alt=""></a></div>
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
                              <li class="dropdown"> <a href="" class="active"> Home </a>
                              </li>
                              <li> <a href=""> About Us</a></li>
                              <li> <a href=""> Contact us </a></li>
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
                     <div class="post-btn"><a href="#">Post a Job</a></div>
                     <div class="user-wrap">
                        <div class="login-btn"><a href="#">Login</a></div>
                        <div class="register-btn"><a href="#">Register</a></div>
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
            <h3>Post a Job</h3>
         </div>
      </div>
      <!--inner heading end--> 
      <!--Inner Content start-->
      <div class="inner-content loginWrp">
         <div class="container">
            <!--Post Job Start-->
            <div class="row">
               <div class="col-md-2 col-sm-2"></div>
               <div class="col-md-8 col-sm-8">
                  <div class="login">
                     <div class="formint conForm">
                        <form>
                           <div class="row">
                              <div class="contctxt ">Personal Information <span class="red">*</span></div>
                              <div class="row">
                                 <div class="col-md-6 ">
                                    <div class="input-wrap">
                                       <label>Full Name <span class="red">*</span> </label>
                                       <input type="text" name="text" placeholder="Enter your full name" class="form-control" maxlength="35" onKeyPress="return ValidateAlpha(event);">
                                    </div>
                                 </div>
                                 <div class="col-md-6 ">
                                    <div class="input-wrap">
                                       <label>Gender <span class="red">*</span></label>
                                       <div class="radio" style="margin:3px 0px 0px 1px; padding:0px;">
                                          <label class="i-checks">
                                          <input name="optionsRadios" id="" value="option1"  type="radio">
                                          <i></i>Male</label>
                                          <label class="i-checks" style="margin-left:20px;">
                                          <input name="optionsRadios" id="" value="option2" type="radio"><i></i>Female</label>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="clearfix"></div>
                              <div class="row">
                                 <div class="col-md-6">
                                    <div class="input-wrap">
                                       <label>Email <span class="red">*</span></label>
                                       <input type="email" name="title" placeholder="Type your email" class="form-control">
                                    </div>
                                 </div>
                                 <div class="col-md-6">
                                    <div class="input-wrap">
                                       <label>Current Location <span class="red">*</span></label>
                                       <select id="basic" class="selectpicker show-tick form-control " data-live-search="true">
                                          <option value="" selected="selected">--Select--</option>
                                          <option value="">India</option>
                                          <option value="">Bangladesh</option>
                                          <option value="">china</option>
                                          <option value="">Dhaka</option>
                                          <option value="">Pakistan</option>
                                       </select>
                                    </div>
                                 </div>
                              </div>
                              <div class="row">
                                 <div class="col-md-3">
                                    <div class="input-wrap">
                                       <label>Mobile Number <span class="red">*</span></label>
                                       <select class="form-control" name="category">
                                          <option value="" selected="selected">Code</option>
                                          <option value="">91</option>
                                          <option value="">94</option>
                                          <option value="">95</option>
                                       </select>
                                    </div>
                                 </div>
                                 <div class="col-md-9 no_margin margin_t">
                                    <div class="input-wrap">
                                       <input type="tel" name="mobile" placeholder="Type your mobile number" class="form-control" onKeyPress="return isNumberKey(event)">
                                    </div>
                                 </div>
                              </div>
                              <div class="contctxt">Education & Career <span class="red">*</span></div>
                              <div class="row">
                                 <div class="col-md-6">
                                    <div class="input-wrap">
                                       <label>Education</label>
                                       <select class="form-control" name="location">
                                          <option value="" selected="selected">--Select--</option>
                                          <option value="">B.A</option>
                                          <option value="">B.Com</option>
                                          <option value="">B.Tech</option>
                                          <option value="">M.Tech</option>
                                       </select>
                                    </div>
                                 </div>
                                 <div class="col-md-6">
                                    <div class="input-wrap">
                                       <label>Year of passed out</label>
                                       <select class="form-control" name="location">
                                          <option value="" selected="selected">--Select--</option>
                                          <option value="">2004</option>
                                          <option value="">2004</option>
                                          <option value="">2004</option>
                                          <option value="">2004</option>
                                       </select>
                                    </div>
                                 </div>
                              </div>
                              <div class="row">
                                 <div class="col-md-6">
                                    <div class="input-wrap">
                                       <label>Total years of experience <span class="red">*</span></label>
                                       <select class="form-control" name="location">
                                          <option value="" selected="selected">--Select--</option>
                                          <option>0Year</option>
                                          <option value="">1</option>
                                          <option value="">2</option>
                                          <option value="">3</option>
                                          <option value="">4</option>
                                          <option value="">5</option>
                                       </select>
                                    </div>
                                 </div>
                                 <div class="col-md-6">
                                    <div class="input-wrap">
                                       <label></label>
                                       <select class="form-control" name="location">
                                          <option value="" selected="selected">--Select--</option>
                                          <option>1</option>
                                          <option>2</option>
                                          <option>3</option>
                                          <option>4</option>
                                          <option>5</option>
                                       </select>
                                    </div>
                                 </div>
                              </div>
                              <div class="row">
                                 <div class="col-md-6">
                                    <div class="input-wrap">
                                       <label>Current Company </label>
                                       <input type="text" name="title" placeholder="Where you are currently working" class="form-control">
                                    </div>
                                 </div>
                                 <div class="col-md-6">
                                    <div class="input-wrap">
                                       <label>Industry</label>
                                       <select class="form-control" name="location">
                                          <option value="" selected="selected">--Select--</option>
                                          <option>BPO</option>
                                          <option>IT</option>
                                          <option>Banking</option>
                                       </select>
                                    </div>
                                 </div>
                              </div>
                              <div class="row">
                                 <div class="col-md-6">
                                    <div class="input-wrap"> 
                                       <label>Current Designation <span class="red">*</span></label>
                                       <input type="text" name="title" placeholder="Your job title ex: Manger" class="form-control">
                                    </div>
                                 </div>
                                 <div class="col-md-6">
                                    <div class="input-wrap">
                                       <label>Key Skills <span class="red">*</span></label>
                                       <input type="text" name="title" placeholder="" class="form-control"> 
                                    </div>
                                 </div>
                              </div>
							  <div class="row">
                                 <div class="col-md-6">
                                    <div class="input-wrap"> 
                                       <label>Current Salary</label>
                                       <select class="form-control" name="location">
                                          <option value="" selected="selected">--Select--</option>
                                          <option>10000 to 50000 P.A</option>
                                          <option>10000 to 50000 P.A</option>
                                          <option>10000 to 50000 P.A</option>
                                       </select>
                                    </div>
                                 </div>
                                 <div class="col-md-6">
                                    <div class="input-wrap"> 
                                       <label>Expected Salary</label>
                                       <select class="form-control" name="location">
                                          <option value="" selected="selected">--Select--</option>
                                          <option>10000 to 50000 P.A</option>
                                          <option>10000 to 50000 P.A</option>
                                          <option>10000 to 50000 P.A</option>
                                       </select>
                                    </div>
                                 </div>
                              </div>
                              <div class="row">
                                 <div class="col-md-12">
                                    <div class="input-wrap">
                                       <label>Upload Resume <span class="red">*</span></label>
                                       <input id="fileUpload1" class="form-control input-sm" type="file" name="biodata" />
                                    </div>
                                 </div>
                              </div>
                              <div class="row">
                                 <div class="col-md-12">
                                    <div class="input-wrap">
                                       <label>Add LinkedIn <i class="fa fa-linkedin-square"></i></label>
                                       <input type="text" name="title" placeholder="Paste here LinkedIn link" class="form-control"> 
                                    </div>
                                 </div>
                              </div>
                              <div class="row">
                                 <div class="col-md-12">
                                    <div class="input-wrap">
                                       <textarea class="form-control" placeholder="Ad Description"></textarea>
                                    </div>
                                 </div>
                              </div>
                              <div class="col-md-6 col-md-push-3">
                                 <div class="sub-btn">
                                    <input type="submit" class="sbutn" value="Register Now">
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
      <script>
         // accept only letters 
         function ValidateAlpha(evt)
         {
         var keyCode = (evt.which) ? evt.which : evt.keyCode
         if ((keyCode < 65 || keyCode > 90) && (keyCode < 97 || keyCode > 123) && keyCode != 32)
         
         return false;
         return true;
         }
         // accept only numeric
         function isNumberKey(evt){
         var charCode = (evt.which) ? evt.which : event.keyCode
         if (charCode > 31 && (charCode < 48 || charCode > 57))
         return false;
         return true;
         }  
      </script>
   </body>
</html>