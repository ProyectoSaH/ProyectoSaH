<?php
class RegistrosController extends AppController {
  
    public function historial(){
	    $params = array('order' => 'id asc');
	    $this->set('Registros', $this->Registro->find('all' , $params));
    }

}
?>