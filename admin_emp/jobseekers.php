<?php
 include("include/class.user.php");
 $user= new USER();
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
        <title>MeeM.one Job Portal</title>

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
<?php include 'include/sidebar.php';?>
            <!--header end-->


            <!--main content start-->
            <div id="content" class="ui-content ui-content-aside-overlay overflow">
                <!--page header start-->
                <div class="page-head-wrap" style="margin-top:30px;">
                    <h4 class="margin0">
                        Job seekers List
                       
                    </h4>
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
                                <section class="panel">
                                    <header class="panel-heading panel-border">
                                        Job seekers

                                    </header>
                                   
                                    <div class="panel-body table-responsive">
                                        <table class="table convert-data-table table-bordered">
                                            <thead>
                                            <tr>
                                                <th>
                                                    SNO
                                                </th>
                                                <th>
                                                    Name
                                                </th>
                                                <th>
                                                    Education
                                                </th>
                                                <th>
                                                     Current Designation
                                                </th>
                                                <th>
                                                    Current Location
                                                </th>
                                                <th>
                                                   Years of Experience
                                                </th>
                                                <th>
                                                  Matching with position
                                                </th>
						 <th>
                                                 View
                                                </th>

                                            </tr>
                                            </thead>
                                            <tbody class="text-center">
                                                
                                               
                                           <?php
                                             $i=1;
                                             $stmt=$user->runQuery("select * from matching_jobseekers where emp_id='$id'");
                                             $stmt->execute();
                                             $rp=$stmt->fetchAll();
                                            
                                            foreach($rp as $row)
                                            {
                                                $job_id=$row['job_id'];
                                                $user_id=$row['match_ids'];
                                                $user_id=explode(",",$user_id);
                                               foreach($user_id as $userid) {
                                                $sql=$user->runQuery("select * from job_users where id='$userid' GROUP BY ID");
                                                $sql->execute();
                                                $rw=$sql->fetch();
                                                
                                              $stmt=$user->runQuery("select id,emp_id,job_title from meem_jobs where id='$job_id' and emp_id='$id'") ; 
                                               $stmt->execute();
                                               $mj=$stmt->fetch();
                                              
                                            ?>  
                                          
                                            <tr>
                                                <td>
                                                     <?php echo $i;?>
                                                </td>
                                                <td>
                                                    <?php echo $rw['name'];?>
                                                </td>
                                                <td>
                                                   <?php echo $rw['education'];?>
                                                </td>
                                                <td>
                                                   <?php echo $rw['role'];?>
                                                </td>
                                                <td>
                                                    <?php echo $rw['current_location'];?>
                                                </td>
                                                <td>
                                                     <?php echo $rw['exp_year'];?> years
                                                </td>
                                                <td>
                                                     <?php echo $mj['job_title'];?>
                                                </td>
                                                
                                                
                                                				<td>
                                                 <a href="candidate_details.php?user_id=<?php echo $userid;?>" class="btn btn-sm btn-primary" target="_blank">View details</a> 
                                                </td>
                                            </tr>
                                            
                                               <?php  $i++;} } ?>

                                            </tbody>
                                        </table>
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
             2018 &copy; MeeM.one
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
