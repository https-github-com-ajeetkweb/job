<?php
include("include/class.user.php");
$user=new USER();
 $id=$_POST['id'];
 $action=$_POST['action'];

$user_for=$_POST['user_for'];

	
if($action=='profile') {		
  $stmt=$user->runQuery("update photo_approval set pp_photo='2' where userid=:userID and user_for='$user_for'");	
 }
 
if($user_for=='jobseeker') {
 if($action=='resume') {		
  $stmt=$user->runQuery("update photo_approval set resume='2' where userid=:userID and user_for='$user_for'");	
 }
 }

$stmt->bindparam(":userID",$id);
$stmt->execute();	
	

?>