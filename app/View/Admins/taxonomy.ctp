<h1>カテゴリー</h1>


<table border="1">
	<tr>
		<th>T_d</th><th>タクソノミー</th><th>編集</th><th>削除</th><th>T_Id</th><th>C_Id</th><th>カテゴリー</th><th>追加/編集</th><th>削除</th>
	</tr>
	<?php foreach ($taxonomies as $taxonomy): ?>
		<tr>
			<td><?php echo $taxonomy['Taxonomy']['id']; ?></td>
			<td>
				<?php 
				echo $this->Form->create('Taxonomy',array('url'=>array('controller'=>'admins','action'=>'taxonomy')));
				echo $this->Form->input('name',array('value'=>$taxonomy['Taxonomy']['name']));
				echo $this->Form->input('id',array('type'=>'hidden','value'=>$taxonomy['Taxonomy']['id']));
				?>
			</td>
			<td>
				<?php echo $this->Form->end('編集'); ?>
			</td>
			<td>
				<?php echo $this->Form->postLink('削除',
					array('action'=>'taxonomy_delete',$taxonomy['Taxonomy']['id']),array('confirm'=>'削除してよろしいですか?')); ?>
			</td>
			<td><br /></td>
			<td><br /></td>
			<td>
				<?php 
				echo $this->Form->create('Category',array('url'=>array('controller'=>'admins','action'=>'taxonomy')));
				echo $this->Form->input('taxonomies_id',array('type'=>'hidden','value'=>$taxonomy['Taxonomy']['id']));
				echo $this->Form->input('name');
				?>
			</td>
			<td>
				<?php echo $this->Form->end('追加'); ?>
			</td>
			<td><br /></td>
		</tr>
		<?php if($taxonomy['Category']): ?>
			<?php foreach($taxonomy['Category'] as $category):?>
			<tr>
				<th><br /></th><th><br /></th><th><br /></th><th><br /></th>
				<td><?php echo $category['taxonomies_id']; ?></td>
				<td><?php echo $category['id']; ?></td>
				<td>
					<?php 
					echo $this->Form->create('Category',array('url'=>array('controller'=>'admins','action'=>'taxonomy',$taxonomy['Taxonomy']['id'])));
					echo $this->Form->input('name',array('value'=>$category['name']));
					echo $this->Form->input('id',array('type'=>'hidden','value'=>$category['id']));
					?>
				</td>
				<td>
					<?php echo $this->Form->end('編集'); ?>
				</td>
				<td>
				<?php echo $this->Form->postLink('削除',
					array('action'=>'category_delete',$category['id']),array('confirm'=>'削除してよろしいですか?')); ?>
				</td>
			</tr>
			<?php endforeach; ?>
		<?php endif; ?>
	<?php endforeach; ?>
	<tr>
		<th><br /></th>
		<th>
		<?php
		echo $this->Form->create('Taxonomy',array('url'=>array('controller'=>'admins','action'=>'taxonomy')));
		echo $this->Form->input('name'); ?>
		</th>
		<th>
		<?php echo $this->Form->end('追加'); ?>
		</th>
		<th><br /></th><th><br /></th><th><br /></th><th><br /></th><th><br /></th><th><br /></th>
	</tr>
</table>
