<?php
   include("include/class.user.php");
   $user= new USER();
   if(!$user->is_logged_in()) {
   $user->redirect("index.php?msg=Please Login First");
   }
    $admin=$_SESSION['name'];
    
   if(isset($_POST['change-pswd'])) {
   
   $oldpswd=trim($_POST['oldpswd']);
   $oldpass=md5($oldpswd);
   $newpswd=$_POST['newpswd'];
   $newpass=md5($newpswd);
   
   $stmt=$user->runQuery("select * from admin where password=:oldPSWD AND name=:username");
   $stmt->bindparam(":oldPSWD",$oldpass);
   $stmt->bindparam(":username",$admin);
   $stmt->execute();
   $count=$stmt->rowCount();
   if($count>0) {
   $stmt=$user->runQuery("update admin set password=:newPSWD where name=:username");
   $stmt->bindparam(":newPSWD",$newpass);
   $stmt->bindparam(":username",$admin);
   if($stmt->execute()) {
   $msg= "Your Password changed successfully";
   }
   }
   else {
   
   $msg2= 'sorry!  old password did not match with current password ';
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
      <title>Telangana Welfare Foundation Rahe Nikah</title>
      <!-- inject:css -->
      <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
      <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
      <link rel="stylesheet" href="dist/css/demo.css">
      <!-- endinject -->
      <!-- Main Style  -->
      <link rel="stylesheet" href="dist/css/main.css">
      <script src="assets/js/modernizr-custom.js"></script>
   </head>
   <body>
      <div id="ui" class="ui">
         <!--header start-->
         <?php include("include/sidebar.php");?>
         <!--main content start-->
         <div id="content" class="ui-content ">
            <div class="ui-content-body">
               <div class="ui-container">
                  <div class="row">
                     <div class="col-md-12">
                        <div class="panel profile-wrap">
                           <header class="panel-heading clearfix">
                              <h3 class="profile-title pull-left"></h3>
                              <div class="pull-right">
                              </div>
                           </header>
                           <div class="panel-body row">
                              <div class="col-md-12">
                                 <div class="col-md-6 settings col-md-push-3">
                                    <h4 class="settings_font">Change Password</h4>
                                    <div class="col-md-11" style="margin-top:20px; margin-bottom:30px; text-align:center">
                                       <?php if(!empty($msg)) { ?>
                                       <span class=" alert alert-success"><?php echo $msg;?></span>
                                       <?php	} ?>
                                       <?php if(!empty($msg2)) {  ?>
                                       <span class=" alert alert-danger"><?php echo $msg2;?></span>
                                       <?php	} ?>
                                    </div>
                                    <form  method="post">
                                       <div class="form-group">
                                          <label>Old Password:</label>
                                          <input type="password" name="oldpswd" class="form-control" required="">
                                       </div>
                                       <div class="form-group">
                                          <label>New Password:</label>
                                          <input type="password" name="newpswd" class="form-control" required="">
                                       </div>
                                       <button type="submit" name="change-pswd" class="btn btn-primary">Change Now</button>
                                    </form>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <!--main content end-->
         <!--footer start-->
         <div id="footer" class="ui-footer">
            2018 &copy; Telangana Welfare Foundation Rahe Nikah
         </div>
         <!--footer end-->
      </div>
      <!-- inject:js -->
      <script src="bower_components/jquery/dist/jquery.min.js"></script>
      <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
      <!-- Common Script   -->
      <script src="dist/js/main.js"></script>
   </body>
</html>