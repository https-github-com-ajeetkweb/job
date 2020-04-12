<?php
include("include/mydb.php");

if(isset($_POST['submit']))
{
   $skill=trim($_POST['skill']);
   $sql=mysqli_query($con,"insert into skill_tble(skill_name) values('$skill')");
   if($sql)
   {
     echo 'skill inserted';
   }
   
}


?>

<form method="post">
<input type="text" name="skill" required>
<input type="submit" value="submit" name="submit">

</form>