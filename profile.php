<?php
   error_reporting(0);
   include("include/class.user.php");
   $user = new USER();
   
   // check user Login
   if(!$user->is_logged_in())
   {
    $user->redirect("login.php");
   }
  include("include/mydb.php");
   $username= $_SESSION['USER_name'];
   $uid=$_SESSION['USER_ID'];
   
   $stmt=$user->runQuery("select * from job_users where id='$uid'");
   $stmt->execute();
   $data=$stmt->fetch();
   
   
     // for checking user data /profile photo/resume approval by admin
   
      $stmt=$user->runQuery("select * from photo_approval where userid=:userID and user_for='jobseeker'");
   $stmt->bindparam(":userID",$uid);
   $stmt->execute();
   $n=$stmt->rowCount();
   $row=$stmt->fetch(PDO::FETCH_ASSOC);
   $photo_ap=$row['pp_photo'];
   $resume_ap=$row['resume'];
   
   
   // profile photo upload script
          
     if(isset($_POST['photo-btn']))
         {
              $photo=$_FILES['file']['name'];
              $rd=rand(0000,9999);
              $photo=$rd.$photo;
              $photo_tmp=$_FILES['file']['tmp_name'];
               $extension =pathinfo($photo,PATHINFO_EXTENSION);
              $format=array('jpg','jpeg','JPG','png','PNG');
            if(!in_array($extension,$format)) 
             { ?>
<script>
   alert('Please upload profile photo in jpg,png format only.');			   
</script>
<?php } 
   else {
         move_uploaded_file($photo_tmp,"images/jobseeker/$photo");
         $stmt=$user->runQuery("update job_users set photo='$photo' where id='$uid'");
         $stmt->execute();
         $stmt=$user->runQuery("update photo_approval set pp_photo='0' where userid='$uid'");
         $stmt->execute();
   ?>
<script>
   setTimeout(function() { window.location=window.location;},100);  
</script>
<?php
   }
   
   }
    
   ?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
      <title>MeeM.one Job Portal</title>
      <!-- Fav Icon -->
      <link rel="shortcut icon" href="favicon.ico">
      <!-- Bootstrap -->
      <link href="css/bootstrap.min.css" rel="stylesheet">
      <link href="css/owl.carousel.css" rel="stylesheet">
      <link href="css/font-awesome.css" rel="stylesheet">
      <link href="css/style.css" rel="stylesheet">
      <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic' rel='stylesheet' type='text/css'>
      <link href="https://fonts.googleapis.com/css?family=Alice" rel="stylesheet">
      <link rel="stylesheet" href="css/token-input.css">
      <link href="css/fSelect.css" rel="stylesheet">
       <link rel="stylesheet" href="css/select2.min.css">
      <link rel="stylesheet" href="css/main.min.css">
      <!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
      <script src="js/jquery-2.1.4.min.js"></script> 
   </head>
   <body>
      <!--header start-->
      <?php include("include/profile_header.php");?>
      <!--header start end--> 
      <!--Inner Content start-->
      <div class="inner-content loginWrp">
         <div class="container">
            <!--Login Start-->
            <div class="row">
               <div class="col-md-12 col-xs-12 user_profile">
                  <?php if($photo_ap==2 || $photo_ap==0 ) { 
                     ?>
                  <div class="col-md-2 col-xs-6 col-sm-3 text-center">
                     <?php  if(!$data['photo']) { ?>
                     <img src="images/profile.png" class="p_border"/>
                     <?php } ?>
                     <?php if($photo_ap==0 && !empty($data['photo'])) { ?>
                     <img src="images/admin-app.png" class="p_border"/>
                     <?php } ?>
                     <?php if($photo_ap==2) { ?>
                     <img src="images/rejected.png" class="p_border"/>
                     <?php } ?>
                     <form method="post" enctype="multipart/form-data">
                        <div class="col-md-12 col-xs-12 col-sm-12 no_padd">              
                           <input id="fileUpload2" name="file" class="form-control input-xs" type="file">
                        </div>
                        <div class="col-md-12 col-xs-12 inp_m">
                           <input type="Submit" value="Submit" name="photo-btn" class="btn btn-info"/>
                        </div>
                     </form>
                  </div>
                  <?php } if($data['photo'] && $photo_ap==1) { ?>
                  <div class="col-md-2 col-xs-6 col-sm-3 text-center">
                     <img src="images/jobseeker/<?php echo $data['photo'];?>" class="p_border"/>
                  </div>
                  <?php } ?>
                  <div class="col-md-7 col-sm-6  col-xs-6">
                     <h4 class="heading1"><?php echo $username;?></h4>                   
                     <div class="col-md-12 no_padd">
                        <div class="col-md-6 no_padd">
                           <div class="col-md-12 no_padd p_heading1">
                              <div class="col-md-1 col-xs-2 col-sm-1 no_padd"><i class="fa fa-map-marker icon_1"></i></div>
                              <div class="col-md-11 col-sm-10 col-xs-10 no_padd"><?php echo $data['rcity'];?></div>
                           </div>
                           <div class="clearfix"></div>
                           <div class="col-md-12 new_mm p_heading1">                            
                             <div class="col-md-12 no_padd p_heading1"><i class="fa fa-suitcase icon_2"></i><?php if($data['exp_year']==0) { echo 'Fresher';} if($data['exp_year']) { echo $data['exp_year'] .' years (EXP)';} ?>  </div>
                           </div>
                        </div>
                        <div class="col-md-6 no_padd">
                           <div class="col-md-12 col-xs-12 new_mm p_heading1">
                              <div class="col-md-1 col-xs-2 col-sm-1 no_padd"><i class="fa fa-phone icon_1"></i></div>
                              <div class="col-md-11 col-sm-10 col-xs-10 no_padd"><?php echo $data['mcode'].$data['mobile'];?></div>
                           </div>
                           <div class="col-md-12 col-xs-12 new_mm p_heading1">
                              <div class="col-md-1 col-xs-2 col-sm-1 no_padd"><i class="fa fa-envelope-o icon_1 "></i></div>
                              <div class="col-md-11 col-sm-10 col-xs-10 no_padd"><?php echo $data['email'];?></div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-md-3 col-sm-3 col-xs-12">
                     <div class="col-md-12 mmargin_t"><a href="#" class="btn btn-warning" data-toggle="modal" data-target="#myModal3"><i class="fa fa-cog icon_3"></i>Account Settings</a></div>
                     <!-- Modal Popup for Account Settings-->
                     <div class="modal fade" id="myModal3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                           <div class="modal-content">
                              <div class="modal-header">
                                 <h4 class="modal-title" id="myModalLabel">Account Settings</h4>
                              </div>
                              <div class="modal-body">
                                 <h4 id="error3"><?php if(isset($msg)) { echo $msg; }?></h4>
                                 <form role="form" id="settingForm"  method="post">
                                    <input type="hidden" name="uid" value="<?php echo $uid;?>">
                                    <div class="col-md-12 mmargin_tt">
                                       <div class="col-md-12 mmargin_tt">
                                          <div class="col-md-12">
                                             <label>Old Password <span class="red">*</span></label>
                                             <input type="password" name="oldpswd" class="form-control no_radius" id="oldpwd" maxlength="20">
                                             <div id="error" style="color:lightcoral"></div>
                                          </div>
                                       </div>
                                       <div class="col-md-12 mmargin_tt">
                                          <div class="col-md-12">
                                             <label>New Password <span class="red">*</span></label>
                                             <input type="password" name="newpswd" class="form-control no_radius" id="newpwd" maxlength="20">
                                             <div id="error2" style="color:lightcoral"></div>
                                          </div>
                                       </div>
                                       <div class="col-md-5 mmargin_tt col-md-push-5 col-xs-push-4">
                                          <input type="Submit" name="setting" class="btn btn-success" value="Save changes">
                                       </div>
                                 </form>
                                 </div>
                                 <div class="clearfix"></div>
                                 <div class="modal-footer" style="margin-top:10px;">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                 </div>
                                 </form>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="clearfix"></div>
            <!--User Profile End--> 
            <div class="row">
               <div class="col-md-12 col-xs-12  user_prob">
                  <div class="col-md-3 pull-right"><a href="#" class="btn btn-success" data-toggle="modal" data-target="#myModal2"><i class="fa fa-pencil-square-o icon_3"></i>Edit Profile</a></div>
                  <!-- Modal Popup for General Information-->
                  <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                     <div class="modal-dialog">
                        <div class="modal-content">
                           <div class="modal-header">
                              <h4 class="modal-title" id="myModalLabel">General Information</h4>
                              <div id="editmsg2"></div>
                           </div>
                           <div class="modal-body">
                              <form role="form"  method="post" id="editForm2">
                                 <input type="hidden" name="editform" value="general_info">
                                  <input type="hidden" name="uid" value="<?php echo $uid;?>">
                                 <div class="row">
                                    <div class="col-md-4">
                                       <label>Physique</label>
                                       <div class="styled-select">
                                          <select class="form-control" name="physique" id="physique">
                                             <option value="" selected>--Select--</option>
                                             <option value="Slim"  <?php if($data['body_type']=='Slim') {  echo 'selected';  } ?>>Slim</option>
                                             <option value="Athletic"  <?php if($data['body_type']=='Athletic') {  echo 'selected';  } ?>>Athletic</option>
                                             <option value="Build Muscular"  <?php if($data['body_type']=='Build Muscular') {  echo 'selected';  } ?>>Build Muscular</option>
                                             <option value="Slight over weight"  <?php if($data['body_type']=='Slight over weight') {  echo 'selected';  } ?>>Slight over weight</option>
                                             <option value="Moderate over weight"  <?php if($data['body_type']=='Moderate over weight') {  echo 'selected';  } ?>>Moderate over weight</option>
                                             <option value="Heavy over weight"  <?php if($data['body_type']=='Heavy over weight') {  echo 'selected';  } ?>>Heavy over weight</option>
                                          </select>
                                          <span class="fa fa-sort-desc"></span>
                                       </div>
                                    </div>
                                    <div class="col-md-4">
                                       <label>Health </label>
                                       <div class="styled-select">
                                          <select class="form-control" name="health" id="healthy">
                                             <option value="" selected>--Select--</option>
                                             <option value="Healthy" <?php if($data['health']=='Healthy') {  echo 'selected';  } ?>>Healthy</option>
                                             <option value="Physical challenged" <?php if($data['health']=='Physical challenged') {  echo 'selected';  } ?>>Physical challenged</option>
                                             <option value="Minor health issue" <?php if($data['health']=='Minor health issue') {  echo 'selected';  } ?>>Minor health issue</option>
                                          </select>
                                          <span class="fa fa-sort-desc"></span>
                                       </div>
                                    </div>
                                    <div class="col-md-4">
                                       <label>Religion</label>
                                       <div class="styled-select">
                                          <select class="form-control" name="religion" id="religion">
                                             <option value="" selected>--Select--</option>
                                             <option value="Islam" <?php if($data['religion']=='Islam') {  echo 'selected';  } ?>>Islam</option>
                                             <option value="Hindu"  <?php if($data['religion']=='Hindu') {  echo 'selected';  } ?>>Hindu</option>
                                             <option value="Christian"  <?php if($data['religion']=='Christian') {  echo 'selected';  } ?>>Christian</option>
                                             <option value="Sikh"  <?php if($data['religion']=='Sikh') {  echo 'selected';  } ?>>Sikh</option>
                                          </select>
                                          <span class="fa fa-sort-desc"></span>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="row meemjm">
                                    <div class="col-md-4">
                                       <label>Marital Status</label>
                                       <div class="styled-select">
                                          <select class="form-control" name="marital" id="marital">
                                             <option value="" selected>--Select--</option>
                                             <option value="Married"  <?php if($data['marital_status']=='Married') {  echo 'selected';  } ?>>Married</option>
                                             <option value="Unmarried"  <?php if($data['marital_status']=='Unmarried') {  echo 'selected';  } ?>>Unmarried</option>
                                          </select>
                                          <span class="fa fa-sort-desc"></span>
                                       </div>
                                    </div>
                                   
                                    <div class="col-md-4">
                                       <label>Nationality <span class="red">*</span> </label>
                                       <div class="styled-select">
                                          <select class="form-control" name="nationality" id="nationality">
                                             <option value="" selected="selected">-- Select --</option>
                                             <?php
                                                $dt=$user->getNationality();
                                                 	 foreach($dt as $nr) {?>
                                             <option value="<?php echo $nr['nation_name'];?>"  <?php if($data['nationality']==$nr['nation_name']) {  echo 'selected';  } ?>><?php echo $nr['nation_name'];?></option>
                                             <?php } ?>
                                          </select>
                                          <span class="fa fa-sort-desc"></span>
                                       </div>
                                    </div>
                                 </div>
                                  <script type="text/javascript">
                                    function calculatecm() {
                
                                        var feet = document.getElementById("feet").value;
                                        var inch = document.getElementById("inch").value;
                                        var cm = Math.round(feet * 30.5 + inch * 2.54);
                                        document.getElementById("ucm").value = cm;
                                    }
                                 </script>
                                 <div class="row meemjm">
                                    <div class="col-md-4">
                                       <label>Height</label>
                                       <div class="styled-select">
                                           <select id="feet" name="ufeet" class="form-control"  onChange="calculatecm()" required="">
                                             <option value="" selected="selected">Feet</option>
                                             <?php
                                               $height=$data['height'];
                                               $feet=floor($height);
                                               $inch=substr($height,2);
                                              $i=1; while($i<11) { ?>
                                             <option value="<?php echo $i;?>" <?php if($feet==$i) {  echo 'selected';  } ?>><?php echo $i;?></option>
                                             <?php $i++;} ?>
                                             
                                          </select>
                                          <span class="fa fa-sort-desc"></span>
                                       </div>
                                    </div>
                                    <div class="col-md-1  height_ac hidden-xs hidden-sm">+</div>
                                    <div  class="col-md-4">
                                       <label>Inch</label>
                                       <div class="styled-select">
                                          <select id="inch" name="uinch" class="form-control" onChange="calculatecm()">
                                            <option value="" selected="selected">Inch</option>
                                            <?php
                                             $i=0; while($i<11) { ?>
                                             <option value="<?php echo $i;?>" <?php if($inch==$i) {  echo 'selected';  } ?>><?php echo $i;?></option>
                                             <?php $i++;} ?>
                                            
                                             
                                          </select>
                                          <span class="fa fa-sort-desc"></span>
                                       </div>
                                    </div>
                                    <div class="col-md-1  height_ab hidden-xs hidden-sm">=</div>
                                    <div  class="col-md-4">
                                       <label>CM </label>
                                       <div class="input-wrap">
                                          <input type="text" name="cmheight" value="<?php echo $data['height_cm'];?>" id="ucm" class="form-control" readonly>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="row meemjm">
                                   <div class="col-md-4">
                                    <label>Residence Country <span class="red">*</span></label>
                                    <div class="styled-select">
                                       <select id="rcountry" name="rcountry" onBlur="myFunction('step1')" class="form-control rcountry" required="">
                                          <option value="" selected="selected">-- Select --</option>
                                          <?php
                                             $s = mysqli_query($con,"select * from country");
                                             while ($rw = mysqli_fetch_array($s)) {
                                                 ?>
                                          <option value="<?php echo $rw['country_id']; ?>"  <?php if($data['rcountry']==$rw['country_name']) {  echo 'selected';  } ?>><?php echo $rw['country_name']; ?></option>
                                          <?php } ?>
                                       </select>
                                       <span class="fa fa-sort-desc"></span>
                                    </div>
                                 </div>
                                    <div class="col-md-4">
                                       <label>Residence State <span class="red">*</span></label>
                                       <div class="styled-select">
                                           <select id="rstate[]" name="rstate" onBlur="myFunction('step1')" class="form-control rstate">
                                        <?php
                                         $s =$user->runQuery("select * from state");
                                          $s->execute();
                                          $row=$s->fetchAll();
                                          foreach($row as $rw) {
                                          ?>
                                        <option value="<?php echo $rw['state_id']; ?>" <?php if($data['rstate']==$rw['state_name']) {  echo 'selected';  } ?>><?php echo $rw['state_name'];?></option>
                                      <?php } ?>
                                       </select>
                                          <span class="fa fa-sort-desc"></span>
                                       </div>
                                    </div>
                                    <div class="col-md-4">
                                       <label>Residence City <span class="red">*</span></label>
                                       <div class="styled-select">
                                         <select id="rcity[]" name="rcity" onBlur="myFunction('step1')" class="form-control rcity" required="">
                                        <?php
                                          $s =$user->runQuery("select * from city");
                                          $s->execute();
                                          $row=$s->fetchAll();
                                          foreach($row as $rw) {
                                            ?>
                                          <option value="<?php echo $rw['city_id']; ?>" <?php if($data['rcity']==$rw['city_name']) {  echo 'selected';  } ?>><?php echo $rw['city_name']; ?></option>
                                        <?php } ?>
                                       </select>
                                          <span class="fa fa-sort-desc"></span>
                                       </div>
                                    </div>
                                 </div>
                                
                                 <div class="col-md-12 mmargin_tt col-md-push-5">
                                    <input type="Submit" name="button2" class="btn btn-info" value="Save changes">
                                 </div>
                              </form>
                              <div class="clearfix"></div>
                           </div>
                           <div class="modal-footer">
                              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                           </div>
                           </form>
                        </div>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-md-12  no_padd">
                        <h4>General Information</h4>
                        <div class="col-md-6 col-xs-12 ">
                           <div class="col-md-6 col-xs-6 my_border ph_text">Gender</div>
                           <div class="col-md-6 col-xs-6 sh_text"><?php echo $data['gender'];?></div>
                        </div>
                        <div class="col-md-6 col-xs-12 ">
                           <div class="col-md-6 col-xs-6 my_border ph_text">Date of Birth</div>
                           <div class="col-md-6 col-xs-6 sh_text"><?php echo $data['birth_date'];?></div>
                        </div>
                     </div>
                     <div class="col-md-12 no_padd user_mar">
                        <div class="col-md-6 col-xs-12 ">
                           <div class="col-md-6 col-xs-6 my_border ph_text">Marital Status</div>
                           <div class="col-md-6 col-xs-6 sh_text"><?php echo $data['marital_status'];?></div>
                        </div>
                        <div class="col-md-6 col-xs-12 ">
                           <div class="col-md-6 col-xs-6 my_border ph_text">Physique </div>
                           <div class="col-md-6 col-xs-6 sh_text"><?php echo $data['body_type'];?></div>
                        </div>
                     </div>
                     <div class="col-md-12 no_padd user_mar">
                        <div class="col-md-6 col-xs-12 ">
                           <div class="col-md-6 col-xs-6 my_border ph_text">Health </div>
                           <div class="col-md-6 col-xs-6 sh_text"><?php echo $data['health'];?></div>
                        </div>
                        <div class="col-md-6 col-xs-12 ">
                           <div class="col-md-6 col-xs-6 my_border ph_text">Religion </div>
                           <div class="col-md-6 col-xs-6 sh_text"><?php echo $data['religion'];?></div>
                        </div>
                     </div>
                     <div class="col-md-12 no_padd user_mar">
                        <div class="col-md-6 col-xs-12 ">
                           <div class="col-md-6 col-xs-6 my_border ph_text">Height  </div>
                           <div class="col-md-6 col-xs-6 sh_text"><?php echo $data['height'];?></div>
                        </div>
                        <div class="col-md-6 col-xs-12 ">
                           <div class="col-md-6 col-xs-6 my_border ph_text">Native Country </div>
                           <div class="col-md-6 col-xs-6 sh_text"><?php echo $data['ncountry'];?></div>
                        </div>
                     </div>
                     <div class="col-md-12 no_padd user_mar">
                        <div class="col-md-6 col-xs-12 ">
                           <div class="col-md-6 col-xs-6 my_border ph_text">Native State </div>
                           <div class="col-md-6 col-xs-6 sh_text"><?php echo $data['nstate'];?></div>
                        </div>
                        <div class="col-md-6 col-xs-12 ">
                           <div class="col-md-6 col-xs-6 my_border ph_text">Native City </div>
                           <div class="col-md-6 col-xs-6 sh_text"><?php echo $data['ncity'];?></div>
                        </div>
                     </div>
                     <div class="col-md-12 no_padd user_mar">
                        <div class="col-md-6 col-xs-12 ">
                           <div class="col-md-6 col-xs-6 my_border ph_text">Residence Country </div>
                           <div class="col-md-6 col-xs-6 sh_text"><?php echo $data['rcountry'];?></div>
                        </div>
                        <div class="col-md-6 col-xs-12 ">
                           <div class="col-md-6 col-xs-6 my_border ph_text">Residence State </div>
                           <div class="col-md-6 col-xs-6 sh_text"><?php echo $data['rstate'];?></div>
                        </div>
                     </div>
                     <div class="col-md-12 no_padd user_mar">
                        <div class="col-md-6 col-xs-12 ">
                           <div class="col-md-6 col-xs-6 my_border ph_text">Residence City </div>
                           <div class="col-md-6 col-xs-6 sh_text"><?php echo $data['rcity'];?></div>
                        </div>
                        <div class="col-md-6 col-xs-12 ">
                           <div class="col-md-6 col-xs-6 my_border ph_text">Nationality  </div>
                           <div class="col-md-6 col-xs-6 sh_text"><?php echo $data['nationality'];?></div>
                        </div>
                     </div>
                     <div class="col-md-12 no_padd user_mar">
                        <div class="col-md-6 col-xs-12 ">
                           <div class="col-md-6 col-xs-6 my_border ph_text">Native Language </div>
                           <div class="col-md-6 col-xs-6 sh_text"><?php echo $data['native_lang'];?></div>
                        </div>
                     </div>
                     <div class="clearfix"></div>
                  </div>
                  <!--End row-->
                  <div class="col-md-12 no_padd usr_bor"></div>
                  <div class="col-md-3 pull-right"><a href="#" class="btn btn-success" data-toggle="modal" data-target="#myModal4"><i class="fa fa-pencil-square-o icon_3"></i>Edit Profile</a></div>
                  <!-- Modal Popup for Education & Career -->
                  <div class="modal fade" id="myModal4" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                     <div class="modal-dialog">
                        <div class="modal-content">
                           <div class="modal-header">
                              <h4 class="modal-title" id="myModalLabel">Education & Career</h4>
                              <div id="editmsg3"></div>
                           </div>
                           <div class="modal-body">
                            <form role="form"  method="post" id="editForm1">
                                <input type="hidden" name="editform" value="education">
                                <input type="hidden" name="uid" value="<?php echo $uid;?>">
                                 <div class="row">
                                    <div class="col-md-6">
                                       <label>Education <span class="red">*</span></label>
                                       <select class="test" id="education" name="education[]" multiple="multiple" required="">
                                          <option value="">None selected</option>
                                           <?php 
                                           $user_edu=explode(', ',$data['education']);
                                          $sql = $user->runQuery("select education from education_tble");
                                          $sql->execute();
                                          $rw=$sql->fetchAll();
                                          foreach($rw as $row) {
                                         ?>
                                           <option value="<?php echo $row['education'];?>" <?php if(in_array($row['education'],$user_edu)) { ?> selected="" <?php } ?>><?php echo $row['education'];?></option>
                                          <?php } ?>
                                       </select>
                                    </div>
                                    <div class="col-md-6">
                                       <label>Company/Industry/Organization</label>
                                        <select class="test" multiple="multiple" id="company" name="company[]">
                                       <?php
                                         $user_industry=explode(', ',$data['industry']);
                                          $dt=$user->getIndustry();
                                          foreach($dt as $er) {?>
                                       <option value="<?php echo $er['name'];?>" <?php if(in_array($er['name'],$user_industry)) { ?> selected="" <?php } ?>><?php echo $er['name'];?></option>
                                       <?php } ?>
                                    </select>
                                    </div>
                                 </div>
                                 <div class="row sel_margin">
                                   
                                    <div class="col-md-12">
                                       <label>Main Skills/Job Positions </label>
                                <select  name="skill[]" id="skill_input" class="form-control js-example-basic-select2" multiple="multiple" style="width: 100%">
                              <option value="">Select Main Skills/Positions required</option>
                      <?php
                       $skills=explode(', ',$data['skill']);
                       $query =$user->runQuery("SELECT  skill_name as name FROM skill_tble");
                       $query->execute();
                       $rm=$query->fetchAll();
                       foreach($rm as $row) {
                       ?>
                      <option value="<?php echo $row['name'];?>"  <?php if(in_array($row['name'],$skills)) { ?> selected="" <?php } ?>><?php echo $row['name'];?></option>
                      <?php } ?>
                       </select>
                                    </div>
                                 </div>
                                 <div class="row sel_margin">
                                     <div class="col-md-6">
                                       <label>Total years of work experience</label>
                                       <div class="styled-select">
                                           <select class="form-control no_radius" id="expy" name="expY" required="">
                                           <option value="Fresher" <?php if($data['exp_year']=='Fresher') { ?> selected="" <?php } ?>>0 Year</option>
                                            <option value="1" <?php if($data['exp_year']==1) { ?> selected="" <?php } ?>>2</option>
                                           <option value="2" <?php if($data['exp_year']==2) { ?> selected="" <?php } ?>>2</option>
                                          <option value="3" <?php if($data['exp_year']==3) { ?> selected="" <?php } ?>>3</option>
                                          <option value="4" <?php if($data['exp_year']==4) { ?> selected="" <?php } ?>>4</option>
                                           <option value="5" <?php if($data['exp_year']==5) { ?> selected="" <?php } ?>>5</option>
                                          <option value="6" <?php if($data['exp_year']==6) { ?> selected="" <?php } ?>>6</option>
                                          <option value="7" <?php if($data['exp_year']==7) { ?> selected="" <?php } ?>>7</option>

                                        <option value="8" <?php if($data['exp_year']==8) { ?> selected="" <?php } ?>>8</option>
                                        <option value="9" <?php if($data['exp_year']==9) { ?> selected="" <?php } ?>>7</option>
                                        <option value="10" <?php if($data['exp_year']==10) { ?> selected="" <?php } ?>>10</option>
                                       <option value="11" <?php if($data['exp_year']==11) { ?> selected="" <?php } ?>>11</option>
                                       <option value="12" <?php if($data['exp_year']==12) { ?> selected="" <?php } ?>>12</option>
                                       <option value="12" <?php if($data['exp_year']==12) { ?> selected="" <?php } ?>>12</option>
                                       <option value="13" <?php if($data['exp_year']==13) { ?> selected="" <?php } ?>>13</option>
                                       <option value="14" <?php if($data['exp_year']==14) { ?> selected="" <?php } ?>>14</option>
                                         <option value="15" <?php if($data['exp_year']==15) { ?> selected="" <?php } ?>>15</option>
                                       </select>
                                          <span class="fa fa-sort-desc"></span>
                                       </div>
                                    </div>
                                    <div class="col-md-6">
                                       <label>Languages Known</label>
                                    <?php
                                      $languages=explode(' ',$data['languages_known']);
                                      $english_label=explode(' ',$data['english_label']);
                                      $urdu_label=explode(' ',$data['urdu_label']);
                                      $telugu_label=explode(' ',$data['telugu_label']);
                                    ?>
                                       <div class="multiselect">
                                          <div class="selectBox fom-control" onClick="showCheckboxes()">
                                             <select name="lang_known">
                                                <option>Select Languages</option>
                                             </select>
                                             <div class="overSelect"></div>
                                          </div>
                                          <div id="checkboxes">
                                             <label class="lable_t">
                                             <input type="checkbox" name="english" value="English" id="english" <?php if(in_array('English',$languages)) { echo 'checked';} ?> onchange="selectlabel()" /> English</label>
                                             <div id="englishlabel" style="display:none">                  
                                                <input type="checkbox" name="eng_read" value="Read" <?php if(in_array('Read',$english_label)) { echo 'checked';} ?>> Read  
                                                <input type="checkbox" name="eng_write" value="Write" <?php if(in_array('Write',$english_label)) { echo 'checked';} ?>> Write   
                                                <input type="checkbox" value="Speak" name="eng_speak" <?php if(in_array('Speak',$english_label)) { echo 'checked';} ?>> Speak
                                             </div>
                                             <label class="lable_t">
                                             <input type="checkbox" name="urdu" <?php if(in_array('Urdu',$languages)) { echo 'checked';} ?> value="Urdu" id="urdu" onchange="selectlabel2()" /> Urdu</label>
                                             <div id="urdulabel" style="display:none">                  
                                                <input type="checkbox" name="urdu_read" value="Read" <?php if(in_array('Read',$urdu_label)) { echo 'checked';} ?>> Read  
                                                <input type="checkbox" name="urdu_write" value="Write" <?php if(in_array('Write',$urdu_label)) { echo 'checked';} ?>> Write   
                                                <input type="checkbox" value="Speak" name="urdu_speak" <?php if(in_array('Speak',$urdu_label)) { echo 'checked';} ?>> Speak
                                             </div>
                                             <label class="lable_t">
                                             <input type="checkbox" name="telugu" value="Telugu" <?php if(in_array('Telugu',$languages)) { echo 'checked';} ?> id="telugu" onchange="selectlabel3()" /> Telugu</label>
                                             <div id="telugulabel" style="display:none">                  
                                                <input type="checkbox" name="telugu_read" value="Read" <?php if(in_array('Read',$telugu_label)) { echo 'checked';} ?>> Read  
                                                <input type="checkbox" name="telugu_write" value="Write" <?php if(in_array('Write',$telugu_label)) { echo 'checked';} ?>> Write   
                                                <input type="checkbox" value="Speak" name="telugu_speak" <?php if(in_array('Speak',$telugu_label)) { echo 'checked';} ?>> Speak
                                             </div>
                                             <script>
                                                function selectlabel()
                                                {
                                                // Get the checkbox
                                                               var checkBox = document.getElementById("english");
                                                if (checkBox.checked == true){
                                                $("#englishlabel").show();
                                                } else {
                                                $("#englishlabel").hide();
                                                }					   
                                                }
                                                function selectlabel2()
                                                {
                                                // Get the checkbox
                                                               var checkBox2 = document.getElementById("urdu");
                                                if (checkBox2.checked == true){
                                                $("#urdulabel").show();
                                                } else {
                                                $("#urdulabel").hide();
                                                }					   
                                                }   
                                                
                                                
                                                function selectlabel3()
                                                {
                                                // Get the checkbox
                                                               var checkBox3 = document.getElementById("telugu");
                                                if (checkBox3.checked == true){
                                                $("#telugulabel").show();
                                                } else {
                                                $("#telugulabel").hide();
                                                }					   
                                                }   	   
                                                
                                                
                                             </script>          
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="row sel_margin">
                                    <div class="col-md-6">
                                       <label>Current Designation/Position </label>
                                       <div class="styled-select">
                                           <select class="form-control" name="position" id="position">
                                          <option value="" selected>--Select--</option>
                                           <?php
                                             $dr=$user->getJob_position();
                                             foreach($dr as $cr) {?>
                                          <option value="<?php echo $cr['job_position'];?>" <?php if($data['old_role']==$cr['job_position']) {  echo 'selected';  } ?>><?php echo $cr['job_position'];?></option>
                                          <?php } ?>                                      
                                      </select>
                                          <span class="fa fa-sort-desc"></span>
                                       </div>
                                    </div>
                                    <div class="col-md-6">
                                       <label>Current Earning Anually</label> 
                                         <input type="text" value="<?php echo $data['current_salary'];?>" class="form-control no_radius" name="current_salary" id="msalary">
                                    </div>
                                 </div>
                                
                                 <div class="col-md-12 mmargin_tt col-md-push-5">
                                    <input type="Submit" name="button2" class="btn btn-info" value="Save changes">
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
                  <div class="row">
                     <div class="col-md-12  no_padd">
                        <h4 class="user_nom">Education & Career</h4>
                        <div class="col-md-6 col-xs-12 ">
                           <div class="col-md-6 col-xs-6 my_border ph_text">Education </div>
                           <div class="col-md-6 col-xs-6 sh_text"><?php echo $data['education'];?></div>
                        </div>
                        <div class="col-md-6 col-xs-12 ">
                           <div class="col-md-6 col-xs-6 my_border ph_text">Company/Industry/Organization work</div>
                           <div class="col-md-6 col-xs-6 sh_text"><?php echo $data['industry'];?></div>
                        </div>
                     </div>
                     <div class="col-md-12 no_padd user_mar">
                        <div class="col-md-6 col-xs-12 ">
                           <div class="col-md-6 col-xs-6 my_border ph_text">Total years of work experience</div>
                           <div class="col-md-6 col-xs-6 sh_text"><?php echo $data['exp_year'];?> Years</div>
                        </div>
                        <div class="col-md-6 col-xs-12 ">
                           <div class="col-md-6 col-xs-6 my_border ph_text">Main Skills/Job Positions </div>
                           <div class="col-md-6 col-xs-6 sh_text"><?php echo $data['skill'];?></div>
                        </div>
                     </div>
                     <div class="col-md-12 no_padd user_mar">
                        <div class="col-md-6 col-xs-12 ">
                           <div class="col-md-6 col-xs-6 my_border ph_text">Year of Experience  </div>
                           <div class="col-md-6 col-xs-6 sh_text"><?php echo $data['skill_exp'];?> Years</div>
                        </div>
                        <div class="col-md-6 col-xs-12 ">
                           <div class="col-md-6 col-xs-6 my_border ph_text">Languages Known </div>
                           <div class="col-md-6 col-xs-6 sh_text">
                             <?php  $languages=explode(' ',$data['languages_known']); foreach($languages as $lang) {  echo $lang;?>
                              <?php $lang_label=strtolower($lang); 
                               if(trim($data["$lang_label".'_label'])!='') {
                                ?>
                               <span class="lan_g">(<?php 
                                echo $data["$lang_label".'_label'];?>)<?php } ?></span><br> <?php } ?>
                               
                         </div>
                        </div>
                     </div>
                     <div class="col-md-12 no_padd user_mar">
                        <div class="col-md-6 col-xs-12 ">
                           <div class="col-md-6 col-xs-6 my_border ph_text">Current Earning</div>
                           <div class="col-md-6 col-xs-6 sh_text"><?php echo $data['currency'];?> <?php echo $data['current_salary'];?></div>
                        </div>
                        <div class="col-md-6 col-xs-12 ">
                           <div class="col-md-6 col-xs-6 my_border ph_text">Current/Last Position held </div>
                           <div class="col-md-6 col-xs-6 sh_text"><?php echo $data['old_role'];?></div>
                        </div>
                     </div>
                     <div class="col-md-12 no_padd user_mar">
                        <div class="col-md-6 col-xs-12 ">
                           <div class="col-md-6 col-xs-6 my_border ph_text">Are you willing to travel? </div>
                           <div class="col-md-6 col-xs-6 sh_text"><?php echo $data['travel'];?>,<?php if($data['travel_by']>0) { echo $data['travel_by'].'%';}?></div>
                        </div>
                     </div>
                     <div class="clearfix"></div>
                  </div>
                  <!--End row--> 
                  <div class="col-md-12 no_padd usr_bor"></div>
                  <div class="col-md-3 pull-right"><a href="#" class="btn btn-success" data-toggle="modal" data-target="#myModal5"><i class="fa fa-pencil-square-o icon_3"></i>Edit Profile</a></div>
                  <!-- Modal Popup for Job Preferences Details-->
                  <div class="modal fade" id="myModal5" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                     <div class="modal-dialog">
                        <div class="modal-content">
                           <div class="modal-header">
                              <h4 class="modal-title" id="">Job Preferences Details</h4>
                              <div id="editmsg4"></div>
                           </div>
                           <div class="modal-body">
                              <form role="form"  method="post" id="editForm3">
                              <input type="hidden" name="editform" value="preferences">
                              <input type="hidden" name="uid" value="<?php echo $uid;?>">
                                 <div class="row meemjm">
                                    <div class="col-md-6">
                                       <label>Preferred industry/company/organization</label>
                                        <select class="test" multiple="multiple" id="industry" name="industry[]" required="">
                                           <?php 
                                           $prefer_industry=explode(', ',$data['prefer_industry']);

                                          $rm=$user->getIndustry();
                                          foreach($rm as $dtt) {?>
                                       <option value="<?php echo $dtt['name'];?>" <?php if(in_array($dtt['name'],$prefer_industry)) { ?> selected="" <?php } ?>><?php echo $dtt['name'];?></option>
                                       <?php } ?>
                                       </select>
                                    </div>
                                    <div class="col-md-6">
                                       <label>Preferred Work Designation</label>
                                       <select class="test" multiple="multiple" id="pwork" name="pwork[]">
                                           <option value="" selected>--Select--</option>
                                           <?php
                                             $dr=$user->getJob_position();
                                             foreach($dr as $cr) {?>
                                          <option value="<?php echo $cr['job_position'];?>" <?php if($data['prefer_role']==$cr['job_position']) {  echo 'selected';  } ?>><?php echo $cr['job_position'];?></option>
                                          <?php } ?>    
                                       </select>
                                    </div>
                                 </div>
                                 <div class="row meemjm">
                                    <div class="col-md-6">
                                       <label>Preferred Job Type</label>
                                         <select class="test" multiple="multiple" id="jobtype" name="jobtype[]">
                        <option value="Full Time" <?php if($data['prefer_jobType']=='Full Time') {  echo 'selected';  } ?>>Full Time</option>
                              <option value="Part Time" <?php if($data['prefer_jobType']=='Part Time') { ?> selected="" <?php } ?>>Part Time</option>
                              <option value="Freelancer" <?php if($data['prefer_jobType']=='Freelancer') { ?> selected="" <?php } ?>>Freelancer</option>
                            </select>
                                    </div>
                                    <div class="col-md-6">
                                       <label>Preferred country for work</label>
                                       <select class="test" multiple="multiple" id="pncountry"  name="pncountry[]">
                                       <?php
                                          $country_list=explode(',', $data['prefer_country']);
                                          $s =$user->runQuery("select * from country");
                                          $s->execute();
                                          $row=$s->fetchAll();
                                          foreach($row as $rw) {
                                            ?>
                                       <option value="<?php echo $rw['country_id']; ?>"  <?php if(in_array($rw['country_name'],$country_list)) {   echo 'selected';} ?>><?php echo $rw['country_name']; ?></option>
                                       <?php } ?>
                                    </select>
                                    </div>
                                 </div>
                                 <div class="row meemjm">
                                    <div class="col-md-6">
                                       <label>Preferred State</label>
                                       <select class="test" id="npstate" name="pnstate[]" multiple="multiple">
                                        <?php
                                          $state_list=explode(',', $data['prefer_state']);
                                          $s =$user->runQuery("select * from state");
                                          $s->execute();
                                          $row=$s->fetchAll();
                                          foreach($row as $rw) {
                                            ?>
                                       <option value="<?php echo $rw['state_id']; ?>"  <?php if(in_array($rw['state_name'],$state_list)) {   echo 'selected';} ?>><?php echo $rw['state_name']; ?></option>
                                       <?php } ?>
                                 </select>    
                                </div>
                                    <div class="col-md-6">
                                       <label>Preferred City/Town</label>
                                       <select class="test" id="npcity2" name="npcity[]" multiple="multiple">
                                <?php
                                          $city_list=explode(',', $data['prefer_city']);
                                          $s =$user->runQuery("select * from city");
                                          $s->execute();
                                          $row=$s->fetchAll();
                                          foreach($row as $rw) {
                                            ?>
                                       <option value="<?php echo $rw['city_id']; ?>"  <?php if(in_array($rw['city_name'],$city_list)) {   echo 'selected';} ?>><?php echo $rw['city_name']; ?></option>
                                       <?php } ?>
                             </select>  
                                    </div>
                                 </div>
                                 <div class="row sel_margin">
                                   
                                    <div class="col-md-6">
                                       <label>Expected Earning Anualy</label> 
                                       <input type="text" value="<?php echo $data['exp_salary'];?>" class="form-control no_radius" id="esalary" name="exp_salary">

                                    </div>
                                 </div>
                                 <div class="col-md-12 mmargin_tt col-md-push-5">
                                    <input type="Submit" name="button2" class="btn btn-info" value="Save changes">
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
                  <div class="row">
                     <div class="col-md-12  no_padd">
                        <h4 class="user_nom">Job Preferences Details</h4>
                        <div class="col-md-6 col-xs-12 ">
                           <div class="col-md-7 col-xs-6 my_border ph_text">Preferred industry/company/organization </div>
                           <div class="col-md-5 col-xs-6 sh_text"><?php echo $data['prefer_industry'];?></div>
                        </div>
                        <div class="col-md-6 col-xs-12 ">
                           <div class="col-md-7 col-xs-6 my_border ph_text">Preferred Work Designation</div>
                           <div class="col-md-5 col-xs-6 sh_text"><?php echo $data['prefer_role'];?></div>
                        </div>
                     </div>
                     <div class="col-md-12 no_padd user_mar">
                        <div class="col-md-6 col-xs-12 ">
                           <div class="col-md-7 col-xs-6 my_border ph_text">Preferred Job Type</div>
                           <div class="col-md-5 col-xs-6 sh_text"><?php echo $data['prefer_jobType'];?></div>
                        </div>
                        <div class="col-md-6 col-xs-12 ">
                           <div class="col-md-7 col-xs-6 my_border ph_text">Preferred country for work </div>
                           <div class="col-md-5 col-xs-6 sh_text"><?php echo $data['prefer_country'];?></div>
                        </div>
                     </div>
                     <div class="col-md-12 no_padd user_mar">
                        <div class="col-md-6 col-xs-12 ">
                           <div class="col-md-7 col-xs-6 my_border ph_text">Preferred State</div>
                           <div class="col-md-5 col-xs-6 sh_text"><?php echo $data['prefer_state'];?></div>
                        </div>
                        <div class="col-md-6 col-xs-12 ">
                           <div class="col-md-7 col-xs-6 my_border ph_text">Preferred City </div>
                           <div class="col-md-5 col-xs-6 sh_text"><?php echo $data['prefer_city'];?></div>
                        </div>
                     </div>
                     <div class="clearfix"></div>
                  </div>
                  <!--End row--> 				
               </div>
               <div class="clearfix"></div>
               <div class="col-md-12 col-xs-12  user_prob">
                  <h4 style="padding:0px; margin:0px;">Edit & Upload</h4>
                  <p class="p_heading3">Resume is the most important document recruiters look for. Recruiters generally do not look at profiles without resumes.</p>
                  <div class="col-md-5 no_padd mmargin_t"><span class="f_style"><?php echo $data['resume']; $update_date=$data['resume_update_date']; $month=date('M',strtotime($update_date)); $daate=date('d',strtotime($update_date));$year=date('Y',strtotime($update_date));?>  - </span> Uploaded on <?php echo $month. ' '.$daate;?>,  <?php echo $year;?></div>
                  <div class="col-md-5 no_padd mmargin_t"><a href="images/resume/<?php echo $data['resume'];?>" download><i class="fa fa-download"></i> Download Resume</a> </div>
                  <div class="col-md-10 resume_b">
                     <?php if($resume_ap==2) { ?>
                     <p style="color:#CC6600; font-size:15px">Resume rejected, upload your recent resume.</p>
                     <?php } ?>
                     <form method="post" enctype="multipart/form-data">
                        <label>Upload Resume <span class="red">*</span></label>
                        <input id="fileUpload1" class="form-control" type="file" name="file" required="" />
                        <input type="submit" class="btn btn-success col-md-offset-4 margin_7" name="upload" value="Submit Resume">
                     </form>
                     <?php
                        if(isset($_POST['upload']))
                        {
                          $resume=$_FILES['file']['name']; 
                          $rd=rand(000,999);
                          if(!empty($resume)) {
                           $resume=$rd.$resume; 
                          }
                          $pimgtmp=$_FILES['file']['tmp_name'];                     
                          $allowed =  array('doc','docx' , 'pdf');
                          $ext = pathinfo($resume, PATHINFO_EXTENSION);
                          if(in_array($ext,$allowed) ) {
                          move_uploaded_file($pimgtmp,"images/resume/$resume"); 
                          $date=date('Y-m-d');
                         $stmt=$user->runQuery("update job_users set resume='$resume',resume_update_date='$date'  where id='$uid'");
                           $sql= $stmt->execute();
                        $stmt=$user->runQuery("update photo_approval set resume='0' where userid='$uid'");
                        $stmt->execute();
                                  if($sql) { ?>
                     <script>
                        alert('Resume uploaded successfully.');
                          window.location=window.location;
                        
                          
                     </script>   
                     <?php }
                        }
                         else { ?>
                     <script>
                        alert('Upload Resume in PDF, DOC format only.');
                         window.location=window.location;
                        
                         
                     </script>   
                     <?php   
                        }
                        }
                        ?>
                  </div>
               </div>
			   			    <div class="col-md-12 col-xs-12  user_proid" style="display: none">
                  <h4 style="padding:0px; margin:0px;">Uploaded ID Proof</h4>
				  <img src="images/id.png" class="upload_id" />
				  </div>

            </div>
         </div>
      </div>
      <!--Inner Content End--> 
      <!--copyright start-->
      <div class="footer">
         <div class="container">
            <div class="row">
               <div class="col-md-6 col-sm-6">
                  <div class="copyright">Copyright © 2018 MeeM.one - All Rights Reserved.</div>
               </div>
               <div class="col-md-6 col-sm-6">
                  <div class="social">
                     <div class="followWrp">
                        <span>Follow Us</span>
                        <ul class="social-wrap">
                           <li><a href="#."><i class="fa fa-facebook-square" aria-hidden="true"></i></a></li>
                           <li><a href="#."><i class="fa fa-linkedin-square" aria-hidden="true"></i></a></li>
                        </ul>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!--copyright end--> 
      <script>
         $(document).ready(function(){
         // edit user basic details
         $("#editForm1").submit(function(event) {
           event.preventDefault();   
          var data=$("#editForm1").serialize();
          $.ajax ({
            type: 'post',
            url : 'update_profile.php',
            data : data,
         
            success : function(response)
            { 
                if(response=='ok') {
                  $("#editmsg3").html("<div class='alert alert-success'><i class='fa fa-check-square' aria-hidden='true'></i> Updated Information successfully</div>");  
                 setTimeout(function() { window.location='profile.php';},1200);    
                 //window.location.href='appliedjobs.php';   
                } else {
              $("#editmsg3").html(response);
            }
         }
         
           });
         });
         
         // edit education and employment
         $("#editForm2").submit(function(event) {
           event.preventDefault();   
          var data=$("#editForm2").serialize();
          $.ajax ({
            type: 'post',
            url : 'update_profile.php',
            data : data,
         
            success : function(response)
            { 
                if(response=='ok') {
                  $("#editmsg2").html("<div class='alert alert-success'><i class='fa fa-check-square' aria-hidden='true'></i> Updated Information successfully</div>");  
                 setTimeout(function() { window.location='profile.php';},1200);    
                 //window.location.href='appliedjobs.php';   
                } else {
              $("#editmsg2").html(response);
            }
         }
         
           });
         }); 


         
         // edit education and employment
         $("#editForm3").submit(function(event) {
           event.preventDefault();   
          var data=$("#editForm3").serialize();
          $.ajax ({
            type: 'post',
            url : 'update_profile.php',
            data : data,
         
            success : function(response)
            { 
                if(response=='ok') {
                  $("#editmsg4").html("<div class='alert alert-success'><i class='fa fa-check-square' aria-hidden='true'></i> Updated Information successfully</div>");  
                 setTimeout(function() { window.location='profile.php';},1200);    
                 //window.location.href='appliedjobs.php';   
                } else {
              $("#editmsg4").html(response);
            }
         }
         
           });
         }); 
         




         
             $("#settingForm").submit(function(event) {
               event.preventDefault(); 
              var valid=validate();
              if(valid) {
               var data=$("#settingForm").serialize();
          $.ajax ({
                type: 'post',
                url : 'profile-setting.php',
                data : data,
         
                success : function(response)
                { 
         
                    if(response=='ok') {
                      $("#error3").html("<div class='alert alert-success' style='font-size:14px'><i class='fa fa-check' aria-hidden='true'></i> Your Password changed successfully.</div>");  
                     setTimeout(function() { window.location='profile.php';},1600);    
         
                    } else {
                  $("#error3").html(response);
                }
                }
         
              });
             } 
           }); 
         
         });
         function validate()
         { var valid=true;
         
           if(!$("#oldpwd").val()) { $("#oldpwd").css('border','1px solid #EA9898'); error.innerHTML='Enter Old Password.'; return valid=false; } else { error.innerHTML=''; $("#oldpwd").css('border','1px solid #99D0B3');} 
          if(!$("#newpwd").val()) { $("#newpwd").css('border','1px solid #EA9898'); error2.innerHTML='Enter New Password.'; return valid=false; } else { error2.innerHTML=''; $("#newpwd").css('border','1px solid #99D0B3');}  
           return valid;
         }
      </script>
      <!-- Include all compiled plugins (below), or include individual files as needed --> 
      <script src="js/bootstrap.min.js"></script> 
      <!-- SLIDER REVOLUTION SCRIPTS  --> 
      <script type="text/javascript" src="rs-plugin/js/jquery.themepunch.tools.min.js"></script> 
      <script type="text/javascript" src="rs-plugin/js/jquery.themepunch.revolution.min.js"></script> 
      <!-- general script file --> 
      <script src="js/owl.carousel.js"></script> 
      <script type="text/javascript" src="js/script.js"></script>
      <script src="js/file-upload.js"></script> 
      <script src="js/jquery.tagsinput.js"></script>
      <script src="js/fSelect.js"></script>
      <script src="js/jQuery.inputSliderRange.min.js"></script>
       <script src="js/script-register.js"></script>
	  
 <!-- This below script for multi select -->	
      <script>
         (function($) {
             $(function() {
                 window.fs_test = $('.test').fSelect();
             });
         })(jQuery);
      </script>
 <!-- This script for model popup -->	  
      <script>
         //set button id on click to hide first modal
         $("#signin").on( "click", function() {
                 $('#myModal1').modal('hide');  
         });
         //trigger next modal
         $("#signin").on( "click", function() {
                 $('#myModal2').modal('show');  
         });
         $("#signin").on( "click", function() {
                 $('#myModal3').modal('show');  
         });
         $("#signin").on( "click", function() {
                 $('#myModal4').modal('show');  
         });
         $("#signin").on( "click", function() {
                 $('#myModal5').modal('show');  
         });
      </script>
	   <!-- This script for multi select key skills -->	
      <script src="js/jquery.tokeninput.js"></script>
      <script>
         $(document).ready(function() {
         $("#location").tokenInput("location_search.php", {
               prePopulate:  <?php echo $clocation;?>,
           });
         });
      </script>  

	   <!-- This script for multi select languages -->	
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
    <script src="js/select2.min.js"></script>   
      <script src="js/init-select2.js"></script>


   </body>
</html>