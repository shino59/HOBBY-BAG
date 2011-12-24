<table>
	<tr>
		<th>Id</th><th>Title</th><th>Created</th>
	</tr>
	
	<?php foreach ($posts as $post): ?>
		<tr>
			<td><?php echo $post['Post']['id']; ?></td>
			<td>
				<?php echo $this->Html->link($post['Post']['title'],
				array('controller' => 'readers', 'action' => 'view', $post['Post']['id'])); ?>
			</td>
			<td><?php echo $post['Post']['created']; ?></td>
		</tr>
	<?php endforeach; ?>
</table>