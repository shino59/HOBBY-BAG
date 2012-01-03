<div id="title">
	<span class='post_title'>
		<?php echo $post['Post']['title'] ?>
	</span>
	<span class="post_date">
		(<?php echo date('Y年m月d日',strtotime($post['Post']['postdate'])); ?>)
	</span>
</div>
<div id="maintext">
	<?php echo $post['Post']['body']; ?>
</div>

<?php if(isset($post['Comment'])):?>
	<?php foreach($post['Comment'] as $comments):?>
		<p>---------------------------------------------</p>
		(<?php echo date('Y年m月d日',strtotime($comments['created'])); ?>)
		<?php echo $comments['handle_name'] ?>
		<?php echo $comments['body'] ?>
		<?php
			echo $this->Form->create('Comment',array('url'=>array('controller'=>'readers','action'=>'comment_delete', $comments['id'],$comments['posts_id'])));
			echo $this->Form->input('mail_address');
			echo $this->Form->end('削除');
		?>
		<p>---------------------------------------------</p>
	<?php endforeach; ?>
<?php endif; ?>


<?php
echo $this->Form->create('Comment',array('url'=>array('controller'=>'readers','action'=>'view',$post['Post']['id'])));
echo $this->Form->input('posts_id',array('type'=>'hidden','value'=>$post['Post']['id']));
echo $this->Form->input('handle_name');
echo $this->Form->input('mail_address');
echo $this->Form->input('body', array('rows' => '3'));
echo $this->Form->end('投稿');
?>