<?php
include("include/mydb.php");

	$id2=$_POST['rcountry'];
	$stmt1 = mysqli_query($con,"SELECT * FROM country WHERE country_id in($id2)");

	?>
	<?php
	while($row1=mysqli_fetch_array($stmt1))
	{
		?>
		<option value="<?php echo $row1['country_code']; ?>"><?php echo $row1['country_text']; ?></option>
		<?php
	}

?>
