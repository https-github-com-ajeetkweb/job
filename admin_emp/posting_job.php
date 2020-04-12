<?php

ini_set('display_errors',1);
error_reporting(1);
ini_set('error_reporting', E_ALL);

require_once 'include/class.user.php';
$user = new USER();
include("include/mydb.php");

$jobcode='';
$currency='';
$minsalary='';
$maxsalary='';
$openings='';




 $company = $_POST['company'];
 $title=$_POST['title'];
 
 $industry = $_POST['industry']; 
$job_type = $_POST['job_type'];
$currency=$_POST['currency'];
$minsalary=$_POST['minsalary'] ? $_POST['minsalary'].'00' : 0;
$maxsalary=$_POST['maxsalary'] ? $_POST['maxsalary'].'00' : 0;
$openings=$_POST['openings'];
$role= $_POST['role'];
$Job_Code=$_POST['jobcode'];
$email = $_POST['email'];
$mobile = $_POST['mobile'];
$jobdesc=$_POST['jobdesc'];
$address = $_POST['address'];
$company_about = $_POST['about'];
$weblink=$_POST['weblink'];


// preferences

$prefer_skills="";
if(!empty($_POST['skills'])) {
	 if(is_array($_POST['skills'])) {

	foreach($_POST['skills'] as $value)
	{
	$prefer_skills .= $value . ", "; 
	}
	$prefer_skills=substr($prefer_skills,0,-2);
	}
}

$prefer_industry="";
if(!empty($_POST['pindustry'])) {
	 if(is_array($_POST['pindustry'])) {

	foreach($_POST['pindustry'] as $value)
	{
	$prefer_industry .= $value . ", "; 
	}
	$prefer_industry=substr($prefer_industry,0,-2);
	}
}

$prefer_nationality="";
if(!empty($_POST['nationality'])) {
	 if(is_array($_POST['nationality'])) {

	foreach($_POST['nationality'] as $value)
	{
	$prefer_nationality .= $value . ", "; 
	}
	$prefer_nationality=substr($prefer_nationality,0,-2);
	}
} 

$prefer_languages="";
if(!empty($_POST['languages'])) {
	 if(is_array($_POST['languages'])) {

	foreach($_POST['languages'] as $value)
	{
	$prefer_languages .= $value . ", "; 
	}
	$prefer_languages=substr($prefer_languages,0,-2);
	}
}



$minexp=$_POST['minexp'];
$maxexp=$_POST['maxexp'];
$health=$_POST['health'];
$gender=$_POST['gender'];
$physique=$_POST['physique'];
$minage=$_POST['minage'];
$maxage=$_POST['maxage'];
$mnfeet=$_POST['mnfeet'];
$mninch=$_POST['mninch'];
$minheight=$mnfeet . "." . $mninch;
$mnheight_cm=$_POST['cmheight'];

$mxfeet=$_POST['mxfeet'];
$mxinch=$_POST['mxinch'];
$maxheight=$mxfeet . "." . $mxinch;
$mxheight_cm=$_POST['cmheight2'];
$religion=$_POST['religion'];


$marital="";
if(!empty($_POST['marital'])) {
	 if(is_array($_POST['marital'])) {

	foreach($_POST['marital'] as $value)
	{
	$marital .= $value . ", "; 
	}
	$marital=substr($marital,0,-2);
	}
}



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

$emp_id=$_POST['emp_id'];

$pncountry = "";
$pncountri='';
if(!empty($_POST['pncountry'])) {
 if(is_array($_POST['pncountry'])) {
 foreach($_POST['pncountry'] as $value) {

$pncountry .=  $value . ",";
}
  $pncountry=substr($pncountry,0,-1);	
  $sc=mysqli_query($con,"select country_name from country where country_id in($pncountry)");
  while($rc=mysqli_fetch_array($sc)) {
  $pncountri .=$rc['country_name'] . ", ";
  }
 $pncountri=substr($pncountri,0,-2);	
 }
}


$pnstatnm='';
$pnstate='';
if(!empty($_POST['pnstate'])) {
if(is_array($_POST['pnstate'])) {

foreach($_POST['pnstate'] as $value) {

 $pnstate .=  $value . ",";
}
 $pnstate=substr($pnstate,0,-1);	
$ss=mysqli_query($con,"select state_name from state where state_id in($pnstate)");
while($r22=mysqli_fetch_array($ss)) {
 $pnstatnm .=$r22['state_name'] . ", ";
}
 $pnstatnm=substr($pnstatnm,0,-2);	
}
}

$npciti="";
$npcity='';
if(!empty($_POST['npcity'])) {
if(is_array($_POST['npcity'])) {
foreach($_POST['npcity'] as $value) {
$npcity .=  $value . ",";
}
 $npcity=substr($npcity,0,-1);
$s4=mysqli_query($con,"select city_name from city where city_id in($npcity)");
while($rp=mysqli_fetch_array($s4)) {
 $npciti .= $rp['city_name'] . ", ";
}
 $npciti=substr($npciti,0,-2);		
}
}

// user preference location


