<?php

echo ("function show_feedback_form_".$config['form']."()\n");
echo ("{\n");
echo ("console.log('show');");
echo ("$('#feedback_form_".$config['form']."').show('slow');\n");
echo ("}\n");

echo ("function hide_feedback_form_".$config['form']."()\n");
echo ("{\n");
echo ("console.log('hide');");
echo ("$('#feedback_form_".$config['form']."').hide('slow');\n");
echo ("}\n");

?>
