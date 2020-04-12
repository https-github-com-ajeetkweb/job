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
      <!-- Select2 Dependencies -->
      <link rel="stylesheet" href="bower_components/select2/dist/css/select2.min.css">
      <!-- Main Style  -->
      <link rel="stylesheet" href="dist/css/main.css">
      <!--summer note-->
      <link rel="stylesheet" href="bower_components/summernote/dist/summernote.css">
      <script src="assets/js/modernizr-custom.js"></script>
      <script src="bower_components/jquery/dist/jquery.min.js"></script>
      <link rel="stylesheet" href="dist/css/main.min.css">
      <link href="dist/css/fSelect.css" rel="stylesheet">
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
                              <h3 class="profile-title pull-left" style="margin-top:8px;">Created Jobs</h3>
                              <div class="pull-right" style="margin-top:10px;">
                                 ddd
                              </div>
                           </header>
                           <div class="panel-body row">
                              <div class="col-md-12">
                                 <div class="col-md-3">
                                    <div class="row">
                                       <div class="col-md-12 bio_p">
                                          <div class="profile-info">
                                             <h5>Contact Information <a href="#" data-toggle="modal" data-target="#myModa2"><i class="fa fa-pencil-square-o icon_3"></i> Edit</a></h5>
                                             <!-- Modal -->
                                             <div class="modal fade" id="myModa2" role="dialog">
                                                <div class="modal-dialog">
                                                   <!-- Modal content-->
                                                   <div class="modal-content">
                                                      <div class="modal-header">
                                                         <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                         <h4 class="modal-title">Edit Contact Details</h4>
                                                      </div>
                                                      <div class="modal-body">
                                                         <form role="form"  method="post" id="editForm1">
                                                            <div class="row ">
                                                               <div class="col-md-6">
                                                                  <div class="input-wrap">
                                                                     <label>Contact Person Email</label>
                                                                     <input type="email" name="email" placeholder="" class="form-control">
                                                                  </div>
                                                               </div>
                                                               <div class="col-md-6">
                                                                  <div class="input-wrap">
                                                                     <label>Contact Person Mobile Number</label>
                                                                     <input type="tel" name="mobile" placeholder="Type your mobile number" class="form-control" onKeyPress="return isNumberKey(event)" maxlength="10">
                                                                  </div>
                                                               </div>
                                                            </div>
                                                            <div class="row margin_10">
                                                               <div class="col-md-6">
                                                                  <div class="input-wrap">
                                                                     <label>Company Website </label>
                                                                     <input type="text" name="weblink" placeholder="Type your Company Website(URL)" class="form-control">
                                                                  </div>
                                                               </div>
                                                               <div class="col-md-6">
                                                                  <div class="input-wrap">
                                                                     <label>Company Address </label>
                                                                     <div class="form-group">
                                                                        <textarea class="form-control" name="address" rows="1" placeholder=""></textarea>
                                                                     </div>
                                                                  </div>
                                                               </div>
                                                            </div>
                                                            <div class="col-md-5 mmargin_tt col-md-push-4 col-xs-push-4" style="margin-top:8px;">
                                                               <input type="Submit" name="setting" class="btn btn-success" value="Save changes">
                                                            </div>
                                                         </form>
                                                         <div class="clearfix"></div>
                                                      </div>
                                                      <div class="modal-footer">
                                                         <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                             <ul class="list-unstyled">
                                                <li>
                                                   <i class="fa fa-mobile"></i>
                                                   <div class="p-i-list">
                                                      <span class="job_user">Mobile Number</span>
                                                      <span class="user_job"> 9865984545</span>
                                                   </div>
                                                </li>
                                                <li>
                                                   <i class="fa fa-envelope-o"></i>
                                                   <div class="p-i-list">
                                                      <span class="job_user">E-mail</span>
                                                      <span class="user_job"> ajitxyz@gmail.com</span>
                                                   </div>
                                                </li>
                                                <li>
                                                   <i class="fa fa-link"></i>
                                                   <div class="p-i-list">
                                                      <span class="job_user">Website </span>
                                                      <span class="user_job"> www.xyzzddddz.omc <br>
                                                      </span>
                                                   </div>
                                                </li>
                                                <li>
                                                   <i class="fa fa-map-marker"></i>
                                                   <div class="p-i-list">
                                                      <span class="job_user">Company Address </span>
                                                      <span class="user_contact"> 186/66/55 XYZ Road, Hyd <br>
                                                      </span>
                                                   </div>
                                                </li>
                                             </ul>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-md-9 bio_p">
                                    <div class="row">
                                       <h4 class="name_p">Rida ITS</h4>
                                       <div class="col-md-12 col-xs-12 margin_t job_pro">
                                          <div class="col-md-6 col-xs-6 bio_p"><i class="fa fa-user-circle-o"></i> Job Details</div>
                                          <div class="col-md-3 pull-right"><a href="#" data-toggle="modal" data-target="#myModal1"><i class="fa fa-pencil-square-o icon_3"></i> Edit</a> </div>
                                       </div>
                                       <!-- Modal -->
                                       <div class="modal fade" id="myModal1" role="dialog">
                                          <div class="modal-dialog">
                                             <!-- Modal content-->
                                             <div class="modal-content">
                                                <div class="modal-header">
                                                   <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                   <h4 class="modal-title">Modal Header</h4>
                                                </div>
                                                <div class="modal-body">
                                                   <form role="form"  method="post" id="editForm2">
                                                      <div class="row">
                                                         <div class="col-md-6">
                                                            <div class="input-wrap">
                                                               <label>Date of Posting <span class="red">*</span> <span data-toggle="tooltip" title="Select date of this job posting. (Future date will make this job post as scheduled and will be posted as per selected date)."><i class="fa fa-info-circle tool_tip"></i></span></label>
                                                               <div id="datepicker" class="input-group date" data-date-format="mm-dd-yyyy">
                                                                  <input class="form-control" type="text" readonly />
                                                                  <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                                                               </div>
                                                            </div>
                                                         </div>
                                                         <div class="col-md-6">
                                                            <div class="input-wrap">
                                                               <label>Job Type <span data-toggle="tooltip" title="Select type of job."><i class="fa fa-info-circle tool_tip"></i></span></label>
                                                               <select class="form-control" name="job_type" id="job_type">
                                                                  <option value="" selected="selected">-- Select--</option>
                                                                  <option value="Full Time">Full Time</option>
                                                                  <option value="Part Time">Part Time</option>
                                                                  <option value="Freelancer">Freelancer</option>
                                                               </select>
                                                            </div>
                                                         </div>
                                                      </div>
                                                      <div class="row margin_10">
                                                         <div class="col-md-6">
                                                            <div class="input-wrap">
                                                               <label>Industry/Company/Organization  <span data-toggle="tooltip" title="Select type of company or industry or organisation."><i class="fa fa-info-circle tool_tip"></i></span></label>
                                                               <select name="industry" id="industry" class="form-control">
                                                                  <option value="">Select Industry</option>
                                                                  <?php 
                                                                     $sql = $user->runQuery("select * from industry");
                                                                     $sql->execute();
                                                                     $rw=$sql->fetchAll();
                                                                     foreach($rw as $row) {
                                                                     ?>
                                                                  <option value="<?php echo $row['name'];?>"><?php echo $row['name'];?></option>
                                                                  <?php } ?>
                                                               </select>
                                                            </div>
                                                         </div>
                                                         <div class="col-md-6">
                                                            <label>This job need travel select % <span data-toggle="tooltip" title="Select approximate % of travel in this job. Ignore or keep zero % if no travel needed."><i class="fa fa-info-circle tool_tip"></i></span></label>
                                                            <div class="range-slider">
                                                               <input class="range-slider__range" type="range" id="range" value="0" min="0" max="100">
                                                               <span class="range-slider__value">0</span> 
                                                            </div>
                                                         </div>
                                                      </div>
                                                      <div class="row margin_10">
                                                         <div class="col-md-6">
                                                            <div class="input-wrap">
                                                               <label>About Company <span data-toggle="tooltip" title="Enter brief about this company."><i class="fa fa-info-circle tool_tip"></i></span></label>
                                                               <div class="form-group">
                                                                  <textarea class="form-control" name="about" id="about" placeholder="" rows="1" maxlength="500"></textarea>
                                                               </div>
                                                            </div>
                                                         </div>
                                                         <div class="col-md-6">
                                                            <div class="input-wrap">
                                                               <label>Job Description  <span data-toggle="tooltip" title="Enter this job brief description."><i class="fa fa-info-circle tool_tip"></i></span></label>
                                                               <div class="form-group">
                                                                  <textarea class="form-control" placeholder="Job Description" maxlength="200" name="jobdesc" rows="1" id="jobdesc"></textarea>
                                                               </div>
                                                            </div>
                                                         </div>
                                                      </div>
                                                      <div class="row margin_10">
                                                         <div class="col-md-4">
                                                            <div class="input-wrap">
                                                               <label>Salary Currency <span class="red">*</span> <span data-toggle="tooltip" title="Select currency in which you pay for this job."><i class="fa fa-info-circle tool_tip"></i></span></label>
                                                               <select id="currency" name="currency" class="form-control rstate">
                                                                  <option value="" selected="selected">--Select--</option>
                                                                  <option value="INR">INR</option>
                                                               </select>
                                                            </div>
                                                         </div>
                                                         <div class="col-md-4"> 
                                                            <label>Minimum Salary <span class="red">*</span> <span data-toggle="tooltip" title="Select approximate minimum salary per annum, you are willing to pay for this job in selected currency."><i class="fa fa-info-circle tool_tip"></i></span></label>
                                                            <input type="text" id="test" name="minsalary" class="form-control">
                                                         </div>
                                                         <div class="col-md-4">
                                                            <label>Maximum Salary <span class="red">*</span> <span data-toggle="tooltip" title="Select approximate maximum salary per annum, you are willing to pay for this job in selected currency."><i class="fa fa-info-circle tool_tip"></i></span></label>
                                                            <input type="text" id="test1" name="maxsalary" class="form-control">
                                                         </div>
                                                      </div>
                                                      <div class="row margin_10">
                                                         <div class="col-md-4">
                                                            <label>Job Location Country <span class="red">*</span> <span data-toggle="tooltip" title="Select country where this job exists."><i class="fa fa-info-circle tool_tip"></i></span></label>
                                                            <select class="test" multiple="multiple" id="joblocation" name="joblocation">
                                                               <option value="India">India </option>
                                                               <option value="USA">USA</option>
                                                            </select>
                                                            </select>
                                                         </div>
                                                         <div class="col-md-4">
                                                            <label>State <span class="red">*</span> <span data-toggle="tooltip" title="Select state where this job exists."><i class="fa fa-info-circle tool_tip"></i></span></label>
                                                            <select class="test" multiple="multiple" id="jobstate" name="jobstate">
                                                               <option value="India">India </option>
                                                               <option value="USA">USA</option>
                                                            </select>
                                                         </div>
                                                         <div class="col-md-4">
                                                            <label>City/Town <span class="red">*</span> <span data-toggle="tooltip" title="Select city/town where this job exists."><i class="fa fa-info-circle tool_tip"></i></span></label>
                                                            <select class="test" multiple="multiple" id="jobcity" name="jobcity">
                                                               <option value="India">India </option>
                                                               <option value="USA">USA</option>
                                                            </select>
                                                         </div>
                                                      </div>
                                                      <div class="col-md-5 mmargin_tt col-md-push-4 col-xs-push-4" style="margin-top:8px;">
                                                         <input type="Submit" name="setting" class="btn btn-success" value="Save changes">
                                                      </div>
                                                   </form>
                                                   <div class="clearfix"></div>
                                                </div>
                                                <div class="modal-footer">
                                                   <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="col-md-12 margin_t col-xs-12">
                                          <div class="col-md-6 col-xs-12 no_margin">
                                             <div class="col-md-8 col-xs-6 ph_text my_border">Date of Posting </div>
                                             <div class="col-md-4 col-xs-6 sh_text">26-8-2019</div>
                                          </div>
                                          <div class="col-md-6 col-xs-12 no_margin">
                                             <div class="col-md-8 col-xs-6 ph_text my_border">Industry/Company/Organization </div>
                                             <div class="col-md-4 col-xs-6 sh_text">Manufacturing</div>
                                          </div>
                                       </div>
                                       <div class="col-md-12 margin_t col-xs-12">
                                          <div class="col-md-6 col-xs-12 no_margin">
                                             <div class="col-md-8 col-xs-6 ph_text my_border">Job Code </div>
                                             <div class="col-md-4 col-xs-6 sh_text">D4999</div>
                                          </div>
                                          <div class="col-md-6 col-xs-12 no_margin">
                                             <div class="col-md-8 col-xs-6 ph_text my_border">Job Type </div>
                                             <div class="col-md-4 col-xs-6 sh_text">Full Time</div>
                                          </div>
                                       </div>
                                       <div class="col-md-12 margin_t col-xs-12">
                                          <div class="col-md-6 col-xs-12 no_margin">
                                             <div class="col-md-8 col-xs-6 ph_text my_border">Job Title</div>
                                             <div class="col-md-4 col-xs-6 sh_text">Android Developer</div>
                                          </div>
                                          <div class="col-md-6 col-xs-12 no_margin">
                                             <div class="col-md-8 col-xs-6 ph_text my_border">Job Role</div>
                                             <div class="col-md-4 col-xs-6 sh_text">Developer</div>
                                          </div>
                                       </div>
                                       <div class="col-md-12 margin_t col-xs-12">
                                          <div class="col-md-6 col-xs-12 no_margin">
                                             <div class="col-md-8 col-xs-6 ph_text my_border">Job Description</div>
                                             <div class="col-md-4 col-xs-6 sh_text">sdfsd sdfsd sdfs dfsd sgdfgfd dfg dfgdf df dummy text</div>
                                          </div>
                                          <div class="col-md-6 col-xs-12 no_margin">
                                             <div class="col-md-8 col-xs-6 ph_text my_border">About Company</div>
                                             <div class="col-md-4 col-xs-6 sh_text">sdfsd sdfsd sdfs dfsd sgdfgfd dfg dfgdf df dummy text</div>
                                          </div>
                                       </div>
                                       <div class="col-md-12 margin_t col-xs-12">
                                          <div class="col-md-6 col-xs-12 no_margin">
                                             <div class="col-md-8 col-xs-6 ph_text my_border">Salary Currency</div>
                                             <div class="col-md-4 col-xs-6 sh_text">INR</div>
                                          </div>
                                          <div class="col-md-6 col-xs-12 no_margin">
                                             <div class="col-md-8 col-xs-6 ph_text my_border">Minimum Salary</div>
                                             <div class="col-md-4 col-xs-6 sh_text">5,000,00</div>
                                          </div>
                                       </div>
                                       <div class="col-md-12 margin_t col-xs-12">
                                          <div class="col-md-6 col-xs-12 no_margin">
                                             <div class="col-md-8 col-xs-6 ph_text my_border">Maximum Salary</div>
                                             <div class="col-md-4 col-xs-6 sh_text">6,000,00</div>
                                          </div>
                                          <div class="col-md-6 col-xs-12 no_margin">
                                             <div class="col-md-8 col-xs-6 ph_text my_border">Numbers of Positions</div>
                                             <div class="col-md-4 col-xs-6 sh_text">1</div>
                                          </div>
                                       </div>
                                       <div class="col-md-12 margin_t col-xs-12">
                                          <div class="col-md-6 col-xs-12 no_margin">
                                             <div class="col-md-8 col-xs-6 ph_text my_border">Job Location Country</div>
                                             <div class="col-md-4 col-xs-6 sh_text">India</div>
                                          </div>
                                          <div class="col-md-6 col-xs-12 no_margin">
                                             <div class="col-md-8 col-xs-6 ph_text my_border">State </div>
                                             <div class="col-md-4 col-xs-6 sh_text">Telangana</div>
                                          </div>
                                       </div>
                                       <div class="col-md-12 margin_t col-xs-12">
                                          <div class="col-md-6 col-xs-12 no_margin">
                                             <div class="col-md-8 col-xs-6 ph_text my_border">City/Town</div>
                                             <div class="col-md-4 col-xs-6 sh_text">Hyderabad</div>
                                          </div>
                                          <div class="col-md-6 col-xs-12 no_margin">
                                             <div class="col-md-8 col-xs-6 ph_text my_border">This job need travel select %</div>
                                             <div class="col-md-4 col-xs-6 sh_text">50%</div>
                                          </div>
                                       </div>
                                    </div>
                                    <!-- End row -->
                                    <div class="row">
                                       <div class="col-md-12 col-xs-12 margin_t job_pro">
                                          <div class="col-md-6 bio_p"><i class="fa fa-address-card"></i> Preferences for this Job</div>
                                          <div class="col-md-3 pull-right"><a href="#" data-toggle="modal" data-target="#myModal3"><i class="fa fa-pencil-square-o icon_3"></i> Edit</a> </div>
                                       </div>
                                       <!-- Modal -->
                                       <div class="modal fade" id="myModal3" role="dialog">
                                          <div class="modal-dialog">
                                             <!-- Modal content-->
                                             <div class="modal-content">
                                                <div class="modal-header">
                                                   <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                   <h4 class="modal-title">Edit Preferences for this Job</h4>
                                                </div>
                                                <div class="modal-body">
                                                   <form role="form"  method="post" id="editForm3">
                                                      <div class="row">
                                                         <div class="col-md-6">
                                                            <label>Preferred Education </label>
                                                            <select  name="education[]" id="education" class="form-control js-example-basic-select2" multiple="multiple" style="width:265px;">
                                                               <option value="">Select Education required</option>
                                                               <?php 
                                                                  $sql = $user->runQuery("select education from education_tble");
                                                                  $sql->execute();
                                                                  $rw=$sql->fetchAll();
                                                                  foreach($rw as $row) {
                                                                  ?>
                                                               <option value="<?php echo $row['education'];?>"><?php echo $row['education'];?></option>
                                                               <?php } ?>
                                                            </select>
                                                         </div>
                                                         <div class="col-md-6">
                                                            <div class="input-wrap">
                                                               <label>Candidate Main skills/Job positions</label>
                                                               <select  name="sills[]" id="sills" class="form-control js-example-basic-select2" multiple="multiple"  style="width:250px;">
                                                                  <option value="">Select Main Skills/Positions required</option>
                                                                  <option>PHP</option>
                                                                  <option>HTML</option>
                                                               </select>
                                                            </div>
                                                         </div>
                                                      </div>
                                                      <div class="row margin_10">
                                                         <div class="col-md-6">
                                                            <div class="input-wrap">
                                                               <label>Preferred Experience</label>
                                                               <div class="form-group">
                                                                  <div class="col-sm-12 no_margin">
                                                                     <div class="input-group  col-md-12">
                                                                        <div class="input-daterange input-group">
                                                                           <select class="form-control" name="minexp" id="minexp">
                                                                              <option value="" selected="selected">Min Experience</option>
                                                                              <option value="Fresher">Fresher</option>
                                                                              <option value="1 Year">1 Year</option>
                                                                              <option value="2 Year">2 Years</option>
                                                                              <option value="3 Year">3 Years</option>
                                                                              <option value="4 Year">4 Years</option>
                                                                              <option value="5 Year">5 Years</option>
                                                                              <option value="6 Year">6 Years</option>
                                                                              <option value="7 Year">7 Years</option>
                                                                              <option value="8 Year">8 Years</option>
                                                                              <option value="9 Year">9 Years</option>
                                                                              <option value="10 Year">10 Years</option>
                                                                              <option value="11 Year">11 Years</option>
                                                                              <option value="12 Year">12 Years</option>
                                                                              <option value="13 Year">13 Years</option>
                                                                              <option value="14 Year">14 Years</option>
                                                                              <option value="15 Year">15 Years</option>
                                                                              <option value="16 Year">16 Years</option>
                                                                              <option value="17 Year">17 Years</option>
                                                                              <option value="18 Year">18 Years</option>
                                                                              <option value="19 Year">19 Years</option>
                                                                              <option value="20 Year">20 Years</option>
                                                                              <option value="21 Year">21 Years</option>
                                                                              <option value="22 Year">22 Years</option>
                                                                              <option value="23 Year">23 Years</option>
                                                                              <option value="24 Year">24 Years</option>
                                                                              <option value="25 Year">25 Years</option>
                                                                              <option value="26 Year">26 Years</option>
                                                                              <option value="27 Year">27 Years</option>
                                                                              <option value="28 Year">28 Years</option>
                                                                              <option value="29 Year">29 Years</option>
                                                                              <option value="30 Year">30 Years</option>
                                                                              <option value="30 Year">30 Years</option>
                                                                           </select>
                                                                           <span class="input-group-addon">to</span>
                                                                           <select class="form-control" name="maxexp" id="maxexp">
                                                                              <option value="" selected="selected">Max Experience</option>
                                                                              <option value="Fresher">Fresher</option>
                                                                              <option value="1 Year">1 Year</option>
                                                                              <option value="2 Year">2 Years</option>
                                                                              <option value="3 Year">3 Years</option>
                                                                              <option value="4 Year">4 Years</option>
                                                                              <option value="5 Year">5 Years</option>
                                                                              <option value="6 Year">6 Years</option>
                                                                              <option value="7 Year">7 Years</option>
                                                                              <option value="8 Year">8 Years</option>
                                                                              <option value="9 Year">9 Years</option>
                                                                              <option value="10 Year">10 Years</option>
                                                                              <option value="11 Year">11 Years</option>
                                                                              <option value="12 Year">12 Years</option>
                                                                              <option value="13 Year">13 Years</option>
                                                                              <option value="14 Year">14 Years</option>
                                                                              <option value="15 Year">15 Years</option>
                                                                              <option value="16 Year">16 Years</option>
                                                                              <option value="17 Year">17 Years</option>
                                                                              <option value="18 Year">18 Years</option>
                                                                              <option value="19 Year">19 Years</option>
                                                                              <option value="20 Year">20 Years</option>
                                                                              <option value="21 Year">21 Years</option>
                                                                              <option value="22 Year">22 Years</option>
                                                                              <option value="23 Year">23 Years</option>
                                                                              <option value="24 Year">24 Years</option>
                                                                              <option value="25 Year">25 Years</option>
                                                                              <option value="26 Year">26 Years</option>
                                                                              <option value="27 Year">27 Years</option>
                                                                              <option value="28 Year">28 Years</option>
                                                                              <option value="29 Year">29 Years</option>
                                                                              <option value="30 Year">30 Years</option>
                                                                              <option value="30 Year">30 Years</option>
                                                                           </select>
                                                                        </div>
                                                                     </div>
                                                                  </div>
                                                               </div>
                                                            </div>
                                                         </div>
                                                         <div class="col-md-6">
                                                            <div class="input-wrap">
                                                               <label>Industry/Company/Organization </label>
                                                               <select  name="pindustry[]" id="pindustry" class="form-control js-example-basic-select2" multiple="multiple" style="width:250px;">
                                                                  <option value="">Select Job role required</option>
                                                                  <option>Manufacturing</option>
                                                                  <option>Construction</option>
                                                               </select>
                                                            </div>
                                                         </div>
                                                      </div>
                                                      <div class="row margin_10">
                                                         <div class="col-md-4">
                                                            <label>Marital Status </label>
                                                            <select class="test" multiple="multiple" id="marital" name="marital">
                                                               <option value="" selected="selected">--Select--</option>
                                                               <option value="Married">Married</option>
                                                               <option value="Unmarried">Unmarried</option>
                                                            </select>
                                                         </div>
                                                         <div class="col-md-4">
                                                            <label>Health Status </label>
                                                            <select class="test" multiple="multiple" id="healthy" name="healthy">
                                                               <option value="" selected="selected">--Select--</option>
                                                               <option value="Healthy">Healthy</option>
                                                               <option value="Physical Challenged">Physical Challenged</option>
                                                               <option value="Minor Heath Issu">Minor Heath Issue</option>
                                                            </select>
                                                         </div>
                                                         <div class="col-md-4">
                                                            <label>Preferred Gender </label>
                                                            <select class="test" multiple="multiple" id="gender" name="gender">
                                                               <option value="" selected="selected">--Select--</option>
                                                               <option value="Male">Male</option>
                                                               <option value="Female">Female</option>
                                                            </select>
                                                         </div>
                                                      </div>
                                                      <div class="row margin_10">
                                                         <div class="col-md-6">
                                                            <label>Physique </label>
                                                            <select class="test" multiple="multiple" id="physique" name="physique">
                                                               <option value="" selected>--Select--</option>
                                                               <option value="Slim">Slim</option>
                                                               <option value="Athletic">Athletic</option>
                                                               <option value="Build Muscular">Build Muscular</option>
                                                               <option value="Slight over weight">Slight over weight</option>
                                                               <option value="Moderate over weight">Moderate over weight</option>
                                                               <option value="Heavy over weight">Heavy over weight</option>
                                                               <option value="Any">Any</option>
                                                            </select>
                                                         </div>
                                                         <div class="col-md-6">
                                                            <div class="input-wrap">
                                                               <label>Age</label>
                                                               <div class="form-group">
                                                                  <div class="col-sm-12 no_margin">
                                                                     <div class="input-group  col-md-12">
                                                                        <div class="input-daterange input-group">
                                                                           <select class="form-control" name="minage" id="minage">
                                                                              <option value="" selected="selected">Min Age</option>
                                                                              <option value="20 Years">20 Years</option>
                                                                              <option value="21 Years">21 Years</option>
                                                                              <option value="22 Years">22 Years</option>
                                                                           </select>
                                                                           <span class="input-group-addon">to</span>
                                                                           <select class="form-control" name="maxage" id="maxage">
                                                                              <option value="" selected="selected">Max Age</option>
                                                                              <option value="20 Years">20 Years</option>
                                                                              <option value="21 Years">21 Years</option>
                                                                              <option value="22 Years">22 Years</option>
                                                                           </select>
                                                                        </div>
                                                                     </div>
                                                                  </div>
                                                               </div>
                                                            </div>
                                                         </div>
                                                      </div>
                                                      <div class="row margin_10">
                                                         <div class="col-md-4">
                                                            <label>Minimum Height</label>
                                                            <select class="form-control" name="mnfeet" id="feet2">
                                                               <option value="" selected="selected">Feet</option>
                                                               <option value="1">1</option>
                                                               <option value="2">2</option>
                                                               <option value="3">3</option>
                                                               <option value="4">4</option>
                                                               <option value="5">5</option>
                                                               <option value="6">6</option>
                                                               <option value="7">7</option>
                                                               <option value="8">8</option>
                                                               <option value="9">9</option>
                                                               <option value="10">10</option>
                                                            </select>
                                                         </div>
                                                         <div class="col-md-1  height_w hidden-xs hidden-sm">+</div>
                                                         <div  class="col-md-4 rg_mm">
                                                            <label>Inch</label>
                                                            <select class="form-control" name="mninch">
                                                               <option value="" selected="selected">Inch</option>
                                                               <option value="0">0</option>
                                                               <option value="1">1</option>
                                                               <option value="2">2</option>
                                                               <option value="3">3</option>
                                                               <option value="4">4</option>
                                                               <option value="5">5</option>
                                                               <option value="6">6</option>
                                                               <option value="7">7</option>
                                                               <option value="8">8</option>
                                                               <option value="9">9</option>
                                                               <option value="10">10</option>
                                                               <option value="11">11</option>
                                                            </select>
                                                         </div>
                                                         <div class="col-md-1  height_w hidden-xs hidden-sm ">=</div>
                                                         <div  class="col-md-3">
                                                            <label>CM </label>
                                                            <div class="input-wrap">
                                                               <input type="text" name="cmheight" id="ucm" class="form-control" readonly>
                                                            </div>
                                                         </div>
                                                      </div>
                                                      <div class="row margin_10">
                                                         <div class="col-md-4">
                                                            <label>Maximum Height</label>
                                                            <select class="form-control" name="mxfeet"  id="feet22">
                                                               <option value="" selected="selected">Feet</option>
                                                               <option value="1">1</option>
                                                               <option value="2">2</option>
                                                               <option value="3">3</option>
                                                               <option value="4">4</option>
                                                               <option value="5">5</option>
                                                               <option value="6">6</option>
                                                               <option value="7">7</option>
                                                               <option value="8">8</option>
                                                               <option value="9">9</option>
                                                               <option value="10">10</option>
                                                            </select>
                                                         </div>
                                                         <div class="col-md-1  height_w hidden-xs hidden-sm">+</div>
                                                         <div  class="col-md-4 rg_mm">
                                                            <label>Inch </label>
                                                            <select class="form-control" name="mxinch" id="inch22">
                                                               <option value="" selected="selected">Inch</option>
                                                               <option value="0">0</option>
                                                               <option value="1">1</option>
                                                               <option value="2">2</option>
                                                               <option value="3">3</option>
                                                               <option value="4">4</option>
                                                               <option value="5">5</option>
                                                               <option value="6">6</option>
                                                               <option value="7">7</option>
                                                               <option value="8">8</option>
                                                               <option value="9">9</option>
                                                               <option value="10">10</option>
                                                               <option value="11">11</option>
                                                            </select>
                                                         </div>
                                                         <div class="col-md-1  height_w hidden-xs hidden-sm ">=</div>
                                                         <div  class="col-md-3">
                                                            <label>CM </label>
                                                            <div class="input-wrap">
                                                               <input type="text" name="cmheight" id="ucm" class="form-control" readonly>
                                                            </div>
                                                         </div>
                                                      </div>
                                                      <div class="row margin_10">
                                                         <div class="col-md-4">
                                                            <label>Religion </label>
                                                            <select class="form-control" name="religion" id="religion">
                                                               <option value="" selected>--Select--</option>
                                                               <option value="Islam">Islam</option>
                                                               <option value="Hindu">Hindu</option>
                                                               <option value="Hindu">Hindu</option>
                                                            </select>
                                                         </div>
                                                         <div class="col-md-4">
                                                            <label>Nationality </label>
                                                            <select  name="nationality[]" id="nationality" class="form-control js-example-basic-select2 lan_n" multiple="multiple">
                                                               <option value="">Select Nationality required</option>
                                                               <option>Indian</option>
                                                               <option>American</option>
                                                            </select>
                                                         </div>
                                                         <div class="col-md-4">
                                                            <label>Languages Known </label>
                                                            <select class="test" multiple="multiple" id="languages" name="languages">
                                                               <option value="" selected>--Select--</option>
                                                               <option value="English">English</option>
                                                               <option value="Hindi">Hindi</option>
                                                            </select>
                                                         </div>
                                                      </div>
                                                      <div class="row margin_10">
                                                         <div class="col-md-4">
                                                            <label>Native Country </label>
                                                            <select class="test" multiple="multiple" id="ncountry" name="ncountry">
                                                               <option value="India">India </option>
                                                               <option value="USA">USA</option>
                                                            </select>
                                                         </div>
                                                         <div class="col-md-4">
                                                            <label>Native State </label>
                                                            <select class="test" multiple="multiple" id="nstate" name="nstate">
                                                               <option value="India">India</option>
                                                               <option value="USA">USA</option>
                                                            </select>
                                                         </div>
                                                         <div class="col-md-4">
                                                            <label>Native City/Town</label>
                                                            <select class="test" multiple="multiple" id="ncity" name="ncity">
                                                               <option value="India">India</option>
                                                               <option value="USA">USA</option>
                                                            </select>
                                                         </div>
                                                      </div>
                                                      <div class="row margin_10">
                                                         <div class="col-md-4">
                                                            <label>Residence Country </label>
                                                            <select class="test" multiple="multiple" id="rcountry" name="rcountry">
                                                               <option value="India">India </option>
                                                               <option value="USA">USA</option>
                                                            </select>
                                                         </div>
                                                         <div class="col-md-4">
                                                            <label>Residence State</label>
                                                            <select class="test" multiple="multiple" id="rstate" name="rstate">
                                                               <option value="India">India</option>
                                                               <option value="USA">USA</option>
                                                            </select>
                                                         </div>
                                                         <div class="col-md-4">
                                                            <label>Residence City/Town </label>
                                                            <select class="test" multiple="multiple" id="rcity" name="rcity">
                                                               <option value="India">India</option>
                                                               <option value="USA">USA</option>
                                                            </select>
                                                         </div>
                                                      </div>
                                                      <div class="col-md-5 mmargin_tt col-md-push-4 col-xs-push-4" style="margin-top:8px;">
                                                         <input type="Submit" name="setting" class="btn btn-success" value="Save changes">
                                                      </div>
                                                   </form>
                                                   <div class="clearfix"></div>
                                                </div>
                                                <div class="modal-footer">
                                                   <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="col-md-12 margin_t col-xs-12">
                                          <div class="col-md-6 col-xs-12 no_margin">
                                             <div class="col-md-8 col-xs-6 ph_text my_border">Preferred Education</div>
                                             <div class="col-md-4 col-xs-6 sh_text mar_col">B.Tech, Any Graduation</div>
                                          </div>
                                          <div class="col-md-6 col-xs-12 no_margin">
                                             <div class="col-md-8 col-xs-6 ph_text my_border">Preferred candidate Main skills / Job positions </div>
                                             <div class="col-md-4 col-xs-6 sh_text mar_col">Manager, Programmer, Developer</div>
                                          </div>
                                       </div>
                                       <div class="col-md-12 margin_t col-xs-12">
                                          <div class="col-md-6 col-xs-12 no_margin">
                                             <div class="col-md-8 col-xs-6 ph_text my_border">Preferred Experience </div>
                                             <div class="col-md-4 col-xs-6 sh_text">5 Years to 10 Years</div>
                                          </div>
                                          <div class="col-md-6 col-xs-12 no_margin">
                                             <div class="col-md-8 col-xs-6 ph_text my_border">Preferred Industry/Company/Organization</div>
                                             <div class="col-md-4 col-xs-6 sh_text mar_col">Manufacturing, IT</div>
                                          </div>
                                       </div>
                                       <div class="col-md-12 margin_t col-xs-12">
                                          <div class="col-md-6 col-xs-12 no_margin">
                                             <div class="col-md-8 col-xs-6 ph_text my_border">Marital Status</div>
                                             <div class="col-md-4 col-xs-6 sh_text">Any</div>
                                          </div>
                                          <div class="col-md-6 col-xs-12 no_margin">
                                             <div class="col-md-8 col-xs-6 ph_text my_border">Health Status</div>
                                             <div class="col-md-4 col-xs-6 sh_text">Health</div>
                                          </div>
                                       </div>
                                       <div class="col-md-12 margin_t col-xs-12">
                                          <div class="col-md-6 col-xs-12 no_margin">
                                             <div class="col-md-8 col-xs-6 ph_text my_border">Preferred Gender</div>
                                             <div class="col-md-4 col-xs-6 sh_text">Any</div>
                                          </div>
                                          <div class="col-md-6 col-xs-12 no_margin">
                                             <div class="col-md-8 col-xs-6 ph_text my_border">Age</div>
                                             <div class="col-md-4 col-xs-6 sh_text">25 Years to 30 Years</div>
                                          </div>
                                       </div>
                                       <div class="col-md-12 margin_t col-xs-12">
                                          <div class="col-md-6 col-xs-12 no_margin">
                                             <div class="col-md-8 col-xs-6 ph_text my_border">Minimum Height</div>
                                             <div class="col-md-4 col-xs-6 sh_text">5feet 1inch 30cm</div>
                                          </div>
                                          <div class="col-md-6 col-xs-12 no_margin">
                                             <div class="col-md-8 col-xs-6 ph_text my_border">Maximum Height</div>
                                             <div class="col-md-4 col-xs-6 sh_text">6feet 1inch 30cm</div>
                                          </div>
                                       </div>
                                       <div class="col-md-12 margin_t col-xs-12">
                                          <div class="col-md-6 col-xs-12 no_margin">
                                             <div class="col-md-8 col-xs-6 ph_text my_border">Religion </div>
                                             <div class="col-md-4 col-xs-6 sh_text">Any</div>
                                          </div>
                                          <div class="col-md-6 col-xs-12 no_margin">
                                             <div class="col-md-8 col-xs-6 ph_text my_border">Nationality</div>
                                             <div class="col-md-4 col-xs-6 sh_text">Indian</div>
                                          </div>
                                       </div>
                                       <div class="col-md-12 margin_t col-xs-12">
                                          <div class="col-md-6 col-xs-12 no_margin">
                                             <div class="col-md-8 col-xs-6 ph_text my_border">Languages Known</div>
                                             <div class="col-md-4 col-xs-6 sh_text">English,Hindi, Telugu</div>
                                          </div>
                                          <div class="col-md-6 col-xs-12 no_margin">
                                             <div class="col-md-8 col-xs-6 ph_text my_border">Native Country</div>
                                             <div class="col-md-4 col-xs-6 sh_text">India</div>
                                          </div>
                                       </div>
                                       <div class="col-md-12 margin_t col-xs-12">
                                          <div class="col-md-6 col-xs-12 no_margin">
                                             <div class="col-md-8 col-xs-6 ph_text my_border">Native Country</div>
                                             <div class="col-md-4 col-xs-6 sh_text">Telangana</div>
                                          </div>
                                          <div class="col-md-6 col-xs-12 no_margin">
                                             <div class="col-md-8 col-xs-6 ph_text my_border">Native City/Town</div>
                                             <div class="col-md-4 col-xs-6 sh_text">Hyderabad</div>
                                          </div>
                                       </div>
                                       <div class="col-md-12 margin_t col-xs-12">
                                          <div class="col-md-6 col-xs-12 no_margin">
                                             <div class="col-md-8 col-xs-6 ph_text my_border">Residence Country</div>
                                             <div class="col-md-4 col-xs-6 sh_text">India</div>
                                          </div>
                                          <div class="col-md-6 col-xs-12 no_margin">
                                             <div class="col-md-8 col-xs-6 ph_text my_border">Residence State</div>
                                             <div class="col-md-4 col-xs-6 sh_text">Telangana</div>
                                          </div>
                                       </div>
                                       <div class="col-md-12 margin_t col-xs-12">
                                          <div class="col-md-6 col-xs-12 no_margin">
                                             <div class="col-md-8 col-xs-6 ph_text my_border">Residence City/Town</div>
                                             <div class="col-md-4 col-xs-6 sh_text">India</div>
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
      <script src="dist/js/jQuery.inputSliderRange.min.js"></script>
      <script src="dist/js/fSelect.js"></script>
      <script src="bower_components/select2/dist/js/select2.min.js"></script>
      <script src="assets/js/init-select2.js"></script>
      <!-- This below script for multi select -->
      <script>
         (function($) {
             $(function() {
                 window.fs_test = $('.test').fSelect();
             });
         })(jQuery);
      </script>
      <!-- This below script for date picker -->
      <script>
         $(function () {
         $("#datepicker").datepicker({ 
               autoclose: true, 
               todayHighlight: true
         }).datepicker('update', new Date());
         });
         
      </script>
      <!-- This below script for percentage -->
      <script>
         var rangeSlider = function(){
           var slider = $('.range-slider'),
               range = $('.range-slider__range'),
               value = $('.range-slider__value');
             
           slider.each(function(){
         
             value.each(function(){
               var value = $(this).prev().attr('value');
               $(this).html(value);
             });
         
             range.on('input', function(){
               $(this).next(value).html(this.value);
             });
           });
         };
         
         rangeSlider();
      </script>
      <!-- This script for current salary -->	
      <script>
         $('#test').inputSliderRange({
             "min": 5000,
             "max": 100000,
             "start": 10000,
             "grid": true,
              "gridCompression": true,
             "step": {
                 "0": 5000,
                 "200000": 50000,
                 "1000000": 500000
             }
         })
      </script>
      <!-- This below script for preferred salary -->	
      <script>
         $('#test1').inputSliderRange({
             "min": 5000,
             "max": 100000,
             "start": 10000,
             "grid": true,
              "gridCompression": true,
             "step": {
                 "0": 5000,
                 "200000": 50000,
                 "1000000": 500000
             }
         })
      </script>
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
      <script>
         //set button id on click to hide first modal
         $("#signin").on( "click", function() {
                 $('#myModal1').modal('hide');  
         });
         //trigger next modal
         $("#signin").on( "click", function() {
                 $('#myModa2').modal('show');  
           //trigger next modal
         $("#signin").on( "click", function() {
                 $('#myModa3').modal('show'); 		 
      </script>
   </body>
</html>