<?php
include("include/class.user.php");
$user=new USER();
 $jobid=$_POST['jobid'];

 function getuniqecode() {
	
		$char1="123456789";
		$len= strlen($char1)-1;
	return  substr($char1, rand(0, $len) , 1).
			substr($char1, rand(0, $len) , 1).
			substr($char1, rand(0, $len) , 1).
			substr($char1, rand(0, $len) , 1)
			;
	   }

	$date=date('Y-m-d H:i:s');

  // update temp_register 
	$stmt=$user->runQuery("update meem_jobs set paid_amount=0,pay_status=1, paid_date='$date' where id='$jobid'");
	$stmt->execute();
	
   echo  $msg="<div style='padding:50px 100px; font-size:16px;color:#2d862d'>Your job has been posted successfully</div>";
   

?>