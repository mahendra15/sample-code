<?php
session_start();
/*
*******************************************************************       *  Com1 (www.com1uk.com), helpdesk@com1uk.com *
 *  Registered in England, Wales & India *         
 *  Site -  Housingnet.co.uk *
 *  Program Name – captcha_image.php,
 *  Created By – Gajendra Umale,
 *  Created Date - 5/25/2009
 *  Purpose – Create image for captcha for security.
 *  Modified Date – 
 *  Modified By –  
 *  Modification Note – 
*******************************************************************
*/

//CAPTCHA GENERATOR
//Created by Rob Valkass 2007
//Edited by QuickSilva
//Feel free to distribute and use as you want
//Just leave this notice and comments intact

//Email: webmaster@rvalkass.co.uk
//Web: www.rvalkass.co.uk


//Set the header to say what sort of information we are giving the browser
//Header ("(anti-spam-content-type:) image/png");


function _generateRandom($characters=6)
{
		/* list all possible characters, similar looking characters and vowels have been removed */
		$possible = '23456789bcdfghjkmnpqrstvwxyz';
		$code = '';
		$i = 0;
		while ($i < $characters) 
		{ 
			$code .= substr($possible, mt_rand(0, strlen($possible)-1), 1);
			$i++;
		}
		return $code;
}

$hash_md5 = _generateRandom(6);
$hash_string = $hash_md5;
//Asign it to a session

$_SESSION['captcha_image'] = md5(trim($hash_md5));
$session_captcha = $hash_md5;
//Create an array of the images available to us as backgrounds
$bgs = array("images/captcha.png", "images/captcha.png", "images/captcha.png");

//Choose the background image using the handy array_rand function
$background = array_rand($bgs, 1);

//Now to start creating the all important image!
//Set the background as our randomly selected image
$img_handle = imagecreatefrompng($bgs[$background]);

//Set our text colour to white
$text_colour = imagecolorallocate($img_handle, 0, 0, 0);

//Set the font size
$font_size = 5;

//Get the horizontal and vertical dimensions of the background image
$size_array = getimagesize($bgs[$background]);
$img_w = $size_array[0];
$img_h = $size_array[1];

//Work out the horizontal position
$horiz = round(($img_w/2)-((strlen($hash_string)*imagefontwidth(5))/2), 1);

//Work out the vertical position
$vert = round(($img_h/2)-(imagefontheight($font_size)/2));

//Put our text onto our image
imagestring($img_handle, $font_size, $horiz, $vert, $hash_string, $text_colour);

//Output the image
imagepng($img_handle);

//Destroy the image to free up resources
imagedestroy($img_handle);

?>