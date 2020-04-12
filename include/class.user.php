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


//checking job seeker login 
    public function is_logged_in() {
    
        $id = $_SESSION['USER_ID'];
        $name = $_SESSION['USER_name'];
        $stmt = $this->conn->prepare("select id,name from job_users where id='$id'");
        $stmt->execute();
        $n = $stmt->rowCount();
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        $userid = $data['id'];
        $username = $data['name'];
        if (isset($_SESSION['USER_ID']) && $_SESSION['USER_ID'] == $userid && $_SESSION['USER_name'] == $username) {
            return true;
        }
    }
	
    

    public function redirect($url) {
        header("Location: $url");
    }

//job seeker Logout function
     public function logout() {
	
        session_destroy();
        $_SESSION['USER_ID'] = false;
        $_SESSION['USER_name'] = false;
      
        unset($_SESSION['USER_ID']);
        unset($_SESSION['USER_name']);
        header('location:index.php');
    }

// sending mail function
    public function mailuser($email, $sub2, $welcomemsg, $headers)
     {
        $status = mail($email, $sub2, $welcomemsg, $headers);
        return $status;
    }

    // getting recent uploaded jobs
    public function getRecentJobs()
    {
       $stmt=$this->conn->prepare("select id,job_title,job_desc, city,job_type,company_name,post_date from meem_jobs where status=1 and pay_status=1 order by id desc limit 6");
    	$stmt->execute();
	return $stmt;          
    }
   
    
  public function getJobDetail($id)
  {
      $stmt=$this->conn->prepare("select * from meem_jobs where id=?");
      $stmt->execute(array($id));
      return $stmt->fetch(PDO::FETCH_ASSOC);
  }
    
  
  // checking credential of Employer before Login
     public function loginEmp($email,$password)
  {
      $stmt=$this->conn->prepare("select id,emp_name,emp_email,emp_password,status,paid,verify from employers_tble  where emp_email=? and emp_password=? limit 1");
	  $stmt->execute(array($email,$password));
      return $stmt;
  }
    
  
   // checking credential of job seeker before Login
     public function loginUser($email,$password)
  {
     $stmt=$this->conn->prepare("select id,name,email,password,status,paid,verify from job_users where email=? and password=? limit 1");  
     $stmt->execute(array($email,$password));
      return $stmt;
  }
    
	
