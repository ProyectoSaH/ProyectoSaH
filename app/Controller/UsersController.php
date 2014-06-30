<?php
    class UsersController extends AppController {
    public $helpers = array('Js' => array('Jquery'));
    public $paginate = array(  'limit' => 25,
                               'conditions' => array('status' => '1'),
                               'order' => array('User.username' => 'asc' ));
   
    public function getUsername(){
        return $this->Auth->user('username');
    }
    
    public function getRole(){
        return $this->Auth->user('role');
    }

    public function getSuccess(){
        return $this->Session->check('Auth.User');
    }
    
    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('login','add'); 
    }
    
    public function login() {
        if($this->Session->check('Auth.User')){
            $this->redirect(array('action' => 'index')); 
        }
         
        if($this->request->is('post')){
            $this->request->data['User']['username'] = strtolower($this->request->data['User']['username']);
            if ($this->Auth->login()){
               if($this->Auth->user('role')=='admin') $this->redirect(array('controller' => 'users', 'action' => 'index'));
               else $this->redirect(array('controller' => 'citas', 'action' => 'calendar', '?' => array('id' => $this->Auth->user('id'),'name' => $this->Auth->user('username'))));
            }else{
                $this->Session->setFlash(__(' Nombre de Usuario o Contraseña No Validos'));
            }
        }
    }
 
    public function logout() {
        $this->redirect($this->Auth->logout());
    }
 
    public function index() {
        $this->paginate = array('limit' => 6,
                                'order' => array('User.username' => 'asc' ));
        $users = $this->paginate('User');
        $this->set(compact('users'));   
    }

    public function view($id){
        $this->set('user', $this->User->findById($id));
    }

    public function add() {
        if($this->request->is('post')){
            $this->User->create();
            if($this->User->save($this->request->data)){
                $this->Session->setFlash(__('Usuario creado'));
                $this->redirect(array('action' => 'index'));
            }else{
                $this->Session->setFlash(__('No se ha podido añadir el usuario'));
            }   
        }
    }
 
    public function edit($id = null) {
 
        if(!$id){
            $this->Session->setFlash('Ingrese Id');
            $this->redirect(array('action'=>'index'));
        }
            $user = $this->User->findById($id);
        if (!$user) {
            $this->Session->setFlash('ID Erronea');
            $this->redirect(array('action'=>'index'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            $this->User->id = $id;


            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash(__('Se han actualizado los datos'));
                $this->redirect(array('action' => 'index'));
            }else{
                $this->Session->setFlash(__('No se ha podido actualizar los datos.'));
            }
        }
 
        if (!$this->request->data) {
            $this->request->data = $user;
        }
    }
 
    public function delete($id = null) {
        if($this->Auth->user('id') != $id){
            if (!$id) {
                $this->Session->setFlash('Adquirir ID');
                $this->redirect(array('action'=>'index'));
            }
                $this->User->id = $id;
            if (!$this->User->exists()) {
                $this->Session->setFlash('ID No Valida');
                $this->redirect(array('action'=>'index'));
            }
            if ($this->User->saveField('status', 0)) {
                $this->User->delete();
                $this->Session->setFlash(__('Usuario Eliminado'));
                $this->redirect(array('action' => 'index'));
            }
            $this->Session->setFlash(__('Usuario no se ha podido Eliminar'));
            $this->redirect(array('action' => 'index'));
        }else{
            $this->Session->setFlash(__('No se puede Eliminar el Usuario en Sesion'));
            $this->redirect(array('action'=>'index'));
        }
    }

    public function view_info(){


        if($this->request->is('post')){
               $this->response->type('application/pdf');
               $this->layout = 'pdf'; 
               $this->render();

        }else{
                $this->Session->setFlash(__('No se ha podido generar el Informe'));
                $this->redirect(array('action' => 'info'));

        }
           
    }

    
    public function info(){
     
    }
        
}
?>