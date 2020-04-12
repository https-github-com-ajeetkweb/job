<?php
   include("include/class.user.php");
   $user= new USER();
   include("include/mydb.php"); 
   if(!$user->is_logged_in()) {
   $user->redirect("index.php?msg=Please Login First");
   }
   $admin=$_SESSION['name'];
   
   // send new jobs alert to users 
   
 //  include 'sendMatchingMail.php';
   
   
   
   // checking membership expiry, make user profiles expired if cross expiry date
   
      $ss=$user->runQuery("select id,name,paid_date,plan,expiry_date from job_users where paid='Y' and expiry_date<NOW()");
      $ss->execute();
      $rww=$ss->fetchAll();
      $n=$ss->rowCount();
    if($n>0)
    {	
      foreach($rww as $edata) {
          $expiry_date=$edata['expiry_date'];
          $userid=$edata['id'];
          $name=$edata['name'];
          $exdate=strtotime($edata['expiry_date']);
          $cdate=strtotime(date('Y-m-d'));
          $days = (ceil(($exdate - $cdate)/60/60/24));
          if($days<1) {
              $stmt=$user->runQuery("update job_users set paid='N',expire='yes' where id=:USERID");
              $stmt->bindparam(":USERID",$userid);
              $stmt->execute();
   
          }
      }
    }
   
    
   ?>
