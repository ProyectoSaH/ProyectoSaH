<html>
    <head>
        <style>
            #posicion{
            float: right;
            width: 45%;
           	
            }
      

        </style>
    </head>    
    <nav class="navbar navbar-default" role="navigation">
          <div class="navbar-left">
              <br>
              <?php echo $this->Html->image('prueba_90x80.png', array('alt' => 'S.A.H'))?>
          </div>
         
           <div class="navbar-form" id="posicion" >
               <br></br>
           <?php  echo $this->Form->create('User',array(
                 'inputDefaults' => array(
		 'label' => false,
	         'wrapInput' => false,
                  )));
           ?>
        	<div class="form-group ">
                    <h4><span class="glyphicon glyphicon-user "></span></h4>
                </div>
           <div class="form-group ">
                <?php  echo $this->Form->input('username',array(
                    'type' => 'alphanumeric',
                    'placeholder' => 'Usuario',
                    'class' => 'form-control',
                    'label' => false
                )); ?>
          </div>
          <div class="form-group">
                <?php  echo $this->Form->input('password',array(
                  'type' => 'password',
                  'placeholder' => 'Contraseña',
                  'class' => 'form-control',
                  'label' => false
               )); ?>
           </div>
     <div class="form-group ">          
               <button type="submit" class="btn btn-primary " id="login">Login</button>
                <?php echo $this->Form->end();
                ?>
           </div> 

       </div>
    </nav>
    <br>
    <br>
    <script src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/coin-slider.js"></script>
    <link rel="stylesheet" href="css/coin-slider-styles.css" type="text/css" />
    <body> 
            <div style="width:600px; margin:0 auto;">
		<div id="games">

			<a href="http://www.google.com/" target="_blank">
				<?php echo $this->Html->image('woman.jpg')?>
				<span>
					<b>Agenda Citas</b><br />
					Usted puede mantener todas sus citas en orden, gracias al sistema de atención de horarios 
					(S.A.H)
				</span>
			</a>

			<a href="http://www.google.com/" target="_blank">
				<?php echo $this->Html->image('reloj.jpg')?>
				<span>
					<b>Optimice Su Tiempo</b><br />
					 Las herramientas del sistema, permiten reducir gastos y tiempo, sumar esfuerzos e integrar a toda la organización
				</span>
			</a>

			<a href="http://www.google.com/" target="_blank">
				<?php echo $this->Html->image('value-time.jpg')?>
				<span>
					<b>Valora Tu Tiempo</b><br />
					  El tiempo es algo que todos tenemos, mas sin embargo no todos sabemos como administrarlo o manejarlo correctamente.
				</span>
			</a>

			<a href="http://www.google.com/" target="_blank" >
				<?php echo $this->Html->image('convince.jpg')?>
				<span>
					<b>Colaboración</b><br />
					   La colaboración entre personas de un equipo en la empresa es una de las estrategias que permite obtener el éxito.
				</span>
			</a>

			<a href="http://www.google.com/" target="_blank">
				<?php echo $this->Html->image('agenda.jpg')?>
				<span>
					<b>Deja lo viejo</b><br />
					Unete a lo nuevo, y prueba nuestro sistema de atencion de horarios (S.A.H)
				</span>
			</a>

			<a href="http://www.google.com/" target="_blank">
				<?php echo $this->Html->image('productivity.jpg')?>
				<span>
					<b>Aumenta la productividad </b><br/>
					S.A.H cuenta con herramientas que brindaran una gran ayuda en la gestion de tiempos.
				</span>
			</a>

                </div>
               <script>$('#games').coinslider();</script>
          </div>
    </body>
    <style>

    #contenedor1 {
        clear: both;
        margin-bottom: 0em;
        padding: .3em;
        vertical-align: text-top;
    }

    #divElement{
        position: absolute;
        top: 50%;
        left: 50%;
        margin-top: -120px;
        margin-left: -40px;

    }​
    </style>
</html>

		








