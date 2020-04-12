<?php

include("include/class.user.php");
$user = new USER();

//apply for jobs from your matched job list after login 
 if(empty($_POST['login_apply']))
   {
     $job_id=$_POST['job_id'];
     $emp_id=$_POST['emp_id'];
       // apply for job
              
              $sql=$user->runQuery("select * from  job_applications where job_id='$job_id' and user_id='".$_SESSION['USER_ID']."' limit 1");
              $sql->execute();
              
             if($sql->rowCount()==0) {
              $date=date('Y-m-d');
             $stmt=$user->runQuery("insert into job_applications(emp_id,job_id,user_id,apply_date) values('$emp_id','$job_id','".$_SESSION['USER_ID']."','$date')") ;
             $stmt->execute(); 
               echo 'ok';

               }
               else { echo $msg="<div class='alert alert-info'>You have already applied for this job.</div>";  }
            

   }


 if(!empty($_POST['login_apply']))
   {
        $job_id=$_POST['job_id'];
       $emp_id=$_POST['emp_id'];
       $email=trim($_POST['email']);
       $password=trim($_POST['password']);
       $password= md5($password); 
       $stmt=$user->loginUser($email,$password);
       $row=$stmt->fetch(PDO::FETCH_ASSOC);
       if($password==$row['password'])
       {
              $_SESSION['USER_name']=$row['name'];
               $_SESSION['USER_ID']=$row['id'];
               $u_id=$_SESSION['USER_ID'];
              
           $st=$user->runQuery("select * from matching_jobs where userid='".$row['id']."'");
           $st->execute();
           $rp=$st->fetch();
           $match_ids=$rp['match_ids'];
           $match_ids=explode(",",$match_ids);
           
           if(in_array($job_id,$match_ids))
               {
              
             // apply for job
              
              $sql=$user->runQuery("select * from  job_applications where job_id='$job_id' and user_id='".$_SESSION['USER_ID']."' limit 1");
              $sql->execute();
              
             if($sql->rowCount()==0) {
              $date=date('Y-m-d');
             $stmt=$user->runQuery("insert into job_applications(emp_id,job_id,user_id,apply_date) values('$emp_id','$job_id','".$_SESSION['USER_ID']."','$date')") ;
             $stmt->execute(); 
               echo 'ok';

               }
               else { echo $msg="<div class='alert alert-info'>You have already applied for this job.</div>";  }
             }
             
             
             else  {
               echo 'no-match';
                 
           }
           }
       else {

          echo $msg="<div class='alert alert-danger'>Incorrect email id or password.</div>";
         
       }    

   }

 