<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="shortcut icon" type="image/png" href="imgs/" />
      <title>MeeM.one Job-portal Admin</title>
      <!-- inject:css -->
      <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
      <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
      <!-- Main Style  -->
      <link rel="stylesheet" href="dist/css/main.css">
   </head>
   <body>
      <div id="ui" class="ui">
         <!--header start-->
         <?php include("include/sidebar.php");?>
         <!--main content start-->
         <div id="content" class="ui-content ui-content-aside-overlay">
            <div class="ui-content-body">
               <div class="ui-container">
                  <!--page title and breadcrumb start -->
                  <div class="row">
                     <div class="col-md-8">
                        <h1 class="page-title"> Job Seeker Details 
                        </h1>
                     </div>
                     <div class="col-md-4">
                        <ul class="breadcrumb pull-right">
                        </ul>
                     </div>
                  </div>
                  <!--page title and breadcrumb end -->
                  <!--states start-->
                  <div class="row">
                     <?php
                        $sql=$user->runQuery("select id from job_users where  paid='Y'");
                        $sql->execute();
                        $n=$sql->rowCount();
                        ?>
                     <div class="col-md-6 col-lg-3 col-sm-12 col-xs-12">
                        <div class="panel short-states bg-success">
                           <div class="pull-right state-icon cus_margin1">
                              <i class="fa fa-user"></i>
                           </div>
                           <div class="panel-body">
                              <h2 class="light-txt"><?php echo $n;?> <span class="female_font" style="font-size:18px;">Active Job <?php if($n>1) { echo "seekers";} else { echo "seeker";} ?></span></h2>
                              <strong><a href="job_seekers.php?view=active" class="btn btn-warning"><span class="admin_f">View Details</span></a></strong>
                           </div>
                        </div>
                     </div>
                     <?php
                        $sql=$user->runQuery("select id from job_users where  paid=''");
                        $sql->execute();
                        $n=$sql->rowCount();
                        ?>
                     <div class="col-md-6 col-lg-3 col-sm-12 col-xs-12">
                        <div class="panel short-states bg-warning">
                           <div class="pull-right state-icon cus_margin1">
                              <i class="fa fa-info-circle"></i>
                           </div>
                           <div class="panel-body">
                              <h1 class="light-txt"><?php echo $n;?>  <span class="female_font">Inactive </span></h1>
                              <strong class=""><a href="job_seekers.php?view=inactive" class="btn btn-danger">View Details</a></strong>
                           </div>
                        </div>
                     </div>
                     <?php
                        $sql=$user->runQuery("select id from job_users where  paid='N'");
                        $sql->execute();
                        $n=$sql->rowCount();
                        ?>
                     <div class="col-md-6 col-lg-3 col-sm-12 col-xs-12">
                        <div class="panel short-states bg-danger">
                           <div class="pull-right state-icon cus_margin1">
                              <i class="fa fa-info-circle"></i>
                           </div>
                           <div class="panel-body">
                              <h1 class="light-txt"><?php echo $n;?> <span class="female_font">Expired</span></h1>
                              <strong class=""><a href="job_seekers.php?view=expired" class="btn btn-default">View Details</a></strong>
                           </div>
                        </div>
                     </div>
                     <?php
                        $sql=$user->runQuery("select id from job_applications");
                        $sql->execute();
                        $n=$sql->rowCount();
                        ?>
                     <div class="col-md-6 col-lg-3 col-sm-12 col-xs-12">
                        <div class="panel short-states bg-info">
                           <div class="pull-right state-icon cus_margin1">
                              <i class="fa fa-suitcase"></i>
                           </div>
                           <div class="panel-body">
                              <h1 class="light-txt"><?php echo $n;?> <span class="female_font"> Applied  <?php if($n>1) { echo "Jobs";} else { echo "Job";} ?></span></h1>
                              <strong class=""><a href="job_seekers.php?view=jobs" class="btn btn-danger">View Details</a></strong>
                           </div>
                        </div>
                     </div>
                  </div>
                  <!--states end-->
                  <hr style="border:1px solid #ccc;">
                  <!--page title and breadcrumb start -->
                  <div class="row">
                     <div class="col-md-8">
                        <h1 class="page-title" style="margin-top:0px!important;"> Employer Details
                        </h1>
                     </div>
                     <div class="col-md-4">
                        <ul class="breadcrumb pull-right">
                        </ul>
                     </div>
                  </div>
                  <!--page title and breadcrumb end -->
                  <!--Employer start-->
                  <div class="row">
                     <?php
                        $sql=$user->runQuery("select id from employers_tble where  status='approved'");
                                   $sql->execute();
                                   $n=$sql->rowCount();
                                   ?>
                     <div class="col-md-6 col-lg-4 col-sm-12 col-xs-12">
                        <div class="panel short-states bg-info">
                           <div class="pull-right state-icon cus_margin1">
                              <i class="fa fa-user"></i>
                           </div>
                           <div class="panel-body">
                              <h1 class="light-txt"><?php echo $n;?> <span class="female_font">Active <?php if($n>1) { echo "Employers";} else { echo "Employer";} ?></span></h1>
                              <strong class=""><a href="employers.php?view=active" class="btn btn-danger">View Details</a></strong>
                           </div>
                        </div>
                     </div>
                     <?php
                        $sql=$user->runQuery("select id from employers_tble where  status=''");
                        $sql->execute();
                        $n=$sql->rowCount();
                        ?>
                     <div class="col-md-6 col-lg-4 col-sm-12 col-xs-12">
                        <div class="panel short-states bg-warning">
                           <div class="pull-right state-icon cus_margin1">
                              <i class="fa fa-info-circle"></i>
                           </div>
                           <div class="panel-body">
                              <h1 class="light-txt"><?php echo $n;?> <span class="female_font">Inactive</span></h1>
                              <strong class=""><a href="employers.php?view=inactive" class="btn btn-success">View Details</a></strong>
                           </div>
                        </div>
                     </div>
                               
                  </div>
                  <!--states end-->
                  <hr style="border:1px solid #ccc;">
                  <!--page title and breadcrumb start -->
                  <div class="row">
                     <div class="col-md-8">
                        <h1 class="page-title" style="margin-top:0px!important;"> All Jobs
                        </h1>
                     </div>
                     <div class="col-md-4">
                        <ul class="breadcrumb pull-right">
                        </ul>
                     </div>
                  </div>
                  <div class="row">
                     <?php
                        $sql=$user->runQuery("select id from meem_jobs where  status=1");
                        $sql->execute();
                        $n=$sql->rowCount();
                        ?>
                     <div class="col-md-6 col-lg-4 col-sm-12 col-xs-12">
                        <div class="panel short-states bg-info">
                           <div class="pull-right state-icon cus_margin1">
                              <i><img src="imgs/male.png" /></i>
                           </div>
                           <div class="panel-body">
                              <h1 class="light-txt"><?php echo $n;?> <span class="female_font">Jobs</span></h1>
                              <strong class=""><a href="job_list.php" class="btn btn-danger">View Details</a></strong>
                           </div>
                        </div>
                     </div>
                     
                     <?php
                        $sql=$user->runQuery("select id from meem_jobs where  status=''");
                        $sql->execute();
                        $n=$sql->rowCount();
                        ?>                            
                     <div class="col-md-6 col-lg-4 col-sm-12 col-xs-12">
                        <div class="panel short-states bg-success">
                           <div class="pull-right state-icon cus_margin1">
                              <i><img src="imgs/male.png" /></i>
                           </div>
                           <div class="panel-body">
                              <h1 class="light-txt"><?php echo $n;?> <span class="female_font">New <?php if($n>0) { echo 'Jobs';} else { echo 'Job';}?></span></h1>
                              <strong class=""><a href="newjob-approval.php" class="btn btn-danger">Approve new Jobs</a></strong>
                           </div>
                        </div>
                     </div>
                     
                            <?php
                        $sql=$user->runQuery("select id from meem_jobs where  status='expired'");
                        $sql->execute();
                        $n=$sql->rowCount();
                        ?>                            
                     <div class="col-md-6 col-lg-4 col-sm-12 col-xs-12">
                        <div class="panel short-states bg-warning">
                           <div class="pull-right state-icon cus_margin1">
                              <i><img src="imgs/male.png" /></i>
                           </div>
                           <div class="panel-body">
                              <h1 class="light-txt"><?php echo $n;?> <span class="female_font">Expired <?php if($n>0) { echo 'Jobs';} else { echo 'Job';}?></span></h1>
                              <strong class=""><a href="expired_job_list.php" class="btn btn-danger">Expired Jobs</a></strong>
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
   </body>
</html>