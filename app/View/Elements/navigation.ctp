<?php if( AuthComponent::user('role') == 'admin' ) { ?>

  <div class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <?php echo $this->Html->link(
          Configure::read('Application.name') ,
          AuthComponent::user('id') ? "/home" : "/"
          ,array('class' => 'navbar-brand')) ?>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <?php if( AuthComponent::user('id') ) { ?>
            <li class="<?php echo $this->params->controller == 'pages' && $this->action == 'index' ? 'active' : '';  ?>">
              <?php echo $this->Html->link('Home','/home') ?>
            </li>
            <?php } ?>


            <?php if( AuthComponent::user('role') == 'admin' ) { ?>
            <li class="<?php echo $this->params->controller == 'contatos' ? 'active' : '';  ?>">
              <?php echo $this->Html->link('Contatos','/contatos') ?>
            </li>
            <?php } ?>
          </ul>

          <?php if (AuthComponent::user('id')): ?>
          <ul class="nav navbar-nav navbar-right">
            <li id="fat-menu" class="dropdown">
              <a href="#" id="drop3" role="button" class="dropdown-toggle" data-toggle="dropdown">
                <i class="glyphicon glyphicon-user"></i>
                <?php echo AuthComponent::user('username') ?> <b class="caret"></b>
              </a>
              <ul class="dropdown-menu" role="menu" aria-labelledby="drop3">
                <li>
                  <?php echo $this->Html->link('<i class="glyphicon glyphicon-user"></i> Usuários','/users',array('tabindex' => '-1','escape' => false)) ?>
                </li>

                <li>
                  <?php echo $this->Html->link('<i class="glyphicon glyphicon-off"></i> Logout','/users/logout',array('tabindex' => '-1','escape' => false)) ?>
                </li>
              </ul>
            </li>
          </ul>
          <?php endif; ?>
        </div><!--/.nav-collapse -->
      </div>
    </div>
<?php } ?>

