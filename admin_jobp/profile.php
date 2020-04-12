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
        <link rel="stylesheet" href="bower_components/simple-line-icons/css/simple-line-icons.css">
        <link rel="stylesheet" href="dist/css/simplelightbox.min.css">
		<link rel="stylesheet" href="dist/css/demo.css">
        <!-- endinject -->

        <!-- Main Style  -->
        <link rel="stylesheet" href="dist/css/main.css">

        <script src="assets/js/modernizr-custom.js"></script>
    </head>
    <body>

        <div id="ui" class="ui">

            <!--header start-->
            <header id="header" class="ui-header">

                <div class="navbar-header" style="margin-left:10px;">
                    <!--logo start-->
                    <a href="index.html" class="navbar-brand">
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
                        </li>-->



                        <li class="dropdown dropdown-usermenu">
                            <a href="#" class=" dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                                <div class="user-avatar"><img src="imgs/a0.jpg" alt="..."></div>
                                <span class="hidden-sm hidden-xs">MeeM.one</span>
                                <!--<i class="fa fa-angle-down"></i>-->
                                <span class="caret hidden-sm hidden-xs"></span>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-usermenu pull-right">
                                <li><a href="settings.html"><i class="fa fa-cogs"></i>  Settings</a></li>
                                <li><a href="profile.html"><i class="fa fa-user"></i>  Profile</a></li>

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
                        <a href="newjobseeker.html"><i class="fa fa-user"></i><span>New Job seeker</span><i class="fa fa-angle-right pull-right"></i></a>
              </li>

                      <li>
                        <a href="oldjobseeker.html"><i class="fa fa-user-plus"></i><span>Old Job seeker</span><i class="fa fa-angle-right pull-right"></i></a>
                   </li>
				     <li>
                        <a href="newemployer.html"><i class="fa fa-suitcase"></i><span>New Employer</span><i class="fa fa-angle-right pull-right"></i></a>
                   </li>
				   	<li>
                        <a href="createdjobs.html"><i class="fa fa-suitcase"></i><span>Employer Created Jobs</span><i class="fa fa-angle-right pull-right"></i></a>
                   </li>
				   	<li>
                        <a href="pendingemp.html"><i class="fa fa-list-alt"></i><span> Pending Employers Profile</span><i class="fa fa-angle-right pull-right"></i></a>
                   </li>
                </ul>
            </aside>
            <!--sidebar end-->

            <!--main content start-->
            <div id="content" class="ui-content ">
                <div class="ui-content-body">

                    <div class="ui-container">

                        <div class="row">
                            <div class="col-md-12">
                                <div class="panel profile-wrap">
                                    <header class="panel-heading clearfix">
                                        <h3 class="profile-title pull-left">Employer Profile</h3>
                                        <div class="pull-right">
										   <a href="createdjobs.html" class="btn btn-sm btn-info"><i class="fa fa-suitcase"></i> Created Jobs</a>
                                            <a href="#" class="btn btn-sm btn-success"><i class="fa fa-thumbs-o-up"></i> Profile Approval</a>
                                            <a href="#" class="btn btn-sm btn-danger"><i class="fa fa-trash-o"></i> Reject</a>
                                        </div>
                                    </header>
                                    <div class="panel-body row">
									                    <div class="col-md-12">
									<div class="col-md-4">
									      <div class="profile-thumb gallery">
                                               <img src="imgs/a4.jpg" class="profile_height thumbnail"/>
                                            </div>
									</div>	
