<!DOCTYPE html>

<html>
<head>
	<title><?php echo $title; ?></title>
	<meta name="viewport" content="initial-scale=1">
	<link rel="manifest" href="<?= Uri::base(false); ?>manifest.json"/>

	<script type="text/javascript" src="<?= Uri::base(false); ?>assets/js/vue.min.js"></script>
	<script type="text/javascript" src="<?= Uri::base(false); ?>assets/js/jquery.1.12.4.min.js"></script>
	<script type="text/javascript" src="<?= Uri::base(false); ?>assets/js/bootstrap.js"></script>

	<link type="text/css" rel="stylesheet" href="<?= Uri::base(false); ?>assets/css/bootstrap.css">
	<link type="text/css" rel="stylesheet" href="<?= Uri::base(false); ?>assets/css/kintore.css">
</head>
<body>
	<? if(!isset($is_bg_hidden)):?>
	<div class="container div-image-bg">
		<div class="row">
			<div class="col-md-6 col-md-offset-6">
				<img class="image-bg" src="<?= Uri::base(false); ?>assets/img/shark.png"/>
			</div>
		</div>
	</div>
	<? endif; ?>
	<div class="container">

	<nav class="navbar navbar-inverse navbar-purple navbar-fixed-top">
		<div class="container">
			<div class="row">
				<div class="col-md-offset-1">
					<div class="navbar-header">
						<a class="navbar-brand kintore-navbar" href="/">Let's 筋トレ！</a>
							<button type="button" 
								class="navbar-toggle collapsed" 
								data-toggle="collapse"
								data-target="#navbar-login" 
								aria-expanded="false">
									<span class="sr-only">Toggle navigation</span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
							</button>
					</div>
				</div>
				<div class="col-md-9">
				<div class="collapse navbar-collapse" id="navbar-login">
					<? if(Session::get('user_id')): ?>
					<ul class="nav navbar-nav navbar-right">
						<li><a href="<?= Uri::base(false); ?>auth/logout/">ログアウト(<?= Session::get('username')?>)</a></li>
					</ul>
					<? else: ?>
					<ul class="nav navbar-nav navbar-right">
						<li><a href="https://kintore.kieferyap.com/auth/login">ログイン</a></li>
						<?/*<li><a href="/auth/register">アカウント作成</a></li>*/?>
					</ul>
					<? endif; ?>
				</div>
				</div>
			</div>
		</div>
	</nav>
	</div>

	<div class="container kintore-content">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<? if(Session::get_flash('success')):?>
					<div class="alert alert-success">
						<div class="flash-icon flash-success-icon" data-dismiss="alert" aria-label="close">
							<span class="glyphicon glyphicon-ok"></span>
						</div>
						<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
						<span class="flash-message">
							<?= Session::get_flash('success'); ?>
						</span>
					</div>
				<? endif; ?>
				<? if(Session::get_flash('error')):?>
					<div class="alert alert-danger">
						<div class="flash-icon flash-danger-icon" data-dismiss="alert" aria-label="close">
							<span class="glyphicon glyphicon-remove"></span>
						</div>
						<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
						<span class="flash-message">
							<?= Session::get_flash('error'); ?>
						</span>
					</div>
				<? endif; ?>
			</div>
		</div>
		<?php echo $content; ?>
	</div>
	
	<script type="text/javascript" src="<?= Uri::base(false); ?>assets/js/kintore.js"></script>
</body>
</html>