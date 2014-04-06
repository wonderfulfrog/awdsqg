<?php

$chosen_co = $_GET['co'];
$backdrop_plain = $_GET['backdrop'];
$expr = $_GET['expr'];
$text = $_GET['text'];
$alt = $_GET['alt'];

switch ($expr)
{
	case "normal":
		$offset = 0;
		break;
	case "win":
		$offset = 48;
		break;
	case "lose":
		$offset = 96;
		break;
	default:
		$offset = 0;
		break;
}

if($alt == "true") {
	$gif = realpath('images/co/' . $chosen_co . '-alt.gif');
} else {
	$gif = realpath('images/co/' . $chosen_co . '.gif');
}

$image = imagecreatetruecolor(240, 48);
$bd = imagecreatefromgif("images/backdrop/" . $backdrop_plain . ".gif");
imagecopy($image, $bd, 0, 0 , 0, 0, 240, 48);
$co = imagecreatefromgif($gif);
imagecopy($image, $co, 0, 0, $offset, 0, 48, 48);

$black = imagecolorallocate($image, 0, 0, 0);

$fontpath = realpath('fonts/');
putenv('GDFONTPATH='.$fontpath);
$font = "aw2text.ttf";

$lines = explode("\r\n", $text);

$line1 = '';
$line2 = '';

/* Attempts to break up a line into multiple parts
   Not perfect, but good for general usage */

// If we have two lines, then we are already done
if(count($lines) == 2) {
	$line1 = $lines[0];
	$line2 = $lines[1];
}
else { // Otherwise, break em up with wordwrap()
	$newLines = wordwrap($lines[0], 40, "\r\n");
	$newLines = explode("\r\n", $newLines);
	$line1 = $newLines[0];
	if(isset($newLines[1]))
		$line2 = $newLines[1];
}

imagettftext($image, 6,0,52,20,$black,$font,$line1);
imagettftext($image, 6,0,52,37,$black,$font,$line2);

// Capture the image data from imagegif() and then convert to to base64 for uploading to imgur
ob_start();
imagepng($image);
$image_data = ob_get_contents();
ob_end_clean();

// Get image in base64
$image64 = base64_encode($image_data);
print $image64;

?>
