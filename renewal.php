<?php
   include("include/class.user.php");
   include("include/mydb.php");
   $user = new USER();
    $id = $_GET['token'];
   
       if (empty($_GET['token']))
          {
           $user->redirect('index.php');
         }
    $id = base64_decode($id);
   
    $row=$user->getUserDetails($id);
   if($row['paid']=='Y') { $user->redirect("index.php"); }
   
   
   
   // payUmoney payment gateway integration
     $merchant_key  = "gtKFFx";
      $salt          = "eCwWELxi";
      $PAYU_BASE_URL = "https://test.payu.in"; // For Test environment
      $action        = '';
      
      $posted = array();
      if(!empty($_POST)) {
         //print_r($_POST);
       foreach($_POST as $key => $value) {    
         $posted[$key] = $value; 
      
       }
      }
      
      $formError = 0;
      
      if(empty($posted['txnid'])) {
        // Generate random transaction id
       $txnid = substr(hash('sha256', mt_rand() . microtime()), 0, 20);
      } else {
       $txnid = $posted['txnid'];
      }
      $hash = '';
      // Hash Sequence
      $hashSequence = "key|txnid|amount|productinfo|firstname|email|udf1|udf2|udf3|udf4|udf5|udf6|udf7|udf8|udf9|udf10";
      if(empty($posted['hash']) && sizeof($posted) > 0) {
       if(
               empty($posted['key'])
               || empty($posted['txnid'])
               || empty($posted['amount'])
               || empty($posted['firstname'])
               || empty($posted['email'])
               || empty($posted['phone'])
               || empty($posted['productinfo'])
              
       ) {
         $formError = 1;
       } else {
         
      $hashVarsSeq = explode('|', $hashSequence);
      
      foreach($hashVarsSeq as $hash_var) {
           $hash_string .= isset($posted[$hash_var]) ? $posted[$hash_var] : '';
           $hash_string .= '|';
         }
      
         $hash_string .= $salt;
      
      
         $hash = strtolower(hash('sha512', $hash_string));
         $action = $PAYU_BASE_URL . '/_payment';
       }
      } elseif(!empty($posted['hash'])) {
       $hash = $posted['hash'];
       $action = $PAYU_BASE_URL . '/_payment';
      } 
     
      
   ?>
