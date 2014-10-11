<?php

echo <<<END


function send_feedback()
{
	var if_error = 0;

END;

foreach ($config['fields'] as $k => $v)
	echo ("var ".$v." = document.getElementById('feedback_form_".$v."').value;\n");


foreach($config['important_fields'] as $k => $v)
{
	echo ("if ('' == ".$v.")\n");
	echo ("{\n");
	echo ("if_error = 1;\n");
	echo ("document.getElementById('feedback_form_error_".$v."').className='feedback_form_error';\n");
	echo ("}\n");
	echo ("else\n");
	echo ("document.getElementById('feedback_form_error_".$v."').className='feedback_form_error_hidden';\n");
}


$url = "var url = '".$config['directory']."send.php?form=".$config['form'];

foreach($config['fields'] as $k => $v)
	$url .= "&".$v."=' + ".$v." + '";

$url = rtrim($url, " +'");
//echo ("alert (if_error);\n");

echo ("if (!if_error)\n");
echo ("{\n");

echo ($url.";\n");

//echo ("alert (url);\n");

echo <<<END
		var httpRequest;

		if (window.XMLHttpRequest) { // Mozilla, Safari, ...
			httpRequest = new XMLHttpRequest();
			if (httpRequest.overrideMimeType) {
				httpRequest.overrideMimeType('text/xml');
				// See note below about this line
			}
		} 
		else if (window.ActiveXObject) { // IE
			try {
				httpRequest = new ActiveXObject("Msxml2.XMLHTTP");
			} 
			catch (e) {
				try {
					httpRequest = new ActiveXObject("Microsoft.XMLHTTP");
				} 
				catch (e) {}
			}
		}

		if (!httpRequest) {
			alert('Giving up :( Cannot create an XMLHTTP instance');
			return false;
		}
		httpRequest.onreadystatechange = function() { alertContents(httpRequest); };
		httpRequest.open('GET', url, true);
		httpRequest.send('');
	}

}

END;
?>
