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
          <p class="bg-info"><legend> &nbsp Editar Cliente  (<?php 
            

            $registro = new Registro();
            $registros = $registro->findById_citas($clientes['Cliente']['id_citas']);
            $user = new User();
            $users = $user->findById($registros['Registro']['id_users']);
            

            echo $clientes['Cliente']['id'];?>)</legend> </p>
        <br>
        <?php  echo $this->Form->create('Cliente'); ?>
        <?php echo $this->Form->hidden('id', array('value' => $_GET['id'])); ?>
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
        <br>
        <div class="form-group">
            <label for="inputRole" class="col-lg-1"></label>
            <label for="inputRole" class="col-lg-0">&nbsp&nbsp&nbsp</label>
            <button type="submit" class="btn btn-primary " id="login">Confirmar</button>


            <?php echo $this->Form->end();?>
        </div>
        <legend></legend>
        <div class="form-group">
             <label class="col-sm-3 control-label">

            
             <?php 
echo '&nbsp', $this->Html->image('volver.jpg', array('height'=>'25' , 'width' => '25','url' => array('controller' => 'citas', 'action' => 'calendar', '?'=> array('id'=>  $registros['Registro']['id_users'] ))) ,array('escape' => false)).$this->Html->link("   Regresar al Calendario",   array('controller' => 'citas', 'action' => 'calendar', '?'=> array('id'=>  $users['User']['id'] ))); 


             ?>
<br>
<br>
             </label>
            <br>
        </div>
    </div>
  </form>	
 <div id="dtBox"></div>
</html>


