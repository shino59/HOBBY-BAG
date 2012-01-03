<?php
class Comment extends AppModel {
	public $name = 'Comment';
	public $validate=array(
				'handle_name'		=>array('rule' => 'notEmpty'),
				'mail_address'	=>array(
					'notempty'		=>array('rule' => array('notEmpty')),
					'email'		=>array('rule' => array('email'))
				),
				'body'				=>array('rule' => 'notEmpty'),
	);
}