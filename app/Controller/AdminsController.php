<?php
class AdminsController extends AppController{
	public $name='Admins';
	public $uses=array('Post','Taxonomy');
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
			/*
			//論理削除案
			$this->Post->id=$id;
			$this->Post->saveField('trashbox',1);
			*/
		}
	}
	
	/*---------------------------------------------*/
	//タクソノミー
	/*---------------------------------------------*/
	function taxonomy(){
		$this->set('taxonomies',$this->Taxonomy->find('all',array('conditions'=>array('deleteflag'=>0))));
		if($this->request->is('post')) {
			if($this->Taxonomy->save($this->request->data)) {
				$this->Session->setFlash('投稿しました');
				$this->redirect(array('action' => 'taxonomy'));
			}
			else{
				$this->Session->setFlash('投稿に失敗しました');
			}
		}
	}
	
	function taxonomy_add(){
		var_dump($this->Taxonomy->validate);
		if($this->Taxonomy->validates){
			
			//$this->redirect(array('action' => 'taxonomy'));
		}
		/*
		if($this->request->is('post')) {
			if($this->Taxonomy->save($this->request->data)) {
				$this->Session->setFlash('投稿しました');
				$this->redirect(array('action' => 'taxonomy'));
			}
			else{
				$this->Session->setFlash('投稿に失敗しました');
			}
		}
		*/
	}
	function taxonomy_edit($id=null){
		echo 'やっほー';
	}
	
	function taxonomy_delete($id=null){
		if($this->request->is('get')){
			throw new MethodNotAllowedException();
		}
		if($this->request->is('post')){
			$this->Taxonomy->id=$id;
			$this->Taxonomy->saveField('deleteflag',1);
			$this->redirect(array('action' => 'taxonomy'));
		}
	}
	
	
	
	
	
	
	
	
	
	
	

}