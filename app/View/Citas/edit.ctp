
<link rel="stylesheet" type="text/css" href="../css/DateTimePicker.css" />
<script type="text/javascript" src="jquery.min.js"></script>
 <script type="text/javascript" src="../js/DateTimePicker.js"></script>
 
<legend> &nbsp Editar Cita &nbsp(<?php echo $calendar['Cita']['id'];?>) </legend>

<?php  echo $this->Form->create('Cita'); ?>
<form class="form-horizontal" role="form">
  <div class= "container-fluid">
       <div class="form-group">  
           <h4> <label for="inputUsername" class="col-sm-1 control-label ">Encargado:</label>
               <label for="inputUsername" class="col-sm-1 control-label ">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<?php echo ucfirst($user['User']['username']);?></label> </h4>

     <br></br>
    </div>
      <div class="form-group">  
      <label for="inputUsername" class="col-sm-1 control-label ">Titulo:</label>
      <div class="col-sm-3">
        <?php echo $this->Form->input('role', array(
            'type' => 'readonly',
            'class' => 'form-control ',
            'label' => false,
            'data-field' => 'datetime',
            'value' => $calendar['Cita']['title']
            
          
       ));?>
      </div>
     <br></br>
    </div>
     <div class="form-group">  
      <label for="inputUsername" class="col-sm-1 control-label ">Hora Inicial:</label>
      <div class="col-sm-3">
        <?php echo $this->Form->input('role', array(
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
        <?php echo $this->Form->input('role', array(
            'type' => 'readonly',
            'class' => 'form-control ',
            'label' => false,
            'data-field' => 'datetime',
            'value' => $calendar['Cita']['end']
            
          
       ));?>
      </div>
 
      <br></br><br>
    </div>
      <div class="form-group">
        <label for="inputRole" class="col-sm-2 control-label">&nbsp&nbsp</label>
              <button type="submit" class="btn btn-primary " id="login">Enviar</button>
                <?php
                echo $this->Form->end();
                ?>
           </div> 

  </div>
</form>	
 <div id="dtBox"></div>
 
 
 
		<script type="text/javascript">

			$(document).ready(function()
			{
				$("#dtBox").DateTimePicker({

					
				

				});
			});

		</script>
 

