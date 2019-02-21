<?php
//ini_set('display_errors',1); 
//error_reporting(E_ALL);

include_once('mailer/mail.inc.php');

if($_GET["submit"] == "true")
{
	$to = $_GET["email"];		
	$ip = isset($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR'] : '';
	$from ="info@nagpurlife.com";
	$subject="Subscription Form";
	$message = "Dear visitor,\r\nYour subscription form has been submitted successfully.\n"."Email: $to \r\n"."IP: $ip\r\n";	
				
	sendSmtpMailFront($to,$message,$subject,'Nagpurlife',$from,'html');
}
?>

<div class="subscribe"> <span class="subscribeHead">Daily round-up of Indian news</span>
  <input type="text" name="subscribeEmail" id="subscribeEmail" class="subscribeInputTxt" onblur="this.value=this.value==''?'Your Email Address':this.value;" onfocus="this.value='';" value="Your Email Address" />
  <input type="button" class="subscribeBtn" name="subscribe" value="Subscribe" onclick="submitForm();" />
  
  <div id="errorMsg" style="margin-top:5px; color:lightyellow;"></div>
</div>

