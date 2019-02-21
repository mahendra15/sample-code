<?php 
$your_email ='mohit.taunk@gmail.com';// <<=== update to your email address

session_start();
$errors = '';
$user_name = '';
$user_email = '';
$user_message = '';
$user_company='';
$user_phone='';


if(isset($_POST['submit']))
{
	$name = $_POST['txt_name'];
	$company = $_POST['txt_company'];
	$phone = $_POST['txt_phone'];
	$email = $_POST['txt_email'];
	$message = $_POST['txt_comments'];
	
	///------------Do Validations-------------
		
	if(empty($email))
	{
		$user_email = "Please enter your E-mail.<br />";	
	}
	

	//$email_exp = "/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/";
	//if(!preg_match($email_exp,$email)) {
	if (!preg_match("/^[a-z0-9&\'\.\-_\+]+@[a-z0-9\-]+\.([a-z0-9\-]+\.)*+[a-z]{2}/is", $email)) {
	$user_email .= "Please enter valid email.";
	}

	
	if(empty($message))
	{
		$user_message = "Please enter your message.";	
	}
	
	
	if(empty($errors) && !empty($message) && !empty($email))
	{
		//send the email
		$to = $your_email;
		$subject="Enquiry Form";
		$from = $your_email;
		$ip = isset($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR'] : '';
		
		$body = "A user $name submitted the enquiry form:\n".
		"Name: $name\n".
		"Email: $email\n".
		"Company: $company\n".
		"Phone: $phone\n".
		"Message: $message\n".
		"IP: $ip\n";	
		
		$headers = "From: $from \r\n";
		$headers .= "Reply-To: $email \r\n";
		
		mail($to, $subject, $body,$headers);
		if(mail)
		{
			$thanksMsg = "Thank you!<br/> Your enquiry has been submitted successfully. We will get back to you within 24 hours.";
		}
		//header('Location: thank-you.html');
	}
}

// Function to validate against any email injection attempts
function IsInjected($str)
{
  $injections = array('(\n+)',
              '(\r+)',
              '(\t+)',
              '(%0A+)',
              '(%0D+)',
              '(%08+)',
              '(%09+)'
              );
  $inject = join('|', $injections);
  $inject = "/$inject/i";
  if(preg_match($inject,$str))
    {
    return true;
  }
  else
    {
    return false;
  }
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta name="keywords" content="Nagpurlife, Hotels in Nagpur, Restaurants in nagpur, Places of interest in nagpur, Getting to and from nagpur, Concierge services in nagpur, About nagpur, Shopping in nagpur" />
<meta name="Robots" lang="en" content="INDEX, FOLLOW" />
<meta name="city" content="Nagpur" />
<meta name="country" content="India" />
<meta name="Copyright" content="copyright 2010, Nagpurlife.com" />
<title>:: Nagpurlife -  Hotels, Restaurants, Transport, Concierge Services ::</title>
<link href="css/style.css" rel="stylesheet" type="text/css" />
<LINK REL="SHORTCUT ICON" HREF="favicon.ico" />
<script type="text/javascript" src="js/showRss.js"></script>

<!--  FancyBox code start here -->
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"></script>
	<script>
		!window.jQuery && document.write('<script src="jquery-1.4.3.min.js"><\/script>');
	</script>
	<script type="text/javascript" src="fancybox/jquery.mousewheel-3.0.4.pack.js"></script>
	<script type="text/javascript" src="fancybox/jquery.fancybox-1.3.4.pack.js"></script>
	<link rel="stylesheet" type="text/css" href="fancybox/jquery.fancybox-1.3.4.css" media="screen" />
 		<script type="text/javascript">
		$(document).ready(function() {
			$(".promo").fancybox();
		});
	</script> 
<!-- Fancy Box code ends here -->

<script type="text/javascript">
function showHide(gid)
{
	for(i=1; i<=4; i++)
	{
		cid = "c"+i;
		Lid = "b"+i;
		if(i==parseInt(gid))
		{	
			if(document.getElementById(cid).style.display=="table")
			{
				document.getElementById(cid).style.display="none";
				document.getElementById(Lid).setAttribute("class", "");
			}
			else
			{
				document.getElementById(cid).style.display="table";
				document.getElementById(Lid).setAttribute("class", "selected");
			}
		}
		else
		{
			document.getElementById(cid).style.display="none";
			document.getElementById(Lid).setAttribute("class", "");
		}
	}
	
}
</script>
<script language="JavaScript" src="js/gen_validatorv31.js" type="text/javascript"></script>
</head>
<body>
<div id="wrapper">
  <div id="logo"><a href="index.htm">logo</a></div>
  <div id="headerRight">
    <ul class="topLinks">

      <li class="contact"><a href="booking.php">Contact</a></li>
    </ul>
<!--    <div id="topSearch">
      <input type="text" name="search" class="topSearchText" onblur="this.value=this.value==''?'Search':this.value;" onfocus="this.value='';" value="Search" />
      <input type="button" class="topSearchBtn" value="Go" />
    </div>-->
  </div>
  <div id="topNavBar">
  	<div class="topNavLeft"><a href="index.htm">How can we help?</a></div>
    <div class="topNavLink">
    	<ul>
        <li><a href="about_nagpur.htm">Nagpur</a></li>
        <li><a href="hotels.htm">Hotels</a></li>
		<li><a href="transport.htm">Car Hire</a></li>
        <li><a href="food_drink.htm">Food &amp; Drink</a></li>
        <li><a href="concierge_services.htm">Concierge Services</a></li>
        <li><a href="news.htm">News</a></li>
        <li><a href="booking.php" class="" style="padding:0 23px 0 24px;">Get in touch</a></li>
        </ul>
    </div>
  </div>
</div> <!-- Wrapper Ends Here-->
<div id="container">
  <div id="containerTopBg"></div>
  <div id="leftBar">
  	<div class="leftBarBox" style="padding-bottom:5px;"><img src="images/book_by_phone_icon.jpg" alt="phone icon" width="26" height="26" border="0" class="leftBarHeadingIcon" title="Book by phone" style="margin-top:4px;" />
    	<div class="leftBarHeading" style="margin-top:8px;">Call today</div>
        <div class="leftBarHeading">+91 (0)712 650 5616</div>
    </div>

    <div class="leftBarBox"><img src="images/NL_icon.jpg" alt="NL icon" width="43" height="21" border="0" class="leftBarHeadingIcon" title="News icon" />
    	<div class="leftBarHeading" style="margin-top:3px;">News</div>

	<div id="loadRss"><script type="text/javascript">showRss("loadRss","display_news.php");</script></div>
 
    </div>
    <!--<div class="subscribe">
    	<span class="subscribeHead">Daily round-up of Indian news</span>
      <input type="text" name="subscribe" class="subscribeInputTxt" onblur="this.value=this.value==''?'Your Email Address':this.value;" onfocus="this.value='';" value="Your Email Address" />
        <input type="button" class="subscribeBtn" name="subscribeBtn" value="Subscribe" />
    </div>-->
    <!--<div id="loadSubscribe"><script type="text/javascript">showRss("loadSubscribe","subscribe.php");</script></div>-->
  </div>
  <div id="content">
  <span class="breadcrumb">&gt; <a href="index.htm">Home</a> &gt; Get in touch</span>
    <h1><span class="orange">How</span> can we help?</h1>
   <p>Call Preeti or Yamini today on 00 91 712 650 5616 or send us a message below</p>
   <?php 
   		if(isset($thanksMsg)){
			echo "<div class='thanksMsg'>$thanksMsg</div>";
		}
   ?>
   <!--<p align="right" class="mandatory">(* fields are mandatory)</p>-->
    <form method="POST" name="enquiry_form" action="">
    <fieldset>
        <div class="" style="margin-left:20px;">
            <label class=""><strong>Your Name</strong></label>
            <input name="txt_name" id="txt_name" type="text" value='' />
            <label class="clear"><strong>Email Address </strong><span style="color:#999;">(required)</span></label> 
            <input name="txt_email" type="text" id="txt_email" value="" /> 
            <?php if(empty($email)){ echo "<div class='err'>".$user_email."</div>"; }?>
            <label class="clear"><strong>Company</strong></label>
            <input name="txt_company" type="text" id="txt_company" value='' />
            <label class="clear"><strong>Telephone Number</strong></label>
            <input name="txt_phone" type="text" id="txt_phone" value='' />
            <label class="clear"><strong>Your Message </strong><span style="color:#999;">(required)</span></label> 
            <textarea name="txt_comments" id="txt_comments" cols="45" rows="4"></textarea>
    		<?php if(empty($message)){ echo "<div class='err'>".$user_message."</div>"; }?>
            <div class="clear"></div>
            <input type="submit" class="subscribeBtn" name="submit" value="Submit" style="margin-left:0px;" />
            <input type="reset" class="subscribeBtn" name="Reset" value="Reset" id="Reset" />
        </div><br />
     </fieldset>
    </form>
    
    <script language="JavaScript">
		var frmvalidator  = new Validator("enquiry_form");
		//remove the following two lines if you like error message box popups
		frmvalidator.EnableOnPageErrorDisplaySingleBox();
		frmvalidator.EnableMsgsTogether();
		
		frmvalidator.addValidation("name","req","Please provide your name"); 
		frmvalidator.addValidation("address","req","Please provide your address"); 
		frmvalidator.addValidation("city","req","Please provide your city"); 
		frmvalidator.addValidation("country","req","Please provide your country"); 
		frmvalidator.addValidation("phone","req","Please provide your phone"); 
		frmvalidator.addValidation("fax","req","Please provide your fax"); 
		frmvalidator.addValidation("email","req","Please provide your email"); 
		frmvalidator.addValidation("email","email","Please enter a valid email address"); 
	</script>
	<script language='JavaScript' type='text/javascript'>
		function refreshCaptcha()
		{
			var img = document.images['captchaimg'];
			img.src = img.src.substring(0,img.src.lastIndexOf("?"))+"?rand="+Math.random()*1000;
		}
	</script>

  </div>
  <!-- Content Ends Here-->
</div><!-- Container Ends Here-->
<div id="footer">
  <div style="margin-left:20px; float:left;">&copy; 2012 nagpurlife.com, All rights reserved</div>
    <div class="footerLink" style="float:right; margin-right:25px;"><a href="about_nagpur.htm">About Nagpurlife</a> | <a href="booking.php">Contact</a></div>
</div><!-- Footer Ends Here-->
</body>
</html>