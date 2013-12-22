<?php

$config = array(
	'Application' => array(
		'name' 	  => 'CakeStrap',
		'version' => 'v0.7',
		'status'  => 1,
	),
	'Meta' => array(
		'title' 	  => 'Agenda',
		'description' => 'Agenda em Cake',
		'keywords' 	  => 'agenda, cake',
	),
	
	'Google' => array(
		'analytics'  => '123123',
	),
	
	'Email' => array(
		'from_email' => array('{{from_name}}' => '{{from_email}}'),
		'contact_mail' => array('{{contact_name}}' => '{{contact_mail}}')
	)
);

?>