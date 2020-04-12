<?php
   include("include/class.user.php");
   $user= new USER();
   include("include/mydb.php");
   ini_set('display_errors', 0);

   if(!$user->is_logged_in()) { 
   $user->redirect("../employerlogin.php");
   }
     $id = $_SESSION['EMP_ID'];
     $name = $_SESSION['EMP_name'];
   
   ?>
<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- <link rel="shortcut icon" type="image/png" href="/imgs/favicon.png" /> -->
      <title>Create job</title>
      <!-- inject:css -->
      <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
      <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
      <link rel="stylesheet" href="bower_components/simple-line-icons/css/simple-line-icons.css">
      <link rel="stylesheet" href="bower_components/themify-icons/css/themify-icons.css">
      <!-- endinject -->
      <!-- Select2 Dependencies -->
      <link rel="stylesheet" href="bower_components/select2/dist/css/select2.min.css">
      <!-- Touch Spin Dependencies -->
      <link rel="stylesheet" href="bower_components/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.css">
      <!-- Input mask Dependencies -->
      <link rel="stylesheet" href="bower_components/jasny-bootstrap/dist/css/jasny-bootstrap.min.css">
      <!-- Switchery Dependencies -->
      <!-- iOS 7 style switches for your checkboxes  -->
      <link rel="stylesheet" href="bower_components/switchery/dist/switchery.min.css">
      <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.css" rel="stylesheet" type="text/css" />
      <!-- Main Style  -->
      <link rel="stylesheet" href="dist/css/main.css">
      <link rel="stylesheet" href="dist/css/main.min.css">
      <link href="dist/css/fSelect.css" rel="stylesheet">
      <script src="assets/js/modernizr-custom.js"></script>
      <script src="bower_components/jquery/dist/jquery.min.js"></script>
   </head>
   <body>
      <div id="ui" class="ui">
         <!--header start-->
         <?php include 'include/sidebar.php';?>
         <!--header end-->
         <!--main content start-->
         <div id="content" class="ui-content">
            <div class="ui-content-body">
               <div class="ui-container">
                  <div class="row">
                     <div class="col-md-12">
                        <div class="panel" id="registerform">
                           <div class="panel-body">
                              <h1 class="page-title panel-border" style="margin: 20px 0px; padding:8px 10px; font-family: Tahoma; font-size: 18px; background:#0086b3; color:#fff "> Create a Job
                              </h1>
                              <form id="jobpostForm" method="post">
                                 <input type="hidden" name="emp_id" value="<?php echo $id;?>">
                                 <div class="row">
                                    <div class="col-md-4">
                                       <div class="input-wrap">
                                          <label>Date of Posting <span class="red">*</span> <span data-toggle="tooltip" title="Select date of this job posting. (Future date will make this job post as scheduled and will be posted as per selected date)."><i class="fa fa-info-circle tool_tip"></i></span></label>
                                          <div id="datepicker" class="input-group date" data-date-format="mm-dd-yyyy">
                                             <input class="form-control" type="text" readonly required="" />
                                             <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="col-md-4">
                                       <div class="input-wrap">
                                          <label>Company Name <span class="red">*</span> <span data-toggle="tooltip" title="Enter company or industry or organisation name where this job exists."><i class="fa fa-info-circle tool_tip"></i></span></label>
                                          <input type="text" name="company" id="company" placeholder="" class="form-control" maxlength="50" required="">
                                       </div>
                                    </div>
                                    <div class="col-md-4">
                                       <div class="input-wrap">
                                          <label>Company Website <span data-toggle="tooltip" title="Enter company or industry or organisation website address ."><i class="fa fa-info-circle tool_tip"></i></span></label>
                                          <input type="text" name="weblink" placeholder="Type your Company Website(URL)" class="form-control">
                                       </div>
                                    </div>
                                 </div>
                                 <div class="row margin_10">
                                    <div class="col-md-4">
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
                                   <div class="col-md-4">
                                       <div class="input-wrap">
                                          <label>Job Code <span data-toggle="tooltip" title="Type your job code for this job."><i class="fa fa-info-circle tool_tip"></i></span></label>
                                          <div class="form-group">
                                             <input type="text" name="jobcode" id="jobcode" placeholder="" class="form-control" maxlength="10">
                                          </div>
                                       </div>
                                    </div>
									 <div class="col-md-4">
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

                             <div class="row">
							   <div class="col-md-4">
                                       <div class="input-wrap">
                                          <label>Job Title <span class="red">*</span> <span data-toggle="tooltip" title="Enter job title."><i class="fa fa-info-circle tool_tip"></i></span></label>
                                       <input type="text" name="title" id="title" placeholder="" class="form-control" maxlength="60" required="">
                                       </div>
                                    </div>
                                    <div class="col-md-4">
                                  <div class="input-wrap">
                                          <label>Job Role <span class="red">*</span> <span data-toggle="tooltip" title="Enter Job role."><i class="fa fa-info-circle tool_tip"></i></span></label>
                                         <input type="text" name="role" id="role" placeholder="" class="form-control" maxlength="50" required="">
                                       </div>
                                    </div>
                                    <div class="col-md-4">
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
                                          <label>Job Description  <span data-toggle="tooltip" title="Enter this job brief description."><i class="fa fa-info-circle tool_tip"></i></span></label>
                                          <div class="form-group">
                                             <textarea class="form-control" placeholder="Job Description" maxlength="200" name="jobdesc" rows="1" id="jobdesc"></textarea>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="col-md-6">
                                       <div class="input-wrap">
                                          <label>About Company <span data-toggle="tooltip" title="Enter brief about this company."><i class="fa fa-info-circle tool_tip"></i></span></label>
                                          <div class="form-group">
                                             <textarea class="form-control" name="about" id="about" placeholder="" rows="1" maxlength="500"></textarea>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="row">
                                    <div class="col-md-4">
                                       <div class="input-wrap">
                                          <label>Salary Currency <span class="red">*</span> <span data-toggle="tooltip" title="Select currency in which you pay for this job."><i class="fa fa-info-circle tool_tip"></i></span></label>
                                          <select id="currency" name="currency" class="form-control rstate" required="">
                                             <option value="" selected="selected">--Select--</option>
                                             <?php
                                             $stmt=$user->runQuery("select * from currency_tble");
                                             $stmt->execute();
                                             $data=$stmt->fetchAll();
                                             foreach($data as $cr) {?>
                                          <option value="<?php echo $cr['currency'];?>"><?php echo $cr['currency'];?></option>
                                          <?php } ?>
                                          </select>
                                       </div>
                                    </div>
                                    <div class="col-md-4"> 
                                       <label>Minimum annual Salary <span class="red">*</span> <span data-toggle="tooltip" title="Select approximate minimum salary per annum, you are willing to pay for this job in selected currency."><i class="fa fa-info-circle tool_tip"></i></span></label>
                                       <input type="text" id="test" name="minsalary" class="form-control" required="">
                                    </div>
                                    <div class="col-md-4">
                                       <label>Maximum annual Salary <span class="red">*</span> <span data-toggle="tooltip" title="Select approximate maximum salary per annum, you are willing to pay for this job in selected currency."><i class="fa fa-info-circle tool_tip"></i></span></label>
                                       <input type="text" id="test1" name="maxsalary" class="form-control" required="">
                                    </div>
                                 </div>
								 
								   <div class="row">
								       <div class="col-md-4">
                                       <div class="input-wrap">
                                          <label>Numbers of Positions <span class="red">*</span> <span data-toggle="tooltip" title="Select number of positions for this jobs."><i class="fa fa-info-circle tool_tip"></i></span></label>
                             <input type="text" class="form-control" id="openings" name="openings" placeholder="Ex-2" onKeyPress="return isNumberKey(event)" maxlength="5">
                                       </div>
                                    </div>
                                    <div class="col-md-4">
                                       <label>Job Location Country <span class="red">*</span> <span data-toggle="tooltip" title="Select country where this job exists."><i class="fa fa-info-circle tool_tip"></i></span></label>
                                       <select class="test" multiple="multiple" id="pncountry"  name="pncountry[]" required="">
                                          <?php
                                          $s = mysqli_query($con,"select * from country");
                                          while ($rw = mysqli_fetch_array($s)) {
                                             $cid = $rw['country_name'];
                                             ?>
                                       <option value="<?php echo $rw['country_id']; ?>"><?php echo $rw['country_name']; ?></option>
                                       <?php } ?>
                                       </select>
                                     
                                    </div>
									 <div class="col-md-4">
                                       <label>State <span class="red">*</span> <span data-toggle="tooltip" title="Select state where this job exists."><i class="fa fa-info-circle tool_tip"></i></span></label>
                                       <select class="test" multiple="multiple" id="npstate" name="pnstate[]" required="">
                                          
                                       </select>
                                    </div>

									</div>
							<div class="row margin_10">
										 <div class="col-md-4">
                                       <label>City/Town <span class="red">*</span> <span data-toggle="tooltip" title="Select city/town where this job exists."><i class="fa fa-info-circle tool_tip"></i></span></label>
                                       <select class="test"  id="npcity2" name="npcity[]" multiple="multiple" required="">
                                          
                                       </select>
                                    </div>
                                    <div class="col-md-4">
                                       <div class="input-wrap">
                                          <label>Contact Person Email <span data-toggle="tooltip" title="Enter your valid email address for communication for this job."><i class="fa fa-info-circle tool_tip"></i></span></label>
                                          <input type="email" name="email" placeholder="" class="form-control">
                                       </div>
                                    </div>
                                    <div class="col-md-4">
                                       <div class="input-wrap">
                                          <label>Contact Person Mobile Number <span data-toggle="tooltip" title="Enter valid contact mobile number with international code."><i class="fa fa-info-circle tool_tip"></i></span></label>
                                          <input type="tel" name="mobile" placeholder="Type your mobile number" class="form-control" onKeyPress="return isNumberKey(event)" maxlength="10">
                                       </div>
                                    </div>
                                 </div>
								 <div class="row margin_10">
								 			 <div class="col-md-12">
                                       <div class="input-wrap">
                                          <label>Company Address <span data-toggle="tooltip" title="Enter company or job location address."><i class="fa fa-info-circle tool_tip"></i></span></label>
                                          <div class="form-group">
                                             <textarea class="form-control" name="address" rows="1" placeholder=""></textarea>
                                          </div>
                                       </div>
                                    </div>
								 </div>
								<div class="col-md-12 prj">Preferences for this Job </div>
									 <div class="row margin_10">
							     <div class="col-md-4">
                                       <div class="input-wrap">
                                          <label>Preferred Education <span class="red">*</span> <span data-toggle="tooltip" title="Select all suitable education qualification for this job. If open for any then ignore, do not select."><i class="fa fa-info-circle tool_tip"></i></span></label>
                                          <select  name="education[]" id="education" class="form-control js-example-basic-select2" multiple="multiple" required="">
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
                                    </div>
                                    <div class="col-md-4">
                                       <div class="input-wrap">
                                          <label>Preferred candidate Main skills / Job positions <span class="red">*</span> <span data-toggle="tooltip" title="Select all needed main skills or job positions a candidate worked on."><i class="fa fa-info-circle tool_tip"></i></span></label>
                                          <select  name="skills[]" id="sills" class="form-control js-example-basic-select2" multiple="multiple" required="">
                                             <option value="">Select Main Skills/Positions required</option>
                                            <?php
                                  $query = mysqli_query($con,"SELECT  skill_name as name FROM skill_tble");
                                  while($row=mysqli_fetch_array($query)) {
                                  ?>
                                             <option value="<?php echo $row['name'];?>"><?php echo $row['name'];?></option>
                                            <?php } ?>
                                          </select>
                                       </div>
                                    </div>
                                    <div class="col-md-4">
                                       <div class="input-wrap">
                                          <label>Preferred Experience <span class="red">*</span> <span data-toggle="tooltip" title="Select minimum / Maximum years of experience suitable for this job."><i class="fa fa-info-circle tool_tip"></i></span></label>
                                          <div class="form-group">
                                             <div class="col-sm-12 no_margin">
                                                <div class="input-group  col-md-12">
                                                   <div class="input-daterange input-group">
                                                      <select class="form-control" name="minexp" id="minexp" required="">
                                                         <option value="" selected="selected">Min Experience</option>
										  <option value="0">Fresher</option>
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
                                                      <select class="form-control" name="maxexp" id="maxexp" required="">
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
                                 </div>
                               <div class="row margin_10">
							        <div class="col-md-4">
                                       <div class="input-wrap">
                                          <label>Preferred Industry/Company/Organization <span class="red">*</span> <span data-toggle="tooltip" title="Select type of Company / Industry / Organisation experience should have by candidate."><i class="fa fa-info-circle tool_tip"></i></span></label>
                                          <select  name="pindustry[]" id="pindustry" class="form-control js-example-basic-select2" multiple="multiple" required="">
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
                                    <div class="col-md-4">
                                       <label>Marital Status <span data-toggle="tooltip" title="Select if this job specific to marital status. Ignore if not specific."><i class="fa fa-info-circle tool_tip"></i></span></label>
									     <select class="test" multiple="multiple" id="marital" name="marital[]">
                                          <option value="" selected="selected">--Select--</option>
                                          <option value="Married">Married</option>
                                          <option value="Unmarried">Unmarried</option>
                                           <option value="Divorced">Divorced</option>
                                             <option value="Widow">Widow</option>
                                              <option value="Widower">Widower</option>
                                       </select>
                                    </div>
                                    <div class="col-md-4">
                                       <label>Health Status <span data-toggle="tooltip" title="Select if this job specific to health status. Ignore if not specific."><i class="fa fa-info-circle tool_tip"></i></span></label>
									   <select class="test" multiple="multiple" id="healthy" name="health">
                                          <option value="" selected="selected">--Select--</option>
                                          <option value="Healthy">Healthy</option>
                                          <option value="Physical Challenged">Physical Challenged</option>
                                          <option value="Minor Heath Issu">Minor Heath Issue</option>
                                          <option value="Any">Any</option>
                                       </select>
                                    </div>
     
                                 </div>
                                 <div class="row margin_10">
                                    <div class="col-md-4">
									<label>Preferred Gender <span data-toggle="tooltip" title="Select if this job specific to health status. Ignore if not specific."><i class="fa fa-info-circle tool_tip"></i></span></label>
									    <select class="test" multiple="multiple" id="gender" name="gender">
                                          <option value="" selected="selected">--Select--</option>
                                          <option value="Male">Male</option>
                                          <option value="Female">Female</option>
										  <option value="Any">Any</option>
                                    </select>
                                    </div>
							 <div class="col-md-4">
                                       <label>Physique <span data-toggle="tooltip" title="Select if this job specific to physique status. Ignore if not specific."><i class="fa fa-info-circle tool_tip"></i></span></label>
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
                                    <div class="col-md-4">
                                       <div class="input-wrap">
                                          <label>Age <span data-toggle="tooltip" title="Select min and max age. if this job specific to age limit. Ignore if not specific."><i class="fa fa-info-circle tool_tip"></i></span></label>
                                          <div class="form-group">
                                             <div class="col-sm-12 no_margin">
                                                <div class="input-group  col-md-12">
                                                   <div class="input-daterange input-group">
                                                      <select class="form-control" name="minage" id="minage">
                                                         <option value="" selected="selected">Min Age</option>
                                                    <?php for ($i=20; $i < 64; $i++) { ?>

                                                     <option value="<?php echo $i;?>"><?php echo $i;?> Years</option>
                                                     
                                                    <?php } ?> 
                                                     </select>

                                                      <span class="input-group-addon">to</span>
                                                      <select class="form-control" name="maxage" id="maxage">
                                                         <option value="" selected="selected">Max Age</option>
                                                          <?php for ($i=20; $i < 64; $i++) { ?>

                                                       <option value="<?php echo $i;?>"><?php echo $i;?> Years</option>
                                                     
                                                    <?php } ?> 
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
                                    <label>Minimum Height <span data-toggle="tooltip" title="Select min and max height. if this job specific to height. Ignore if not specific."><i class="fa fa-info-circle tool_tip"></i></span></label>
                                          <select class="form-control" name="mnfeet" id="feet" onChange="calculatecm()">
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

                                  <script type="text/javascript">
                                    function calculatecm() {
                        
                                        var feet = document.getElementById("feet").value;
                                        var inch = document.getElementById("inch").value;
                                        var cm = Math.round(feet * 30.5 + inch * 2.54);
                                        document.getElementById("ucm").value = cm;
                                    }
                                    function calculatecm2() {
                        
                                        var feet2 = document.getElementById("feet2").value;
                                        var inch2 = document.getElementById("inch2").value;
                                        var cm2 = Math.round(feet2 * 30.5 + inch2 * 2.54);
                                        document.getElementById("ucm2").value = cm2;
                                    }
                                 </script>

                                 <div class="col-md-1  height_w hidden-xs hidden-sm">+</div>
                                 <div  class="col-md-4 rg_mm">
                                    <label>Inch</label>
                                          <select class="form-control" id="inch" name="mninch" onChange="calculatecm()">
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
                                 <div  class="col-md-3 cm_w">
                                    <label>CM </label>
                                    <div class="input-wrap">
                                       <input type="text" name="cmheight" id="ucm" class="form-control" readonly>
                                    </div>
                                 </div>
                              </div>
							                                <div class="row margin_10">
                                 <div class="col-md-4">
                                    <label>Maximum Height <span data-toggle="tooltip" title="Select min and max height. if this job specific to height. Ignore if not specific."><i class="fa fa-info-circle tool_tip"></i></span></label>
                                          <select class="form-control" name="mxfeet"  id="feet2" onChange="calculatecm2()">
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
                                          <select class="form-control" name="mxinch" id="inch2" onChange="calculatecm2()">
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
                                 <div  class="col-md-3 cm_w">
                                    <label>CM </label>
                                    <div class="input-wrap">
                                       <input type="text" name="cmheight2" id="ucm2" class="form-control" readonly>
                                    </div>
                                 </div>
                              </div>
                                 <div class="row margin_10">
                                    <div class="col-md-4">
                                       <label>Religion <span data-toggle="tooltip" title="Select if this job specific to Religious job. Ignore if not specific."><i class="fa fa-info-circle tool_tip"></i></span></label>
                                       <select class="form-control" name="religion" id="religion">
                                          <option value="Muslim">Muslim</option>
                                          <option value="Hindu">Hindu</option>
                                          <option value="Christian">Christian</option>
                                          <option value="Sikh">Sikh</option>
                                       </select>
                                    </div>
                                    <div class="col-md-4">
                                       <label>Nationality <span data-toggle="tooltip" title="Select if this job specific to nationalities. Ignore if not specific."><i class="fa fa-info-circle tool_tip"></i></span></label>
                                       <select  name="nationality[]" id="nationality" class="form-control js-example-basic-select2" multiple="multiple">
                                          <option value="">Select Nationality required</option>
                                         <?php
                                             $stmt=$user->runQuery("select * from nationality_tble");
                                             $stmt->execute();
                                             $data=$stmt->fetchAll();
                                                 foreach($data as $nr) {?>
                                          <option value="<?php echo $nr['nation_name'];?>"><?php echo $nr['nation_name'];?></option>
                                          <?php } ?>
                                       </select>
                                    </div>
                                    <div class="col-md-4">
                                       <label>Languages Known <span data-toggle="tooltip" title="Select if this job required multi languages known candidate. Ignore if not specific."><i class="fa fa-info-circle tool_tip"></i></span></label>

					<select class="test" multiple="multiple" id="languages" name="languages[]">
                                          <option value="" selected>--Select--</option>
                                          <option value="English">English</option>
                                          <option value="Urdu">Urdu</option>
                                           <option value="Telugu">Telugu</option>
                                       </select>

                                    </div>
                                 </div>
                                 <div class="row margin_10">
                                    <div class="col-md-4">
                                       <label>Native Country <span data-toggle="tooltip" title="Select all countries you are interested in for matching jobseeker.If open to any then ignore, do not select."><i class="fa fa-info-circle tool_tip"></i></span></label>
                                       <select class="test" multiple="multiple" id="pncountry2"  name="pncountry2[]">
                                         <?php
                                          $s = mysqli_query($con,"select * from country");
                                          while ($rw = mysqli_fetch_array($s)) {
                                             $cid = $rw['country_name'];
                                             ?>
                                       <option value="<?php echo $rw['country_id']; ?>"><?php echo $rw['country_name']; ?></option>
                                       <?php } ?>
                                       </select>
                                    </div>
                                    <div class="col-md-4">
                                       <label>Native State <span data-toggle="tooltip" title="Select all states you are interested in for matching jobseeker.If open to any then ignore, do not select."><i class="fa fa-info-circle tool_tip"></i></span></label>
                                       <select class="test" multiple="multiple" id="npstate2" name="pnstate2[]">
                                          
                                       </select>
                                    </div>
                                    <div class="col-md-4">
                                       <label>Native City/Town <span data-toggle="tooltip" title="Select all cities you are interested in for matching jobseeker.If open to any then ignore, do not select."><i class="fa fa-info-circle tool_tip"></i></span></label>
                                       <select class="test" multiple="multiple"  id="npcity22" name="npcity2[]">
                                         
                                       </select>
                                    </div>
                                 </div>
                                 <div class="row margin_10">
                                    <div class="col-md-4">
                                       <label>Residence Country <span data-toggle="tooltip" title="Select all countries you are interested in for matching jobseeker.If open to any then ignore, do not select."><i class="fa fa-info-circle tool_tip"></i></span></label>
                                       <select class="test" multiple="multiple" id="rpcountry" name="rpcountry[]">
                                           <?php
                                          $s = mysqli_query($con,"select * from country");
                                          while ($rw = mysqli_fetch_array($s)) {
                                             $cid = $rw['country_name'];
                                             ?>
                                       <option value="<?php echo $rw['country_id']; ?>"><?php echo $rw['country_name']; ?></option>
                                       <?php } ?>
                                       </select>
                                    </div>
                                    <div class="col-md-4">
                                       <label>Residence State <span data-toggle="tooltip" title="Select all states you are interested in for matching jobseeker.If open to any then ignore, do not select."><i class="fa fa-info-circle tool_tip"></i></span></label>
                                       <select class="test" multiple="multiple" id="rpstate" name="rpstate[]">
                                          
                                       </select>
                                    </div>
                                    <div class="col-md-4">
                                       <label>Residence City/Town <span data-toggle="tooltip" title="Select all cities you are interested in for matching jobseeker.If open to any then ignore, do not select."><i class="fa fa-info-circle tool_tip"></i></span></label>
                                       <select class="test" multiple="multiple" id="rpcity" name="rpcity[]">                                     
                                       </select>
                                    </div>
                                 </div>
      
                                 <div class="col-md-2 col-md-push-5" style="margin-top:10px;">
                                    <input type="submit" value="submit" name="submit-btn" class="btn btn-primary">
                                 </div>
                              </form>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <!-- Don't Delete-->
               <div class="col-md-6" style="display:none;">
                  <div class="panel">
                     <div class="panel-body">
                        <div class="form-group">
                           <div class="checkbox col-sm-3">
                              <label>
                              <input class="js-switch" value="" type="checkbox" checked>
                              </label>
                           </div>
                           <div class="checkbox col-sm-3">
                              <label>
                              <input class="js-switch_2" value="" type="checkbox" checked>
                              </label>
                           </div>
                           <div class="checkbox col-sm-3">
                              <label>
                              <input class="js-switch_3" value="" type="checkbox" checked>
                              </label>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <!-- Don't Delete End-->
            </div>
         </div>
         <!--footer start-->
         <div id="footer" class="ui-footer">
            2018 &copy;MeeM.one
         </div>
         <!--footer end-->
      </div>
      </div>
      <!--main content end-->
      <script src="js/user-script.js"></script>
      <!-- inject:js -->
      <script src="bower_components/jquery/dist/jquery.min.js"></script>
      <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
      <script src="bower_components/jquery.nicescroll/dist/jquery.nicescroll.min.js"></script>
      <script src="bower_components/autosize/dist/autosize.min.js"></script>
      <!-- endinject -->
      <!-- Common Script   -->
      <script src="dist/js/main.js"></script>
      <!-- Select2 Dependencies -->
      <script src="bower_components/select2/dist/js/select2.min.js"></script>
      <script src="assets/js/init-select2.js"></script>
      <!-- Touch Spin Dependencies -->
      <script src="bower_components/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.js"></script>
      <script src="assets/js/init-touchspin.js"></script>
      <!-- jquery TagsInput Dependencies -->
      <script src="bower_components/jquery.tagsinput/src/jquery.tagsinput.js"></script>
      <script src="assets/js/init-tagsinput.js"></script>
      <!-- Input mask Dependencies -->
      <script src="bower_components/jasny-bootstrap/dist/js/jasny-bootstrap.min.js"></script>
      <!-- Switchery Dependencies -->
      <!-- iOS 7 style switches for your checkboxes  -->
      <script src="bower_components/switchery/dist/switchery.min.js"></script>
      <script src="assets/js/init-switchery.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js"></script>
      <script src="dist/js/jQuery.inputSliderRange.min.js"></script>
      <script src="dist/js/fSelect.js"></script>
	  
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
	  <!-- This below script for min salary -->
      <script>
         $('#test').inputSliderRange({
             "min": 5000,
             "max": 1200000,
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
      <!-- This below script for max salary -->	
      <script>
         $('#test1').inputSliderRange({
             "min": 5000,
             "max": 1200000,
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
	  <!-- This below script for languages known -->	
      <script>
         var expanded = false;
         
         function showCheckboxes() {
           var checkboxes = document.getElementById("checkboxes");
           if (!expanded) {
             checkboxes.style.display = "block";
             expanded = true;
           } else {
             checkboxes.style.display = "none";
             expanded = false;
           }
         }
         
      </script>     
	 <script>
         $(document).ready(function(){
             $('[data-toggle="tooltip"]').tooltip();   
         });
      </script>	  
   </body>
</html>