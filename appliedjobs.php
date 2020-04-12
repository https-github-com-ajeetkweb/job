
<?php
   include("include/class.user.php");
   $user = new USER();
   
   if(!$user->is_logged_in()) {
 $user->redirect("login.php");
 }

 $username= $_SESSION['USER_name'];
 $uid=$_SESSION['USER_ID'];
 
  $stmt=$user->runQuery("select * from job_users where id='$uid'");
 $stmt->execute();
 $data=$stmt->fetch();
 
      $stmt=$user->runQuery("select * from photo_approval where userid=:userID and user_for='jobseeker'");
	$stmt->bindparam(":userID",$uid);
	$stmt->execute();
	$n=$stmt->rowCount();
	$row=$stmt->fetch(PDO::FETCH_ASSOC);
	 $photo_ap=$row['pp_photo'];
	 $resume_ap=$row['resume'];
 
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
   </head>
   <body>
      <!--header start-->
  <?php      include 'include/profile_header.php';?>
      <!--header start end--> 
      <!--Inner Content start-->
      <div class="inner-content loginWrp">
         <div class="container">
            <!--Login Start-->
            <div class="row">
               <div class="col-md-12 col-xs-12 user_profile">
              <?php if($data['photo'] && $photo_ap==1) { ?>
                    <div class="col-md-2 col-xs-6 col-sm-3 text-center">
                  <img src="images/jobseeker/<?php echo $data['photo'];?>" class="p_border"/>
                  </div>
                  <?php } ?>
                  <div class="col-md-7 col-sm-6  col-xs-6">
                     <h4 class="heading1"><?php echo $username;?></h4>
                   
                     
                     <div class="col-md-12 no_padd">
                        <div class="col-md-6 no_padd">
                           <div class="col-md-12 no_padd p_heading1"><i class="fa fa-map-marker icon_1"></i><?php echo $data['rcity'];?></div>
                           <div class="col-md-12 no_padd p_heading1"><i class="fa fa-suitcase icon_2"></i><?php if($data['exp_year']=='Fresher') { echo 'Fresher';} elseif($data['exp_year']) { echo $data['exp_year'] .' years (EXP)';} ?>  </div>
                           <div class="col-md-12 no_padd p_heading1"><?php if(!empty($data['current_salary'])) { ?><i class="fa fa-money icon_2"></i><?php echo $data['current_salary']. ' (P.A.) ';?><?php } ?> </div>
                        </div>
                        <div class="col-md-6 no_padd">
                           <div class="col-md-12 no_padd p_heading1"><i class="fa fa-phone icon_1"></i><?php echo $data['mcode'].$data['mobile'];?></div>
                           <div class="col-md-12 no_padd p_heading1"><i class="fa fa-envelope-o icon_1"></i><?php echo $data['email'];?></div>
                        </div>
                     </div>
                  </div>
                  <div class="col-md-3 col-sm-3 col-xs-12">
				  <div class="col-md-12">
				 </div>
				</div>

               </div>
            </div>
            <div class="clearfix"></div>
            <!--User Profile End--> 
            <div class="row">
               <div class="col-md-10 col-xs-12 col-md-push-1 user_prob">
          <?php
          $stmt=$user->runQuery("select * from job_applications where user_id='$uid' order by apply_date desc");
          $stmt->execute();
          if($stmt->rowCount()>0) {
          $rww=$stmt->fetchAll();
          foreach($rww as $rp) {
            $date=$rp['apply_date'];
            $job_id=$rp['job_id'];
            $sql=$user->runQuery("select id,min_exp,max_exp,key_skills,company_name,salary,city,website,job_role,job_title from meem_jobs where id='$job_id'");
            $sql->execute();
            $result=$sql->fetch();
            
     
          ?>
                   
        <div class="listWrpService featured-wrap candidate candetail">
          <div class="row">
            <div class="col-md-2 col-sm-3 col-xs-3">
                <div class="listImg"><img src="images/feature01.png" class="thumbnail" alt=""><font style="font-size: 11px"><?php echo date('d-m-Y',strtotime($rp['apply_date']));?></font></div>
              
            </div>
            <div class="col-md-10 col-sm-9 col-xs-9">
              <div class="row">
                <div class="col-md-8">
                  <h3><a href="job-details.php?token=<?php echo base64_encode($job_id) ;?>"><?php echo $result['company_name'];?></a></h3>
                  <div class="designation"><?php echo $result['job_title'];?></div>
                  <ul class="featureInfo">
                  <?php if(!empty($result['min_exp']) && !empty($result['max_exp']) ) { ?>
		  <li><i class="fa fa-suitcase"></i><?php echo $result['min_exp'] . ' - '.$result['max_exp']. ' yrs Exp';?></li>
                  <?php } ?>
                    <li><i class="fa fa-map-marker"></i> <?php echo $result['city'];?></li>
                     <?php if(!empty($result['website']) ) { ?>
                    <li><i class="fa fa-globe"></i> <?php echo $result['website'];?> </li>
                      <?php } ?>
				</ul>
                  <?php if(!empty($result['salary']) ) { ?>
                  <div class="cantPrice"> <?php echo $result['salary'];?> </div>
                  <?php } ?>
                  <ul class="cantTags">
                    <?php
                    $skills=$result['key_skills'];
                    $skills= explode(",", $skills);
                    foreach ($skills as $skill) {
                    ?>
                    <li><?php echo end($skills)==$skill ? $skill : $skill. ' ,';?></li>
                   
                    <?php } ?>
                   </ul>
                </div>
                <div class="col-md-4">
                  <ul>
                      <li class="click-btn apply cont"><a href="matched-job.php?token=<?php echo base64_encode($job_id) ;?>"><i class="fa fa-file-text-o" aria-hidden="true"></i> View Details</a></li>
                      <li class="click-btn apply"><a href="appliedjobs.php?id=<?php echo $job_id;?>&action=delete" onClick="return confirm('Are you sure to delete ?')"><i class="fa fa-trash" aria-hidden="true"></i> Delete</a></li>
                   <?php if($rp['shortlisted']=='yes') { ?>
                    <li style="color: lightseagreen; font-size: 13px">Recruiter has shortlisted you for this job on <?php echo date('d',strtotime($rp['shortlisted_date'])). ' '.date('M',strtotime($rp['shortlisted_date'])). ' '.date('Y',strtotime($rp['shortlisted_date']));?>.</li>
                   <?php } ?>
                    <?php
                    if(isset($_GET['action']))
                     {
                     $id=$_GET['id'];
                     $sql=$user->runQuery("delete from job_applications where job_id='$id'") ;
                     $sql->execute();
                     if($sql) { ?>
                    <script> window.location.href='appliedjobs.php';</script>
                    <?php
                    }
                    }
                    ?>
              
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
                   
          <?php } } else { ?>            
           
                   <h4 class="" style="padding: 50px 0px; text-align: center;">You have not applied for any job yet!</h4>     
                   
                   
          <?php } ?>           
                   
                   
                   
                   
      
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
      <!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
      <script src="js/jquery-2.1.4.min.js"></script> 
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
      <script src="js/init-tagsinput.js"></script>
      <script>
         //set button id on click to hide first modal
         $("#signin").on( "click", function() {
                 $('#myModal1').modal('hide');  
         });
         //trigger next modal
         $("#signin").on( "click", function() {
                 $('#myModal2').modal('show');  
         });
      </script>
   </body>
</html>