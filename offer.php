<?php
include("include/class.user.php");
$user=new USER();
 $userid=$_POST['userid'];

// pay offer for jobseeker
if(empty($_POST['payby'])) {
$rw=$user->getUserDetails($userid);	
 
     $userid=$rw['id'];
     $name=$rw['name'];
     $email=$rw['email'];

 function getuniqecode() {
	
		$char1="123456789";
		$len= strlen($char1)-1;
	return  substr($char1, rand(0, $len) , 1).
			substr($char1, rand(0, $len) , 1).
			substr($char1, rand(0, $len) , 1).
			substr($char1, rand(0, $len) , 1)
			;
	   }
 $password1=getuniqecode();
 $password1="MEEM1JOB@".$password1;
 $password=md5($password1);
  
	$pdate=date('Y-m-d');
	$prw=$user->getOfferPlan();
	 $plans=$prw['duration'];
	$dtime=strtotime($pdate);
	$mdate = strtotime("$plans", $dtime);
	 $expirydate=date('Y-m-d',$mdate);
	$ip=$_SERVER['REMOTE_ADDR'];
	$amount1='Free registration';
	
	

  // update temp_register 
	$insert=$user->updatePaidUser($userid,$password,$pdate,$amount1,$plans,$expirydate);
	
  
	  // get userid
   $paid_id=$user->lastID();
	
	// SET PROFILEID
   $profileid="MEEM1JOB". $userid;

  //$stmt=$user->runQuery("update job_users set profileId='$profileid'  where id='$userid'");
//  $stmt->execute();
	
// insert into user photo approval table for admin approval 
   
   $st=$user->runQuery("insert into photo_approval(userid,pp_photo,resume,user_about,date_on,user_for) value('$userid','0','0','0','$pdate','jobseeker')");
   $st->execute();
		



$headers ='MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
$headers .= "From: MeeM.one Job Portal <support@meem.one> \n";
$headers .= "Reply-To: MeeM.one Job Portal <support@meem.one> \n";
	
$sub2="MeeM.one Job Portal:Please check Login ID & Password";

$welcomemsg  = "<html><body><div style='width:75%; padding:20px 100px; background:#ebebe0'><div style='background:#FFFFFF; border:5px solid #9999ff;'>";
$welcomemsg  .= "<div style='text-align:left;background:#f7f7f7;padding:5px 10px;margin:10px 0px'><a href='http://ridaits.com/meemJob/'><img src='http://ridaits.com/meemJob/images/logo.png'></a></div>";

$welcomemsg .= "<div style='padding:7px 20px; background:#e68a00; font-size:20px; color:#FFFFFF; font-family:Geneva, Arial, Helvetica, sans-serif'>Login ID & Password</div>";
                   
			
$welcomemsg .= "<div style='padding:10px 20px; font-size:15px; color:#666;font-family:calibri;line-height:1.4em'>
               Hi $name,<br> We are pleased to inform  that you are succesfully registered ( $plans duration) with <strong> MeeM.one Job Portal</strong>.<br>
				  Thanks for joining with  MeeM.one Job Portal
                  <br><br>
		
								   <h3><b>Login ID </b>: $email</h3>
								   <h3><b>Login password </b>: $password1</h3>
								  
								    </div>";

                    $welcomemsg .= "<p style='margin:5px 0px;padding:0px 0px 0px 10px;color:#0066CC;font-family:calibri;font-size:18px;line-height:1.4em'>Regards,<br> support@meem.one</p></div></div></body></html>";

	              $status= mail($email, $sub2, $welcomemsg, $headers, '-f support@meem.one');

}





// offer payment for employer
if(!empty($_POST['payby'])) {
    
 $rw=$user->getEmployerDetails($userid);	
 
     $userid=$rw['id'];
     $name=$rw['emp_name'];
     $email=$rw['emp_email'];

 function getuniqecode() {
	
		$char1="123456789";
		$len= strlen($char1)-1;
	return  substr($char1, rand(0, $len) , 1).
			substr($char1, rand(0, $len) , 1).
			substr($char1, rand(0, $len) , 1).
			substr($char1, rand(0, $len) , 1)
			;
	   }
 $password1=getuniqecode();
 $password1="MEEM1JOB@".$password1;
 $password=md5($password1);
  
	$pdate=date('Y-m-d');
	$prw=$user->getOfferPlanEmp();
	 $plans=$prw['duration'];
	$dtime=strtotime($pdate);
	$mdate = strtotime("$plans", $dtime);
	 $expirydate=date('Y-m-d',$mdate);
	$ip=$_SERVER['REMOTE_ADDR'];
	$amount1='Free registration';
	
	

  // update temp_register 
	$insert=$user->updatePaidEmployer($userid,$password,$pdate,$amount1,$plans,$expirydate);
	
   $st=$user->runQuery("insert into photo_approval(userid,pp_photo,resume,user_about,date_on,user_for) value('$userid','0','0','0','$pdate','employer')");
   $st->execute();
		

$headers ='MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
$headers .= "From: MeeM.one Job Portal <support@meem.one> \n";
$headers .= "Reply-To: MeeM.one Job Portal <support@meem.one> \n";
	
$sub2="MeeM.one Job Portal:Please check Login ID & Password for Employer Login";

$welcomemsg  = "<html><body><div style='width:75%; padding:20px 100px; background:#ebebe0'><div style='background:#FFFFFF; border:5px solid #9999ff;'>";
$welcomemsg  .= "<div style='text-align:left;background:#f7f7f7;padding:5px 10px;margin:10px 0px'><a href='http://ridaits.com/meemJob/'><img src='http://ridaits.com/meemJob/images/logo.png'></a></div>";

$welcomemsg .= "<div style='padding:7px 20px; background:#e68a00; font-size:20px; color:#FFFFFF; font-family:Geneva, Arial, Helvetica, sans-serif'>Login ID & Password</div>";
                   
			
$welcomemsg .= "<div style='padding:10px 20px; font-size:15px; color:#666;font-family:calibri;line-height:1.4em'>
               Hi $name,<br> We are pleased to inform  that you are succesfully registered ( $plans duration) with <strong> MeeM.one Job Portal</strong>.<br>
				  Thanks for joining with  MeeM.one Job Portal as an Employer.
                  <br><br>
		
								   <h3><b>Login ID </b>: $email</h3>
								   <h3><b>Login password </b>: $password1</h3>
								  
								    </div>";

                    $welcomemsg .= "<p style='margin:5px 0px;padding:0px 0px 0px 10px;color:#0066CC;font-family:calibri;font-size:18px;line-height:1.4em'>Regards,<br> support@meem.one</p></div></div></body></html>";

	              $status= mail($email, $sub2, $welcomemsg, $headers, '-f support@meem.one');   
    
    
    
}


?>