// forget password script for job seekers	
  public function sendForgotPswd($email)
  {
      $stmt=$this->conn->prepare("select id,name,email,password from job_users where email=? limit 1");
      $stmt->execute(array($email));
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
$status= mail($to, $sub, $message, $headers, '-f support@meem.one');
        
        return $msg2= "<div class='alert alert-success'>password has been sent on $email.</div>";
        
       } else {
          
      return  $msg2='<div class="alert alert-danger">The email ID is not registered with us.</div>';  
      }
      
  }
      
  
  
  // forget password script for job employers	  
 public function sendForgotPswdEmp($email)
  {
      $stmt=$this->conn->prepare("select id,emp_name,emp_email,emp_password from employers_tble where emp_email=? limit 1");	  
      $stmt->execute(array($email));
      $row=$stmt->fetch(PDO::FETCH_ASSOC);
      $name=$row['emp_name'];
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
        $stmt=$this->conn->prepare("update employers_tble set emp_password=:USERPASSWORD where emp_email=:user_email");
        $stmt->bindparam(":USERPASSWORD", $password);
        $stmt->bindparam(":user_email", $email);
        $stmt->execute();	
     
        $to="$email";
$headers ='MIME-Version:1.0' . "\r\n";
$headers .= 'Content-type: text/html ; charset=iso-8859-1' . "\r\n";
$headers .= "From: MeeM.one Job portal <support@meem.one> \n";
$headers .= "Reply-To: MeeM.one Job portal  <support@meem.one> \n";


$sub="$name, Password Recovery for meem.one Job portal Employer ";
$message = "<html><body style='background:#f7f7f7;font-family:Calibri;font-size:16px;width:800px;height:400px;border:4px solid #dddddd'>";
$message .= "<div style='width:310px;text-align:center;background:#f7f7f7;padding:5px 10px;margin:10px 0px'><a href='http://ridaits.com/meemJob/index.php'> <img src='http://ridaits.com/meemJob/images/logo.png'></a></div>";
$message .= "<div style='padding:10px;background:#DF0000;font-family:Calibri;color:#ffffff;margin-bottom:10px'>Your Recovery Password</div>";
$message .= "<div style='padding:15px;font-family:Calibri;color:#333;line-height:1.5em; font-size:16px'>Hi $name,<br><br>
Welcome to MeeM.one Job portal  
<br>
Your Login password : <strong>$password1</strong>
<br>
Recommend to change password later
</div>";
$message .= "</body></html>";
$status= mail($to, $sub, $message, $headers, '-f support@meem.one');
        
        return $msg2= "<div class='alert alert-success'>password has been sent on $email.</div>";
        
       } else {
          
      return  $msg2='<div class="alert alert-danger">The email ID is not registered with us.</div>';  
      }
      
  }
  
  
  
  
  
  // getting matching jobs for job seeker
  public function get_matchedJobs($education, $industry, $exprience, $skill, $job_type, $job_country, $job_state, $job_city, $gender, $marital_status, $health, $body_type, $userheight, $religion, $nation, $languages_known, $ncountry, $nstate, $ncity, $rcountry, $rstate, $rcity, $industry2)
   {
    $sql="select id,job_title,prefer_skill,industry,job_role,prefer_edu,city from meem_jobs where $education $industry $exprience  $skill $job_type $job_country  $job_state  $job_city $gender $marital_status $health $body_type $userheight $religion $nation $languages_known $ncountry $nstate $ncity $rcountry $rstate $rcity $industry2  status=1 and pay_status=1";   
    return $sql;      
   }
  
   
 public function checkUserMatch($uid)
   {
    $stmt=$this->conn->prepare("select userid from matching_jobs where userid='$uid'"); 
    $stmt->execute();
    return $stmt->rowCount();
  }  
   
 // inserting job seeker matched jobs in a table 
 public function insertMatchCount($uid,$job_count,$job_ids)
   {
    $stmt=$this->conn->prepare("insert into matching_jobs(userid,matchcount,match_ids) values('$uid','$job_count','$job_ids')"); 
    $stmt->execute();
    return $stmt;
}


public function updateCount($uid,$job_count,$job_ids)
  {
    $stmt=$this->conn->prepare("update matching_jobs set matchcount='$job_count', match_ids='$job_ids' where userid='$uid'"); 
    $stmt->execute();
    return $stmt;
}

public function getUserDetails($id)
{
  $stmt=$this->conn->prepare("select id,name,email,mcode,mobile,paid from job_users where id=?"); 
  $stmt->execute(array($id));  
  return $stmt->fetch(PDO::FETCH_ASSOC);  
}


public function getEmployerDetails($id)
{
  $stmt=$this->conn->prepare("select id,emp_name,emp_email,mcode,mobile,company,paid from employers_tble where id='$id'"); 
  $stmt->execute();  
  return $stmt->fetch(PDO::FETCH_ASSOC); 
}

public function getOfferPlan(){
	$stmt=$this->conn->prepare("select duration from membership where price_usd='0' or price_inr='0'");
	$stmt->execute();
	return $stmt->fetch(PDO::FETCH_ASSOC);
}

public function getOfferPlanEmp(){
	 $stmt=$this->conn->prepare("select duration from membership_emp where price_usd='0' or price_inr='0'");
	 $stmt->execute();
	 return $stmt->fetch(PDO::FETCH_ASSOC);
}

// activate job seekers to paid	
 public function updatePaidUser($userid,$password,$pdate,$amount1,$plans,$expirydate)
 {
    $stmt=$this->conn->prepare("update job_users set paid='Y', password='$password', paid_date='$pdate',amount='$amount1',plan='$plans', expiry_date='$expirydate' where id='$userid'"); 
    $stmt->execute();
    return $stmt;
} 
 
