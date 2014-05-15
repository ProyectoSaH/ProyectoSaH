<!DOCTYPE html>
<html>
<head>
</head> 
<body>
    
    <nav class="navbar navbar-default" role="navigation">
        <div class="container-fluid">
          <div class="navbar-header">
              <?php echo $this->html->image('prueba_90x80.png', array('alt' => 'S.A.H'))?>
          </div>
          <div class="navbar-form navbar-left"   >
            <br>
              <ul class="nav nav-tabs">
                  <li><a href="#">Inicio</a></li>
                  <li class="active"><a href="#">Perfil</a></li>
                  <li><a href="#">Mensajes</a></li>
              </ul>
          </div>
          <br>
        <div class="form-inline navbar-right navbar-form" >
               <li> <span class="glyphicon glyphicon-user"> </span>
          <?php echo '&nbsp Bienvenido, ',ucfirst($this->requestAction('/users/getUsername'));?> <br>
           <?php echo $this->Html->link( "Cerrar Sesión",   array('action'=>'logout') ); ?>
            </li>
        </div> 
        </div>
    </div>    

  </nav>
<h4>&nbsp Lista de Usuarios</h4>
<div class="panel panel-default">
  <table class="table">
    <thead>
        <tr>
            <th><?php echo $this->Form->checkbox('all', array('name' => 'CheckAll',  'id' => 'CheckAll')); ?></th>
            <th><?php echo $this->Paginator->sort('username', 'Username');?>  </th>
            <th><?php echo $this->Paginator->sort('email', 'E-Mail');?></th>
            <th><?php echo $this->Paginator->sort('created', 'Creado');?></th>
            <th><?php echo $this->Paginator->sort('modified','Last Update');?></th>
            <th><?php echo $this->Paginator->sort('role','Role');?></th>
            <th><?php echo $this->Paginator->sort('status','Status');?></th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody> 
        <?php $count=0; ?>
        <?php foreach($users as $user): ?>                
        <?php $count ++;?>
        <?php if($count % 2): echo '<tr>'; else: echo '<tr class="zebra">' ?>
        <?php endif; ?>
            <td><?php echo $this->Form->checkbox('User.id.'.$user['User']['id']); ?></td>
            <td><?php echo $this->Html->link( $user['User']['username']  ,   array('action'=>'edit', $user['User']['id']),array('escape' => false) );?></td>
            <td><?php echo $user['User']['email']; ?></td>
            <td><?php echo $user['User']['created']; ?></td>
            <td><?php echo $user['User']['modified']; ?></td>
            <td><?php echo $user['User']['role']; ?></td>
            <td><?php echo $user['User']['status']; ?></td>
            <td >
            <?php echo $this->Html->link(    "Edit",   array('action'=>'edit', $user['User']['id']) ); ?> | 
            <?php
                if( $user['User']['status'] != 0){ 
                    echo $this->Html->link(    "Delete", array('action'=>'delete', $user['User']['id']));}else{
                    echo $this->Html->link(    "Re-Activate", array('action'=>'activate', $user['User']['id']));
                    }
            ?>
            </td>
        </tr>
        <?php endforeach; ?>
        <?php unset($user); ?>
    </tbody>
</div>  
</table>
    </div>
<?php echo $this->Paginator->numbers(array(   'class' => 'numbers'     ));?>          
<?php echo $this->Html->link("Añadir Usuario",   array('action'=>'add'),array('escape' => false) ); ?>
 
</body>
</html>
