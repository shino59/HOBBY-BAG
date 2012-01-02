<h1>編集</h1>
<?php
echo $this->Form->create('Post',array('url'=>array('controller'=>'admins','action'=>'edit')));
echo $this->Form->input('Category',array('multiple'=>'checkbox'));
if(isset($error_message)){
	echo $this->Html->tag('span',$error_message);
}
echo $this->Form->datetime(
		'postdate',
		'YMD',
		null,
		array(
			'minYear'=>2010,
			'separator'=>'/',
			'maxYear'=>date('Y'),
			'monthNames'=>false));
echo $this->Form->input('title');
echo $this->Form->input('body',array('rows'=>'3'));
echo $this->Form->input('id',array('type'=>'hidden'));
echo $this->Form->end('変更');
?>
