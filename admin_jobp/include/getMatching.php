<?php

if(!empty($result['education'])) {  $education="qualification REGEXP REPLACE('".$result['education']."', ', ', '(\,|$)|') and";  }
 if(!empty($result['exp_year'])) {    $exprience	= "" .$result['exp_year']. " between min_exp and max_exp and"; }
 if(!empty($result['current_location'])) {  $current_location="city REGEXP REPLACE('".$result['current_location']."', ', ', '(\,|$)|') and";  }
  if(!empty($result['industry'])) {  $industry="industry REGEXP REPLACE('".$result['industry']."', ', ', '(\,|$)|') and";  }
 if(!empty($result['skill'])) {  $skill="key_skills REGEXP REPLACE('".$result['skill']."', ', ', '(\,|$)|') ";  }
  
 
// get matching jobs

$sql=$user->get_matchedJobs($education, $exprience,$current_location, $industry, $skill); 

$sc=mysqli_query($con,$sql) or die(mysqli_error($con));
 while($rw=mysqli_fetch_array($sc))
   {
   $pid .=$rw['id'] . ",";
   }
				   
$pid=substr($pid,0,-1); 