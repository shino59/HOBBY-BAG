<?php
class Post extends AppModel{
	public $name='Post';
	public $validate=array(
				'title'	=>array('rule'=>	'notEmpty'),
				'body'		=>array('rule'=>	'notEmpty'),
				'category'	=>array('rule'=>	array(
								'multiple',array('min'=>1)),
								'required'=>true,
								'message'=>'Please select one')
	);
	public $hasAndBelongsToMany=array(
				'Category'=>array(
					'className'				=>'Category',
					'joinTable'				=>'categories_posts',
					'with'						=>'CategoriesPost',
					'foreignKey'				=>'post_id',
					'associationForeignKey'	=>'category_id',
					'unique'					=>true,
					'conditions'				=>'',
					'fields'					=>array('id','name'),
					'order'					=>'',
					'limit'					=>'',
					'offset'					=>'',
					'finderQuery'				=>'',
					'deleteQuery'				=>'',
					'insertQuery'				=>''
				)
	);
}