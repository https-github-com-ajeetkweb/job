<?php
   include("include/class.user.php");
   $user= new USER();
   if(!$user->is_logged_in()) {
   $user->redirect("index.php?msg=Please Login First");
   }
    $admin=$_SESSION['name'];
   
   ?>
<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="shortcut icon" type="image/png" href="imgs/favicon.png" />
      <title>MeeM.one Job Portal - Admin</title>
      <!-- inject:css -->
      <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
      <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
      <!-- Main Style  -->
      <link rel="stylesheet" href="dist/css/main.css">
      <!--Data Table-->
      <link href="bower_components/datatables/media/css/jquery.dataTables.css" rel="stylesheet">
      <link href="bower_components/datatables-tabletools/css/dataTables.tableTools.css" rel="stylesheet">
      <link href="bower_components/datatables-colvis/css/dataTables.colVis.css" rel="stylesheet">
      <link href="bower_components/datatables-responsive/css/responsive.dataTables.scss" rel="stylesheet">
      <link href="bower_components/datatables-scroller/css/scroller.dataTables.scss" rel="stylesheet">
      <style>
         table {
         border-collapse: collapse;
         border-spacing: 0;
         width: 100%;
         border: 1px solid #ddd;
         }
         th, td {
         border: none;
         text-align: left;
         padding: 8px;
         }
         tr:nth-child(even){background-color: #f2f2f2}
         .overflow{
         overflow-x:auto;
         } 
      </style>
   </head>
   <body>
      <div id="ui" class="ui">
      <!--header start-->
      <?php include("include/sidebar.php");?>
      <!--main content start-->
      <div id="content" class="ui-content ui-content-aside-overlay overflow">
         <!--page header start-->
         <div class="page-head-wrap">
            <h4 class="margin0">
               New Jobseeker
            </h4>
            <div class="breadcrumb-right">
               <ol class="breadcrumb">
                  <li><a href="dashboard.php">Dashboard</a></li>
               </ol>
            </div>
         </div>
         <!--page header end-->
         <div class="ui-content-body">
            <div class="ui-container">
               <div class="row">
                  <div class="col-sm-12">
                     <section class="panel">
                        <header class="panel-heading panel-border">
                           <?php if($_GET['view']=='active') { echo 'Active Job seeker';} elseif($_GET['view']=='inactive') { echo 'Inctive Job seeker';} elseif($_GET['view']=='expired') { echo 'Expired Job seeker';} else{ echo 'Job Applications';}?>
                        </header>
                        <div class="panel-body table-responsive">
                           <?php if($_GET['view']=='active') { ?>  
                           <table class="table convert-data-table table-striped">
                              <thead>
                                 <tr>
                                    <th>
                                       SNo
                                    </th>
                                    <th>
                                       Name
                                    </th>
                                    <th>
                                       Location
                                    </th>
                                    <th>
                                       Education
                                    </th>
                                    <th>
                                      Role
                                    </th>
                                    <th>
                                       Industry
                                    </th>
                                    <th>
                                       Experience
                                    </th>
                                    <th>
                                       Paid_date
                                    </th>
                                    <th>
                                       View
                                    </th>
                                 </tr>
                              </thead>
                              <tbody class="text-center">
                                 <?php
                                    $i=1;
                                    $stmt=$user->runQuery("select id,name,mcode,mobile,gender,rcity,rcountry,education,exp_year ,industry,old_role,paid_date,register_date,last_login from job_users where paid='Y'");                                         
                                    $stmt->execute();
                                    $data=$stmt->fetchAll();
                                    foreach ($data as $row)
                                    {
                                    ?>
                                 <tr>
                                    <td>
                                       <?php echo $i;?>
                                    </td>
                                    <td>
                                       <?php echo $row['name'];?>
                                    </td>
                                    <td>
                                       <?php echo $row['rcountry'].', '.$row['rcity'];?>
                                    </td>
                                    <td>
                                       <?php echo $row['education'];?>
                                    </td>
                                    <td>
                                       <?php echo $row['old_role'];?> 
                                    </td>
                                    <td>
                                       <?php echo $row['industry'];?>
                                    </td>
                                    <td>
                                       <?php echo $row['exp_year'];?> years
                                    </td>
                                    <td>
                                       <?php echo date('d-m-Y',strtotime($row['paid_date']));?>
                                    </td>
                                    <td>
                                       <a href="user_details.php?view=active&id=<?php echo $row['id'];?>" class="btn btn-sm btn-success" target="_blank">View</a>
                                    </td>
                                 </tr>
                                 <?php $i++; } ?>
                              </tbody>
                           </table>
                           <?php } ?>
                           <?php if($_GET['view']=='inactive') { ?>  
                           <table class="table convert-data-table table-striped">
                              <thead>
                                 <tr>
                                    <th>
                                       SNo
                                    </th>
                                    <th>
                                       Name
                                    </th>
                                    <th>
                                       Email
                                    </th>
                                    <th>
                                       Mobile
                                    </th>
                                    <th>
                                       Location
                                    </th>
                                    <th>
                                       Education
                                    </th>
                                    <th>
                                       Industry
                                    </th>
                                    <th>
                                       Experience
                                    </th>
                                    <th>
                                       Register_date
                                    </th>
                                    <th>
                                       View
                                    </th>
                                 </tr>
                              </thead>
                              <tbody class="text-center">
                                 <?php
                                    $i=1;
                                    $stmt=$user->runQuery("select id,name,mcode,mobile,gender,rcity,rcountry,education,exp_year ,email,verify,otp,industry,old_role,register_date,last_login from job_users where paid=''");                                         
                                    $stmt->execute();
                                    $data=$stmt->fetchAll();
                                    foreach ($data as $row)
                                    {
                                    ?>
                                 <tr>
                                    <td>
                                       <?php echo $i;?>
                                    </td>
                                    <td>
                                       <?php echo $row['name'];?>
                                    </td>
                                    <td>
                                       <?php echo $row['email'];?>
                                       <p><?php if($row['otp']!='0') { ?><span style="color:#009933"> <i class="fa fa-check" aria-hidden="true"></i> </span><?php } else { ?><span style="color:#FF3300"> <i class="fa fa-times" aria-hidden="true"></i><?php } ?></p>
                                    </td>
                                    <td>
                                       <?php echo $row['mcode'].$row['mobile'];?>
                                       <p><?php if($row['verify']=='Y') { ?><span style="color:#009933"> <i class="fa fa-check" aria-hidden="true"></i> </span><?php } else { ?><span style="color:#FF3300"> <i class="fa fa-times" aria-hidden="true"></i><?php } ?></p>
                                    </td>
                                    <td>
                                        <?php echo $row['rcountry'].', '.$row['rcity'];?>
                                    </td>
                                    <td>
                                       <?php echo $row['education'];?>
                                    </td>
                                    <td>
                                       <?php echo $row['industry'];?>
                                    </td>
                                    <td>
                                       <?php echo $row['exp_year'];?> years
                                    </td>
                                    <td>
                                       <?php echo date('d-m-Y',strtotime($row['register_date']));?>
                                    </td>
                                    <td>
                                       <a href="user_details.php?view=inactive&id=<?php echo $row['id'];?>" class="btn btn-sm btn-success" target="_blank">View</a>
                                    </td>
                                 </tr>
                                 <?php $i++; } ?>
                              </tbody>
                           </table>
                           <?php } ?>
                           <?php if($_GET['view']=='expired') { ?>  
                           <table class="table convert-data-table table-striped">
                              <thead>
                                 <tr>
                                    <th>
                                       SNo
                                    </th>
                                    <th>
                                       Name
                                    </th>
                                    <th>
                                       Location
                                    </th>
                                    <th>
                                       Education
                                    </th>
                                    <th>
                                       Year of pass out
                                    </th>
                                    <th>
                                       Industry
                                    </th>
                                    <th>
                                       Experience
                                    </th>
                                    <th>
                                       Register_date
                                    </th>
                                    <th>
                                       View
                                    </th>
                                 </tr>
                              </thead>
                              <tbody class="text-center">
                                 <?php
                                    $i=1;
                                    $stmt=$user->runQuery("select id,name,mcode,mobile,gender,rcountry,rcity,education,exp_year ,industry,old_role,paid_date,register_date,last_login from job_users where paid='N'");                                         
                                    $stmt->execute();
                                    $data=$stmt->fetchAll();
                                    foreach ($data as $row)
                                    {
                                    ?>
                                 <tr>
                                    <td>
                                       <?php echo $i;?>
                                    </td>
                                    <td>
                                       <?php echo $row['name'];?>
                                    </td>
                                    <td>
                                      <?php echo $row['rcountry'].', '.$row['rcity'];?>
                                    </td>
                                    <td>
                                       <?php echo $row['education'];?>
                                    </td>
                                    <td>
                                       <?php echo $row['old_role'];?> 
                                    </td>
                                    <td>
                                       <?php echo $row['industry'];?>
                                    </td>
                                    <td>
                                       <?php echo $row['exp_year'];?> years
                                    </td>
                                    <td>
                                       <?php echo date('d-m-Y',strtotime($row['register_date']));?>
                                    </td>
                                    <td>
                                       <a href="user_details.php?view=expired&id=<?php echo $row['id'];?>" class="btn btn-sm btn-success" target="_blank">View</a>
                                    </td>
                                 </tr>
                                 <?php $i++; } ?>
                              </tbody>
                           </table>
                           <?php } ?>   
                           <?php if($_GET['view']=='jobs') { ?>  
                           <table class="table convert-data-table table-striped">
                              <thead>
                                 <tr>
                                    <th>
                                       SNo
                                    </th>
                                    <th>
                                       Name
                                    </th>
                                    <th>
                                       Location
                                    </th>
                                    <th>
                                       Education
                                    </th>
                                    <th>
                                       Year of pass out
                                    </th>
                                    <th>
                                       Industry
                                    </th>
                                    <th>
                                       Experience
                                    </th>
                                    <th>
                                       Applied in company
                                    </th>
                                    <th>
                                       Job Title
                                    </th>
                                    <th>
                                       Apply_date
                                    </th>
                                    <th>
                                       Shortlisted
                                    </th>
                                    <th>
                                       View
                                    </th>
                                 </tr>
                              </thead>
                              <tbody class="text-center">
                                 <?php
                                    $i=1;
                                    $stmt=$user->runQuery("select * from job_applications job join job_users user on job.user_id=user.id order by job.apply_date desc");                                         
                                    $stmt->execute();
                                    $data=$stmt->fetchAll();
                                    foreach ($data as $row)
                                    {
                                       $job_id=$row['job_id'];  
                                    
                                    $stmt=$user->runQuery("select * from meem_jobs where id='$job_id'");
                                    $stmt->execute();
                                    $rc=$stmt->fetch();                                        
                                    ?>
                                 <tr>
                                    <td>
                                       <?php echo $i;?>
                                    </td>
                                    <td>
                                       <?php echo $row['name'];?>
                                    </td>
                                    <td>
                                       <?php echo $row['current_location'];?>
                                    </td>
                                    <td>
                                       <?php echo $row['education'];?>
                                    </td>
                                    <td>
                                       <?php echo $row['pass_year'];?> 
                                    </td>
                                    <td>
                                       <?php echo $row['industry'];?>
                                    </td>
                                    <td>
                                       <?php echo $row['exp_year'];?> years
                                    </td>
                                    <td>
                                       <?php echo $rc['company_name'];?>
                                    </td>
                                    <td>
                                       <?php echo $rc['job_title'];?>
                                    </td>
                                    <td>
                                       <?php echo date('d-m-Y',strtotime($row['apply_date']));?>
                                    </td>
                                    <td>
                                       <?php echo $row['shortlisted'];?>
                                    </td>
                                    <td>
                                       <a href="user_details.php?view=jobs&id=<?php echo $row['id'];?>" class="btn btn-sm btn-success" target="_blank">View</a>
                                    </td>
                                 </tr>
                                 <?php $i++; } ?>
                              </tbody>
                           </table>
                           <?php } ?>          
                        </div>
                     </section>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!--main content end-->
      <!--footer start-->
      <div id="footer" class="ui-footer">
         2018 &copy; Admin Job Portal
         <!--footer end-->
      </div>
      <!-- inject:js -->
      <script src="bower_components/jquery/dist/jquery.min.js"></script>
      <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
      <!--Data Table-->
      <script src="bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
      <script src="bower_components/datatables-tabletools/js/dataTables.tableTools.js"></script>
      <script src="bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
      <script src="bower_components/datatables-colvis/js/dataTables.colVis.js"></script>
      <script src="bower_components/datatables-responsive/js/dataTables.responsive.js"></script>
      <script src="bower_components/datatables-scroller/js/dataTables.scroller.js"></script>
      <!--init data tables-->
      <script src="assets/js/init-datatables.js"></script>
      <!-- Common Script   -->
      <script src="dist/js/main.js"></script>
   </body>
</html>