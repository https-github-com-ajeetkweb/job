<?php
 include("include/class.user.php");
 $user= new USER();
 if(!$user->is_logged_in()) {
 $user->redirect("../employerlogin.php");
 }
   $id = $_SESSION['EMP_ID'];
   $name = $_SESSION['EMP_name'];
   
 if(isset($_GET['action']))
		 {
		  $job_id=$_GET['id'];
		  $sql=$user->runQuery("delete from meem_jobs where id='$job_id' and emp_id='$id'");
		  $sql->execute();
		}  
  
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
    text-align: center;
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
                       <?php if(empty($_GET['job_id'])) { ?>  Posted Jobs by <b style="color:skyblue"><?php echo $name;?> </b><?php } else { echo "&nbsp;";} ?>
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
                                    
                                    <div class="panel-body table-responsive">
                                        <?php if(empty($_GET['job_id'])) { ?>
                                        <table class="table convert-data-table table-bordered">
                                            <thead>
                                            <tr>
                                                <th>
                                                    SNO
                                                </th>
                                                <th>
                                                    Company Name
                                                </th>
                                                <th>
                                                Job Title
                                                </th>
                                                <th>
                                                 Education Required
                                                </th>
                                                <th>
                                                   Job Role 
                                                </th>
												 <th>
                                                   Industry Type
                                                </th>
                                                 <th>
                                                  Location
                                                </th>
                                                 <th>
                                                  Post Date
                                                </th>
                                                <th>No of Applications</th>
											         
												<th>
                                                   Delete
                                                </th>
                                            </tr>
                                            </thead>
                                            <tbody class="text-center">
                                            <?php
                                            $i=1;
                                            $stmt=$user->runQuery("select id,job_title,prefer_skill,city,industry,prefer_edu,job_role,city,job_type,company_name,post_date from meem_jobs where emp_id='$id'");
                                             $stmt->execute();
                                            $data=$stmt->fetchAll();
                                          
                                        foreach($data as $row) {
                                                $job_id=$row['id'];
                                                 $stmt=$user->runQuery("select job_id,user_id,count(*) from job_applications where emp_id='$id' and job_id='$job_id'  GROUP BY emp_id,job_id");
                                                 $stmt->execute();
                                                 $rp=$stmt->fetch();
                                                
                                            
                                          ?>
                                            <tr >
                                                <td style="text-align:center;">
                                                    <?php echo $i;?>
                                                </td>
                                                <td>
                                                   <?php echo $row['company_name'];?>
                                                </td>
                                                <td>
                                                    <?php echo $row['job_title'];?>
                                                </td>
                                                <td>
                                                  <?php echo $row['prefer_edu'];?>
                                                </td>
                                                <td>
                                                      <?php echo $row['job_role'];?>
                                                </td>
                                                <td>
                                                    <?php echo $row['industry'];?>
                                                </td>
                                                <td>
                                                     <?php echo $row['city'];?>
                                                </td>
                                                 <td>
                                                     <?php echo  date('d-m-Y',strtotime($row['post_date']));?>
                                                </td>
                                                <td><?php if($rp['count(*)']>0) { ?><a href="job-list.php?job_id=<?php echo $job_id;?>&job-title= <?php echo $row['job_title'];?>" class="btn btn-info" target="_blank"><?php echo $rp['count(*)'];?></a><?php } ?></td>
												
									             <td>
                                                 <a href="job-list.php?id=<?php echo $row['id'];?>&action=Delete" class="btn btn-sm btn-danger" onClick="return  confirm('Are you sure to delete this Job ?')"><i class="fa fa-trash-o"></i> Delete</a> 
                                                </td>
                                            </tr>
               
                                            <?php $i++; } ?>

  
             
            

                                            </tbody>
                                        </table>
                                        <?php } ?>
                                    <?php if(!empty($_GET['job_id'])) { ?>
                                        <header class="panel-heading panel-border">
                                            <h4>  No of Job Applications For <b><?php echo $_GET['job-title'];?></b></h4>

                                      </header>
                                            <table class="table convert-data-table table-striped">
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
                                                   Applied for
                                                </th>
						 <th>
                                                  Date applied
                                                </th>

                                            </tr>
                                            </thead>
                                            <tbody class="text-center">
                                                
                                           <?php
                                             $i=1;
                                             $job_id=$_GET['job_id'];
                                             $stmt=$user->runQuery("select * from job_applications where job_id='$job_id' order by id desc");
                                             $stmt->execute();
                                             $data=$stmt->fetchAll();
                                            foreach($data as $row) {
                                                $uid=$row['user_id'];
                                                $job_id=$row['job_id'];
                                                $sql=$user->runQuery("select * from job_users where id='$uid'");
                                                $sql->execute();
                                                $rw=$sql->fetch();
                                                
                                                $sql=$user->runQuery("select job_title from meem_jobs where id='$job_id'");
                                                $sql->execute();
                                                $rp=$sql->fetch();  
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
                                                    <?php echo $rp['job_title'];?>
                                                </td>
												<td>
                                                <?php echo date('d-m-Y',strtotime($row['apply_date']));?>
                                                </td>
												<td>
                                                 <a href="candidate_details.php?user_id=<?php echo $uid;?>&job_id=<?php echo $job_id;?>" class="btn btn-sm btn-primary" target="_blank">View details</a> 
                                                </td>
                                            </tr>
                                            
                                        <?php  $i++; } ?>

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
