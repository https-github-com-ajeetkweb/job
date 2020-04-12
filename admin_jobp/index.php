<?php
   include("include/class.user.php");
   $user= new USER();
    if(isset($_POST['submit-btn'])) {
   	 $msg='';
   	
   	 $name=$_POST['name'];
   	 $password=$_POST['password'];
   	 $password=md5($password);
   	 $stmt=$user->runQuery("select * from admin where name=:username and password=:adminpassword limit 1");
   	 $stmt->bindparam(":username",$name);
   	 $stmt->bindparam(":adminpassword",$password);
   	 $stmt->execute();
   	 $count=$stmt->rowCount();
   	 $rw=$stmt->fetch(PDO::FETCH_ASSOC);
   	 $name=$rw['name'];
   	 $adminid=$rw['id'];
   	 if($count>0) {
   	 $_SESSION['name']=$name;	
   	 $_SESSION['adminid']=$adminid;
         header("location:dashboard.php");
   	 }
   	 else {
   	 
   	 $msg="Invalid Username or Password.";
   	 }
   	 
         }
   ?>
<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="shortcut icon" type="image/png" href="imgs/favicon.png" />
      <title>MeeM.one Login</title>
      <!-- inject:css -->
      <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
      <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
      <!-- endinject -->
      <!-- Main Style  -->
      <link rel="stylesheet" href="dist/css/login.css">
      <script src="assets/js/modernizr-custom.js"></script>
   </head>
   <body>
      <div class="sign-in-wrapper">
         <div class="sign-container">
            <div class="text-center">
               <h2 class="logo"><img src="imgs/logo-login.png" alt=""/></h2>
               <h4>Login to Admin</h4>
            </div>
            <?php if(isset($msg)) { ?>
            <h5 style="color:#FF0000; text-align:center; font-family: Calibri"><?php echo $msg;?></h5>
            <?php } ?>
            <form class="sign-in-form" role="form" method="post" >
               <div class="form-group">
                  <input type="text" name="name" class="form-control" placeholder="User name"  maxlength="15">
               </div>
               <div class="form-group">
                  <input type="password" name="password" class="form-control" placeholder="Password" maxlength="15">
               </div>
               <button type="submit" name="submit-btn" class="btn btn-info btn-block">Login</button>
               <div class="text-center help-block">
                  <a href="forgot-password.html"><small>Forgot password?</small></a>
               </div>
            </form>
            <div class="text-center copyright-txt">
               <small>MeeM.one Job Portal - Copyright © 2018</small>
            </div>
         </div>
      </div>
      <!-- inject:js -->
      <script src="bower_components/jquery/dist/jquery.min.js"></script>
      <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
      <script src="bower_components/jquery.nicescroll/dist/jquery.nicescroll.min.js"></script>
      <script src="bower_components/autosize/dist/autosize.min.js"></script>
      <!-- endinject -->
      <!-- Common Script   -->
      <script src="dist/js/main.js"></script>
   </body>
</html>