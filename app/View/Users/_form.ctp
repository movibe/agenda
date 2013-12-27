<div class="row">
  <div class="col-lg-4 col-lg-offset-4">
    <?php
    echo $this->Form->create
    (
      'User',
      array
      (
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
      <div class="form-group">
        <?php
        echo $this->Form->input('name',
          array(
            'placeholder' => __('Name'),
            'class' => 'form-control',
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
            'value' => !empty( $user['User']['username'] ) ? $user['User']['username'] : ''
          )
        );
        ?>
      </div>
     <div class="form-group">
      <?php
        echo $this->Form->input('photo',
          array(
            'placeholder' => __('Photo'),
            'class' => 'form-control',
            'type' => 'file',
            'value' => !empty( $user['User']['photo'] ) ? $user['User']['photo'] : ''
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
            'selected' => !empty( $user['User']['role'] ) ? $user['User']['role'] : ''
        ));
        ?>
      </div>
      <button type="submit" class="btn btn-warning btn-default"><?php echo __("Submit") ?></button>
    </form>


  </div>
</div>
