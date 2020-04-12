<?php
    $name=$_POST['name'];
	$subject=$_POST['subject'];	
	$mail=$_POST['email'];	
    $phone=$_POST['phone'];
	$message=$_POST['message'];
	
$to='support@meem.one';	
$headers ='MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
$headers .= "From: MeeM.one Job Portal <support@meem.one> \n";
$headers .= "Reply-To: $name <$mail> \n";
	
$sub2="$subject";

$welcomemsg  = "<html><body><div style='width:75%; padding:20px 100px; background:#FFF4F4'><div      style='background:#FFFFFF; border:5px solid #A4D1FF;'>";
$welcomemsg  .= "<div style='text-align:left;background:#f7f7f7;padding:5px 10px;margin:10px 0px'><a href='http://meem.one/index.php'><img src='http://meem.one/img/logo.png'></a></div>";

$welcomemsg .= "<div style='padding:7px 20px; background:#AF294F; font-size:14px; color:#FFFFFF; font-family:Geneva, Arial, Helvetica, sans-serif'>$subject</div>";
				
			
$welcomemsg .= "<div style='padding:10px 20px; font-size:15px; color:#666; font-family:Geneva, Arial, Helvetica, sans-serif;'>

               <p><b>Contact Person : </b>$name</p>
			   <p><b>Email id : </b>$mail</p>
			   <p><b>Phone no : </b>$phone</p>
			   <p><b>Message : </b>$message</p>
                    
               
			  </div>";

                   $welcomemsg .= "</div></div></body></html>";

	            $status= mail($to, $sub2, $welcomemsg, $headers, '-f support@meem.one');

                    if($status) {
	   
	              echo '<i class="fa fa-check" aria-hidden="true"></i> Your Mail has been sent, our Support Team will contact you soon.';
	              }
	
	
	
	
?>	