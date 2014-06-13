<!DOCTYPE html>
<html>
<head>
</head> 
<body>
    <?php $role = $this->requestAction('Users/getRole');?>
<h4>&nbsp Lista de Usuarios</h4>
<div class="panel panel-default">
  <table class="table">
    <thead>
        <tr>
            <th><?php echo $this->Form->checkbox('all', array('name' => 'CheckAll',  'id' => 'CheckAll')); ?></th>
            <th><?php echo $this->Paginator->sort('username', 'Nombre de usuario');?>  </th>
            <th><?php echo $this->Paginator->sort('email', 'Correo');?></th>
            <th><?php echo $this->Paginator->sort('created', 'Creado');?></th>
            <th><?php echo $this->Paginator->sort('modified','Modificado');?></th>
            <th><?php echo $this->Paginator->sort('role','Rol');?></th>
            <th><?php echo $this->Paginator->sort('horario','Horario');?></th>
           <?php if($role == 'admin'){ ?> <th>Acciones</th> <?php } ?>
        </tr>
    </thead>
    <tbody> 
         <?php if($role == 'admin'){ ?>
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
            <td><?php echo '&nbsp',$this->Html->link('Ver',array('controller' => 'citas', 'action' => 'calendar', '?' => array(
        'id' => $user['User']['id']))); ?></td>
            <td >
          <?php echo $this->Html->link(    "Edit",   array('action'=>'edit', $user['User']['id']) );?> | 
            <?php
                if( $user['User']['status'] != 0){ 
                    echo $this->Html->link(    "Delete", array('action'=>'delete', $user['User']['id']));}else{
                   // echo $this->Html->link(    "Re-Activate", array('action'=>'activate', $user['User']['id']));
                    }
            ?>
            </td>
        </tr>
        <?php endforeach; ?>
        <?php unset($user); ?>
        <?php } ?>
        
        
        <?php if($role != 'admin'){ ?>
        <?php $count=0; ?>
        <?php foreach($users as $user): ?>                
        <?php $count ++;?>
        <?php if($count % 2): echo '<tr>'; else: echo '<tr class="zebra">' ?>
        <?php endif; ?>
        <?php if($user['User']['role']!='admin'){?>
            <td><?php echo $this->Form->checkbox('User.id.'.$user['User']['id']); ?></td>
            <td><?php echo $this->Html->link( $user['User']['username']  ,   array('action'=>'edit', $user['User']['id']),array('escape' => false) );?></td>
            <td><?php echo $user['User']['email']; ?></td>
            <td><?php echo $user['User']['created']; ?></td>
            <td><?php echo $user['User']['modified']; ?></td>
            <td><?php echo $user['User']['role']; ?></td>
            <td><?php echo '&nbsp',$this->Html->link('Ver',array('controller' => 'citas', 'action' => 'calendar', '?' => array(
        'id' => $user['User']['id']))); ?></td>
        </tr>
        <?php } ?>
        <?php endforeach; ?>
        <?php unset($user); ?>
        <?php } ?>
    </tbody>
</div>  
</table>
    </div>
<?php echo $this->Paginator->numbers(array(   'class' => 'numbers'     ));?>          
<?php if($role =='admin') echo $this->Html->link("Añadir Usuario",   array('action'=>'add'),array('escape' => false) ); ?>
 
</body>
</html>
