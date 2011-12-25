<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
	<head>
		<?php echo $this->Html->charset(); ?>
		<title>hobby bag</title>
		<?php echo $this->Html->css('readers_design'); ?>
	</head>
	<body>
		<div id="container">
			<div id="container_inner">
				<div id="head">
					<h1><?php echo $this->Html->link('HOBBY BAG',
						array('controller'=>'readers','action'=>'index')) ?></h1>
					<p>小さな親切 大きな見返り</p>
				</div>
				<div id="navigation">
					<span>navigation bar</span>
				</div>
				<div id="content">
					<?php echo $content_for_layout; ?>
				</div>
				<div id="sidebar">
					<span>sidebar</span>
				</div>
				<div id="foot">
					<p>Copyright &copy; HOBBY BAG, All Rights Reserved.</p>
				</div>
			</div>
		</div>
	</body>
</html>
