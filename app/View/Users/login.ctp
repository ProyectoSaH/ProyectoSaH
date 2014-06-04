<nav class="navbar navbar-default" role="navigation">
          <div class="navbar-header">
              <?php echo $this->Html->image('prueba_90x80.png', array('alt' => 'S.A.H'))?>
          </div>
          <div class="navbar-form navbar-left">
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
        <div class="navbar-form  navbar-right" >
        	<div class="form-group ">
        	<h4><span class="glyphicon glyphicon-user "></span></h4>
        </div>
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
              <button type="submit" class="btn btn-primary " id="login">Login</button>
                <?php
                echo $this->Form->end();
                echo $this->Html->link(false ,array('action'=>'add'));
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
<div class="navbar-left">
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
                		<script>
			$('#games').coinslider();
		</script>
</body>
</div>
<style>

#contenedor1 {
    clear: both;
    margin-bottom: 0em;
    padding: .3em;
    vertical-align: text-top;
}

#contenedor {
    /*encadeno los 3 atributos claves del borde en una sola linea, ahorrando codigo XD*/ 
    width: 180px;
    background-color:#FFF8F0;
    margin:5px auto; /*10px arriba y abajo, y auto a los lados, para los navegadores nuevos es suficiente para centrar la pagina*/ 
    text-align:center; /*aqui alineamos todo de nuevo a la izquierda, pero dentro del contenedor*/ 
}
</style>
		<div class=" navbar-left" id="contenedor"> </div>

		<div class=" navbar-left" >
                    <nav class="navbar navbar-default" role="navigation" >

			<form role="form"  >
				<h1>&nbsp&nbspContáctanos <span class="glyphicon glyphicon-envelope "></span></h1>

				<div class="form-group" >
				   	<label for="inputEmail3" class="col-sm-2 control-label">Name</label>
				  	<div class="col-sm-10">
				    	<input type="email" class="form-control" id="inputEmail3" placeholder="Nombre">
					</div>
				</div>
                                <br>
				<div class="form-group">
				    <label for="inputPassword3" class="col-sm-2 control-label">Email</label>
				    <div class="col-sm-10">
				      	<input type="password" class="form-control" id="inputPassword3" placeholder="Email">
				    </div>
				</div>
                                
                                
				<div class="form-group">
					<label class="col-sm-2 control-label">Mensaje</label>
                                        <br><br>
				    <div class="col-sm-10">
				    	<textarea class="form-control" rows="3"></textarea>
					</div>
				</div>
                                <br><br>
				<div class="form-group">
				    <div class= "col-sm-10">
                                        <p>
                                            <label class="col-sm-5 control-label">&nbsp</label>
				      <button type="submit" class="btn btn-primary">Enviar</button>
				    </div>
				</div>
			</form>
		</nav>

		</div>
		








