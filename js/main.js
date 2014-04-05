var co = "andy";
var backdrop = "standard";
var mood = 'normal';
var alt = false;

(function($) {
	$(document).ready(function() {
		$('#quote').submit(function(e) {
			e.preventDefault();
			console.log('gen time');
		});

		$('#co-select').change(function() {
			co = $(this).val();
			updateQuote();
		});

		$('#backdrop-select').change(function() {
			backdrop = $(this).val();
			updateQuote();
		});

		$('#expr-select').change(function() {
			mood = $(this).val();
			updateQuote();
		});

		$('#alt').click(function() {
			alt = !alt;
			updateQuote();
		})

		function updateQuote() {
			$('#background').css('background-image', 'url(images/backdrop/' + backdrop + '.gif)');
			if(alt) {
				$('#portrait').css('background-image', 'url(images/co/' + co + '-alt.gif)');
			}
			else {
				$('#portrait').css('background-image', 'url(images/co/' + co + '.gif)');
			}

			switch(mood) {
				case 'normal':
					$('#portrait').css('background-position', '0 0');
					break;

				case 'win':
					$('#portrait').css('background-position', '-48px 0');
					break;

				case 'lose':
					$('#portrait').css('background-position', '-96px 0');
					break;
			}
		}
	});
})(jQuery);

/*
function make_quote() {
	var httpSend = new Array();
	var i = new Date();
	httpSend[i] = getHTTP();
	httpSend[i].open("POST", "gen_quote.php", true);
	httpSend[i].setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	var co = document.forms['quote'].elements['co_select'].value;
	var expr = document.forms['quote'].elements['expr_select'].value;
	var backd = document.forms['quote'].elements['backdrop_select'].value;
	var line1 = document.forms['quote'].elements['line1'].value;
	var line2 = document.forms['quote'].elements['line2'].value;
	if (alt == "true")
		co = co + "-alt";
	var params = "co=" + co + "&expr=" + expr + "&backd=" + backd + "&line1=" + line1 + "&line2=" + line2;
	httpSend[i].send(params);
	document.getElementById("finished").innerHTML = "<img src='working.gif'>";
	httpSend[i].onreadystatechange = function() {
		if ((httpSend[i].readyState == 4) && (httpSend[i].status == 200)) {
			document.getElementById("finished").innerHTML = httpSend[i].responseText;
		}
	}
	return false;
}

function set_preview(opt) {
	if (opt == "backdrop") {
		var backd = document.forms['quote'].elements['backdrop_select'].value;
		document.getElementById("background").innerHTML = "<img src='backdrop/" + backd + ".gif'>";
		return false;
	}
	var co = document.forms['quote'].elements['co_select'].value;
	var expr = document.forms['quote'].elements['expr_select'].value;
	if (co == "dummy") { return false; }
	if (alt == "true")
		co = co + "-alt";
	document.getElementById("portrait").style.background = "url('co/" + co + ".gif')";

	if (expr == "win")
		document.getElementById("portrait").style.backgroundPosition = "96px 0px";
	else if (expr == "lose")
		document.getElementById("portrait").style.backgroundPosition = "48px 0px";
	else
		document.getElementById("portrait").style.backgroundPosition = "0px 0px";
	//document.getElementById("portrait").innerHTML = "<img src='ds_cos/" + co + "-" + expr + ".gif'>";
}

function flag_alt()
{
	if (alt == "false")
	{
		document.getElementById("alt").style.backgroundPosition = "0px -36px";
		alt = "true";
	}
	else
	{
		document.getElementById("alt").style.backgroundPosition = "0px 0px";
		alt = "false";
	}
}
*/