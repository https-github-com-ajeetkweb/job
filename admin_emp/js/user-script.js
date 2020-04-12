$(document).ready(function() {	
   
$(".rcountry").change(function()
{
$("#loding11").show();
var id=$(this).val();
var dataString = 'id='+ id;
$(".rstate").find('option').remove();
$(".rcity").find('option').remove();
$.ajax
({
type: "POST",
url: "get_state.php",
data: dataString,
cache: false,
success: function(html)
{
$("#loding11").hide();
$(".rstate").html(html);
} 
});
});

$(".rstate").change(function()
{
$("#loding12").show();
var id=$(this).val();
var dataString = 'id='+ id;

$.ajax
({
type: "POST",
url: "get_city.php",
data: dataString,
cache: false,
success: function(html)
{
$("#loding12").hide();
$(".rcity").html(html);
} 
});
});

(function ($) {
    $(function () {
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

// preferences

 $("#pncountry2").change(function (event) {                
        event.stopPropagation();
        var id = $("#pncountry2").val();
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
            $('#npstate2').fSelect('destroy');
            $('#npstate2').html(result); // add in the new list
            $('#npstate2').fSelect('create'); // re-initialize the widget

          }
        });
        return false;
      }); 
    
  $("#npstate2").on('change', function () {

        var id = $("#npstate2").val();
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
            $("#nciti22").html("<span style='color:blue'>loading...</span>");
            $("#nciti").hide();
          },
          success: function (result) {
            $("#nciti2").hide();
            $("#nciti").show();
            $('#npcity22').fSelect('destroy'); // tell widget to clear itself  
            $('#npcity22').html(result); // add in the new list
            $('#npcity22').fSelect('create'); // re-initialize the widget
            //$('#npstate').fSelect({selectedList: 4, header: false});

          }
        });
        return false;
      }); 

// residence location

   $("#rpcountry").change(function (event) {                
        event.stopPropagation();
        var id = $("#rpcountry").val();
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
           
          },
          success: function (result) {
          
            $('#rpstate').fSelect('destroy');
            $('#rpstate').html(result); // add in the new list
            $('#rpstate').fSelect('create'); // re-initialize the widget

          }
        });
        return false;
      });   
    
  $("#rpstate").on('change', function () {

        var id = $("#rpstate").val();
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
          
          },
          success: function (result) {
         
            $('#rpcity').fSelect('destroy'); // tell widget to clear itself  
            $('#rpcity').html(result); // add in the new list
            $('#rpcity').fSelect('create'); // re-initialize the widget
            //$('#npstate').fSelect({selectedList: 4, header: false});

          }
        });
        return false;
      });
















  })(jQuery);
});



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
         
         
 // employer job posting script

$("#jobpostForm").submit(function(event) {
event.preventDefault();
//var valid=validateForm();
var valid=true;
if(valid) 
 { 
 $("#rload").show();
 $("#registerme").fadeOut();
 
  $.ajax ({
   type : 'post',
   url : 'posting_job.php',
   data: new FormData( this ),
   processData: false,
  contentType: false, // it will serialize the form data
  })
  .done(function(data){
    setTimeout(window.location.href = "emp-membership.php?userpayment="+data,2000);
   
$('#registerform').fadeOut(300, function(){
$('#registerform').fadeIn(300).html(data);
});
})
.fail(function(data){
alert('Ajax Submit Failed ...');	
});
 }
 return false;
 });




 // update employer posted job script

$("#editJobForm").submit(function(event) {
event.preventDefault();
var valid=validateForm();

if(valid) 
 { 
 $("#rload").show();
 $("#registerme").fadeOut();
 
  $.ajax ({
   type : 'post',
   url : 'update_postedjob.php',
   data: new FormData( this ),
   processData: false,
  contentType: false, // it will serialize the form data
  })
  .done(function(data){
$('#registerform').fadeOut(300, function(){
$('#registerform').fadeIn(300).html(data);
setTimeout(function() { window.location=window.location;},100); 
});
})
.fail(function(data){
alert('Ajax Submit Failed ...');	
});
 }
 return false;
 });















function validateForm()
{
 var valid=true;
 if(!$("#company").val()) { $("#company").css('border', '1px solid #FF6600'); $("#company").focus(); valid=false; }  else { $("#company").css('border', '1px solid #009999'); } 

if(!$("#title").val()) { $("#title").css('border', '1px solid #FF6600');  $("#title").focus();  valid=false; } else { $("#title").css('border', '1px solid #009999'); } 
if(!$("#education").val() && $("#company").val() && $("#title").val() && $("#job_type").val() && $("#industry").val()) { $("#education").css('border', '1px solid #FF6600');  $("#education").focus(); alert('Please select Education Required.');  valid=false; }
if(!$("#job_type").val()) { $("#job_type").css('border', '1px solid #FF6600');  $("#job_type").focus();  valid=false; } else { $("#job_type").css('border', '1px solid #009999'); } 
if(!$("#role").val()) {  $("#role").css('border', '1px solid #FF6600'); valid=false;  } else { $("#role").css('border', '1px solid #009999'); } 
if(!$("#industry").val()) {  $("#industry").css('border', '1px solid #FF6600');valid=false;  } else { $("#industry").css('border', '1px solid #009999'); } 
if(!$("#rcountry").val() && $("#education").val() && $("#company").val() && $("#title").val() && $("#job_type").val() && $("#industry").val() && $("#desc").val()) {  $("#rcountry").css('border', '1px solid #FF6600'); valid=false; alert('Please Select Country.');  } else { $("#rcountry").css('border', '1px solid #009999'); }  
if(!$("#rstate").val()) {  $("#rstate").css('border', '1px solid #FF6600'); valid=false; } else { $("#rstate").css('border', '1px solid #009999'); }  
if(!$("#rcity").val()) {  $("#rcity").css('border', '1px solid #FF6600'); valid=false; } else { $("#rcity").css('border', '1px solid #009999'); } 
if(!$("#about").val()) {  $("#about").css('border', '1px solid #FF6600'); valid=false; } else { $("#about").css('border', '1px solid #009999'); } 
if(trimfield($("#jobdesc").val())=='') {  $("#jobdesc").css('border', '1px solid #FF6600'); valid=false; } else { $("#jobdesc").css('border', '1px solid #009999'); } 

 return valid;
}
        
 function trimfield(str) 
{ 
    return str.replace(/^\s+|\s+$/g,''); 
}        


