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
      <title>MeeM.one</title>
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
                              <div class="clearfix"></div>
                              <hr style="border:1px solid #ddd; display:block; width:100%">
                           </header>
                           <div class="col-md-9 mbot-10">
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
                           <div class="col-md-3" style="margin-bottom:20px">
                              <span>
                                 <div class="btn-group">
                                    <a class="btn btn-info dropdown-toggle" href="#" data-toggle="dropdown" aria-expanded="false">Action <span class="caret"></span></a>
                                    <ul class="dropdown-menu" >
                                       <?php if($data['verify']=='' && $data['paid']=='') { ?>
                                       <li><a href="javascript:void(0)" onClick="send_vlink(<?php echo $data['id'];?>,'employer')">Send verification Link</a></li>
                                       <?php } ?>
                                       <li><a href="javascript:void(0)" onClick="delete_nonpaid(<?php echo $data['id'];?>,'employer')">Delete</a></li>
                                    </ul>
                                 </div>
                              </span>
                           </div>
                           <div class="col-md-12">
                              <hr style="border:1px solid #ddd; display:block; width:100%">
                           </div>
                           <div class="panel-body row">
                              <?php if(empty($_GET['option'])) { ?>
                              <div class="col-md-12">
                                 <div class="col-md-4">
                                    <div class="profile-thumb gallery">
                                       <img src="../images/employer/<?php echo $data['emp_photo'];?>" class="profile_height thumbnail"/>
                                    </div>
                                 </div>
                                 <div class="col-md-6">
                                    <div class="profile-info">
                                       <h5>Contact Information  &nbsp;&nbsp; <a href="emp_profle.php?view=<?php echo $_GET['view'];?>&id=<?php echo $id;?>&option=Edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</a></h5>
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
                                             <i class="fa fa-map-marker"></i>
                                             <div class="p-i-list">
                                                <span class="text-muted">Office Address</span>
                                                <span class="user_contact"> <?php echo $data['address'];?></span>
                                             </div>
                                          </li>
                                       </ul>
                                    </div>
                                    <div class="profile-info">
                                       <h5 class="about_me">Description</h5>
                                       <p  class="text-justify text-admin"><?php echo $data['details'];?></p>
                                    </div>
                                 </div>
                                 <div class="profile-info">
                                    <div class="row ">
                                       <div class="col-md-12 col-xs-12 margin_t porile_bg"><i class="fa fa-user"></i> Details</div>
                                       <div class="col-md-12 margin_t col-xs-12">
                                          <div class="col-md-6 col-xs-12 no_margin">
                                             <div class="col-md-6 col-xs-6 ph_text my_border">Full Name</div>
                                             <div class="col-md-6 col-xs-6 sh_text"><span class="space_p"><?php echo $data['emp_name'];?></span></div>
                                          </div>
                                          <div class="col-md-6 col-xs-12 no_margin">
                                             <div class="col-md-6 col-xs-6 ph_text my_border">Company Name</div>
                                             <div class="col-md-6 col-xs-6 sh_text"><?php echo $data['company'];?></div>
                                          </div>
                                       </div>
                                       <div class="col-md-12 margin_t col-xs-12">
                                          <div class="col-md-6 col-xs-12 no_margin">
                                             <div class="col-md-6 col-xs-6 ph_text my_border">Industry Type</div>
                                             <div class="col-md-6 col-xs-6 sh_text"><?php echo $data['industry_type'];?></div>
                                          </div>
                                          <div class="col-md-6 col-xs-12 no_margin">
                                             <div class="col-md-6 col-xs-6 ph_text my_border">Current Designation</div>
                                             <div class="col-md-6 col-xs-6 sh_text"><?php echo $data['designation'];?></div>
                                          </div>
                                       </div>
                                       <div class="col-md-12 margin_t col-xs-12">
                                          <div class="col-md-6 col-xs-12 no_margin">
                                             <div class="col-md-6 col-xs-6 ph_text my_border">Organization</div>
                                             <div class="col-md-6 col-xs-6 sh_text"><?php echo $data['company_type'];?></div>
                                          </div>
                                          <div class="col-md-6 col-xs-12 no_margin">
                                             <div class="col-md-6 col-xs-6 ph_text my_border">Country</div>
                                             <div class="col-md-6 col-xs-6 sh_text"><?php echo $data['country'];?></div>
                                          </div>
                                       </div>
                                       <div class="col-md-12 margin_t col-xs-12">
                                          <div class="col-md-6 col-xs-12 no_margin">
                                             <div class="col-md-6 col-xs-6 ph_text my_border">State</div>
                                             <div class="col-md-6 col-xs-6 sh_text"><?php echo $data['state'];?></div>
                                          </div>
                                          <div class="col-md-6 col-xs-12 no_margin">
                                             <div class="col-md-6 col-xs-6 ph_text my_border">City</div>
                                             <div class="col-md-6 col-xs-6 sh_text"><?php echo $data['city'];?></div>
                                          </div>
                                       </div>
                                       <div class="col-md-12 margin_t col-xs-12">
                                          <div class="col-md-6 col-xs-12 no_margin">
                                             <div class="col-md-6 col-xs-6 ph_text my_border">Linked-in</div>
                                             <div class="col-md-6 col-xs-6 sh_text"><?php echo $data['link'];?></div>
                                          </div>
                                       </div>
                                       <?php } ?>
                                       <?php if(!empty($_GET['option'])) { ?>
                                       <div class="col-md-9 ">
                                          <h4 style="text-align:center; margin-bottom:20px">Edit contact details of <b style="color:#006699; "><?php echo $data['emp_name'];?></b></h4>
                                          <?php
                                             if(isset($_POST['change-btn'])) {
                                             $mobile=$_POST['mobile'];
                                             $email=$_POST['email'];
                                             $code=$_POST['code'];
                                             
                                             $stmt=$user->runQuery("update employers_tble set mcode='$code', mobile='$mobile', emp_email='$email' where id='$id'");
                                             $stmt->execute();
                                             if($stmt) { ?>
                                          <script>
                                             alert("Contacts changed successfully.");   
                                             setTimeout(function() { window.location='emp_profle.php?view=<?php echo $_GET['view'];?>&id=<?php echo $id;?>';},100); 
                                          </script>
                                          <?php
                                             }
                                             }
                                             ?>
                                          <form method="post">
                                             <div class="col-md-12" style="margin-bottom:10px; margin-top:20px">
                                                <div class="col-md-3">
                                                   Edit Mobile No :
                                                </div>
                                                <div class="col-md-2">
                                                   <input type="text" name="code" value="<?php echo $data['mcode'];?>" maxlength="5" class=" form-control">
                                                </div>
                                                <div class="col-md-6">
                                                   <input type="tel" name="mobile" value="<?php echo $data['mobile'];?>" maxlength="15" class=" form-control">
                                                </div>
                                             </div>
                                             <div class="col-md-12" style="margin-bottom:10px">
                                                <div class="col-md-3">
                                                   Edit Email :
                                                </div>
                                                <div class="col-md-8">
                                                   <input type="email" name="email" value="<?php echo $data['emp_email'];?>" maxlength="50" class=" form-control">
                                                </div>
                                             </div>
                                             <div class="col-md-12">
                                                <div class="col-md-3">
                                                   &nbsp;
                                                </div>
                                                <div class="col-md-8">
                                                   <input type="submit" name="change-btn" value="Change Now" class=" btn btn-primary">
                                                </div>
                                             </div>
                                          </form>
                                          <div class="col-md-12" style="margin-bottom:5px">
                                             <a href="emp_profle.php?view=<?php echo $_GET['view'];?>&id=<?php echo $id;?>" class="btn btn-default">Back</a>
                                          </div>
                                       </div>
                                       <?php } ?>		
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
            2018 &copy; MeeM.one Admin Job Portal
         </div>
         <!--footer end-->
      </div>
      <script>
         function send_vlink(id,employer) {
         var data={'id':id,'employer':employer};
         $.ajax ({
         type: 'post',
         url: 'send_link.php',
         data: data,
         success: function(result) {
         alert('Verification Link sent');
         }
         });
         }
         
         
         function delete_nonpaid(id,employer) {
         var onfirm=confirm('Are you sure to delete this employer ?');
         if(onfirm==true) {
         var data={'id':id,'employer':employer};
         $.ajax ({
         type: 'post',
         url: 'delete_nonpaid.php',
         data: data,
         success: function(result) {
         alert('Employer Profile deleted');
         setTimeout(' window.location.href = "emp_profle.php?view=<?php echo $_GET['view'];?>"; ',1000);
         }
         });
         }
         }
         
      </script>       
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