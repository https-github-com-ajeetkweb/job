<?php
 header("Access-Control-Allow-Origin: *");
 //header('Access-Control-Allow-Origin: https://www.meem.one')
header("Content-Type: application/json; charset=UTF-8");
include("../include/class.user.php");
$user=new USER();

 $secret_key='IzpFfdTN9U';
 $loginid=isset($_POST['email']) ? htmlspecialchars(trim($_POST['email'])) : '';
 $authToken=isset($_POST['authToken']) ? htmlspecialchars(trim($_POST['authToken'])) : '';

if($authToken==$secret_key) {
if(!empty($loginid) && !empty($authToken))
{ 
	$status='';$username='';$token='';
	function getuniqecode() {
    $char1="0123456789";
            $len= strlen($char1)-1;
            return  substr($char1, rand(0, $len) , 1).
            substr($char1, rand(0, $len) , 1).
            substr($char1, rand(0, $len) , 1).
            substr($char1, rand(0, $len) , 1).
            substr($char1, rand(0, $len) , 1).
            substr($char1, rand(0, $len) , 1).
            substr($char1, rand(0, $len) , 1).
            substr($char1, rand(0, $len) , 1)
            ;
  }
  $password1=getuniqecode();
  $password1='MEEMJOB@'.$password1;
  $password=md5($password1);
  $stmt=$user->runQuery("select name,mobile,email,password from job_users where email=:user_email");
  $stmt->bindparam(":user_email", $loginid);
  $stmt->execute();
  $data=$stmt->fetch(PDO::FETCH_ASSOC);
  $name=$data['name'];
  $emailid=$data['email'];
  // $mcode=$data['mobilecode'];
  // $mobile=$data['mobile'];
  //$num=$mcode.$mobile;
  $count=$stmt->rowCount();
  if($count==1) {

      if(!empty($emailid)) {
    $stmt=$user->runQuery("update job_users set password=:USERPASSWORD where email=:user_email");
    $stmt->bindparam(":USERPASSWORD", $password);
    $stmt->bindparam(":user_email", $emailid);
    $stmt->execute();  
    $to="$emailid";
    $headers ='MIME-Version:1.0' . "\r\n";
    $headers .= 'Content-type: text/html ; charset=iso-8859-1' . "\r\n";
    $headers .= "From: MeeM.one Job portal <support@meem.one> \n";
    $headers .= "Reply-To: MeeM.one Job portal <support@meem.one> \n";


    $sub="$name, Password Recovery for MeeM.one Job portal";
$message = "<html><body style='background:#f7f7f7;font-family:Calibri;font-size:16px;width:800px;height:400px;border:4px solid #dddddd'>";
$message .= "<div style='width:310px;text-align:center;background:#f7f7f7;padding:5px 10px;margin:10px 0px'><a href='https://meem.one/jobportal/'> <img src='https://meem.one/jobportal/images/logo.png'></a></div>";
$message .= "<div style='padding:10px;background:#DF0000;font-family:Calibri;color:#ffffff;margin-bottom:10px'>Your Recovery Password</div>";
$message .= "<div style='padding:15px;font-family:Calibri;color:#333;line-height:1.5em; font-size:16px'>Hi $name,<br><br>
Welcome to MeeM.one Job portal  
<br>
Your Login password : <strong>$password1</strong>
<br><br>
Recommend to change password later
</div>";
$message .= "</body></html>";
    $status= $user->mailuser($to, $sub, $message, $headers,'-f support@meem.one');
     if($status)
     {
       $status_code=1;
       $status_message="password has been sent on $emailid."; 
      echo json_encode(array('status_code'=>$status_code, 'message'=>$status_message));
    
     }
     else
     {
       $status_code=0;
       $status_message='Email sending failed.'; 
      echo json_encode(array('status_code'=>$status_code, 'message'=>$status_message));
    
     }
  }
  // else {
  //   $stmt=$user->runQuery("update paid_users set password=:USERPASSWORD where username=:user_email");
  //   $stmt->bindparam(":USERPASSWORD", $password);
  //   $stmt->bindparam(":user_email", $username);
  //   $up=$stmt->execute();
  //   if($up) {

  //   $apikey = "A79c3dee20e69c31431e858d7a728f271";
  //   $apisender = "MEEMSM";
  //   //Your message to send.
  //   $ms = urlencode("Welcome To MeeM.one. Your new password is $password1");
  //   //Define route 
  //   $route = "default";
  //   //Message channel Promotional=1 or Transactional=2.
  //   $channel = "2";
  //   //Default is 0 for normal message, Set 8 for unicode sms.
  //   $DCS = "0";
  //   //Default is 0 for normal sms, Set 1 for immediate display.
  //   $flashsms = "0";
  //   //Prepare you post parameters
  //   $postData = array(
  //   'apikey' => $apikey,
  //   'senderid' => $apisender,
  //   'channel' => $channel,
  //   'DCS' => $DCS,
  //   'flashsms' => $flashsms,
  //   'number' => $num,
  //   'message' => $ms,
  //   'route' => $route
  //   );
  //   //API URL
  //   $url="https://global.solutionsinfini.com/api/v4/?api_key=A79c3dee20e69c31431e858d7a728f271&method=sms&message=$ms&to=$num&sender=MEEMSM";
  //   // init the resource
  //   $ch = curl_init();
  //   curl_setopt_array($ch, array(
  //   CURLOPT_URL => $url,
  //   CURLOPT_RETURNTRANSFER => true,
  //   CURLOPT_POST => true,
  //   CURLOPT_POSTFIELDS => $postData
  //   //,CURLOPT_FOLLOWLOCATION => true
  //   ));
  //   //Ignore SSL certificate verification
  //   curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
  //   curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
  //   //get response
  //   $output = curl_exec($ch);
  //   //Print error if any
  //   if(curl_errno($ch))
  //   {
  //   echo 'error:' . curl_error($ch);
  //   }
  //   curl_close($ch);
  //   }
  //      $status_code=1;
  //      $status_message="Password has been sent on your Mobile no."; 
  //     echo json_encode(array('status_code'=>$status_code, 'message'=>$status_message));
  //     die;
  //  }
  }
  else
  {
      $status_code=0;
      $status_message='The email ID provided is not registered.'; 
     echo json_encode(array('status_code'=>$status_code, 'message'=>$status_message));

   }


 }
 else
 {   
	http_response_code(400);
	$status_code=0;
	$status_message='Unable to login. Data is incomplete.';
	echo json_encode(array('status_code'=>$status_code, 'message'=>$status_message));
  }
} else {

    $status_code=0;
	$status_message='Authentication Failed.';
	echo json_encode(array('status_code'=>$status_code, 'message'=>$status_message));

}
