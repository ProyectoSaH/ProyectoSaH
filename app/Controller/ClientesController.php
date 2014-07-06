<?php
 App::import('Model', 'User');
 App::import('Model', 'Registro');
 App::import('Model', 'Cita');
   
    class ClientesController extends AppController {
    public $helpers = array('Js' => array('Jquery'));
   
    public function edit() { //Editar clientes
            $registro = new Registro();
            $this->set('clientes',$this->Cliente->findById($_GET['id']));
            $clientes = $this->Cliente->findById($_GET['id']);
            $registros = $registro->findById_citas($clientes['Cliente']['id_citas']);
            if ($this->request->is('post') || $this->request->is('put')) {
                $this->Cliente->id = $_GET['id'];
                if ($this->Cliente->save($this->request->data)) {
                    $this->Session->setFlash(__('Se han actualizado los datos'));
                    $this->redirect(array('controller' => 'citas', 'action' => 'calendar', '?' => array(
                    'id' =>$registros['Registro']['id_users']))); 
                }else{
                    $this->Session->setFlash(__('No se ha podido actualizar los datos.'));
                }
            }
 
            if (!$this->request->data) {
                $this->request->data = $clientes;
            }
      }
      
        public function add(){ // Añade una Cita
            $user = new User();
            $this->set('user', $user->findById($_GET['id']));                                 
            if(strtotime($_GET['fecha'].' '.$_GET['horafinal']) < strtotime(date("Y-m-d H:i:s"))){
                $fecha = date("Y-m-d H:i:s");
                $this->Session->setFlash(__('La Hora y/o Fecha de la cita es inferior a '.$fecha));
                $this->redirect(array('controller' => 'citas', 'action' => 'calendar', '?' 
                => array('id' => $_GET['id']))); 
            }
            /*
             $registro = new Registro();
             $citas = new Cita();
             $registros = $registro->findById($_GET['id']);
             for ($a=0; $a < count($registros) ; $a++){
                 var_dump($registros[$a]['Registro']['id_citas']);
die;
                    $citas->id = (int) $registros[$a]['Registro']['id_citas'];
                    if((strtotime($citas->start) <= strtotime($_GET['fecha'].' '.$_GET['horainicial'])&&
                        strtotime($citas->end) <= strtotime($_GET['fecha'].' '.$_GET['horafinal'])) || 
                       (strtotime($citas->start) >= strtotime($_GET['fecha'].' '.$_GET['horainicial'])&&
                        strtotime($citas->end) >= strtotime($_GET['fecha'].' '.$_GET['horafinal']))){
                $this->Session->setFlash(__('dsaasdadsLa Hora y/o Fecha de la cita es inferior a '));
                $this->redirect(array('controller' => 'citas', 'action' => 'calendar', '?' 
                => array('id' => $_GET['id']))); 
                  break;      
                }
            }
            */
             
            if ($this->request->is('post')) {
                if ($this->Cliente->save($this->request->data)) {
                    $user = new User();
                    $users = $user->findById($_GET['id']);
                    $cita = new Cita();
                    $cita->save($this->request->data);
                    $registro = new Registro();
                    $data_users = array('id_citas' => $cita->id, 
                                    'id_users' => $users['User']['id'],
                                    'date_created' => date("Y-m-d H:i:s"),
                                    'rut' => $users['User']['rut']  
                                  );
                    $registro->save($data_users);
                    $this->Cliente->query("UPDATE clientes SET id_citas = '".$cita->id."'"
                                           ."WHERE id = '".$this->Cliente->id."';");
                    $this->Session->setFlash(__('Cita Creada'));  
                    $this->redirect(array('controller' => 'citas', 'action' => 'calendar', '?' => array(
                    'id' => $_GET['id'])));   
                }else {
                    $this->Session->setFlash(__('No se ha podido añadir la Cita'));
                }   
            }
        }
 
}
?>