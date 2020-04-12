<?php
$exprience='';
if(!empty($result['qualification'])) {  $education="education REGEXP REPLACE('".$result['qualification']."', ', ', '(\,|$)|') and";  }
 if(!empty($result['min_exp']) && !empty($result['max_exp'])) {    $exprience	= " exp_year between " .$result['min_exp']. " and " .$result['max_exp']. " and"; }
 if(!empty($result['city'])) {  $current_location="current_location REGEXP REPLACE('".$result['city']."', ', ', '(\,|$)|') and";  }
 if(!empty($result['industry'])) {  $industry="industry REGEXP REPLACE('".$result['industry']."', ', ', '(\,|$)|') and";  }
 if(!empty($result['key_skills'])) {  $skill="skill REGEXP REPLACE('".$result['key_skills']."',',', '(\,|$)|') and";  }
  
 
// get matching jobs
 $sql=$user->get_matchedJobs($education, $exprience,$current_location, $industry, $skill); 

   