<!DOCTYPE html>
<html lang="en">
   <!-- Mirrored from hassandesigns.top/html/jobfinder/pricing.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 16 Jul 2018 07:36:03 GMT -->
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
      <title>MeeM.one Job Portal - Membership renewal</title>
      <!-- Fav Icon -->
      <link rel="shortcut icon" href="favicon.ico">
      <!-- Bootstrap -->
      <link href="css/bootstrap.min.css" rel="stylesheet">
      <link href="css/owl.carousel.css" rel="stylesheet">
      <link href="css/font-awesome.css" rel="stylesheet">
      <link href="css/style.css" rel="stylesheet">
      <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic' rel='stylesheet' type='text/css'>
      <link href="https://fonts.googleapis.com/css?family=Alice" rel="stylesheet">
      <!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
      <script src="js/jquery-2.1.4.min.js"></script> 
      <script src="js/bootstrap.min.js"></script> 
      <script>
         var hash = '<?php echo $hash ?>';
         function submitPayuForm() {
           if(hash == '') {
             return;
           }
           var payuForm = document.forms.payuForm;
           payuForm.submit();
         }
      </script>
   </head>
   <body onLoad="submitPayuForm()">
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
                              <li class="dropdown"> <a href="index.php" class="active" target="_blank"> Home </a>
                              </li>
                              <li> <a href="aboutus.php"  target="_blank"> About Us</a></li>
                              <li> <a href="contactus.php" target="_blank"> Contact us </a></li>
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
                     <div class="post-btn"><a href="jobseeker.php" target="_blank"><i class="fa fa-suitcase"></i> Job Seeker</a></div>
                     <div class="login-btn"><a href="login.php" target="_blank">Login</a></div>
                     <div class="user-wrap">
                        <div class="register-btn"><a href="employer.php" target="_blank">Employer Registration</a></div>
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
                                 <li><i class="fa fa-check-circle" aria-hidden="true"></i> Can Applied 20 Jobs</li>
                                 <li><i class="fa fa-check-circle" aria-hidden="true"></i> Job Listing</li>
                                 <li><i class="fa fa-check-circle" aria-hidden="true"></i> 1 Month Validity</li>
                              </ul>
                              <div class="get-btn hidden-xs"><a href="#" class="btn btn-info btn-lg scrollToTop" data-toggle="modal" data-target="#myModal">Get Started</a></div>
                              <div class="get-btn visible-xs"><a href="#" class="btn btn-info btn-sm scrollToTop1" data-toggle="modal" data-target="#myModal">Get Started</a></div>
                           </div>
                        </div>
                     </li>
                     <li class="col-md-4  col-xs-12">
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
                     <li class="col-md-4 col-xs-12">
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
                           <form method="post" action="<?php echo $action;?>"   name="payuForm"   class="form-horizontal" role="form"  >
                              <input type="hidden" name="key" value="<?php echo $merchant_key ?>" /> 
                              <input type="hidden" name="hash" value="<?php echo $hash; ?>"/>
                              <input type="hidden" name="txnid" value="<?php echo $txnid ;?>" />
                              <input type="hidden" name="udf1" value="<?php echo $id;?>">
                              <input type="hidden" name="surl" value="http://ridaits.com/meemJob/renewal-success.php" />   
                              <input type="hidden" name="furl" value="http://ridaits.com/meemJob/renewal-failure.php" />
                              <input type="hidden" name="productinfo" class="form-control" value="membership-renewal">  
                              <div style="margin-bottom: 25px" class="input-group">
                                 <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                 <input id="login-username" type="text" class="form-control" name="firstname" value="<?php echo  $row['name']; ?>" readonly="" style="border:1px solid #ccc;">                                        
                              </div>
                              <div style="margin-bottom: 25px" class="input-group">
                                 <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                 <input type="text" name="email" class="form-control" value="<?php echo  $row['email']; ?>" readonly="" style="border:1px solid #ccc;">
                              </div>
                              <div style="margin-bottom: 25px" class="input-group">
                                 <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                                 <input  name="phone" type="text" class="form-control"  value="<?php echo  $row['mcode'].' '.$row['mobile']; ?>" readonly="" style="border:1px solid #ccc;">
                              </div>
                              <div style="margin-bottom: 25px" class="input-group">
                                 <span class="input-group-addon"><i class="fa fa-list-alt"></i></span>
                                 <input type="hidden"  name="amount" id="amount" value="<?php echo isset($_POST['amount']) ? $_POST['amount'] : ''; ?>"> 
                                 <select id="package" name="package" class="form-control" onChange="getpackage()" style="border:1px solid #ccc;" required>
                                    <option value=""> Select your Membership package</option>
                                    <?php $sql=mysqli_query($con,"select * from renewal_tble");
                                       $i=1;
                                       while($rw=mysqli_fetch_array($sql)) {
                                       
                                       ?>
                                    <option value="<?php echo $rw['price_inr'];?>"><?php echo $rw['plans'];?></option>
                                    <?php $i++; }  ?>
                                 </select>
                              </div>
                              <div style="margin-top:10px" class="form-group">
                                 <!-- Button -->
                                 <div class="col-md-6 controls col-md-push-4">
                                    <input type="submit" id="pay-btn2"  name="Payment" value="Proceed for payment"  class="btn btn-success" onClick="return validate()">
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
         // getting amount from selected package
         function getpackage()
         {
              var amnt=$("#package").val();
              $('#amount').val(amnt);
         
         }     
          
      </script>  
      <script type="text/javascript">
         function validate() {
          var amount = document.getElementById("package").value;
          if (amount == '')
           {
         	alert("Please select membership package");
         	return false;
           }  
         }
      </script>   
      <!--copyright end--> 
      <!-- Include all compiled plugins (below), or include individual files as needed --> 
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