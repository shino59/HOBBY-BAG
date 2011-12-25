<?php
class Taxonomy extends AppModel{
	public $name = 'Taxonomy';
	public $validate=array(
				'name' => array('rule' => 'notEmpty')
	);
	public $hasMany=array(
			'Category' => array(
				'className' => 'Category',
				'foreignKey' => 'taxonomies_id',
				'conditions' => array('deleteflag' => '0'),
				'dependent'=> true
			)
	); 
}
