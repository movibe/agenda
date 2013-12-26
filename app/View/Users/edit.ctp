<?php
$breadcrumb = array(
	array(
		'label' => 'Users',
		'link'	=> '/users/home'
	),
	array(
		'label'	=> $user['User']['username'],
		'link'	=> '/users/view/'.$user['User']['id']
	),
	array(
		'label'	=> 'edit'
	)
);
echo $this->element('breadcrumb',array('links' => $breadcrumb));
?>

<h2><?=__('Edit user')?></h2>
<hr>
<div class="row">
	<div class="col-4">
		<?php echo $this->element('form_users',array('action' => '', 'label' => __('Edit User'))) ?>
	</div>
</div>
