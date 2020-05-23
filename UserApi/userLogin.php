<?php
 header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
include("../include/class.user.php");
$user=new USER();

// generate firebase token
 function keygen($length=10)
  {
    $key = '';
    list($usec, $sec) = explode(' ', microtime());
    mt_srand((float) $sec + ((float) $usec * 100000));
    
    $inputs = array_merge(range('z','a'),range(0,9),range('A','Z'));

    for($i=0; $i<$length; $i++)
    {
        $key .= $inputs{mt_rand(0,61)};
    }
    return $key;
 }


 $secret_key='IzpFfdTN9U';
 $email=isset($_POST['email']) ? htmlspecialchars(trim($_POST['email'])) : '';
 $password= isset($_POST['password']) ? htmlspecialchars(trim($_POST['password'])) : '';
 $authToken=isset($_POST['authToken']) ? htmlspecialchars(trim($_POST['authToken'])) : '';

if($authToken==$secret_key) {
if(!empty($email) && !empty($password) && !empty($authToken))
{ 
    $status='';$username='';$token='';
    $password=md5($password);

    $stmt=$user->runQuery("select id,name,email,password,status,paid,verify from job_users where email=? and password=? limit 1");
    $stmt->execute(array($email,$password));
    $row=$stmt->fetch(PDO::FETCH_ASSOC);
    //$id=base64_encode($row['id']);
    
    if($password==$row['password'])
      {
        if($row['paid']=='Y')
              {
                http_response_code(200);
                $status_code=1;
                $status='login';
                $status_message='Login successful.'; 
                $username=$row['name'];
                $id=base64_encode($row['id']);
                 $stmt=$user->checkUserLogin($id);
                 if($stmt->rowCount()==0)
                  {
                    // insert user details in a table 
                    $token=keygen(30);
                    $user->insertUserDetails($username,$id,$token);    
                  } 
                  else
                  {
                     $result=$stmt->fetch(PDO::FETCH_ASSOC);
                     $token=$result['token'];

                  }                                
              }
              else
              {
                $status_code=0;
                $status='Renew';
                $status_message='Your Account has expired';
                $username=$row['name'];
                $token=base64_encode($row['id']);
                 
              }
      
   echo json_encode(array('status_code'=>$status_code, 'message'=>$status_message, 'Action'=>$status,'username'=>$username,'token'=>$token));
      }
      else
      {
        http_response_code(200);
        $status_code=0;
        $status_message='Invalid email ID and password combination.';
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
