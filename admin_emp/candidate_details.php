<?php
   error_reporting(0);
   include("include/class.user.php");
   $user= new USER();
   if(!$user->is_logged_in()) {
   $user->redirect("../employerlogin.php");
   }
     $id = $_SESSION['EMP_ID'];
     $name = $_SESSION['EMP_name'];
     $uid=$_GET['user_id'];
     $job_id=$_GET['job_id'];
     
   $sql=$user->runQuery("select * from job_users where id='$uid'");
   $sql->execute();
   $rw=$sql->fetch();    
   
   $sql=$user->runQuery("select * from meem_jobs where id='$job_id'");
   $sql->execute();
   $rp=$sql->fetch();  
   
   // short list jobs
   $sql=$user->runQuery("select * from job_applications where emp_id='$id' and job_id='$job_id' and user_id='$uid'");
      $sql->execute();
      $mb=$sql->fetch();
      $count=$sql->rowCount();
    
      
   if($_GET['action']=='shortList')
   {
   
       if($mb['shortlisted']=='') {
           $date=date('Y-m-d');
          $sql=$user->runQuery("update job_applications set shortlisted='yes',shortlisted_date='$date' where user_id='$uid' and job_id='$job_id'")  ; 
          $sql->execute(); 
          ?>
<script>
   window.location.href='candidate_details.php?user_id=<?php echo $uid;?>&job_id=<?php echo $job_id;?>';
      
</script>
<?php   
   }
   }
   
   // delete user applied job
   if($_GET['action']=='delete_job')
   {
   $sql=$user->runQuery("delete from job_applications where job_id='$job_id' and user_id='$uid'");
   $sql->execute(); 
   
   ?>
<script>
   window.location.href='candidates-list.php';
       alert('Resume deleted.');
</script>
<?php
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
      <link rel="stylesheet" href="dist/css/demo.css">
      <!-- endinject -->
      <!-- Main Style  -->
      <link rel="stylesheet" href="dist/css/main.css">
	  <!--summer note-->
      <link rel="stylesheet" href="bower_components/summernote/dist/summernote.css">
      <script src="assets/js/modernizr-custom.js"></script>
     <script src="bower_components/jquery/dist/jquery.min.js"></script>
   </head>
   <body>
      <div id="ui" class="ui">
         <!--header start-->
         <?php include 'include/sidebar.php';?>
         <!--header end-->
         <!--main content start-->
         <div id="content" class="ui-content ">
            <div class="ui-content-body">
               <div class="ui-container">
                  <div class="row">
                     <div class="col-md-12">
                        <div class="panel profile-wrap">
                           <header class="panel-heading clearfix">
                              <h3 class="profile-title pull-left" style="margin-top:8px;"><?php if($mb['shortlisted']=='yes') { echo 'ShortListed';} ?> Candidate Profile</h3>
                              <div class="pull-right" style="margin-top:10px;">
                                 <?php if($mb['shortlisted']=='' && !empty($job_id)) { ?>
                                 <a href="candidate_details.php?user_id=<?php echo $uid;?>&job_id=<?php echo $job_id;?>&action=shortList" class="btn btn-sm btn-success"><i class="fa fa-thumbs-o-up"></i> Shortlist</a>
                                 <?php } if($mb['shortlisted']!='') { ?>
                                 <span class="btn btn-sm btn-success"><i class="fa fa-check" aria-hidden="true"></i> ShortListed</span>
                                 <?php } ?>
                                 <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal"><i class="fa fa-paper-plane"></i>  Mail for Interview</button>
                                 <div class="modal" id="myModal">
                                    <div class="modal-dialog">
                                       <div class="modal-content">
                                          <!-- Modal Header -->
                                          <div class="modal-header">
                                             <h4 class="modal-title">Send a mail for interview</h4>
                                             
                                             <button type="button" class="close" data-dismiss="modal">&times;</button>
                                             
                                          </div>
                                          <div id="msgok"></div>
                                          
                                           <script>
                                       $(document).ready(function(){
                                       $("#mailForm").submit(function(event) {
                                         event.preventDefault();  
                                         var valid=validate();   
                                         if(valid) {
                                         var job_id=$("#job_id").val();
                                         var uid=$("#uid").val();
                                       
                                        var data=$("#mailForm").serialize();
                                        $.ajax ({
                                          type: 'post',
                                          url : 'sendMail.php',
                                          data : data,
                                          
                                          success : function(response)
                                          { 
                                        
                                              if(response=='ok') {
                                                $("#msgok").html("<div  style='background:green;color:#fff;font-size: 18px;padding:8px 10px; font-family: Calibri'><i class='fa fa-check-square' aria-hidden='true'></i> Your Mail has been sent successfully.</div>");  
                                               setTimeout(function() { window.location='candidate_details.php?user_id='+uid+'&job_id='+job_id;},1200);    
                                               //window.location.href='appliedjobs.php';   
                                              } else {
                                            $("#error").html(response);
                                          }
                                        }
                                       
                                         });
                                       }
                                       });
                                     });
                                     function validate()
                                      { var valid=true;
                                       
                                         if(!$("#subject").val())  { $("#subject").css('border','1px solid #EA9898'); valid=false; }  
                                         var message=document.forms['mailForm']['message'].value;
                                         if($("#subject").val()) {
                                         if(message=='') { error2.innerHTML='Please enter message.';  valid=false;  }
                                     }
                                         return valid;
                                      }
                                      </script>
                                          
                                          <!-- Modal body -->
                                          <div class="modal-body">
                                              <form role="form" id="mailForm" name="mailForm" method="post">
                                                  <input type="hidden" name="job_id" id="job_id" value="<?php echo $job_id;?>">
                                                   <input type="hidden" name="uid" id="uid" value="<?php echo $uid;?>">
                                                  <div class="col-md-12">
                                                <label>Candidate Name <span class="red">*</span></label>
                                                  <input type="text" value="<?php echo $rw['name'];?>"  name="name" class="form-control no_radius" readonly="">
                                                  </div>
                                                <div class="col-md-12">
                                                   <label>Email <span class="red">*</span></label>
                                                   <input type="email" value="<?php echo $rw['email'];?>"  name="email" id="email" class="form-control no_radius" readonly="">
                                                </div>
                                                <div class="col-md-12" style="margin-top:8px;">
                                                   <label>Subject <span class="red">*</span></label>
                                                   <input type="text"  name="subject" class="form-control no_radius" id="subject">
                                                </div>
                                                <div class="col-md-12" style="margin-top:8px;">
                                                    <textarea id="summernote" name="message"></textarea>
                                                    <div id="error2" style="color: lightcoral"></div>
                                                </div>
                                                <div class="col-md-6 mmargin_tt col-md-push-5">
                                                   <input type="Submit" class="btn btn-info" value="Send Mail">
                                                </div>
                                             </form>
                                          </div>
                                          <div class="clearfix"></div>
                                          <!-- Modal footer -->
                                          <div class="modal-footer" style="margin-bottom:5px;">
                                             <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <?php if(!empty($job_id)) { ?>
                                   <a href="candidate_details.php?user_id=<?php echo $uid;?>&job_id=<?php echo $job_id;?>&action=delete_job" class="btn btn-sm btn-danger dele" onClick="return confirm('Are you sure to delete user applied job ?')"><i class="fa fa-trash-o"></i> Delete</a>
                                 <?php } ?>  
                              </div>
                           </header>
                           <div class="panel-body row">
                              <div class="col-md-12">
                                   <?php if($mb['mail_sent']=='yes') { 
                                    $date=$mb['sent_date'];
                                    $day=date('d',strtotime($date));
                                     $Day=date('D',strtotime($date));
                                    $month=date('M',strtotime($date));
                                     $year=date('Y',strtotime($date));
                                     $time=date('H:i A',strtotime($date));
                                    ?>
                                  <p style="color:green; padding: 5px 10px;">Mail sent on : <?php echo $Day.', '.$day. ' '.$month.', '.$year.', '.$time;?> </p>
                                  <?php } ?>
                                 <div class="col-md-3">
								 <div class="row">
                                <img src="imgs/profile.jpg" class="thumbnail"/></div>
								<div class="row">
								  <div class="col-md-12 bio_p">
                                    <div class="profile-info">
                                       <h5>Contact Information</h5>
                                       <ul class="list-unstyled">
                                          <li>
                                             <i class="fa fa-mobile"></i>
                                             <div class="p-i-list">
                                                <span class="text-muted">Mobile Number</span>
                                                <span class="user_contact"> <?php echo $rw['mcode'].$rw['mobile'];?></span>
                                             </div>
                                          </li>
                                          <li>
                                             <i class="fa fa-envelope-o"></i>
                                             <div class="p-i-list">
                                                <span class="text-muted">E-mail</span>
                                                <span class="user_contact"> <?php echo $rw['email'];?></span>
                                             </div>
                                          </li>
                                          <li>
                                             <i class="fa fa-linkedin-square"></i>
                                             <div class="p-i-list">
                                                <span class="text-muted">LinkedIn </span>
                                                <span class="user_contact"> <a href="#"><?php echo $rw['link'];?></a> <br>
                                                </span>
                                             </div>
                                          </li>
										  <li>
                                             <i class="fa fa-facebook-square"></i>
                                             <div class="p-i-list">
                                                <span class="text-muted">Facebook </span>
                                                <span class="user_contact"> <a href="#"><?php echo $rw['link'];?></a> <br>
                                                </span>
                                             </div>
                                          </li>
										 <div class="profile-info">
                                       <h5 class="about_me">Other details:</h5>
                                       <p  class="text-justify text-admin">
                                          <?php echo $rw['description'];?>  
                                       </p>
                                    </div>
                                       </ul>
                                    </div>

                                 </div>
								</div>
                                 </div>
<div class="col-md-9 bio_p">
                              
                                  
                                    <div class="row">
									  <h4 class="name_p"><?php echo $rw['name'];?></h4>
                                       <div class="col-md-12 col-xs-12 margin_t porile_bg"><i class="fa fa-user-circle-o"></i> General Information</div>
                                       <div class="col-md-12 margin_t col-xs-12">
                                          <div class="col-md-6 col-xs-12 no_margin">
                                             <div class="col-md-6 col-xs-6 ph_text my_border">Gender</div>
                                             <div class="col-md-6 col-xs-6 sh_text"><?php echo $rw['gender'];?></div>
                                          </div>
                                          <div class="col-md-6 col-xs-12 no_margin">
                                             <div class="col-md-6 col-xs-6 ph_text my_border">Date of Birth</div>
                                             <div class="col-md-6 col-xs-6 sh_text">19-6-1990</div>
                                          </div>
                                       </div>
                                       <div class="col-md-12 margin_t col-xs-12">
                                          <div class="col-md-6 col-xs-12 no_margin">
                                             <div class="col-md-6 col-xs-6 ph_text my_border">Marital Status</div>
                                             <div class="col-md-6 col-xs-6 sh_text">Unmarried</div>
                                          </div>
                                          <div class="col-md-6 col-xs-12 no_margin">
                                             <div class="col-md-6 col-xs-6 ph_text my_border">Physique</div>
                                             <div class="col-md-6 col-xs-6 sh_text">Healthy</div>
                                          </div>
                                       </div>
                                       <div class="col-md-12 margin_t col-xs-12">
                                          <div class="col-md-6 col-xs-12 no_margin">
                                             <div class="col-md-6 col-xs-6 ph_text my_border">Health </div>
                                             <div class="col-md-6 col-xs-6 sh_text">Healthy</div>
                                          </div>
                                          <div class="col-md-6 col-xs-12 no_margin">
                                             <div class="col-md-6 col-xs-6 ph_text my_border">Religion </div>
                                             <div class="col-md-6 col-xs-6 sh_text">Hindu</div>
                                          </div>
                                       </div>
                                       <div class="col-md-12 margin_t col-xs-12">
                                          <div class="col-md-6 col-xs-12 no_margin">
                                             <div class="col-md-6 col-xs-6 ph_text my_border">Height </div>
                                             <div class="col-md-6 col-xs-6 sh_text">5ft 2in</div>
                                          </div>
                                          <div class="col-md-6 col-xs-12 no_margin">
                                             <div class="col-md-6 col-xs-6 ph_text my_border">Native Country</div>
                                             <div class="col-md-6 col-xs-6 sh_text">India</div>
                                          </div>
                                       </div>
                                       <div class="col-md-12 margin_t col-xs-12">
                                          <div class="col-md-6 col-xs-12 no_margin">
                                             <div class="col-md-6 col-xs-6 ph_text my_border">Native State</div>
                                             <div class="col-md-6 col-xs-6 sh_text">Telangana</div>
                                          </div>
                                          <div class="col-md-6 col-xs-12 no_margin">
                                             <div class="col-md-6 col-xs-6 ph_text my_border">Native City</div>
                                             <div class="col-md-6 col-xs-6 sh_text">Hyderabad</div>
                                          </div>
                                       </div>
                                       <div class="col-md-12 margin_t col-xs-12">
                                          <div class="col-md-6 col-xs-12 no_margin">
                                             <div class="col-md-6 col-xs-6 ph_text my_border">Residence Country</div>
                                             <div class="col-md-6 col-xs-6 sh_text">Saudi Arabia</div>
                                          </div>
										     <div class="col-md-6 col-xs-12 no_margin">
                                             <div class="col-md-6 col-xs-6 ph_text my_border">Residence State</div>
                                             <div class="col-md-6 col-xs-6 sh_text">Riyadh</div>
                                          </div>
                                       </div>
									     <div class="col-md-12 margin_t col-xs-12">
                                          <div class="col-md-6 col-xs-12 no_margin">
                                             <div class="col-md-6 col-xs-6 ph_text my_border">Residence City</div>
                                             <div class="col-md-6 col-xs-6 sh_text">Riyadh</div>
                                          </div>
										  <div class="col-md-6 col-xs-12 no_margin">
                                             <div class="col-md-6 col-xs-6 ph_text my_border">Nationality</div>
                                             <div class="col-md-6 col-xs-6 sh_text">India</div>
                                          </div>
                                       </div>
									   <div class="col-md-12 margin_t col-xs-12">
                                          <div class="col-md-6 col-xs-12 no_margin">
                                             <div class="col-md-6 col-xs-6 ph_text my_border">Native Language</div>
                                             <div class="col-md-6 col-xs-6 sh_text">Urdu</div>
                                       </div>
                                    </div>
									</div>
                                    <!-- End row -->
                                   <div class="row">
									<div class="col-md-12 col-xs-12 margin_t porile_bg"><i class="fa fa-graduation-cap"></i> Education & Career</div>
                                       <div class="col-md-12 margin_t col-xs-12">
                                          <div class="col-md-6 col-xs-12 no_margin">
                                             <div class="col-md-8 col-xs-6 ph_text my_border">Education</div>
                                             <div class="col-md-4 col-xs-6 sh_text"><?php echo $rw['education'];?></div>
                                          </div>
                                          <div class="col-md-6 col-xs-12 no_margin">
                                             <div class="col-md-8 col-xs-6 ph_text my_border">Company/Industry/Organization work</div>
                                             <div class="col-md-4 col-xs-6 sh_text mar_col"><?php echo $rw['industry'];?></div>
                                          </div>
                                       </div>
                                       <div class="col-md-12 margin_t col-xs-12">
                                          <div class="col-md-6 col-xs-12 no_margin">
                                             <div class="col-md-8 col-xs-6 ph_text my_border">Total years of work experience </div>
                                             <div class="col-md-4 col-xs-6 sh_text mar_col">10 Years</div>
                                          </div>
                                          <div class="col-md-6 col-xs-12 no_margin">
                                             <div class="col-md-8 col-xs-6 ph_text my_border">Main Skills / Job Positions</div>
                                             <div class="col-md-4 col-xs-6 sh_text mar_col">PHP Developer</div>
                                          </div>
                                       </div>
									     <div class="col-md-12 margin_t col-xs-12">
                                          <div class="col-md-6 col-xs-12 no_margin">
                                             <div class="col-md-8 col-xs-6 ph_text my_border">Year of Experience</div>
                                             <div class="col-md-4 col-xs-6 sh_text">12 Years</div>
                                          </div>
                                          <div class="col-md-6 col-xs-12 no_margin">
                                             <div class="col-md-8 col-xs-6 ph_text my_border">Languages Known</div>
                                             <div class="col-md-4 col-xs-6 sh_text">English <span class="lang_k">(Read,write,speak)</span>, Hindi <span class="lang_k">(Read,write)</span></div>
                                          </div>
                                       </div>
                                       <div class="col-md-12 margin_t col-xs-12">
                                          <div class="col-md-6 col-xs-12 no_margin">
                                             <div class="col-md-8 col-xs-6 ph_text my_border">Current Earning</div>
                                             <div class="col-md-4 col-xs-6 sh_text"><?php echo $rw['current_salary'];?> INR</div>
                                          </div>
                                          <div class="col-md-6 col-xs-12 no_margin">
                                             <div class="col-md-8 col-xs-6 ph_text my_border">Main Skills / Job Positions</div>
                                             <div class="col-md-4 col-xs-6 sh_text mar_col">PHP Developer</div>
                                          </div>
                                       </div>
									     <div class="col-md-12 margin_t col-xs-12">
                                          <div class="col-md-6 col-xs-12 no_margin">
                                             <div class="col-md-8 col-xs-6 ph_text my_border">Current / Last Position held</div>
                                             <div class="col-md-4 col-xs-6 sh_text mar_col">Web Developer</div>
                                          </div>
                                          <div class="col-md-6 col-xs-12 no_margin">
                                             <div class="col-md-8 col-xs-6 ph_text my_border">Are you willing to travel?</div>
                                             <div class="col-md-4 col-xs-6 sh_text mar_col">Yes 50% only</div>
                                          </div>
                                       </div>
									   </div>
                                    <!-- End row -->
									<div class="row">
									<div class="col-md-12 col-xs-12 margin_t porile_bg"><i class="fa fa-address-card"></i> Job Preferences Details</div>
                                       <div class="col-md-12 margin_t col-xs-12">
                                          <div class="col-md-6 col-xs-12 no_margin">
                                             <div class="col-md-8 col-xs-6 ph_text my_border">Preferred industry/company/organization</div>
                                             <div class="col-md-4 col-xs-6 sh_text mar_col">IT, Sales & Marketing</div>
                                          </div>
                                          <div class="col-md-6 col-xs-12 no_margin">
                                             <div class="col-md-8 col-xs-6 ph_text my_border">Preferred Work Designation </div>
                                             <div class="col-md-4 col-xs-6 sh_text mar_col">Manager, Programmer, Developer</div>
                                          </div>
                                       </div>
                                       <div class="col-md-12 margin_t col-xs-12">
                                          <div class="col-md-6 col-xs-12 no_margin">
                                             <div class="col-md-8 col-xs-6 ph_text my_border">Preferred Job Type </div>
                                             <div class="col-md-4 col-xs-6 sh_text">Full Time</div>
                                          </div>
                                          <div class="col-md-6 col-xs-12 no_margin">
                                             <div class="col-md-8 col-xs-6 ph_text my_border">Preferred country for work</div>
                                             <div class="col-md-4 col-xs-6 sh_text mar_col">India, Saudi Arabia</div>
                                          </div>
                                       </div>
									     <div class="col-md-12 margin_t col-xs-12">
                                          <div class="col-md-6 col-xs-12 no_margin">
                                             <div class="col-md-8 col-xs-6 ph_text my_border">Preferred State</div>
                                             <div class="col-md-4 col-xs-6 sh_text">Telangana, Riyadh</div>
                                          </div>
                                          <div class="col-md-6 col-xs-12 no_margin">
                                             <div class="col-md-8 col-xs-6 ph_text my_border">Preferred City</div>
                                             <div class="col-md-4 col-xs-6 sh_text">Hyderabad, Riyadh</div>
                                          </div>
                                       </div>
									   </div>
                                    <!-- End row -->
								<div class="row">
									<div class="col-md-12 col-xs-12 margin_t porile_bg"><i class="fa fa-file-text-o"></i> Resume & ID Proof</div>
                               <div class="col-md-6 bio_p">
                                    <div class="resume_d">
                                       <iframe class="doc" src="https://docs.google.com/gview?url=http://ridaits.com/meemJob/images/resume/<?php echo $rw['resume'];?>&embedded=true" height="350"></iframe>
                                    </div>
                                   IF you want to download resume <a href="../images/resume/<?php echo $rw['resume'];?>" class="btn btn-primary"><i class="fa fa-download"></i> Download </a>
                                 </div>
                                 <div class="col-md-6 id_mar"><img src="imgs/id.png" /></div>
				
									</div>
                                    <!-- End row -->
                                    <?php if(!empty($job_id)) { ?>
                                    <div class="row">
                                       <div class="col-md-12 col-xs-12 margin_t applyjob_bg"><i class="fa fa-suitcase"></i> Applied for the Job</div>
                                       <div class="col-md-12 margin_t col-xs-12">
                                          <div class="col-md-6 col-xs-12 no_margin">
                                             <div class="col-md-6 col-xs-6 ph_text my_border">Company Name</div>
                                             <div class="col-md-6 col-xs-6 sh_text"><span class="space_p"><?php echo $rp['company_name'];?></span></div>
                                          </div>
                                          <div class="col-md-6 col-xs-12 no_margin">
                                             <div class="col-md-6 col-xs-6 ph_text my_border">Position for</div>
                                             <div class="col-md-6 col-xs-6 sh_text"><?php echo $rp['job_title'];?></div>
                                          </div>
                                       </div>
                                       <div class="col-md-12 margin_t col-xs-12">
                                          <div class="col-md-6 col-xs-12 no_margin">
                                             <div class="col-md-6 col-xs-6 ph_text my_border">Job Type</div>
                                             <div class="col-md-6 col-xs-6 sh_text"><span class="space_p"><?php echo $rp['job_type'];?></span></div>
                                          </div>
                                          <div class="col-md-6 col-xs-12 no_margin">
                                             <div class="col-md-6 col-xs-6 ph_text my_border">Experience</div>
                                             <div class="col-md-6 col-xs-6 sh_text"><?php if(!empty($rp['min_exp'])) { echo $rp['min_exp']. ' - '.$rp['max_exp'].  ' yrs Exp' ; } else { echo 'Fresher';} ?></div>
                                          </div>
                                       </div>
                                       <div class="col-md-12 margin_t col-xs-12">
                                          <div class="col-md-6 col-xs-12 no_margin">
                                             <div class="col-md-6 col-xs-6 ph_text my_border">Industry</div>
                                             <div class="col-md-6 col-xs-6 sh_text"><span class="space_p"><?php echo $rp['industry'];?></span></div>
                                          </div>
                                          <div class="col-md-6 col-xs-12 no_margin">
                                             <div class="col-md-6 col-xs-6 ph_text my_border">Role</div>
                                             <div class="col-md-6 col-xs-6 sh_text"><?php echo $rp['job_role'];?></div>
                                          </div>
                                       </div>
                                       <div class="col-md-12 margin_t col-xs-12">
                                          <div class="col-md-6 col-xs-12 no_margin">
                                             <div class="col-md-6 col-xs-6 ph_text my_border">Education</div>
                                             <div class="col-md-6 col-xs-6 sh_text"><span class="space_p"> <?php echo $rp['qualification'];?></span></div>
                                          </div>
                                          <div class="col-md-6 col-xs-12 no_margin">
                                             <div class="col-md-6 col-xs-6 ph_text my_border">Key Skills</div>
                                             <div class="col-md-6 col-xs-6 sh_text"><?php echo $rp['key_skills'];?></div>
                                          </div>
                                       </div>
                                       <div class="col-md-12 margin_t col-xs-12">
                                          <div class="col-md-6 col-xs-12 no_margin">
                                             <div class="col-md-6 col-xs-6 ph_text my_border">Country</div>
                                             <div class="col-md-6 col-xs-6 sh_text"><span class="space_p"><?php echo $rp['country'];?></span></div>
                                          </div>
                                          <div class="col-md-6 col-xs-12 no_margin">
                                             <div class="col-md-6 col-xs-6 ph_text my_border">City</div>
                                             <div class="col-md-6 col-xs-6 sh_text"><?php echo $rp['city'];?></div>
                                          </div>
                                       </div>
                                    </div>
                                    <?php } ?>
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
            2018 &copy; MeeM.one
         </div>
         <!--footer end-->
      </div>
      <!-- inject:js -->
    
      <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
      <script src="bower_components/jquery.nicescroll/dist/jquery.nicescroll.min.js"></script>
      <script src="bower_components/autosize/dist/autosize.min.js"></script>
      <!-- Common Script   -->
      <script src="dist/js/main.js"></script>
      <!--summer note-->
      <script src="bower_components/summernote/dist/summernote.js"></script>
      <script>
         $(document).ready(function() {
         
             $('#summernote').summernote({
                 height: 230,                 // set editor height
                 minHeight: null,             // set minimum height of editor
                 maxHeight: null,             // set maximum height of editor
                 focus: true                  // set focus to editable area after initializing summernote
             });
         
         });
      </script>
   </body>
</html>