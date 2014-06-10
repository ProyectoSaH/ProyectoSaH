<?php
 App::import('Model', 'User');
class CalendarsController extends AppController{
	public $helpers = array('Html','Form');
        public $components = array('RequestHandler');
        var $name = 'Calendars';
        public $nombreGlobal = "nada";


	public function index(){
       /*      App::import('Model', 'User');
       $user = new User();    
       $user->id = '1';
        $this->set('user', $user->read());
        // $this->set('user',$user->find('all'));*/
          
           $user = new User();    
           $user->findById(1);
           $user->set('username',array('username' =>'dasasdsad'));
           $this->User->save($this->request->data('Model.id'));
           $this->save($this->request->data($user->username));
           
           
           $this->set('user', $user->findById(1));
	}
        
        public function view(){
            $user = new User();
            $this->set('user', $user->findById($_GET['id']));
            
            if ($this->request->is('post')) {
            if ($this->Calendar->save($this->request->data)) {
               $this->Session->setFlash(__('Cita creada '));  
               $this->redirect(array('controller' => 'Calendars', 'action' => 'calendar', '?' => array(
                'id' => $_GET['id'])));   
            } else {
                $this->Session->setFlash(__('No se ha podido añadir la cita'));
            }   
        }
        }
	public function edit(){
            $this->set('calendar', $this->Calendar->findById($_GET['id']));
            $user = new User();
            $this->set('user', $user->findById($_GET['idN']));
	}
        

  public function delete(){
    $this->Calendar->id = $_GET['id'];
    $this->Calendar->delete();
    $this->redirect(array('controller' => 'Calendars', 'action' => 'calendar', '?' => array(
                'id' => $_GET['idN']))); 

  }      
        public function calendar(){
            $user = new User();
            $this->set('user', $user->findById($_GET['id']));
            
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