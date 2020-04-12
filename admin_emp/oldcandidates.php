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
            <header id="header" class="ui-header">

                <div class="navbar-header">
                    <!--logo start-->
                    <a href="index.html" class="navbar-brand">
                        <span class="logo"><img src="imgs/logo.png" alt=""/></span>
                        <span class="logo-compact"><img src="imgs/logo-icon-dark.png" alt=""/></span>
                    </a>
                    <!--logo end-->
                </div>

                <div class="search-dropdown dropdown pull-right visible-xs">
                    <button type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-expanded="true"><i class="fa fa-search"></i></button>
                    <div class="dropdown-menu">
                        <form >
                            <input class="form-control" placeholder="Search here..." type="text">
                        </form>
                    </div>
                </div>

                <div class="navbar-collapse nav-responsive-disabled">

                    <!--toggle buttons start-->
                    <ul class="nav navbar-nav">
                        <li>
                            <a class="toggle-btn" data-toggle="ui-nav" href="#">
                                <i class="fa fa-bars"></i>
                            </a>
                        </li>
                    </ul>
                    <!-- toggle buttons end -->

        
                    <!--search end-->

                    <!--notification start just hiding later can use-->
                    <ul class="nav navbar-nav navbar-right">
<!--                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                <i class="fa fa-bell-o"></i>
                                <span class="badge">5</span>
                            </a>
                            <!{1}**dropdown **{1}>
                            <ul class="dropdown-menu dropdown-menu--responsive">
                                <div class="dropdown-header">Notifications (12)</div>
                                <ul class="Notification-list Notification-list--small niceScroll list-group">
                                    <li class="Notification list-group-item">
                                        <button class="Notification__status Notification__status--read" type="button" name="button"></button>
                                        <a href="#">
                                            <div class="Notification__avatar Notification__avatar--danger pull-left" href="#">
                                                <i class="Notification__avatar-icon fa fa-bolt"></i>
                                            </div>
                                            <div class="Notification__highlight">
                                                <p class="Notification__highlight-excerpt"><b>Server Error Report</b></p>
                                                <p class="Notification__highlight-time">1.2 hours ago</p>
                                            </div>
                                        </a>
                                    </li>
  
      
                                </ul>
                                <div class="dropdown-footer"><a href="#">View more</a></div>
                            </ul>
                            <!{1}**/ dropdown **{1}>
                        </li>-->



                        <li class="dropdown dropdown-usermenu">
                            <a href="#" class=" dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                                <div class="user-avatar"><img src="imgs/a0.jpg" alt="..."></div>
                                <span class="hidden-sm hidden-xs">MeeM</span>
                                <!--<i class="fa fa-angle-down"></i>-->
                                <span class="caret hidden-sm hidden-xs"></span>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-usermenu pull-right">
                                <li><a href="#"><i class="fa fa-cogs"></i>  Settings</a></li>
                                <li><a href="#"><i class="fa fa-user"></i>  Profile</a></li>

                                <li class="divider"></li>
                                <li><a href="#"><i class="fa fa-sign-out"></i> Log Out</a></li>
                            </ul>
                        </li>

                   
                    </ul>
                    <!--notification end-->

                </div>

            </header>
            <!--header end-->

            <!--sidebar start-->
            <aside id="aside" class="ui-aside">
                <ul class="nav">
            
                    <li class="active"  style="margin-top:20px;">
                        <a href="index.html"><i class="fa fa-home"></i><span>Dashboard</span><i class="fa fa-angle-right pull-right"></i></a>
                      </li>
				     <li>
                        <a href="newcandidates.html"><i class="fa fa-file-text-o"></i><span>New Candidates</span><i class="fa fa-angle-right pull-right"></i></a>
						</li>
					 <li>
                        <a href="oldcandidates.html"><i class="fa fa-file-text-o"></i><span>Old Candidates</span><i class="fa fa-angle-right pull-right"></i></a>
						</li>	
                </ul>
            </aside>
            <!--sidebar end-->

            <!--main content start-->
            <div id="content" class="ui-content ui-content-aside-overlay overflow">
                <!--page header start-->
                <div class="page-head-wrap" style="margin-top:10px;">
                    <h4 class="margin0">
                        Old Candidate Profiles
                    </h4>
                    <div class="breadcrumb-right">
                        <ol class="breadcrumb">
                            <li><a href="index.html">Home</a></li>
                            <li>Old candidate profiles</li>
                           
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
                                       Old Candidate Profiles

                                    </header>
                                    <div class="panel-body table-responsive">
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
                                                    Current Salary - P.A
                                                </th>
												  <th>
                                                    Expected Salary - P.A
                                                </th>

                                            </tr>
                                            </thead>
                                            <tbody class="text-center">
                                            <tr>
                                                <td>
                                                    1
                                                </td>
                                                <td>
                                                    Mohammed khan
                                                </td>
                                                <td>
                                                    B.Tech
                                                </td>
                                                <td>
                                                   Developer
                                                </td>
                                                <td>
                                                    India
                                                </td>
                                                <td>
                                                    5 Years
                                                </td>
                                                <td>
                                                    250,000
                                                </td>
												<td>
                                                 350,000
                                                </td>
												<td>
                                                 <a href="candidate.html" class="btn btn-sm btn-primary" target="_blank">View details</a> 
                                                </td>
                                            </tr>
               


  
             
            

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
