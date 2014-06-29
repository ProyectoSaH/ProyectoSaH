<html>
    <head>
        <meta charset="utf-8">
        <script src="../../js/jquery.js" type="text/javascript"></script> 
        <link rel="stylesheet" href="//code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css">
        <script src="../../js/datepicker.js"></script>
        <script src="../../js/jquery.Rut.js" type="text/javascript"></script>
        <link rel="stylesheet" href="/resources/demos/style.css">
        <script>
        $(function() {
          $( "#date_birth" ).datepicker({
            changeMonth: true,
            changeYear: true,
            defaultDate: "1-1-2000"
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
        <p class="bg-info"> <legend> &nbsp Cambiar Contraseña </legend> </p>
        <?php  echo $this->Form->create('User'); ?>
        <?php echo $this->Form->hidden('id', array('value' => $this->data['User']['id'])); ?>
        <?php echo $this->Form->hidden('username', array('value' => $this->data['User']['username'])); ?>
        <?php echo $this->Form->hidden('name', array('value' => $this->data['User']['name'])); ?>
        <?php echo $this->Form->hidden('surname', array('value' => $this->data['User']['surname'])); ?>
        <?php echo $this->Form->hidden('rut', array('value' => $this->data['User']['rut'])); ?>
        <?php echo $this->Form->hidden('date_birth', array('value' => $this->data['User']['date_birth'])); ?>
        <?php echo $this->Form->hidden('role', array('value' => $this->data['User']['role'])); ?>
        <?php echo $this->Form->hidden('email', array('value' => $this->data['User']['email'])); ?>
<form class="form-horizontal" role="form">
            <div class= "container-fluid">
                <div class="form-group">
                <label for="inputPassword" class="col-sm-1 control-label">Contraseña Anterior</label>
                <div class="col-sm-3">
                    <?php  echo $this->Form->input('new_password',array(
                              'type' => 'password',
                              'placeholder' => 'Contraseña Anterior',
                              'class' => 'form-control',
                              'label' => false,
                              'error' => false,
                          )); ?>
                </div>
                <div class="col-sm-3">
                     <?php echo $this->Form->error('User.new_password', null, array('class' => 'error ')); ?>
                </div>
                <br></br>
            </div>
                <div class="form-group">
                <label for="inputPassword" class="col-sm-1 control-label">Nueva Contraseña</label>
                <div class="col-sm-3">
                    <?php  echo $this->Form->input('password',array(
                              'type' => 'password',
                              'placeholder' => 'Nueva Contraseña',
                              'class' => 'form-control',
                              'label' => false,
                              'error' => false,
                              'value' => false
                          )); ?>
                </div>
                <div class="col-sm-3">
                     <?php echo $this->Form->error('User.password', null, array('class' => 'error ')); ?>
                </div>
                <br></br>
            </div>
            <div class="form-group">
                <label for="inputpasswordConfirm" class="col-sm-1 control-label">Confirmar Contraseña</label>
                <div class="col-sm-3">
                    <?php  echo $this->Form->input('password_confirm', array(
                              'label' => 'Confirm Password *', 
                              'maxLength' => 255, 
                              'label' => false,
                              'placeholder' => 'Confirmar Contraseña',
                              'class' => 'form-control',
                              'type'=>'password',
                              'error' => false,
                  )); ?>
                 </div>
                 <div class="col-sm-3">
                         <?php echo $this->Form->error('User.password_confirm', null, array('class' => 'error ')); ?>
                 </div>
                 <br></br>
            </div>
                <br>
            <div class="form-group">       
                 <label for="inputRole" class="col-sm-1 control-label"></label>
                 <label for="inputRole" class="control-label">&nbsp&nbsp&nbsp&nbsp</label>
                        <button type="submit" class="btn btn-primary " id="login">Guardar Cambios</button>
                          <?php
                          echo $this->Form->end();
                          ?>
             </div>
             <?php echo '&nbsp', $this->Html->image('volver.jpg', array('height'=>'25' , 'width' => '25','url' => array('controller' => 'users', 'action' => 'index')),array('escape' => false)).$this->Html->link("   Regresar",   array('controller' => 'users', 'action'=>'index'),array('escape' => false) ); 
                               echo "<br><br>";     ?>
          </div>   
     </form>




  </body>
</html>