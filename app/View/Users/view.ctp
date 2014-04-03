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

<img src="<?php echo $this->params->base . DS . $user['User']['photo'] ?>" alt=""  class="img-thumbnail">
<hr>
<strong>Username: </strong><?php echo $user['User']['username'] ?><br/>
<strong>Role: </strong><?php echo $user['User']['role'] ?>
