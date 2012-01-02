<h1>投稿</h1>
<?php
echo $this->Form->create('Post');
echo $this->Form->datetime(
		'postdate',
		'YMD',
		null,
		array(
			'minYear'=>2010,
			'separator'=>'/',
			'maxYear'=>date('Y'),
			'monthNames'=>false,
			'default'=>time()));
//echo $this->Form->hidden('postdate',array('value'	=>date('Y-m-d H:i:s',time())));
echo $this->Form->input('Category',array(
		'type'		=>'select',
		'multiple'	=>'checkbox',
		'options'	=>$categories));
if(isset($error_message)){
	echo $this->Html->tag('span',$error_message);
}
echo $this->Form->input('title');
echo $this->Form->input('body', array('rows' => '3'));
echo $this->Form->end('投稿');
?>
