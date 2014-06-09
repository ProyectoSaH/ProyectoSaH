<html>
<head>
    
</head>
<body>
  <legend> &nbsp Añadir Usuario </legend>
<?php  echo $this->Form->create('User'); ?>
<form class="form-horizontal" role="form">
  <div class= "container-fluid">
  <div class="form-group">
    <label for="inputUsername" class="col-sm-1 control-label ">Username</label>
    <div class="col-sm-4">
      <?php  echo $this->Form->input('username',array(
                  'type' => 'alphanumeric',
                  'placeholder' => 'Username',
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
    <label for="inputEmail" class="col-sm-1 control-label">Email</label>
    <div class="col-sm-4">
      <?php  echo $this->Form->input('email',array(
                  'type' => 'alphanumeric',
                  'placeholder' => 'Email',
                  'class' => 'form-control',
                  'label' => false,
                  'error' => false,
              )); ?>
    </div>
    <div class="col-sm-2">
<?php echo $this->Form->error('User.email', null, array('class' => 'error ')); ?>
   </div>
    <br></br>
  </div>
  <div class="form-group">
    <label for="inputPassword" class="col-sm-1 control-label">Password</label>
    <div class="col-sm-4">
      <?php  echo $this->Form->input('password',array(
                  'type' => 'password',
                  'placeholder' => 'Password',
                  'class' => 'form-control',
                  'label' => false,
                  'error' => false,
              )); ?>
    </div>
    <div class="col-sm-4">
<?php echo $this->Form->error('User.password', null, array('class' => 'error ')); ?>
   </div>
    <br></br>
  </div>
   <div class="form-group">
    <label for="inputpasswordConfirm" class="col-sm-1 control-label">Password Confirm</label>
    <div class="col-sm-4">
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
   <div class="col-sm-2">
<?php echo $this->Form->error('User.password_confirm', null, array('class' => 'error ')); ?>
   </div>
     <br></br>
  </div>
  <div class="form-group">
    <label for="inputRole" class="col-sm-1 control-label">Role</label>
    <div class="col-sm-2">
      <?php  echo $this->Form->input('role', array(
            'class' => 'form-control',
            'label' => false,
            'options' => array( 
            'empleado' => 'Assit' )));?>
    </div>
    <br></br>
  </div>
  <label for="inputRole" class="col-sm-2 control-label">&nbsp</label>
   <div class="form-group">          
              <button type="submit" class="btn btn-primary " id="login">Login</button>
                <?php
                echo $this->Form->end();
                echo $this->Html->link(false ,array('action'=>'index'));
                ?>
           </div>
    </div>       
</form>
  <?php echo $this->Html->link("Return Index",   array('action'=>'index'),array('escape' => false) ); ?>
</div>
<?php 
//if($this->Session->check('Auth.User')){
//echo $this->Html->link( "Return to index",   array('action'=>'index') ); 
//echo "<br>";
//echo $this->Html->link( "Logout",   array('action'=>'cerrar sesion') ); 
//}else{
//echo $this->Html->link( "Return to Login Screen",   array('action'=>'login') ); 
//}
?>

</body>
</html>
