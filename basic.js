var alt = "false";

function getHTTP() {
	if (window.XMLHttpRequest) {
        httpXML = new XMLHttpRequest();
    } else if (window.ActiveXObject) {
        try {
            httpXML = new ActiveXObject("Msxml2.XMLHTTP");
        } catch (e) {
            try {
                httpXML = new ActiveXObject("Microsoft.XMLHTTP");
            } catch (e) {}
        }	
    }
	return httpXML;
}

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