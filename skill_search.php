<?php

$phpself = $_SERVER['PHP_SELF'];
include("include/mydb.php");
// Get search term
 $searchTerm = $_GET['q'];

// Get matched data from skills table
$query = mysqli_query($con,"SELECT  skill_name as name FROM skill_tble  WHERE skill_name LIKE '%".$searchTerm."%'");
// Generate skills data array
$skillData = array();

    while($row = mysqli_fetch_array($query)){
        $skillData[] = $row;
    }

// Return results as json encoded array
echo json_encode($skillData);

?>