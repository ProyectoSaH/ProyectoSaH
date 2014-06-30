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
        <p class="bg-success"> <legend> &nbsp Añadir Usuario </legend></p>
        <?php  echo $this->Form->create('User'); ?>
        <form class="form-horizontal" role="form">
        <div class= "container-fluid">
            <div class="form-group">
                <label for="inputUsername" class="col-sm-1 control-label ">Nombre Usuario</label>
                <div class="col-sm-3">
                    <?php  echo $this->Form->input('username',array(
                                'type' => 'alphanumeric',
                                'placeholder' => 'Nombre de usuario',
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
                <label for="inputEmail" class="col-sm-1 control-label">Rut</label>
                <div class="col-sm-3">
                    <?php  echo $this->Form->input('rut',array(
                              'type' => 'alphanumeric',
                              'id' => 'rut',
                              'placeholder' => 'Rut',
                              'class' => 'form-control',
                              'label' => false,
                              'error' => false,
                          )); ?>        
                </div>
                <div class="col-sm-3">
                     <?php echo $this->Form->error('User.rut', null, array('class' => 'error ')); ?>
                </div>
                 <br></br>
            </div>
            <div class="form-group">
                <label for="inputEmail" class="col-sm-1 control-label">Nombres</label>
                <div class="col-sm-3">
                    <?php  echo $this->Form->input('name',array(
                              'type' => 'alphanumeric',
                              'placeholder' => 'Nombres',
                              'class' => 'form-control',
                              'label' => false,
                              'error' => false,
                          )); ?>
                </div>
                <div class="col-sm-3">
                     <?php echo $this->Form->error('User.name', null, array('class' => 'error ')); ?>
                </div>
                <br></br>
            </div>
            <div class="form-group">
                <label for="inputEmail" class="col-sm-1 control-label">Apellidos</label>
                <div class="col-sm-3">
                    <?php  echo $this->Form->input('surname',array(
                              'type' => 'alphanumeric',
                              'placeholder' => 'Apellidos',
                              'class' => 'form-control',
                              'label' => false,
                              'error' => false,
                          )); ?>
                </div>
                <div class="col-sm-3">
                    <?php echo $this->Form->error('User.surname', null, array('class' => 'error ')); ?>
               </div>
                <br></br>
            </div>
            <div class="form-group">
                <label for="inputEmail" class="col-sm-1 control-label">Fecha Nacimiento</label>
                <div class="col-sm-3">
                  <?php  echo $this->Form->input('date_birth',array(
                              'type' => 'text',
                              'placeholder' => 'Fecha De Nacimiento',
                              'id' => 'date_birth',
                              'class' => 'form-control',
                              'label' => false,
                              'error' => false,
                          )); ?>
                </div>
                <div class="col-sm-3">
                    <?php echo $this->Form->error('User.date_birth', null, array('class' => 'error ')); ?>
                </div>
                <br></br>
            </div>
            <div class="form-group">
                <label for="inputEmail" class="col-sm-1 control-label">Email</label>
                <div class="col-sm-3">
                    <?php  echo $this->Form->input('email',array(
                              'type' => 'alphanumeric',
                              'placeholder' => 'Email',
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
                <label for="inputPassword" class="col-sm-1 control-label">Contraseña</label>
                <div class="col-sm-3">
                    <?php  echo $this->Form->input('password',array(
                              'type' => 'password',
                              'placeholder' => 'Password',
                              'class' => 'form-control',
                              'label' => false,
                              'error' => false,
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
                              'placeholder' => 'Confirm Password',
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
            <div class="form-group">
                <label for="inputRole" class="col-sm-1 control-label">Rol</label>
                <div class="col-sm-3">
                     <?php  echo $this->Form->input('role', array(
                        'class' => 'form-control',
                        'label' => false,
                        'options' => array( 
                        'empleado' => 'Empleado' ))
                      );?>
                </div>
            </div>
            <br></br>
            <label for="inputRole" class="col-sm-2 control-label">&nbsp</label>
            <div class="form-group">          
                        <button type="submit" class="btn btn-primary " id="login">Confirmar</button>
                          

                          <?php
                          echo $this->Form->end();
                          echo $this->Html->link(false ,array('action'=>'index'));
                          ?>

                            <?php echo '<br>&nbsp', $this->Html->image('volver.jpg', array('height'=>'25' , 'width' => '25','url' => array('controller' => 'users', 'action' => 'index')),array('escape' => false)).$this->Html->link("   Regresar",   array('controller' => 'users', 'action'=>'index'),array('escape' => false) ); 
     echo "<br><br>"; ?>
             </div>
         </div>     
    </form>
  
  </body>
</html>