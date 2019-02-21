<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta name="keywords" content="nagpur, nagpurlife, nagpur car hire, nagpur religious places, nagpur travels, nagpur city, nagpur people, nagpur food, Nagpur places, nagpur services, nagpur climate, nagpur weather, nagpur airport, nagpur rail, Nagpur by road, Nagpur wildlife, Nagpur hotels, Nagpur pubs, Nagpur restaurants, Nagpur news, nagpur history, nagpur MIHAN" />
<meta name="description" content="Welcome to Nagpur - Get complete information on Nagpur Hotels| Restaurants &amp; Bars | Places of Interest | Weather and Climate | Airport Transfers | MIHAN Nagpur | MNC in Nagpur | Nagpur News | City Tours | Tiger Safaris" />
<meta name="Robots" lang="en" content="INDEX, FOLLOW" />
<meta name="city" content="Nagpur" />
<meta name="country" content="India" />
<meta name="Copyright" content="copyright 2012, nagpurlife.com" />
<title>Nagpur | Nagpurlife | Nagpur Hotels | Nagpur Food &amp; Drink | Nagpur Car Hire | Nagpur Local Transport | Nagpur News</title>
<link href="css/style.css" rel="stylesheet" type="text/css" />
<link rel="shortcut icon" href="favicon.ico" />
<script type="text/javascript" src="js/showRss.js"></script>

<script language="JavaScript" src="js/gen_validatorv31.js" type="text/javascript"></script>
<script language="JavaScript" src="js/booking_validation.js" type="text/javascript"></script>

<!-- Google Analytics Code - Mohit - 22/03/2012 -->
<script type="text/javascript"> 

  var _gaq = _gaq || []; 
  _gaq.push(['_setAccount', 'UA-148404-29']); 
  _gaq.push(['_trackPageview']); 

  (function() { 
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true; 
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js'; 
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s); 
  })(); 

</script> 
<!-- Google Analytics Code Ends Here -->
</head>
<body>
<?php
$name=$_POST['name'];
$email=$_POST['email'];
$company=$_POST['company'];
$msg=$_POST['message'];
$queryexe=$_POST['queryexe'];
?>
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
   <p>Call Preeti or Yamini today on +91 (0)712 650 5616 or send us a message below</p>
    <!--<p align="right" class="mandatory">(* fields are mandatory)</p>-->
	<?php
	if($queryexe == "add_booking")
{
	         require_once('Rmail.php');
		    $mail = new Rmail();
			$mail->setFrom('Info <monish.nerlay@nagpurlife.com>');
			$mail->setPriority('high');
			$mail->setSubject('Enquiry for Nagpurlife');
			//$mail->setBcc('ajaykumar@com1uk.com');
			$mail->setBcc('samir@com1uk.com');


			$message='<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"><html><head><title> nagpurlife.com booking</title>    <meta content="text/html; charset=iso-8859-1" http-equiv="Content-Type" /></head><body><table width="90%" align="center" cellspacing="0" cellpadding="0">	<tr>	<td width="100%">	  <table border="0" cellpadding="3" cellspacing="1" width="80%" align=center bgcolor="#FDEEB3">				<tr>				<td valign="top" width="100%"  class="text" align=center><font size="4" color="#660000">nagpurlife.com</B></FONT>				</td>				</tr>		</table>	</td>	</tr>	<tr bgcolor="#FFFFFF">	<td width="100%">	  <table border="0" cellpadding="3" cellspacing="1" width="80%" align=center >';
			 if($name != "")
			{
				   $message.='<tr>
				<td valign="top" width="100%"  class="text" align="left"><b>Name: </b>'.$name.'</td></tr>';
			}
			if($email != "")			
			{
				  $message.='<tr>
						<td valign="top" width="100%"  class="text" align="left"><b>Email Address: </b>'.$email.'</td>
						</tr>';
			}
			if($company != "")			
			{
				 $message.='<tr>
						<td valign="top" width="100%"  class="text" align="left"><b>Company: </b>'.$company.'</td>
						</tr>';
			}
			if($msg != "")
			{
				   $message.= '<tr>
						<td valign="top" width="100%"  class="text" align="left"><b>Message: </b>'.$msg.'</td>
						</tr>';
			}
			$message.='</table></td></tr></table></body></html>';
			
			$mail->setHTML($message);
			$result  = $mail->send(array('monish.nerlay@nagpurlife.com'));
	?>
	<fieldset>
        <div class="" style="width:500px;height:40px;">
            <p style="margin-left:20px;margin-top:5px;margin-bottom:5px;">
			<strong>Thank you, We have received your form submission. <br>
			Our representative will contact you shortly.
			</strong>
			</p>
		</div>
	</fieldset>
	<?	
}
else
{
?>
    <form method="post" name="form" onsubmit="return chk_booking(this);" action="#">
    <fieldset>
        <div class="" style="margin-left:20px;">
            <label class=""><strong>Your Name </strong><span style="color:#999;" id="breq">(required)</span></label>
            <input name="name" id="name" type="text" value='' />
            <label class="clear"><strong>Email </strong><span style="width : 400px;color:#999;" id="ereq" >(required)</span></label> 
            <input name="email" type="text" id="email" value="" /> 
            <label class="clear"><strong>Company</strong></label>
            <input name="company" type="text" id="company" value='' />
            <label class="clear"><strong>Telephone Number</strong></label>
            <input name="txt_phone" type="text" id="txt_phone" value='' />
            <label class="clear"><strong>Your Message </strong><span style="color:#999;" id="mreq">(required)</span></label> 
            <textarea name="message" id="message" cols="45" rows="4"></textarea>
    		 <div class="clear"></div>
            <input type="submit" class="subscribeBtn" name="submit" value="Submit" style="margin-left:0px;" />
            <input type="reset" class="subscribeBtn" name="Reset" value="Reset" id="Reset" />
        </div><br />
     </fieldset>
	<input type="hidden" name="queryexe" value="add_booking" />
   </form>
   <?php
}
?>
   

  </div>
  <!-- Content Ends Here-->
</div><!-- Container Ends Here-->
<div id="footer">
  <div style="margin-left:20px; float:left;">&copy; 2012 nagpurlife.com, All rights reserved</div>
    <div class="footerLink" style="float:right; margin-right:25px;"><a href="about_nagpur.htm">About Nagpurlife</a> | <a href="booking.php">Contact</a></div>
</div><!-- Footer Ends Here-->
</body>
</html>