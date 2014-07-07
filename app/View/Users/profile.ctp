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
        <p class="bg-info"> <legend> &nbsp Datos Personales </legend> </p>
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
                    <label for="inputEmail" class="col-sm-1 control-label">Nombre Usuario:</label>
                    <label for="inputUsername" class="col-sm-2 control-label ">&nbsp<?php echo ucfirst($this->data['User']['username']);?></label>
                    <br><br>
               </div>
               <div class="form-group">
                    <label for="inputEmail" class="col-sm-1 control-label">Nombre:</label>
                    <label for="inputUsername" class="col-sm-2 control-label ">&nbsp<?php echo ucfirst($this->data['User']['name'])?> &nbsp <?php ucfirst($this->data['User']['surname']);?></label>
                    <br>
               </div>
               <div class="form-group">
                    <label for="inputEmail" class="col-sm-1 control-label">Rut:</label>
                    <label for="inputUsername" class="col-sm-2 control-label ">&nbsp<?php echo ucfirst($this->data['User']['rut']);?></label>
                    <br>
               </div>
               <div class="form-group">
                    <label for="inputEmail" class="col-sm-1 control-label">Fecha Nacimiento:</label>
                    <label for="inputUsername" class="col-sm-2 control-label ">&nbsp<?php echo ucfirst($this->data['User']['date_birth']);?></label>
                    <br><br>
               </div>
                <?php echo ' &nbsp&nbsp&nbsp&nbsp', $this->Html->image('password.png', array('height'=>'25' , 'width' => '25','url' => array('controller' => 'users', 'action' => 'change_password')),array('escape' => false)).
                     $this->Html->link("   Cambiar Contraseña",   array('controller' => 'users', 'action'=>'change_password'),array('escape' => false) ); 
                      echo "<br>";     ?>
                <br>
               <p class="bg-success"><legend> &nbsp Datos Editables </legend></p>                
                <div class="form-group">
                <label for="inputPassword" class="col-sm-1 control-label">Email</label>
                <div class="col-sm-3">
                    <?php  echo $this->Form->input('email',array(
                              'type' => 'email',
                              'placeholder' => 'email',
                              'class' => 'form-control',
                              'label' => false,
                              'error' => false,
                          )); ?>
                </div>
                <div class="col-sm-3">
                     <?php echo $this->Form->error('User.email', null, array('class' => 'error ')); ?>
                </div>
                <br></br>
            </div>
            <div class="form-group">
                <label for="inputPassword" class="col-sm-1 control-label">N&deg Telefono:</label>
                <div class="col-sm-3">
                    <?php  echo $this->Form->input('number',array(
                              'type' => 'alphanumeric',
                              'placeholder' => 'Numero de telefono o celular',
                              'class' => 'form-control',
                              'label' => false,
                              'error' => false,
                              'value' => false
                          )); ?>
                </div>
                <div class="col-sm-3">
                     <?php echo $this->Form->error('User.number_phone', null, array('class' => 'error ')); ?>
                </div>
                <br></br>
            </div>
            <div class="form-group">
                <label for="inputpasswordConfirm" class="col-sm-1 control-label">Direccion</label>
                <div class="col-sm-3">
                    <?php  echo $this->Form->input('address', array(
                              'maxLength' => 255, 
                              'label' => false,
                              'placeholder' => 'Direccion',
                              'class' => 'form-control',
                              'type'=>'alphanumeric',
                              'error' => false,
                  )); ?>
                 </div>
                 <div class="col-sm-3">
                         <?php echo $this->Form->error('User.address', null, array('class' => 'error ')); ?>
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