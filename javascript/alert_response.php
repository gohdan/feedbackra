<?php

echo <<<END


function alertContents(httpRequest, form_id) {
	if (httpRequest.readyState == 4) {
		if (httpRequest.status == 200) {
			//alert(httpRequest.responseText);
			if ('ok' == httpRequest.responseText)
			{
				document.getElementById('feedback_form_' + form_id + '_response_ok').className = 'feedback_form_ok';
				document.getElementById('feedback_form_' + form_id + '_response_error').className = 'feedback_form_error_hidden';
				document.getElementById('feedback_form_' + form_id + '_response').className = 'feedback_form_error_hidden';
				document.getElementById('feedback_form_' + form_id + '_send_button').style.display = 'none';
			}
			else
			{
				document.getElementById('feedback_form_' + form_id + '_response_ok').className = 'feedback_form_error_hidden';
				document.getElementById('feedback_form_' + form_id + '_response_error').className = 'feedback_form_error';
				document.getElementById('feedback_form_' + form_id + '_response').className = 'feedback_form_error';
				document.getElementById('feedback_form_' + form_id + '_response').innerHTML = httpRequest.responseText;
			}
		} else {
			//alert('There was a problem with the request.');
			document.getElementById('feedback_form_' + form_id + '_response_ok').className = 'feedback_form_error_hidden';
			document.getElementById('feedback_form_' + form_id + '_response_error').className = 'feedback_form_error';
		}
	}
}

END;

?>
