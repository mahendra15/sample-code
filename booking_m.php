<script type="text/javascript">
function validateEmail(elementValue){  
   var emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;  
   return emailPattern.test(elementValue);  
} 
function submitEnquiryForm()
{
	var name = document.getElementById('txt_name').value;
	var company = document.getElementById('txt_company').value;
	var address = document.getElementById('txt_address').value;
	var city = document.getElementById('txt_city').value;
	var country = document.getElementById('txt_country').value;
	var phone = document.getElementById('txt_phone').value;
	var fax = document.getElementById('txt_fax').value;
	var email = document.getElementById('txt_email').value;
	var user_message = document.getElementById('txt_comments').value;
	var securityCode = document.getElementById('6_letters_code').value;
	
	
	if(name==''){
		document.getElementById('v1').innerHTML = "Please enter your name";
	}
	else{
		document.getElementById('v1').innerHTML ="";
	}
	if(address==''){
		document.getElementById('v2').innerHTML = "Please enter your address";
	}
	else{
		document.getElementById('v2').innerHTML ="";
	}
	if(city==''){
		document.getElementById('v3').innerHTML = "Please enter your city";
	}
	else{
		document.getElementById('v3').innerHTML ="";
	}
	if(country==''){
		document.getElementById('v4').innerHTML = "Please enter your country";
	}
	else{
		document.getElementById('v4').innerHTML ="";
	}
	if(phone==''){
		document.getElementById('v5').innerHTML = "Please enter your phone";
	}
	else{
		document.getElementById('v5').innerHTML ="";
	}
	if(email==''){
		document.getElementById('v6').innerHTML = "Please enter your email";
	}
	else if(validateEmail(email)!= true)
	{
		document.getElementById('v6').innerHTML = "Please enter valid email";
		return false;
	}
	else
	{
		document.getElementById('v6').innerHTML ="";
		return true;
	}

	if(securityCode =='')
	{
		document.getElementById('v7').innerHTML = "Please enter security code";
		//alert(securityCode);
	}
	else
	{
		checkSecurityCode = "<?php if(empty($_SESSION['6_letters_code'] ) || strcasecmp($_SESSION['6_letters_code'], $_POST['6_letters_code']) != 0)
		{
			echo 'The captcha code does not match!';
		}
		else { echo 'checked';} ?>";
	
		if(checkSecurityCode == "checked")
		{
			window.location="booking_m.php?submitForm=true";
		}
		else
		{
			document.getElementById('v7').innerHTML = checkSecurityCode;
		}
	}
	
	
}
</script>
<?php
if($_GET['submitForm']== "true"){
	
//	if(empty($_SESSION['6_letters_code'] ) || strcasecmp($_SESSION['6_letters_code'], $_POST['6_letters_code']) != 0)
//	{
//		$errors .= "The captcha code does not match!";
//	}
	

		//send the email
		$to = "mohit.taunk@gmail.com";
		$subject="Enquiry Form";
		$from = "mohit.taunk@gmail.com";
		$ip = isset($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR'] : '';
		
		$body = "A user $name submitted the enquiry form:\n".
		"Name: $name\n".
		"Company: $company\n".
		"Address: $address\n".
		"City: $city\n".
		"Country: $country\n".
		"Phone: $phone\n".
		"Email: $email\n".
		"Fax: $fax\n".
		"Message: $user_message\n".
		"IP: $ip\n";	
		
		$headers = "From: $from \r\n";
		$headers .= "Reply-To: $email \r\n";
		
		ini_set("SMTP","mail.nagpurlife.com");
		ini_set("sendmail_from",$from);
		
		mail($to, $subject, $body,$headers);
		if(mail)
		{
			$thanksMsg = "Thank you!<br/> Your enquiry has been submitted successfully. We will get back to you within 24 hours.";
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
</style><script language="JavaScript" src="gen_validatorv4.js" type="text/javascript" xml:space="preserve"></script>

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
			/*
			*   Examples - images
			*/

			$("a#example1").fancybox();

			$("a#example2").fancybox({
				'overlayShow'	: false,
				'transitionIn'	: 'elastic',
				'transitionOut'	: 'elastic'
			});

			$("a#example3").fancybox({
				'transitionIn'	: 'none',
				'transitionOut'	: 'none'	
			});

			$("a#example4").fancybox({
				'opacity'		: true,
				'overlayShow'	: false,
				'transitionIn'	: 'elastic',
				'transitionOut'	: 'none'
			});

			$("a#example5").fancybox();

			$("a#example6").fancybox({
				'titlePosition'		: 'outside',
				'overlayColor'		: '#000',
				'overlayOpacity'	: 0.9
			});

			$("a#example7").fancybox({
				'titlePosition'	: 'inside'
			});

			$("a#example8").fancybox({
				'titlePosition'	: 'over'
			});

			$("a[rel=example_group]").fancybox({
				'transitionIn'		: 'none',
				'transitionOut'		: 'none',
				'titlePosition' 	: 'over',
				'titleFormat'		: function(title, currentArray, currentIndex, currentOpts) {
					return '<span id="fancybox-title-over">Image ' + (currentIndex + 1) + ' / ' + currentArray.length + (title.length ? ' &nbsp; ' + title : '') + '</span>';
				}
			});

			/*
			*   Examples - various
			*/

			$("#various1").fancybox({
				'titlePosition'		: 'inside',
				'transitionIn'		: 'none',
				'transitionOut'		: 'none'
			});

			$("#various2").fancybox();

			$("#various3").fancybox({
				'width'				: '75%',
				'height'			: '75%',
				'autoScale'			: false,
				'transitionIn'		: 'none',
				'transitionOut'		: 'none',
				'type'				: 'iframe'
			});

			$("#various4").fancybox({
				'padding'			: 0,
				'autoScale'			: false,
				'transitionIn'		: 'none',
				'transitionOut'		: 'none'
			});
		});
	</script> 
<!-- Fancy Box code ends here -->

<script language="JavaScript" src="js/gen_validatorv31.js" type="text/javascript"></script>	
</head>
<body>
<div id="wrapper">
  <div id="logo"><a href="index.htm">logo</a></div>
  <div id="headerRight">
    <ul class="topLinks">

      <li class="contact"><a href="#">Contact</a></li>
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
		<li><a href="transport.htm">Transport</a></li>
        <li><a href="food_drink.htm">Food &amp; Drink</a></li>
        <li><a href="concierge_services.htm">Concierge Services</a></li>
        <li><a href="news.htm">News</a></li>
        <li><a href="booking.php" class="getInTouch">Get in touch</a></li>
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

	<div id="loadRss"><script type="text/javascript">showRss("loadRss","display_rss.php");</script></div>
 
    </div>
    <!--<div class="subscribe">
    	<span class="subscribeHead">Daily round-up of Indian news</span>
      <input type="text" name="subscribe" class="subscribeInputTxt" onblur="this.value=this.value==''?'Your Email Address':this.value;" onfocus="this.value='';" value="Your Email Address" />
        <input type="button" class="subscribeBtn" name="subscribeBtn" value="Subscribe" />
    </div>-->
    <div id="loadSubscribe"><script type="text/javascript">showRss("loadSubscribe","subscribe.php");</script>
    </div>
  </div>
  <div id="content"><span class="breadcrumb">&gt; <a href="index.htm">Home</a> &gt; Booking</span>
    <h1><span class="orange">Book</span> Your Services</h1>
    
   
   <?php 
   		if(isset($thanksMsg)){
			echo "<div class='thanksMsg'>$thanksMsg</div>";
		}
   ?>
   <p align="right" class="mandatory">(* fields are mandatory)</p>
      <form method="POST" name="enquiry_form" action="">
    <div class="" style="margin-left:50px;">
    	<label class=""><strong>Name</strong> <span class="mandatory">*</span></label>
        <input name="txt_name" id="txt_name" type="text" value='' />
        <div class='err' id="v1"></div>
        <label class="clear"><strong>Company</strong></label>
        <input name="txt_company" type="text" id="txt_company" value='' />
        <label class="clear"><strong>Address</strong><span class="mandatory">*</span></label>
        <textarea name="txt_address" id="txt_address" cols="45" rows="2" value=''></textarea>
       <div class='err' id="v2"></div>
        <label class="clear"><strong>City</strong> <span class="mandatory">*</span></label>
        <input name="txt_city" type="text" id="txt_city" value='' />
       <div class='err' id="v3"></div>
        <label class="clear"><strong>Country</strong> <span class="mandatory">*</span></label>
        <input name="txt_country" type="text" id="txt_country" value='' />
       <div class='err' id="v4"></div>
        <label class="clear"><strong>Phone</strong> <span class="mandatory">*</span></label>
        <input name="txt_phone" type="text" id="txt_phone" value='' /> 
        <div class='err' id="v5"></div>
        <label class="clear"><strong>E-mail</strong> <span class="mandatory">*</span></label> 
        <input name="txt_email" type="text" id="txt_email" value="" /> 
       <div class='err' id="v6"></div>
        <label class="clear"><strong>Fax</strong></label>
        <input name="txt_fax" type="text" id="txt_fax" value='' />
        <label class="clear"><strong>Comments</strong></label> 
        <textarea name="txt_comments" id="txt_comments" cols="45" rows="4">
</textarea>
        <label class="clear" style="margin-bottom:5px;"><strong>Enter security code</strong></label> 
        <img src="captcha_code_file.php?rand=<?php echo rand(); ?>" id='captchaimg' style="float:left; margin-left:20px;" />
        <input id="6_letters_code" name="6_letters_code" type="text" style="width:120px;" />
        <?php if(!empty($errors)){ echo "<div class='err'>".$errors."</div>"; }?>
        <div class="err" id="v7"></div>
        <div class="clear"></div>
        <p style="margin-left:160px;" class="small">Can't read the image? click <a href='javascript: refreshCaptcha();'>here</a> to refresh</p>
        <input type="button" class="subscribeBtn" name="submit" value="Submit" style="margin-left:160px;" onClick="submitEnquiryForm();" />
        <input type="reset" class="subscribeBtn" name="Reset" value="Reset" id="Reset" />
    </div>
	</form>
    
    
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
    <div class="footerLink" style="float:right; margin-right:25px;"><a href="#">About Nagpurlife</a> | <a href="#">Contacts</a> | <a href="#">Privacy Policy</a> | <a href="#">Terms &amp; Conditions</a> | <a href="#">Faq</a></div>
</div><!-- Footer Ends Here-->
</body>
</html>