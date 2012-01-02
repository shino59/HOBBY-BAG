<?php foreach ($posts as $post): ?>
	<div id="title">
		<span class='post_title'>
			<?php echo $this->Html->link($post['Post']['title'],
				array('controller' => 'readers', 'action' => 'view', $post['Post']['id'])); ?>
		</span>
		<span class="post_date">
			(<?php echo date('Y年m月d日',strtotime($post['Post']['postdate'])); ?>)
		</span>
	</div>
	<div id="maintext">
		<?php echo $post['Post']['body']; ?>
	</div>
<?php endforeach; ?>
