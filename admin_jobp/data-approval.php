<?php
   include("include/class.user.php");
   $user= new USER();
   if(!$user->is_logged_in()) {
   $user->redirect("index.php?msg=Please Login First");
   }
    $admin=$_SESSION['name'];
    $approval=$_GET['approval'];
   ini_set('display_errors', 0);
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
         <div class="breadcrumb-right">
            <ol class="breadcrumb">
            </ol>
         </div>
      </div>
      <!--page header end-->
      <div class="ui-content-body">
         <div class="ui-container">
            <div class="row">
               <div class="col-sm-12">
                  <?php if(!$_GET['option']) { ?>
                  <section class="panel">
                     <header class="panel-heading panel-border">
                        <?php  echo $_GET['approval'];?> approval List
                     </header>
                     <div class="panel-body table-responsive">
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
                                    Current_location
                                 </th>
                                 <th>
                                    Date
                                 </th>
                                 <th>
                                    View
                                 </th>
                              </tr>
                           </thead>
                           <tbody class="text-center">
                              <?php
                                 $i=1;
                                 if($approval=='jobseeker') {
                                 $stmt=$user->runQuery("select user.id,user.name as name,user.rcity as location,ap.date_on from job_users user join photo_approval ap on user.id=ap.userid where user_for='jobseeker' and  (ap.pp_photo='0' and user.photo!='') or (ap.resume='0' and user.resume!='') order by date_on desc");  
                                 } 
                                 if($approval=='employer')
                                 {
                                 
                                 $stmt=$user->runQuery("select emp.id,emp.emp_name as name,emp.city as location,ap.date_on from employers_tble emp join photo_approval ap on emp.id=ap.userid where user_for='employer' and  (ap.pp_photo='0' and emp.emp_photo!='')  order by date_on desc");  
                                 } 
                                 
                                         
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
                                    <?php echo $row['location'];?>
                                 </td>
                                 <td>
                                    <?php echo date('d-m-Y',strtotime($row['date_on']));?>
                                 </td>
                                 <td>
                                    <a href="data-approval.php?approval=<?php echo $_GET['approval'];?>&id=<?php echo $row['id'];?>&option=approve" class="btn btn-sm btn-success" target="_blank">View</a>
                                 </td>
                              </tr>
                              <?php $i++; } ?>
                           </tbody>
                        </table>
                     </div>
                  </section>
                  <?php } ?> 
                  <?php if($_GET['option']) { $id=$_GET['id']; 
                     $approval=$_GET['approval'];
                     if($approval=='jobseeker') { 
                                              $stmt=$user->runQuery("select user.id,user.name as name,user.email,user.resume,user.photo as photo,mcode,mobile from job_users user where id='$id'");
                     }
                     if($approval=='employer') { 
                                              $stmt=$user->runQuery("select emp.id,emp.emp_name as name,emp.emp_email,emp.emp_photo as photo,mcode,mobile from employers_tble emp where id='$id'");
                     }
                     
                     
                     
                                             $stmt->execute();
                                             $data=$stmt->fetch(PDO::FETCH_ASSOC);
                     
                     $stmt=$user->runQuery("select * from photo_approval where userid=:userID and user_for='$approval'");
                     $stmt->bindparam(":userID",$id);
                     $stmt->execute();
                     $n=$stmt->rowCount();
                     $row=$stmt->fetch(PDO::FETCH_ASSOC);
                     $photo_ap=$row['pp_photo'];
                     $resume_ap=$row['resume'];
                                         ?> 
                  <div class="profile-info">
                     <div class="row ">
                        <div class="col-md-12 col-xs-12 margin_t porile_bg"><i class="fa fa-user"></i> &nbsp;Approve Data</div>
                        <header class="panel-heading clearfix">
                           <div class="pull-left mtop-20">
                              <p><i class="fa fa-user-circle" aria-hidden="true"></i> <?php echo $data['name'];?></p>
                              <p><i class="fa fa-phone-square" aria-hidden="true"></i> <?php echo $data['mcode'].$data['mobile'];?></p>
                           </div>
                        </header>
                        <div class="row">
                           <?php if($data['photo']) { ?>
                           <div class="col-md-12">
                              <h4>Profile photo</h4>
                           </div>
                           <div class="col-md-3">
                              <img src="../images/<?php echo $_GET['approval'];?>/<?php echo $data['photo'];?>" alt="Passport Size Photo" width="250" height="300" class="img_profile"/>
                           </div>
                           <div class="col-md-7">
                              <div class="col-md-2">
                                 <?php if($photo_ap==0) {  ?>
                                 <a class="btn btn-success" href="javascript:void(0);" onClick="approve_profile(<?php echo $id;?>,'profile','<?php echo $approval;?>')" id="pp-btn" ><i class="fa fa-thumbs-o-up"></i> Approve</a>
                                 <?php } if($photo_ap==1) { ?>
                                 <div id="photo_approved" class="btn btn-success"><i class="fa fa-check" aria-hidden="true"></i> Approved</div>
                                 <?php } ?>
                              </div>
                              <div class="col-md-4">
                                 <?php if($photo_ap==0) { ?>
                                 <a class="btn btn-danger" href="javascript:void(0);" onClick="disapprove_profile(<?php echo $id;?>,'profile','<?php echo $approval;?>')" id="photo-btn2" ><i class="fa fa-thumbs-o-up"></i> Reject</a>
                                 <?php } if($photo_ap==2) { ?>
                                 <div  class="btn btn-danger" id="photo_disapproved"><i class="fa fa-check" aria-hidden="true"></i>Rejected</div>
                                 <?php } ?>
                              </div>
                           </div>
                           <?php } ?>					                 
                           <div class="clearfix"></div>
                           <?php if($approval=='jobseeker') { ?>
                           <div class="col-md-12">
                              <h4>Resume</h4>
                           </div>
                           <div class="col-md-12">
                              <iframe class="doc" id="bio" src="https://docs.google.com/gview?url=http://ridaits.com/meemjob/images/resume/<?php echo $data['resume'];?>&embedded=true" ></iframe>
                           </div>
                           <div class="col-md-7">
                              <div class="col-md-2">
                                 <?php if($resume_ap=='0' ) { ?>
                                 <a class="btn btn-success" href="javascript:void(0);" onClick="approve_profile(<?php echo $id;?>,'resume','<?php echo $approval;?>')" id="resume-btn" ><i class="fa fa-thumbs-o-up"></i> Approve</a>
                                 <?php } if($resume_ap=='1') { ?>
                                 <div id="photo_approved" class="btn btn-success"><i class="fa fa-check" aria-hidden="true"></i> Approved</div>
                                 <?php } if($resume_ap=='2') { ?>
                                 <div  class="btn btn-danger" id="resume_disapproved"><i class="fa fa-check" aria-hidden="true"></i>Rejected</div>
                                 <?php } ?>
                              </div>
                              <div class="col-md-4">
                                 <?php if($resume_ap=='0') { ?>
                                 <a class="btn btn-danger" href="javascript:void(0);" onClick="disapprove_profile(<?php echo $id;?>,'resume','<?php echo $approval;?>')" id="resume-btn2" ><i class="fa fa-thumbs-o-up"></i> Reject</a>
                                 <?php } ?>
                              </div>
                           </div>
                           <?php } ?>       
                        </div>
                        <!-- End row -->
                     </div>
                     <?php } ?>  
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
      <script type="text/javascript">
         function approve_profile(id,action,user_for) {
         
         var x = confirm("Are you sure to approve ?");
         if(x) {
         
         var data={'id':id, 'action':action, 'user_for':user_for};
         $.ajax({
         
         type: 'post',
         url: 'approve_photo.php',
         data: data,
         
         beforeSend: function() {
         if(action=='profile') {
         $("#pp-btn").html('Approving...');
         }
         if(action=='album1') {
         $("#resume-btn").html('Approving...');
         }
         
         
         },
         success: function(data) {
         if(action=='profile') {
         $("#pp-btn").html('<i class="fa fa-check" aria-hidden="true"></i> Approved');
         $("#photo_approved").hide();
         }
         
         if(action=='resume') {
         $("#resume-btn").html('<i class="fa fa-check" aria-hidden="true"></i> Approved');
         $("#resume_approved").hide();
         }
         },
         });
         }
         }
         
         
         function disapprove_profile(id,action,user_for) {
         
         var x = confirm("Are you sure to reject ?");
         if(x) {
         
         var data={'id':id, 'action':action, 'user_for':user_for};
         $.ajax({
         
         type: 'post',
         url: 'disapprove_photo.php',
         data: data,
         
         beforeSend: function() {
         if(action=='profile') {
         $("#photo-btn2").html('Rejecting...');
         $("#pp-btn").hide();
         }
         
         if(action=='resume') {
         $("#resume-btn2").html('Rejecting...');
         }
         
         
         },
         success: function(data) {
         
         if(action=='profile') {
         $("#photo-btn2").html('<i class="fa fa-check" aria-hidden="true"></i>  Rejected');
         }
         
         if(action=='resume') {
         $("#resume-btn").html('<i class="fa fa-check" aria-hidden="true"></i> Rejected');
         $("#resume-btn2").hide();
         }
         },
         });
         }
         }
         
         
         
         
         
         
         
      </script>      
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