<?php

echo ("\nfunction alertContents_".$config['form']."(httpRequest, form_id) {\n");

echo <<<END
	if (httpRequest.readyState == 4) {
		if (httpRequest.status == 200) {
			//alert(httpRequest.responseText);
			if ('ok' == httpRequest.responseText)
			{
				document.getElementById('feedback_form_' + form_id + '_response_ok').className = 'feedback_form_ok';
				document.getElementById('feedback_form_' + form_id + '_response_error').className = 'feedback_form_error_hidden';
				document.getElementById('feedback_form_' + form_id + '_response').className = 'feedback_form_error_hidden';
				document.getElementById('feedback_form_' + form_id + '_send_button').style.display = 'none';

END;

if (isset($config['seo']['yandex_metrica_uid']) && ("" != $config['seo']['yandex_metrica_uid']) &&
	isset($config['seo']['yandex_metrica_action']) && ("" != $config['seo']['yandex_metrica_action']))
		echo ("yaCounter".$config['seo']['yandex_metrica_uid'].".reachGoal('".$config['seo']['yandex_metrica_action']."');\n");

if (isset($config['seo']['google_analytics_category']) && ("" != $config['seo']['google_analytics_category']) &&
	isset($config['seo']['google_analytics_action']) && ("" != $config['seo']['google_analytics_action']))
		echo ("ga('send', 'event', '".$config['seo']['google_analytics_category']."','".$config['seo']['google_analytics_action']."');\n");

echo <<<END

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
