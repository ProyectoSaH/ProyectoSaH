<html>
<head>
    
</head>
<body>
  <legend> &nbsp Registrar Cita </legend>
<?php  echo $this->Form->create('Calendar'); ?>
<form class="form-horizontal" role="form">
  <div class= "container-fluid">
    <div class="form-group">
      <label for="inputUsername" class="col-sm-1 control-label ">Titulo:</label>
      <div class="col-sm-2">
        <?php  echo $this->Form->input('title',array(
                    'type' => 'alphanumeric',
                    'value' => $_GET['title'],
                    'class' => 'form-control',
                    'label' => false,
                    'error' => false,    
                )); ?>
      </div>
      <div class="col-sm-3">
      <?php echo $this->Form->error('User.username', null, array('class' => 'error ')); ?>
      </div>
      <br></br>
    </div>
   
    <div class="form-group">
      <label for="inputEmail" class="col-sm-1 control-label">Hora&nbspCita:</label>
      
           <?php if($_GET['horainicial'] == $_GET['horafinal']){?>
      <label for="inputEmdail" class="col-sm-2 control-label"><?php echo $_GET['horainicial'].' - 23:59:59'?></label>

           <?php echo $this->Form->hidden('start', array('value' =>  $_GET['fecha'].' 00:00:00'));?>
           <?php echo $this->Form->hidden('end', array('value' =>  $_GET['fecha'].' 23:59:59')); } else{?>
                 <label for="inputEmdail" class="col-sm-2 control-label"><?php echo $_GET['horainicial'].' - '.$_GET['horafinal']?></label>
           <?php echo $this->Form->hidden('start', array('value' =>  $_GET['fecha'].' '.$_GET['horainicial']));?>
           <?php echo $this->Form->hidden('end', array('value' =>  $_GET['fecha'].' '.$_GET['horafinal']));}?>
           <?php echo $this->Form->hidden('id_user', array('value' =>  $_GET['id']));?>

      <div class="col-sm-2">
      <p>
        <?php echo $this->Form->error('User.email', null, array('class' => 'error ')); ?>
      </div>
      <br></br>
    </div>
    <div class="form-group">
      <label for="inputPassword" class="col-sm-1 control-label">&nbspFecha:</label>
      <label for="inputEmdail" class="col-sm-2 control-label"><?php echo $_GET['fecha']?></label>
       <br></br>
    </div>
      <legend> &nbsp Registrar Datos de Cliente </legend>
    <div class="form-group">
        <label for="inputRole" class="col-sm-1 control-label">&nbsp</label>
              <button type="submit" class="btn btn-primary " id="login">Enviar</button>
                <?php
                echo $this->Form->end();
                ?>
           </div> 
    </div>       
</form>
  <?php echo $this->Html->link("Return Index",   array('controller' => 'Users','action'=>'index'),array('escape' => false) ); ?>
</div>

 </div>
</body>
</html>
