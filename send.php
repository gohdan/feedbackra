<?php

//error_reporting(E_ALL);
//ini_set('error_reporting', E_ALL);
//ini_set('display_errors', 1);

include("config/common.php");

if (isset($_GET['form']))
{
$config_file = "config/".$_GET['form'].".php";

if (file_exists($config_file))
{
	include($config_file);

	//print_r($config);

	$fields = array();
	$message = "";
	$result =0;

	foreach($config['fields'] as $field_title => $field_name)
	{
		//echo ($field_title.":".$field_name);
		if (isset($_GET[$field_name]))
		{
			$message .= $field_title.": ".$_GET[$field_name]."\r\n\r\n";
		}
	}
	//echo ("message: ".$message);

	$subject = '=?utf-8?B?'.base64_encode($config['mail']['subject']).'?=';

	if ("yes" == $config['mail']['direct'])
	{
		$headers = "Content-type: text/plain; charset=utf-8\r\n";
		if ("" != $config['mail']['from_name'])
			$headers .= "From: ".$config['mail']['from_name']." <".$config['mail']['from'].">\r\n";
		else
			$headers .= "From: ".$config['mail']['from']."\r\n";
		if ("yes" == $config['mail']['bcc_admin'])
			$headers .= "Bcc: ".$config['mail']['admin_email']."\r\n";

		$to = "";
		foreach ($config['mail']['to'] as $k => $v)
			$to .= $v.", ";
		rtrim($to, ", ");

		$message = wordwrap($message, 70, "\r\n");

		if (mail($to, $subject, $message, $headers))
			$result = 1;
		else
			$error = "mail sending error";
	}
	else
	{
		include_once ("./phpmailer/PHPMailerAutoload.php");

		$mail = new PHPMailer();

		$mail->setLanguage('ru');
		$mail->CharSet = "utf-8";
		$mail->IsSMTP(); // set mailer to use SMTP
		$mail->Host = $config['mail']['host']; // specify main and backup server
		$mail->Port = $config['mail']['port'];
		$mail->SMTPAuth = true; // turn on SMTP authentication
		if ("yes" == $config['mail']['ssl'])
			$mail->SMTPSecure = 'ssl'; // Enable SSL encryption, `tls` also accepted
		$mail->Username = $config['mail']['username']; // SMTP username
		$mail->Password = $config['mail']['password']; // SMTP password

		$mail->From = $config['mail']['from'];
		$mail->FromName = $config['mail']['from_name'];
	
		foreach($config['mail']['to'] as $k => $v)
			$mail->AddAddress($v);

		if ("yes" == $config['mail']['bcc_admin'])
			$mail->addBCC($config['mail']['admin_email']);

		$mail->WordWrap = 70;                                 // set word wrap to 50 characters
		$mail->IsHTML(false);                                  // set email format to HTML

		$mail->Subject = $subject;
		$mail->Body = $message;

		if($mail->Send())
			$result = 1;
		else
			$error = $mail->ErrorInfo;
	}

	if ($result)
		echo ("ok");
	else
		echo ($error);

}
}

?>
