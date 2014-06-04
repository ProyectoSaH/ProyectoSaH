<?php

class CalendarsController extends AppController{
	public $helpers = array('Html','Form');
        public $components = array('RequestHandler');
        var $name = 'Calendars';
        var $nombreGlobal = 0;


	public function index(){
		$this->set('calendars',$this->Calendar->find('all'));
	}
        
        public function view(){
           if ($this->request->is('post')) {
            if ($this->Calendar->save($this->request->data)) {
                $this->Session->setFlash(__('Cita Creada'));
                
                $this->redirect(array('controller' => 'users',
                    'action' => 'index'));
            } else {
                $this->Session->setFlash(__('No se ha podido añadir la cita'));
            }   
        }
        }

	public function add_cita(){
		$this->Calendar->id = $id;
		$this->set('calendars', $this->Calendar->read());
	}
        
        public function calendar($id = null){
            $this->Calendar->id = $id;

	}
        public function feed($id){
            
        $calendars = $this->Calendar->find('all');
        $rows = array();
        for ($a=0; $a < count($calendars) ; $a++){
            if( $id == $calendars[$a]['Calendar']['id_user'] ){
             $rows[] = array(
                    'id' => $calendars[$a]['Calendar']['id'],
                    'title' => $calendars[$a]['Calendar']['title'],
                    'start' => $calendars[$a]['Calendar']['start'],
                    'end' => $calendars[$a]['Calendar']['end'],
                    'allday' => $calendars[$a]['Calendar']['allday'],
                    );
            }
           /*  
        $rows[] = array('id'=>'1',
                        'title'=>'prova',
                        'start'=>'2014-03-19 21:00:00',
                        'end'=> '2014-03-19 23:00:00');*/
          //  }
        }
        Configure::write('debug', 0);
        $this->autoRender = false;
        $this->autoLayout = false;
        $this->header('Content-Type: application/json');
        echo json_encode($rows);       
        }

}

?>