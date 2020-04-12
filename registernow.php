<?php
   ini_set('display_errors',0);
   error_reporting(0);
   ini_set('error_reporting', E_ALL);
require_once 'include/class.user.php';
$user = new USER();
$phpself=$_SERVER['PHP_SELF'];
include("include/mydb.php");

	// validate user input data
	 function  validate_data($data)
	 {
		  $data = trim($data);
		  $data = stripslashes($data);
		  $data = strip_tags($data);
		  $data = htmlspecialchars($data);
		  return $data;    
	 } 
	




$name = validate_data($_POST['name']);
$gender = $_POST['gender'];
$email = validate_data($_POST['email']);
$mobile = validate_data($_POST['mobile']);
$mcode = $_POST['code'];

$bmonth=$_POST['bmonth'];
$byear=$_POST['byear'];

$dateOfBirth=$byear.'-'.$bmonth.'-'.'01';
$today = date("Y-m-d");
$diff = date_diff(date_create($dateOfBirth), date_create($today));
 $age=$diff->format('%y');

switch($bmonth)
{
case '01' :
$month="Jan";
break;
case '02' : 
$month="Feb";
break;
case '03' :
$month="March";
break;
case '04' :
$month="April";
break;
case '05' :
$month="May";
break;
case '06' :
$month="June";
break;
case '07' :
$month="July";
break;

case '08' :
$month="August";
break;

case '09' :
$month="Sept";
break;

case '10' :
$month="October";
break;
case '11' :
$month="Nov";
break;
case '12' :
$month="Dec";
break;

default :

}	

$birth=$month ." " . $byear; 


$ufeet=$_POST['ufeet'];
$uinch=$_POST['uinch'];
$uheight=$ufeet . "." . $uinch;
$nationality=$_POST['nationality'];
$height_cm=$_POST['cmheight'];

$marital=$_POST['marital'];
$bodi=$_POST['bodi'];
$health=$_POST['health'];
$religion=$_POST['religion'];
$ncountry=$_POST['ncountry'];
$nstate=$_POST['nstate'];
$ncity=$_POST['ncity'];
$rcountry=$_POST['rcountry'];
$rstate=$_POST['rstate'];
$rcity=$_POST['rcity'];
$nc=mysqli_query($con,"select country_name from country where country_id='$ncountry'");	
$nr=mysqli_fetch_array($nc);
 $ncountri=$nr['country_name'];	

$rq=mysqli_query($con,"select country_name from country where country_id='$rcountry'");	
$rc=mysqli_fetch_array($rq);
$rcountri=$rc['country_name'];	

$sq=mysqli_query($con,"select state_name from state where state_id='$nstate'");	
$sc=mysqli_fetch_array($sq);
$nstatname=$sc['state_name'];	

$rs=mysqli_query($con,"select state_name from state where state_id='$rstate'");	
$rsw=mysqli_fetch_array($rs);
$rstatname=$rsw['state_name'];	


$se=mysqli_query($con,"select city_name from city where city_id='$ncity'");	
$ncr=mysqli_fetch_array($se);
$ncitynm=$ncr['city_name'];	

$rcitynm='';
$se1=mysqli_query($con,"select city_name from city where city_id='$rcity'");	
$ncrr=mysqli_fetch_array($se1);
$rcitynm=$ncrr['city_name'];	

$mcode = $_POST['code'];
$mobile = validate_data($_POST['mobile']);
$nt_lang =$_POST['nt_lang'];

$edu='';
$pedu = '';
if(!empty($_POST['edu'])) {
	 if(is_array($_POST['edu'])) {

	foreach($_POST['edu'] as $value)
	{
	$edu .= $value . ", "; 
	}
	$pedu=substr($edu,0,-2);
	}
  }
  

$cmpny = "";
if(!empty($_POST['company'])) {
	 if(is_array($_POST['company'])) {

	foreach($_POST['company'] as $value)
	{
	$cmpny .= $value . ", "; 
	}
	$cmpny=substr($cmpny,0,-2);
	}
  }
