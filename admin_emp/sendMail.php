<?php
include("include/class.user.php");
$user = new USER();
$name=$_POST['name'];
$email=$_POST['email'];
$sub=$_POST['subject'];
$message=$_POST['message'];
$job_id=$_POST['job_id'];
$uid=$_POST['uid'];

$headers ='MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
$headers .= "From: MeeM.one Job Portal <support@meem.one> \n";
$headers .= "Reply-To: MeeM.one Job Portal <support@meem.one> \n";
	

$welcomemsg  = "<html><body><div style='width:75%; padding:20px 100px; background:#ebebe0'><div style='background:#FFFFFF; border:5px solid #9999ff;'>";
$welcomemsg  .= "<div style='text-align:left;background:#f7f7f7;padding:5px 10px;margin:10px 0px'><a href='http://ridaits.com/meemJob/'><img src='http://ridaits.com/meemJob/images/logo.png'></a></div>";

$welcomemsg .= "<div style='padding:7px 20px; background:#e68a00; font-size:13px; color:#FFFFFF; font-family:Geneva, Arial, Helvetica, sans-serif'> $sub</div>";
                   
			
$welcomemsg .= "<div style='padding:10px 20px; font-size:15px; color:#666;font-family:calibri;line-height:1.4em'>
               $message
		</div>";
$welcomemsg .= "<p style='margin:5px 0px;padding:0px 0px 0px 10px;color:#0066CC;font-family:calibri;font-size:18px;line-height:1.4em'>Regards,<br> support@meem.one</p></div></div></body></html>";
 $status= mail($email, $sub, $welcomemsg, $headers, '-f support@meem.one');
 if($status) {
    
    $stmt=$user->runQuery("update job_applications set mail_sent='yes', sent_date=Now() where job_id='$job_id' and user_id='$uid'");
     $stmt->execute();
     echo 'ok';
     
     
     
 }
  
    