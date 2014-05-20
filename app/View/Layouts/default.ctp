
<?php

$cakeDescription = __d('cake_dev', 'CakePHP: the rapid development php framework');
?>
<!DOCTYPE html>
<html>
<head>  
         <?php echo $this->Html->Script('jquery'); ?>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $cakeDescription ?>:
		<?php echo $title_for_layout; ?>
	</title>
	<?php
		echo $this->Html->meta('icon');
                echo $this->Html->css('cake.generic');
              
                echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
                echo $this->Html->css('bootstrap.min');
                echo $this->Html->Script('bootstrap.min');
?>
<?php echo $this->Form->end(); ?>
</head>
<body>
    <?php echo $this->Js->writeBuffer();?>
  <div id="container">
      <div id="content">
          <?php echo $this->Session->flash(); ?>
          <?php echo $this->fetch('content'); ?>
      </div>
  </div>
  
</body>
</html>
