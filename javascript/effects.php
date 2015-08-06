<?php

echo ("function show_feedback_form_".$config['form']."()\n");
echo ("{\n");
if ("yes" == $config['use_jquery'])
	echo ("$('#feedback_form_".$config['form']."').show('slow');\n");
else
	echo ("document.getElementById('feedback_form_".$config['form']."').style.display='block';\n");

echo ("}\n");

echo ("function hide_feedback_form_".$config['form']."()\n");
echo ("{\n");
if ("yes" == $config['use_jquery'])
	echo ("$('#feedback_form_".$config['form']."').hide('slow');\n");
else
	echo ("document.getElementById('feedback_form_".$config['form']."').style.display='none';\n");

echo ("}\n");

?>
