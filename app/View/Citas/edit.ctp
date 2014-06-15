<html>
  <script src="../js/jquery.js" type="text/javascript"></script> 
  <link rel="stylesheet" href="//code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css">
  
  <script src="../js/datepicker.js"></script>
  <script src="../js/jquery.Rut.js" type="text/javascript"></script>
  <link rel="stylesheet" href="/resources/demos/style.css">

  <link rel="stylesheet" type="text/css" href="../css/DateTimePicker.css" />
  <script type="text/javascript" src="jquery.min.js"></script>
  <script type="text/javascript" src="../js/DateTimePicker.js"></script>
 
  <script type="text/javascript">
      $(document).ready(function(){
            $("#dtBox").DateTimePicker({
            });
	});

</script>
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
<legend> &nbsp&nbsp&nbsp&nbsp Editar Cita &nbsp(<?php echo $calendar['Cita']['id'];?>) </legend>

<?php  echo $this->Form->create('Cita'); ?>
<form class="form-horizontal" role="form">
  <div class= "container-fluid">
      <div class="form-group">  
      <label for="inputUsername" class="col-sm-1 control-label ">Titulo:</label>
      <div class="col-sm-3">
        <?php echo $this->Form->input('title', array(
            'type' => 'readonly',
            'class' => 'form-control ',
            'label' => false,
            'value' => $calendar['Cita']['title']
       ));?>
      </div>
     <br></br>
    </div>
     <div class="form-group">  
      <label for="inputUsername" class="col-sm-1 control-label ">Hora Inicial:</label>
      <div class="col-sm-3">
        <?php echo $this->Form->input('start', array(
            'type' => 'readonly',
            'class' => 'form-control ',
            'label' => false,
            'data-field' => 'datetime',
            'value' => $calendar['Cita']['start']
            
          
       ));?>
      </div>
     <br></br>
    </div>
      <div class="form-group">  
      <label for="inputUsername" class="col-sm-1 control-label ">Hora Final:</label>
      <div class="col-sm-3">
        <?php echo $this->Form->input('end', array(
            'type' => 'readonly',
            'class' => 'form-control ',
            'label' => false,
            'data-field' => 'datetime',
            'value' => $calendar['Cita']['end']
            
          
       ));?>
      </div>
 
      <br></br><br>
    </div>
    <legend> &nbsp Editar Cliente </legend>
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
                    'value' => $cliente['Cliente']['name']
                )); ?>
      </div>
      <?php echo $this->Form->hidden('recorder', array('value' => $this->requestAction('/users/getUsername')));?>
      <div class="col-sm-3">
      <?php echo $this->Form->error('User.username', null, array('class' => 'error ')); ?>
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
                    'value' => $cliente['Cliente']['surname']
                )); ?>
      </div>
      <div class="col-sm-3">
      <?php echo $this->Form->error('User.username', null, array('class' => 'error ')); ?>
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
                    'value' => $cliente['Cliente']['rut']
                )); ?>
      </div>
      <div class="col-sm-3">
      <?php echo $this->Form->error('User.username', null, array('class' => 'error ')); ?>
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
                    'value' => $cliente['Cliente']['date_birth']
                )); ?>
      </div>
      <div class="col-sm-3">
      <?php echo $this->Form->error('User.username', null, array('class' => 'error ')); ?>
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
                    'value' => $cliente['Cliente']['address']
                )); ?>
      </div>
      <div class="col-sm-3">
      <?php echo $this->Form->error('User.username', null, array('class' => 'error ')); ?>
      </div>
      <br></br>
    </div>
      <?php echo $this->Form->end();?>
      <br>
    <div class="form-group">
        <label for="inputRole" class="col-lg-1"></label>
        <label for="inputRole" class="col-lg-0">&nbsp&nbsp&nbsp</label>
              <button type="submit" class="btn btn-primary " id="login">Enviar</button>
                <?php
                echo $this->Form->end();
                ?>
           </div>
      <br>
       <div class="form-group">
          <label class="col-sm-3 control-label"><?php echo '&nbsp',$this->Html->link('-> Regresar Al Calendario',array('controller' => 'citas', 'action' => 'calendar', '?' => array(
        'id' => $user['User']['id']))); ?></label>
          
          <br>
        </div>
  </div>
</form>	
 <div id="dtBox"></div>
 


