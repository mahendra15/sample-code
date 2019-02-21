<?php

if($_GET["submit"] == "true")
{
		$to = $_GET["email"];
		$subject="Subscription Form";
		$from ="info@nagpurlife.com";
		$ip = isset($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR'] : '';
		
		$body = "Dear visitor,\nYour subscription form has been submitted successfully.\n".
				"Email: $to \n".
				"IP: $ip\n";	
		
		$headers = "MIME-Version: 1.0" . "\r\n";
		$headers .= "Content-type: text/html; charset=iso-8859-1" . "\r\n";
		$headers = "From: $from \r\n";
		$headers .= "Reply-To: $to \r\n";
		
		ini_set("SMTP","mail.nagpurlife.com");
		ini_set("sendmail_from",$from);
		
		if(mail($to, $subject, $body,$headers)){
			$message = "Thanks for your subscription.";
		}
		else{
			$message = "Failed.";
		}
		
}
 /*?>if(isset($_POST['subscribe']))
{
	$subscribe_email = $_POST['subscribeEmail'];	
	
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
  if(!preg_match($email_exp,$subscribe_email)) {
    $error_message .= 'Please enter valid E-mail.<br />';
  }

	
	if (empty($error_message))
	{	
		//send the email
		$to = $your_email;
		$subject="Subscription Form";
		$from ="samir@com1uk.com";
		$ip = isset($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR'] : '';
		
		$body = "Dear user,\nYour subscription form has been submitted successfully.\n".
		
		"Email: $subscribe_email \n".
		"IP: $ip\n";	
		
		$headers = "From: $from \r\n";
		$headers .= "Reply-To: $subscribe_email \r\n";
		
		mail($to, $subject, $body,$headers);
		
		header("location: $currentFile");
		$_SESSION['message'] = "Thanks for your subscription.";
	}
}<?php */
?>

<div class="subscribe"> <span class="subscribeHead">Daily round-up of Indian news</span>
  <input type="text" name="subscribeEmail" id="subscribeEmail" class="subscribeInputTxt" onblur="this.value=this.value==''?'Your Email Address':this.value;" onfocus="this.value='';" value="Your Email Address" />
  <input type="button" class="subscribeBtn" name="subscribe" value="Subscribe" onclick="submitForm();" />
  
  <div id="errorMsg" style="margin-top:5px; color:lightyellow;"><?=$message?></div>
</div>

