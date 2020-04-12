<?php
include("include/mydb.php");
if($_POST['id'])
{
	$id=$_POST['id'];
	
	$stmt1 = mysqli_query($con,"SELECT * FROM city WHERE state_id='$id' order by city_name asc");

	?><option value="">Select City :</option>
	<?php
	while($row1=mysqli_fetch_array($stmt1))
	{
		?>
		<option value="<?php echo $row1['city_id']; ?>"><?php echo $row1['city_name']; ?></option>
		<?php
	}
}
?>
