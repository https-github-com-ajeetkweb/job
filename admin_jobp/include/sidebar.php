<?php 
$adminid=$_SESSION['adminid'];
$st=$user->runQuery("select * from admin where id='$adminid'");
$st->execute();
$rp=$st->fetch();
$email=$rp['email'];
?>

<header id="header" class="ui-header">

                <div class="navbar-header" style="margin-left:10px;">
                    <!--logo start-->
                    <a href="dashboard.php" class="navbar-brand">
                        <span class="logo"><img src="imgs/logo.png" alt=""/></span>
                        <span class="logo-compact"><img src="imgs/logo-icon-dark.png" alt=""/></span>
                    </a>
                    <!--logo end-->
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
                        </li>
-->



                        <li class="dropdown dropdown-usermenu">
                            
                            <a href="#" class=" dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                               
                                <div class="user-avatar"><img src="imgs/a0.jpg" alt="..."></div>
                                <span class="hidden-sm hidden-xs"><?php echo $admin;?></span>
                                <!--<i class="fa fa-angle-down"></i>-->
                                <span class="caret hidden-sm hidden-xs"></span>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-usermenu pull-right">
                                 <li><a href=""><i class="fa fa-user"></i>  <?php echo $email;?></a></li>
                                <li><a href="settings.php"><i class="fa fa-cogs"></i>  Settings</a></li>
                             

                                <li class="divider"></li>
                                <li><a href="logout.php"><i class="fa fa-sign-out"></i> Log Out</a></li>
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
                        <a href="dashboard.php"><i class="fa fa-home"></i><span>Dashboard</span><i class="fa fa-angle-right pull-right"></i></a>
                      </li>
    <li>
                        <a href="emp-approval.php"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> <span>Employer Approval</span><i class="fa fa-angle-right pull-right"></i></a>
              </li>
                    <li>
                        <a href="newjob-approval.php"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> <span>New Job Approval</span><i class="fa fa-angle-right pull-right"></i></a>
              </li>

 <li>
        <a href="data-approval.php?approval=jobseeker"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> <span>Jobseeker Data approval</span><i class="fa fa-angle-right pull-right"></i></a>
  </li>

<li>
        <a href="data-approval.php?approval=employer"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> <span>Employer Data approval</span><i class="fa fa-angle-right pull-right"></i></a>
  </li>
  
  
 <li>
        <a href="skills.php?option=view"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> <span>Add/edit Skills</span><i class="fa fa-angle-right pull-right"></i></a>
  </li> 
  
  
  





                </ul>
            </aside>
            <!--sidebar end-->
