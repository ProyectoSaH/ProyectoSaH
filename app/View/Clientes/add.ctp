<html>
    <head>
      <meta charset="utf-8">
      <script src="../js/jquery.js" type="text/javascript"></script> 
      <link rel="stylesheet" href="//code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css">
      <script src="../js/datepicker.js"></script>
      <script src="../js/jquery.Rut.js" type="text/javascript"></script>
      <link rel="stylesheet" href="/resources/demos/style.css">
      <script>
      $(function() {
        $( "#date_birth" ).datepicker({
          changeMonth: true,
          changeYear: true,
          defaultDate: "1/1/1996"
        });
      });

      </script>
      <script type="text/javascript">
           $(document).ready(function(){
             $('#rut').Rut({
              format_on: 'keyup',
              on_error: function(){ alert('El valor ingresado no corresponde a un R.U.T válido.'); }
             });
           })
      </script>
    </head>
    <body>
        <p class="bg-success"><legend> &nbsp&nbsp&nbsp&nbsp Registrar Cita </legend></p>
      <?php  echo $this->Form->create('Cita'); ?>
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
                    <?php echo $this->Form->error('Cita.title', null, array('class' => 'error ')); ?>
                </div>
                <br></br>
           </div>
           <div class="form-group">
                <label for="inputEmail" class="col-sm-1 control-label">Registrador:</label>
                <label for="inputUsername" class="col-sm-1 control-label ">&nbsp<?php echo ucfirst($this->requestAction('/users/getUsername'));?></label>
                <?php echo $this->Form->hidden('recorder', array('value' => $this->requestAction('/users/getUsername')));?>
                <br>
           </div>
           <div class="form-group">
                <label for="inputEmail" class="col-sm-1 control-label">Encargado:</label>
                <label for="inputUsername" class="col-sm-1 control-label ">&nbsp<?php echo ucfirst($user['User']['username']);?></label>
                <br>
          </div>
          <div class="form-group">
                <label for="inputEmail" class="col-sm-1 control-label">Hora&nbspCita:</label>
                <label for="inputEmdail" class="col-sm-2 control-label"><?php echo $_GET['horainicial'].' - '.$_GET['horafinal']?></label> 
                <?php if($_GET['horainicial'] == $_GET['horafinal']){?>
                <label for="inputEmdail" class="col-sm-2 control-label"><?php echo $_GET['horainicial'].' - 23:59'?></label>
                <?php echo $this->Form->hidden('start', array('value' =>  $_GET['fecha'].' 00:00'));?>
                <?php echo $this->Form->hidden('end', array('value' =>  $_GET['fecha'].' 23:59')); } else{?>
                <?php echo $this->Form->hidden('start', array('value' =>  $_GET['fecha'].' '.$_GET['horainicial']));?>
                <?php echo $this->Form->hidden('end', array('value' =>  $_GET['fecha'].' '.$_GET['horafinal']));}?>
                <?php echo $this->Form->hidden('id_user', array('value' =>  $_GET['id']));?>
                <br>
          </div>
          <div class="form-group">
                <label for="inputPassword" class="col-sm-1 control-label">Fecha:</label>
                <label for="inputEmdail" class="col-sm-2 control-label"><?php echo $_GET['fecha']?></label>
                <br></br>
          </div>
            <p class="bg-info"> <legend> &nbsp Registrar Datos Del Cliente </legend></p>
          <br>
          <?php  echo $this->Form->create('Cliente'); ?>
          <div class="form-group">  
                <label for="inputUsername" class="col-sm-1 control-label ">Nombre(s):</label>
                <div class="col-sm-2">
                     <?php  echo $this->Form->input('name',array(
                                      'type' => 'alphanumeric',
                                      'class' => 'form-control',
                                      'label' => false,
                                      'error' => false,    
                                  )); ?>
                </div>
                <div class="col-sm-3">
                     <?php echo $this->Form->error('Cliente.name', null, array('class' => 'error ')); ?>
                </div>
                <br></br>
          </div>
          <div class="form-group">  
                <label for="inputUsername" class="col-sm-1 control-label ">Apellido(s):</label>
                <div class="col-sm-2">
                    <?php  echo $this->Form->input('surname',array(
                                'type' => 'alphanumeric',
                                'class' => 'form-control',
                                'label' => false,
                                'error' => false,    
                            )); ?>
                </div>
                <div class="col-sm-3">
                    <?php echo $this->Form->error('Cliente.surname', null, array('class' => 'error ')); ?>
                </div>
                <br></br>
          </div>
          <div class="form-group">  
                <label for="inputUsername" class="col-sm-1 control-label ">Rut:</label>
                <div class="col-sm-2">
                    <?php  echo $this->Form->input('rut',array(
                              'type' => 'alphanumeric',
                              'class' => 'form-control',
                              'id'=> 'rut',
                              'label' => false,
                              'error' => false,    
                          )); ?>
                </div>
                <div class="col-sm-3">
                    <?php echo $this->Form->error('Cliente.rut', null, array('class' => 'error ')); ?>
                </div>
                <br></br>
          </div>
          <div class="form-group">  
                <label for="inputUsername" class="col-sm-1 control-label ">Fecha Nacimiento:</label>
                <div class="col-sm-2">
                    <?php  echo $this->Form->input('date_birth',array(
                              'type' => 'alphanumeric',
                              'id' => 'date_birth',
                              'class' => 'form-control',
                              'label' => false,
                              'error' => false,    
                          )); ?>
                </div>
                <div class="col-sm-3">
                     <?php echo $this->Form->error('Cliente.date_birth', null, array('class' => 'error ')); ?>
                </div>
                <br></br>
          </div>
          <div class="form-group">  
                <label for="inputUsername" class="col-sm-1 control-label ">Dirección:</label>
                <div class="col-sm-2">
                    <?php  echo $this->Form->input('address',array(
                              'type' => 'alphanumeric',
                              'class' => 'form-control',
                              'label' => false,
                              'error' => false,    
                          )); ?>
                </div>
                <div class="col-sm-3">
                    <?php echo $this->Form->error('Cliente.address', null, array('class' => 'error ')); ?>
                </div>
                <br></br>
          </div>
          <?php echo $this->Form->end();?>
          <br>
          <div class="form-group">
                <label for="inputRole" class="col-lg-1"></label>
                <label for="inputRole" class="col-lg-0">&nbsp&nbsp&nbsp</label>
                <button type="submit" class="btn btn-primary " id="login">Enviar</button>
                <?php echo $this->Form->end();?>
          </div>
          <div class="form-group">
          <label class="col-sm-3 control-label"><?php echo '&nbsp',$this->Html->link('-> Regresar Al Calendario',array('controller' => 'citas', 'action' => 'calendar', '?' => array(
          'id' => $user['User']['id']))); ?></label>
          <br>
        </div>
        </div>       
    </form>
      
</html>
