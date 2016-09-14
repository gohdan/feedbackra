<?php

$function_name = "send_feedback_".$config['form'];

echo ("function ".$function_name."()");
echo <<<END
{
	var if_debug = 0;
END;
echo ("var form_id = '".$config['form']."';");
echo ("if (if_debug) console.log(\"=== ".$function_name." ===\");");
echo <<<END
	if (if_debug) console.log("form_id: " + form_id);
	var if_error = 0;

END;

foreach ($config['fields'] as $k => $v)
	echo ("var ".$v." = document.getElementById('feedback_form_' + form_id + '_".$v."').value;\n");

echo ("var el_id = '';\n");

foreach($config['important_fields'] as $k => $v)
{
	if ("yes" == $config['show_error_messages'])
	{
		echo ("if (if_debug) console.log('checking param ' + ".$v.");\n");
		echo ("el_error_id='feedback_form_' + form_id + '_error_".$v."';\n");
		echo ("if (if_debug) console.log('el_error_id: ' + el_error_id);\n");
		echo ("if ('' == ".$v.")\n");
		echo ("{\n");
			echo ("if (if_debug) console.log('".$v." is empty');\n");
			echo ("if_error = 1;\n");
			echo ("document.getElementById(el_error_id).className='feedback_form_error';\n");
		echo ("}\n");
		echo ("else\n");
		echo ("{\n");
			echo ("if (if_debug) console.log('".$v." is not empty');\n");
			echo ("document.getElementById(el_error_id).className='feedback_form_error_hidden';\n");
		echo ("}\n");
	}


	if ("yes" == $config['change_input_class_on_error'])
	{
		echo ("el_id='feedback_form_' + form_id + '_".$v."';\n");
		echo ("if (if_debug) console.log('el_id: ' + el_id);\n");
		echo ("if ('' == ".$v.")\n");
		echo ("{\n");
			echo ("if (if_debug) console.log('".$v." is empty');\n");
			echo ("if_error = 1;\n");
			echo ("document.getElementById(el_id).className='".$config['important_fields_error_class']."';\n");
		echo ("}\n");
		echo ("else\n");
		echo ("{\n");
			echo ("if (if_debug) console.log('".$v." is not empty');\n");
			echo ("document.getElementById(el_id).className='".$config['important_fields_normal_class']."';\n");
		echo ("}\n");
	}

}


$url = "var url = '".$config['directory']."send.php?form=".$config['form']."&form_id=' + form_id + '";

foreach($config['fields'] as $k => $v)
	$url .= "&".$v."=' + ".$v." + '";

$url = rtrim($url, " +'");
echo ("if (if_debug) console.log ('if_error: ' + if_error);\n");

echo ("if (!if_error)\n");
echo ("{\n");

echo ($url.";\n");

echo ("if (if_debug) console.log ('url: ' + url);\n");

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
END;

echo ("		httpRequest.onreadystatechange = function() { alertContents_".$config['form']."(httpRequest, form_id); };");

echo <<<END
		httpRequest.open('GET', url, true);
		httpRequest.send('');
	}
END;

echo ("if (if_debug) console.log(\"=== end: ".$function_name." ===\");");

echo <<<END
}

END;
?>
