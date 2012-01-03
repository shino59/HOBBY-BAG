<?php
class Post extends AppModel{
	public $name='Post';

	public $validate=array(
				'title'	=>array('rule'=>	'notEmpty'),
				'body'		=>array('rule'=>	'notEmpty')
				/*,
				'category'	=>array('rule'=>	array(
								'multiple',array('min'=>1)),
								'required'=>true,
								'message'=>'Please select one')
				*/
	);	
	
	public $hasMany=array(
			'Comment' => array(
				'className' => 'Comment',
				'foreignKey' => 'posts_id',
				'conditions' => array('NOT'=>array('deleteflag' => 1)),
				'dependent'=> true
			)
	);

	public $hasAndBelongsToMany=array(
				'Category'=>array(
					'className'				=>'Category',
					'with'						=>'CategoriesPost',
					'foreignKey'				=>'post_id',
					'associationForeignKey'	=>'category_id',
					'unique'					=>true,
					'fields'					=>array('id','name')
					/*
					 ,'joinTable'				=>'categories_posts',
					'conditions'				=>'',
					'order'					=>'',
					'limit'					=>'',
					'offset'					=>'',
					'finderQuery'				=>'',
					'deleteQuery'				=>'',
					'insertQuery'				=>''
					*/
				)
	);
}
