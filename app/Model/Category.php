<?php
class Category extends AppModel {
public $name = 'Category';
	public $validate=array('name' => array('rule' => 'notEmpty'));
	public $hasAndBelongsToMany=array(
				'Post'=>array(
					'className'				=>'Post',
					'joinTable'				=>'categories_posts',
					'with'						=>'CategoriesPost',
					'foreignKey'				=>'category_id',
					'associationForeignKey'	=>'post_id',
					'unique'					=>true,
					'conditions'				=>'',
					'fields'					=>'',
					'order'					=>'',
					'limit'					=>'',
					'offset'					=>'',
					'finderQuery'				=>'',
					'deleteQuery'				=>'',
					'insertQuery'				=>''
				)
	);
	
	
}