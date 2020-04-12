<?php

$phpself = $_SERVER['PHP_SELF'];
include("include/mydb.php");
// Get search term
 $searchTerm = $_GET['q'];

// Get matched data from skills table
$query = mysqli_query($con,"SELECT city_id as id, city_name as name FROM city  WHERE city_name LIKE '%".$searchTerm."%'");
// Generate skills data array
$skillData = array();

    while($row = mysqli_fetch_array($query)){
        $skillData[] = $row;
    }

// Return results as json encoded array
echo json_encode($skillData);

?>