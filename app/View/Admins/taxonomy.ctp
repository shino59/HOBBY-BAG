<h1>タクソノミー</h1>
<?php
echo $this->Form->create('Taxonomy',array('url'=>array('controller'=>'admins','action'=>'taxonomy')));
echo $this->Form->input('name');
echo $this->Form->end('追加');
?>
<table>
	<tr>
		<th>Id</th><th>Name</th><th>編集</th><th>削除</th>
	</tr>
	
	<?php foreach ($taxonomies as $taxonomy): ?>
		<tr>
			<td><?php echo $taxonomy['Taxonomy']['id']; ?></td>
			<td>
				<?php 
				echo $this->Form->create('Taxonomy',array('action'=>'taxonomy_edit'));
				echo $this->Form->input('name',array('value'=>$taxonomy['Taxonomy']['name']));
				echo $this->Form->input('id',array('type'=>'hidden'));
				?>
			</td>
			<td>
				<?php echo $this->Form->end('編集'); ?>
			</td>
			<td>
				<?php echo $this->Form->postLink('削除',
					array('action'=>'taxonomy_delete',$taxonomy['Taxonomy']['id']),array('confirm'=>'削除しますよ?')); ?>
			</td>
		</tr>
	<?php endforeach; ?>
</table>