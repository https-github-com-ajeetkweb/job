<?php
include("include/class.user.php");
$user=new USER();
 $id=$_POST['id'];
if(empty($_POST['employer'])) {

$stmt=$user->runQuery("select photo,resume from job_users where id='$id'");
$stmt->execute();
$data=$stmt->fetch(PDO::FETCH_ASSOC);
$photo=$data['photo'];
$resume=$data['resume'];
$pp_photo="../images/jobseeker/$photo";
$resume="../images/resume/$resume";
if(file_exists($pp_photo) ) {
unlink($pp_photo);
}
if(file_exists($resume) ) {
unlink($resume);
}

$stmt=$user->runQuery("delete from job_users where id='$id'");
$result=$stmt->execute();

}
if(!empty($_POST['employer']))
 {

$stmt=$user->runQuery("select emp_photo from employers_tble where id='$id'");
$stmt->execute();
$data=$stmt->fetch(PDO::FETCH_ASSOC);
$photo=$data['emp_photo'];
$pp_photo="../images/employer/$photo";
if(file_exists($pp_photo) ) {
unlink($pp_photo);
}

$stmt=$user->runQuery("delete from employers_tble where id='$id'");
$result=$stmt->execute();

$stmt=$user->runQuery("delete from meem_jobs where emp_id='$id'");
$result=$stmt->execute();

$stmt=$user->runQuery("delete from job_applications where emp_id='$id'");
$result=$stmt->execute();

$stmt=$user->runQuery("delete from matching_jobseekers where emp_id='$id'");
$result=$stmt->execute();


}

?>