$skills='';  
 if(!empty($_POST['skill'])) {
	 if(is_array($_POST['skill'])) {

	foreach($_POST['skill'] as $value)
	{
	$skills .= $value . ", "; 
	}
	$skills=substr($skills,0,-2);
	}
  }
   
  
  
  
$experience=$_POST['experience'];
$experience2=$_POST['experience2'];

 $english=$_POST['english'];
 $eng_speak=$_POST['eng_speak'];
 $eng_read=$_POST['eng_read'];
 $eng_write=$_POST['eng_write'];

$urdu=$_POST['urdu'];
$urdu_read=$_POST['urdu_read'];
$urdu_write=$_POST['urdu_write'];
$urdu_speak=$_POST['urdu_speak'];


$telugu=$_POST['telugu'];
$telugu_read=$_POST['telugu_read'];
$telugu_write=$_POST['telugu_write'];
$telugu_speak=$_POST['telugu_speak'];

$languages_known='';

$languages_known=$english.' '.$urdu.' '.$telugu;
$english_label=$eng_speak.' '.$eng_read.' '.$eng_write;
$urdu_label=$urdu_read.' '.$urdu_write.' '.$urdu_speak;
$telugu_label=$telugu_read.' '.$telugu_write.' '.$telugu_speak;



$currency=$_POST['currency'];
$salary = $_POST['salary'];
$role=$_POST['position'];
$travel=$_POST['travel'];
$travel_range='';
$travel_range=$_POST['travel_range'];
$resume=$_FILES['file']['name']; 
$rd=rand(000,999);
if(!empty($resume)) {
$resume=$rd.$resume; 
}
$pimgtmp=$_FILES['file']['tmp_name'];
move_uploaded_file($pimgtmp,"images/resume/$resume");

$idproof=$_FILES['idproof']['name'];
$idptmp=$_FILES['idproof']['tmp_name'];
if(!empty($idproof)) {
$idproof=$rd.$idproof;
}
move_uploaded_file($idptmp,"images/idproof/$idproof"); 

$pimage=$_FILES['pimage']['name']; 
$pimgtype=$_FILES['pimage']['type'];
$pimgtmp=$_FILES['pimage']['tmp_name'];
if(!empty($pimage)) {
$pimage=$rd.$pimage; 
}
move_uploaded_file($pimgtmp,"images/jobseeker/$pimage");

$social=trim($_POST['social']);
$social2=trim($_POST['social2']);


$expsalary = $_POST['expsalary'];

$desc = $_POST['desc'];

$pcmpny = "";
if(!empty($_POST['pcompany'])) {
	 if(is_array($_POST['pcompany'])) {

	foreach($_POST['pcompany'] as $value)
	{
	$pcmpny .= $value . ", "; 
	}
	$pcmpny=substr($pcmpny,0,-2);
	}
  }
$desired_role = "";
if(!empty($_POST['prefer_role'])) {
	 if(is_array($_POST['prefer_role'])) {

	foreach($_POST['prefer_role'] as $value)
	{
	$desired_role .= $value . ", "; 
	}
	$desired_role=substr($desired_role,0,-2);
	}
  }
$pjobtype = "";
if(!empty($_POST['jobtype'])) {
	 if(is_array($_POST['jobtype'])) {

	foreach($_POST['jobtype'] as $value)
	{
	$pjobtype .= $value . ", "; 
	}
	$pjobtype=substr($pjobtype,0,-2);
	}
  }

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


$pcurrency=$_POST['pcurrency'];
$psalary=$_POST['psalary'];

 $about=validate_data($_POST['about']);


$ip=$_SERVER['REMOTE_ADDR'];
$cdate=date('Y-m-d');
$code=md5(uniqid(rand()));

