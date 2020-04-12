<?php
session_start();
include('dbconfig.php');
class USER {

    private $conn;

    public function __construct() {
        $database = new Database();
        $db = $database->dbConnection();
        $this->conn = $db;
    }

    public function runQuery($sql) {
        $stmt = $this->conn->prepare($sql);
        return $stmt;
    }

    public function lastID() {
        $stmt = $this->conn->lastInsertId();
        return $stmt;
    }


//checking user login

    public function is_logged_in() {
    
        $id = $_SESSION['adminid'];
        $name = $_SESSION['name'];
        $stmt = $this->conn->prepare("select id,name from admin where id='$id'");
        $stmt->execute();
        $n = $stmt->rowCount();
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        $userid = $data['id'];
        $username = $data['name'];
        if (isset($_SESSION['adminid']) && $_SESSION['adminid'] == $userid && $_SESSION['name'] == $username) {
            return true;
        }
    }
	

    public function redirect($url) {
        header("Location: $url");
    }

//user Logout function

     public function logout() {
	
        session_destroy();
        $_SESSION['adminid'] = false;
        $_SESSION['name'] = false;
      
        unset($_SESSION['adminid']);
        unset($_SESSION['name']);
        header('location:index.php');
    }

// sending mail function

    public function mailuser($email, $sub2, $welcomemsg, $headers) {

        $status = mail($email, $sub2, $welcomemsg, $headers);
        return $status;
    }

    public function getRecentJobs()
    {
       $stmt=$this->conn->prepare("select id,job_title,job_desc, city,job_type,company_name,post_date from meem_jobs order by id desc limit 6");
    	$stmt->execute();
	return $stmt;          
    }
            
  public function getJobDetail($id)
  {
      $stmt=$this->conn->prepare("select * from meem_jobs where id='$id'");
      $stmt->execute();
      return $stmt->fetch(PDO::FETCH_ASSOC);
  }
    


    
  public function sendForgotPswd($email)
  {
      $stmt=$this->conn->prepare("select id,name,email,password from job_users where email='$email' limit 1");
      $stmt->execute();
      $row=$stmt->fetch(PDO::FETCH_ASSOC);
      $name=$row['name'];
      $count=$stmt->rowCount();
      if($count==1)
       {
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
        $stmt=$this->conn->prepare("update job_users set password=:USERPASSWORD where email=:user_email");
        $stmt->bindparam(":USERPASSWORD", $password);
        $stmt->bindparam(":user_email", $email);
        $stmt->execute();	
     
        $to="$email";
$headers ='MIME-Version:1.0' . "\r\n";
$headers .= 'Content-type: text/html ; charset=iso-8859-1' . "\r\n";
$headers .= "From: MeeM.one Job portal <support@meem.one> \n";
$headers .= "Reply-To: MeeM.one Job portal  <support@meem.one> \n";


$sub="$name, Password Recovery for meem.one Job portal ";
$message = "<html><body style='background:#f7f7f7;font-family:Calibri;font-size:16px;width:800px;height:400px;border:4px solid #dddddd'>";
$message .= "<div style='width:310px;text-align:center;background:#f7f7f7;padding:5px 10px;margin:10px 0px'><a href='http://ridaits.com/meemJob/'> <img src='http://ridaits.com/meemJob/images/logo.png'></a></div>";
$message .= "<div style='padding:10px;background:#DF0000;font-family:Calibri;color:#ffffff;margin-bottom:10px'>Your Recovery Password</div>";
$message .= "<div style='padding:15px;font-family:Calibri;color:#333;line-height:1.5em; font-size:16px'>Hi $name,<br><br>
Welcome to MeeM.one Job portal  
<br>
Your Login password : <strong>$password1</strong>
<br><br>
Recommend to change password later
</div>";
$message .= "</body></html>";
$status= mail($to, $sub, $message, $headers, '-f support@meem.one');
        
        return $msg2= "<div class='alert alert-success'>password has been sent on $email.</div>";
        
       } else {
          
      return  $msg2='<div class="alert alert-danger">The email ID is not registered with us.</div>';  
      }
      
  }
 
  
 public function insertMatchCount($userid,$result,$partnerid)
 {
	$stmt=$this->conn->prepare("insert into matching_jobs(userid,matchcount,match_ids) values('$userid','$result','$partnerid')"); 
	$stmt->execute();
	return $stmt;
}

public function updateCount($userid,$result,$partnerid)
 {
	$stmt=$this->conn->prepare("update matching_jobs set matchcount='$result', match_ids='$partnerid' where userid='$userid'"); 
	$stmt->execute();
	return $stmt;
} 
  
  

  public function get_matchedJobs($education, $industry, $exprience, $skill, $job_type, $job_country, $job_state, $job_city, $gender, $marital_status, $health, $body_type, $userheight, $religion, $nation, $languages_known, $ncountry, $nstate, $ncity, $rcountry, $rstate, $rcity)
   {
    $sql="select id,job_title,key_skills,industry,job_role,qualification,city from meem_jobs where $education  $current_location $industry $job_type $skill $job_country $job_state $job_city $gender $marital_status $health $body_type $userheight $religion $nation $languages_known $ncountry $nstate $ncity $rcountry $rstate $rcity $exprience status='approved'";   
    return $sql;
       
   }
  
 public function checkUserMatch($uid) {
$stmt=$this->conn->prepare("select userid from matching_jobs where userid='$uid'"); 
$stmt->execute();
return $stmt->rowCount();
}  
   

public function getUserDetails($id)
{
  $stmt=$this->conn->prepare("select id,name,email,mcode,mobile,role from job_users where id='$id'"); 
  $stmt->execute();  
  return $stmt->fetch(PDO::FETCH_ASSOC);  
}


public function getEmployerDetails($id)
{
  $stmt=$this->conn->prepare("select id,emp_name,emp_email,mcode,mobile,company from employers_tble where id='$id'"); 
  $stmt->execute();  
  return $stmt->fetch(PDO::FETCH_ASSOC); 
}

	
}