$pncountry2 = "";
$pncountri2='';
if(!empty($_POST['pncountry2'])) {
 if(is_array($_POST['pncountry2'])) {
 foreach($_POST['pncountry2'] as $value) {

$pncountry2 .=  $value . ",";
}
  $pncountry2=substr($pncountry2,0,-1);	
  $sc=mysqli_query($con,"select country_name from country where country_id in($pncountry2)");
  while($rc=mysqli_fetch_array($sc)) {
  $pncountri2 .=$rc['country_name'] . ", ";
  }
 $pncountri2=substr($pncountri2,0,-2);	
 }
}


$pnstatnm2='';
$pnstate2='';
if(!empty($_POST['pnstate2'])) {
if(is_array($_POST['pnstate2'])) {

foreach($_POST['pnstate2'] as $value) {

 $pnstate2 .=  $value . ",";
}
 $pnstate2=substr($pnstate2,0,-1);	
$ss=mysqli_query($con,"select state_name from state where state_id in($pnstate2)");
while($r22=mysqli_fetch_array($ss)) {
 $pnstatnm2 .=$r22['state_name'] . ", ";
}
 $pnstatnm2=substr($pnstatnm2,0,-2);	
}
}

$npciti22="";
$npcity2='';
if(!empty($_POST['npcity2'])) {
if(is_array($_POST['npcity2'])) {
foreach($_POST['npcity2'] as $value) {
$npcity2 .=  $value . ",";
}
 $npcity2=substr($npcity2,0,-1);
$s4=mysqli_query($con,"select city_name from city where city_id in($npcity2)");
while($rp=mysqli_fetch_array($s4)) {
 $npciti22 .= $rp['city_name'] . ", ";
}
 $npciti22=substr($npciti22,0,-2);		
}
}
$rpcountry='';
$rpcountry_name='';
if(!empty($_POST['rpcountry'])) {
 if(is_array($_POST['rpcountry'])) {
 foreach($_POST['rpcountry'] as $value) {

$rpcountry .=  $value . ",";
}
  $rpcountry=substr($rpcountry,0,-1);	
  $sc=mysqli_query($con,"select country_name from country where country_id in($rpcountry)");
  while($rc=mysqli_fetch_array($sc)) {
  $rpcountry_name .=$rc['country_name'] . ", ";
  }
 $rpcountry_name=substr($rpcountry_name,0,-2);	
 }
}
$rpstate_name='';$rpstate='';
if(!empty($_POST['rpstate'])) {
if(is_array($_POST['rpstate'])) {

foreach($_POST['rpstate'] as $value) {

 $rpstate .=  $value . ",";
}
 $rpstate=substr($rpstate,0,-1);	
$ss=mysqli_query($con,"select state_name from state where state_id in($rpstate)");
while($r22=mysqli_fetch_array($ss)) {
 $rpstate_name .=$r22['state_name'] . ", ";
}
 $rpstate_name=substr($rpstate_name,0,-2);	
}
}
$rpcity_name='';$rpcity='';
if(!empty($_POST['rpcity'])) {
if(is_array($_POST['rpcity'])) {
foreach($_POST['rpcity'] as $value) {
$rpcity .=  $value . ",";
}
 $rpcity=substr($rpcity,0,-1);
$s4=mysqli_query($con,"select city_name from city where city_id in($rpcity)");
while($rp=mysqli_fetch_array($s4)) {
 $rpcity_name .= $rp['city_name'] . ", ";
}
 $rpcity_name=substr($rpcity_name,0,-2);		
}
}


$ip=$_SERVER['REMOTE_ADDR'];
$cdate=date("Y-m-d H:i:s");
$code=md5(uniqid(rand()));

$stmt=$user->runQuery("insert into meem_jobs(emp_id,job_code, job_title, job_desc, currency, min_salary, max_salary, Vacancies, industry, job_role, job_type, company_name, company_about, website, country, state, city, address, contact_number, contact_email, prefer_edu, prefer_skill, prefer_min_exp, prefer_max_exp, prefer_industry, prefer_marital, prefer_health, prefer_gender, prefer_body, prefer_min_age, prefer_max_age, prefer_min_height, prefer_max_height, prefer_min_heightCM, prefer_max_heightCM, prefer_religion, prefer_nation, prefer_lang, prefer_ncountry, prefer_nstate, prefer_ncity, prefer_rcountry, prefer_rstate, prefer_rcity, post_date, ip, status) values(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
     
$register=$stmt->execute(array($emp_id,$Job_Code,$title,$jobdesc,$currency,$minsalary,$maxsalary,$openings,$industry,$role,$job_type,$company,$company_about,$weblink,$pncountri,$pnstatnm,$npciti,$address,$mobile,$email,$education,$prefer_skills,$minexp,$maxexp,$prefer_industry,$marital,$health,$gender,$physique,$minage,$maxage,$minheight,$maxheight,$mnheight_cm,$mxheight_cm,$religion,$prefer_nationality,$prefer_languages,$pncountri2,$pnstatnm2, $npciti22, $rpcountry_name,$rpstate_name,$rpcity_name,$cdate,$ip,'0'));
if($register)
 {
     $jobid = $user->lastID();
     echo $jobid=base64_encode($jobid);
     $_SESSION['no_of_jobs']=$openings;
 } 
?>