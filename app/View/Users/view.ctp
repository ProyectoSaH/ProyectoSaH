<html>
    <p class="bg-success"><legend> &nbsp&nbsp&nbsp&nbsp Datos Personales - <?php echo ucfirst($user['User']['username'])?></legend></p>
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
          <p class="bg-success">  <legend>&nbsp</legend> </p>
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
          <label class="col-sm-4 control-label"><?php echo '&nbsp', $this->Html->image('volver.jpg', array('height'=>'25' , 'width' => '25','url' => array('controller' => 'users', 'action' => 'index')),array('escape' => false)).$this->Html->link("   Regresar",   array('controller' => 'users', 'action'=>'index'),array('escape' => false) );
             echo "<br><br>";?></label>
          
          <br>
        </div>
    </div>
 </html>   