<?php
require_once 'include/class.user.php';
$user=new USER();

if(empty($_GET['id']) && empty($_GET['code']))
{
$user->redirect('index.php');
}
if(isset($_GET['id']) && isset($_GET['code']))
{ 
 $id = base64_decode($_GET['id']);
$code = $_GET['code'];
// check if user mobile is already verified
$query=$user->runQuery("select verify,name,mobile,mcode,paid from job_users where id=:userid  limit 1");
$query->bindparam(":userid", $id);
$query->execute();
$row=$query->fetch(PDO::FETCH_ASSOC);
$verify=$row['verify'];
$mobile=$row['mobile'];
$mobilecode=$row['mcode'];
$num=$mobilecode.$mobile; 
$username=$row['name'];
if($verify=='Y' && $row['paid']=='') { ?>
<script>
window.location.href = "membership.php?userpayment=<?php  echo base64_encode($id);?>";
</script>
<?php }
// if paid
if($verify=='Y' && $row['paid']=='Y') { ?>
<script>
window.location.href = "index.php";
</script>
<?php }


// insert user sms try in db
$stmt=$user->runQuery("insert into smstry_count(userid,mobile) value('$id','$num')");
$stmt->execute();
if($verify=='') {
// restrict sms try to 3 times
$stmt=$user->runQuery("select * from smstry_count where userid='$id' and mobile='$num'");
$stmt->execute();
$count=$stmt->rowCount();
if($count<4) {

// Function to generate and append OTP code within the message //
/////////////////////////////////////////////////////////////////////////////
function getotp($length = 6, $chars = '0123456789'){
$chars_length = (strlen($chars) - 1);
$string = $chars{rand(0, $chars_length)};
for ($i = 1; $i < $length; $i = strlen($string)){
$r = $chars{rand(0, $chars_length)};
if ($r != $string{$i - 1}) $string .=  $r;
}
return $string;
}
$otp2=getotp();

$apikey = "A79c3dee20e69c31431e858d7a728f271";
$apisender = "MEEMSM";
//Your message to send.
$ms = urlencode("Welcome To MeeM.one Job Portal. Your verification code is $otp2, Enter this code to register. Thank you!");
//Define route 
$route = "default";
//Message channel Promotional=1 or Transactional=2.
$channel = "2";
//Default is 0 for normal message, Set 8 for unicode sms.
$DCS = "0";
//Default is 0 for normal sms, Set 1 for immediate display.
$flashsms = "0";
//Prepare you post parameters
$postData = array(
'apikey' => $apikey,
'senderid' => $apisender,
'channel' => $channel,
'DCS' => $DCS,
'flashsms' => $flashsms,
'number' => $num,
'message' => $ms,
'route' => $route
);
//API URL
$url="https://global.solutionsinfini.com/api/v4/?api_key=A79c3dee20e69c31431e858d7a728f271&method=sms&message=$ms&to=$num&sender=MEEMSM";
// init the resource
$ch = curl_init();
curl_setopt_array($ch, array(
CURLOPT_URL => $url,
CURLOPT_RETURNTRANSFER => true,
CURLOPT_POST => true,
CURLOPT_POSTFIELDS => $postData
//,CURLOPT_FOLLOWLOCATION => true
));
//Ignore SSL certificate verification
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
//get response
$output = curl_exec($ch);
//Print error if any
if(curl_errno($ch))
{
echo 'error:' . curl_error($ch);
}
curl_close($ch);


$stmt=$user->runQuery("update job_users set otp=:user_otp where id=:user_id");
$stmt->bindparam(":user_otp", $otp2);
$stmt->bindparam(":user_id", $id);
$stmt->execute();

  }
 }
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
          <div class="logo"><a href="index.php" target="_blank"><img src="images/logo.png" alt=""></a></div>
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
                <li class="dropdown"> <a href="" class=""> Home </a>
           
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
            <div class="post-btn" style="display: none"><a href="jobseeker.php">Job Seeker</a></div>
          <div class="user-wrap">
            <div class="login-btn" style="display: none"><a href="login.php">Login</a></div>
            <div class="register-btn" style="display: none"><a href="employer.php">Employer Registration</a></div>
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
    <h3>Verify OTP </h3>
	 <p class="custome_p">Make sure your mobile should be On/Active to get verification code</p>
  </div>
</div>
<!--inner heading end--> 

<!--Inner Content start-->
<div class="inner-content loginWrp">
  <div class="container"> 
    <!--Login Start-->
    <div class="row">
     <div id="verified">   
    <?php if($verify=='') { ?> 
      <div class="col-md-12 new_llogin">
  
          <div class="contctxt">Verify OTP<br>
		  </div>

<div class="col-md-12 blue_bg col-xs-12">
<div class="col-md-1 blue_bg1 col-xs-2"><img src="images/sms.png"></div>
<div class="col-md-11 col-xs-9 blue_font">To complete registration Please enter verification code below which is sent to your registered Mobile Number. </div>
</div>
<div class="clearfix"></div>
  <div class="col-md-8 otp_bg col-md-push-2">
      <div class="col-md-12 text-center" style="margin-top:20px; display:none;color:#F00" id="error"></div>
  <div class="col-md-12 ">	
    <p class="verify_o">Please enter verification code below <i class="fa fa-hand-o-down"></i></p>
    <form  method="post" id="otp-form">
                                                    <div class="form-group">
                                                       
                                                        <input type="text" class="form-control" name="usercode" maxlength="10" id="usercode" placeholder="Enter Verification code" name="email">
                                                    </div>
                                                <div class="col-md-2 col-md-push-5 col-xs-push-3">
                                                    <button type="button" class="btn btn-info btn-sm otp_font"  onClick="verifyotp('<?php echo $id;?>','<?php echo $code;?>')">Verify</button>
													</div>
                                                </form>
			</div>	
		<div class="col-md-8 ">	Didn't received the OTP in 90 seconds? <a href="">Click here</a></div>	
  </div>
      </div>
    <?php } ?>
     </div>   
        <div id="verified1" style="display: none">
           <div class="col-md-6  col-md-push-3 otp_bor">
<div class="col-md-12">
<h4 style="color:#d15e62" class="ft_size">Thanks for verifying your Email & Mobile Number 
</h4>
<h4 style="color:#3f963f" class="ft_size"><i class="fa fa-check" aria-hidden="true"></i> Your Email has been verified successfully.</h4>
</div>
<div class="col-md-12">
<h4 style="color:#3f963f" class="ft_size"><i class="fa fa-check" aria-hidden="true"></i> Your Mobile Number has been verified successfully.</h4>
</div>

</div> 
            
        </div>      
        
        
        
        
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

<script>
function verifyotp(id, code) {
 
var id=id;
var code=code;
$.ajax({
type: 'post',	
url: 'verifyotp.php',
data : $('#otp-form').serialize() + '&id='+id+'&code='+code,
beforeSend: function() {
$("#error").fadeOut();
$("#otp-btn").html('Verifying..');
},
success: function(result) {
   
if(result=='Your Account is allready Verified' || result=='Verified') {
$("#verified").hide();
$("#verified1").show();
setTimeout(' window.location.href = "membership.php?userpayment=<?php  echo base64_encode($id);?>"; ',2000);

}
if(result=='Wrong OTP') {
$("#otp-btn").html('Verify');
$("#verify").show();
$("#error").fadeIn();
$("#error").show();
$("#error").html('<span class="alert alert-danger">Invalid OTP , Please enter correct code</span>');
}
},	
});
}
</script>
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
</body>

</html>