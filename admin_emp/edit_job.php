<?php
 include("include/class.user.php");
 $user= new USER();
 include("include/mydb.php");
 if(!$user->is_logged_in()) {
 $user->redirect("../employerlogin.php");
 }
   $id = $_SESSION['EMP_ID'];
   $name = $_SESSION['EMP_name'];
   
   $job_id=$_GET['jobid'];
   $stmt=$user->runQuery("select * from meem_jobs where id='$job_id'");
   $stmt->execute();
   $data=$stmt->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
    
<!-- Mirrored from megadin.lab.themebucket.net/form-advanced.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 21 Jan 2018 14:13:04 GMT -->
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
        <link rel="stylesheet" href="bower_components/weather-icons/css/weather-icons.min.css">
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

        <!-- Bootstrap Date Range Picker Dependencies -->
        <link rel="stylesheet" href="bower_components/bootstrap-daterangepicker/daterangepicker.css">

        <!-- Bootstrap DatePicker Dependencies -->
        <link rel="stylesheet" href="bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker3.min.css">

        <!-- Bootstrap TimePicker Dependencies -->
        <link rel="stylesheet" href="bower_components/bootstrap-timepicker/css/bootstrap-timepicker.min.css">

        <!-- Bootstrap ColorPicker Dependencies -->
        <link rel="stylesheet" href="bower_components/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css">

        <!-- Main Style  -->
        <link rel="stylesheet" href="dist/css/main.css">

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
                                     
                                        <h1 class="page-title panel-border" style="margin: 20px 0px; padding:8px 10px; font-family: Tahoma; font-size: 18px; background:#0086b3; color:#fff "> Edit/View Job
                                  
                                </h1>
                                        <form  method="post" id="editJobForm">
                                        <input type="hidden" name="job_id" value="<?php echo $job_id?>">
                                 <div class="row">
                                 <div class="col-md-6">
                                    <div class="input-wrap">
                                       <label>Company Name <span class="red">*</span></label>
                                       <input type="text" name="company" value="<?php echo $data['company_name'];?>" id="company" placeholder="" class="form-control" maxlength="50">
                                    </div>
                                 </div>
                                 <div class="col-md-6">
                                    <div class="input-wrap">
                                       <label>Job Title <span class="red">*</span></label>
                                       <input type="text" name="title" value="<?php echo $data['job_title'];?>" id="title" placeholder="" class="form-control" maxlength="50" onKeyPress="return ValidateAlpha(event);">
                                    </div>
                                 </div>
                              </div>
							  <div class="row margin_10">
                                 <div class="col-md-6">
                                    <div class="input-wrap">
                                       <label>Experience</label>
                                         <div class="form-group">
                                               <div class="col-sm-12 no_margin">
                                                    <div class="input-group  col-md-12">
                               <div class="input-daterange input-group">
                                          <select class="form-control" name="minexp">
                                          <option value="" selected="selected">Min Experience</option>
                                          <option value="" <?php if(empty($data['min_exp'])) { ?> selected="" <?php } ?>>0 Yrs</option>
                                          <option value="1" <?php if($data['min_exp']==1) { ?> selected="" <?php } ?>>1</option>
                                           <option value="2" <?php if($data['min_exp']==2) { ?> selected="" <?php } ?>>2</option>
					   <option value="3" <?php if($data['min_exp']==3) { ?> selected="" <?php } ?>>3</option>
                                            <option value="4" <?php if($data['min_exp']==4) { ?> selected="" <?php } ?>>4</option>
                                           <option value="5" <?php if($data['min_exp']==5) { ?> selected="" <?php } ?>>5</option>
					   <option value="6" <?php if($data['min_exp']==6) { ?> selected="" <?php } ?>>6</option>
                                       </select>
                              <span class="input-group-addon">to</span>
                              <select class="form-control" name="maxexp">
                                          <option value="" selected="selected">Max Experience</option>
                                         <option value="" <?php if(empty($data['max_exp'])) { ?> selected="" <?php } ?>>0 Yrs</option>
                                          <option value="1" <?php if($data['max_exp']==1) { ?> selected="" <?php } ?>>1</option>
                                           <option value="2" <?php if($data['max_exp']==2) { ?> selected="" <?php } ?>>2</option>
					   <option value="3" <?php if($data['max_exp']==3) { ?> selected="" <?php } ?>>3</option>
                                            <option value="4" <?php if($data['max_exp']==4) { ?> selected="" <?php } ?>>4</option>
                                           <option value="5" <?php if($data['max_exp']==5) { ?> selected="" <?php } ?>>5</option>
					   <option value="6" <?php if($data['max_exp']==6) { ?> selected="" <?php } ?>>6</option>
                                       </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                    </div>
                                 </div>
                                
                              </div>
							  
							          <div class="row margin_10">
                                 <div class="col-md-6">
                                    <div class="input-wrap">
                                       <label>Job Type <span class="red">*</span></label>
                                       <select class="form-control" name="job_type" id="job_type">
                                          <option value="" selected="selected">-- Select--</option>
                                          <option value="Full Time" <?php if($data['job_type']=='Full Time') { ?> selected="" <?php } ?>>Full Time</option>
                                          <option value="Part Time" <?php if($data['job_type']=='Part Time') { ?> selected="" <?php } ?>>Part Time</option>
					  <option value="Freelancer" <?php if($data['job_type']=='Freelancer') { ?> selected="" <?php } ?>>Freelancer</option>
                                       </select>
                                    </div>
                                 </div>
                                 <div class="col-md-6">
                                    <div class="input-wrap">
                                       <label>Salary (P.A)<span class="red"></span></label>
                                       <input type="text" name="salary" value="<?php echo $data['salary'];?>"  class="form-control" onKeyPress="return isNumberKey(event)">
                                    </div>
                                 </div>
                              </div>
							  
							  		          <div class="row margin_10">
                                 <div class="col-md-6">
                                    <div class="input-wrap">
                                       <label>Industry <span class="red">*</span></label>
                                       <select name="industry" id="industry" class="form-control">
                                           <option value="">Select Industry</option>
                                                        <?php 
                                          $sql = $user->runQuery("select * from industry");
                                          $sql->execute();
                                          $rw=$sql->fetchAll();
                                          foreach($rw as $row) {
                                         ?>
                                          <option value="<?php echo $row['name'];?>" <?php if($row['name']==$data['industry']) { ?> selected="" <?php } ?>><?php echo $row['name'];?></option>
                                          
                                          <?php } ?>
                                        </select>
                                    </div>
                                 </div>
                                 <div class="col-md-6">
                                    <div class="input-wrap">
                                       <label>Job Role<span class="red">*</span></label>
                                       <input type="text" name="role" value="<?php echo $data['job_role'];?>"  id="role" placeholder="Ex: Graphic Designer" class="form-control">
                                    </div>
                                 </div>
                              </div>
							  
					<div class="row margin_10">
                                 <div class="col-md-6">
                                    <div class="input-wrap">
                                       <label>Education<span class="red">*</span></label>
                                       <select name="education[]" id="education" class="form-control js-example-basic-select2" multiple="multiple">
                                        <?php
                                        $edu=explode(", ",$data['qualification']);
										?>
                       <option value="">Select Education required</option>
                                           <option value="Graduate" <?php if(in_array('Graduate',$edu)) {?> selected <?php } ?>>Graduate</option>
                                           <option value="B.Tech" <?php if(in_array('B.Tech',$edu)) {?> selected <?php } ?>>B.Tech</option>
                                          <option value="Post graduate" <?php if(in_array('Post graduate',$edu)) {?> selected <?php } ?>>Post graduate</option>
                                         <option value="M.Tech" <?php if(in_array('M.Tech',$edu)) {?> selected <?php } ?>>M.Tech</option>
                                         <option value="B.Ed" <?php if(in_array('B.Ed',$edu)) {?> selected <?php } ?>>B.Ed</option>
                                         <option value="B.Pharm" <?php if(in_array('B.Pharm',$edu)) {?> selected <?php } ?>>B.Pharm</option>
                                         <option value="M.Pharm" <?php if(in_array('M.Pharm',$edu)) {?> selected <?php } ?>>M.Pharm</option>
                                         <option value="MBA" <?php if(in_array('MBA',$edu)) {?> selected <?php } ?>>MBA</option>
                                         <option value="MCA" <?php if(in_array('MCA',$edu)) {?> selected <?php } ?>>MCA</option>
                                         <option value="Doctorate" <?php if(in_array('Doctorate',$edu)) {?> selected <?php } ?>>Doctorate</option>
                                         <option value="M.Phil" <?php if(in_array('M.Phil',$edu)) {?> selected <?php } ?>>M.Phil</option>

                                 </select>
                                    </div>
                                 </div>
                                 
                              </div>
							  
							  					<div class="row margin_10">
                                 <div class="col-md-6">
                                    <div class="input-wrap">
                                       <label>More about education<span class="red"></span></label>
                                        <div class="form-group">
                                            
                                             <textarea class="form-control" name="edu_detail"  placeholder="If you want to write more about education" maxlength="200"><?php echo $data['edu_detail'];?></textarea>
                                        </div>
                                    </div>
                                 </div>
                                 <div class="col-md-6">
                                    <div class="input-wrap">
                                       <label>Key skills<span class="red"> </span></label>
                                        <div class="form-group">
                                            
                                            <input class="form-control " id="tags_1" value="<?php echo $data['key_skills'];?>" placeholder="" type="text" name="skill" >
                                        </div>
                                    </div>
                                 </div>
                              </div>
							  
							  <div class="row">
                                 <div class="col-md-6">
							 <div class="input-wrap">
                                       <label>Desired Candidate Profile<span class="red"></span></label>
                                        <div class="form-group">
                                            <textarea name="profile" cols="5" rows="8" class="form-control" placeholder="Desired Candidate profile.."><?php echo $data['candidate_profile'];?></textarea>
                                          
                                        </div>
                                    </div>
                               </div>
                                 <div class="col-md-6">
                             <div class="input-wrap">
                                       <label>Job Description<span class="red"> *</span></label>
                                        <div class="form-group">
                                            <textarea class="form-control" placeholder="Job Description" maxlength="200" name="jobdesc" rows="8" id="jobdesc"><?php echo $data['job_desc'];?></textarea>
                                        </div>
                                    </div>
                                 </div>
                              </div>
							  
						<div class="row ">
                                 <div class="col-md-6">
                                    <div class="input-wrap">
                                       <label>Country <span class="red"></span></label>
                                                   <select id="rcountry"  name="rcountry" class="js-example-basic-select2 form-control rcountry" data-live-search="true" onBlur="checkValue(this.value)">
                                          <option value="" selected="selected">--Select--</option>
                                           <?php
                                                $s = mysqli_query($con,"select * from country");
                                                while ($rw = mysqli_fetch_array($s)) {
                                                    ?>
                                             <option value="<?php echo $rw['country_id']; ?>" <?php if($rw['country_name']==$data['country']) { ?> selected="" <?php } ?>><?php echo $rw['country_name']; ?></option>
                                             <?php } ?>
                                    </select>
                                    </div>
                                 </div>
                                 <div class="col-md-6">
                                    <div class="input-wrap">
                                       <label>State <span class="red"></span></label>
                                        <select id="rstate" name="rstate" class=" show-tick form-control rstate" data-live-search="true" onBlur="checkValue(this.value)">
                                         <?php
										 $cname=$data['country'];
										 $sql=mysqli_query($con,"select country_id from country where country_name='$cname'");
										 $cp=mysqli_fetch_array($sql);
										 $country_id=$cp['country_id'];	
										     
                                         $s = mysqli_query($con,"select * from state where country_id='$country_id'");
                                         while ($rw = mysqli_fetch_array($s)) {
                                                    ?>
                  <option value="<?php echo $rw['state_id']; ?>" <?php if($rw['state_name']==$data['state']) { ?> selected="" <?php } ?>><?php echo $rw['state_name']; ?></option>
                                             <?php } ?>                                   
                                    </select>
                                    </div>
                                 </div>
                              </div>
							  						<div class="row no_margl">
                                 <div class="col-md-6">
                                    <div class="input-wrap">
                                       <label>City <span class="red"></span></label>
                                                    <select id="rcity" name="rcity" class="show-tick form-control rcity" data-live-search="true" onBlur="checkValue(this.value)">
                                          <?php
                                                $s = mysqli_query($con,"select * from city");
                                                while ($rw = mysqli_fetch_array($s)) {
                                                    ?>
                                             <option value="<?php echo $rw['city_id']; ?>" <?php if($rw['city_name']==$data['city']) { ?> selected="" <?php } ?>><?php echo $rw['city_name']; ?></option>
                                             <?php } ?>          
                                         
                                         </select>                                    </div>
                                 </div>
                                 <div class="col-md-6">
                                    <div class="input-wrap">
                                       <label>Contact Person Email <span class="red"></span></label>
                                        <input type="email" name="email" value="<?php echo $data['contact_email'];?>" placeholder="" class="form-control">
                                    </div>
                                 </div>
                              </div>
                              <div class="row margin_10">
                                 <div class="col-md-6">
                                    <div class="input-wrap">
                                       <label>Contact Person Mobile Number <span class="red"></span></label>
                                       <input type="tel" name="mobile" value="<?php echo $data['contact_number'];?>" placeholder="Type your mobile number" class="form-control" onKeyPress="return isNumberKey(event)">
                                    </div>
                                 </div>
                                 <div class="col-md-6  margin_t">
                                    <div class="input-wrap">
					<label>Company website</label>
                                       <input type="text" name="weblink" value="<?php echo $data['website'];?>" placeholder="Type your Company Website(URL)" class="form-control">
                                    </div>
                                 </div>
                              </div>
			<div class="row margin_10">
                            <div class="col-md-6">
                             <div class="input-wrap">
                                       <label>About Company<span class="red"> *</span></label>
                                        <div class="form-group">
                                            <textarea class="form-control" name="about" rows="8" id="about" placeholder=""><?php echo $data['company_about'];?></textarea>
                                        </div>
                                    </div>
                                 </div>
				
			<div class="col-md-6">
                             <div class="input-wrap">
                                       <label>Office Address<span class="red"> </span></label>
                                        <div class="form-group">
                                            <textarea class="form-control" name="address" placeholder=""><?php echo $data['address'];?></textarea>
                                        </div>
                                    </div>
                                 </div>
							
							</div>  
							<div class="col-md-2 col-md-push-5">
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

        <!-- Bootstrap Date Range Picker Dependencies -->
        <script src="bower_components/moment/min/moment.min.js"></script>
        <script src="bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
        <script src="assets/js/init-daterangepicker.js"></script>

        <!-- Bootstrap Date Range Picker Dependencies -->
        <script src="bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
        <script src="assets/js/init-datepicker.js"></script>

        <!-- Bootstrap Date Range Picker Dependencies -->
        <script src="bower_components/bootstrap-timepicker/js/bootstrap-timepicker.js"></script>
        <script src="assets/js/init-timepicker.js"></script>

        <!-- Bootstrap Color Picker Dependencies -->
        <script src="bower_components/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
        <script src="assets/js/init-colorpicker.js"></script>
        
    
    </body>

</html>
