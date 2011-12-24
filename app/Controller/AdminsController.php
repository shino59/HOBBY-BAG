<?php
class AdminsController extends AppController{
//	public $name='Admins';
	public $uses=array('Post');
	public $helpers=array('Html','Form');
	public $layout = 'adminslayout';

	function beforeFilter(){
		$loginflag=CakeSession::read('loginflag');
		if($loginflag !== 'on'){
			$this->redirect('/logins/');
		}
	}

	function index(){
		$this->set('posts',$this->Post->find('all'));
	}
	
	function view($id=null){
		$this->Post->id=$id;
		$this->set('post',$this->Post->read());
	}
	
	function add(){
		if($this->request->is('post')) {
			if($this->Post->save($this->request->data)) {
				$this->Session->setFlash('投稿しました');
				$this->redirect(array('action' => 'index'));
			}
			else{
				$this->Session->setFlash('投稿に失敗しました');
			}
		}
	}
	
	function edit($id=null){
		$this->Post->id=$id;
		if($this->request->is('get')){
			$this->request->data=$this->Post->read();
		}
		else{
			if($this->Post->save($this->request->data)){
				var_dump($this->request->data);
				//$this->Session->setFlash('変更しました');
				//$this->redirect(array('action' => 'index'));
			}
			else{
				$this->Session->setFlash('失敗しました');
			}
		}
	}
	
	function delete($id){
		if($this->request->is('get')){
			throw new MethodNotAllowedException();
		}
		if($this->Post->delete($id)){
			$this->Session->setFlash('The post with id: ' . $id . ' has been deleted.');
			$this->redirect(array('action' => 'index'));
		}
	}

}
	//論理削除
	/*
	function vanish(){
		$id=$this->params['url']['id'];
		if(!$id){
			$this->redirect(dashboard);
		}
		$this->Diary->id=$id;
		$this->Diary->saveField('trashbox',1);
		$this->redirect(dashboard);
	}
	*/