<?php
class ReadersController extends AppController{
	public $name='Readers';
	public $uses=array('Post');
	public $helpers=array('Html','Form');
	public $layout = 'readerslayout';

	public function index(){
		$this->set('posts',$this->Post->find('all'));
	}
	
	public function view($id=null){
		$this->Post->id=$id;
		$this->set('post',$this->Post->read());
	}

}
