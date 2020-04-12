<?php
   include("include/class.user.php");
   $user= new USER();
   if(!$user->is_logged_in()) {
   $user->redirect("index.php?msg=Please Login First");
   }
   ini_set('display_errors', 0);
    $admin=$_SESSION['name'];
     
   
   ?>
<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="shortcut icon" type="image/png" href="imgs/favicon.png" />
      <title>MeeM.one job portal</title>
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
                  <li><a href="dashboard.php">Home</a></li>
               </ol>
            </div>
         </div>
         <!--page header end-->
         <div class="ui-content-body">
            <div class="ui-container">
               <div class="row">
                  <div class="col-sm-12">
                     <?php if(!$_GET['view']) { ?>
                     <section class="panel">
                        <header class="panel-heading panel-border">
                           Jobs
                        </header>
                        <div class="panel-body table-responsive">
                           <table class="table convert-data-table table-striped">
                              <thead>
                                 <tr>
                                    <th>
                                       SNo
                                    </th>
                                    <th>
                                       Company Name
                                    </th>
                                    <th>
                                       Job Title
                                    </th>
                                    <th>
                                       industry
                                    </th>
                                    <th>
                                       job_role
                                    </th>
                                    <th>
                                       Website
                                    </th>
                                    <th>
                                       Location
                                    </th>
                                    <th>
                                       post_date
                                    </th>
                                    <th>
                                       View
                                    </th>
                                 </tr>
                              </thead>
                              <tbody class="text-center">
                                 <?php
                                    $i=1;
                                    $stmt=$user->runQuery("select * from meem_jobs where status=1");                                         
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
                                       <?php echo $row['company_name'];?>
                                    </td>
                                    <td>
                                       <?php echo $row['job_title'];?>
                                    </td>
                                    <td>
                                       <?php echo $row['industry'];?>
                                    </td>
                                    <td>
                                       <?php echo $row['job_role'];?>
                                    </td>
                                    <td>
                                       <?php echo $row['website'];?>
                                    </td>
                                    <td>
                                       <?php echo $row['city'].', '.$row['country'];?>
                                    </td>
                                    <td>
                                       <?php echo date('d-m-Y',strtotime($row['post_date']));?>
                                    </td>
                                    <td>
                                       <a href="emp-job.php?view=job&job_id=<?php echo $row['id'];?>" class="btn btn-sm btn-success" target="_blank">View</a>
                                    </td>
                                 </tr>
                                 <?php $i++; } ?>
                              </tbody>
                           </table>
                        </div>
                     </section>
                     <?php } ?> 
                     <?php if($_GET['view']) { $id=$_GET['job_id']; 
                        $stmt=$user->runQuery("select * from meem_jobs where id='$id'");
                        $stmt->execute();
                         $data=$stmt->fetch(PDO::FETCH_ASSOC);
                        
                        
                        ?> 
                     <b><br><br>
                     <div class="profile-info">
                        <div class="row ">
                           <div class="col-md-12 col-xs-12 margin_t porile_bg"><i class="fa fa-user"></i>Job Details</div>
                           <div class="col-md-12 margin_t col-xs-12">
                              <div class="col-md-6 col-xs-12 no_margin">
                                 <div class="col-md-6 col-xs-6 ph_text my_border">Company Name</div>
                                 <div class="col-md-6 col-xs-6 sh_text"><span class="space_p"><?php echo $data['company_name'];?></span></div>
                              </div>
                              <div class="col-md-6 col-xs-12 no_margin">
                                 <div class="col-md-6 col-xs-6 ph_text my_border">Job Title</div>
                                 <div class="col-md-6 col-xs-6 sh_text"><?php echo $data['job_title'];?></div>
                              </div>
                           </div>
                           <div class="col-md-12 margin_t col-xs-12">
                              <div class="col-md-6 col-xs-12 no_margin">
                                 <div class="col-md-6 col-xs-6 ph_text my_border">Industry Type</div>
                                 <div class="col-md-6 col-xs-6 sh_text"><?php echo $data['industry'];?></div>
                              </div>
                              <div class="col-md-6 col-xs-12 no_margin">
                                 <div class="col-md-6 col-xs-6 ph_text my_border">Job Role</div>
                                 <div class="col-md-6 col-xs-6 sh_text"><?php echo $data['job_role'];?></div>
                              </div>
                           </div>
                           <div class="col-md-12 margin_t col-xs-12">
                              <div class="col-md-6 col-xs-12 no_margin">
                                 <div class="col-md-6 col-xs-6 ph_text my_border">Job Type</div>
                                 <div class="col-md-6 col-xs-6 sh_text"><?php echo $data['job_type'];?></div>
                              </div>
                              <div class="col-md-6 col-xs-12 no_margin">
                                 <div class="col-md-6 col-xs-6 ph_text my_border">Education Required</div>
                                 <div class="col-md-6 col-xs-6 sh_text"><?php echo $data['qualification'];?></div>
                              </div>
                           </div>
                           <div class="col-md-12 margin_t col-xs-12">
                              <div class="col-md-6 col-xs-12 no_margin">
                                 <div class="col-md-6 col-xs-6 ph_text my_border">Minimum Exp</div>
                                 <div class="col-md-6 col-xs-6 sh_text"><?php echo $data['min_exp'];?></div>
                              </div>
                              <div class="col-md-6 col-xs-12 no_margin">
                                 <div class="col-md-6 col-xs-6 ph_text my_border">Maximum Exp</div>
                                 <div class="col-md-6 col-xs-6 sh_text"><?php echo $data['max_exp'];?></div>
                              </div>
                           </div>
                           <div class="col-md-12 margin_t col-xs-12">
                              <div class="col-md-6 col-xs-12 no_margin">
                                 <div class="col-md-6 col-xs-6 ph_text my_border">Salary</div>
                                 <div class="col-md-6 col-xs-6 sh_text"><?php echo $data['salary'];?></div>
                              </div>
                              <div class="col-md-6 col-xs-12 no_margin">
                                 <div class="col-md-6 col-xs-6 ph_text my_border">Website</div>
                                 <div class="col-md-6 col-xs-6 sh_text"><?php echo $data['website'];?></div>
                              </div>
                           </div>
                           <div class="col-md-12 margin_t col-xs-12">
                              <div class="col-md-12 col-xs-12 no_margin">
                                 <div class="col-md-3 col-xs-6 ph_text my_border">Key Skills</div>
                                 <div class="col-md-6 col-xs-6 sh_text"><?php echo $data['key_skills'];?></div>
                              </div>
                           </div>
                           <div class="col-md-12 margin_t col-xs-12">
                              <div class="col-md-6 col-xs-12 no_margin">
                                 <div class="col-md-6 col-xs-6 ph_text my_border">Location</div>
                                 <div class="col-md-6 col-xs-6 sh_text"><?php echo $data['city'].', '.$data['state'].','.$data['country'];?></div>
                              </div>
                              <div class="col-md-6 col-xs-12 no_margin">
                                 <div class="col-md-6 col-xs-6 ph_text my_border">Address</div>
                                 <div class="col-md-6 col-xs-6 sh_text"><?php echo $data['address'];?></div>
                              </div>
                           </div>
                           <div class="col-md-12 margin_t col-xs-12">
                              <div class="col-md-6 col-xs-12 no_margin">
                                 <div class="col-md-6 col-xs-6 ph_text my_border">Contact Mobile No</div>
                                 <div class="col-md-6 col-xs-6 sh_text"><?php echo $data['contact_number'];?></div>
                              </div>
                              <div class="col-md-6 col-xs-12 no_margin">
                                 <div class="col-md-6 col-xs-6 ph_text my_border">Contact Email</div>
                                 <div class="col-md-6 col-xs-6 sh_text"><?php echo $data['contact_email'];?></div>
                              </div>
                           </div>
                           <div class="col-md-12 margin_t col-xs-12">
                              <div class="col-md-12 col-xs-12 no_margin">
                                 <div class="col-md-3 col-xs-6 ph_text my_border">Candidate profile</div>
                                 <div class="col-md-6 col-xs-6 sh_text"><?php echo $data['candidate_profile'];?></div>
                              </div>
                           </div>
                           <div class="col-md-12 margin_t col-xs-12">
                              <div class="col-md-12 col-xs-12 no_margin">
                                 <div class="col-md-3 col-xs-6 ph_text my_border">Job Description</div>
                                 <div class="col-md-6 col-xs-6 sh_text"><?php echo $data['job_desc'];?></div>
                              </div>
                           </div>
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