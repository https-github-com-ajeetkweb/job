$(document).ready(function() {	



	// For country, state, & city
	// populate states and cities based on country/state selected in dropdown 
	$("#loding1").hide();
	$("#loding2").hide();
	$("#loding11").hide();
	$("#loding12").hide();
	$(".country").change(function () {
		$(".city").html();
		$("#loding1").show();
		$("#loding11").show();
		var id = $(this).val();
		var dataString = 'id=' + id;
		$(".astate").find('option').remove();
		$(".ncity").find('option').remove();
		$.ajax({
			type: "POST",
			url: "get_state.php",
			data: dataString,
			cache: false,
			success: function (html) {
				$("#loding1").hide();
				$("#loding11").hide();
				$(".astate").html(html);
				$(".rstate").html(html);
				$(".city").html('');
				$(".rcity").html('');
			}
		});
	
	var data={'rcountry':id};
	$.ajax({
			type: "POST",
			url: "getCountrycode.php",
			data: data,
			cache: false,
			success: function (html) {
				$(".countrycode").html(html);
			}
		});	
		
	});


	$(".astate").change(function () {
		$("#loding2").show();
		var id = $(this).val();
		var dataString = 'id=' + id;

		$.ajax({
			type: "POST",
			url: "get_city.php",
			data: dataString,
			cache: false,
			success: function (html) {
				$("#loding2").hide();
				$(".city").html(html);
				$(".rcity").html(html);

			}
		});
	});


	$(".rcountry").change(function () {
		$("#loding11").show();
		var id = $(this).val();
		var dataString = 'id=' + id;
		$(".rstate").find('option').remove();
		$(".rcity").find('option').remove();
		$.ajax({
			type: "POST",
			url: "get_state.php",
			data: dataString,
			cache: false,
			success: function (html) {
				$("#loding11").hide();
				$(".rstate").html(html);
			}
		});
	});

	$(".rstate").change(function () {
		$("#loding12").show();
		var id = $(this).val();
		var dataString = 'id=' + id;

		$.ajax({
			type: "POST",
			url: "get_city.php",
			data: dataString,
			cache: false,
			success: function (html) {
				$("#loding12").hide();
				$(".rcity").html(html);
			}

		});

	});

	// populate residence country same as native country

	$("#ncountry").change(function () {
		var c = $("#ncountry").val();
		$("#rcountry").prop('selectedIndex', c);
	});


	$("select[id=state\\[\\]]").change(function () {
		var value = this.value;

		$("select[id=rstate\\[\\]]").not(this).val(value);
	});


	$("select[id=city\\[\\]]").change(function () {
		var value = this.value;

		$("select[id=rcity\\[\\]]").not(this).val(value);
	});






(function ($) {  	
		
			$('.test').fSelect();

			$("#pncountry").change(function (event) {				
				event.stopPropagation();
				var id = $("#pncountry").val();
				var dataString = 'id=' + id;
				var lang = '';
				if ($('#langID').length) {
					var lang = $("#langID").val();
				}
				var dataString = 'id=' + id + '&lang=' + lang;
				$.ajax({
					type: "POST",
					url: "get_multistate.php",
					data: dataString,
					cache: false,
					beforeSend: function () {
						$("#nsdiv2").html("<span style='color:blue'>loading state..</span>");
						$("#nsdiv").hide();
					},
					success: function (result) {
						$("#nsdiv2").hide();
						$("#nsdiv").show();
						$('#npstate').fSelect('destroy');
						$('#npstate').html(result); // add in the new list
						$('#npstate').fSelect('create'); // re-initialize the widget

					}
				});

				return false;

			});
		
		
		
	$("#npstate").on('change', function () {

				var id = $("#npstate").val();
				var lang = '';
				if ($('#langID').length) {
					var lang = $("#langID").val();
				}
				var dataString = 'id=' + id + '&lang=' + lang;
				$.ajax({
					type: "POST",
					url: "get_multicity.php",
					data: dataString,
					cache: false,
					beforeSend: function () {
						$("#nciti2").html("<span style='color:blue'>loading...</span>");
						$("#nciti").hide();
					},
					success: function (result) {
						$("#nciti2").hide();
						$("#nciti").show();
						$('#npcity2').fSelect('destroy'); // tell widget to clear itself	
						$('#npcity2').html(result); // add in the new list
						$('#npcity2').fSelect('create'); // re-initialize the widget
						//$('#npstate').fSelect({selectedList: 4, header: false});

					}
				});
				return false;
			});	

	})(jQuery);

































// jobseeker registration
$("#Jobseeker_registerForm").submit(function(event) { 
event.preventDefault();
var valid=validate(); 
if(valid) 
 { 
 $("#rload").show();
 $("#register").fadeOut();
 
  $.ajax ({
   type : 'post',
   url : 'registernow.php',
   data: new FormData( this ),
   processData: false,
  contentType: false, // it will serialize the form data
  })
  .done(function(data){ 
$('#registerform').fadeOut(300, function(){
$('#registerform').fadeIn(300).html(data);
});
})
.fail(function(){
alert('Ajax Submit Failed ...');	
});
 }
 return false;
});


function validate()
{
	
var valid=true;         

if(!$("#email").val()) { $("#email").css('border', '1px solid #fc8e77'); $("#email").focus(); valid=false; }
if(!$("#bmonth").val()) { $("#bmonth").css('border', '1px solid #fc8e77'); $("#bmonth").focus(); valid=false; } 
if(!$("#byear").val()) { $("#byear").css('border', '1px solid #fc8e77'); $("#byear").focus(); valid=false; }
if(!$("#name").val()) { $("#name").css('border', '1px solid #fc8e77');  $("#name").focus();  valid=false; }
var gender = document.forms["loginForm"]["gender"].value;
if(gender==0) { alert('Please Select Gender.'); $("#gender").css('border', '1px solid #fc8e77');  $("#gender").focus();  valid=false; }

if(!$("#ncountry").val()) { $("#ncountry").css('border', '1px solid #fc8e77'); $("#ncountry").focus(); valid=false; }
if(!$(".astate").val()) { $(".astate").css('border', '1px solid #fc8e77'); $("#state").focus(); valid=false; }
if(!$(".city").val()) { $(".city").css('border', '1px solid #fc8e77'); $(".city").focus(); valid=false; }
if(!$("#rcountry").val()) { $("#rcountry").css('border', '1px solid #fc8e77'); $("#rcountry").focus(); valid=false; }
if(!$(".rstate").val()) { $(".rstate").css('border', '1px solid #fc8e77'); $(".rstate").focus(); valid=false; }
if(!$(".rcity").val()) { $(".rcity").css('border', '1px solid #fc8e77'); $(".rcity").focus(); valid=false; }
if(!$("#nationality").val()) { $("#nationality").css('border', '1px solid #fc8e77'); $("#nationality").focus(); valid=false; }


 var education=$("#education").val(); 
 if((education == null) && $("#mobile").val()){    alert('Please select Education'); valid=false; }
 
 var skill=document.getElementsByClassName("user_skill").length;
 //if((skill ==null)){    alert('Please select Main skills'); valid=true; } 
if(!$("#yexperience").val()) { $("#yexperience").css('border', '1px solid #fc8e77'); $("#yexperience").focus(); valid=false; }



 if(!$("#mobile").val()) { $("#mobile").css('border', '1px solid #d20707');  $("#mobile").focus();  valid=false; }
 if($("#name").val() && $("#email").val() && $("#role").val() && $("#education").val()) {
// if(!$("#tags_1").val()) { valid=false;  error2.innerHTML  ='Please Enter Skills.'; } else {error2.innerHTML ='';}
   }

 
 
 if($("#name").val() && $("#email").val() &&  $("#education").val()) {
  if($("#fileUpload1").val().length === 0){
        alert('Please Upload ID Proof');
		valid = false;
         }
         
         var photo=$("#fileUpload1").val();
          var reg = /(.*?)\.(jpg|JPG|jpeg|doc|png|pdf|docx)$/;
         if(!photo.match(reg) && $("#fileUpload1").val().length!=0) {
			 alert('Upload ID Proof in pdf,doc,jpeg,png format.')
              valid = false;
            }
	 if($("#fileUpload2").val().length === 0){
        alert('Please Upload Your profile photo');
		valid = false;
         }
         
         var photo=$("#fileUpload2").val();
          var reg = /(.*?)\.(jpg|JPG|jpeg|png)$/;
         if(!photo.match(reg) && $("#fileUpload1").val().length!=0) {
			 alert('Upload profile photo in jpeg,png format.')
              valid = false;
            }
			
	 if($("#fileUpload").val().length === 0){
        alert('Please Upload your updated Resume');
		valid = false;
         }
         
         var photo=$("#fileUpload").val();
          var reg = /(.*?)\.(doc|pdf|docx)$/;
         if(!photo.match(reg) && $("#fileUpload").val().length!=0) {
			 alert('Upload Resume in pdf,doc format.')
              valid = false;
            }
	
	
 }
 // check for email address available
   if($("#email").val().length >0)
  {
	  var email=$("#email").val();
          var checkfor='jobseeker';
	   $.ajax({
		 type : 'POST',
		 url : 'check_mail.php',
		 data : "email=" + email+'&checkfor='+checkfor,
		 async:false,
		 
    success : function(response)
	  { 
          if(response=="<div style='color:#009900'>Available</div>")
	        {
	          $("#msg").html(response);
              $("#email").css({"border":"1px solid #009999"});             
             }
             if(response=="<div style='color:#ff6666'>Email ID already registered</div>")
	         {               
	          $("#msg").html(response);
               $("#email").css({'border':'1px solid #FF6600'});
               valid=false;
             } 
			  return valid;
	 }
	}); 
       return valid;
  }
return valid;
}


// employer registration

$("#registerForm").submit(function(event) {
event.preventDefault();
var valid=validateForm();
if(valid) 
 { 
 $("#rload").show();
 $("#registerme").fadeOut();
 
  $.ajax ({
   type : 'post',
   url : 'employer_register.php',
   data: new FormData( this ),
   processData: false,
  contentType: false, // it will serialize the form data
  })
  .done(function(data){
$('#registerform').fadeOut(300, function(){
$('#registerform').fadeIn(300).html(data);
});
})
.fail(function(data){
    alert(data);
alert('Ajax Submit Failed ...');	
});
 }
 return false;
 });


function validateForm()
{
 var valid=true;
 if(!$("#email").val()) { $("#email").css('border', '1px solid #fc8e77'); $("#email").focus(); valid=false; }

if(!$("#name").val()) { $("#name").css('border', '1px solid #fc8e77');  $("#name").focus();  valid=false; }

if(!$("#basic").val()) {  $("#basic").css('border', '1px solid #fc8e77');valid=false; } else { $("#basic").css('border', '1px solid #96c2cd'); }

if(!$("#role").val()) {  $("#role").css('border', '1px solid #fc8e77');valid=false; } else { $("#role").css('border', '1px solid #96c2cd'); }
if(!$("#cmp_name").val()) {  $("#cmp_name").css('border', '1px solid #fc8e77');valid=false; } else { $("#cmp_name").css('border', '1px solid #96c2cd'); } 
if(!$("#address").val()) {  $("#address").css('border', '1px solid #fc8e77'); valid=false;} else { $("#address").css('border', '1px solid #96c2cd'); } 
if(!$("#rcountry").val()) {  $("#rcountry").css('border', '1px solid #fc8e77');valid=false; } else { $("#rcountry").css('border', '1px solid #96c2cd'); }  
if(!$("#rstate").val()) {  $("#rstate").css('border', '1px solid #fc8e77');valid=false; } else { $("#rstate").css('border', '1px solid #96c2cd'); }  
if(!$("#rcity").val()) {  $("#rcity").css('border', '1px solid #fc8e77'); valid=false;} else { $("#rcity").css('border', '1px solid #96c2cd'); } 
if(!$("#code").val()) {  $("#code").css('border', '1px solid #fc8e77'); valid=false;} else { $("#code").css('border', '1px solid #96c2cd'); } 
if(!$("#mobile").val()) {  $("#mobile").css('border', '1px solid #fc8e77'); valid=false;} else { $("#mobile").css('border', '1px solid #96c2cd'); } 
 if($("#name").val() && $("#email").val() && $("#mobile").val()) {
  if($("#fileUpload2").val().length === 0){
        alert('Please Upload Photo');
		valid = false;
         }
         
         var photo=$("#fileUpload2").val();
          var reg = /(.*?)\.(jpg|JPG|jpeg|png|PNG)$/;
         if(!photo.match(reg) && $("#fileUpload2").val().length!=0) {
			 alert('Upload photo in jpeg,png format.')
              valid = false;
            }
 } 
 
 
  if($("#email").val().length >0)
  {
	  var email=$("#email").val();
	   $.ajax({
		 type : 'POST',
		 url : 'check_mail.php',
		 data : "email=" + email,
		 async:false,
		 
    success : function(response)
	  { 
         
        if(response=="<div style='color:#009900'>Available</div>")
	      {
	      $("#msg").html(response);
              $("#email").css({"border":"1px solid #009999","color":"#009900"});
             
           }
        if(response=="<div style='color:#ff6666'>Email ID already registered</div>")
	       {
                 
	      $("#msg").html(response);
              $("#email").css({'border':'1px solid #FF6600','color':'#ff6666'});
              valid=false;
           } 
	 }
	});
       return valid;
  }

 return valid;
}



  $(".rcountry").change(function () {
                                        
  var rcountry=$("#rcountry").val();
  var data={'rcountry':rcountry};
$.ajax
      ({
          type: "POST",
          url: "getCountrycode.php",
          data: data,
          cache: false,
          success: function (html)
          {
              $(".countrycode").html(html);
          }
      });
});

});




