  <?php      
              echo $this->Form->create('Post');
              echo $this->Form->input('title',array(
                  'type' => 'email',
                  'placeholder' => 'Email',
                  'class' => 'form-control',
                  'label' => ''
              ));
              echo $this->Form->input('body',array(
                  'type' => 'password',
                  'placeholder' => 'Password',
                  'class' => 'form-control',
                  'label' => ''
              ));
              echo $this->Form->submit('Login', array(
		'class' => 'btn btn-default',
                )); 
              echo $this->Form->end();
?>

