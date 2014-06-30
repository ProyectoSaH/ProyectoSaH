<!DOCTYPE html>
<html>
<head>		
</head> 
<body>
    <?php $role = $this->requestAction('Users/getRole');?>
    <p class="bg-success"><legend>&nbsp Lista de Usuarios</legend></p>
<div class="panel panel-default">
  <table class="table">
    <thead>
        <tr>
            <!--th><?php echo $this->Paginator->sort('N°');?>  </th-->
            <th><?php echo $this->Paginator->sort('username', 'Nombre de usuario');?>  </th>
            <th><?php echo $this->Paginator->sort('email', 'Correo');?></th>
            <th><?php echo $this->Paginator->sort('created', 'Creado');?></th>
            <th><?php echo $this->Paginator->sort('modified','Modificado');?></th>
            <th><?php echo $this->Paginator->sort('role','Rol');?></th>
            <th><?php echo $this->Paginator->sort('horario','Calendario');?></th>
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
            <!--td><b><?php echo $count; ?></b></td-->
            <td><?php echo $this->Html->link( ucfirst($user['User']['username'])  ,   array('action'=>'view', $user['User']['id']),array('escape' => false) );?></td>
            <td><?php echo ucfirst($user['User']['email']); ?></td>
            <td><?php echo $user['User']['created']; ?></td>
            <td><?php echo $user['User']['modified']; ?></td>
            <td><?php echo ucfirst($user['User']['role']); ?></td>
            <td><?php echo '&nbsp',$this->Html->image('calendar_icon.png',array("alt" => "ver_calendar", 'height'=>'25' , 'width' => '25','url' => array('controller' => 'citas', 'action' => 'calendar', '?' => array(
        'id' => $user['User']['id'])))); ?></td>
            <td >
          <?php echo $this->Html->image('editar.png', array("alt" => "editar", 'height'=>'25' , 'width' => '25','url' => array('controller' => 'users', 'action' =>'edit', $user['User']['id']) ));?> | 
            <?php
                if( $user['User']['status'] != 0){ 

                  echo $this->Html->image('delete.png', array("alt" => "delete", 'height'=>'25' , 'width' => '25','url' => array('controller' => 'users', 'action' => 'delete',$user['User']['id'] )));}else{
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
            <!--td><b><?php echo $count-1; ?></b></td-->
            <td><b><?php echo ucfirst($user['User']['username']);?></b></td>
            <td><?php echo ucfirst($user['User']['email']); ?></td>
            <td><?php echo $user['User']['created']; ?></td>
            <td><?php echo $user['User']['modified']; ?></td>
            <td><?php echo ucfirst($user['User']['role']); ?></td>
            <td><?php echo '&nbsp',$this->Html->image('calendar_icon.png',array("alt" => "ver_calendar", 'height'=>'25' , 'width' => '25','url' => array('controller' => 'citas', 'action' => 'calendar', '?' => array(
        'id' => $user['User']['id'])))); ?></td>
        </tr>
        <?php } ?>
        <?php endforeach; ?>
        <?php unset($user); ?>
        <?php } ?>


<tr>

<td><?php echo $this->Paginator->numbers(array(   'class' => 'numbers'     ));
 echo "<br><br>  ";
 if($role =='admin') echo $this->Html->image('agregar.png', array('height'=>'25' , 'width' => '25','url' => array('controller' => 'users', 'action' => 'add')),array('escape' => false)).$this->Html->link("Añadir Empleado",   array('action'=>'add'),array('escape' => false) );

    //echo $this->Html->link("Añadir Usuario",   array('action'=>'add'),array('escape' => false) ); ?>

</td>

<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td>
            

</td>


</tr>





    </tbody>
</div>  
</table>
    </div>



 
</body>
</html>
