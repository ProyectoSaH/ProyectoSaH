
<?php

$cakeDescription = __d('cake_dev', 'CakePHP: the rapid development php framework');
?>
<!DOCTYPE html>
<html>
<head>  
         <?php echo $this->Html->Script('jquery'); ?>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $cakeDescription ?>:
		<?php echo $title_for_layout; ?>
	</title>
	<?php
		echo $this->Html->meta('icon');
                echo $this->Html->css('cake.generic');
              
                echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
                echo $this->Html->css('bootstrap.min');
                echo $this->Html->Script('bootstrap.min');
?>
<?php echo $this->Form->end(); ?>
</head>
<body>
    <?php echo $this->Js->writeBuffer();?>
  <div id="container">
      <div id="content">
          <?php echo $this->Session->flash(); ?>    
         
 <?php if ($this->Session->read('Auth.User')){?>
             
         <nav class="navbar navbar-default" role="navigation">
        <div class="container-fluid">
          <div class="navbar-header">
              <?php echo $this->html->image('prueba_90x80.png', array('alt' => 'S.A.H'))?>
          </div>
          <div class="navbar-form navbar-left">
            <br>
              <ul class="nav nav-tabs">
                  <li><a href="http://localhost/cake/index">Inicio</a></li>
                  <li class="active"><a href="#">Perfil</a></li>
                  <li><a href="#">Mensajes</a></li>
              </ul>
          </div>
         
        <div class="form-inline navbar-right navbar-form" >
          <br>
            <li> <span class="glyphicon glyphicon-user"> </span>
             <?php echo '&nbsp Bienvenido, ',ucfirst($user_name = $this->requestAction('/users/getUsername'));?> <br>
           <?php echo $this->Html->link( "Cerrar Sesion",array('controller' => 'users', 'action' => 'logout') ); ?>
            </li>
          </div> 
        </div>
    </div>       
  </nav>
                  
          <?php }?>
          <?php echo $this->fetch('content'); ?>
      </div>
  </div>
  
</body>
</html>
