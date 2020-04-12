<?php

ini_set('display_errors',1);
error_reporting(1);
ini_set('error_reporting', E_ALL);

require_once 'include/class.user.php';
$user = new USER();
include("include/mydb.php");

 $name = $_POST['name'];
$cmp_type = $_POST['cmp_type'];
$email = $_POST['email'];
$mobile = $_POST['mobile'];
$mcode = $_POST['code'];
$company = $_POST['cmp_name'];
$industry = $_POST['industry'];  
$role= $_POST['role'];
$address = $_POST['address'];
$cmp_type = $_POST['cmp_type'];
$link= $_POST['link2'];
$desc = $_POST['about'];

$photo=$_FILES['file']['name']; 
$rd=rand(000,999);
if(!empty($photo)) {
$photo=$rd.$photo; 
}
$pimgtmp=$_FILES['file']['tmp_name'];
move_uploaded_file($pimgtmp,"images/employer/$photo");

$rcountry=$_POST['rcountry'];
$rstate=$_POST['rstate'];
$rcity=$_POST['rcity'];

 $rq=mysqli_query($con,"select country_name from country where country_id='$rcountry'");	
 $rc=mysqli_fetch_array($rq);
 $rcountri=$rc['country_name'];	
 
 $rs=mysqli_query($con,"select state_name from state where state_id='$rstate'");	
 $rsw=mysqli_fetch_array($rs);
 $rstatname=$rsw['state_name'];	

 $se1=mysqli_query($con,"select city_name from city where city_id='$rcity'");	
 $ncrr=mysqli_fetch_array($se1);
 $rcitynm=$ncrr['city_name'];	


$ip=$_SERVER['REMOTE_ADDR'];
$cdate=date('Y-m-d');
$code=md5(uniqid(rand()));

$stmt=$user->runQuery("insert into employers_tble(emp_name,emp_email,company,industry_type,company_type,designation,country,state,city,address,mcode,mobile,emp_photo,link,details,register_date,code,ip) values(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
     
$register=$stmt->execute(array($name,$email,$company,$industry,$cmp_type,$role,$rcountri,$rstatname,$rcitynm,$address,$mcode,$mobile,$photo,$link,$desc,$cdate,$code,$ip));
if($register)
{
  $id = $user->lastID();
  $key = base64_encode($id);
  $id = $key;
  
  
 $to="support@meem.one";
$headers ='MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
$headers .= "From: MeeM.one Job Portal <support@meem.one> \n";
$headers .= "Reply-To: MeeM.one Job Portal <support@meem.one> \n"; 
  
 $sub2='MeeM.one Job Portal: Verification Link For Email ID and Mobile Number';

$welcomemsg  = "<html><body><div style='width:90%; padding:20px 100px; background:#ebebe0'><div style='background:#FFFFFF; border:5px solid #9999ff;'>";
$welcomemsg  .= "<div style='text-align:left;background:#f7f7f7;padding:5px 10px;margin:10px 0px'><a href='https://meem.one/jobportal/'><img src='https://meem.one/jobportal/images/logo.png'></a></div>";

$welcomemsg .= "<div style='padding:7px 20px; background:#e68a00; font-size:20px; color:#FFFFFF; font-family:Geneva, Arial, Helvetica, sans-serif'>Verify Email ID and Mobile Number for Employer </div>";
                   
                       
$welcomemsg .= "<div style='padding:15px 20px; font-size:15px; color:#666; font-family:Calibri;'>
                <br> Hi Employer,<bt>
                You have successfully filled your form at MeeM.one Job Portal, please verify your email ID and mobile number and complete your registration.
               <br>
			  
			   <p style='color:#F55F03'>Make sure your mobile phone is ON/Active and you can check/provide verification code.<p>
			  
               To Verify Your Email and Mobile number, just click on the below Link.
               <br>
			   <br>
			    <a href='https://meem.one/jobportal/verify.php?id=$id&code=$code' style='padding:8px 20px; background:#33adff; width:250px; color:#FFFFFF; font-size:15px; border:2px solid #CCCCCC; border-radius:4px;font-family:Geneva, Arial, Helvetica, sans-serif;text-decoration:none;'>Confirm Email & Mobile number</a>
				<br>
                  </div>";

$welcomemsg .= "<p style='margin:5px 0px;padding:0px 0px 0px 10px;color:#0066CC;font-family:calibri;font-size:18px;line-height:1.4em'>Regards,<br> support@meem.one</p></div></div></body></html>";

          
            $status= mail($email, $sub2, $welcomemsg, $headers, '-f support@meem.one');
         if($status) {
		 if(empty($lang_value)) {
		            
	               $msg2 = " Please click on the confirmation link in the Email to verify your Email ID & Mobile number. ";
				   $msg11 = "We have sent an email to <strong>$email</strong>";
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


    <!--Login Start-->
    <div class="row" style="padding:10px;">
    
      <div class="col-md-12">
  
<div class="contctxt">Verification of Your Email ID & Mobile Number</div>
<div class="col-md-12 col-xs-12 green_bg col-md-push-0">
<div class="col-md-1  col-xs-1 green_bg1"><div class="green_bg2"><i class="fa fa-check check_icon"></i></div></div>
<div class="col-md-10 col-xs-9 green_font">Congratulation! You have submitted form successfully... Thanks for registration with us.</div>
</div>
<div class="clearfix"></div>
<div class="col-md-12 col-xs-12 red_bg col-md-push-0">
<div class="col-md-1 col-xs-1 red_bg1"><div class="red_bg2"><i class="fa fa-exclamation red_icon"></i></div></div>
<div class="col-md-10 col-xs-9 red_font">Now Verify Your Email ID & Mobile Number on <i class="fa fa-hand-o-down"></i>
<span class="red_font1 text-center"><?php echo $email;?></span>
</div>
</div>
      </div>
    </div>
	
	
<!--Login End--> 


    
    
 </body>

</html>  
    
    
<?php } ?>