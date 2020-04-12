<?php


 if(!empty($result['education'])) {  $education="prefer_edu REGEXP REPLACE('".$result['education']."', ', ', '(\,|$)|') and";  }

  if(!empty($result['prefer_industry'])) {  $industry="industry REGEXP REPLACE('".$result['prefer_industry']."', ', ', '(\,|$)|') and";  }

// two way
 if(!empty($result['exp_year'])) {   $exprience	= "" .$result['exp_year']. " between prefer_min_exp and prefer_max_exp and"; }

// two way
  if(!empty($result['skill'])) {  $skill="prefer_skill REGEXP REPLACE('".$result['skill']."',',', '(\,|$)|') and";  }

 // two way
 if(!empty($result['prefer_jobType'])) { $job_type="job_type='".$result['prefer_jobType']."' and";}


 if(!empty($result['prefer_country'])) {  $job_country="country REGEXP REPLACE('".$result['prefer_country']."',',', '(\,|$)|') and";  }

  if(!empty($result['prefer_state'])) {  $job_state="state REGEXP REPLACE('".$result['prefer_state']."',',', '(\,|$)|') and";  }

if(!empty($result['prefer_city'])) {  $job_city="city REGEXP REPLACE('".$result['prefer_city']."',',', '(\,|$)|') and";  }


// ============ Two way matching ==========

$industry2='';


if(!empty($result['gender'])) {  $gender="prefer_gender='".$result['gender']."' ";  }

// if(!empty($result['marital_status'])) {  
  $marital_status="prefer_marital REGEXP REPLACE('".$result['marital_status']."',',', '(\,|$)|') ";
    // }


if(!empty($result['health'])) {  $health="CASE WHEN prefer_health!='' THEN  prefer_health REGEXP REPLACE('".$result['health']."',',', '(\,|$)|') ELSE prefer_health='' END AND";  }

if(!empty($result['body_type'])) {  
  $body_type="CASE WHEN prefer_body!='' THEN prefer_body REGEXP REPLACE('".$result['body_type']."',',', '(\,|$)|')  ELSE prefer_body='' END AND ";
    }

    $age	= " CASE WHEN prefer_min_age!=0 THEN " .$result['age']. " between prefer_min_age and prefer_max_age ELSE prefer_min_age=0 END AND"; 

   if(!empty($result['height_cm'])) {
    $userheight=" CASE WHEN prefer_min_heightCM!=0 THEN '".$result['height_cm']."' between prefer_min_heightCM and prefer_max_heightCM  ELSE prefer_min_heightCM=0 END AND";
  }

   if(!empty($result['religion'])) {  $religion="prefer_religion REGEXP REPLACE('".$result['religion']."',',', '(\,|$)|') and";  }

   if(!empty($result['nationality'])) {  $nation="prefer_nation REGEXP REPLACE('".$result['nationality']."',',', '(\,|$)|') and";  } 

   if(!empty($result['languages_known'])) {  
    $languages_known="CASE WHEN prefer_lang!='' THEN  prefer_lang REGEXP REPLACE('".$result['languages_known']."',',', '(\,|$)|') ELSE prefer_lang='' END and";
      } 

   if(!empty($result['ncountry'])) {
     $ncountry="CASE WHEN prefer_ncountry!='' THEN prefer_ncountry REGEXP REPLACE('".$result['ncountry']."',',', '(\,|$)|') ELSE prefer_ncountry='' END and";
       } 

   if(!empty($result['nstate'])) {
     $nstate="CASE WHEN prefer_nstate!='' THEN prefer_nstate REGEXP REPLACE('".$result['nstate']."',',', '(\,|$)|') ELSE prefer_nstate='' END and";
       } 
 if(!empty($result['ncity'])) {
   $ncity="CASE WHEN prefer_ncity!='' THEN prefer_ncity REGEXP REPLACE('".$result['ncity']."',',', '(\,|$)|') ELSE prefer_ncity='' END and";
     }


 if(!empty($result['rcountry'])) {  $rcountry="CASE WHEN prefer_rcountry!='' THEN prefer_rcountry = '".$result['rcountry']."' ELSE prefer_rcountry='' END and";  } 

 if(!empty($result['rstate'])) {  $rstate="CASE WHEN prefer_rstate!='' THEN prefer_rstate REGEXP REPLACE('".$result['rstate']."',',', '(\,|$)|') ELSE prefer_rstate='' END and";  } 
  if(!empty($result['rcity'])) {  $rcity="CASE WHEN prefer_rcity!='' THEN prefer_rcity REGEXP REPLACE('".$result['rcity']."',',', '(\,|$)|') ELSE prefer_rcity='' END and";  } 

  $industry2="CASE WHEN prefer_industry!='' THEN prefer_industry REGEXP REPLACE('".$result['industry']."',',', '(\,|$)|') ELSE prefer_industry='' END and"; 
  
 
// get matching jobs

 $sql=$user->get_matchedJobs($education, $industry, $exprience, $skill, $job_type, $job_country, $job_state, $job_city, $gender, $marital_status, $health, $body_type, $userheight, $religion, $nation, $languages_known, $ncountry, $nstate, $ncity, $rcountry, $rstate, $rcity,$industry2,$age);  

