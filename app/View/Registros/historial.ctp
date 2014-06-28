<html>
    <head>
         
    </head>
    <body>
     <p class="bg-info"> <legend> &nbsp Historial de Citas</legend> </p>
    
    <div class="panel panel-default">
       <table>
  
            <tr>
              <th>ID USER</th>
              <th>ID_CITA</th>
              <th>DATE_CREATED</th>
              <th>RUT</th>
              
    </tr>

<?php
$user_id = $this->Session->read('Auth.User.id'); 

?>
<?php   foreach($Registros as $Registros): ?>
   <?php if($user_id == $Registros['Registro']['id_users']){ ?>
  <tr>
   
 <td><?php echo $Registros['Registro']['id_users'];?></td>
 <td><?php echo $Registros['Registro']['id_citas'];?></td>
 <td><?php echo $Registros['Registro']['date_created'];?></td>
 <td><?php echo $Registros['Registro']['rut'];?></td>
  </tr>
<?php }?>
<?php endforeach;?>



</table>

  
    </div>






    
  </body>
</html>