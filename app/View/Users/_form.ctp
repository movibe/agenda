<div class="row">
  <div class="col-lg-4 col-lg-offset-4">
    <?php
    echo $this->Form->create
    (
      'User',
      array
      (
        'type' => 'file',
        'class'     => '',
        'inputDefaults' => array
        (
          'error' => false
        )
      )
    );
    ?>
    <div class="center">
      <h2><?php echo $label ?></h2>
    </div>

    <hr>
      <!-- Upload -->
      <div class="form-group">
        <?php
        //echo $this->Form->file('photo', array(
         // 'label'=> 'Foto'));
        ?>
        <?php echo Configure::read('Gerenciador.photo_thumbnail_size.0') ?>
        <input name="multipleFiles[]" id="filesToUpload" type="file" multiple="" />
      </div>

      <div class="form-group">
        <?php
        echo $this->Form->input('name',
          array(
            'placeholder' => __('Nome'),
            'class' => 'form-control',
            'label' => 'Nome',
            'value' => !empty( $user['User']['name'] ) ? $user['User']['name'] : ''
          )
        );
        ?>
      </div>
     <div class<div class="form-group">
        <?php
        echo $this->Form->input('username',
          array(
            'placeholder' => __('Username'),
            'class' => 'form-control',
            'label' => 'Login',
            'value' => !empty( $user['User']['username'] ) ? $user['User']['username'] : ''
          )
        );
        ?>
      </div>
     
      <div class="form-group">
        <?php
        echo $this->Form->input('email',
          array(
            'type' => 'email',
            'class' => 'form-control',
            'placeholder' => __('Email'),
            'label' => 'E-mail',
            'required' => 'required',
            'value' => !empty( $user['User']['email'] ) ? $user['User']['email'] : ''
          )
        );
        ?>
      </div>
      <div class="form-group">
        <?php
        echo $this->Form->input('password',
          array(
            'type' => 'password',
            'class' => 'form-control',
            'placeholder' => __('Password'),
            'label' => 'Senha',
            'value' => false
          )
        );
        ?>
      </div>
      <div class="form-group">
        <?php
        echo $this->Form->input('role', array(
            'options' => array('admin' => __('Admin'), 'author' => __('Author') , 'client' => __('Cliente')),
            'class' => 'form-control',
            'label' => 'Grupo',
            'selected' => !empty( $user['User']['role'] ) ? $user['User']['role'] : ''
        ));
        ?>
      </div>
      <button type="submit" class="btn btn-warning btn-default"><?php echo __("Submit") ?></button>
    </form>


  </div>
</div>
