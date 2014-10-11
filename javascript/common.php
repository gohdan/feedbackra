<?php

echo <<<END

function show_feedback_form()
{
	$('#feedback_form').show('slow');
}

function hide_feedback_form()
{
	$('#feedback_form').hide('slow');
}

END;

?>
