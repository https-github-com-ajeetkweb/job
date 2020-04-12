<?php
include("include/mydb.php");
if($_POST['id'])
{
	$id=$_POST['id'];
	//for language
	$lang='';
	if(!empty($_POST['lang']))
	 {
	   $lang='_'.$_POST['lang'];
	 }
    $s6=mysqli_query($con,"select * from state  WHERE state_id in($id) order by  state_id");
   while($rw6=mysqli_fetch_array($s6)) {
   $state=$rw6['state_id'];
	$stmt1 = mysqli_query($con,"SELECT * FROM city WHERE state_id in($state) order by state_id");

	?>

       <optgroup  label="<?php echo $rw6['state_name'];?>">
	<?php while($row1=mysqli_fetch_array($stmt1)) { 	?>
		<option value="<?php echo $row1['city_id']; ?>"><?php echo $row1['city_name']; if(!empty($lang)) { echo ' | ' .$row1['city_name'.$lang]; }?></option>
        <?php } ?>
        </optgroup>
		<?php
	}
}
?>

<!-- www.techsofttutorials.com   Techsoft Tutorials, Free Latest Technology Tutorials and Demo. -->