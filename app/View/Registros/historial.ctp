<html>
    <head>         
    </head>
    <body>
        <p class="bg-info"> <legend> &nbsp Historial de Citas</legend> </p>
        <div class="panel panel-default">
       <table>

            <tr>

              <th>Titulo de Cita</th>
              <th>Fecha Registro</th>
               <th>Registrada Por</th>
                <th>Fecha Comienzo</th>
                 <th>Fecha Termino</th>
               <th>Duración</th>
             
            </tr>
        <?php
        $user_id = $this->Session->read('Auth.User.id'); 
        ?>
                  
        <?php   foreach($Registros as $Registros): ?>
           <?php if($user_id == $Registros['Registro']['id_users']){ ?>
          <tr>


         

            <?php
  
                $id_ci = $Registros['Registro']['id_citas']; 
            ?>
      


            <td>




<?php
App::import('Model', 'Cita');
$cita = new Cita();

$citas = $cita->findById($id_ci);
echo $citas['Cita']['title'];

?>



 </td>
 <td><?php echo $Registros['Registro']['date_created'];?></td>  


            <td>

       
<?php
$citas = $cita->findById($id_ci);
echo $citas['Cita']['recorder'];

?>


        

            </td>






 <td><?php $citas = $cita->findById($id_ci);
echo $citas['Cita']['start'];
?>
</td>      


 <td><?php $citas = $cita->findById($id_ci);
echo $citas['Cita']['end'];
?>
</td>  

   <td>
 
<?php
$workingHours = (strtotime($citas['Cita']['end']) - strtotime($citas['Cita']['start']));
echo gmdate("H:i:s", $workingHours);
?>
            </td>
















         </tr>

        <?php }?>
        <?php endforeach;?>

 
      </table>
          </div>
      </body>
</html>