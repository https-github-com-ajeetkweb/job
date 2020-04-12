<?php
include("include/class.user.php");
include("include/mydb.php");
$user = new USER();


ini_set('display_errors',0);
error_reporting(0);

$editform=$_POST['editform'];
$uid=$_POST['uid'];
//apply for jobs from your matched job list after login 
 if(!empty($_POST['editform']) && $editform=='basic-details')
   {
          
        $expY=$_POST['expY'];
        $current_salary=$_POST['current_salary'];
        $exp_salary=$_POST['exp_salary'];
  

	$country = implode(',',$_POST['pncountry']);
	$clocation='';
	$stmt=$user->runQuery("select * from country where country_id in ($country)");
	$stmt->execute();
	$rw=$stmt->fetchAll();
	foreach($rw as $dt)
	 {
	 $country_id=$dt['country_id'];
	 $stmt=$user->runQuery("select country_name from country where country_id='$country_id'");
	 $stmt->execute();
	 $data=$stmt->fetch(PDO::FETCH_ASSOC);
	 $clocation .=$data['country_name'].',';
	
	}
	$location=substr($clocation,0,-1);


// prefered state
  $state = implode(',',$_POST['pnstate']);
  $cstate='';
  $stmt=$user->runQuery("select * from state where state_id in ($state)");
  $stmt->execute();
  $rw=$stmt->fetchAll();
  foreach($rw as $dt)
   {
   $state_id=$dt['state_id'];
   $stmt=$user->runQuery("select state_name from state where state_id='$state_id'");
   $stmt->execute();
   $data=$stmt->fetch(PDO::FETCH_ASSOC);
   $cstate .=$data['state_name'].',';
  
  }
  $cstate=substr($cstate,0,-1);


// prefered city
  $city = implode(',',$_POST['npcity']);
  $cityname='';
  $stmt=$user->runQuery("select * from city where city_id in ($city)");
  $stmt->execute();
  $rw=$stmt->fetchAll();
  foreach($rw as $dt)
   {
   $city_id=$dt['city_id'];
   $stmt=$user->runQuery("select city_name from city where city_id='$city_id'");
   $stmt->execute();
   $data=$stmt->fetch(PDO::FETCH_ASSOC);
   $cityname .=$data['city_name'].',';
  
  }
  $cityname=substr($cityname,0,-1);










  $stmt=$user->runQuery("update job_users set prefer_country=?,prefer_state=?,prefer_city=?,exp_year=?,current_salary=?,exp_salary=?  where id=?");
        $sql= $stmt->execute(array($location,$cstate,$cityname,$expY,$current_salary,$exp_salary,$uid));
        if($sql)
            { 
            echo 'ok';
           }
   }




  if(!empty($_POST['editform']) && $editform=='general_info')
   {
      $ufeet=$_POST['ufeet'];
      $uinch=$_POST['uinch'];
      $uheight=$ufeet . "." . $uinch;
      $nationality=$_POST['nationality'];
      $height_cm=$_POST['cmheight'];

      $marital=$_POST['marital'];
      $bodi=$_POST['physique'];
      $health=$_POST['health'];
      $religion=$_POST['religion'];
      $rcountry=$_POST['rcountry'];
      $rstate=$_POST['rstate'];
      $rcity=$_POST['rcity'];

      $rq=mysqli_query($con,"select country_name from country where country_id='$rcountry'"); 
      $rc=mysqli_fetch_array($rq);
      $rcountri=$rc['country_name'];  
      $rs=mysqli_query($con,"select state_name from state where state_id='$rstate'"); 
      $rsw=mysqli_fetch_array($rs);
      $rstatname=$rsw['state_name'];  
      $rcitynm='';
      $se1=mysqli_query($con,"select city_name from city where city_id='$rcity'");  
      $ncrr=mysqli_fetch_array($se1);
      $rcitynm=$ncrr['city_name'];  
     
        $stmt=$user->runQuery("update job_users set rcountry=?,rstate=?,rcity=?,body_type=?,health=?,height=?,height_cm=?,religion=?,marital_status=?,nationality=? where id=?");
        $sql= $stmt->execute(array( $rcountri,$rstatname,$rcitynm,$bodi,$health,$uheight,$height_cm,$religion,$marital,$nationality, $uid));
        if($sql) {

           echo 'ok'; 
          }  
  }


    if(!empty($_POST['editform']) && $editform=='education')
   {
      $education=implode(', ',$_POST['education']);
      $skill=implode(', ',$_POST['skill']);
       $company=implode(', ',$_POST['company']);
       $expY=$_POST['expY'];


       $english=$_POST['english'];
        $eng_speak=$_POST['eng_speak'] ? $_POST['eng_speak'] : '';
        $eng_read=$_POST['eng_read'] ? $_POST['eng_read'] : '';
        $eng_write=$_POST['eng_write'] ? $_POST['eng_write'] :'';

        $urdu=$_POST['urdu'] ? $_POST['urdu'] :'';
        $urdu_read=$_POST['urdu_read'] ? $_POST['urdu_read']:'';
        $urdu_write=$_POST['urdu_write'] ? $_POST['urdu_write']:'';
        $urdu_speak=$_POST['urdu_speak'] ? $_POST['urdu_speak']: '';


        $telugu=$_POST['telugu'];
        $telugu_read=$_POST['telugu_read'];
        $telugu_write=$_POST['telugu_write'];
        $telugu_speak=$_POST['telugu_speak'];

        $languages_known='';
        if($english) { $languages_known .=$english.' ';}
        if($urdu) { $languages_known .=$urdu.' ';}
        if($telugu) { $languages_known .=$telugu;}

        $english_label=$eng_speak.' '.$eng_read.' '.$eng_write;
        $urdu_label=$urdu_read.' '.$urdu_write.' '.$urdu_speak;
        $telugu_label=$telugu_read.' '.$telugu_write.' '.$telugu_speak;

       if(!$_POST['english']) { $english_label='';}
       if(!$_POST['urdu']) { $urdu_label='';}
        if(!$_POST['telugu']) { $telugu_label='';}

        $position=$_POST['position'];
        $current_salary=$_POST['current_salary'];

      $stmt=$user->runQuery("update job_users set industry=?,education=?,skill=?,exp_year=? ,languages_known=?,english_label=?,urdu_label=?, telugu_label=?,old_role=?,current_salary=? where id=?");
        $sql= $stmt->execute(array($company,$education,$skill,$expY,$languages_known,$english_label,$urdu_label,$telugu_label,$position,$current_salary, $uid));
        if($sql)
            { 
            echo 'ok';
           }

   }
  if(!empty($_POST['editform']) && $editform=='preferences')
   {
     $industry='';$prefer_position='';$prefer_jobtype='';
      if($_POST['industry']) { $industry=implode(', ',$_POST['industry']); }
      if($_POST['pwork']) { $prefer_position=implode(', ',$_POST['pwork']); }
      if($_POST['jobtype']) { $prefer_jobtype=implode(', ',$_POST['jobtype']); }
      $exp_salary=$_POST['exp_salary'];
  

  $country = implode(',',$_POST['pncountry']);
  $clocation='';
  $stmt=$user->runQuery("select * from country where country_id in ($country)");
  $stmt->execute();
  $rw=$stmt->fetchAll();
  foreach($rw as $dt)
   {
   $country_id=$dt['country_id'];
   $stmt=$user->runQuery("select country_name from country where country_id='$country_id'");
   $stmt->execute();
   $data=$stmt->fetch(PDO::FETCH_ASSOC);
   $clocation .=$data['country_name'].',';
  
  }
  $location=substr($clocation,0,-1);


// prefered state
  $state = implode(',',$_POST['pnstate']);
  $cstate='';
  $stmt=$user->runQuery("select * from state where state_id in ($state)");
  $stmt->execute();
  $rw=$stmt->fetchAll();
  foreach($rw as $dt)
   {
   $state_id=$dt['state_id'];
   $stmt=$user->runQuery("select state_name from state where state_id='$state_id'");
   $stmt->execute();
   $data=$stmt->fetch(PDO::FETCH_ASSOC);
   $cstate .=$data['state_name'].',';
  
  }
  $cstate=substr($cstate,0,-1);


// prefered city
  $city = implode(',',$_POST['npcity']);
  $cityname='';
  $stmt=$user->runQuery("select * from city where city_id in ($city)");
  $stmt->execute();
  $rw=$stmt->fetchAll();
  foreach($rw as $dt)
   {
   $city_id=$dt['city_id'];
   $stmt=$user->runQuery("select city_name from city where city_id='$city_id'");
   $stmt->execute();
   $data=$stmt->fetch(PDO::FETCH_ASSOC);
   $cityname .=$data['city_name'].',';
  }
  $cityname=substr($cityname,0,-1);
   
   $stmt=$user->runQuery("update job_users set prefer_country=?,prefer_state=?,prefer_city=?,prefer_industry=?,prefer_role=?,prefer_jobType=?,exp_salary=?  where id=?");
        $sql= $stmt->execute(array($location,$cstate,$cityname,$industry,$prefer_position,$prefer_jobtype,$exp_salary,$uid));
        if($sql)
            { 
            echo 'ok';
           }


}
   