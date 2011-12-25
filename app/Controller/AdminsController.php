<?php
class AdminsController extends AppController{
	public $name='Admins';
	public $uses=array('Post','Taxonomy','Category');
	public $helpers=array('Html','Form');
	public $layout = 'adminslayout';

	function beforeFilter(){
		$loginflag=CakeSession::read('loginflag');
		if($loginflag !== 'on'){
			$this->redirect('/logins/');
		}
	}

	function index(){
		$this->set('posts',$this->Post->find('all',array('conditions'=>array('deleteflag'=>0))));
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
				$this->Session->setFlash('変更しました');
				$this->redirect(array('action' => 'index'));
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
		if($this->request->is('post')){
			$this->Post->id=$id;
			$this->Post->saveField('deleteflag',1);
			$this->Session->setFlash('The post with id: ' . $id . ' has been deleted.');
			$this->redirect(array('action' => 'index'));
		}
	}
	
	/*---------------------------------------------*/
	//タクソノミー
	/*---------------------------------------------*/
	function taxonomy($id=null){
		$this->Taxonomy->id=$id;
		$this->set('taxonomies',$this->Taxonomy->find('all',array('conditions'=>array('deleteflag'=>0))));
		if($this->request->is('post')) {
			if(isset($this->data['Taxonomy'])){
				if($this->Taxonomy->save($this->request->data)) {
					$this->Session->setFlash('投稿しました');
					$this->redirect(array('action' => 'taxonomy'));
				}
				else{
					$this->Session->setFlash('投稿に失敗しました');
				}
			}
			if(isset($this->data['Category'])){
				if($this->Category->save($this->request->data)) {
					$this->Session->setFlash('投稿しました');
					$this->redirect(array('action' => 'taxonomy'));
				}
				else{
					$this->Session->setFlash('投稿に失敗しました');
				}
			}
		}
	}

	function taxonomy_delete($id=null){
		if($this->request->is('get')){
			throw new MethodNotAllowedException();
		}
		if($this->request->is('post')){
			$check=$this->Taxonomy->find('first',array('conditions'=>array('id'=>$id)));
			if($check['Category']){
				foreach($check['Category'] as $flag){
					if($frag['deleteflag']==0){
						$this->redirect(array('action' => 'taxonomy'));;
					}
				}
			}
			$this->Taxonomy->id=$id;
			$this->Taxonomy->saveField('deleteflag',1);
			$this->redirect(array('action' => 'taxonomy'));
		}
	}
	
	function category_delete($id=null){
		if($this->request->is('get')){
			throw new MethodNotAllowedException();
		}
		if($this->request->is('post')){
			$this->Category->id=$id;
			$this->Category->saveField('deleteflag',1);
			$this->redirect(array('action' => 'taxonomy'));
		}
	}
	
	/*---------------------------------------------*/
	//デバッグ関数 $this->d();
	/*---------------------------------------------*/
	function d(){
		if(!class_exists('dBug', false)) {
			require_once('dBug.php');
		}
		foreach (func_get_args() as $v) {
			new dBug($v);
		}
	}
}