
<?php

$cakeDescription = __d('cake_dev', 'SAH');
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
        <link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.1.0/pure-min.css" />
    </head>
    <body>
        <?php echo $this->Js->writeBuffer();?>
                <?php echo $this->Session->flash(); ?>    
                <?php if ($this->Session->read('Auth.User')){?>
             <nav class="navbar navbar-default" role="navigation">
                <div class="container-fluid">
                    <div class="navbar-header">
                    <p><?php echo $this->html->image('prueba_90x80.png', array('alt' => 'S.A.H'))?>
                    </div>
                    <div class="navbar-form navbar-left">
                        
                        <ul class="nav nav-tabs">
                        <li><a href="http://localhost/cake/index">Ver Otros Usuarios</a></li>
                        <li class="active"><a href="#">Perfil</a></li>
                        <li><a href="#">Generar Informe</a></li>
                        </ul>
                    </div>
                    <div class=" navbar-right " >
                        <br></br>
                        <span class="glyphicon glyphicon-user"> </span>
                        <?php echo '&nbsp Bienvenido, ',ucfirst($user_name = $this->requestAction('/users/getUsername'));?> 
                        <br>
                        <?php echo $this->Html->link( "Cerrar Sesion",array('controller' => 'users', 'action' => 'logout') ); ?>
                    </div> 
                </div>      
        </nav>
        <?php }?>
              <?php echo $this->fetch('content'); ?>
          </div>
    </body>
</html>
