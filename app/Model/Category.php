<?php
class Category extends AppModel {
	public $name = 'Category';
	public $validate=array(
				'name' => array('rule' => 'notEmpty')
	);
}
