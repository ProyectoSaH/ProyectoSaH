
<?php
$cakeDescription = __d('cake_dev', 'SAH');
?>
<!DOCTYPE html>
   
<html>
  <head>  
         <?php echo $this->Html->Script('jquery'); ?>
         <?php echo $this->Html->charset(); ?>
  
  <title>
           <?php
          if($this->Session->check('Auth.User')){
         
                echo $cakeDescription;
                echo " : ", $title_for_layout;
            

            }else{
            echo $cakeDescription;
            echo " : Inicio";
            }

            ?>
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





    <style>


    #fancy {
  width: 20px;
  margin: 20px auto;
  padding: 50px;
  border: solid blue 10px;
  -webkit-box-sizing: border-box;
     -moz-box-sizing: border-box;
          box-sizing: border-box;





}</style>
  
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
                        
                        <ul  class="nav nav-tabs">



                                 	<li class="<?php echo (!empty($this->params['action']) && ($this->params['action']=='index') )?'active' :'inactive' ?>">
							  <?php echo $this->Html->link('Ver Usuarios', array('controller'=>'users','action' => 'index'), array('title' => 'Ver Usuarios','class' => 'shortcut-dashboard'));?>
						</li>


       


						<li class="<?php echo (!empty($this->params['action']) && ($this->params['action']=='calendar') )?'active' :'inactive' ?>">
            <?php
              $user_id = $this->Session->read('Auth.User.id'); 
              $user_name = $this->Session->read('Auth.User.name'); 
              echo $this->Html->link('Calendario', array('controller' => 'citas', 'action' => 'calendar', '?' => array('id' => $user_id ,
                  'name' => $user_name)), array('title' => 'Calendario','class' => 'shortcut-dashboard')); 
            ?>
						</li>



						<li class="<?php echo (!empty($this->params['action']) && ($this->params['action']=='info') )?'active' :'inactive' ?>">
							  <?php echo $this->Html->link('Informes', array('controller'=>'users','action' => 'info'), array('title' => 'Informes','class' => 'shortcut-dashboard'));?>
						</li>




      <li class="<?php echo (!empty($this->params['action']) && ($this->params['action']=='historial') )?'active' :'inactive' ?>">
            <?php
              $user_id = $this->Session->read('Auth.User.id'); 
              $user_name = $this->Session->read('Auth.User.name'); 
              echo $this->Html->link('Historial', array('controller' => 'registros', 'action' => 'historial', '?' => array('id' => $user_id ,
                  'name' => $user_name)), array('title' => 'Historial','class' => 'shortcut-dashboard')); 
            ?>
            </li>

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
        <div>
        <?php }?>
              <?php echo $this->fetch('content'); 


              ?>
              </div>
          </div>
    </body>


</html>
