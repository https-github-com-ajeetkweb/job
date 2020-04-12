<?php
include("include/mydb.php");

if($_POST['id'])
{
	$id=$_POST['id'];
		
	$stmt = mysqli_query($con,"SELECT * FROM state WHERE country_id='$id' order by state_name asc");
	
	?>
    <option value="">Select State :</option>
	<?php
	while($row=mysqli_fetch_array($stmt))
	{
		?>
        	<option value="<?php echo $row['state_id']; ?>"><?php echo $row['state_name']; ?></option>
        <?php
	}
}
?>
<!-- www.techsofttutorials.com   Techsoft Tutorials, Free Latest Technology Tutorials and Demo. -->