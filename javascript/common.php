<?php

echo <<<END

function show_feedback_form(form_id)
{
	$('#feedback_form_' + form_id).show('slow');
}

function hide_feedback_form(form_id)
{
	$('#feedback_form_' + form_id).hide('slow');
}

END;

?>
