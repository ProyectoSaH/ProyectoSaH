<?php

class PostsController extends AppController{
	public $helpers = array('Html','Form');


	public function index(){
		$this->set('posts',$this->Post->find('all'));
	}

	public function view($id = null){
		$this->Post->id = $id;
		$this->set('post', $this->Post->read());
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
