<?php

echo <<<END


function alertContents(httpRequest) {
	if (httpRequest.readyState == 4) {
		if (httpRequest.status == 200) {
			//alert(httpRequest.responseText);
			if ('ok' == httpRequest.responseText)
			{
				document.getElementById('feedback_form_response_ok').className = 'feedback_form_ok';
				document.getElementById('feedback_form_response_error').className = 'feedback_form_error_hidden';
				document.getElementById('feedback_form_response').className = 'feedback_form_error_hidden';
				document.getElementById('feedback_form_send_button').style.display = 'none';
			}
			else
			{
				document.getElementById('feedback_form_response_ok').className = 'feedback_form_error_hidden';
				document.getElementById('feedback_form_response_error').className = 'feedback_form_error';
				document.getElementById('feedback_form_response').className = 'feedback_form_error';
				document.getElementById('feedback_form_response').innerHTML = httpRequest.responseText;
			}
		} else {
			//alert('There was a problem with the request.');
			document.getElementById('feedback_form_response_ok').className = 'feedback_form_error_hidden';
			document.getElementById('feedback_form_response_error').className = 'feedback_form_error';
		}
	}
}

END;

?>
