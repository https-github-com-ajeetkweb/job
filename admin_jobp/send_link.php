<?php
require_once 'include/class.user.php';
$user = new USER();
$id=$_POST['id'];

if(empty($_POST['employer'])) {
$stmt=$user->runQuery("select email,name,code from job_users where id='$id'");
$stmt->execute();
$rw=$stmt->fetch(PDO::FETCH_ASSOC);
$code=$rw['code'];
$email=$rw['email'];
$name=$rw['name'];
$to="$email";
$id=base64_encode($id);
$headers ='MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
$headers .= "From: MeeM.one Job Portal <support@meem.one> \n";
$headers .= "Reply-To: $email <$email> \n"; 
  
 $sub2='MeeM.one Job Portal: Verification Link For Email ID and Mobile Number ';

$welcomemsg  = "<html><body><div style='width:75%; padding:20px 100px; background:#ebebe0'><div style='background:#FFFFFF; border:5px solid #9999ff;'>";
$welcomemsg  .= "<div style='text-align:left;background:#f7f7f7;padding:5px 10px;margin:10px 0px'><a href='http://ridaits.com/meemJob/'><img src='http://ridaits.com/meemJob/images/logo.png'></a></div>";

$welcomemsg .= "<div style='padding:7px 20px; background:#e68a00; font-size:20px; color:#FFFFFF; font-family:Geneva, Arial, Helvetica, sans-serif'>Verify Email ID and Mobile Number </div>";
                   
                       
$welcomemsg .= "<div style='padding:15px 20px; font-size:15px;background:#e6f2ff; color:#666; font-family:Calibri;'>
                <br> You have successfully filled your form at MeeM.one Job Portal, please verify your email and mobile number and complete your registration.
               <br>
			  
			   <p style='color:#F55F03'>Make sure your mobile phone is ON/Active and you can check/provide verification code.<p>
			  
               To Verify Your Email and Mobile number, just click on the below Link.
               <br>
			   <br>
			    <a href='http://ridaits.com/meemJob/otp.php?id=$id&code=$code' style='padding:8px 20px; background:#33adff; width:250px; color:#FFFFFF; font-size:15px; border:2px solid #CCCCCC; border-radius:4px;font-family:Geneva, Arial, Helvetica, sans-serif;text-decoration:none;'>Confirm Email & Mobile number</a>
				<br>
                  </div>";

$welcomemsg .= "<p style='margin:5px 0px;padding:0px 0px 0px 10px;color:#0066CC;font-family:calibri;font-size:18px;line-height:1.4em'>Regards,<br> support@meem.one</p></div></div></body></html>";

  $status= mail($to, $sub2, $welcomemsg, $headers,'-f support@meem.one');
  
 } 
if(!empty($_POST['employer'])) {

$stmt=$user->runQuery("select emp_email,emp_name,code from employers_tble where id='$id'");
$stmt->execute();
$rw=$stmt->fetch(PDO::FETCH_ASSOC);
$code=$rw['code'];
 $email=$rw['emp_email'];
$name=$rw['emp_name'];
$to="$email";
$id=base64_encode($id);
$headers ='MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
$headers .= "From: MeeM.one Job Portal <support@meem.one> \n";
$headers .= "Reply-To: MeeM.one Job Portal <support@meem.one> \n"; 
  
 $sub2='MeeM.one Job Portal: Verification Link For Email ID and Mobile Number';

$welcomemsg  = "<html><body><div style='width:75%; padding:20px 100px; background:#ebebe0'><div style='background:#FFFFFF; border:5px solid #9999ff;'>";
$welcomemsg  .= "<div style='text-align:left;background:#f7f7f7;padding:5px 10px;margin:10px 0px'><a href='http://ridaits.com/meemJob/'><img src='http://ridaits.com/meemJob/images/logo.png'></a></div>";

$welcomemsg .= "<div style='padding:7px 20px; background:#e68a00; font-size:20px; color:#FFFFFF; font-family:Geneva, Arial, Helvetica, sans-serif'>Verify Email ID and Mobile Number for Employer </div>";
                   
                       
$welcomemsg .= "<div style='padding:15px 20px; font-size:15px; color:#666; font-family:Calibri;'>
                <br> Hi Employer,<bt>
                You have successfully filled your form at MeeM.one Job Portal, please verify your email ID and mobile number and complete your registration.
               <br>
			  
			   <p style='color:#F55F03'>Make sure your mobile phone is ON/Active and you can check/provide verification code.<p>
			  
               To Verify Your Email and Mobile number, just click on the below Link.
               <br>
			   <br>
			    <a href='http://ridaits.com/meemJob/verify.php?id=$id&code=$code' style='padding:8px 20px; background:#33adff; width:250px; color:#FFFFFF; font-size:15px; border:2px solid #CCCCCC; border-radius:4px;font-family:Geneva, Arial, Helvetica, sans-serif;text-decoration:none;'>Confirm Email & Mobile number</a>
				<br>
                  </div>";

$welcomemsg .= "<p style='margin:5px 0px;padding:0px 0px 0px 10px;color:#0066CC;font-family:calibri;font-size:18px;line-height:1.4em'>Regards,<br> support@meem.one</p></div></div></body></html>";

          
            $status= mail($to, $sub2, $welcomemsg, $headers, '-f support@meem.one');
	}

       
?>