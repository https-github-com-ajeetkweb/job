<?php
 include("include/class.user.php");
 $user = new USER();
  $status      =$_POST["status"];
  $firstname   =$_POST["firstname"];
  $amount      =$_POST["amount"];
  $txnid       =$_POST["txnid"];
  $posted_hash =$_POST["hash"];
  $key         =$_POST["key"];
  $productinfo =$_POST["productinfo"];
  $email       =$_POST["email"];
  $userid  =$_POST["udf1"];

   
  $salt        ="eCwWELxi";

  If (isset($_POST["additionalCharges"])) {
    $additionalCharges =$_POST["additionalCharges"];
    $retHashSeq        = $additionalCharges.'|'.$salt.'|'.$status.'||||||||||'.$booking_id.'|'.$email.'|'.$firstname.'|'.$productinfo.'|'.$amount.'|'.$txnid.'|'.$key;
          
  } else {
    $retHashSeq = $salt.'|'.$status.'||||||||||'.$userid.'|'.$email.'|'.$firstname.'|'.$productinfo.'|'.$amount.'|'.$txnid.'|'.$key;
  }

  $hash = hash("sha512", $retHashSeq);
  if ($hash != $posted_hash) {
    echo "Invalid Transaction. Please try again";

  } else {
    $msg= "<h3>Thank You. Your payment status is ". $status .".</h3>";
   $msg2="<h4>Your Transaction ID for this transaction is ".$txnid.".</h4>";

	
  $amount = round($amount);
  if (empty($_SESSION['success'])) {
	
     $_SESSION['success']='success';
	 
	 
	 // get membership plan
	 
	 $stmt=$user->runQuery("select duration from emp_renewal_tble where price_inr='$amount'");
	 $stmt->execute();
	 $pdata=$stmt->fetch(PDO::FETCH_ASSOC);
	 $plan=$pdata['duration'];
	 $pdate=date('Y-m-d');
	 // getting expiry date with 7 days grace period
     $mdate = strtotime("$plan", strtotime($pdate."+ 7 days"));
     $expirydate=date('Y-m-d',$mdate);
     $amount='INR'.$amount;
        
     // update employer to paid in table
     $stmt=$user->runQuery("update employers_tble set paid='Y', expire='', paid_date='$pdate', expiry_date='$expirydate', amount='$amount', plan='$plan' where id='$userid'");
     $stmt->execute();

     
     // Activate employer posted jobs 
     
      $stmt=$user->runQuery("update meem_jobs set status='approved' where emp_id='$userid'");
      $stmt->execute();
     
 
    $stmt=$user->runQuery("select * from employers_tble where id='$userid'");
    $stmt->execute();
    $data=$stmt->fetch(PDO::FETCH_ASSOC);
    $mobile=$data['mcode'].' '.$data['mobile'];
   
 // insert payment details in payment table
  
  $date=date('Y-m-d');
   $stmt=$user->runQuery("insert into payment_tble(userid,profileId,emp_name,emp_email,mobile,payfor,payby,currency,amount,pay_date) values('$userid', '', '".$data['name']."', '".$data['email']."', '$mobile','renewal','Employer',inr','$amount','$date')");
   $stmt->execute();


     
     $headers ='MIME-Version: 1.0'."\r\n";
     $headers .='Content-type: text/html; charset=iso-8859-1'."\r\n";
     $headers .="From: MeeM.one Job Portal <support@meem.one> \n";
     $headers .="Reply-To: MeeM.one Job Portal <support@meem.one> \n ";
     
   $sub="Membership renewal";  
     
     
$welcomemsg  = "<html><body><div style='width:75%; padding:20px 100px; background:#ebebe0'><div style='background:#FFFFFF; border:5px solid #9999ff;'>";
$welcomemsg  .= "<div style='text-align:left;background:#f7f7f7;padding:5px 10px;margin:10px 0px'><a href='http://ridaits.com/meemJob/'><img src='http://ridaits.com/meemJob/images/logo.png'></a></div>";

$welcomemsg .= "<div style='padding:7px 20px; background:#e68a00; font-size:13px; color:#FFFFFF; font-family:Geneva, Arial, Helvetica, sans-serif'> $sub</div>";
                   
			
$welcomemsg .= "<div style='padding:10px 20px; font-size:15px; color:#666;font-family:calibri;line-height:1.4em'>
               <P>
                Hi $firstname (Employer), <br>
                your MeeM.one Job Portal account  has been activated successfully.
              </P>
             

	     </div>";
$welcomemsg .= "<p style='margin:5px 0px;padding:0px 0px 0px 10px;color:#0066CC;font-family:calibri;font-size:18px;line-height:1.4em'>Regards,<br> MeeM.one Support Team</p></div></div></body></html>";
 $status= mail($email, $sub, $welcomemsg, $headers, '-f support@meem.one'); 
 

   
   }

}           
?>	
<html>
   <head>
      <meta charset="utf-8">
      <title>MeeM.one Job Portal - payment status</title>
      <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
      <!-- Stylesheets -->
    <link rel="shortcut icon" href="favicon.ico">
      <!-- Bootstrap -->
      <link href="css/bootstrap.min.css" rel="stylesheet">
      <link href="css/owl.carousel.css" rel="stylesheet">
      <link href="css/font-awesome.css" rel="stylesheet">
      <link href="css/style.css" rel="stylesheet">
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
      <div class="alert alert-success">
      <?php echo $msg;?>
      </div>
       <div class="alert alert-info">
      <?php echo $msg2;?>
      </div>
          
      <h3><a href="index.php" class="btn btn-primary">Back to Home page</a></h3>
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