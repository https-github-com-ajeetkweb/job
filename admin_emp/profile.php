<?php
 include("include/class.user.php");
 $user= new USER();
 if(!$user->is_logged_in()) {
 $user->redirect("../employerlogin.php");
 }
   $id = $_SESSION['EMP_ID'];
   $name = $_SESSION['EMP_name'];
   
   $stmt=$user->runQuery("select * from employers_tble where id='$id'");
    $stmt->execute();
   $row=$stmt->fetch(PDO::FETCH_ASSOC);

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
         <!--sidebar end-->
         <!--main content start-->
         <div id="content" class="ui-content ">
            <div class="ui-content-body">
               <div class="ui-container">
                  <div class="row">
                     <div class="col-md-12">
                        <div class="panel profile-wrap">
                           <header class="panel-heading clearfix">
                              <h3 class="profile-title pull-left"><?php echo $row['emp_name'];?></h3>
                           </header>
                           <div class=" row">
                              <div class="col-md-12">
                                 <div class="col-md-3">
                                    <div class=" gallery">
                                       <img src="../images/employer/<?php echo $row['emp_photo'];?>" class="profile_height"/>
                                    </div>
                                 </div>
                                 <div class="col-md-6">
                                    <div class="profile-info" style="margin-bottom:0px;">
                                       <h5>Contact Information</h5>
                                       <ul class="list-unstyled">
                                          <li>
                                             <i class="fa fa-mobile"></i>
                                             <div class="p-i-list">
                                                <span class="text-muted">Mobile Number</span>
                                                <span class="user_contact"> <?php echo $row['mcode'].$row['mobile'];?></span>
                                             </div>
                                          </li>
                                          <li>
                                             <i class="fa fa-envelope-o"></i>
                                             <div class="p-i-list">
                                                <span class="text-muted">E-mail</span>
                                                <span class="user_contact"> <?php echo $row['emp_email'];?></span>
                                             </div>
                                          </li>
                                          <li>
                                             <i class="fa fa-linkedin-square"></i>
                                             <div class="p-i-list">
                                                <span class="text-muted">LinkedIn </span>
                                                <span class="user_contact"> <?php echo $row['link'];?> </span>
                                             </div>
                                          </li>
                                          <li>
                                             <i class="fa fa-map-marker"></i>
                                             <div class="p-i-list">
                                                <span class="text-muted">Address</span>
                                                <span class="user_contact"><?php echo $row['address'];?></span>
                                             </div>
                                          </li>
                                       </ul>
                                    </div>
                                 </div>
                              </div>
                              <div class="col-md-12 profile_pad">
                                 <div class="profile-info">
                                    <h4><?php echo $row['company'];?> </h4>
                                    <div class=="row ">
                                       <div class="col-md-12 col-xs-12 margin_t partmer_bg"><i class="fa fa-user"></i> Employer Profile</div>
                                       <div class="col-md-12 margin_t col-xs-12">
                                          <div class="col-md-6 col-xs-12 no_margin">
                                             <div class="col-md-6 col-xs-6 emp_text my_border">Full Name</div>
                                             <div class="col-md-6 col-xs-6 sh_text"> <?php echo $row['emp_name'];?> </div>
                                          </div>
                                          <div class="col-md-6 col-xs-12 no_margin">
                                             <div class="col-md-6 col-xs-6 emp_text my_border">Industry Type</div>
                                             <div class="col-md-6 col-xs-6 sh_text"> <?php echo $row['industry_type'];?> </div>
                                          </div>
                                       </div>
                                       <div class="col-md-12 margin_t col-xs-12">
                                          <div class="col-md-6 col-xs-12 no_margin">
                                             <div class="col-md-6 col-xs-6 emp_text my_border">Organization</div>
                                             <div class="col-md-6 col-xs-6 sh_text"> <?php echo $row['company'];?> </div>
                                          </div>
                                          <div class="col-md-6 col-xs-12 no_margin">
                                             <div class="col-md-6 col-xs-6 emp_text my_border">Designation</div>
                                             <div class="col-md-6 col-xs-6 sh_text"> <?php echo $row['designation'];?> </div>
                                          </div>
                                       </div>
                                       <div class="col-md-12 margin_t col-xs-12">
                                          <div class="col-md-6 col-xs-12 no_margin">
                                             <div class="col-md-6 col-xs-6 emp_text my_border">Country</div>
                                             <div class="col-md-6 col-xs-6 sh_text"> <?php echo $row['country'];?></div>
                                          </div>
                                          <div class="col-md-6 col-xs-12 no_margin">
                                             <div class="col-md-6 col-xs-6 emp_text my_border">State</div>
                                             <div class="col-md-6 col-xs-6 sh_text"><?php echo $row['state'];?></div>
                                          </div>
                                       </div>
                                       <div class="col-md-12 margin_t col-xs-12">
                                          <div class="col-md-6 col-xs-12 no_margin">
                                             <div class="col-md-6 col-xs-6 emp_text my_border">City</div>
                                             <div class="col-md-6 col-xs-6 sh_text"><?php echo $row['city'];?></div>
                                          </div>
                                          <div class="col-md-6 col-xs-12 no_margin">
                                             <div class="col-md-6 col-xs-6 emp_text my_border">Others</div>
                                             <div class="col-md-6 col-xs-6 sh_text"><?php echo $row['details'];?></div>
                                          </div>
                                       </div>
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