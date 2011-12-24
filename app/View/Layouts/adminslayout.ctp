<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
	<head>
		<?php echo $this->Html->charset(); ?>
		<title><?php echo $title_for_layout; ?></title>
		<?php echo $this->Html->css('blog_design'); ?>
	</head>
	<body>
		<div="container">
			<div id="header">
				<p>HOBBY BAG</p>
			</div>
			<div id="content">
				<?php echo $content_for_layout; ?>
			</div>
			<div id="footer">
				<?php echo $this->Html->link('トップ',
				array('controller'=>'admins','action'=>'index')) ?>
				　
				<?php echo $this->Html->link('ログアウト',
				array('controller'=>'logins','action'=>'logout')) ?>
			</div>
		</div>
	</body>
</html>
