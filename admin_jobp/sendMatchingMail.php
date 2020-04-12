<?php
/*
include("include/class.user.php");
$user = new USER();
include("include/mydb.php");  
*/

 // get user details
 $stmt=$user->runQuery("select * from job_users where paid='Y'");
 $stmt->execute();
 $data=$stmt->fetchAll();
 foreach($data as $result){
  
$id=$result['id'];
$user_email=$result['email'];
$user_name=$result['name'];
 // matching jobs with user data
include("include/getMatching.php"); 
$job_count=mysqli_num_rows($sc);
 $stmt=$user->runQuery("select * from matching_jobs where userid='$id'");
        $stmt->execute();
        $userexist=$stmt->rowCount();
        $rg=$stmt->fetch(PDO::FETCH_ASSOC);
        $oldmatch=$rg['matchcount'];
        $oldpid=$rg['match_ids'];
        $oldpid=explode(",",$oldpid);
    if($job_count>$oldmatch)
     {
           $pid_array=explode(",",$pid);
            $new_ids=array_diff($pid_array, $oldpid);
            $new_ids=implode(",",$new_ids);
            $newmatch= $job_count-$oldmatch;
            
            $stmt=$user->runQuery("select job_title,company_name,min_exp,max_exp,job_role,city,key_skills from meem_jobs where  id in($new_ids)");
            $stmt->execute();
            $st=$stmt->fetchAll();
           // send mail  to users for new matches
                $to="$user_email";
                $headers ='MIME-Version: 1.0' . "\r\n";
                $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
                $headers .= "From: MeeM.one Job Portal <support@meem.one> \n";
                $headers .= "Reply-To: MeeM.one Job Portal <support@meem.one> \n";
                $sub="Hi, $user_name you have $newmatch new job matches  based on your MeeM.one job profile";

                $welcomemsg  = "<html><body><div style='width:75%; padding:20px 100px; background:#ebebe0'><div   style='background:#FFFFFF; border:5px solid #A4D1FF;'>";
                $welcomemsg  .= "<div style='text-align:left;background:#f7f7f7;padding:5px 10px;margin:10px 0px'><a href='http://ridaits.com/meemJob/'><img src='http://ridaits.com/meemJob/images/logo.png'></a>               </div>";
                $welcomemsg .= "<div style='padding:7px 20px; background:#e68a00; font-size:20px; color:#FFFFFF; font-family:calibri'>New Job Matching</div>";

                $welcomemsg .= "<div style='padding:10px 20px; font-size:15px; color:#666;font-family:calibri;line-height:1.4em'>
           
                <p style='color:green;font-size:18px;'>Hi $user_name, There are  new Job Matches based on your MeeM.one job profile</p>  
				Login to <a href='http://ridaits.com/meemJob/login.php' style='color:green;text-decoration:none;border:none;'>MeeM.one Job Portal</a>  for more details.<br>
				<p><a href='http://ridaits.com/meemJob/login.php' style='background:#009966;color:#fff;border-radius:4px;width:100px;text-decoration:none;border:none;padding:5px 10px'>Login Here</a></p>
				
				
				
	</div>";
          foreach($st as $p_data) {

                    $title=$p_data['job_title'];
                    $key_skills=$p_data['key_skills'];
                    $min_exp=$p_data['min_exp'];
                    $max_exp=$p_data['max_exp'];
                    $company_name=$p_data['company_name'];
                    $city=$p_data['city'];
                    $welcomemsg .= "<div style='padding:5px 20px; margin:5px 0px; border:1px solid #ddd;font-size:15px; color:#666;font-family:calibri;line-height:1.4em'>
	               
				   
				   <div style='width:60%'>
				   <div style='color:#0099CC; font-size:20px'>$title</div>
	                           <div>$company_name</div>
				   <div><i class='fa fa-suitcase icon_2'></i> $min_exp - $max_exp yrs</div>
				   <div> <i class='fa fa-map-marker icon_1'></i> $city</div>
                                   <div><i class='fa fa-list-alt' aria-hidden='true'></i> $key_skills </div>    
				   </div>
				  </div>";


                }
                $welcomemsg .= "<br> <p style='margin:5px 0px;padding:0px 0px 0px 10px;color:#0066CC;font-family:calibri;font-size:18px;line-height:1.4em'>Regards,<br> support@meem.one</p> </div></div></body></html>";

                $status=mail($to, $sub, $welcomemsg, $headers, '-f support@meem.one');      
                
               // update matching count in partnermatch_count table or insert new count
                $updatecount=($userexist=='0') ? $user->insertMatchCount($id,$job_count,$pid) :  $user->updateCount($id,$job_count,$pid);
                $pid='';  
        
    }
    
     
 }

 