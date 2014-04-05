<?php

include ("db.php");
$ip = $_SERVER['REMOTE_ADDR'];
$hostname = gethostbyaddr($_SERVER['REMOTE_ADDR']);
$browser = $_SERVER['HTTP_USER_AGENT'];
$time = time();

$db = new db();

$db->connect("localhost", "wf_projects", "CAm3zyLtTFBe9eLP", "awdsqg");
$db->query("INSERT INTO visitors (ip, hostname, browser, time) VALUES ('$ip', '$hostname', '$browser', '$time')");

$query = $db->query("SELECT quote_counter FROM counter") or die(mysql_error());
$data = $db->fetch_assoc($query);
$num_visitors = $data['quote_counter'];
$db->query("UPDATE counter SET quote_counter=quote_counter+1");

$query = $db->query("SELECT time FROM quotes ORDER BY id DESC") or die(mysql_error());
$data = $db->fetch_assoc($query);
$quotes = $db->num_rows($query);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<title>Advance Wars DS Quote Generator</title>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
<link rel="stylesheet" type="text/css" href="style.css" />
<script src="basic.js" type="text/javascript"></script>
</head>
<body>
<div id="content">
	<div id="header">Advance Wars DS Quote Generator</div>
	<div style="text-align: center"><i>"Hilarity will ensue!"</i></div>
	<p>It's pretty simple to use.  Just select the options you want.  After you've selected an option, your change will be reflected in the "Quote Preview" (except for text) below.  Neat!  Once you're all finished, just hit the big ol' button.  Your quote will appear magically below!  Cool!</p>
	<form method="post" action="" id="quote" onsubmit="make_quote(); return false;">
	<div style="padding-bottom: 3px; color: #9A8775; font-size: 120%; font-weight: bold" title="Yes, he knows what an airport is">Select a CO and backdrop</div>
	<div style="border: 1px solid #C4C1BD; padding: 5px; margin-bottom: 10px">
		<div style="text-align: left;">
			<a href="javascript:flag_alt(); set_preview();"><div id="alt" style="float: right; margin-right: 55px; margin-top: 10px; background: url('alt.gif') no-repeat; width: 35px; height: 31px"></div></a>
			<select name="co_select" style="text-align: center; margin-left: 55px" onblur="set_preview();">
				<option value="dummy">SELECT CO</option>
				<option disabled="disabled" style="font-weight: bold">ORANGE STAR</option>
				<option value="jake">Jake</option>
				<option value="rachel">Rachel</option>
				<option value="andy">Andy</option>
				<option value="max">Max</option>
				<option value="sami">Sami</option>
				<option value="nell">Nell</option>
				<option value="hachi">Hachi</option>
				<option disabled="disabled" style="font-weight: bold">BLUE MOON</option>
				<option value="olaf">Olaf</option>
				<option value="grit">Grit</option>
				<option value="colin">Colin</option>
				<option value="sasha">Sasha</option>
				<option disabled="disabled" style="font-weight: bold">GREEN EARTH</option>
				<option value="eagle">Eagle</option>
				<option value="drake">Drake</option>
				<option value="jess">Jess</option>
				<option value="javier">Javier</option>
				<option disabled="disabled" style="font-weight: bold">YELLOW COMET</option>
				<option value="kanbei">Kanbei</option>
				<option value="sonja">Sonja</option>
				<option value="sensei">Sensei</option>
				<option value="grimm">Grimm</option>
				<option disabled="disabled" style="font-weight: bold">BLACK HOLE</option>
				<option value="flak">Flak</option>
				<option value="lash">Lash</option>
				<option value="adder">Adder</option>
				<option value="hawke">Hawke</option>
				<option value="jugger">Jugger</option>
				<option value="koal">Koal</option>
				<option value="kindle">Kindle</option>
				<option value="von-bolt">Von Bolt</option>
			</select>
			<div style="height: 10px"></div>
			<select name="backdrop_select" style="text-align: center; margin-left: 55px" onblur="set_preview('backdrop');">
				<option value="standard">SELECT A BACKDROP</option>
				<option value="standard">Standard AWDS Backdrop</option>
				<option value="orange">Orange Star</option>
				<option value="blue">Blue Moon</option>
				<option value="green">Green Earth</option>
				<option value="yellow">Yellow Comet</option>
				<option value="black">Black Hole</option>
			</select>
		</div>
	</div>
	<div style="padding-bottom: 3px; color: #9A8775; font-size: 120%; font-weight: bold" title="A wide array of three selections!">Select an expression</div>
	<div style="border: 1px solid #C4C1BD; padding: 5px; margin-bottom: 10px">
		<div style="text-align: center">
			<select name="expr_select" style="text-align: center" onblur="set_preview();">
				<option value="normal">Normal</option>
				<option value="lose">Shocked</option>
				<option value="win">Glee!</option>
			</select>
		</div>
	</div>
	<div style="padding-bottom: 3px; color: #9A8775; font-size: 120%; font-weight: bold" title="Serious business will not be tolerated">Type out something funny!</div>
	<div style="border: 1px solid #C4C1BD; padding: 5px; margin-bottom: 10px">
		<div style="text-align: center">
			Line 1: <input type="text" name="line1" maxlength="37" size="30" />
			<div style="height: 10px"></div>
			Line 2: <input type="text" name="line2" maxlength="37" size="30" />
			<div style="height: 10px"></div>
			<input name="submit" type="submit" value="Let It Be!" />
		</div>
	</div>
	</form>
	<div style="padding-bottom: 3px; color: #9A8775; font-size: 120%; font-weight: bold">Quote Preview</div>
	<div style="border: 1px solid #C4C1BD; padding: 5px; margin-bottom: 10px">
		<div style="text-align: center; position: relative">
			<div style="width: 48px; height: 48px; position: absolute; left: 74px; background: url('co/andy.gif')" id="portrait"></div>
			<div style="width: 240px; height: 48px; margin: 0 auto" id="background"><img src="backdrop/standard.gif" alt="" /></div>
		</div>
	</div>
	<div style="padding-bottom: 3px; color: #9A8775; font-size: 120%; font-weight: bold">Your Quote</div>
	<div style="border: 1px solid #C4C1BD; padding: 5px; margin-bottom: 10px">
		<div style="text-align: center">
			<div id="finished"><div title="Silly!">You haven't made a quote yet!</div></div>
		</div>
	</div>
	<div style="text-align: center; font-size: 75%">
		<b>Quotes</b>: <?php echo $quotes; ?> - 
		<b>Visitors</b>: <?php echo $num_visitors; ?>
	</div>
</div>
<div id="tiny_box">
	Advance Wars is &copy; Nintendo, Intelligent Systems.  If you have any questions, comments, whatever, drop me a line at keiroshin [at] gmail [dot] com.
</div>
</body>
</html>