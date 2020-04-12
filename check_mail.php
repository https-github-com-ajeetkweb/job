<?php
include("include/mydb.php");

if(isset($_POST['email']))
{
  $emailId=$_POST['email'];
 if($emailId) {

if(!filter_var($emailId,FILTER_VALIDATE_EMAIL)) {

  echo  "<div style='color:#ff6666'>Please enter valid Email ID</div>";
  return false;
}
else {
if(empty($_POST['checkfor']) ) {
 $checkdata=" SELECT emp_email FROM employers_tble WHERE emp_email='$emailId' ";
}
if(!empty($_POST['checkfor']) && $_POST['checkfor']=='jobseeker') {
  $checkdata=" SELECT email FROM job_users WHERE email='$emailId' ";     
}

 $query=mysqli_query($con,$checkdata) or die(mysql_error());

 if(mysqli_num_rows($query)>0)
 {
 echo "<div style='color:#ff6666'>Email ID already registered</div>";
 }
 else
 {
 echo "<div style='color:#009900'>Available</div>";
 }}
 exit();
}
}
?>