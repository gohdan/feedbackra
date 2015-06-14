<?php

error_reporting(E_ALL);
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);

include("config/common.php");
include("javascript/common.php");

if (isset($_GET['form']))
{
	if (isset($_GET['form_id']))
		$form_id = $_GET['form_id'];
	else
		$form_id = 1;

	$config_file = "config/".$_GET['form'].".php";

	if (file_exists($config_file))
	{
		include($config_file);
		include("javascript/send_feedback.php");
		include("javascript/alert_response.php");
	}

}


?>
