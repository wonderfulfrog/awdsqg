<?php

$chosen_co = $_POST['co'];
$backdrop_plain = $_POST['backd'];
$expr = $_POST['expr'];
$line1 = $_POST['line1'];
$line2 = $_POST['line2'];
$time = time();

if ( $_POST['expr'] == "")
	$expr = "normal";

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

$gif = realpath('./co/' . $chosen_co . '.gif');

$image = imagecreatefromgif("backdrop/" . $backdrop_plain . ".gif");
//$co = imagecreatefromgif("co/" . $chosen_co . ".gif");
$co = imagecreatefromgif($gif);
imagecopymerge($image, $co, 0, 0, $offset, 0, 48, 48, 100);

$line1 = str_replace("\\", "", $line1);
$line2 = str_replace("\\", "", $line2);

$black = imagecolorallocate($image, 0, 0, 0);

$fontpath = realpath('./fonts/');
putenv('GDFONTPATH='.$fontpath);
$font = "./fonts/aw2text.ttf";

Imagettftext($image, 6,0,55,20,$black,$font,$line1);
Imagettftext($image, 6,0,55,36,$black,$font,$line2);

imagegif($image, "quotes/" . $time . ".gif");

echo "<img src='quotes/" . $time . ".gif'>";
?>
