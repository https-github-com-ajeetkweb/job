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

        $id = $_SESSION['EMP_ID'];
        $name = $_SESSION['EMP_name'];
        $stmt = $this->conn->prepare("select id,emp_name from employers_tble where id='$id'");
        $stmt->execute();
        $n = $stmt->rowCount();
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        $userid = $data['id'];
        $username = $data['emp_name'];
        if (isset($_SESSION['EMP_ID']) && $_SESSION['EMP_ID'] == $userid && $_SESSION['EMP_name'] == $username) {
            return true;
        }
    }
	

    public function redirect($url) {
        header("Location: $url");
    }

//user Logout function

     public function logout() {
	
        session_destroy();
        $_SESSION['EMP_ID'] = false;
        $_SESSION['EMP_name'] = false;
        unset($_SESSION['EMP_ID']);
        unset($_SESSION['EMP_name']);
	//header('location: ../employerlogin.php');
    }

// sending mail function

    public function mailuser($email, $sub2, $welcomemsg, $headers) {

        $status = mail($email, $sub2, $welcomemsg, $headers);
        return $status;
    }

    public function getRecentJobs()
    {
       $stmt=$this->conn->prepare("select id,job_title,job_desc, location,job_type,company_name,post_date from meem_jobs where  status=1 and pay_status=1 order by id desc limit 6");
    	$stmt->execute();
	return $stmt;          
    }
            
  public function getJobDetail($id)
  {
      $stmt=$this->conn->prepare("select * from meem_jobs where id='$id'");
      $stmt->execute();
      return $stmt->fetch(PDO::FETCH_ASSOC);
  }
    
  
 
  public function get_matchedJobs($education, $exprience,$current_location, $industry, $skill)
   {
     $sql="select id,name,skill,industry,current_location,gender,education,exp_year from job_users where $education $exprience $current_location $industry $skill  paid='Y'";       
     return $sql;    
   }
   
   
  
public function checkUserMatch($userid,$job_id) {
$stmt=$this->conn->prepare("select id from matching_jobseekers where emp_id='$userid' and job_id='$job_id'"); 
$stmt->execute();
return $stmt->rowCount();
}
  
public function insertMatchCount($userid,$job_id,$result,$partnerid) {
$stmt=$this->conn->prepare("insert into matching_jobseekers(emp_id,job_id,matchcount,match_ids) values('$userid','$job_id','$result','$partnerid')"); 
$stmt->execute();
return $stmt;
}

public function updateCount($userid,$job_id,$result,$partnerid) {
$stmt=$this->conn->prepare("update matching_jobseekers set matchcount='$result', match_ids='$partnerid' where emp_id='$userid' and job_id='$job_id'"); 
$stmt->execute();
return $stmt;
} 
  
  
 public function getEmployerDetails($id)
{
  $stmt=$this->conn->prepare("select id,emp_name,emp_email,mcode,mobile,company,paid from employers_tble where id='$id'"); 
  $stmt->execute();  
  return $stmt->fetch(PDO::FETCH_ASSOC); 
}
 
  
  
  
  
  
  
  
  
}