// activate Employer to paid	
 public function updatePaidEmployer($userid,$password,$pdate,$amount1,$plans,$expirydate)
 {
    $stmt=$this->conn->prepare("update employers_tble set paid='Y', emp_password='$password', paid_date='$pdate',amount='$amount1',plan='$plans', expiry_date='$expirydate' where id='$userid'"); 
    $stmt->execute();
    return $stmt;
} 



// pagination 
    function getAllPageLinks($pages,$href) {
        $output = '';
        if(!isset($_GET["page"])) $_GET["page"] = 1;
        if($pages != 0)
            //$pages  = ceil($count/$this->perpage);
            if($pages>1) {
                if($_GET["page"] == 1)
                    $output = $output . '<span class="link first disabled">&#8810;</span><span class="link disabled">&#60;</span>';
                else
                    $output = $output . '<a class="link first" onClick="getresult(\'' . $href . (1) . '\')" >&#8810;</a><a class="link" onClick="getresult(\'' . $href . ($_GET["page"]-1) . '\')" >&#60;</a>';


                if(($_GET["page"]-3)>0) {
                    if($_GET["page"] == 1)
                        echo $output = $output . '<span id=1 class="link current">1</span>';
                    else
                        $output = $output . '<a class="link" onClick="getresult(\'' . $href . '1\')" >1</a>';
                }
                if(($_GET["page"]-3)>1) {
                    $output = $output . '<span class="dot">...</span>';
                }

                for($i=($_GET["page"]-2); $i<=($_GET["page"]+2); $i++)	{
                    if($i<1) continue;
                    if($i>$pages) break;
                    if($_GET["page"] == $i)
                        $output = $output . '<span id='.$i.' class="link current">'.$i.'</span>';
                    else
                        $output = $output . '<a class="link" onClick="getresult(\'' . $href . $i . '\')" >'.$i.'</a>';
                }

                if(($pages-($_GET["page"]+2))>1) {
                    $output = $output . '<span class="dot">...</span>';
                }
                if(($pages-($_GET["page"]+2))>0) {
                    if($_GET["page"] == $pages)
                        $output = $output . '<span id=' . ($pages) .' class="link current">' . ($pages) .'</span>';
                    else
                        $output = $output . '<a class="link" onClick="getresult(\'' . $href .  ($pages) .'\')" >' . ($pages) .'</a>';
                }

                if($_GET["page"] < $pages)
                    $output = $output . '<a  class="link" onClick="getresult(\'' . $href . ($_GET["page"]+1) . '\')" >></a><a  class="link" onClick="getresult(\'' . $href . ($pages) . '\')" >&#8811;</a>';
                else
                    $output = $output . '<span class="link disabled">></span><span class="link disabled">&#8811;</span>';


            }
        return $output;
    }

	
public function getLanguages() {
$stmt=$this->conn->prepare("select * from languages_tble");
$stmt->execute();
return $data=$stmt->fetchAll();
}	

public function getCurrency() {
$stmt=$this->conn->prepare("select * from currency_tble");
$stmt->execute();
return $data=$stmt->fetchAll();
}	
		
public function getEducation() {
$stmt=$this->conn->prepare("select * from education_tble");
$stmt->execute();
return $data=$stmt->fetchAll();
}	

public function getIndustry() {
$stmt=$this->conn->prepare("select * from industry");
$stmt->execute();
return $data=$stmt->fetchAll();
}	

public function getJob_position() {
$stmt=$this->conn->prepare("select * from current_job_position order by job_position asc");
$stmt->execute();
return $data=$stmt->fetchAll();
}	



public function getNationality() {
$stmt=$this->conn->prepare("select * from nationality_tble");
$stmt->execute();
return $data=$stmt->fetchAll();
}	
	
	
public function getBodyType() {
$stmt=$this->conn->prepare("select * from physics_tble");
$stmt->execute();
return $data=$stmt->fetchAll();
}	

	
}
