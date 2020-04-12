<?php
include("include/class.user.php");
$user=new USER();

 $id=$_POST['id'];
 $code=$_POST['code'];
 $usercode=$_POST['usercode'];
 if(empty($_POST['employer'])) {

	
	// verify Email and Mobile OTP
	
	$statusN="";
	$statusY="Y";
	
	$query=$user->runQuery("select verify from job_users where id=:userid and code=:user_code and otp=:verifycode limit 1");
	$query->bindparam(":userid", $id);
	$query->bindparam(":user_code",$code);
	$query->bindparam(":verifycode",$usercode);
	$query->execute();
	$row=$query->fetch(PDO::FETCH_ASSOC);
	 $count=$query->rowCount();
	if($count>0) {
	 
	 if($row['verify']==$statusN) 
		    {
			    $stmt=$user->runQuery("update job_users set verify=:status where id=:user_id");
				$stmt->bindparam(":status", $statusY);
				$stmt->bindparam(":user_id", $id);
				$stmt->execute();
				
		    	echo  "Verified";
         	       		
	     	 }
			      
	   else
	     	{
			echo  "Your Account is allready Verified";
			
	     	} 
	   }	 
	   
	   else {
		  echo  "Wrong OTP";
         	}
 }
  if(!empty($_POST['employer'])) {
 
	// verify Email and Mobile OTP
	
	$statusN="";
	$statusY="Y";
	
	$query=$user->runQuery("select verify from employers_tble where id=:userid and code=:user_code and otp=:verifycode limit 1");
	$query->bindparam(":userid", $id);
	$query->bindparam(":user_code",$code);
	$query->bindparam(":verifycode",$usercode);
	$query->execute();
	$row=$query->fetch(PDO::FETCH_ASSOC);
	 $count=$query->rowCount();
	if($count>0) {
	 
	 if($row['verify']==$statusN) 
		    {
			    $stmt=$user->runQuery("update employers_tble set verify=:status where id=:user_id");
				$stmt->bindparam(":status", $statusY);
				$stmt->bindparam(":user_id", $id);
				$stmt->execute();
				
		    	echo  "Verified";
         	       		
	     	 }
			      
	   else
	     	{
			echo  "Your Account is allready Verified";
			
	     	} 
	   }	 
	   
	   else {
		  echo  "Wrong OTP";
         	}
      
      
      
  }

?>