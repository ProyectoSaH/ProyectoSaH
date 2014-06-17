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
     <p class="bg-success"><legend> &nbsp&nbsp&nbsp&nbsp Editar Cita &nbsp(<?php echo $calendar['Cita']['id'];?>) </legend></p>

    <?php  echo $this->Form->create('Cita'); ?>
 <?php echo $this->Form->hidden('id', array('value' => $_GET['id'])); ?>
    <form class="form-horizontal" role="form">
      <div class= "container-fluid">
          <div class="form-group">  
                <label for="inputUsername" class="col-sm-1 control-label ">Titulo:</label>
                <div class="col-sm-3">
                    <?php echo $this->Form->input('title', array(
                        'type' => 'readonly',
                        'class' => 'form-control ',
                        'label' => false,
                        'error' => false,
                   ));?>
                </div>
                <div class="col-sm-3">
                           <?php echo $this->Form->error('Cita.title', null, array('class' => 'error ')); ?>
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
                        'error' => false,
                  ));?>
                </div>
                <div class="col-sm-3">
                           <?php echo $this->Form->error('Cita.start', null, array('class' => 'error ')); ?>
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
                        'error' => false,
                  ));?>
                </div>
                <div class="col-sm-3">
                           <?php echo $this->Form->error('Cita.end', null, array('class' => 'error ')); ?>
                    </div>
               <br></br><br>
        </div>
     
        <div class="form-group">
            <label for="inputRole" class="col-lg-1"></label>
            <label for="inputRole" class="col-lg-0">&nbsp&nbsp&nbsp</label>
            <button type="submit" class="btn btn-primary " id="login">->Siguiente</button>
            <?php echo $this->Form->end();?>
        </div>
        <legend></legend>
        <div class="form-group">
             <label class="col-sm-3 control-label"><?php echo '&nbsp',$this->Html->link('-> Regresar Al Calendario',array('controller' => 'citas', 'action' => 'calendar', '?' => array(
             'id' => $user['User']['id']))); ?></label>
             <br>
        </div>
    </div>
  </form>	
 <div id="dtBox"></div>
</html>


