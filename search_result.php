<?php
include("include/class.user.php");
$user = new USER();
include("include/mydb.php");
 // Turn off all error reporting
ini_set('display_errors', 0);
error_reporting(0);
ini_set('error_reporting', E_ALL);

 $query="select id,job_title,prefer_skill,job_desc,city,job_type,company_name,post_date from meem_jobs where status=1 and pay_status=1";

extract($_POST);
// for education
    if(isset($_POST['education']))
    { 
        $_SESSION['education']=$_POST['education'];
      //  unset($_SESSION['location'],$_SESSION['category'],$_SESSION['min_exp'],$_SESSION['keyword']);
    }
    
  if(!empty($_SESSION['education'])) {
          $useredu=$_SESSION['education'];
          $query .= " AND prefer_edu REGEXP REPLACE('$useredu', ', ', '(\,|$)|')";
  }
    

// for location
  
      if(isset($_POST['location']))
    { 
        $_SESSION['location']=$_POST['location'];
       // unset($_SESSION['education'],$_SESSION['category'],$_SESSION['min_exp'],$_SESSION['keyword']);
    }
  
    if(!empty($_SESSION['location'])) 
    {
      $location=$_SESSION['location'];
      $query .= " and city='$location'";
    } 

    // for industry
    
      if(isset($_POST['category']))
    { 
        $_SESSION['category']=$_POST['category'];
        $industry= $_POST['category'];     
    }
    
   if(!empty($_SESSION['category'])) 
    {
      $industry=$_SESSION['category'];   
      $query .= " AND industry REGEXP REPLACE('$industry', ', ', '(\,|$)|')";
    }
    
    // for experiences  
	
   if($_POST['min_exp']){  $_SESSION['min_exp']=$_POST['min_exp']; }
    
   if(!empty($_SESSION['min_exp']) && $_SESSION['min_exp']!='Fresher') 
    {
      $exp=$_SESSION['min_exp'];
      $query .= " and $exp between prefer_min_exp and prefer_max_exp  ";
    } 
 // for freshers	
 if(isset($_SESSION['min_exp']) && $_SESSION['min_exp']=='Fresher')
 {
 // $_SESSION['min_exp']=$_POST['min_exp'];
  $query .= " and prefer_min_exp='0'  ";
 }   
	
	
	
	
   // for keyword
      if($_POST['keyword']){  $_SESSION['keyword']=mysqli_real_escape_string($con,$_POST['keyword']); } 
    
    
   if(!empty($_SESSION['keyword'])) 
    {
       $keyword= $_SESSION['keyword'];   
       $query .= " and (job_title like '%$keyword%' or company_name like '%$keyword%' or prefer_skill REGEXP REPLACE('$keyword',',', '(\,|$)|'))";
    }     

$sqlAll= mysqli_query($con, $query);
 $count1= mysqli_num_rows($sqlAll);

// pagination
    if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; };
    $limit=2;
    $start = ($page-1)*$limit;
    $paginationlink = "search_result.php?page=";
    $total_pages = ceil($count1/$limit);
    $perpageresult = $user->getAllPageLinks($total_pages, $paginationlink);

  $query  .= " order by id desc  limit $start,$limit";
$sql= mysqli_query($con, $query);

?>

     
        <ul class="listService">
        <?php
                    if (isset($sql)) {
                          $count = mysqli_num_rows($sql);
                          if ($count > 0) {
                             while ($row = mysqli_fetch_array($sql)) {    
            ?>
            <a href="job-details.php?token=<?php echo base64_encode($row['id']);?>" target="_blank">      
       <li>       
        <div class="listWrpService featured-wrap">
          <div class="row">
            <div class="col-md-2 col-sm-3 col-xs-3">
              <div class="listImg"><img src="images/feature01.png" alt=""></div>
            </div>
            <div class="col-md-10 col-sm-9 col-xs-9">
            
            <div class="row">
            <div class="col-md-9">
              <h3><?php echo $row['job_title'];?></h3>
              <p><?php echo $row['company_name'];?></p>
              <ul class="featureInfo innerfeat">
                <li><i class="fa fa-map-marker" aria-hidden="true"></i> <?php echo $row['city'];?></li>
                <li><i class="fa fa-calendar" aria-hidden="true"></i> 
                <?php  $day=date('d',strtotime($row['post_date']));
                              $month=date('M',strtotime($row['post_date']));
                              $year=date('Y',strtotime($row['post_date']));
                           echo $day. ' '. $month. ' , '. $year;   
                      ?> 
                  
                </li>
                <li style="background:#999"><?php echo $row['job_type'];?></li>
              </ul>
              <p class="para" style="margin:10px 0px">Key Skills: &nbsp; &nbsp;<?php echo $row['prefer_skill'];?></p>
            <p class="para"><?php echo substr($row['job_desc'],0,100);?>....</p>
               </div>
              <div class="col-md-3">
              <div class="click-btn apply" style="background:#0086b3; text-align: center; padding: 12px 5px; color:#fff">View Now</div>
              </div>
              </div>
              
              
            </div>
          </div>
        </div>
      
      </li>
    </a>
 <?php }}
 
 else {
     
     echo '<div class="alert alert-info text-center">No Job Found for given Criteria.</div>';   
    }
  } ?>
  
  </ul>
<?php
if(!empty($perpageresult)) {
    echo ' <div class="pagiWrap">
          <div class="row">
            <div class="col-md-4 col-sm-4 col-xs-4 col-md-push-4">';
    echo  '<ul class="pagination">';
    echo $output .= '<li><div class=" bio_p meem_pagi scrollToTop" id="pagination">' . $perpageresult . '</div></li>';
    echo '</ul>';
      echo '</div></div></div>';
    ?>
    <script>
        $(document).ready(function(){
            $('.scrollToTop').click(function(){
               $('html, body').animate({scrollTop : 150},800);
                return false;
            });

        });
    </script>
    <?php
}

?>
