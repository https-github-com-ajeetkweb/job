<?php
$urlLink = $_SERVER['PHP_SELF']; 
	$urlLinkArr = explode('/',$urlLink);
	$hightNav = (end($urlLinkArr)) ? end($urlLinkArr) : '';
        ?>


  <div class="header-wrap">
         <div class="container">
            <!--row start-->
            <div class="row">
               <!--col-md-3 start-->
               <div class="col-md-3 col-sm-3">
                  <div class="logo"><a href="profile.php"><img src="images/logo.png" alt=""></a></div>
                  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
               </div>
               <!--col-md-3 end--> 
               <!--col-md-7 end-->
               <div class="col-md-4 col-sm-9">
                  <!--Navigation start-->
                  <div class="navigationwrape">
                     <div class="navbar navbar-default" role="navigation">
                        <div class="navbar-header"> </div>
                        <div class="navbar-collapse collapse">
                           <ul class="nav navbar-nav">
                              <li class="dropdown"> <a href="matching-jobs.php" <?php if($hightNav == 'matching-jobs.php'){?> class="active" <?php } ?>> Search Jobs </a>
                              </li>
                              <li> <a href="appliedjobs.php" <?php if($hightNav == 'appliedjobs.php'){?> class="active" <?php } ?>> Applied Jobs</a></li>
                              <li> <a href="profile.php" <?php if($hightNav == 'profile.php'){?> class="active" <?php } ?>> My Account </a></li>
                           </ul>
                        </div>
                        <div class="clearfix"></div>
                     </div>
                  </div>
                  <!--Navigation start--> 
               </div>
               <!--col-md-3 end--> 
               <!--col-md-2 start-->
               <div class="col-md-4 col-sm-12">
                  <div class="header-right">
                     <div class="post-btn">
                        <div class="dropdown">
                           <button class="dropbtn"><i class="fa fa-user icon_3"></i><?php echo $username;?> <i class="fa fa-angle-down"></i></button>
                           <div class="dropdown-content">
                              <a href="logout.php"><i class="fa fa-sign-out icon_3"></i>Logout</a>
                           </div>
                        </div>
                     </div>
                     <div class="clearfix"></div>
                  </div>
               </div>
               <!--col-md-2 end--> 
            </div>
            <!--row end--> 
         </div>
      </div>