$stmt=$user->runQuery("insert into job_users(name, gender, email, birth_date,dob,age,ncountry,nstate,ncity,rcountry,rstate,rcity,marital_status,body_type,health,height,height_cm,religion,nationality,native_lang,mcode,mobile,education,industry,exp_year,skill,skill_exp,currency,current_salary,languages_known,english_label,urdu_label,telugu_label,currency2,exp_salary,travel,travel_by,old_role,resume,link,social_link,prefer_industry,prefer_role,prefer_jobType,prefer_country,prefer_state,prefer_city,description,code,ip,register_date,status,photo,idproof) values(?, ?, ?, ? ,?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?,?)");
     
$register=$stmt->execute(array($name,$gender,$email,$birth,$dateOfBirth,$age,$ncountri,$nstatname,$ncitynm,$rcountri,$rstatname,$rcitynm,$marital,$bodi,$health,$uheight,$height_cm,$religion,$nationality,$nt_lang,$mcode,$mobile,$pedu,$cmpny,$experience,$skills,$experience2,$currency,$salary,$languages_known,$english_label,$urdu_label,$telugu_label,$pcurrency,$psalary,$travel,'nbnb',$role, $resume,$social,$social2,$pcmpny,$desired_role,$pjobtype,$pncountri,$pnstatnm,$npciti, $about,$code,$ip,$cdate,'',$pimage,$idproof));

if($register)
{
  $id = $user->lastID();
  $key = base64_encode($id);
  $id = $key;
  
  
$headers ='MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
$headers .= "From: MeeM.one Job Portal <support@meem.one> \n";
$headers .= "Reply-To: $email <$email> \n"; 
  
 $sub2='MeeM.one Job Portal: Verification Link For Email ID and Mobile Number ';

$welcomemsg  = "<html><body><div style='width:75%; padding:20px 100px; background:#ebebe0'><div style='background:#FFFFFF; border:5px solid #9999ff;'>";
$welcomemsg  .= "<div style='text-align:left;background:#f7f7f7;padding:5px 10px;margin:10px 0px'><a href='https://meem.one/jobportal/'><img src='https://meem.one/jobportal/images/logo.png'></a></div>";

$welcomemsg .= "<div style='padding:7px 20px; background:#e68a00; font-size:20px; color:#FFFFFF; font-family:Geneva, Arial, Helvetica, sans-serif'>Verify Email ID and Mobile Number </div>";
                   
                       
$welcomemsg .= "<div style='padding:15px 20px; font-size:15px;background:#e6f2ff; color:#666; font-family:Calibri;'>
                <br> You have successfully filled your form at MeeM.one Job Portal, please verify your email and mobile number and complete your registration.
               <br>
			  
			   <p style='color:#F55F03'>Make sure your mobile phone is ON/Active and you can check/provide verification code.<p>
			  
               To Verify Your Email and Mobile number, just click on the below Link.
               <br>
			   <br>
			    <a href='https://meem.one/jobportal/otp.php?id=$id&code=$code' style='padding:8px 20px; background:#33adff; width:250px; color:#FFFFFF; font-size:15px; border:2px solid #CCCCCC; border-radius:4px;font-family:Geneva, Arial, Helvetica, sans-serif;text-decoration:none;'>Confirm Email & Mobile number</a>
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
  

<div class="col-md-12 col-xs-12 green_bg col-md-push-0">
<div class="col-md-1  col-xs-1 green_bg1"><div class="green_bg2"><i class="fa fa-check check_icon"></i></div></div>
<div class="col-md-10 col-xs-9 green_font">Congratulation! You have submitted form successfully... Thanks for registration with us.</div>
</div>
<div class="clearfix"></div>
<div class="col-md-12 col-xs-12 red_bg col-md-push-0">
<div class="col-md-1 col-xs-1 red_bg1"><div class="red_bg2"><i class="fa fa-exclamation red_icon"></i></div></div>
<div class="col-md-10 col-xs-9 red_font">Now Verify Your Email ID & Mobile Number<i class="fa fa-hand-o-down"></i><br>
We have sent an email to <?php echo $email;?>. Please click on the confirmation link in the email to verify your Email ID & Mobile number.
</div>
</div>
      </div>
    </div>
	
	
<!--Login End--> 


    
    
 </body>

</html>   
<?php } ?>
