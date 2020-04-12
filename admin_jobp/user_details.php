<?php
 include("include/class.user.php");
 $user= new USER();
 if(!$user->is_logged_in()) {
 $user->redirect("index.php?msg=Please Login First");
 }
  $admin=$_SESSION['name'];
  
$id=$_GET['id'];  
$stmt=$user->runQuery("select * from job_users where id=:userID");
$stmt->bindparam(":userID",$id);
$stmt->execute();
$data=$stmt->fetch(PDO::FETCH_ASSOC);

 ?>


<!DOCTYPE html>
<html>

<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" type="image/png" href="imgs/favicon.png" /> 
         <title>MeeM.one job portal - Admin</title>

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
		<style>
		tr{font-weight:bold;}
		.left_t{text-align:left!important;}
		table {
    border-collapse: collapse;
    border-spacing: 0;
    width: 100%;
    border: 1px solid #ddd;
}

th, td {
    border: none;
    text-align: left;
    padding: 8px; font-size:13px;
}
tr:nth-child(even){background-color: #f2f2f2}
.overflow{
    overflow-x:auto;
}	
td{width:250px;}
		</style>

    </head>
    <body>

        <div id="ui" class="ui">

            <!--header start-->
   <?php include("include/sidebar.php");?>
            <!--main content start-->
            <div id="content" class="ui-content ">
                <div class="ui-content-body">

                    <div class="ui-container">

                        <div class="row">
                            <div class="col-md-12">
                            
                            
                                <div class="panel profile-wrap">
                                <?php if(empty($_GET['option'])) { ?>
                                    <header class="panel-heading clearfix">
                                        <h3 class="profile-title pull-left">
                                            <?php if($_GET['view']=='active') { echo 'Active Job seeker';} elseif($_GET['view']=='inactive') { echo 'Inctive Job seeker';} elseif($_GET['view']=='expired') { echo 'Expired Job seeker';} else{ echo 'Job Applications';}?>
                                        </h3>
                                        <div class="pull-right">
										  
                                           
                                        </div>
                                    </header>
                     <div class="col-md-9 mbot-10" style="font-weight:bold;">
                     <?php if($_GET['view']=='inactive') { ?>
                       
                         <?php if($data['otp']!='0'){ ?>  Email ID : <span style="color:#009933"> <i class="fa fa-check" aria-hidden="true"></i>, </span><?php } else { ?> Email ID :<span style="color:#FF3300"> <i class="fa fa-times" aria-hidden="true"></i> Pending,   </span><?php } ?>
                         <?php if($data['verify']=='Y'){ ?>  Mobile Number : <span style="color:#009933"> <i class="fa fa-check" aria-hidden="true"></i> </span><?php } else { ?> Mobile Number :<span style="color:#FF3300"> <i class="fa fa-times" aria-hidden="true"></i> Pending</span><?php } ?>
                         <h5>Register_Date: <?php echo date('d-m-Y',strtotime($data['register_date']));?></h5>
                         
                     <?php } ?>   
                         
                      <?php if($_GET['view']=='active') { ?>
                         <div class="col-md-3">
                         <span>Plan : <?php echo $data['plan'];?></span>  
                         </div>
                          <div class="col-md-3">
                         <span>Paid Date : <?php echo date('d-m-Y',strtotime($data['paid_date']));?></span>  
                         </div>
                          <div class="col-md-4">
                         <span>Expiry Date : <?php echo date('d-m-Y',strtotime($data['expiry_date']));?></span>  
                         </div>
                      <?php } ?>  
                         
                         
                     </div> 
                     <div class="col-md-3" style="margin-bottom:20px">
                     <span><div class="btn-group"><a class="btn btn-info dropdown-toggle" href="#" data-toggle="dropdown" aria-expanded="false">Action <span class="caret"></span></a>
<ul class="dropdown-menu" >
<?php if($data['verify']=='' && $data['paid']=='') { ?>
<li><a href="javascript:void(0)" onClick="send_vlink(<?php echo $data['id'];?>)">Send verification Link</a></li>
<?php } ?>
<li><a href="javascript:void(0)" onClick="delete_nonpaid(<?php echo $data['id'];?>)">Delete</a></li>


</ul>
</div></span>
 </div>
 <?php } ?>
 
                     
                     <div class="panel-body row">
                                        
				 <div class="col-xs-12 col-sm-12 col-md-6 col-lg-12 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-0 toppad" >
     
  
          <div class="panel panel-info">
             
            <div class="panel-heading">
              <h3 class="panel-title"><?php echo $data['name'];?></h3>
            </div>
            <div class="panel-body">
              <div class="row">
             <?php if(empty($_GET['option'])) { ?>
                <div class="col-md-3 col-lg-3"> 
                <?php if(!empty($data['photo'])) { ?>
                <img src="../images/jobseeker/<?php echo $data['photo'];?>" alt="User Pic"  class="thumbnail profile_p"> 
		       <?php }else { ?>
               <img src="imgs/profile.png" alt="User Pic"  class="thumbnail profile_p"> 
               <?php } ?>
			                <div class="profile-info" style="margin:0; padding:0px;">
                                       <h5>Contact Information &nbsp;&nbsp; <a href="user_details.php?view=<?php echo $_GET['view'];?>&id=<?php echo $id;?>&option=Edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</a></h5>
                                       <ul class="list-unstyled">
                                          <li>
                                             <i class="fa fa-mobile"></i>
                                             <div class="p-i-list">
                                                <span class="text-muted">Mobile Number</span>
                                                <span class="user_contact"> <?php echo $data['mcode'].$data['mobile'];?></span>
                                             </div>
                                          </li>
                                          <li>
                                             <i class="fa fa-envelope-o"></i>
                                             <div class="p-i-list">
                                                <span class="text-muted">E-mail</span>
                                                <span class="user_contact"> <?php echo $data['email'];?></span>
                                             </div>
                                          </li>
                                          <li>
                                             <i class="fa fa-linkedin-square"></i>
                                             <div class="p-i-list">
                                                <span class="text-muted">LinkedIn </span>
                                                <span class="user_contact"><?php echo $data['link'];?></span>
                                             </div>
                                          </li>
                                          <li>
                                             <i class="fa fa-facebook-official"></i>
                                             <div class="p-i-list">
                                                <span class="text-muted">Facebook/Twitter</span>
                                                <span class="user_contact"> <?php echo $data['social_link'];?></span>
                                             </div>
                                          </li>
										  <li>
                                           <div class="p-i-list">
                                                <span class="text-muted">Others</span>
                                                <span class="user_tothers"> <?php echo $data['description'];?></span> 
                                             </div>
                                          </li>
                                       </ul>
                                    </div>
				</div>
    
     
                <div class=" col-md-9 col-lg-9 overflow"> 
                  <table class="table table-user-information">
                    <tbody >
                      <tr >
                        <td style="text-align:left;" class="my_border">Full Name</td>
                        <td style="text-align:left;" class="my_ffont"><?php echo $data['name'];?></td>
						<td style="text-align:left;" class="my_border">Gender </td>
                        <td style="text-align:left;" class="my_ffont"><?php echo $data['gender'];?></td>
                      </tr>
					  
                       <tr>
                        <td style="text-align:left;" class="my_border">Date of Birth </td>
                        <td style="text-align:left;" class="my_ffont"><?php echo $data['birth_date'];?></td>
						<td style="text-align:left;" class="my_border">Marital Status</td>
                        <td style="text-align:left;" class="my_ffont"><?php echo $data['marital_status'];?></td>
                      </tr>
					  
                       <tr>
                        <td style="text-align:left;" class="my_border">Physique  </td>
                        <td style="text-align:left;" class="my_ffont"><?php echo $data['body_type'];?></td>
						<td style="text-align:left;" class="my_border">Health  </td>
                        <td style="text-align:left;" class="my_ffont"><?php echo $data['health'];?></td>
                      </tr>

					   <tr>
                        <td style="text-align:left;" class="my_border">Religion  </td>
                        <td style="text-align:left;" class="my_ffont"><?php echo $data['religion'];?></td>
						<td style="text-align:left;" class="my_border">Height  </td>
                        <td style="text-align:left;" class="my_ffont"><?php if(isset($data['height'])) {echo $data['height']. ' Feet';}?></td>
                       </tr>
	
						<tr>
                        <td style="text-align:left;" class="my_border">Native Country  </td>
                        <td style="text-align:left;" class="my_ffont"><?php echo $data['ncountry'];?></td>
						<td style="text-align:left;" class="my_border">Native State </td>
                        <td style="text-align:left;" class="my_ffont"><?php echo $data['nstate'];?></td>
                        </tr>

						<tr>
                        <td style="text-align:left;" class="my_border">Native City </td>
                        <td style="text-align:left;" class="my_ffont"><?php echo $data['ncity'];?></td>
					    <td style="text-align:left;" class="my_border">Residence Country</td>
                        <td style="text-align:left;" class="my_ffont"><?php echo $data['rcountry'];?></td>
                       </tr>
					   	<tr>
                        <td style="text-align:left;" class="my_border">Residence State </td>
                        <td style="text-align:left;" class="my_ffont"><?php echo $data['rstate'];?></td>
					    <td style="text-align:left;" class="my_border">Residence City</td>
                        <td style="text-align:left;" class="my_ffont"><?php echo $data['rcity'];?></td>
                       </tr>
					   	<tr>
                        <td style="text-align:left;" class="my_border">Nationality </td>
                        <td style="text-align:left;" class="my_ffont"><?php echo $data['nationality'];?></td>
					    <td style="text-align:left;" class="my_border">Native Language</td>
                        <td style="text-align:left;" class="my_ffont"><?php echo $data['native_lang'];?></td>
                       </tr>
					   	<tr>
                        <td style="text-align:left;" class="my_border">Education</td>
                        <td style="text-align:left;" class="my_ffont"><?php echo $data['education'];?></td>
					    <td style="text-align:left;" class="my_border">Company/Industry/Organization work</td>
                        <td style="text-align:left;" class="my_ffont"><?php echo $data['industry'];?></td>
                       </tr>
					   	<tr>
                        <td style="text-align:left;" class="my_border">Total years of work experience</td>
                        <td style="text-align:left;" class="my_ffont"><?php echo $data['exp_year'];?> Years</td>
					    <td style="text-align:left;" class="my_border">Main Skills/Job Positions</td>
                        <td style="text-align:left;" class="my_ffont"><?php echo $data['skill'];?></td>
                       </tr>
					 	<tr>
					  <td style="text-align:left;" class="my_border">Year of Experience </td>
                        <td style="text-align:left;" class="my_ffont"><?php if(isset($data['skill_exp'])) {echo $data['skill_exp']. ' Years';}?> </td>
                        <td style="text-align:left;" class="my_border">Languages Known</td>
                        <td style="text-align:left;" class="my_ffont"> <?php  $languages=explode(' ',$data['languages_known']); foreach($languages as $lang) {  echo $lang;?> <span class="lan_g">(<?php $lang_label=strtolower($lang); echo $data["$lang_label".'_label'];?>)</span><br> <?php } ?>   </td>
						</tr>
					   	<tr>
						<td style="text-align:left;" class="my_border">Earning Currency</td>
                        <td style="text-align:left;" class="my_ffont"><?php echo $data['currency'] .' '.$data['current_salary'];?></td>	
						<td style="text-align:left;" class="my_border">Current/Last Position held </td>
                        <td style="text-align:left;" class="my_ffont"><?php echo $data['old_role'];?></td>								
                       </tr>
					  	<tr>
                        <td style="text-align:left;" class="my_border">Willing to travel</td>
                        <td style="text-align:left;" class="my_ffont"><?php if(isset($data['travel'])) { echo $data['travel'] .' '. $data['travel_by'] .' %';}?></td>									
                       </tr> 
                   </tbody>
				   </table>
				   
		 <table class="table table-user-information">
				<h4>Job Preferences Details</h4>
                    <tbody>
                      <tr>
                        <td style="text-align:left;" class="my_border">Preferred industry/company/organization</td>
                        <td style="text-align:left;" class="my_ffont"><?php echo $data['prefer_industry'];?></td>
						<td style="text-align:left;" class="my_border">Preferred Work Designation </td>
                        <td style="text-align:left;" class="my_ffont"><?php echo $data['prefer_role'];?></td>
                      </tr>
					   <tr>
                        <td style="text-align:left;" class="my_border">Preferred Job Type</td>
                        <td style="text-align:left;" class="my_ffont"><?php echo $data['prefer_jobType'];?></td>
						<td style="text-align:left;" class="my_border">Preferred country for work</td>
                        <td style="text-align:left;" class="my_ffont"><?php echo $data['prefer_country'];?></td>
                      </tr>
					   <tr>
                        <td style="text-align:left;" class="my_border">Preferred State</td>
                        <td style="text-align:left;" class="my_ffont"><?php echo $data['prefer_state'];?></td>
						<td style="text-align:left;" class="my_border">Preferred City/Town</td>
                        <td style="text-align:left;" class="my_ffont"><?php echo $data['prefer_city'];?></td>
                      </tr>
					  <tr>
                        <td style="text-align:left;" class="my_border">Preferred Currency </td>
                        <td style="text-align:left;" class="my_ffont"><?php echo $data['currency2'];?></td>
						<td style="text-align:left;" class="my_border">Preferred Minimum Salary</td>
                        <td style="text-align:left;" class="my_ffont"><?php echo $data['exp_salary'];?></td>
                      </tr>
                   </tbody>
				   </table>
                 </div>
				   <div class="col-md-12 col-xs-12">
					<div class="col-md-1 col-xs-4"><h4 style="margin-bottom:5px;">Resume:</h4></div>
					<div class="col-md-6 col-xs-8"><a href="../images/resume/<?php echo $data['resume'];?>" class="btn btn-info">Download Reusme</a></div>
					</div>
					 <div class="col-md-6 col-xs-12 no_margin"><iframe class="doc" id="bio" src="https://docs.google.com/gview?url=http://ridaits.com/meemjob/images/resume/<?php echo $data['resume'];?>&embedded=true" ></iframe></div>
					 	<div class="col-md-3 col-xs-8"><h4 style="margin-bottom:0px;">ID Proof:</h4></div>
					 <div class="col-md-6"><img src="../images/idproof/<?php echo $data['idproof'];?>" /></div>
                <?php } ?>
                <?php if(!empty($_GET['option'])) { ?>
<div class="col-md-9 ">
<h4 style="text-align:center; margin-bottom:20px">Edit contact details of <b style="color:#006699; "><?php echo $data['name'];?></b></h4>

<?php
if(isset($_POST['change-btn'])) {
$mobile=$_POST['mobile'];
$email=$_POST['email'];
$code=$_POST['code'];

$stmt=$user->runQuery("update job_users set mcode='$code', mobile='$mobile', email='$email' where id='$id'");
$stmt->execute();
if($stmt) { ?>
<script>
alert("Contacts changed successfully.");   
setTimeout(function() { window.location='user_details.php?view=<?php echo $_GET['view'];?>&id=<?php echo $id;?>';},100); 
</script>
<?php
}
}
?>
<form method="post">

<div class="col-md-12" style="margin-bottom:10px; margin-top:20px">
<div class="col-md-3">
Edit Mobile No :
</div>
<div class="col-md-2">
<input type="text" name="code" value="<?php echo $data['mcode'];?>" maxlength="5" class=" form-control">
</div>
<div class="col-md-6">
<input type="tel" name="mobile" value="<?php echo $data['mobile'];?>" maxlength="15" class=" form-control">
</div>


</div>

<div class="col-md-12" style="margin-bottom:10px">
<div class="col-md-3">
Edit Email :
</div>
<div class="col-md-8">
<input type="email" name="email" value="<?php echo $data['email'];?>" maxlength="50" class=" form-control">
</div>
</div>

<div class="col-md-12">
<div class="col-md-3">
&nbsp;
</div>
<div class="col-md-8">
<input type="submit" name="change-btn" value="Change Now" class=" btn btn-primary">
</div>
</div>

</form>

<div class="col-md-12" style="margin-bottom:5px">
<a href="user_details.php?view=<?php echo $_GET['view'];?>&id=<?php echo $id;?>" class="btn btn-default">Back</a>
</div>
</div>
<?php } ?>

              </div>
            </div>
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
        
  <script>
function send_vlink(id) {
var data={'id':id};
$.ajax ({
type: 'post',
url: 'send_link.php',
data: data,
success: function(result) {
alert('Verification Link sent');
}
});
}


function delete_nonpaid(id) {
var onfirm=confirm('Are you sure to delete this user?');
if(onfirm==true) {
var data={'id':id};
$.ajax ({
type: 'post',
url: 'delete_nonpaid.php',
data: data,
success: function(result) {
alert('Profile deleted');
setTimeout(' window.location.href = "job_seekers.php?view=<?php echo $_GET['view'];?>"; ',1000);
}
});
}
}

</script>      
        

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
