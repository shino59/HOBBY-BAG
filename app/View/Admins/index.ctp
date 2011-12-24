<p><?php echo $this->Html->link("投稿", array('action' => 'add')); ?></p>
<p><?php echo $this->Html->link("タクソノミー", array('action' => 'taxonomy')); ?></p>
<table>
	<tr>
		<th>Id</th><th>Title</th><th>編集/削除</th><th>Created</th>
	</tr>
	
	<?php foreach ($posts as $post): ?>
		<tr>
			<td><?php echo $post['Post']['id']; ?></td>
			<td>
				<?php echo $this->Html->link($post['Post']['title'],
				array('controller' => 'admins', 'action' => 'view', $post['Post']['id'])); ?>
			</td>
			<td>
				<?php echo $this->Html->link('編集', array('action' => 'edit', $post['Post']['id']));?>
				<?php echo $this->Form->postLink('削除',
					array('action'=>'delete',$post['Post']['id']),array('confirm'=>'削除しますよ?')); ?>
			</td>
			<td><?php echo $post['Post']['created']; ?></td>
		</tr>
	<?php endforeach; ?>
</table>