<div class="col-md-6">               
											
						

                                            <div class="profile-info">
                                                <h5>Contact Information</h5>
                                                <ul class="list-unstyled">
                                                    <li>
                                                        <i class="fa fa-mobile"></i>
                                                        <div class="p-i-list">
                                                            <span class="text-muted">Mobile Number</span>
                                                            <span class="user_contact"> (+966) 123456789</span>
                                                        </div>
                                                    </li>
                                      
                                                    <li>
                                                        <i class="fa fa-envelope-o"></i>
                                                        <div class="p-i-list">
                                                            <span class="text-muted">E-mail</span>
                                                           <span class="user_contact"> xyzzzzz@gmail.com</span>
                                                        </div>
                                                    </li>
                                            <li>
                                                        <i class="fa fa-map-marker"></i>
                                                        <div class="p-i-list">
                                                            <span class="text-muted">Office Address</span>
                                                           <span class="user_contact"> 121 King Street, xyzz <br>
                                                            xyzzzzzz 3000 xyzzzzzz</span>
                                                        </div>
                                                    </li>
													
                                                </ul>
                                            </div>
											
											      <div class="profile-info">
                                                <h5 class="about_me">Others</h5>

                                                <p  class="text-justify text-admin">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam architecto
                                                    beatae cupiditate delectus dicta dolores doloribus eaque eos esse excepturi
                                                    expedita illum inventore ipsam iste...</p>
                                            </div>
											</div>										
				
                                         <div class="profile-info">
                                                
                             <div class="row ">
							  <div class="col-md-12 col-xs-12 margin_t porile_bg"><i class="fa fa-user"></i> Details</div>
							 <div class="col-md-12 margin_t col-xs-12">
				             <div class="col-md-6 col-xs-12 no_margin">
							 <div class="col-md-6 col-xs-6 ph_text my_border">Full Name</div>
							 <div class="col-md-6 col-xs-6 sh_text"><span class="space_p">Khan</span></div>
							 </div>
							 
							 <div class="col-md-6 col-xs-12 no_margin">
							 <div class="col-md-6 col-xs-6 ph_text my_border">Company Name</div>
							 <div class="col-md-6 col-xs-6 sh_text">Rida ITS</div>
							 </div>
							 </div>
							 
				            <div class="col-md-12 margin_t col-xs-12">
				             <div class="col-md-6 col-xs-12 no_margin">
							 <div class="col-md-6 col-xs-6 ph_text my_border">Industry Type</div>
							 <div class="col-md-6 col-xs-6 sh_text">Software</div>
							 </div>
							 
							 <div class="col-md-6 col-xs-12 no_margin">
							 <div class="col-md-6 col-xs-6 ph_text my_border">Department</div>
							 <div class="col-md-6 col-xs-6 sh_text">Company</div>
							 </div>
							 </div>
							 
							 <div class="col-md-12 margin_t col-xs-12">
				             <div class="col-md-6 col-xs-12 no_margin">
							 <div class="col-md-6 col-xs-6 ph_text my_border">Organization</div>
							 <div class="col-md-6 col-xs-6 sh_text">Web Developer</div>
							 </div> 
							 
							 <div class="col-md-6 col-xs-12 no_margin">
							 <div class="col-md-6 col-xs-6 ph_text my_border">Country</div>
							 <div class="col-md-6 col-xs-6 sh_text">India</div>
							 </div>
							 </div>
							 
							 <div class="col-md-12 margin_t col-xs-12">
				             <div class="col-md-6 col-xs-12 no_margin">
							 <div class="col-md-6 col-xs-6 ph_text my_border">State</div>
							 <div class="col-md-6 col-xs-6 sh_text">Telangana</div>
							 </div>
							 
							 <div class="col-md-6 col-xs-12 no_margin">
							 <div class="col-md-6 col-xs-6 ph_text my_border">City</div>
							 <div class="col-md-6 col-xs-6 sh_text">Hyderabad</div>
							 </div>
							 </div>
							 
							 <div class="col-md-12 margin_t col-xs-12">
				             <div class="col-md-6 col-xs-12 no_margin">
							 <div class="col-md-6 col-xs-6 ph_text my_border">Linked-in</div>
							 <div class="col-md-6 col-xs-6 sh_text">xyzxyz</div>
							 </div>
							 
					
							 </div>
							 
									
						
						   </div><!-- End row -->
						   
						   
						   
						   
						   
                                            </div>
                                        </div>

                    
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
<script type="text/javascript" src="dist/js/simple-lightbox.js"></script>
<script>
	$(function(){
		var $gallery = $('.gallery a').simpleLightbox();

		$gallery.on('show.simplelightbox', function(){
			console.log('Requested for showing');
		})
		.on('shown.simplelightbox', function(){
			console.log('Shown');
		})
		.on('close.simplelightbox', function(){
			console.log('Requested for closing');
		})
		.on('closed.simplelightbox', function(){
			console.log('Closed');
		})
		.on('change.simplelightbox', function(){
			console.log('Requested for change');
		})
		.on('next.simplelightbox', function(){
			console.log('Requested for next');
		})
		.on('prev.simplelightbox', function(){
			console.log('Requested for prev');
		})
		.on('nextImageLoaded.simplelightbox', function(){
			console.log('Next image loaded');
		})
		.on('prevImageLoaded.simplelightbox', function(){
			console.log('Prev image loaded');
		})
		.on('changed.simplelightbox', function(){
			console.log('Image changed');
		})
		.on('nextDone.simplelightbox', function(){
			console.log('Image changed to next');
		})
		.on('prevDone.simplelightbox', function(){
			console.log('Image changed to prev');
		})
		.on('error.simplelightbox', function(e){
			console.log('No image found, go to the next/prev');
			console.log(e);
		});
	});
</script>
    </body>


</html>
