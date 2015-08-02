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

$config['seo'] = array(
	'yandex_metrica_uid' => '',
	'yandex_metrica_action' => '',
	'google_analytics_category' => '',
	'google_analytics_action' => ''
);

$config['mail'] = array(
	'direct' => 'no', // set to "yes" to send mail directly with mail() function
	'admin_email' => 'admin@example.org',
	'bcc_admin' => 'yes', // set to "no" to don't send copy of the emails to admin
	'to' => array(
		'director@example.org'
	),
	'host' => 'smtp.example.org',
	'port' => 465,
	'ssl' => 'yes',
	'username' => 'forms@example.org',
	'password' => '********',
	'from' => 'forms@example.org',
	'from_name' => 'Feedback Form',
	'subject' => 'Feedback from your website'
);

?>
