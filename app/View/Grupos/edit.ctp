<div class="grupos form">

	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<h1><?php echo __('Add Grupo'); ?></h1>
			</div>
		</div>
	</div>



	<div class="row">
		<div class="col-md-3">
			<div class="actions">
				<div class="panel panel-default">
					<div class="panel-heading">Actions</div>
						<div class="panel-body">
							<ul class="nav nav-pills nav-stacked">

																<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;List Grupos'), array('action' => 'index'), array('escape' => false)); ?></li>
									<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;List Grupos'), array('controller' => 'grupos', 'action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;List Contatos'), array('controller' => 'contatos', 'action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;New Contato'), array('controller' => 'contatos', 'action' => 'add'), array('escape' => false)); ?> </li>
							</ul>
						</div>
					</div>
				</div>			
		</div><!-- end col md 3 -->
		<div class="col-md-9">
			<?php echo $this->Form->create('Grupo', array('role' => 'form')); ?>

				<div class="form-group">
					<?php echo $this->Form->input('title', array('class' => 'form-control', 'placeholder' => 'Title'));?>
				</div>
				
				<div class="form-group">
					<?php echo $this->Form->input('parent_id', array('options' => $grupos , 'empty' => 'Selecione uma Grupo', 'class' => 'form-control', 'placeholder' => 'Parent Id'));?>
				</div>

				<div class="form-group">
					
				</div>
				<div class="form-group">
				

					<?php echo $this->Form->submit(__('Submit'),   array('class' => 'btn btn-success', 
                    'tabindex' => '-1',
                    'escape' => false ) ) ?>
				</div>

			<?php echo $this->Form->end() ?>

		</div><!-- end col md 12 -->
	</div><!-- end row -->
</div>
