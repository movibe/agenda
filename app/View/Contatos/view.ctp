<div class="contatos view">
	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<h1><?php echo __('Contato'); ?></h1>
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
									<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-edit"></span>&nbsp&nbsp;Edit Contato'), array('action' => 'edit', $contato['Contato']['id']), array('escape' => false)); ?> </li>
		<li><?php echo $this->Form->postLink(__('<span class="glyphicon glyphicon-remove"></span>&nbsp;&nbsp;Delete Contato'), array('action' => 'delete', $contato['Contato']['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $contato['Contato']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp&nbsp;List Contatos'), array('action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp&nbsp;New Contato'), array('action' => 'add'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp&nbsp;List Grupos'), array('controller' => 'grupos', 'action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp&nbsp;New Grupo'), array('controller' => 'grupos', 'action' => 'add'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp&nbsp;List Telefones'), array('controller' => 'telefones', 'action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp&nbsp;New Telefone'), array('controller' => 'telefones', 'action' => 'add'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp&nbsp;List Generos'), array('controller' => 'generos', 'action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp&nbsp;New Genero'), array('controller' => 'generos', 'action' => 'add'), array('escape' => false)); ?> </li>
							</ul>
						</div><!-- end body -->
				</div><!-- end panel -->
			</div><!-- end actions -->
		</div><!-- end col md 3 -->

		<div class="col-md-9">			
			<table cellpadding="0" cellspacing="0" class="table table-striped">
				<tbody>
				<tr>
		<th><?php echo __('Id'); ?></th>
		<td>
			<?php echo h($contato['Contato']['id']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Grupo'); ?></th>
		<td>
			<?php echo $this->Html->link($contato['Grupo']['title'], array('controller' => 'grupos', 'action' => 'view', $contato['Grupo']['id'])); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Telefone'); ?></th>
		<td>
			<?php echo $this->Html->link($contato['Telefone']['title'], array('controller' => 'telefones', 'action' => 'view', $contato['Telefone']['id'])); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Genero'); ?></th>
		<td>
			<?php echo $this->Html->link($contato['Genero']['title'], array('controller' => 'generos', 'action' => 'view', $contato['Genero']['id'])); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Title'); ?></th>
		<td>
			<?php echo h($contato['Contato']['title']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Photo'); ?></th>
		<td>
			<?php echo h($contato['Contato']['photo']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Sobrenome'); ?></th>
		<td>
			<?php echo h($contato['Contato']['sobrenome']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Apelido'); ?></th>
		<td>
			<?php echo h($contato['Contato']['apelido']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Nascimento'); ?></th>
		<td>
			<?php echo h($contato['Contato']['nascimento']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Created'); ?></th>
		<td>
			<?php echo h($contato['Contato']['created']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Modified'); ?></th>
		<td>
			<?php echo h($contato['Contato']['modified']); ?>
			&nbsp;
		</td>
</tr>
				</tbody>
			</table>

		</div><!-- end col md 9 -->

	</div>
</div>

