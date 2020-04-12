<?php
 include("include/class.user.php");
 $user= new USER();
 if(!$user->is_logged_in()) {
 $user->redirect("../employerlogin.php");
 }
   $id = $_SESSION['EMP_ID'];
   $name = $_SESSION['EMP_name'];
   
if(isset($_POST['change-pswd'])) {
	
$oldpswd=trim($_POST['oldpswd']);
$oldpass=md5($oldpswd);
$newpswd=trim($_POST['newpswd']);
$newpass=md5($newpswd);

$stmt=$user->runQuery("select * from employers_tble where emp_password=:oldPSWD AND emp_name=:username");
$stmt->bindparam(":oldPSWD",$oldpass);
$stmt->bindparam(":username",$name);
$stmt->execute();
$count=$stmt->rowCount();
if($count>0) {
$stmt=$user->runQuery("update employers_tble set emp_password=:newPSWD where emp_name=:username");
$stmt->bindparam(":newPSWD",$newpass);
$stmt->bindparam(":username",$admin);
if($stmt->execute()) {
$msg= "Your Password changed successfully";
}
}
else {

$msg2= 'sorry!  current password is incorrect.';
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
      <title>MeeM.one Job Portal</title>
      <!-- inject:css -->
      <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
      <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
      <link rel="stylesheet" href="bower_components/simple-line-icons/css/simple-line-icons.css">
      <link rel="stylesheet" href="dist/css/simplelightbox.min.css">
      <link rel="stylesheet" href="dist/css/demo.css">
      <!-- endinject -->
      <!-- Main Style  -->
      <link rel="stylesheet" href="dist/css/main.css">
      <script src="assets/js/modernizr-custom.js"></script>
   </head>
   <body>
      <div id="ui" class="ui">
         <!--header start-->
      
         <!--header end-->
           <?php include 'include/sidebar.php';?>
         <!--main content start-->
         <div id="content" class="ui-content ">
            <div class="ui-content-body">
               <div class="ui-container">
                  <div class="row">
                     <div class="col-md-12" style="padding:40px;">
                                                <div class="panel profile-wrap">
      <div class="col-md-11" style="margin-top:20px;  margin-bottom:30px;">
	<?php if(!empty($msg)) { ?>
	
	<span class=" alert alert-success"><?php echo $msg;?></span>
	
<?php	} ?>
		<?php if(!empty($msg2)) {  ?>
		
	<span class=" alert alert-danger"><?php echo $msg2;?></span>
	
<?php	} ?>
	
   
	</div>

                           <header class="panel-heading clearfix">
                              <h3 class="profile-title pull-left">Password Settings</h3>
                           </header>
                           <div class=" row">

                              <div class="col-md-12 profile_pad">
                                 <div class="profile-info">
                                    <div class="col-md-5 pass_bor">
                                        <form method="post" autocomplete="off">
                                    <div class="form-group">
                                    <label>Current Password:</label>
                                    <input type="password" name="oldpswd" class="form-control" id="oldpwd" required=""> 
                                     </div>
                                     <div class="form-group">
                                     <label>New Password:</label>
                                     <input type="password" name="newpswd" class="form-control" id="newpwd" required="">
                                   </div>
                                     <input type="submit" class="btn btn-info" name="change-pswd" value="Submit"></button>
                                   </form>
									
									</div>

                                    <!-- End row -->
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
            2018 &copy; Meem.one
         </div>
         <!--footer end-->
      </div>
      <!-- inject:js -->
      <script src="bower_components/jquery/dist/jquery.min.js"></script>
      <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
      <!-- Common Script   -->
      <script src="dist/js/main.js"></script>
      <script type="text/javascript" src="dist/js/simple-lightbox.js"></script>
   </body>
</html>