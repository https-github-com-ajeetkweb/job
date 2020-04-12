<?php
   include("include/class.user.php");
   $user = new USER();
   
   // Turn off all error reporting
   ini_set('display_errors',1);
   error_reporting(1);
   ini_set('error_reporting', E_ALL);
   $phpself = $_SERVER['PHP_SELF'];
   include("include/mydb.php");
   ?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
      <title>MeeM.one Job Portal - Register as job seeker</title>
      <!-- Fav Icon -->
      <link rel="shortcut icon" href="">
      <!-- Bootstrap -->
      <link href="css/bootstrap.min.css" rel="stylesheet">
      <link href="css/owl.carousel.css" rel="stylesheet">
      <link href="css/font-awesome.css" rel="stylesheet">
      <link href="css/style.css" rel="stylesheet">
      <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic' rel='stylesheet' type='text/css'>
      <link href="https://fonts.googleapis.com/css?family=Alice" rel="stylesheet">
      <link rel="stylesheet" href="css/bootstrap-select.css">
      <link href="css/fSelect.css" rel="stylesheet">
      <link rel="stylesheet" href="css/main.min.css">
     <link rel="stylesheet" href="css/select2.min.css">
      <style>
         .red-border{
         border: 1px solid red;
         background: #000;
         } 
         .tool_tip{color:#357eb0; font-size: 14px;}
      </style>
      <script src="js/jquery.min.js"></script> 
   </head>
   <body>
      <!--header start-->
      <div class="header-wrap">
         <div class="container">
            <!--row start-->
            <div class="row">
               <!--col-md-3 start-->
               <div class="col-md-3 col-sm-3">
                  <div class="logo"><a href="index.php"><img src="images/logo.png" alt=""></a></div>
                  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
               </div>
               <!--col-md-3 end--> 
               <!--col-md-7 end-->
               <div class="col-md-4 col-sm-9">
                  <!--Navegation start-->
                  <div class="navigationwrape">
                     <div class="navbar navbar-default" role="navigation">
                        <div class="navbar-header"> </div>
                        <div class="navbar-collapse collapse">
                           <ul class="nav navbar-nav">
                              <li class="dropdown"> <a href="index.php" class="active"> Home </a>
                              </li>
                              <li> <a href="aboutus.php"> About Us</a></li>
                              <li> <a href="contactus.php"> Contact us </a></li>
                           </ul>
                        </div>
                        <div class="clearfix"></div>
                     </div>
                  </div>
                  <!--Navegation start--> 
               </div>
               <!--col-md-3 end--> 
               <!--col-md-2 start-->
               <div class="col-md-5 col-sm-12">
                  <div class="header-right">
                     <div class="post-btn"><a href="jobseeker.php"><i class="fa fa-user"></i> Job Seeker</a></div>
                     <div class="login-btn"><a href="login.php">Login</a></div>
                     <div class="user-wrap">
                        <div class="clearfix"></div>
                     </div>
                     <div class="clearfix"></div>
                  </div>
               </div>
               <!--col-md-2 end--> 
            </div>
            <!--row end--> 
         </div>
      </div>
      <!--header start end--> 
      <!--inner heading start-->
      <div class="inner-heading">
         <div class="container">
            <h3>Job Seeker Registration</h3>
         </div>
      </div>
      <!--inner heading end--> 
      <!--Inner Content start-->
      <div class="inner-content loginWrp pattern_1">
         <div class="container ">
            <!--Post Job Start-->
            <div class="row">
               <div class="col-md-1 col-sm-1"></div>
               <div class="col-md-10 col-sm-10">
                  <div class="login-j" id="registerform">
                     <div class="formint conForm">
                        <form id="Jobseeker_registerForm" name="loginForm" method="post" enctype="multipart/form-data">
                           <div class="row">
                              <div class="contctxt">General Information <span class="red">*</span></div>
                              <div class="row">
                                 <div class="col-md-4 col-xs-6">
                                    <div class="input-wrap">
                                       <label>Full Name <span class="red">*</span> <span data-toggle="tooltip" title="Enter your full name.only single space allowed"><i class="fa fa-info-circle tool_tip"></i></span></label>
                                       <input type="text" name="name" id="name" placeholder="Enter your full name" class="form-control" maxlength="35" onBlur="validate_jobseeker('name')" onKeyPress="return ValidateAlpha(event);">
                                    </div>
                                 </div>
                                 <div class="col-md-4 col-xs-6">
                                    <div class="input-wrap">
                                       <label>Email <span class="red">*</span> <span data-toggle="tooltip" title="Enter your valid email.This will be verified."><i class="fa fa-info-circle tool_tip"></i></span></label>
                                       <input type="email" name="email" id="email" maxlength="35" placeholder="Type your email" class="form-control" onBlur="checkmailUser(this.value)">
                                       <span id="msg" style=""></span>
                                    </div>
                                 </div>
                                 <div class="col-md-4 margin_11m">
                                    <div class="input-wrap">
                                       <label>Gender <span class="red">*</span> <span data-toggle="tooltip" title="Select your gender."><i class="fa fa-info-circle tool_tip"></i></span></label>
                                       <div class="radio" style="margin:3px 0px 0px 1px; padding:0px;">
                                          <label class="i-checks">
                                          <input name="gender" id="gender" value="Male"  type="radio">
                                          <i></i> <img src="images/male.png" />Male</label>
                                          <label class="i-checks" style="margin-left:20px;">
                                          <input name="gender" id="gender" value="Female" type="radio"><i></i> <img src="images/female.png" />Female</label>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="row meemjm">
                                 <div class="col-md-4  col-xs-6">
                                    <label>Date of Birth <span class="red">*</span> <span data-toggle="tooltip" title="Select your month of birth"><i class="fa fa-info-circle tool_tip"></i></span></label>
                                    <div class="styled-select">
                                       <select class="form-control" name="bmonth" id="bmonth">
                                          <option value="" selected>Select Month</option>
                                          <option value="01">January</option>
                                          <option value="02">February</option>
                                          <option value="03">March</option>
                                          <option value="04">April</option>
                                          <option value="05">May</option>
                                          <option value="06">June</option>
                                          <option value="07">July</option>
                                          <option value="08">August</option>
                                          <option value="09">September</option>
                                          <option value="10">October</option>
                                          <option value="11">November</option>
                                          <option value="12">December</option>
                                       </select>
                                       <span class="fa fa-sort-desc"></span>
                                    </div>
                                 </div>
                                 <div class="col-md-1 no_margin hidden-xs hidden-sm "><i class="fa fa-arrow-right"></i></div>
                                 <div class="col-md-4 col-xs-6 ">
                                    <label>Year <span class="red">*</span> <span data-toggle="tooltip" title="Select your year of birth."><i class="fa fa-info-circle tool_tip"></i></span></label>
                                    <div class="styled-select">
                                       <select class="form-control" name="byear" id="byear">
                                          <option value="" selected>Select Year</option>
                                          <option value="2001">2001</option>
                                          <option value="2000">2000</option>
                                          <option value="1999">1999</option>
                                          <option value="1998">1998</option>
                                          <option value="1997">1997</option>
                                          <option value="1996">1996</option>
                                          <option value="1995">1995</option>
                                          <option value="1994">1994</option>
                                          <option value="1993">1993</option>
                                          <option value="1992">1992</option>
                                          <option value="1991">1991</option>
                                          <option value="1990">1990</option>
                                          <option value="1989">1989</option>
                                          <option value="1988">1988</option>
                                          <option value="1987">1987</option>
                                          <option value="1986">1986</option>
                                          <option value="1985">1985</option>
                                          <option value="1984">1984</option>
                                          <option value="1983">1983</option>
                                          <option value="1982">1982</option>
                                          <option value="1981">1981</option>
                                          <option value="1980">1980</option>
                                          <option value="1979">1979</option>
                                          <option value="1978">1978</option>
                                          <option value="1977">1977</option>
                                          <option value="1976">1976</option>
                                          <option value="1975">1975</option>
                                          <option value="1974">1974</option>
                                          <option value="1973">1973</option>
                                          <option value="1972">1972</option>
                                          <option value="1971">1971</option>
                                          <option value="1970">1970</option>
                                          <option value="1969">1969</option>
                                          <option value="1968">1968</option>
                                          <option value="1967">1967</option>
                                          <option value="1966">1966</option>
                                          <option value="1965">1965</option>
                                          <option value="1964">1964</option>
                                          <option value="1963">1963</option>
                                          <option value="1962">1962</option>
                                          <option value="1961">1961</option>
                                          <option value="1960">1960</option>
                                          <option value="1959">1959</option>
                                          <option value="1958">1958</option>
                                          <option value="1957">1957</option>
                                          <option value="1956">1956</option>
                                          <option value="1955">1955</option>
                                          <option value="1954">1954</option>
                                          <option value="1953">1953</option>
                                          <option value="1952">1952</option>
                                          <option value="1951">1951</option>
                                          <option value="1950">1950</option>
                                          <option value="1949">1949</option>
                                          <option value="1948">1948</option>
                                          <option value="1947">1947</option>
                                          <option value="1946">1946</option>
                                          <option value="1945">1945</option>
                                          <option value="1944">1944</option>
                                          <option value="1943">1943</option>
                                          <option value="1942">1942</option>
                                          <option value="1941">1941</option>
                                          <option value="1940">1940</option>
                                          <option value="1939">1939</option>
                                          <option value="1938">1938</option>
                                          <option value="1937">1937</option>
                                          <option value="1935">1935</option>
                                          <option value="1934">1934</option>
                                          <option value="1933">1933</option>
                                          <option value="1932">1932</option>
                                          <option value="1931">1931</option>
                                          <option value="1930">1930</option>
                                          <option value="1929">1929</option>
                                          <option value="1928">1928</option>
                                          <option value="1927">1927</option>
                                       </select>
                                       <span class="fa fa-sort-desc"></span>
                                    </div>
                                 </div>
                                 <div class="col-md-4 margin_11m">
                                    <label>Marital Status <span data-toggle="tooltip" title="Select your marital status. Do not ignore, this may need for specific job."><i class="fa fa-info-circle tool_tip"></i></span></label>
                                    <div class="styled-select">
                                       <select class="form-control" name="marital" id="marital">
                                          <option value="" selected>--Select--</option>
                                          <option value="Married">Married</option>
                                          <option value="Unmarried">Unmarried</option>
                                          <option value="Divorced">Divorced</option>
                                          <option value="Widow">Widow</option>
                                          <option value="Widower">Widower</option>
                                       </select>
                                       <span class="fa fa-sort-desc"></span>
                                    </div>
                                 </div>
                              </div>
                              <div class="row meemjm">
                                 <div class="col-md-4">
                                    <label>Physique <span data-toggle="tooltip" title="Select your marital status. Do not ignore,this may need for specific job."><i class="fa fa-info-circle tool_tip"></i></span></label>
                                    <div class="styled-select">
                                       <select class="form-control" name="bodi" id="physique">
                                          <option value="" selected>--Select--</option>
                                          <option value="Slim">Slim</option>
                                          <option value="Athletic">Athletic</option>
                                          <option value="Build Muscular">Build Muscular</option>
                                          <option value="Slight over weight">Slight over weight</option>
                                          <option value="Moderate over weight">Moderate over weight</option>
                                          <option value="Heavy over weight">Heavy over weight</option>
                                       </select>
                                       <span class="fa fa-sort-desc"></span>
                                    </div>
                                 </div>
                                 <div class="col-md-4 margin_12m">
                                    <label>Health <span data-toggle="tooltip" title="Select your health status. Do not ignore,this may need for specific job."><i class="fa fa-info-circle tool_tip"></i></span></label>
                                    <div class="styled-select">
                                       <select class="form-control" name="health" id="healthy">
                                          <option value="" selected>--Select--</option>
                                          <option value="Healthy">Healthy</option>
                                          <option value="Physical challenged">Physical challenged</option>
                                          <option value="Minor health issue">Minor health issue</option>
                                       </select>
                                       <span class="fa fa-sort-desc"></span>
                                    </div>
                                 </div>
                                 <div class="col-md-4 margin_12m">
                                    <label>Religion <span data-toggle="tooltip" title="Select your religion. Do not ignore,this may need for specific job."><i class="fa fa-info-circle tool_tip"></i></span></label>
                                    <div class="styled-select">
                                       <select class="form-control" name="religion" id="religion">
                                          <option value="" selected>--Select--</option>
                                          <option value="Muslim">Muslim</option>
                                          <option value="Hindu">Hindu</option>
                                          <option value="Christian">Christian</option>
                                          <option value="Sikh">Sikh</option>
                                       </select>
                                       <span class="fa fa-sort-desc"></span>
                                    </div>
                                 </div>
                              </div>
                              <div class="row meemjm">
                               <script type="text/javascript">
                                    function calculatecm() {
								
                                        var feet = document.getElementById("feet").value;
                                        var inch = document.getElementById("inch").value;
                                        var cm = Math.round(feet * 30.5 + inch * 2.54);
                                        document.getElementById("ucm").value = cm;
                                    }
                                 </script>
                              
                              
                                 <div class="col-md-4 col-xs-6">
                                    <label>Height <span data-toggle="tooltip" title="Select your height. Do not ignore,this may need for specific job."><i class="fa fa-info-circle tool_tip"></i></span></label>
                                    <div class="styled-select">
                                       <select id="feet" name="ufeet" class="form-control"  onChange="calculatecm()">
                                          <option value="" selected="selected">Feet</option>
                                          <option value="1">1</option>
                                          <option value="2">2</option>
                                          <option value="3">3</option>
                                          <option value="4">4</option>
                                          <option value="5">5</option>
                                          <option value="6">6</option>
                                          <option value="7">7</option>
                                          <option value="8">8</option>
                                          <option value="9">9</option>
                                          <option value="10">10</option>
                                       </select>
                                       <span class="fa fa-sort-desc"></span>
                                    </div>
                                 </div>
                                 <div class="col-md-1  height_w hidden-xs hidden-sm">+</div>
                                 <div  class="col-md-4 col-xs-6">
                                    <label>Inch</label>
                                    <div class="styled-select">
                                       <select id="inch" name="uinch" class="form-control" onChange="calculatecm()">
                                          <option value="" selected="selected">Inch</option>
                                          <option value="0">0</option>
                                          <option value="1">1</option>
                                          <option value="2">2</option>
                                          <option value="3">3</option>
                                          <option value="4">4</option>
                                          <option value="5">5</option>
                                          <option value="6">6</option>
                                          <option value="7">7</option>
                                          <option value="8">8</option>
                                          <option value="9">9</option>
                                          <option value="10">10</option>
                                          <option value="11">11</option>
                                       </select>
                                       <span class="fa fa-sort-desc"></span>
                                    </div>
                                 </div>
                                 <div class="col-md-1  height_c hidden-xs hidden-sm">=</div>
                                 <div  class="col-md-4 margin_11m">
                                    <label>CM </label>
                                    <div class="input-wrap">
                                       <input type="text" name="cmheight" id="ucm" class="form-control" readonly>
                                    </div>
                                 </div>
                              </div>
                              <div class="row meemjm">
                                 <div class="col-md-4 col-xs-6">
                                    <label>Native Country <span class="red">*</span> <span data-toggle="tooltip" title="Select your native country where you born."><i class="fa fa-info-circle tool_tip"></i></span></label>
                                    <div class="styled-select">
                                       <select id="ncountry" name="ncountry" onBlur="myFunction('step1')" class="form-control country">
                                          <option value="" selected="selected">-- Select --</option>
                                          <?php
                                             $s = mysqli_query($con,"select * from country");
                                             while ($rw = mysqli_fetch_array($s)) {
                                                 $cid = $rw['country_name'];
                                                 ?>
                                          <option value="<?php echo $rw['country_id']; ?>"><?php echo $rw['country_name']; ?></option>
                                          <?php } ?>
                                       </select>
                                       <span class="fa fa-sort-desc"></span>
                                    </div>
                                 </div>
                                 <div class="col-md-4 col-xs-6">
                                    <label>Native State <span class="red">*</span> <span data-toggle="tooltip" title="Select your native state of your county, where you born."><i class="fa fa-info-circle tool_tip"></i></span></label>
                                    <div class="styled-select">
                                       <select id="state[]" name="nstate" onBlur="myFunction('step1')" class="form-control astate">
                                          <option value="" selected="selected" >-- Select --</option>
                                       </select>
                                    
                                       <span class="fa fa-sort-desc"></span>
                                    </div>
                                 </div>
                                 <div class="col-md-4 margin_11m">
                                    <label>Native City <span class="red">*</span> <span data-toggle="tooltip" title="Select your native city of your state where you born."><i class="fa fa-info-circle tool_tip"></i></span></label>
                                    <div class="styled-select">
                                       <select id="city[]" name="ncity" onBlur="myFunction('step1')" class="form-control city">
                                          <option value="" selected="selected" >-- Select --</option>
                                       </select>
                                   
                                       <span class="fa fa-sort-desc"></span>
                                    </div>
                                 </div>
                              </div>
                              <div class="row meemjm">
                                 <div class="col-md-4">
                                    <label>Residence Country <span class="red">*</span> <span data-toggle="tooltip" title="Select your Residence country where you reside."><i class="fa fa-info-circle tool_tip"></i></span></label>
                                    <div class="styled-select">
                                       <select id="rcountry" name="rcountry" onBlur="myFunction('step1')" class="form-control rcountry">
                                          <option value="" selected="selected">-- Select --</option>
                                          <?php
                                             $s = mysqli_query($con,"select * from country");
                                             while ($rw = mysqli_fetch_array($s)) {
                                                 ?>
                                          <option value="<?php echo $rw['country_id']; ?>" ><?php echo $rw['country_name']; ?></option>
                                          <?php } ?>
                                       </select>
                                       <span class="fa fa-sort-desc"></span>
                                    </div>
                                 </div>
                                 <div class="col-md-4 margin_12m">
                                    <label>Residence State <span class="red">*</span> <span data-toggle="tooltip" title="Select your Residence state of your county, where you reside."><i class="fa fa-info-circle tool_tip"></i></span></label>
                                    <div class="styled-select">
                                       <select id="rstate[]" name="rstate" onBlur="myFunction('step1')" class="form-control rstate">
                                          <option value="" selected="selected" >-- Select --</option>
                                       </select>
                                   
                                       <span class="fa fa-sort-desc"></span>
                                    </div>
                                      
                                 </div>
                                 <div class="col-md-4 margin_12m">
                                    <label>Residence City <span class="red">*</span> <span data-toggle="tooltip" title="Select your Residence city of your state where you reside."><i class="fa fa-info-circle tool_tip"></i></span></label>
                                    <div class="styled-select">
                                       <select id="rcity[]" name="rcity" onBlur="myFunction('step1')" class="form-control rcity">
                                          <option value="" selected="selected">--Select--</option>
                                       </select>
                                       <span class="fa fa-sort-desc"></span>
                                    </div>
                                 </div>
                              </div>
                              <div class="row meemjm">
                                 <div class="col-md-4">
                                    <div class="row">
                                       <div class="col-md-6 col-xs-6">
                                          <label><i class="fa fa fa-phone c_mob"></i> Country Code <span class="red">*</span> <span data-toggle="tooltip" title="Select country code for your contact mobile number."><i class="fa fa-info-circle tool_tip"></i></span></label>
                                          <div class="styled-select">
                                             <select class="form-control countrycode" name="code" id="country_code">
                                                <option value="" selected>--Select--</option>
                                                <option value="+91">+91 India</option>
                                                <option value="+43">Australia +43</option>
                                                <option value="+973">Bahrain +973</option>
                                                <option value="+880">Bangladesh +880</option>
                                                <option value="+1">Canada +1 </option>
                                                <option value="+20">Egypt +20</option>
                                                <option value="+49">Germany +49</option>
                                                <option value="+62">Indonesia +62</option>
                                                <option value="+962">Jordon +962</option>
                                                <option value="+965">Kuwait +965</option>
                                                <option value="+961">Lebanon +961</option>
                                                <option value="+218">Libya +218</option>
                                                <option value="+60">Malaysia +60</option>
                                                <option value="+960">Maldives  +960</option>
                                                <option value="+230">Mauritius +230</option>
                                                <option value="+977">Nepal +977</option>
                                                <option value="+968">Oman +968</option>
                                                <option value="+92">Pakistan +92</option>
                                                <option value="+974">Qatar +974</option>
                                                <option value="+966">Saudi Arabia +966</option>
                                                <option value="+27">South Africa +27</option>
                                                <option value="+94">Siri Lanka +94</option>
                                                <option value="+249">Sudan +249</option>
                                                <option value="+971">UAE +971</option>
                                                <option value="+44">UK +44</option>
                                                <option value="+1">USA +1</option>
                                                <option value="+967">Yemen +967</option>
                                             </select>
                                             <span class="fa fa-sort-desc"></span>
                                          </div>
                                       </div>
                                       <div class="col-md-6 col-xs-6 no_pad">
                                          <label>Mobile Number <span class="red">*</span> <span data-toggle="tooltip" title="Enter your valid contact mobile number. This will be verified."><i class="fa fa-info-circle tool_tip"></i></span></label>
                                          <div class="input-wrap">
                                             <input type="tel" id="mobile" name="mobile" placeholder="Type your mobile number" class="form-control" onKeyPress="return isNumberKey(event)" onBlur="checkValue(this.value)" maxlength="10">
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-md-4 margin_12m">
                                    <label>Nationality <span class="red">*</span> <span data-toggle="tooltip" title="Select your nationality."><i class="fa fa-info-circle tool_tip"></i></span></label>
                                    <div class="styled-select">
                                       <select class="form-control" name="nationality" id="nationality">
                                          <option value="" selected="selected">-- Select --</option>
                                          <?php
                                             $data=$user->getNationality();
                                              	 foreach($data as $nr) {?>
                                          <option value="<?php echo $nr['nation_name'];?>"><?php echo $nr['nation_name'];?></option>
                                          <?php } ?>
                                       </select>
                                       <span class="fa fa-sort-desc"></span>
                                    </div>
                                 </div>
                                 <div class="col-md-4 margin_12m">
                                    <label>Native Language <span data-toggle="tooltip" title="Select your native language by birth. Do not ignore, this may need for specific job."><i class="fa fa-info-circle tool_tip"></i></span></label>
                                    <div class="styled-select">
                                       <select id="nativeLanguage" name="nt_lang" onBlur="myFunction('step3')" class="form-control">
                                          <option value="" selected>-- Select --</option>
                                          <?php
                                             $data=$user->getLanguages();
                                             foreach($data as $lr) {?>
                                          <option value="<?php echo $lr['language_name'];?>"><?php echo $lr['language_name'];?></option>
                                          <?php } ?>
                                       </select>
                                       <span class="fa fa-sort-desc"></span>
                                    </div>
                                 </div>
                              </div>
                              <div class="contctxt">Education & Career <span class="red">*</span></div>
                              <div class="row">
                                 <div class="col-md-4">
                                    <label>Education <i class="fa fa-graduation-cap"></i> <span class="red">*</span> <span data-toggle="tooltip" title="Select your all highest education qualification."><i class="fa fa-info-circle tool_tip"></i></span></label>
                                    <select class="test" name="edu[]" multiple="multiple" id="education">
                                       <option value="">None selected</option>
                                       <?php
                                          $data=$user->getEducation();
                                          foreach($data as $er) {?>
                                       <option value="<?php echo $er['education'];?>"><?php echo $er['education'];?></option>
                                       <?php } ?>
                                    </select>
                                 </div>
                                 <div class="col-md-4 margin_12m">
                                    <label>Company/Industry/Organization work  <span data-toggle="tooltip" title="Select all Type of Companies / Industries / Organisations, you worked."><i class="fa fa-info-circle tool_tip"></i></span></label>
                                    <select class="test" multiple="multiple" id="company" name="company[]">
                                       <?php
                                          $data=$user->getIndustry();
                                          foreach($data as $er) {?>
                                       <option value="<?php echo $er['name'];?>"><?php echo $er['name'];?></option>
                                       <?php } ?>
                                    </select>
                                 </div>
                                 <div class="col-md-4 margin_12m">
                                    <label>Total years of work experience <span data-toggle="tooltip" title="Select your total years of work experience irrespective of job type/roles/designations."><i class="fa fa-info-circle tool_tip"></i></span></label>
                                    <div class="styled-select">
                                       <select class="form-control" name="experience" id="wexperience">
                                          <option value="" selected>--Select--</option>
                                          <option value="Fresher">Fresher</option>
                                          <option value="1">1 Year</option>
                                          <option value="2">2 Years</option>
                                          <option value="3">3 Years</option>
                                          <option value="4">4 Years</option>
                                          <option value="5">5 Years</option>
                                          <option value="6">6 Years</option>
                                          <option value="7">7 Years</option>
                                          <option value="8">8 Years</option>
                                          <option value="9">9 Years</option>
                                          <option value="10">10 Years</option>
                                          <option value="11">11 Years</option>
                                          <option value="12">12 Years</option>
                                          <option value="13">13 Years</option>
                                          <option value="14">14 Years</option>
                                          <option value="15">15 Years</option>
                                          <option value="16">16 Years</option>
                                          <option value="17">17 Years</option>
                                          <option value="18">18 Years</option>
                                          <option value="19">19 Years</option>
                                          <option value="20">20 Years</option>
                                          <option value="21">21 Years</option>
                                          <option value="22">22 Years</option>
                                          <option value="23">23 Years</option>
                                          <option value="24">24 Years</option>
                                          <option value="25">25 Years</option>
                                          <option value="26">26 Years</option>
                                          <option value="27">27 Years</option>
                                          <option value="28">28 Years</option>
                                          <option value="29">29 Years</option>
                                          <option value="30">30 Years</option>
                                          <option value="30">30 Years</option>
                                       </select>
                                       <span class="fa fa-sort-desc"></span>
                                    </div>
                                 </div>
                              </div>
                              <div class="row sel_margin">
                                 <div class="col-md-4">
                                    <label>Main Skills/Job Positions <span class="red">*</span> <span data-toggle="tooltip" title="Select all your major skills you have and/or job positions(designations) you held. Do not ignore this needed for matching jobs."><i class="fa fa-info-circle tool_tip"></i></span></label>
                               <select  name="skill[]" id="skill_input" class="form-control js-example-basic-select2" multiple="multiple">
                                             <option value="">Select Main Skills/Positions required</option>
                                             <?php
											 $query = mysqli_query($con,"SELECT  skill_name as name FROM skill_tble");
											 while($row=mysqli_fetch_array($query)) {
											 ?>
                                             <option value="<?php echo $row['name'];?>"><?php echo $row['name'];?></option>
                                            <?php } ?>
											 </select>
										  </div>
                                 <div class="col-md-4 margin_12m">
                                    <label>Year of Experience <span class="red">*</span> <span data-toggle="tooltip" title="Select total year's experience for these major skills/ job positions."><i class="fa fa-info-circle tool_tip"></i></span></label>
                                    <div class="styled-select">
                                       <select class="form-control" name="experience2" id="yexperience">
                                          <option value="" selected>--Select--</option>
                                          <option value="Fresher">Fresher</option>
                                          <option value="1">1 Year</option>
                                          <option value="2">2 Years</option>
                                          <option value="3">3 Years</option>
                                          <option value="4">4 Years</option>
                                          <option value="5">5 Years</option>
                                          <option value="6">6 Years</option>
                                          <option value="7">7 Years</option>
                                          <option value="8">8 Years</option>
                                          <option value="9">9 Years</option>
                                          <option value="10">10 Years</option>
                                          <option value="11">11 Years</option>
                                          <option value="12">12 Years</option>
                                          <option value="13">13 Years</option>
                                          <option value="14">14 Years</option>
                                          <option value="15">15 Years</option>
                                          <option value="16">16 Years</option>
                                          <option value="17">17 Years</option>
                                          <option value="18">18 Years</option>
                                          <option value="19">19 Years</option>
                                          <option value="20">20 Years</option>
                                          <option value="21">21 Years</option>
                                          <option value="22">22 Years</option>
                                          <option value="23">23 Years</option>
                                          <option value="24">24 Years</option>
                                          <option value="25">25 Years</option>
                                          <option value="26">26 Years</option>
                                          <option value="27">27 Years</option>
                                          <option value="28">28 Years</option>
                                          <option value="29">29 Years</option>
                                          <option value="30">30 Years</option>
                                          <option value="30">30 Years</option>
                                       </select>
                                       <span class="fa fa-sort-desc"></span>
                                    </div>
                                 </div>
                                 <div class="col-md-4 margin_12m">
                                    <label>Languages Known <span data-toggle="tooltip" title="Select all languages you know. Do not ignore, this may need for specific job."><i class="fa fa-info-circle tool_tip"></i></span></label>
                                    <div class="multiselect">
                                       <div class="selectBox fom-control" onClick="showCheckboxes()">
                                          <select name="lang_known">
                                             <option>Select Languages</option>
                                          </select>
                                          <div class="overSelect"></div>
                                       </div>
                                       <div id="checkboxes">
                                          <label class="lable_t">
                                          <input type="checkbox" name="english" value="English" id="english" onChange="selectlabel()" /> English</label>
                                          <div id="englishlabel" style="display:none">                  
                                             <input type="checkbox" name="eng_read" value="Read"> Read  <input type="checkbox" name="eng_write" value="Write"> Write   <input type="checkbox" value="Speak" name="eng_speak"> Speak
                                          </div>
                                          
                                          <label class="lable_t">
                                          <input type="checkbox" name="urdu" value="Urdu" id="urdu" onChange="selectlabel2()" /> Urdu</label>
                                          <div id="urdulabel" style="display:none">                  
                                             <input type="checkbox" name="urdu_read" value="Read"> Read  <input type="checkbox" name="urdu_write" value="Write"> Write   <input type="checkbox" value="Speak" name="urdu_speak"> Speak
                                          </div>
                                          <label class="lable_t">
                                          <input type="checkbox" name="telugu" value="Telugu" id="telugu" onChange="selectlabel3()" /> Telugu</label>
                                          <div id="telugulabel" style="display:none">                  
                                             <input type="checkbox" name="telugu_read" value="Read"> Read  <input type="checkbox" name="telugu_write" value="Write"> Write   <input type="checkbox" value="Speak" name="telugu_speak"> Speak
                                          </div>
                                          <script>
                                             function selectlabel()
                                             {
                                             // Get the checkbox
                                                            var checkBox = document.getElementById("english");
                                             if (checkBox.checked == true){
                                             $("#englishlabel").show();
                                             } else {
                                             $("#englishlabel").hide();
                                             }					   
                                             }
                                             function selectlabel2()
                                             {
                                             // Get the checkbox
                                                            var checkBox2 = document.getElementById("urdu");
                                             if (checkBox2.checked == true){
                                             $("#urdulabel").show();
                                             } else {
                                             $("#urdulabel").hide();
                                             }					   
                                             }   
                                             
                                             
                                             function selectlabel3()
                                             {
                                             // Get the checkbox
                                                            var checkBox3 = document.getElementById("telugu");
                                             if (checkBox3.checked == true){
                                             $("#telugulabel").show();
                                             } else {
                                             $("#telugulabel").hide();
                                             }					   
                                             }   	   
                                             
                                             
                                          </script>          
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="row sel_margin">
                                 <div class="col-md-4">
                                    <label>Earning Currency <span data-toggle="tooltip" title="Select currency you are earning in.Do not ignore this may need for matching jobs."><i class="fa fa-info-circle tool_tip"></i></span></label>
                                    <div class="styled-select">
                                       <select class="form-control" name="currency" id="ecurrency">
                                          <option value="" selected>--Select--</option>
                                          <?php
                                             $data=$user->getCurrency();
                                             foreach($data as $cr) {?>
                                          <option value="<?php echo $cr['currency'];?>"><?php echo $cr['currency'];?></option>
                                          <?php } ?>
                                       </select>
                                       <span class="fa fa-sort-desc"></span>
                                    </div>
                                 </div>
                                 <div class="col-md-4 margin_12m">
                                    <label>Current Annual Earning <span data-toggle="tooltip" title="Select your current earning annually.Do not ignore this may need for matching jobs"><i class="fa fa-info-circle tool_tip"></i></span></label> 
                                    <input type="text" id="test" name="salary" class="form-control">
                                 </div>
                                 <div class="col-md-4">
                                    <label>Current/Last Position held <span data-toggle="tooltip" title="Select your current or Last job position you held.Do not ignore this needed for matching jobs."><i class="fa fa-info-circle tool_tip"></i></span></label>
                                    <div class="styled-select">
                                       <select class="form-control" name="position" id="position">
                                          <option value="" selected>--Select--</option>
                                           <?php
                                             $data=$user->getJob_position();
                                             foreach($data as $cr) {?>
                                          <option value="<?php echo $cr['job_position'];?>"><?php echo $cr['job_position'];?></option>
                                          <?php } ?>                                      
                                      </select>
                                       <span class="fa fa-sort-desc"></span>
                                    </div>
                                 </div>
                              </div>
                              <div class="row sel_margin">
                                 <div class="col-md-6">
                                    <label>Are you willing to travel? <span data-toggle="tooltip" title="If you are agree in traveling job then select approximate %. If you are not just select NO option "><i class="fa fa-info-circle tool_tip"></i></span></label>
                                    <div class="styled-select">
                                       <select class="form-control" name="travel" id="position">
                                          <option value="" selected>--Select--</option>
                                          <option value="Yes">Yes</option>
                                          <option value="No">No</option>
                                       </select>
                                       <span class="fa fa-sort-desc"></span>
                                    </div>
                                 </div>
							 <div class="col-md-6">
                                       <label>This job need travel select % <span data-toggle="tooltip" title="Select approximate % of travel in this job. Ignore or keep zero % if no travel needed."><i class="fa fa-info-circle tool_tip"></i></span></label>
                                       <div class="range-slider">
                                          <input class="range-slider__range" type="range" id="range" value="0" min="0" max="100">
                                          <span class="range-slider__value">0</span> 
                                       </div>
                                    </div>
									</div>
                           </div>
                           <div class="row">
                              <div class="contctxt">Personal Information<span class="red">*</span></div>
                              <div class="row ">
                                 <div class="col-md-4">
                                    <label>Upload ID Proof <span class="red">*</span> <span data-toggle="tooltip" title="Upload your any one, government provided ID proof copy (upload only image format file)."><i class="fa fa-info-circle tool_tip"></i></span></label>
                                    <input id="fileUpload1" name="idproof"  class="form-control input-sm" type="file" />
                                 </div>
                                 <div class="col-md-4">
                                    <label>Upload Profile Photo <span data-toggle="tooltip" title="Upload your facial photo, (upload only image format file)Do not ignore, this may need for specific job."><i class="fa fa-info-circle tool_tip"></i></span></label>
                                    <input id="fileUpload2" name="pimage" accept="image/x-png,image/gif,image/jpeg"  class="form-control input-sm" type="file" />
                                 </div>
                                 <div class="col-md-4">
                                    <label>Upload Resume <span class="red">*</span> <span data-toggle="tooltip" title="Upload your Resume/CV in pdf,doc format"><i class="fa fa-info-circle tool_tip"></i></span></label>
                                    <input id="fileUpload" class="form-control input-sm" type="file" name="file" />
                                 </div>
                              </div>
                              <div class="row meemjm">
                                 <div class="col-md-6 ">
                                    <div class="input-wrap">
                                       <label>Facebook/Twitter ID <span data-toggle="tooltip" title="If you have, you may provide your Facebook/twitter ID. This may need for specific job."><i class="fa fa-info-circle tool_tip"></i></span></label>
                                       <input type="text" name="social" id="facebook" placeholder="" class="form-control">
                                    </div>
                                 </div>
                                 <div class="col-md-6">
                                    <div class="input-wrap">
                                       <label>Add LinkedIn  <i class="fa fa-linkedin-square"></i> <span data-toggle="tooltip" title="If you have, you may provide your LinkedIn ID. This may need for specific job.."><i class="fa fa-info-circle tool_tip"></i></span></label>
                                       <input type="text" name="social2" id="linkedin" placeholder="" class="form-control">
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="row">
                              <div class="contctxt">Job Preferences Details<span class="red">*</span></div>
                              <div class="row meemjm">
                                 <div class="col-md-4">
                                    <label>Preferred industry/company/organization <span data-toggle="tooltip" title="If you want specific then select those. If open to any then ignore, do not select.."><i class="fa fa-info-circle tool_tip"></i></span></label>
                                    <select class="test" multiple="multiple" id="pcompany" name="pcompany[]">
                                        <?php
                                          $data=$user->getIndustry();
                                          foreach($data as $er) {?>
                                       <option value="<?php echo $er['name'];?>"><?php echo $er['name'];?></option>
                                       <?php } ?>
                                    </select>
                                 </div>
                                 <div class="col-md-4 margin_12m">
                                    <label>Preferred Work Designation <span data-toggle="tooltip" title="Select all job types you are interested in for matching job designations.If open to any then ignore, do not select."><i class="fa fa-info-circle tool_tip"></i></span></label>
                                    <select class="test" multiple="multiple" id="pwork" name="prefer_role[]">
                                      <?php
										$data=$user->getJob_position();
										foreach($data as $cr) {?>
										<option value="<?php echo $cr['job_position'];?>"><?php echo $cr['job_position'];?></option>
										<?php } ?> 
                                    </select>
                                 </div>
                                 <div class="col-md-4 margin_12m">
                                    <label>Preferred Job Type <span data-toggle="tooltip" title="Select all job types you are interested in.If open to any then ignore, do not select."><i class="fa fa-info-circle tool_tip"></i></span></label>
                                    <select class="test" multiple="multiple" id="jobtype" name="jobtype[]">
                                       <option value="Full Time">Full Time</option>
                                       <option value="Part Time">Part Time</option>
                                       <option value="Freelancer">Freelancer</option>
                                    </select>
                                 </div>
                              </div>
                              <div class="row meemjm">
                                 <div class="col-md-4">
                                    <label>Preferred country for work <span data-toggle="tooltip" title="Select all countries you are interested in for matching job locations.If open to any then ignore, do not select."><i class="fa fa-info-circle tool_tip"></i></span></label>
                                    <select class="test" multiple="multiple" id="pncountry"  name="pncountry[]">
                                       <?php
                                          $s = mysqli_query($con,"select * from country");
                                          while ($rw = mysqli_fetch_array($s)) {
                                          	$cid = $rw['country_name'];
                                          	?>
                                       <option value="<?php echo $rw['country_id']; ?>"><?php echo $rw['country_name']; ?></option>
                                       <?php } ?>
                                    </select>
                                 </div>
                                 <div class="col-md-4 margin_12m">
                                    <label>Preferred State <span data-toggle="tooltip" title="Select all states you are interested in for matching job locations.If open to any then ignore, do not select."><i class="fa fa-info-circle tool_tip"></i></span></label>
                                    <select class="test" id="npstate" name="pnstate[]" multiple="multiple"></select>
                                 </div>
                                 <div class="col-md-4 margin_12m">
                                    <label>Preferred City/Town <span data-toggle="tooltip" title="Select all cities you are interested in for matching job locations.If open to any then ignore, do not select."><i class="fa fa-info-circle tool_tip"></i></span></label>
                                    <select class="test" id="npcity2" name="npcity[]" multiple="multiple"></select>
                                 </div>
                              </div>
                              <div class="row meemjm">
                                 <div class="col-md-6">
                                    <label>Preferred Currency <span data-toggle="tooltip" title="Select preferred currency in which you want."><i class="fa fa-info-circle tool_tip"></i></span></label>
                                    <div class="styled-select">
                                       <select class="form-control" name="pcurrency" id="ecurrency">
                                          <option value="" selected>--Select--</option>
                                          <?php
                                             $data=$user->getCurrency();
                                             foreach($data as $cr) {?>
                                          <option value="<?php echo $cr['currency'];?>"><?php echo $cr['currency'];?></option>
                                          <?php } ?>
                                       </select>
                                       <span class="fa fa-sort-desc"></span>
                                    </div>
                                 </div>
                                 <div class="col-md-6 margin_12m">
                                    <label>Expected Anual Salary <span data-toggle="tooltip" title="Select expected minimum annual salary in you selected currency. Do not ignore this may need for matching jobs.."><i class="fa fa-info-circle tool_tip"></i></span></label>
                                    <input type="text" id="test1" name="psalary" class="form-control">
                                 </div>
                              </div>
                              <div class="row">
                                 <div class="col-md-12">
                                    <label>Other Details </label>
                                    <textarea placeholder="" class="form-control" rows="1" name="about" id="other" maxlength="500"></textarea>
                                 </div>
                              </div>
                              <div class="col-md-6 col-md-push-3 meemjm">
                                 <div class="sub-btn">
                                    <input type="submit" class="sbutn" name="reg-btn" id="register" value="Register Now">
                                    <img src="images/loader.gif" width="50" height="50" id="rload" style="display: none">
                                 </div>
                              </div>
                           </div>
                           <div class="clearfix"></div>
                     </div>
                     </form>
                  </div>
               </div>
            </div>
            <div class="col-md-1 col-sm-1"></div>
         </div>
         <!--Post Job End--> 
      </div>
      </div>
      <!--Inner Content End--> 
      <!--footer start-->
      <div class="footer">
         <div class="container">
            <div class="row">
               <div class="col-md-6 col-sm-6">
                  <div class="copyright">Copyright © 2018 MeeM.one - All Rights Reserved.</div>
               </div>
               <div class="col-md-6 col-sm-6">
                  <div class="social">
                     <div class="followWrp">
                        <span>Follow Us</span>
                        <ul class="social-wrap">
                           <li><a href="#."><i class="fa fa-facebook-square" aria-hidden="true"></i></a></li>
                           <li><a href="#."><i class="fa fa-linkedin-square" aria-hidden="true"></i></a></li>
                        </ul>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!--copyright end--> 
      <!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
      <script src="js/jquery-2.1.4.min.js"></script> 
      <!-- Include all compiled plugins (below), or include individual files as needed --> 
      <script src="js/bootstrap.min.js"></script> 
      <!-- SLIDER REVOLUTION SCRIPTS  --> 
      <script type="text/javascript" src="rs-plugin/js/jquery.themepunch.tools.min.js"></script> 
      <script type="text/javascript" src="rs-plugin/js/jquery.themepunch.revolution.min.js"></script> 
      <!-- general script file --> 
      <script src="js/owl.carousel.js"></script> 
      <script type="text/javascript" src="js/script.js"></script>
      <script src="js/file-upload.js"></script> 
      <script src="js/script-register.js"></script>
      <script src="js/jquery.tagsinput.js"></script>
      <script src="js/init-tagsinput.js"></script>
      <script src="js/fSelect.js"></script>
      <script src="js/select2.min.js"></script>
      <script src="js/init-select2.js"></script>
	  
	  <script>
         $(document).ready(function(){
             $('[data-toggle="tooltip"]').tooltip();   
         });
      </script> 
      <script>
         (function($) {
             $(function() {
                 window.fs_test = $('.test').fSelect();
             });
         })(jQuery);
      </script>


     <!--  <script>
         $(document).ready(function() {
         $("#skill_input").tokenInput("skill_search.php");	 			 
                         
         });
      </script> -->



      <script src="js/jQuery.inputSliderRange.min.js"></script>
      <!-- This script for current salary -->	
      <script>
         $('#test').inputSliderRange({
             "min": 10000,
             "max": 1200000,
             "start": 10000,
             "grid": true,
              "gridCompression": true,
             "step": {
                 "0": 10000,
                 "200000": 50000,
                 "1000000": 500000
             }
         })
      </script>
      <!-- This below script for preferred salary -->	
      <script>
         $('#test1').inputSliderRange({
             "min": 10000,
             "max": 1500000,
             "start": 10000,
             "grid": true,
              "gridCompression": true,
             "step": {
                 "0": 10000,
                 "200000": 50000,
                 "1000000": 500000
             }
         })
      </script>
      <!-- This below script for percentage -->
      <script>
         var rangeSlider = function(){
           var slider = $('.range-slider'),
               range = $('.range-slider__range'),
               value = $('.range-slider__value');
             
           slider.each(function(){
         
             value.each(function(){
               var value = $(this).prev().attr('value');
               $(this).html(value);
             });
         
             range.on('input', function(){
               $(this).next(value).html(this.value);
             });
           });
         };
         
         rangeSlider();
      </script>
      <script>
         var expanded = false;
         
         function showCheckboxes() {
           var checkboxes = document.getElementById("checkboxes");
           if (!expanded) {
             checkboxes.style.display = "block";
             expanded = true;
           } else {
             checkboxes.style.display = "none";
             expanded = false;
           }
         }
         
      </script>

   </body>
</html>