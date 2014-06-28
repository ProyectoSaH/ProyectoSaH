<?php
 App::import('Model', 'User');
 App::import('Model', 'Registro');
 App::import('Model', 'Cliente');
  /*
   1234567 : 79c7919b65a06801bb77c060b1b9f2ab64439cb5
   ALTER TABLE citas*
   ADD FOREIGN KEY (ID_clientes)
   REFERENCES clientes(ID) */
 
class CitasController extends AppController{
	
        public $helpers = array('Html','Form');
        public $components = array('RequestHandler');
        var $name = 'Citas';
        
        public function index(){ // Función de prueba
            $registro = new Registro();
            $registro->id_citas = 7;
            $this->set('registro',$registro->find('all'));
            
	   }
        
        public function view(){ // Ver el detalle de una cita
            $this->set('citas', $this->Cita->findById($_GET['id']));
            $user = new User();
            $this->set('user', $user->findById($_GET['idN']));
            $cliente = new Cliente();
            $this->set('cliente',$cliente->findById_citas($_GET['id']));
        }
        
        public function edit() { // Editar Cita
            $cliente = new Cliente();
            $clientes = $cliente->findById_citas($_GET['id']);
            $user = new User();
            $this->set('user', $user->findById($_GET['idN']));
            $this->set('calendar', $this->Cita->findById($_GET['id']));
            $cita = $this->Cita->findById($_GET['id']);
            if ($this->request->is('post') || $this->request->is('put')) {
                $this->Cita->id = $_GET['id'];
            if (strtotime($this->request->data['Cita']['start'])<strtotime($this->request->data['Cita']['end'])){    
                if ($this->Cita->save($this->request->data)) {
                  $this->redirect(array('controller' => 'clientes', 'action' => 'edit', '?' => array(
                    'id' => $clientes['Cliente']['id'] ))); 
                }
            }
            else{ $this->Session->setFlash(__('La hora o fecha inicial de la cita tiene que ser menor a la final'));   
            }
            }
            if (!$this->request->data) {
                $this->request->data = $cita;
            }
        }
          
        public function prueba(){ // función de prueba
            $rows = ['dsadas'];
            Configure::write('debug', 0);
            $this->autoRender = false;
            $this->autoLayout = false;
            $this->header('Content-Type: application/json');
            echo json_encode($rows); 
        }
        
        public function delete(){ // Elimina una cita 
            $this->Cita->id = $_GET['id'];
            $this->Cita->delete();
            $this->Session->setFlash(__('Cita Eliminada'));  
            $this->redirect(array('controller' => 'citas', 'action' => 'calendar', '?' => array(
            'id' => $_GET['idN']))); 
        }
        
        public function calendar(){ // es el "index", muestra el calendario con sus respectivas citas
            $user = new User();
            $this->set('user', $user->findById($_GET['id']));

            
        }
        
        public function feed($id){ // Cargar eventos en el calendario
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