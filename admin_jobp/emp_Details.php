<?php
   include("include/class.user.php");
   $user= new USER();
   if(!$user->is_logged_in()) {
   $user->redirect("index.php?msg=Please Login First");
   }
    $admin=$_SESSION['name'];
    
   $id=$_GET['id'];  
   $stmt=$user->runQuery("select * from employers_tble where id=:userID");
   $stmt->bindparam(":userID",$id);
   $stmt->execute();
   $data=$stmt->fetch(PDO::FETCH_ASSOC);
   
   ?>
<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="shortcut icon" type="image/png" href="imgs/favicon.png" />
      <title>MeeM.one job portal - Admin</title>
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
      <style>
         tr{font-weight:bold;}
         .left_t{text-align:left!important;}
      </style>
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
                              <h3 class="profile-title pull-left">
                                 <?php if($_GET['view']=='active') { echo 'Active Employer';} elseif($_GET['view']=='inactive') { echo 'Inctive Employer';} elseif($_GET['view']=='expired') { echo 'Expired Employer';} else{ echo 'Job Applications';}?>
                              </h3>
                              <div class="pull-right">
                              </div>
                           </header>
                           <div class="col-md-11 mbot-10">
                              <?php if($_GET['view']=='inactive') { ?>
                              <?php if($data['otp']!='0'){ ?>  Email ID : <span style="color:#009933"> <i class="fa fa-check" aria-hidden="true"></i>, </span><?php } else { ?> Email ID :<span style="color:#FF3300"> <i class="fa fa-times" aria-hidden="true"></i> Pending,   </span><?php } ?>
                              <?php if($data['verify']=='Y'){ ?>  Mobile Number : <span style="color:#009933"> <i class="fa fa-check" aria-hidden="true"></i> </span><?php } else { ?> Mobile Number :<span style="color:#FF3300"> <i class="fa fa-times" aria-hidden="true"></i> Pending</span><?php } ?>
                              <h5>Register_Date: <?php echo date('d-m-Y',strtotime($data['register_date']));?></h5>
                              <?php } ?>   
                              <?php if($_GET['view']=='active') { ?>
                              <div class="col-md-3">
                                 <span>Plan : <?php echo $data['plan'];?></span>  
                              </div>
                              <div class="col-md-3">
                                 <span>Paid Date : <?php echo date('d-m-Y',strtotime($data['paid_date']));?></span>  
                              </div>
                              <div class="col-md-3">
                                 <span>Expiry Date : <?php echo date('d-m-Y',strtotime($data['expiry_date']));?></span>  
                              </div>
                              <?php } ?>  
                           </div>
                           <div class="panel-body row">
                              <div class="col-xs-12 col-sm-12 col-md-6 col-lg-11 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-0 toppad" >
                                 <div class="panel panel-info">
                                    <div class="panel-heading">
                                       <h3 class="panel-title"><?php echo $data['emp_name'];?></h3>
                                    </div>
                                    <div class="panel-body">
                                       <div class="row">
                                          <div class="col-md-3 col-lg-4">
                                             <img src="../images/employer/<?php echo $data['emp_photo'];?>" alt="User Pic"  class="thumbnail profile_p"> 
                                             <div class="profile-info" style="margin:0; padding:0px;">
                                                <h5>Contact Information</h5>
                                                <ul class="list-unstyled">
                                                   <li>
                                                      <i class="fa fa-mobile"></i>
                                                      <div class="p-i-list">
                                                         <span class="text-muted">Mobile Number</span>
                                                         <span class="user_contact"> <?php echo $data['mcode'].$data['mobile'];?></span>
                                                      </div>
                                                   </li>
                                                   <li>
                                                      <i class="fa fa-envelope-o"></i>
                                                      <div class="p-i-list">
                                                         <span class="text-muted">E-mail</span>
                                                         <span class="user_contact"> <?php echo $data['emp_email'];?></span>
                                                      </div>
                                                   </li>
                                                   <li>
                                                      <i class="fa fa-linkedin-square"></i>
                                                      <div class="p-i-list">
                                                         <span class="text-muted">LinkedIn </span>
                                                         <span class="user_contact"><?php echo $data['link'];?></span>
                                                      </div>
                                                   </li>
                                                   <li>
                                                      <i class="fa fa-map-marker"></i>
                                                      <div class="p-i-list">
                                                         <span class="text-muted">Current Location</span>
                                                         <span class="user_contact"> <?php echo $data['city'].', '.$data['country'];?></span>
                                                      </div>
                                                   </li>
                                                </ul>
                                             </div>
                                          </div>
                                          <div class=" col-md-9 col-lg-8 " >
                                             <table class="table table-user-information" >
                                                <tbody >
                                                   <tr >
                                                      <td style="text-align:left; width:220px;">Full Name</td>
                                                      <td style="text-align:left;"><?php echo $data['emp_name'];?></td>
                                                   </tr>
                                                   <tr>
                                                      <td style="text-align:left;"> Company Name </td>
                                                      <td style="text-align:left;"><?php echo $data['company'];?></td>
                                                   </tr>
                                                   <tr>
                                                      <td style="text-align:left;">Industry </td>
                                                      <td style="text-align:left;"><?php echo $data['industry_type'];?></td>
                                                      </td>
                                                   </tr>
                                                   <tr>
                                                      <td style="text-align:left;">Current Designation </td>
                                                      <td style="text-align:left;"><?php echo $data['designation'];?></td>
                                                      </td>
                                                   </tr>
                                                   <tr>
                                                      <td style="text-align:left;">Country </td>
                                                      <td style="text-align:left;"><?php echo $data['country'];?></td>
                                                      </td>
                                                   </tr>
                                                   <tr>
                                                      <td style="text-align:left;">State</td>
                                                      <td style="text-align:left;"><?php echo $data['state'];?></td>
                                                   </tr>
                                                   <tr>
                                                      <td style="text-align:left;">City </td>
                                                      <td style="text-align:left;"><?php echo $data['city'];?></td>
                                                      </td>
                                                   </tr>
                                                   <tr>
                                                      <td style="text-align:left;">Description</td>
                                                      <td style="text-align:left;"><?php echo $data['details'];?></td>
                                                      </td>
                                                   </tr>
                                                   <tr>
                                                      <td style="text-align:left;">Address</td>
                                                      <td style="text-align:left;"><?php echo $data['address'];?></td>
                                                      </td>
                                                   </tr>
                                                   <tr>
                                                   </tr>
                                                </tbody>
                                             </table>
                                          </div>
                                       </div>
                                    </div>
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
            2018 &copy; MeeM.one Admin Job Portal
         </div>
         <!--footer end-->
      </div>
      <!-- inject:js -->
      <script src="bower_components/jquery/dist/jquery.min.js"></script>
      <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
      <!-- Common Script   -->
      <script src="dist/js/main.js"></script>
      <script type="text/javascript" src="dist/js/simple-lightbox.js"></script>
      <script>
         $(function(){
         	var $gallery = $('.gallery a').simpleLightbox();
         
         	$gallery.on('show.simplelightbox', function(){
         		console.log('Requested for showing');
         	})
         	.on('shown.simplelightbox', function(){
         		console.log('Shown');
         	})
         	.on('close.simplelightbox', function(){
         		console.log('Requested for closing');
         	})
         	.on('closed.simplelightbox', function(){
         		console.log('Closed');
         	})
         	.on('change.simplelightbox', function(){
         		console.log('Requested for change');
         	})
         	.on('next.simplelightbox', function(){
         		console.log('Requested for next');
         	})
         	.on('prev.simplelightbox', function(){
         		console.log('Requested for prev');
         	})
         	.on('nextImageLoaded.simplelightbox', function(){
         		console.log('Next image loaded');
         	})
         	.on('prevImageLoaded.simplelightbox', function(){
         		console.log('Prev image loaded');
         	})
         	.on('changed.simplelightbox', function(){
         		console.log('Image changed');
         	})
         	.on('nextDone.simplelightbox', function(){
         		console.log('Image changed to next');
         	})
         	.on('prevDone.simplelightbox', function(){
         		console.log('Image changed to prev');
         	})
         	.on('error.simplelightbox', function(e){
         		console.log('No image found, go to the next/prev');
         		console.log(e);
         	});
         });
      </script>
   </body>
</html>