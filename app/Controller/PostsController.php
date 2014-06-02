<?php

class PostsController extends AppController{
	public $helpers = array('Html','Form');
        public $components = array('RequestHandler');
        var $name = 'Posts';


	public function index(){
		$this->set('posts',$this->Post->find('all'));
	}

	public function view($id = null){
		$this->Post->id = $id;
		$this->set('post', $this->Post->read());
	}
        
        public function calendar2($id = null){
            $this->Post->id = $id;
            $this->set('post',$this->Post->find('all'));
		
	}
        public function feed(){  
        $posts = $this->Post->find('all');
        $rows = array();
        for ($a=0; $a < count($posts) ; $a++){
             $rows[] = array(
                    'id' => $posts[$a]['Post']['id'],
                    'title' => $posts[$a]['Post']['title'],
                    'start' => $posts[$a]['Post']['start'],
                    'end' => $posts[$a]['Post']['end'],
                    'allday' => $posts[$a]['Post']['allday'],
                    );
      /*  $rows[] = array('id'=>'1',
                        'title'=>'prova',
                        'start'=>'2014-03-19 21:00:00',
                        'end'=> '2014-03-19 23:00:00');*/
        
        }
        Configure::write('debug', 0);
        $this->autoRender = false;
        $this->autoLayout = false;
        $this->header('Content-Type: application/json');
        echo json_encode($rows);       
        }
        
         public function feede(){
       $rows = array();
        for ($a=0; count($posts)> $a; $a++) {
            
        $rows[] = array('title' => $posts[$a]['Post']['title'],
        'start' => $posts[$a]['Post']['start'],
        'end' => $posts[$a]['Post']['end'],
        );
        }

        //4. Return as a json array
        Configure::write('debug', 0);
        $this->autoRender = false;
        $this->autoLayout = false;
        $this->header('Content-Type: application/json');
        echo json_encode($rows);
        }


	public function add(){
            echo 'dsads';
		if($this->request->is('post')){
                     echo 'dsads';
			if($this->Post->save($this->request->data)){
				$this->Session->setFlash('Your post has been saved.');
				$this->redirect(array('action'=> 'index'));
			}
		}
	}
	public function edit($id =null){
		if(!$id){
		  throw new NotFoundException(__('Invalid post'));
		}
		$post = $this->Post->findById($id);
		if(!$post){
			throw new NotFoundException(__('Invalid post'));
		}
		if($this->request->is(array('post','put'))){
			$this->Post->id = $id;
			if($this->Post->save($this->request->data)){
				$this->Session->setFlash(__('Your post has been update'));
				return $this->redirect(array('action'=>'index'));
			}
			$this->Session->setFlash(__('Unable to update your post'));
		}

		if(!$this->request->data){
			$this->request->data = $post;
		}
	}

}

?>
