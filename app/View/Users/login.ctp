<nav class="navbar navbar-default" role="navigation">
        <div class="container-fluid">
          <div class="navbar-header">
              <?php echo $this->Html->image('prueba_90x80.png', array('alt' => 'S.A.H'))?>
          </div>
          <div class="navbar-form navbar-left">
            <br>
              <ul class="nav nav-tabs">
                  <li class="active"><a href="#">Home</a></li>
                  <li><a href="#">Profile</a></li>
                  <li><a href="#">Messages</a></li>
              </ul>
          </div>
          <?php      
              echo $this->Form->create('User',array(
                 'inputDefaults' => array(
		 'label' => false,
		 'wrapInput' => false,
                  )));
         ?>
        <div class="form-inline navbar-right navbar-form" >
          <br>
            <div class="form-group ">
                 <?php  echo $this->Form->input('username',array(
                  'type' => 'alphanumeric',
                  'placeholder' => 'Username',
                  'class' => 'form-control',
                  'label' => false
              )); ?>
            </div>
            <div class="form-group">
                <?php  echo $this->Form->input('password',array(
                  'type' => 'password',
                  'placeholder' => 'Password',
                  'class' => 'form-control',
                  'label' => false
               )); ?>
            </div>
            <div class="form-group">          
                <button type="submit" class="btn btn-primary">Login</button>
                <?php
                echo $this->Form->end();
                echo $this->Html->link(false ,array('action'=>'add'));
                ?>
           </div> 
        </div>
    </div>       
  </nav>
