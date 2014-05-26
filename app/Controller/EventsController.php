<?php

class EventsController extends AppController {
   public $helpers = array('Html','Form');
    
    public function index(){
		$this->set('events',$this->Event->find('all'));
	}
       public function calendar2($id = null){
            $this->set('events',$this->Event->find('all'));
		
	}
      public function feed(){
            $events = $this->Event->find('all');
            $rows = array();
            for ($a=0; count($events)> $a; $a++) {

            $rows[] = array('id' => $events[$a]['Event']['id'],
            'title' => $events[$a]['Event']['title'],
            'start' => $events[$a]['Event']['start'],
            'end' => $events[$a]['Event']['end'],
            );
            }
            Configure::write('debug', 0);
            $this->autoRender = false;
            $this->autoLayout = false;
            $this->header('Content-Type: application/json');
            echo json_encode($rows);
        
      }
        
}
?>
