<h1>投稿</h1>
<?php
echo $this->Form->create('Post');
echo $this->Form->input('Category',array(
		'type'		=>'select',
		'multiple'	=>'checkbox',
		'options'	=>$categories));
echo $this->Form->hidden('postdate',array(
		'value'	=>date('Y-m-d H:i:s',time())));
if(isset($error_message)){
	echo $this->Html->tag('span',$error_message);
}
echo $this->Form->input('title');
echo $this->Form->input('body', array('rows' => '3'));
echo $this->Form->end('投稿');
?>
