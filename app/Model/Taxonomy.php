<?php
class Taxonomy extends AppModel{
	public $name = 'Taxonomy';
	public $validate=array(
				'name' => array('rule' => 'notEmpty')
	);
}
