<html>
    <legend> &nbsp&nbsp&nbsp&nbsp Datos Personales - <?php echo ucfirst($user['User']['username'])?></legend>
    <div class= "container-fluid">
        <div class="form-group">
          <label class="col-sm-1 control-label">Nombre(s):</label>
          <label class="control-label "><?php echo ucfirst($user['User']['username']);?></label>
          <br>
        </div>
        <div class="form-group">
          <label class="col-sm-1 control-label">Apellido(s):</label>
          <label class=" control-label"> <?php echo ucfirst($user['User']['surname']);?></label>
          <br>
        </div>
        <div class="form-group">
          <label class="col-sm-1 control-label">Rut:</label>
          <label class=" control-label"> <?php echo $user['User']['rut'];?> </label>
          <br>
        </div>
        <div class="form-group">
          <label class="col-sm-1 control-label">Email:</label>
          <label class=" control-label"> <?php echo $user['User']['email'];?> </label>
          <br>
        </div>
        <div class="form-group">
          <label class="col-sm-1 control-label">Fecha Nacimiento:</label>
          <label class=" control-label"> <?php echo $user['User']['date_birth'];?> </label>
          <br><br>
        </div>
        <div class="form-group">
          <label class="col-sm-1 control-label">Rol:</label>
          <label class=" control-label"> <?php echo ucfirst($user['User']['role'])?> </label>
          <legend>&nbsp</legend>
        </div>
        
        <div class="form-group">
          <label class="col-sm-3 control-label"> - Usuario creado el : <?php echo $user['User']['created'];?> </label>
          <br>
        </div>
        <div class="form-group">
          <label class="col-sm-4 control-label"> - Ultima el modificación del Usuario : <?php echo $user['User']['modified'];?> </label>
        </div>
         <legend>&nbsp</legend>
        <div class="form-group">
          <label class="col-sm-4 control-label"><?php echo '&nbsp',$this->Html->link('-> Regresar a ver otros usuarios'
                  ,array('controller' => 'users', 'action' => 'index')); ?></label>
          
          <br>
        </div>
    </div>
 </html>   