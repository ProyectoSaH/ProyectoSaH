<?php
 App::import('Model', 'User');
 App::import('Model', 'Registro');
 App::import('Model', 'Cliente');
  

 /*
  * 1234567 : 79c7919b65a06801bb77c060b1b9f2ab64439cb5
  * ALTER TABLE citas*
ADD FOREIGN KEY (ID_clientes)
REFERENCES clientes(ID) */
 
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
             $registro = new Registro();
             $registro->id_citas = 7;
             $this->set('registro',$registro->find('all'));
            
	}
        
        public function add(){
            $user = new User();
            $this->set('user', $user->findById($_GET['id']));                                 
            if ($this->request->is('post')) {
                if ($this->Cita->save($this->request->data)) {
                    $registro = new Registro();
                    $user = new User();
                    $cliente = new Cliente();
                    $users = $user->findById($_GET['id']);
                    $data_cliente = array('rut' =>$this->request->data['Cliente']['rut'], 
                                    'name' => $this->request->data['Cliente']['name'],
                                    'surname' => $this->request->data['Cliente']['surname'],
                                    'address' => $this->request->data['Cliente']['address'],
                                    'date_birth' => $this->request->data['Cliente']['date_birth'],
                                    'id_citas' => $this->Cita->id,
                                    'contact' => 0,
                                  );
                    $data_users = array(  'id_citas' => $this->Cita->id, 
                                    'id_users' => $users['User']['id'],
                                    'date_created' => date("Y-m-d H:i:s"),
                                    'rut' => $users['User']['rut']  
                                  );
                    $registro->save($data_users);
                    $cliente->save($data_cliente);
                    $this->Session->setFlash(__('Cita Creada'));  
                    $this->redirect(array('controller' => 'citas', 'action' => 'calendar', '?' => array(
                    'id' => $_GET['id'])));   
                }else {
                    $this->Session->setFlash(__('No se ha podido añadir la cita'));
                }   
            }
        }
        
        public function view(){
         $this->set('citas', $this->Cita->findById($_GET['id']));
         $user = new User();
         $this->set('user', $user->findById($_GET['idN']));
         $cliente = new Cliente();
         $this->set('cliente',$cliente->findById_citas($_GET['id']));
        }
        
	public function edit(){
            $this->set('calendar', $this->Cita->findById($_GET['id']));
            $user = new User();
            $this->set('user', $user->findById($_GET['idN']));
            $cliente = new Cliente();
            $this->set('cliente',$cliente->findById_citas($_GET['id']));
            
             if ($this->request->is('post')) {
                 $this->Cita->id = $_GET['id'];
                if ($this->Cita->save($this->request->data)) {
                    $cliente = new Cliente();
                    $cliente->query("UPDATE clientes SET name = '".$this->request->data['Cliente']['name']."', "
                                    ."surname= '".$this->request->data['Cliente']['surname']."',"
                                    ."rut= '".$this->request->data['Cliente']['rut']."',"
                                    ."address= '".$this->request->data['Cliente']['address']."',"
                                    ."date_birth= '".$this->request->data['Cliente']['date_birth']."'"
                                    ." WHERE id_citas = '".$_GET['id']."';");
                    $cliente->save();
                    $this->Session->setFlash(__('Cita Actualizada'));  
                    $this->redirect(array('controller' => 'citas', 'action' => 'calendar', '?' => array(
                    'id' => $_GET['idN'])));  
                }
                else{
                    $this->Session->setFlash(__('No se ha podido actualizar cita'));  
                }
             }
          }
        
        
        public function prueba(){
            $rows = ['dsadas'];
           Configure::write('debug', 0);
            $this->autoRender = false;
            $this->autoLayout = false;
            $this->header('Content-Type: application/json');
            echo json_encode($rows); 
        }
        
        public function delete(){
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
            $registro = new Registro();
            $registros = $registro->find('all');
            $calendars = $this->Cita->find('all');
            $rows = array();
            for ($a=0; $a < count($calendars) ; $a++){
               if($registros[$a]['Registro']['id_users']==$id ){
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