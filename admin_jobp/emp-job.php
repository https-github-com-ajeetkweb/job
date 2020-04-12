<?php
   include("include/class.user.php");
   $user= new USER();
   if(!$user->is_logged_in()) {
   $user->redirect("index.php?msg=Please Login First");
   }
    $admin=$_SESSION['name'];
    
   $job_id=$_GET['job_id'];  
   $stmt=$user->runQuery("select * from meem_jobs where id=:jobid");
   $stmt->bindparam(":jobid",$job_id);
   $stmt->execute();
   $data=$stmt->fetch(PDO::FETCH_ASSOC);
   $emp_id=$data['emp_id'];
  // get employer details
  
   $stmt=$user->runQuery("select * from employers_tble where id=:emp_id");
   $stmt->bindparam(":emp_id",$emp_id);
   $stmt->execute();
   $edata=$stmt->fetch(PDO::FETCH_ASSOC); 
   
   
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
	  <style>
	body{margin:0px!important;}
	  </style>
   </head>
   <body>
      <div id="ui" style="margin-top:10px;">
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
                              <h3 class="profile-title  title_e">Employer Job Posting
                              </h3>
                              <div class="clearfix"></div>
                            
                           </header>
                           <div class="col-md-12 col-xs-12 mbot-10 title_b">
  <strong>Rida ITS</strong>
                           </div>


                           <div class="panel-body row">

                              <div class="col-md-12">
                                 <div class="col-md-4">
                                    <div class="profile-thumb gallery">
                                       <img src="../images/employer/<?php echo $edata['emp_photo'];?>" class="profile_tthumb "/>
                                    </div>
                                 </div>
                                 <div class="col-md-6">
                                    <div class="profile-info">
                                       <h5>Contact Information  </h5>
                                       <ul class="list-unstyled">
                                          <li>
                                             <i class="fa fa-mobile"></i>
                                             <div class="p-i-list">
                                                <span class="text-muted">Mobile Number</span>
                                                <span class="user_contact"> <?php echo $edata['mcode'].$edata['mobile'];?></span>
                                             </div>
                                          </li>
                                          <li>
                                             <i class="fa fa-envelope-o"></i>
                                             <div class="p-i-list">
                                                <span class="text-muted">E-mail</span>
                                                <span class="user_contact"> <?php echo $edata['emp_email'];?></span>
                                             </div>
                                          </li>
                                          <li>
                                             <i class="fa fa-map-marker"></i>
                                             <div class="p-i-list">
                                                <span class="text-muted">Company Address</span>
                                                <span class="user_contact"> <?php echo $edata['address'];?></span>
                                             </div>
                                          </li>
										  <li>
                                             <i class="fa fa-link"></i>
                                             <div class="p-i-list">
                                                <span class="text-muted">Company Website</span>
                                                <span class="user_contact"> <?php echo $data['website'];?></span>
                                             </div>
                                          </li>
                                       </ul>

                                 </div>
   
                                    <!-- End row -->
                                 </div> 
                              </div>
							  <div class="col-md-12">
							   <div class="panel panel-default">
                               <div class="panel-heading">Job Details</div>
                               <div class="panel-body">
							    <div class="row">
							            <div class="col-md-12 margin_t col-xs-12">
                                          <div class="col-md-6 col-xs-12 no_margin">
                                             <div class="col-md-6 col-xs-6 ph_text my_border">Date of Posting</div>
                                             <div class="col-md-6 col-xs-6 sh_text"><?php echo date('d-m-Y',strtotime($data['post_date']));?></div>
                                          </div>
                                          <div class="col-md-6 col-xs-12 no_margin">
                                             <div class="col-md-6 col-xs-6 ph_text my_border">Company Name</div>
                                             <div class="col-md-6 col-xs-6 sh_text"><?php echo $data['company_name'];?></div>
                                          </div>
										  </div>
										  
									<div class="col-md-12 margin_t col-xs-12">
                                          <div class="col-md-6 col-xs-12 no_margin">
                                             <div class="col-md-6 col-xs-6 ph_text my_border">Industry/Company/Organization</div>
                                             <div class="col-md-6 col-xs-6 sh_text"><?php echo $data['industry'];?></div>
                                          </div>
                                          <div class="col-md-6 col-xs-12 no_margin">
                                             <div class="col-md-6 col-xs-6 ph_text my_border">Job Code</div>
                                             <div class="col-md-6 col-xs-6 sh_text"><?php echo $data['job_code'];?></div>
                                          </div>
										  </div>
									<div class="col-md-12 margin_t col-xs-12">
                                          <div class="col-md-6 col-xs-12 no_margin">
                                             <div class="col-md-6 col-xs-6 ph_text my_border">Job Type</div>
                                             <div class="col-md-6 col-xs-6 sh_text"><?php echo $data['job_type'];?></div>
                                          </div>
                                          <div class="col-md-6 col-xs-12 no_margin">
                                             <div class="col-md-6 col-xs-6 ph_text my_border">Job Title</div>
                                             <div class="col-md-6 col-xs-6 sh_text"><?php echo $data['job_title'];?></div>
                                          </div>
									 </div>	
									<div class="col-md-12 margin_t col-xs-12">
                                          <div class="col-md-6 col-xs-12 no_margin">
                                             <div class="col-md-6 col-xs-6 ph_text my_border">Job Role</div>
                                             <div class="col-md-6 col-xs-6 sh_text"><?php echo $data['job_role'];?></div>
                                          </div>
                                          
									</div>		
									<div class="col-md-12 margin_t col-xs-12">
                                          <div class="col-md-6 col-xs-12 no_margin">
                                             <div class="col-md-6 col-xs-6 ph_text my_border">Job Description</div>
                                             <div class="col-md-6 col-xs-6 sh_text"><?php echo $data['job_desc'];?></div>
                                          </div>
                                          <div class="col-md-6 col-xs-12 no_margin">
                                             <div class="col-md-6 col-xs-6 ph_text my_border">About Company</div>
                                             <div class="col-md-6 col-xs-6 sh_text"><?php echo $data['company_about'];?></div>
                                          </div>
									</div>	
									<div class="col-md-12 margin_t col-xs-12">
                                          <div class="col-md-6 col-xs-12 no_margin">
                                             <div class="col-md-6 col-xs-6 ph_text my_border">Minimum Salary</div>
                                             <div class="col-md-6 col-xs-6 sh_text"><?php echo $data['currency'] .' '. $data['min_salary'];?></div>
                                          </div>
                                          <div class="col-md-6 col-xs-12 no_margin">
                                             <div class="col-md-6 col-xs-6 ph_text my_border">Maximum Salary</div>
                                             <div class="col-md-6 col-xs-6 sh_text"><?php echo $data['currency'] .' '. $data['max_salary'];?></div>
                                          </div>
									</div>
									<div class="col-md-12 margin_t col-xs-12">
                                          <div class="col-md-6 col-xs-12 no_margin">
                                             <div class="col-md-6 col-xs-6 ph_text my_border">Numbers of Positions</div>
                                             <div class="col-md-6 col-xs-6 sh_text"><?php echo $data['Vacancies'];?></div>
                                          </div>
                                          <div class="col-md-6 col-xs-12 no_margin">
                                             <div class="col-md-6 col-xs-6 ph_text my_border">Job Location Country</div>
                                             <div class="col-md-6 col-xs-6 sh_text"><?php echo $data['country'];?></div>
                                          </div>
									</div>	
									<div class="col-md-12 margin_t col-xs-12">
                                          <div class="col-md-6 col-xs-12 no_margin">
                                             <div class="col-md-6 col-xs-6 ph_text my_border">State</div>
                                             <div class="col-md-6 col-xs-6 sh_text"><?php echo $data['state'];?></div>
                                          </div>
                                          <div class="col-md-6 col-xs-12 no_margin">
                                             <div class="col-md-6 col-xs-6 ph_text my_border">City/Town</div>
                                             <div class="col-md-6 col-xs-6 sh_text"><?php echo $data['city'];?></div>
                                          </div>
									</div>		
									<div class="col-md-12 margin_t col-xs-12">
                                          <div class="col-md-6 col-xs-12 no_margin">
                                             <div class="col-md-6 col-xs-6 ph_text my_border">Contact Person Email</div>
                                             <div class="col-md-6 col-xs-6 sh_text"><?php echo $data['contact_email'];?></div>
                                          </div>
                                          <div class="col-md-6 col-xs-12 no_margin">
                                             <div class="col-md-6 col-xs-6 ph_text my_border">Contact Person Mobile Number</div>
                                             <div class="col-md-6 col-xs-6 sh_text"><?php echo $data['contact_number'];?></div>
                                          </div>
									</div>										
							   </div>
							   </div>
						       </div><!--END JOB POSTING PANEL-->
							   
					<div class="panel panel-default">
                               <div class="panel-heading">Preferences for this Job</div>
                               <div class="panel-body">
							    <div class="row">
							            <div class="col-md-12 margin_t col-xs-12">
                                          <div class="col-md-6 col-xs-12 no_margin">
                                             <div class="col-md-6 col-xs-6 ph_text my_border">Preferred Education</div>
                                             <div class="col-md-4 col-xs-6 sh_text"><?php echo $data['prefer_edu'];?></div>
                                          </div>
                                          <div class="col-md-6 col-xs-12 no_margin">
                                             <div class="col-md-6 col-xs-6 ph_text my_border">Preferred candidate Main skills / Job positions</div>
                                             <div class="col-md-6 col-xs-6 sh_text"><?php echo $data['prefer_skill'];?></div>
                                          </div>
										  </div>
										  
									<div class="col-md-12 margin_t col-xs-12">
                                          <div class="col-md-6 col-xs-12 no_margin">
                                             <div class="col-md-6 col-xs-6 ph_text my_border">Min Experience</div>
                                             <div class="col-md-6 col-xs-6 sh_text"><?php if(isset($data['prefer_min_exp'])) { echo $data['prefer_min_exp']. ' Years';}?></div>
                                          </div>
                                          <div class="col-md-6 col-xs-12 no_margin">
                                             <div class="col-md-6 col-xs-6 ph_text my_border">Max Experience</div>
                                             <div class="col-md-6 col-xs-6 sh_text"><?php if(isset($data['prefer_max_exp'])) { echo $data['prefer_max_exp']. ' Years';}?></div>
                                          </div>
										  </div>
									<div class="col-md-12 margin_t col-xs-12">
                                          <div class="col-md-6 col-xs-12 no_margin">
                                             <div class="col-md-6 col-xs-6 ph_text my_border">Preferred Industry/Company/Organization</div>
                                             <div class="col-md-6 col-xs-6 sh_text"><?php echo $data['prefer_industry'];?></div>
                                          </div>
                                          <div class="col-md-6 col-xs-12 no_margin">
                                             <div class="col-md-6 col-xs-6 ph_text my_border">Marital Status</div>
                                             <div class="col-md-6 col-xs-6 sh_text"><?php echo $data['prefer_marital'];?></div>
                                          </div>
									 </div>	
									<div class="col-md-12 margin_t col-xs-12">
                                          <div class="col-md-6 col-xs-12 no_margin">
                                             <div class="col-md-6 col-xs-6 ph_text my_border">Health Status</div>
                                             <div class="col-md-6 col-xs-6 sh_text"><?php echo $data['prefer_health'];?></div>
                                          </div>
                                          <div class="col-md-6 col-xs-12 no_margin">
                                             <div class="col-md-6 col-xs-6 ph_text my_border">Preferred Gender</div>
                                             <div class="col-md-6 col-xs-6 sh_text"><?php echo $data['prefer_gender'];?></div>
                                          </div>
									</div>		
									<div class="col-md-12 margin_t col-xs-12">
                                          <div class="col-md-6 col-xs-12 no_margin">
                                             <div class="col-md-6 col-xs-6 ph_text my_border">Physique</div>
                                             <div class="col-md-6 col-xs-6 sh_text"><?php echo $data['prefer_body'];?></div>
                                          </div>
                                          <div class="col-md-6 col-xs-12 no_margin">
                                             <div class="col-md-6 col-xs-6 ph_text my_border">Minimum Age</div>
                                             <div class="col-md-6 col-xs-6 sh_text"><?php  if(isset($data['prefer_min_age'])) { echo $data['prefer_min_age']. ' Years';}?></div>
                                          </div>
									</div>	
									<div class="col-md-12 margin_t col-xs-12">
                                          <div class="col-md-6 col-xs-12 no_margin">
                                             <div class="col-md-6 col-xs-6 ph_text my_border">Maximum Age</div>
                                             <div class="col-md-6 col-xs-6 sh_text"><?php  if(isset($data['prefer_max_age'])) { echo $data['prefer_max_age']. ' Years';}?></div>
                                          </div>
                                          <div class="col-md-6 col-xs-12 no_margin">
                                             <div class="col-md-6 col-xs-6 ph_text my_border">Minimum Height</div>
                                             <div class="col-md-6 col-xs-6 sh_text"><?php echo $data['prefer_min_height']. ' feet';?></div>
                                          </div>
									</div>
									<div class="col-md-12 margin_t col-xs-12">
                                          <div class="col-md-6 col-xs-12 no_margin">
                                             <div class="col-md-6 col-xs-6 ph_text my_border">Minimum Height</div>
                                             <div class="col-md-6 col-xs-6 sh_text"><?php echo $data['prefer_max_height']. ' feet';?></div>
                                          </div>
                                          <div class="col-md-6 col-xs-12 no_margin">
                                             <div class="col-md-6 col-xs-6 ph_text my_border">Religion</div>
                                             <div class="col-md-6 col-xs-6 sh_text"><?php echo $data['prefer_religion'];?></div>
                                          </div>
									</div>	
									<div class="col-md-12 margin_t col-xs-12">
                                          <div class="col-md-6 col-xs-12 no_margin">
                                             <div class="col-md-6 col-xs-6 ph_text my_border">Nationality</div>
                                             <div class="col-md-6 col-xs-6 sh_text"><?php echo $data['prefer_nation'];?></div>
                                          </div>
                                          <div class="col-md-6 col-xs-12 no_margin">
                                             <div class="col-md-6 col-xs-6 ph_text my_border">Languages Known</div>
                                             <div class="col-md-6 col-xs-6 sh_text"><?php echo $data['prefer_lang'];?></div>
                                          </div>
									</div>		
									<div class="col-md-12 margin_t col-xs-12">
                                          <div class="col-md-6 col-xs-12 no_margin">
                                             <div class="col-md-6 col-xs-6 ph_text my_border">Native Country</div>
                                             <div class="col-md-6 col-xs-6 sh_text"><?php echo $data['prefer_ncountry'];?></div>
                                          </div>
                                          <div class="col-md-6 col-xs-12 no_margin">
                                             <div class="col-md-6 col-xs-6 ph_text my_border">Native State</div>
                                             <div class="col-md-6 col-xs-6 sh_text"><?php echo $data['prefer_nstate'];?></div>
                                          </div>
									</div>	
									<div class="col-md-12 margin_t col-xs-12">
                                          <div class="col-md-6 col-xs-12 no_margin">
                                             <div class="col-md-6 col-xs-6 ph_text my_border">Native City/Town</div>
                                             <div class="col-md-6 col-xs-6 sh_text"><?php echo $data['prefer_ncity'];?></div>
                                          </div>
                                          <div class="col-md-6 col-xs-12 no_margin">
                                             <div class="col-md-6 col-xs-6 ph_text my_border">Residence Country</div>
                                             <div class="col-md-6 col-xs-6 sh_text"><?php echo $data['prefer_rcountry'];?></div>
                                          </div>
									</div>
								<div class="col-md-12 margin_t col-xs-12">
                                          <div class="col-md-6 col-xs-12 no_margin">
                                             <div class="col-md-6 col-xs-6 ph_text my_border">Residence State</div>
                                             <div class="col-md-6 col-xs-6 sh_text"><?php echo $data['prefer_rstate'];?></div>
                                          </div>
                                          <div class="col-md-6 col-xs-12 no_margin">
                                             <div class="col-md-6 col-xs-6 ph_text my_border">Residence City/Town</div>
                                             <div class="col-md-6 col-xs-6 sh_text"><?php echo $data['prefer_rcity'];?></div>
                                          </div>
									</div>										
							   </div>
							   </div>
						       </div><!--END JOB POSTING PANEL-->
							   
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <!--main content end-->

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