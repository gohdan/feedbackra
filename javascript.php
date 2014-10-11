<?php

include("config/common.php");
include("javascript/common.php");


if (isset($_GET['form']))
{
	$config_file = "config/".$_GET['form'].".php";

	if (file_exists($config_file))
	{
		include($config_file);
		include("javascript/send_feedback.php");
		include("javascript/alert_response.php");
	}
}


?>
