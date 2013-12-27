<div class="contatos form">

	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<h1><?php echo __('Add Contato'); ?></h1>
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

																<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;List Contatos'), array('action' => 'index'), array('escape' => false)); ?></li>
									<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;List Grupos'), array('controller' => 'grupos', 'action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;New Grupo'), array('controller' => 'grupos', 'action' => 'add'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;List Telefones'), array('controller' => 'telefones', 'action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;New Telefone'), array('controller' => 'telefones', 'action' => 'add'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;List Generos'), array('controller' => 'generos', 'action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;New Genero'), array('controller' => 'generos', 'action' => 'add'), array('escape' => false)); ?> </li>
							</ul>
						</div>
					</div>
				</div>			
		</div><!-- end col md 3 -->
		<div class="col-md-9">
			<?php echo $this->Form->create('Contato', array('role' => 'form')); ?>

				<div class="form-group">
					<?php echo $this->Form->input('grupo_id', array('class' => 'form-control', 'placeholder' => 'Grupo Id'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('telefone_id', array('class' => 'form-control', 'placeholder' => 'Telefone Id'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('genero_id', array('class' => 'form-control', 'placeholder' => 'Genero Id'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('title', array('class' => 'form-control', 'placeholder' => 'Title'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('photo', array('class' => 'form-control', 'placeholder' => 'Photo'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('sobrenome', array('class' => 'form-control', 'placeholder' => 'Sobrenome'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('apelido', array('class' => 'form-control', 'placeholder' => 'Apelido'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('nascimento', array('class' => 'form-control', 'placeholder' => 'Nascimento'));?>
				</div>
				<div class="form-group">
					<?php echo '<span class="glyphicon glyphicon-edit"></span>' . $this->Form->submit( __('Submit'), array('class' => 'btn btn-success') , array('escape' => false) ); ?>
				</div>

			<?php echo $this->Form->end() ?>

		</div><!-- end col md 12 -->
	</div><!-- end row -->
</div>
