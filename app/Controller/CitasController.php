<?php
 App::import('Model', 'User');
 App::import('Model', 'Registra');
 
class CitasController extends AppController{
	public $helpers = array('Html','Form');
        public $components = array('RequestHandler');
        var $name = 'Citas';
        


	public function index(){
          /*App::import('Model', 'User');
            $user = new User();    
            $user->id = '1';
            $this->set('user', $user->read());
            $this->set('user',$user->find('all'));
           $user = new User();    
           $user->findById(1);
           $user->set('username',array('username' =>'dasasdsad'));
           $this->User->save($this->request->data('Model.id'));
           $this->save($this->request->data($user->username));
           $this->set('user', $user->findById(1));*/
             $registrar = new Registra();
             $registrar->id_citas = 7;
             $this->set('registrar',$registrar->find('all'));
            
	}
        
        public function add(){
            $user = new User();
            $this->set('user', $user->findById($_GET['id']));                                 
            if ($this->request->is('post')) {
                if ($this->Cita->save($this->request->data)) {
                    $registrar = new Registra();
                    $user = new User();
                    $users = $user->findById($_GET['id']);
                    $data = array('id_citas' => $this->Cita->id, 
                        'id_users' => $users['User']['id'],
                        'date_created' => date("Y-m-d H:i:s"),
                        'rut' => $users['User']['rut']);
                    $registrar->save($data);
                    $this->Session->setFlash(__('Cita creada '));  
                    $this->redirect(array('controller' => 'citas', 'action' => 'calendar', '?' => array(
                    'id' => $_GET['id'])));   
                }else {
                    $this->Session->setFlash(__('No se ha podido añadir la cita'));
                }   
            }
        }
        
	public function edit(){
            $this->set('calendar', $this->Cita->findById($_GET['id']));
            $user = new User();
            $this->set('user', $user->findById($_GET['idN']));
	}
        
        public function prueba($id){
            $user = new User();
            $this->set('user', $user->findById($id));
        }
        
        public function delete(){
            $registrar = new Registra();
            $registrar->id_cita = $_GET['id'];
            $registrar->delete();
            $this->Cita->id = $_GET['id'];
            $this->Cita->delete();
            $this->redirect(array('controller' => 'citas', 'action' => 'calendar', '?' => array(
            'id' => $_GET['idN']))); 
        }
        
        public function calendar(){
            $user = new User();
            $this->set('user', $user->findById($_GET['id']));
        }
        
        public function feed($id){
            $registrar = new Registra();
            $registro = $registrar->find('all');
            $calendars = $this->Cita->find('all');
            $rows = array();
            for ($a=0; $a < count($calendars) ; $a++){
               if($registro[$a]['Registra']['id_users']==$id ){
                         $rows[] = array(
                        'id' => $calendars[$a]['Cita']['id'],
                        'title' => $calendars[$a]['Cita']['title'],
                        'start' => $calendars[$a]['Cita']['start'],
                        'end' => $calendars[$a]['Cita']['end'],
                        'allday' => $calendars[$a]['Cita']['allday'],
                        );
                }
            }
            Configure::write('debug', 0);
            $this->autoRender = false;
            $this->autoLayout = false;
            $this->header('Content-Type: application/json');
            echo json_encode($rows);       
        }

}

?>