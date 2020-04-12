<?php
include("include/mydb.php");

if($_POST['id'])
{
    $id=$_POST['id'];
  // $id=implode(",",$_POST['id']);
	 //for language
	$lang='';
	if(!empty($_POST['lang']))
	 {
	    $lang='_'.$_POST['lang'];
	 }
	 
	$s6=mysqli_query($con,"select * from country  WHERE country_id in($id) order by  country_id");
   while($rw6=mysqli_fetch_array($s6)) {
   $countryid=$rw6['country_id'];
	$stmt = mysqli_query($con,"SELECT * FROM state WHERE country_id in($countryid) order by state_name asc");
	$n=mysqli_num_rows($stmt);
	?>
	
	
  <optgroup  label="<?php echo $rw6['country_name'];?>">	
	<?php while($row=mysqli_fetch_array($stmt)) { ?>
 <option value="<?php echo $row['state_id']; ?>"><?php echo $row['state_name']; if(!empty($lang)) { echo ' | '.$row['state_name'.$lang]; } ?></option>
 <?php } ?>
 </optgroup>
        <?php
	}
}
?>
<!-- www.techsofttutorials.com   Techsoft Tutorials, Free Latest Technology Tutorials and Demo. -->