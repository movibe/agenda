<?php echo $this->Html->css(array(
	'signin.css',
)); ?>

		<?php echo $this->Form->create('User',array(
												'url' => array(
													'controller' => 'users',
													'action' => 'login'
												), 'class' => 'form-signin',
												'inputDefaults' => array
			(
				'label' => false,
				'error' => false
			)
			
												));?>
		<h2 class="form-sigin-heading"><?php echo Configure::read('Application.name') ?></h2>

		  <?php echo $this->Form->input('email', array('class' => 'form-control', 
		  													'label'=> '',
		  													'placeholder'=> __('Email', $args = null),
		  													// 'helpText' => 'Ajuda'
		  													 )
		  													);?>
		  <?php echo $this->CakeStrap->input('password', array('class' => 'form-control', 
		  														'placeholder'=> __('Password', $args = null),
		  														 ));?>
		  <div class="form-group">
		  	<?php echo $this->Html->link(__('Forgot your password?'),array('controller' => 'users','action' => 'remember_password')) ?>
		  </div>
		  <label>
		      <input type="checkbox" name="data[User][remember_me]" value="S"> <?php echo __('Remember', $args = null) ?>
		    </label>
		  <button type="submit" class="btn btn-primary btn-block"><?php echo __('Login', $args = null) ?></button>
		</form>