function checkmailUser(value)
 {
 var email=value;
 var checkfor='jobseeker';
 if(email)
 {
	 $.ajax({
		 type : 'POST',
		 url : 'check_mail.php',
		 data : "email=" + email+'&checkfor='+checkfor,
		 async:false,
		 
    success : function(response)
	  {
	    $("#msg").html(response);
        $("#email").css('border','1px solid #96c2cd'); 
	 }
	}); 
	 
 }
	
	
 }

// FOR EMPLOYER
function checkmail(value)
 {
 
 var email=value;
 if(email)
 {
	 $.ajax({
		 type : 'POST',
		 url : 'check_mail.php',
		 data : "email=" + email,
		 async:false,
		 
    success : function(response)
	  {
            
	    $("#msg").html(response);
     
	 }
	}); 
	 
 }
	
	
 }






function checkValue(data)
{
if(!$("#name").val()) {  $("#name").css('border', '1px solid #fc8e77'); } else { $("#name").css('border', '1px solid #96c2cd'); }
if(!$("#email").val()) {  $("#email").css('border', '1px solid #fc8e77'); } else { $("#email").css('border', '1px solid #96c2cd'); }
if(!$("#country_code").val()) {  $("#country_code").css('border', '1px solid #fc8e77'); } else { $("#country_code").css('border', '1px solid #009999'); }
if(!$("#mobile").val()) {  $("#mobile").css('border', '1px solid #fc8e77'); } else { $("#mobile").css('border', '1px solid #96c2cd'); }
if(!$("#location").val()) {  $("#location").css('border', '1px solid #fc8e77'); } else { $("#location").css('border', '1px solid #96c2cd'); }
if(!$("#education").val()) {  $("#education").css('border', '1px solid #fc8e77'); } else { $("#education").css('border', '1px solid #96c2cd'); }
if(!$("#passout").val()) {  $("#passout").css('border', '1px solid #fc8e77'); } else { $("#passout").css('border', '1px solid #96c2cd'); }
if(!$("#expy").val()) {  $("#expy").css('border', '1px solid #fc8e77'); } else { $("#expy").css('border', '1px solid #96c2cd'); }
if(!$("#role").val()) {  $("#role").css('border', '1px solid #fc8e77'); } else { $("#role").css('border', '1px solid #96c2cd'); }
if(!$("#tags_1").val()) {  $("#tags_1").css('border', '1px solid #fc8e77'); } else { $("#tags_1").css('border', '1px solid #96c2cd'); }
if(!$("#cmp_name").val()) {  $("#cmp_name").css('border', '1px solid #fc8e77'); } else { $("#cmp_name").css('border', '1px solid #96c2cd'); }
if(!$("#rstate").val()) {  $("#rstate").css('border', '1px solid #fc8e77'); } else { $("#rstate").css('border', '1px solid #96c2cd'); }
if(!$("#rcity").val()) {  $("#rcity").css('border', '1px solid #fc8e77'); } else { $("#rcity").css('border', '1px solid #96c2cd'); }
if(!$("#address").val()) {  $("#address").css('border', '1px solid #fc8e77'); } else { $("#address").css('border', '1px solid #96c2cd'); }
if(!$("#basic").val()) {  $("#basic").css('border', '1px solid #fc8e77'); } else { $("#basic").css('border', '1px solid #96c2cd'); }
if(!$("#rcountry").val()) {  $("#rcountry").css('border', '1px solid #fc8e77'); } else { $("#rcountry").css('border', '1px solid #96c2cd'); }
}


function validate_jobseeker(data)
{
if(data=='name') {	
 if(!$("#name").val()) {  $("#name").css('border', '1px solid #fc8e77'); } else { $("#name").css('border', '1px solid #96c2cd'); }
}
if(!$("#email").val()) {  $("#email").css('border', '1px solid #fc8e77'); } else { $("#email").css('border', '1px solid #96c2cd'); }	






}
	




  // accept only letters 
         function ValidateAlpha(evt)
         {
         var keyCode = (evt.which) ? evt.which : evt.keyCode
         if ((keyCode < 65 || keyCode > 90) && (keyCode < 97 || keyCode > 123) && keyCode != 32)
         
         return false;
         return true;
         }
         // accept only numeric
         function isNumberKey(evt){
         var charCode = (evt.which) ? evt.which : event.keyCode
         if (charCode > 31 && (charCode < 48 || charCode > 57))
         return false;
         return true;
         }  