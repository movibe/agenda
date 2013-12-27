<?php
$breadcrumb = array(
	array(
		'label' => 'Usuários',
		'link'	=> '/users'
	),
	array(
		'label'	=> $user['User']['username']
	)
);
echo $this->element('breadcrumb',array('links' => $breadcrumb));
?>


<h3><?php echo $user['User']['username'] ?></h3>
<h3><?php echo $user['User']['photo'] ?></h3>
<hr>
<strong>Username: </strong><?php echo $user['User']['username'] ?><br/>
<strong>Role: </strong><?php echo $user['User']['role'] ?>
