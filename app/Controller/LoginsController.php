<?php
class LoginsController extends AppController{
	public $name='Logins';
	public $uses=false;
	public $helpers=array('Html','Form');
	public $layout = 'adminslayout';
	
	function index(){
		if($this->request->is('post')){
			if($this->request['data']['Post']['loginid']==='blogblog'){
				CakeSession::write('loginflag', 'on');
				$this->redirect('/admins/');
			}
		}
	}
	
	function logout(){
		CakeSession::write('loginflag', '');
		$this->redirect('/logins/');
	}
}
