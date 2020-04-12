<?php

ini_set('display_errors',1);
error_reporting(1);
ini_set('error_reporting', E_ALL);

require_once 'include/class.user.php';
$user = new USER();
include("include/mydb.php");

 $job_id= $_POST['job_id'];
 $company = $_POST['company'];
 $title=$_POST['title'];
 $minexp=$_POST['minexp'];
 $maxexp=$_POST['maxexp'];
 
 $industry = $_POST['industry']; 
$job_type = $_POST['job_type'];
$salary=$_POST['salary'];
$role= $_POST['role'];

$education="";
if(!empty($_POST['education'])) {
	 if(is_array($_POST['education'])) {

	foreach($_POST['education'] as $value)
	{
	$education .= $value . ", "; 
	}
  $education=substr($education,0,-2);
	}
}
	

$edu_detail=$_POST['edu_detail'];
$skill=$_POST['skill'];
$email = $_POST['email'];
$mobile = $_POST['mobile'];
$profile= $_POST['profile'];
$jobdesc=addslashes($_POST['jobdesc']);

$address = addslashes($_POST['address']);
$company_about = addslashes($_POST['about']);
$weblink=$_POST['weblink'];

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

$stmt=$user->runQuery("insert into meem_jobs(emp_id,job_title,job_desc,key_skills,min_exp,max_exp,industry,job_role,job_type,qualification,edu_detail,candidate_profile,salary,company_name,company_about,website,country,state,city,address,contact_number,contact_email,post_date,ip) values(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
  
$stmt=$user->runQuery("update meem_jobs set job_title=?,job_desc=?,key_skills=?,min_exp=?,max_exp=?,industry=?,job_role=?,job_type=?,qualification=?,edu_detail=?,candidate_profile=?,salary=?,company_name=?,company_about=?,website=?,country=?,state=?,city=?,address=?,contact_number=?,contact_email=? where id=?");  
  
     
$register=$stmt->execute(array($title,$jobdesc,$skill,$minexp,$maxexp,$industry,$role,$job_type,$education,$edu_detail,$profile,$salary,$company,$company_about,$weblink,$rcountri,$rstatname,$rcitynm,$address,$mobile,$email,$job_id));      
    
 ?>
 
 <div class="col-md-12">
    <h4 class="alert alert-success">Your Job has been updated successfully.</h4>   
</div>  