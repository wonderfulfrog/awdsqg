<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<title>Advance Wars DS Quote Generator</title>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:400,900' rel='stylesheet' type='text/css'>
<link rel="stylesheet" type="text/css" href="css/style.css" />
<link rel="icon" href="images/favicon.ico" />
<script src="js/jquery.min.js" type="text/javascript"></script>
<script src="js/main.js" type="text/javascript"></script>
</head>
<body>
<div id="content">
	<div id="header">
		<h2>Advance Wars Dual Strike</h2>
		<h3>Quote Generator</h3>
	</div>
	<form method="post" action="index.php" id="quote">
		<div class="field-group">
			<div id="alt"><input type="hidden" name="alt" id="alt-value" value="false" /></div>
			<select id="co-select" name="co">
				<option value="andy">Select CO</option>
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
			<select id="backdrop-select" name="backdrop">
				<option value="standard">Select Backdrop</option>
				<option value="standard">Standard AWDS Backdrop</option>
				<option value="orange">Orange Star</option>
				<option value="blue">Blue Moon</option>
				<option value="green">Green Earth</option>
				<option value="yellow">Yellow Comet</option>
				<option value="black">Black Hole</option>
			</select>
			<select id="expr-select" name="expr">
				<option value="standard">Select a Mood</option>
				<option value="normal">Normal</option>
				<option value="lose">Shocked</option>
				<option value="win">Glee!</option>
			</select>
			<div id="quote-preview">
				<div id="background" style="background: url('images/backdrop/standard.gif');">
					<textarea id="quote-text" name="text">Enter your funny quote here!</textarea>
					<div id="portrait" style="background: url('images/co/andy.gif');"></div>
				</div>
			</div>
			<input type="submit" id="generate-button" value="Generate!" />
		</div>
	</form>
	<div id="quote-box">
		<div id="loading" style="display:none;"><img src="images/working.gif" /></div>
		<div id="error" class="box" style="display: none;">Looks like something went wrong.  Please try again.</div>
		<div id="generated-quote" class="box" style="display:none;">
			<div id="finished"></div>
			<input type="text" id="finished-url" />
		</div>
	</div>
</div>
<div id="footer">
	All Advance Wars imagery and names are &copy; Nintendo, Intelligent Systems.  Developed by <a href="https://twitter.com/devinwl">@devinwl</a>.
</div>
</body>
</html>
