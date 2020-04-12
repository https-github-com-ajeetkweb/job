<?php
include("include/class.user.php");
$user = new USER();
     
    $uid=$_POST['uid'];
    $oldpswd=trim($_POST['oldpswd']); 
    $oldpass=md5($oldpswd);
    $newpswd=trim($_POST['newpswd']);
    $newpass=md5($newpswd);
    $stmt=$user->runQuery("select id,password from job_users where password=:oldPSWD AND id=:UID");
    $stmt->bindparam(":oldPSWD",$oldpass);
    $stmt->bindparam(":UID",$uid);
    $stmt->execute();
    $count=$stmt->rowCount();
    if($count>0) {
    $stmt=$user->runQuery("update job_users set password=:newPSWD where id=:UID");
    $stmt->bindparam(":newPSWD",$newpass);
    $stmt->bindparam(":UID",$uid);
    if($stmt->execute()) {
   echo $msg= "ok";

    }
    }
    else {

  echo  $msg2= "<div class='alert alert-danger' style='font-size:13px'>sorry! old password did not match with current password.</div> ";
    }

                                