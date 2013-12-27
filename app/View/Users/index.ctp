<div class="row">
          <div class="col-lg-12">
            <div class="bs-example">
              <div class="jumbotron">
                <h1>Usuários</h1>
                <p>Sistema em Cake de Cadastro de Usuários.</p>
                <!-- <p><a class="btn btn-primary btn-lg">Learn more</a></p> -->
              </div>
            </div>
          </div>
        </div>


<div class="row">
  <div class="col-lg-10"><h3><?php echo __('Users')?></h3></div>
  <div class="col-lg-2">
    <?php echo $this->Html->link( '<i class="glyphicon glyphicon-plus"></i> ' .__('Add User'),'/users/add',array('class' => 'btn btn-success pull-right','style' => 'margin-top: 15px' , 'tabindex' => '-1','escape' => false )) ?>
  </div>
</div>

<div class="row">

	<div class="col-12">
		<?php echo $this->Session->flash() ?>

    <hr>
    <table class="table table-striped table-bordered dataTable">
      <thead>
        <tr>
          <th>#</th>
          <th><?php echo __('Photo') ?></th>
          <th><?php echo __('Username') ?></th>
          <th><?php echo __('Role') ?></th>
          <th><?php echo __('View') ?></th>
          <th><?php echo __('Edit') ?></th>
          <th><?php echo __('Delete') ?></th>
        </tr>
      </thead>
      <tbody>
        <?php foreach( $users as $user ){ ?>
        <tr>
          <td width="50px"><?php echo $user['User']['id'] ?></td>
          <td><?php echo $user['User']['photo'] ?></td>
          <td><?php echo $user['User']['username'] ?></td>
          <td><?php echo $user['User']['role'] ?></td>
          
          <td width="50px">
            <?php echo $this->Html->link('<i class="glyphicon glyphicon-search"></i> ' . __('View'),'/users/view/'.$user['User']['username'], array('class' => 'btn btn-info', 
                    'tabindex' => '-1',
                    'escape' => false ) ) ?>
          </td>
          <td width="50px">
             <?php echo $this->Html->link('<i class="glyphicon glyphicon-edit"></i> ' . __('Edit'),'/users/edit/'.$user['User']['id'] , array('class' => 'btn btn-warning', 
                    'tabindex' => '-1',
                    'escape' => false ) ) ?>
            
          </td>
          <td width="50px"><?php echo $this->Html->link(
              '<i class="glyphicon glyphicon-trash"></i> ' .__('Delete'),
              '#UsersModal',
              array(
                'class' => 'btn-remove-modal btn btn-danger',
                'data-toggle' => 'modal',
                'role'  => 'button',
                'data-uid' => $user['User']['id'],
                'data-uname' => $user['User']['username'], 
                    'tabindex' => '-1',
                    'escape' => false 
              ));
            ?></td>
        </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>
</div>

<div class="modal fade" id="UsersModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 id="myModalLabel"><?php echo __('Remove user') ?></h4>
      </div>
      <div class="modal-body">
        <p><?php echo __('Are you sure you want to delete the user ') ?><span class="label-uname strong"></span> ?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo __('Cancel') ?></button>
        <?php echo $this->Html->link(__('Delete'),'/users/delete/#{uid}',array('class' => 'btn btn-danger delete-user-link')) ?>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
