<?php
 include("include/class.user.php");
 $user= new USER();
 include("include/mydb.php");
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
       <link rel="shortcut icon" type="image/png" href="imgs/favicon.png" /> 
        <title>MeeM.one Job Portal - Employer Dashboard</title>

        <!-- inject:css -->
        <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
       <!-- Main Style  -->
        <link rel="stylesheet" href="dist/css/main.css">

    </head>
    <body>

        <div id="ui" class="ui ">

            <!--header start-->
       <?php include 'include/sidebar.php';?>
            <!--header end-->


            <!--main content start-->
            <div id="content" class="ui-content ui-content-aside-overlay bg1">
                <div class="ui-content-body" style="margin-top:60px;">

                    <div class="ui-container">

                        <!--page title and breadcrumb start -->
                        <div class="row">
                            <div class="col-md-8">
                                <h1 class="page-title"> Dashboard 
                                  
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

   $user_id ='';
   $users_ids='';
  // get user details
// $stmt=$user->runQuery("select * from meem_jobs where emp_id='$id' and status='approved'");
// $stmt->execute();
// $result=$stmt->fetchAll();  
// foreach($result as $result) {
// // matching jobs with user data
//  $job_id=$result['id'];   
// include("include/getMatching.php"); 
// $sc=mysqli_query($con,$sql) or die(mysqli_error($con));
// $count=mysqli_num_rows($sc); 
//$user_id='';
//if($count>0) {
// while($rw=mysqli_fetch_array($sc))
//  {
//   $user_id .=$rw['id']. ",";
//   }  
//    $users_ids=substr($user_id,0,-1);
// unset($user_id);
////Insert or update matched jobseeker count in db
// $ucount=$user->checkUserMatch($id,$job_id);
//
//$stmt=($ucount=='0') ? $user->insertMatchCount($id,$job_id,$count,$users_ids) :  $user->updateCount($id,$job_id,$count,$users_ids);
// 
//  }
//
// }
   

?>
                            
                            
                            
                            
                            <div class="col-md-4 col-sm-6">
                                <div class="panel short-states bg-danger">
                                    <div class="pull-right state-icon">
                                        <i class="fa fa-file-text"></i>
                                    </div>
                                     <?php
                               
                                     $i=1;
                                     $stmt=$user->runQuery("select * from meem_jobs where emp_id='$id'");
                                     $stmt->execute();
                                     $count2=$stmt->rowCount();
                                     ?>
                                    <div class="panel-body">
                                        <h1 class="light-txt"><?php echo $count2;?></h1>
                                        <div class=" pull-right"></div>
                                        <strong class=""><a href="post_job.php" class="btn btn-success"><i class="fa fa-caret-right"></i> Create a New Job</a></strong>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-6">
                                <div class="panel short-states bg-info">
                                    <div class="pull-right state-icon">
                                        <i class="fa fa-user"></i>
                                    </div>
                                    <?php
                                     $i=1;
                                     $stmt=$user->runQuery("select * from job_applications where emp_id='$id' and shortlisted=''");
                                     $stmt->execute();
                                     $count=$stmt->rowCount();
                                     ?>

                                    <div class="panel-body">
                                        <h1 class="light-txt"><?php echo $count;?></h1>
                                        <div class=" pull-right"></div>
                                        <strong class=""><a href="candidates-list.php" class="btn btn-danger"><i class="fa fa-caret-right"></i> Job applications</a></strong>
                                    </div>
                                </div>
                            </div>
                     <div class="col-md-4 col-sm-6">
                                <div class="panel short-states bg-primary">
                                    <div class="pull-right state-icon">
                                        <i class="fa fa-users"></i>
                                    </div>
                                     <?php
                                     $i=1;
                                     $stmt=$user->runQuery("select * from job_applications where emp_id='$id' and shortlisted='yes'");
                                     $stmt->execute();
                                     $count3=$stmt->rowCount();
                                     ?>
                                    <div class="panel-body">
                                        <h1 class="light-txt"><?php echo $count3;?></h1>
                                        <div class=" pull-right"></div>
                                        <strong class=""><a href="candidates-list.php?candidate=short-listed" class="btn btn-warning"><i class="fa fa-caret-right"></i> Short listed Resumes</a></strong>
                                    </div>
                                </div>
                            </div>
                            <h3 style="margin: 10px 20px">Matching Job Seekers</h3>
                             <div class="col-md-4 col-sm-6">
                                <div class="panel short-states bg-primary">
                                    <div class="pull-right state-icon">
                                        <i class="fa fa-users"></i>
                                    </div>
                                     <?php
                                     $i=1;
                                     $stmt=$user->runQuery("select * from matching_jobseekers where emp_id='$id'");
                                     $stmt->execute();
                                     $rp=$stmt->fetchAll();
                                     $count=0;
                                     foreach($rp as $rp) {
                                      
                                         $count=$count + $rp['matchcount'];
                                         
                                     }
                                
                                     ?>
                                    <div class="panel-body">
                                        <h1 class="light-txt"><?php echo $count;?></h1>
                                        <div class=" pull-right"></div>
                                        <strong class=""><a href="jobseekers.php" class="btn btn-info" target="_blank"><i class="fa fa-caret-right"></i> Job seekers</a></strong>
                                    </div>
                                </div>
                            </div>
                            
                            
                            
                        </div>
                        <!--states end-->
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
        <script src="bower_components/jquery/dist/jquery.min.js"></script>
        <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
       <!-- Common Script   -->
        <script src="dist/js/main.js"></script>


    </body>


</html>
