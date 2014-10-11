<?php

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

	//$headers = "Content-type: text/plain; charset=utf-8 \r\n";
	//mail($config['mail']['to'], $subject, $message, $headers);

	include_once ("./phpmailer/PHPMailerAutoload.php");

	$mail = new PHPMailer();

	$mail->setLanguage('ru');
	$mail->CharSet = "utf-8";
	$mail->IsSMTP(); // set mailer to use SMTP
	$mail->Host = $config['mail']['host']; // specify main and backup server
	$mail->Port = $config['mail']['port'];
	$mail->SMTPAuth = true; // turn on SMTP authentication
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
		echo "ok";
	else
		echo ($mail->ErrorInfo);
}
}

?>
