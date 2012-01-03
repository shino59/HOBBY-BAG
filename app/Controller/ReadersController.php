<?php
class ReadersController extends AppController{
	public $name='Readers';
	public $uses=array('Post','Comment');
	public $helpers=array('Html','Form');
	public $layout = 'readerslayout';

	public function index(){
		$this->set('posts',$this->Post->find('all',array('conditions'=>array('deleteflag'=>0))));
	}
	
	public function view($id=null){
		$this->Post->id=$id;
		$this->set('post',$this->Post->read());
		//コメント機能
		if($this->request->is('post')){
			if($this->request->is('post')){
				$this->request->data['Comment']['deleteflag']=2;
				//サニタイズ
				App::uses('Sanitize','Utility');
				$this->request->data['Comment']['handle_name']=Sanitize::html($this->request->data['Comment']['handle_name']);
				$this->request->data['Comment']['mail_address']=Sanitize::html($this->request->data['Comment']['mail_address']);
				$this->request->data['Comment']['body']=Sanitize::html($this->request->data['Comment']['body']);
				if($this->Comment->save($this->request->data)){
					$this->Session->setFlash('投稿しました');
					$this->redirect(array('action' => 'view',$id));
				}
				else{
					$this->Session->setFlash('投稿に失敗しました');
				}
			}
		}
		
		else{
			$this->d($this->Post->read());
		}
		
	}
	
	public function comment_delete($id=null,$posts_id=null){
		$this->Comment->id=$id;
		App::uses('Sanitize','Utility');
		$mail_address=Sanitize::html($this->request->data['Comment']['mail_address']);
		if($this->data['Comment']['mail_address']==$mail_address){
			$this->Comment->saveField('deleteflag',1);
		}
		$this->redirect(array('controller'=>'readers','action' => 'view',$posts_id));
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
