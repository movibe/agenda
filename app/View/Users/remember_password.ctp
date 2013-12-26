<?php echo $this->Html->css(array(
	'signin.css',
)); ?>


<?php echo $this->Session->flash() ?>
<div class="row">
	<div class="col-lg-12">
	<?php
	echo $this->Form->create
	(
		'User',
		array
		(
			'url' => array
			(
				'controller' => 'users',
				'action'	 => 'remember_password'
			),
			'class'			=> 'form-signin',
			'inputDefaults' => array
			(
				'label' => false,
				'error' => false
			)
		)
	);
	?>
		<h2><?php echo __('Forgot your password?') ?></h2>
		<hr>
		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
		tempor incididunt ut labore et dolore magna aliqua. </p>
	  <div class="form-group">
	    <?php echo $this->Form->input('email',array('placeholder' => __('E-mail'),'class' => 'form-control email-field')); ?>
	  </div>

	  <button type="submit" class="btn btn-primary btn-block">Next step</button>

	</form>
	</div>
</div>
