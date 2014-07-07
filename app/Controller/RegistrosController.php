<?php

class RegistrosController extends AppController {
  	
        public $helpers = array('Html','Form');
        public $components = array('RequestHandler');
  
    public function historial(){
	    $params = array('order' => 'id asc');
	    $this->set('Registros', $this->Registro->find('all' , $params));
}
}
?>