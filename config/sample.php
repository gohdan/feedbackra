<?php

$config['form'] = "sample"; // so there must be the config file config/sample.php - it will be automatically loaded by name

$config['fields'] = array(
	'Contact phone' => 'phone',
	'Feedback message' => 'message'
);

$config['important_fields'] = array(
	'phone',
	'message'
);

$config['mail'] = array(
	'admin_email' => "admin@example.org",
	'to' => "director@example.org",
	'host' => 'smtp.example.org',
	'port' => 465,
	'username' => 'forms@example.org',
	'password' => '********',
	'from' => 'forms@example.org',
	'from_name' => 'Feedback Form',
	'subject' => 'Feedback from your website',
	'bcc_admin' => 'yes' // set to "no" to don't send copy of the emails to admin
);

?>
