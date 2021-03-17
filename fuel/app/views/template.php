<!DOCTYPE html>

<html>
<head>
	<title><?php echo $title; ?></title>
	<meta name="viewport" content="initial-scale=1">

	<script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script>
	<?php echo Asset::js(array(
		'https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js',
		'bootstrap.js')); ?>

	<?php echo Asset::css(array('bootstrap.css','kintore.css')); ?>
</head>
<body>
	<div class="container">
	<nav class="navbar navbar-inverse navbar-purple navbar-fixed-top">
		<div class="container">
			<div class="navbar-header">
				<a class="navbar-brand kintore-navbar" href="/">Let's 筋トレ！</a>
			</div>
		</div>
	</nav>
	</div>

	<div class="container kintore-content">
		<?php echo $content; ?>
	</div>
	
	<?php echo Asset::js(array('kintore.js')); ?>
	
</body>
</html>