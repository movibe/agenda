<?php

$config = array(
	'Application' => array(
		'name' 	  => 'Agenda',
		'version' => 'v0.7',
		'status'  => 1,
	),
	'Meta' => array(
		'title' 	  => 'Agenda',
		'description' => 'Site de Agenda',
		'keywords' 	  => 'agenda, site, cake',
	),
	
	'Google' => array(
		'analytics'  => '121213',
	),
	
	'Email' => array(
		'from_email' => array('{{from_name}}' => '{{from_email}}'),
		'contact_mail' => array('{{contact_name}}' => '{{contact_mail}}')
	)
);

?>